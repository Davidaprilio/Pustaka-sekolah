<?php namespace App\Controllers;
use \App\Models\BukuModel;
use \App\Models\KategoriModel;
use \App\Models\UsersModel;
use CodeIgniter\I18n\Time;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Pustaka extends BaseController
{
	use ResponseTrait;
	protected $kate, $buku, $userInfo;

	public function __construct()
	{
		helper('helpmy');
		// $uL = getSession('appsSch', 'userLogin');
		$uL = session()->get('userLogin');
		$this->userInfo = ($uL)? (object) $uL : null;
		$this->kate = new KategoriModel();
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
	}
	public function index($getKategori='Semua Buku')
	{
		$dataKate = $this->kate->getCategory(($getKategori === 'Semua Buku')? '/' : $getKategori);

		// return $this->respond($dataKate, 200);
		$data = [
			'titleBar' => 'Perpustakaan Elektronik | SMK Negeri 1 Tanjunganom',
			'kategori' => $dataKate['data'],
			'baseM' => str_replace('-', ' ', $getKategori),
			'dataJson' => json_encode($dataKate),
			'bGk' => 'Buku Kelas',
			'bK' => 'Semua Buku',
			'userInfo' => $this->userInfo
		];
		// if ($dataKate['status']) {
			return view('pustaka/index', $data);
		// } else {
			// return view('errors/html/error_404');
		// }
	}
	public function detail($id)
	{
		$buku = $this->buku->select('forClass')->where('slug_buku', $id)->first();


		if (is_null($buku)) {
			return view('errors/html/error_404');
			exit();
		} 
		$dataKate = $this->kate->getCategory('/', false);
		$data = [
			'titleBar' => 'Perpustakaan Elektronik | SMK Negeri 1 Tanjunganom',
			'kategori' => $dataKate['data'],
			'baseM' => 'DetailBuku',
			'dataJson' => json_encode($dataKate),
			'bGk' => 'Buku Kelas',
			'bK' => $buku['forClass'],
			'userInfo' => $this->userInfo
		];
		return view('pustaka/index', $data);
	}
	public function Read($id)
	{
		$userInfo = $this->userInfo;
		if (is_null($userInfo)) {
			return redirect()->to('http://smektaliterasi.com/Login?ke='.base_url('Pustaka/Read/'.$id));
		}
		$buku = $this->buku->select('slug_buku,file_enc')->where('slug_buku', $id)->first();
		if (is_null($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku yang dimaksud tidak dapat ditemukan');
		}
		$data = [
			'titleBar' => 'Perpustakaan Elektronik | SMK Negeri 1 Tanjunganom',
			'fileBook' => base_url('/').'/book/'.$buku['file_enc'],
			'idB' => $buku['slug_buku'],
			'idU' => $userInfo->id,
		];
		return view('pustaka/pdfView', $data);
	}

	public function ReadTugas($id)
	{
		$userInfo = $this->userInfo;
		if (is_null($userInfo)) {
			return redirect()->to('http://smektaliterasi.com/Login?ke='.base_url('Pustaka/Read/'.$id));
		}
		$buku = $this->buku->select('slug_buku,file_enc')->where('slug_buku', $id)->first();
		if (is_null($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku yang dimaksud tidak dapat ditemukan');
		}
		$data = [
			'titleBar' => 'Perpustakaan Elektronik | SMK Negeri 1 Tanjunganom',
			'fileBook' => base_url('/').'/book/'.$buku['file_enc'],
			'idB' => $buku['slug_buku'],
			'idU' => $userInfo->id,
		];
		return view('pustaka/pdfReaderTugas', $data);
	}

	public function myprofile()
	{
		$dataKate = $this->kate->ambilKategori(null);
		$uI = $this->userInfo;
		if ( $uI ) {
			$data = [
				'titleBar' => 'Perpustakaan Elektronik | '.$uI->nama.' | SMK Negeri 1 Tanjunganom',
				'namaUser' => $uI->nama_lengkap,
				'userInfo' => $uI,
				'kate' => $dataKate['data'],
				'baseM' => 'ProfilingUserPustakaxyz',
				'bGk' => '',
				'bK' => ''
			];
			return view('pustaka/profile', $data);
		}else{
			return redirect()->to(base_url('/'));
		}
	}
	public function koleksi()
	{
		$dataKate = $this->kate->ambilKategori(null);
		$uI = $this->userInfo;
		$data = $this->user->select('bookColection')->where('idUniq',$uI->id)->first();
		$arrId = json_decode($data['bookColection'], true);
		$dataBuku = $this->buku->getBooks($arrId);
		if ( $uI ) {
			$data = [
				'titleBar' => 'Perpustakaan Elektronik | '.$uI->nama.' | SMK Negeri 1 Tanjunganom',
				'namaUser' => $uI->nama_lengkap,
				'userInfo' => $uI,
				'kate' => $dataKate['data'],
				'baseM' => 'ProfilingUserPustakaxyz',
				'bGk' => '',
				'bK' => '',
				'koleksi' => $dataBuku,
			];
		}
		return view('pustaka/koleksi', $data);
	}
	public function unggah()
	{
		$dataKate = $this->kate->ambilKategori(null);
		$uI = $this->userInfo;

		if ( $uI ) {
			$data = [
				'titleBar' => 'Perpustakaan Elektronik | '.$uI->nama.' | SMK Negeri 1 Tanjunganom',
				'namaUser' => $uI->nama,
				'userInfo' => $uI,
				'kate' => $dataKate['data'],
				'baseM' => 'ProfilingUserPustakaxyz',
				'bGk' => '',
				'bK' => ''
			];
		}
		return view('pustaka/upbook', $data);
	}

	public function downloadbuku($idBuku)
	{
		$fileBuku = $this->buku->select('file_enc,download,judul_buku')->where('slug_buku', $idBuku)->first();
		$down = (int)$fileBuku['download'] + 1;
		$e = $this->buku->set('download',$down)->where('slug_buku', $idBuku)->update();
		return $this->response->download('book/'.$fileBuku['file_enc'],null)->setFileName($fileBuku['judul_buku'].'.pdf');
	}
	//---------------------		Pengurus   	  -------------------------

	public function Pengurus($value='')
	{
		echo randomString(3).date('m').randomString(5).date('d');
	}

	public function login()
	{
		$direct = $this->request->getGet('ke');
		return view('layout/loginUser', [
			'direct' => $direct,
		]);
	}
	public function register()
	{
		$direct = $this->request->getGet('ke');
		return view('layout/registerUser', [
			'direct' => $direct,
		]);
	}
}
