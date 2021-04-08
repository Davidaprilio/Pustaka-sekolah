<?php namespace App\Models;

use CodeIgniter\Model;

class BookReaderModel extends Model
{
	protected $table = 'historyReading';
	protected $useTimestamps = true;
	protected $primaryKey = 'id';
	protected $allowedFields = ['idUser','idBook','time','startTime','start'];
}