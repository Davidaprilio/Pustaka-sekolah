<?php namespace App\Models;

use CodeIgniter\Model;

class KategoriSubmenuModel extends Model
{
	protected $table = 'tb_subKategoriBuku';
	protected $allowedFields = ['sub_nama', 'slug_subKbuku', 'path', 'sort'];

}