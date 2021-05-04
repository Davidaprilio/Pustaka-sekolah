<?php

namespace App\Models;

use CodeIgniter\Model;

class BookSavedModel extends Model
{
	protected $table = 'savebook';
	protected $primaryKey = 'id';
	protected $allowedFields = ['id_user', 'id_book', 'afterRead'];
}