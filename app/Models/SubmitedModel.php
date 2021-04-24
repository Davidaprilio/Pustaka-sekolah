<?php namespace App\Models;

use CodeIgniter\Model;

class SubmitedModel extends Model
{
	protected $table = 'submited';
	protected $useTimestamps = true;
	protected $allowedFields = ['id_user', 'kode_tugas', 'progress'];
		
}