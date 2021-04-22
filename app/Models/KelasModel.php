<?php namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
	protected $table = 'kelas';
	protected $useTimestamps = true;
	protected $allowedFields = ['kelas', 'idkelas'];
		
}