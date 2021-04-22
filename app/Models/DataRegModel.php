<?php namespace App\Models;

use CodeIgniter\Model;

class DataRegModel extends Model
{
	protected $table = 'userRegister';
	protected $useTimestamps = true;
	protected $allowedFields = ['NISN', 'Nama', 'Kelas', 'JK'];
		
}