<?php

namespace App\Controllers;

use \App\Models\BukuModel;
use \App\Models\KategoriModel;
use \App\Models\BookReaderModel;
use CodeIgniter\I18n\Time;

use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
	use ResponseTrait;
	protected $Buku, $User, $theme, $kategori, $reader, $dataUser;

	public function __construct()
	{
		helper(['helpmy', 'text']);
		// $sesi = getSession('appsSch', 'userLogin');
		$sesi = session()->get('userLogin');
		if (is_null($sesi) || $sesi['role'] != 'siswa') {
			direct(base_url('/'));
		}
		
		$sys = new \App\Models\Sys();
		$U = new \App\Models\UsersModel();
		$this->Buku = new BukuModel();
		$this->User = $U;
		$this->reader = new BookReaderModel();
		$this->kategori = new KategoriModel();
		$this->sesi = $sesi;
		$this->dataUser = (object)$U->where('idUniq', $sesi['id'])->first();
		$get = $sys->select('value')->where('keyword', 'themeAdmin')->first();
		$this->theme = $get['value'];
	}

	public function index()
	{
		helper('text');
		$Kelas = new \App\Models\KelasModel();
		$Tugas = new \App\Models\TugasModel();
		$tgs = $Tugas->where('id_kelas', $this->dataUser->kode_kelas)->findAll();
		return view('panel_user/dashboard', [
			'userInfo' => $this->dataUser,
			'dataTugas' => $tgs,
		]);
	}

	public function lihatTugas($kodeTugas)
	{
		$Tugas = new \App\Models\TugasModel();
		$tgs = $Tugas->select('tugas.*,guru.nama,guru.foto')->where('kode_tugas', $kodeTugas)->join('guru', 'tugas.id_guru = guru.slug')->first();
		$buku = $this->Buku->where('slug_buku', $tgs['id_buku'])->first();
		return view('panel_user/lihatTugas', [
			'userInfo' => $this->dataUser,
			'tugas' => $tgs,
			'buku' => $buku,
			'teman' => $this->User->where('kode_kelas', $this->dataUser->kode_kelas)->findAll(),
		]);
	}

	public function bacaBuku($id)
	{
		$Tugas = new \App\Models\TugasModel();
		$getTugas = $Tugas->where('kode_tugas', $id)->first();
		if (!$getTugas) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Tugas ini tidak ada');
		}
		$buku = $this->Buku->select('slug_buku,file_enc')->where('slug_buku', $getTugas['id_buku'])->first();
		if (is_null($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku yang dimaksud tidak dapat ditemukan');
		}

		$data = [
			'titleBar' => 'Perpustakaan Elektronik | SMK Negeri 1 Tanjunganom',
			'fileBook' => base_url('/').'/book/'.$buku['file_enc'],
			'idB' => $buku['slug_buku'],
			'read_pages' => preg_split("/-/", $getTugas['read_pages']),
		];
		return view('pustaka/pdfReaderTugas', $data);
	}

	public function mybook()
	{
		$Booksaved = new \App\Models\BookSavedModel();
		$book = $Booksaved->select('savebook.*,book.judul_buku,book.sampul')->where('id_user', $this->sesi['id'])->join('book', 'book.slug_buku = savebook.id_book')->get()->getResultArray();
		return view('panel_user/savedBook', [
			'userInfo' => $this->dataUser,
			'book' => $book,
		]);
	}

	public function profile()
	{
		return view('panel_user/profile', [
			'userInfo' => $this->dataUser,
		]);
	}

	public function addBookmark()
	{
		$buku = $this->request->getPost('book');
		$Booksaved = new \App\Models\BookSavedModel();
		$user = $this->sesi['id'];
		$cek = $Booksaved->where('id_user', $user)->where('id_book', $buku)->first();
		if (is_null($cek)) {
			$Booksaved->insert([
				'id_user' => $user,
				'id_book' => $buku,
			]);
			return '1';
		} else {
			return '0';
		}
	}
}
