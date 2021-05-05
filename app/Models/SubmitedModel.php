<?php namespace App\Models;

use CodeIgniter\Model;

class SubmitedModel extends Model
{
	protected $table = 'submited';
	protected $primaryKey = 'id';
	protected $useTimestamps = true;
	protected $allowedFields = ['id_user', 'tugas_kode', 'progress'];
		
}