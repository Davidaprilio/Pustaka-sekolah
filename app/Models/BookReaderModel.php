<?php

namespace App\Models;

use CodeIgniter\Model;

class BookReaderModel extends Model
{
	protected $table = 'historyReading';
	protected $useTimestamps = true;
	protected $primaryKey = 'id';
	protected $allowedFields = ['idUser', 'idBook', 'time', 'startTime', 'start'];

	public function getUserRead(string $idBook, array $arrUser, bool $onlyCountResult = false)
	{
		if (count($arrUser) == 0) {
			return ['jumlah' => 0];
		}
		if ($onlyCountResult) {
			$this->select('count(idUser) AS jumlah');
		}
		$this->where('idBook', $idBook);
		$index = count($arrUser);
		$in = $index;
		foreach ($arrUser as $user) {
			if ($index == $in) {
				$this->where('idUser', $user);
			} else {
				$this->orWhere('idUser', $user);
			}
			$index--;
		}
		// $result = $this->getCompiledSelect();
		$result = $this->get()->getResultArray();
		if ($onlyCountResult) {
			return $result[0];
		} else {
			return $result;
		}
	}
}
