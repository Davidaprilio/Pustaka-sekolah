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
}