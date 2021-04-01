<?php namespace App\Models;

use CodeIgniter\Model;

class BookReaderModel extends Model
{
	protected $table = 'bookReader';
	protected $useTimestamps = true;
	protected $primaryKey = 'id';
	protected $allowedFields = ['idUser','idBook','time','startTime','start'];
}