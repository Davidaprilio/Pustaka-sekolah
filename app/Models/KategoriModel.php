<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table = 'kategoriT';
	protected $allowedFields = ['page', 'kat_grub', 'kat_menu'];

	public function jsonKategori()
	{
		$kate = $this->table('KategoriT')->findAll();
		// ambil dan buat Array Kategori grub
		$aKAT = [];
		foreach ($kate as $grub) {
			$aKAT[$grub['kat_grub']] = [];
		}
		foreach ($kate as $grub) {
			array_push($aKAT[$grub['kat_grub']], $grub['kat_menu']);
		}
		return $aKAT;
	}

	public function ambilKategori($getKategori)
	{
		$cek = false;
		$p = str_replace('-', ' ', $getKategori);
		$kate = $this->table('KategoriT')->findAll();
		// ambil dan buat Array Kategori grub
		$aKAT = [];
		foreach ($kate as $grub) {
			$aKAT[$grub['kat_grub']] = [];
		}
		foreach ($kate as $grub) {
			array_push($aKAT[$grub['kat_grub']], $grub['kat_menu']);
			if ($grub['kat_menu'] == $p ) {
			 	$cek = true;
			};
		}
		$data = [
			'data' => $aKAT,
			'status' => $cek
		];
		return $data;
	}

	//	Untuk mendapatkan data Kategori yang digunakan untuk sidebar menu user Pustaka
	//	Output:
	//		$index['data'] = berisi menu kategori yang sudah urut
	//		$index['info'] = berisi info breadcrumb dan valid menu. 
	//		getCategory('', false) = hanya mendapatkan index data
	public function getCategory($getKategori, $withInfo = true)
	{
		$db = \Config\Database::connect();
		$cek = false;
		$go = false;
	 	$keyKode = null;
		$p = str_replace('-', ' ', $getKategori);
		$tmpMenu = '';
		// $sql = "SELECT * FROM `tb_subKategoriBuku` JOIN tb_kategoriBuku WHERE tb_subKategoriBuku.path=tb_kategoriBuku.kode_kategori ORDER BY tb_subKategoriBuku.sort ASC";
		$sql = "SELECT * FROM `tb_subKategoriBuku` ORDER BY sort ASC";
		$sub = $db->query($sql)->getResultArray();
		$sql = "SELECT * FROM `tb_kategoriBuku` ORDER BY sortid ASC";
		$menu = $db->query($sql)->getResultArray();
		//Array Kategori
		$aKAT = [];
		$subMenu = [];
		foreach ($menu as $grub) {
			$aKAT[$grub['kode_kategori']][0] = $grub['nama'];
			$breadcrumb1 =($p == '/')? 'Buku' : $grub['nama'];
		}
		foreach ($sub as $grub) {
			array_push($aKAT[$grub['path']], [
				'alias' => $grub['sub_nama'],
				'kode' => $grub['slug_subKbuku']
			]);
			array_push($subMenu, [
				'alias' => $grub['sub_nama'],
				'kode' => $grub['slug_subKbuku']
			]);
			if (($grub['sub_nama'] == $p || $p == '/') && $withInfo ) {
			 	$cek = true;
			 	$keyKode = $grub['slug_subKbuku'];
				$go = [
					0 => 'Pustaka',
					1 => ($p == '/')? 'Buku' : $aKAT[$grub['path']][0],
					2 => ($p == '/')? 'Semua' : $grub['sub_nama'],
				];
			};
		}
		$data = [
			'data' => $aKAT,
			'subMenu' => $subMenu,
		];
		if ($withInfo) {
			$data['info'] = [
				'key' => ($p == '/')? 'Semua Buku' : $p,
				'keyKode' => ($p == '/')? 'A0A' : $keyKode,
				'state' => ($p == '/')? true : $cek,
				'path' => ($go)? $go : '-',
				'path_parse' => ($go)? $go[0].'/'.$go[1].'/'.$go[2] : '-',
			];
			if (!$cek) {
				$data['info']['message'] = 'Kategori tidak ada / tidak ditemukan' ;
			} else {
				$data['info']['message'] = ($p == '/')? 'Kategori default root' : 'Kategori terkait ditemukan';
			}
		}
		return $data;
	}


	//	Mencari path buku dengan memberikan id buku
	//	Output:
	//		array barisi Path dan string Path
	public function findPathBook($idBook)
	{
		$db = \Config\Database::connect();
		$sql = "SELECT kategori,judul_buku FROM `book` WHERE slug_buku='{$idBook}'";
		$book = $db->query($sql)->getResult();
		$kodePath = $book[0]->kategori;

		$sql = "SELECT * FROM `tb_subKategoriBuku` INNER JOIN `tb_kategoriBuku` ON tb_subKategoriBuku.path=tb_kategoriBuku.kode_kategori WHERE slug_subKbuku='{$kodePath}'";
		$path = $db->query($sql)->getResult();
		$aPath = [
			'book' => $book[0]->judul_buku,
			'idBook' => $idBook,
			'path' => [
				0 => 'Pustaka',
				1 => $path[0]->nama,
				2 => $path[0]->sub_nama,
			],
			'parse' => 'Pustaka/'.$path[0]->nama.'/'.$path[0]->sub_nama,
		];
		return $aPath;
	}
}