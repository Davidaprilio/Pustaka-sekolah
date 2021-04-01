<?php namespace App\Controllers;
use \App\Models\BukuModel;
use \App\Models\UsersModel;
use \App\Models\KategoriModel;
use \App\Models\BookReaderModel;
use CodeIgniter\I18n\Time;

class Petugaspustaka extends BaseController
{
	protected $buku, $user, $theme, $kategori, $reader, $dataAdmin;

	public function __construct()
	{
		helper('helpmy');
		$sesi = getSession('appsPtgLog', 'loginPetugas');
		// dd($sesi);
		// dd( session('appsPtgLog') );
		if (is_null( $sesi )) {
			// if ( $_SERVER['REQUEST_URI'] == '/Petugaspustaka' ) {
				direct('http://appsschool.smektaliterasi.com/Authorize/Petugas/Pustaka');
			// }
		}
		$this->dataAdmin = $sesi;
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
		$this->reader = new BookReaderModel();
		$this->kategori = new KategoriModel();
		$sys = new \App\Models\Sys();
		$get = $sys->select('value')->where('keyword','themeAdmin')->first();
		$this->theme = $get['value'];
	}
	public function dashboard()
	{
		$reader = $this->reader->findAll();
		$data = [
			'siswa' => $this->user->findAll(),
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin,
			'bukuTop' => $this->buku->getTop(3),
		];
		return view('adminPustaka/index', $data);
	}
	public function tambahbuku()
	{
		$data = [
			'tema' => $this->theme,
			'menuKte' => $this->kategori->select('kat_menu')->where('kat_grub', 'Buku Kelas')->findAll(),
			'manuUmum' => $this->kategori->select('kat_menu')->where('kat_grub', 'Lainnya')->findAll(),
			'manuProdi' => $this->kategori->select('kat_menu')->where('kat_grub', 'Buku Produktif')->findAll(),
			'dataAdmin' => $this->dataAdmin
		];
		return view('adminPustaka/tamabahBuku', $data);
	}
	public function kelolabuku($cari=false)
	{
		$keySearch = $this->request->getGet('keyword');
		$currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		if ($keySearch) {
			$dataBuku = $this->buku->getBook($keySearch);
		} else {
			$dataBuku = $this->buku;
		}
		$data = [
			'table' => $dataBuku->paginate(5),
			'pager' => $dataBuku->pager,
			'currentPage' => $currentPage,
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin
		];
		if ($cari == 'cari') {
			return view('adminPustaka/tabelKelolabuku', $data);
		} else {
			return view('adminPustaka/kelolaBuku', $data);
		}
	}

	public function pengguna()
	{
		$dataUser = $this->user->select('idUniq,nama,kelas,jk,bookColection,updated_at')->findAll();
		$data = [
			'dataUser' => $dataUser,
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin
		];
		return view('adminPustaka/usersList', $data);
	}

	public function monitor($sys = null)
	{
		helper('text');
	    $result = curl_getAPI('http://appsschool.smektaliterasi.com/API/kelas');
	    $jsonKelas = json_decode($result, true);

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
	    		$result = $this->reader->select('bookReader.startTime, bookReader.time, bookReader.start, book.judul_buku, book.sampul')->where('idUser',$key['idUniq'])->where('idBook',$key['openBook'])->join('book','book.slug_buku = bookReader.idBook')->first();
	    		$timeS = $result['startTime'];
	    		$timeR = $result['time'];
	    		$timeST = $result['start'];
	    		$bookT = ellipsize($result['judul_buku'], 20);
	    		$bookIMG = $result['sampul'];
	    	}
	    	else {
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
			'dataKelas' => $jsonKelas['items'],
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin,
			'users' => $dataUser,
			'filter' => $filter,
		];
		if ($sys == 'sync') {
			return view('adminPustaka/tabelMon', $data);	
		} else {
			$this->user->sysUserState();
			return view('adminPustaka/monitoringUser', $data);	
		}
	}

	public function menu()
	{
		$data = [
			'tema' => $this->theme,
			'menuProduktif' => $this->kategori->select('kat_menu,id')->where('kat_grub', 'Buku Produktif')->findAll(),
			'Umum' => $this->kategori->select('kat_menu,id')->where('kat_grub', 'Lainnya')->findAll(),
			'dataAdmin' => $this->dataAdmin
		];
		return view('adminPustaka/menu', $data);	
	}
	public function login()
	{
		if (!is_null(session()->get('sPetugasPutaka') )) {
			return redirect()->to(base_url('/Petugaspustaka/dashboard'));
		}
		// return view('adminPustaka/login');	
		return redirect()->to('http://appsschool.smektaliterasi.com/Authorize/Petugas/Pustaka');

	}
	public function infoUser($idUser)
	{
		$u = 'siswa';
		$user = curl_getAPI('http://appsschool.smektaliterasi.com/API/userinfo/siswa/'.$idUser, true);
		if (is_null($user['status'])) {
			$u = 'guru';
			$user = curl_getAPI('http://appsschool.smektaliterasi.com/API/userinfo/guru/'.$idUser, true);
			if (is_null($user['status'])) {
				return;
			}
		}
		$read = $this->reader->where('idUser', $idUser)->findAll();
		$timeR = Time::createFromFormat('H:i:s', '00:00:00', 'Asia/Jakarta');
		foreach ($read as $d) {
			date_add($timeR, createDateInt($d['time']));
		}
		$data = [
			'detail' => $user[$u],
			'user' => $this->user->where('idUniq', $idUser)->first(),
			'timeRead' => createDateInt($timeR->toTimeString())->format('%H:%I:%S'),
			'bukuDibaca' => count($read),
		];
		return view('adminPustaka/cardUser', $data);
	}

	public function infoBook($slug)
	{
		$buku = $this->buku->where('slug_buku', $slug)->first();
		$data = [
			'data' => $buku,
		];
		return view('adminPustaka/cardBook', $data);
	}

	public function uptema($value)
	{
		$sys = new \App\Models\Sys();
		$sys->SysUpTheme($value);
	}
	public function out()
	{
		session_destroy();
		return redirect()->to(base_url('/'));
	}
}