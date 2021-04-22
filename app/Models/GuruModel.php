<?php namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
	protected $table = 'guru';
	protected $useTimestamps = true;
	protected $allowedFields = ['slug', 'NIP', 'nama', 'panggilan', 'mapel', 'foto', 'jk', 'uname', 'pass', 'role'];
		
}