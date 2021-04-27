<?php

namespace App\Controllers;

use \App\Models\BukuModel;
use \App\Models\UsersModel;
use \App\Models\KategoriModel;
use \App\Models\BookReaderModel;
use CodeIgniter\I18n\Time;

use CodeIgniter\API\ResponseTrait;

class PanelGuru extends BaseController
{
	use ResponseTrait;
	protected $buku, $user, $theme, $kategori, $reader, $dataAdmin;

	public function __construct()
	{
		helper(['helpmy', 'text']);
		// $sesi = getSession('appsSch', 'userLogin');
		$sesi = session()->get('userLogin');
		if (is_null($sesi) || $sesi['role'] != 'guru') {
			direct(base_url('/'));
		}
		// $this->dataAdmin = $sesi;
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
		$this->reader = new BookReaderModel();
		$this->kategori = new KategoriModel();
		$sys = new \App\Models\Sys();
		$get = $sys->select('value')->where('keyword', 'themeAdmin')->first();
		$this->theme = $get['value'];
	}
	public function dashboard()
	{
		helper('text');
		$kelasModel = new \App\Models\KelasModel();
		$kelas = $kelasModel->findAll();
		$dataKelas = [];
		foreach ($kelas as $key) {
			array_push($dataKelas, [
				'kelas' => $key['kelas'],
				'kode_kelas' => $key['idkelas']
			]);
		}
		$filter = $this->request->getGet('filter');
		if (isset($_POST['key']) && !is_null($filter)) {
			$keyw = $this->request->getPost('key');
			$dataUser = $this->user->filter($filter, $jsonKelas, $keyw);
		} else if (isset($_POST['key'])) {
			$keyw = $this->request->getPost('key');
			$dataUser = $this->user->like('nama', $keyw)->findAll();
		} else if (!is_null($filter)) {
			$dataUser = $this->user->filter($filter, $jsonKelas);
		} else {
			$dataUser = $this->user->findAll();
		}
		$no = 0;
		foreach ($dataUser as $key) {
			if ($key['state'] == 'baca') {
				$result = $this->reader->select('bookReader.startTime, bookReader.time, bookReader.start, book.judul_buku, book.sampul')->where('idUser', $key['idUniq'])->where('idBook', $key['openBook'])->join('book', 'book.slug_buku = bookReader.idBook')->first();
				$timeS = $result['startTime'];
				$timeR = $result['time'];
				$timeST = $result['start'];
				$bookT = ellipsize($result['judul_buku'], 20);
				$bookIMG = $result['sampul'];
			} else {
				$timeS = null;
				$timeR = null;
				$timeST = null;
				$bookIMG = null;
				$bookT = null;
			}
			$dataUser[$no]['startTime'] = $timeS;
			$dataUser[$no]['readTime'] = $timeR;
			$dataUser[$no]['start'] = $timeST;
			$dataUser[$no]['sampulBuku'] = $bookIMG;
			$dataUser[$no]['judulBuku'] = $bookT;
			$no++;
		}
		$data = [
			'tema' => $this->theme,
			'dataKelas' => $dataKelas,
			'users' => $dataUser,
			'filter' => $filter,
		];

		return view('panel_guru/dashboard', $data);
	}

	public function penugasan()
	{
		$Tugas = new \App\Models\TugasModel();
		$Kelas = new \App\Models\KelasModel();
		$dataTugas = $Tugas->getInfo();
		$in = 0;
		$idSiswa = [];
		foreach ($dataTugas as $key) {
			$s = $this->user->where('kode_kelas', $key['id_kelas'])->findAll();
			$dataTugas[$in]['users'] = count($s);
			$idSiswa = [];
			foreach ($s as $keys) {
				array_push($idSiswa, $keys['idUniq']);
			}
			$r = $this->reader->getUserRead($key['id_buku'], $idSiswa, true);

			$dataTugas[$in]['progress'] = (int) $r['jumlah'];
			$in++;
		}
		$data = [
			'tema' => $this->theme,
			'dataTugas' => $dataTugas,
			'buku' => $this->buku->select('slug_buku,judul_buku')->findAll(),
			'kelas' => $Kelas->findAll(),
		];
		return view('panel_guru/penugasan', $data);
	}

	public function tugas($kodeTugas)
	{
		$Tugas = new \App\Models\TugasModel();
		$tugas = $Tugas->detail($kodeTugas);
		return $this->respond($tugas, 200);
		if (!is_null($tugas) && $tugas['id_guru'] == session()->get('userLogin')['id']) {
			$data = [
				'tema' => $this->theme,
				'tugas' => $tugas,
			];
			return view('panel_guru/viewtugas', $data);
		} else {
			return redirect()->to(base_url('/PanelGuru/penugasan'));
		}
	}
}
