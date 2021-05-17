<?php

namespace App\Controllers;

use \App\Models\BukuModel;
use \App\Models\KategoriModel;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class API extends BaseController
{
	use ResponseTrait;
	protected $buku, $guru, $kategori;

	public function __construct()
	{
		$this->buku = new BukuModel();
		$this->kategori = new KategoriModel();
	}
	public function index()
	{
		return view('API/index');
	}

	//-----------------------	Books 	---------------------------

	public function getBook($lotsV = 15)
	{
		$data = [];
		if ($lotsV == 0) {
			$get = $this->buku->findAll();
		} else {
			$get = $this->buku->limit($lotsV)->get()->getResultArray();
		}
		$data['status'] = 'OK';
		$data['count'] = count($get);
		$in = 0;
		foreach ($get as $key) {
			$data['items'][$in]['sampulMid'] = '/img/book/mid/' . $key['sampul'];
			$data['items'][$in]['sampulMin'] = '/img/book/min/' . $key['sampul'];
			$data['items'][$in]['kategori'] = $key['menu'];
			$data['items'][$in]['judulBuku'] = $key['judul_buku'];
			$data['items'][$in]['idBuku'] = $key['slug_buku'];
			$in++;
		}
		return $this->respond($data, 200);
	}

	public function getBookOn($kategori, $lotsV = 3)
	{
		$data = [];
		$get = (object) $this->buku->getLimit($kategori, $lotsV);
		$data['status'] = 'OK';
		$data['count'] = count((array)$get);
		$in = 0;
		foreach ($get as $key) {
			$data['items'][$in]['sampulMin'] = '/img/book/min/' . $key['sampul'];
			$data['items'][$in]['sampulMid'] = '/img/book/mid' . $key['sampul'];
			$data['items'][$in]['pemilikBuku'] = $key['author'];
			$data['items'][$in]['diunggah'] = $key['created_at'];
			$data['items'][$in]['kategori'] = $key['menu'];
			$data['items'][$in]['judulBuku'] = $key['judul_buku'];
			$data['items'][$in]['unduhan'] = $key['download'];
			$data['items'][$in]['dibaca'] = $key['reader'];
			$data['items'][$in]['penerbit'] = $key['penerbit'];
			$data['items'][$in]['penulis'] = $key['penulis'];
			$data['items'][$in]['idBuku'] = $key['slug_buku'];
			$in++;
		}
		return $this->respond($data, 200);
	}

	public function searchBook($nameBook, $maxL = 5)
	{
		$gett = $this->buku->like('judul_buku', $nameBook)->orLike('penulis', $nameBook)->orLike('penerbit', $nameBook)->findAll();
		$data = [
			'status' => 'OK',
			'count' => count($gett),
			'keyword' => htmlspecialchars($nameBook),
		];
		$in = 0;
		foreach ($gett as $key) {
			$data['items'][$in]['sampulMin'] = '/img/book/min/' . $key['sampul'];
			$data['items'][$in]['sampulMid'] = '/img/book/mid/' . $key['sampul'];
			$data['items'][$in]['pemilikBuku'] = $key['author'];
			$data['items'][$in]['diunggah'] = $key['created_at'];
			$data['items'][$in]['kategori'] = $key['menu'];
			$data['items'][$in]['judulBuku'] = $key['judul_buku'];
			$data['items'][$in]['unduhan'] = $key['download'];
			$data['items'][$in]['dibaca'] = $key['reader'];
			$data['items'][$in]['penerbit'] = $key['penerbit'];
			$data['items'][$in]['penulis'] = $key['penulis'];
			$data['items'][$in]['idBuku'] = $key['slug_buku'];
			$in++;
		}
		return $this->respond($data, 200);
	}

	public function book($slugBook) // Detail Buku
	{
		$data = [];
		helper('helpmy');
		$get = $this->buku->where('slug_buku', $slugBook)->first();
		$pathBook = $this->kategori->findPathBook($slugBook);
		$data['inputParams'] = $slugBook;
		if (is_null($get)) {
			$data['status'] = 'Not_Found';
			$data['message'] = 'Tidak menemukan buku yang dicari pastikan id buku benar, id terdiri 12 karakter acak dan di akhiri 2 angka';
		} else {
			$data['status'] = 'OK';
			$data['items']['sampulMin'] = base_url('/') . '/img/book/min/' . $get['sampul'];
			$data['items']['sampulMid'] = base_url('/') . '/img/book/mid/' . $get['sampul'];
			$data['items']['pemilikBuku'] = $get['author'];
			$data['items']['diunggah'] = $get['created_at'];
			$data['items']['diunggahParse'] = tgl_Id(date('Y-m-d', strtotime($get['created_at'])));
			$data['items']['kategori'] = $get['menu'];
			$data['items']['judulBuku'] = $get['judul_buku'];
			$data['items']['unduhan'] = $get['download'];
			$data['items']['dibaca'] = $get['reader'];
			$data['items']['penerbit'] = $get['penerbit'];
			$data['items']['penulis'] = $get['penulis'];
			$data['items']['rating'] = $get['rating'];
			$data['items']['idBuku'] = $get['slug_buku'];
			$data['items']['deskripsi'] = $get['deskripsi'];
		}
		// $data['pathBook'] = [
		// 	'arr' => $pathBook['path'],
		// 	'parse' => $pathBook['parse'],
		// ];
		return $this->respond($data, 200);
	}

	public function abstractBook($key, $limit = 0)
	{
		$db = \Config\Database::connect();
		$query = $db->table('abstrak')->select('name')->where('type', $key);
		if ($limit > 0 ) { 
			$query = $query->limit($limit);
		}
		$result = $query->get()->getResultArray();
		$data = [];
		foreach ($result as $val) {
			array_push($data, $val['name']);
		}
		return $this->respond($data, 200);
	}


	// ------------------------ Users -------------------------

	public function getDataGuru($idU)
	{
		$get = $this->guru->where('idUniq', $idU)->first();
		if (is_null($get)) {
			$data['status'] = 'Not_Found';
			$data['message'] = 'Tidak menemukan profil duru yang dicari pastikan id guru benar';
		} else {
			helper('helpmy');
			$data['status'] = 'OK';
			$data['items']['id'] = $get['idUniq'];
			$data['items']['nama'] = $get['nama'];
			$data['items']['namaLengkap'] = $get['nama_lengkap'];
			$data['items']['Jk'] = $get['JK'];
			$data['items']['foto'] = '/' . $get['fotoprofile'];
			$data['items']['tglLahir'] = tgl_Id(date('Y-m-d', strtotime($get['tgl_lahir'])));
			$data['items']['waliKelas'] = (is_null($get['wali'])) ? 'tidak menjadi wali kelas' : $get['wali'];
			$data['items']['pengajar'] = $get['pengajar'];
			$data['items']['alamat'] = $get['alamat'];
			$data['items']['email'] = $get['email'];
			$data['items']['NIP'] = $get['NIP'];
		}
		$data['inputParams'] = $idU;
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
