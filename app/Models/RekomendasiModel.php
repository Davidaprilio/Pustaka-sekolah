<?php namespace App\Models;

use CodeIgniter\Model;

class RekomendasiModel extends Model
{
	protected $table = 'rekomendasi';
	protected $useTimestamps = true;
	protected $allowedFields = ['slug_book', 'for_user'];

}