<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriMenuModel extends Model
{
	protected $table = 'tb_kategoriBuku';
	protected $allowedFields = ['nama', 'kode_kategori', 'kat_menu', 'sortid'];
		
}