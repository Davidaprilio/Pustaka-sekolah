<?php namespace App\Models;

use CodeIgniter\Model;

class Sys extends Model
{
	protected $table = 'system';
	protected $allowedFields = ['keyword','value'];

	public function SysUpTheme($tema)
	{
		$db = \Config\Database::connect();
		$sql = "UPDATE `system` SET value='$tema' WHERE keyword='themeAdmin'";
		$result = $db->query($sql);
		return $result;
	}
}
