<?php namespace App\Controllers;
use \App\Models\BukuModel;
use \App\Models\UsersModel;
use \App\Models\KategoriModel;
use \App\Models\BookReaderModel;
use \App\Models\KategoriMenuModel;
use \App\Models\KategoriSubmenuModel;
use \App\Models\RekomendasiModel;

use CodeIgniter\I18n\Time;

class Petugaspustaka extends BaseController
{
	protected $buku, $user, $theme, $kategori, $reader, $dataAdmin, $menu, $submenu, $Rekomendasi;

	public function __construct()
	{
		helper(['helpmy','text']);
		$sesi = session()->get('adminApp');
		if (is_null($sesi)) {
			if ($_SERVER['PATH_INFO'] !== '/Login/Administrator') {
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		}
		$this->dataAdmin = (object)$sesi;
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
		$this->reader = new BookReaderModel();
		$this->kategori = new KategoriModel();
		$this->menu = new KategoriMenuModel();
		$this->submenu = new KategoriSubmenuModel();
		$this->Rekomendasi = new RekomendasiModel();
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
			// 'menuKte' => $this->kategori->select('kat_menu')->where('kat_grub', 'Buku Kelas')->findAll(),
			// 'manuUmum' => $this->kategori->select('kat_menu')->where('kat_grub', 'Lainnya')->findAll(),
			// 'manuProdi' => $this->kategori->select('kat_menu')->where('kat_grub', 'Buku Produktif')->findAll(),
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
			'table' => $dataBuku->paginate(20),
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

	// public function pengguna()
	// {
	// 	$dataUser = $this->user->select('idUniq,nama,kelas,jk,bookColection,updated_at')->findAll();
	// 	$data = [
	// 		'dataUser' => $dataUser,
	// 		'tema' => $this->theme,
	// 		'dataAdmin' => $this->dataAdmin
	// 	];
	// 	return view('adminPustaka/usersList', $data);
	// }

	public function monitor($sys = null)
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
			'dataKelas' => $dataKelas,
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

	public function rekomendasi($p=null)
	{
		if (is_null($p)) {
			// null
		} else if ($p == 'drop') {
			$id = $this->request->getPost('data');
			$this->Rekomendasi->where('slug_book', $id)->delete();
		} else if ($p == 'add') {
			$id = $this->request->getPost('data');
			$this->Rekomendasi->insert([
				'slug_book' => $id,
				'for_user' => 'all',
			]);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
		$data = [
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin,
			'buku' => $this->buku->notSuggestBook(),
			'suggest' => $this->buku->suggestBook(),
		];
		// dd($data['buku'], $data['suggest']);
		if (is_null($p)) {
			return view('adminPustaka/rekomendasi', $data);
		} else {
			return view('adminPustaka/rowBookRecommend', $data);
		}
	}

	public function menu()
	{
		$menu = $this->kategori->getCategory('', false);
		$no = 'aa';

		foreach ($menu['data'] as $val => $key) {
			if ($no === 'aa') {
				$a = [$val => $key];
				$no = 0;
			} else {
				$b[$val] = $key;
				$no++;
			}
		}
		$data = [
			'tema' => $this->theme,
			// 'menuProduktif' => $this->kategori->select('kat_menu,id')->where('kat_grub', 'Buku Produktif')->findAll(),
			// 'Umum' => $this->kategori->select('kat_menu,id')->where('kat_grub', 'Lainnya')->findAll(),
			'dataAdmin' => $this->dataAdmin,
			'menuLock' => $a,
			'menu' => $b,
		];
		return view('adminPustaka/menu', $data);	
	}
	public function login()
	{
		if (is_null( session()->get('adminApp') )) {
			// return redirect()->to('http://appsschool.smektaliterasi.com/Authorize/Petugas/Pustaka');
			return view('adminPustaka/login');
		}
		return redirect()->to(base_url('/Petugaspustaka/dashboard'));

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

	public function desain()
	{
		$data = [
			'tema' => $this->theme,
			'dataAdmin' => $this->dataAdmin
		];
		return view('adminPustaka/addBook', $data);
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
	public function updateMenu()
	{
		$menu = $this->request->getPost('menu');
		$sub = $this->request->getPost('subMenu');
		// if (isset($menu) && isset($sub)) {
		$cekNew = false;
		$idx = 1;
 		foreach ($menu as $key) {
 			if ($key['kode'] == 'new') {
 				$this->menu->insert([
 					'nama' => $key['alias'],
 					'sortid' => $idx++,
 					'kode_kategori' => random_string('alnum', 5)
 				]);
 				$cekNew = true;
 			} else {
	 			$this->menu->set('sortid', $idx++)->set('nama', $key['alias'])->where('kode_kategori', $key['kode'])->update();
 			}
 		}
 		$idx = 1;
 		foreach ($sub as $key) {
 			if ($key['kode'] == 'new') {
 				$this->submenu->insert([
 					'sub_nama' => $key['alias'],
 					'slug_subKbuku' => random_string('alnum', 4),
 					'path' => $key['parent'],
 					'sort' => $idx++,
 				]);
 				$cekNew = true;
 			} else {
	 			$this->submenu->set([
	 				'sort' => $idx++,
	 				'nama' => $key['alias'],
	 			])->where('slug_subKbuku', $key['kode'])->update();
 			}
 		}
 		// dd('selesai');
		// } else {
		// 	return redirect()->to(base_url('/Petugaspustaka/menu'));
		// }
		if ($cekNew) {
			$menu = $this->kategori->getCategory('', false);
			$no = 'aa';
			foreach ($menu['data'] as $val => $key) {
				if ($no === 'aa') {
					$a = [$val => $key];
					$no = 0;
				} else {
					$b[$val] = $key;
					$no++;
				}
			}
			$data = [
				'tema' => $this->theme,
				'dataAdmin' => $this->dataAdmin,
				'menuLock' => $a,
				'menu' => $b,
			];
			return view('/adminPustaka/cardEditMenu', $data);
		} else {
			return 'updated';
		}
	}
	public function removeMenu()
	{
		$id = $this->request->getPost('id');
		$el = $this->request->getPost('el');
		if ($el == 'child') {
			$cek = $this->submenu->where('slug_subKbuku', $id)->delete();
		} else {
			$cek = $this->menu->where('kode_kategori', $id)->delete();			
			$this->submenu->where('path', $id)->delete();
		}
		if ($cek) {
			return json_encode(['id'=>$id, 'el' => $el]);
		} else {
			return 'gagal menghapus';
		}
	}
	public function out()
	{
		session()->destroy();
		return redirect()->to(base_url('/'));
	}
}