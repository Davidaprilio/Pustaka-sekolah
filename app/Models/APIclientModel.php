<?php namespace App\Models;

use CodeIgniter\Model;

class APIclientModel extends Model
{
	protected $table = 'clientapps';
	protected $useTimestamps = true;
	protected $allowedFields = ['nameApp','keyClient','author','used','active'];
}