<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class UsersModel extends Model
{
	protected $table = 'user';
	protected $useTimestamps = true;
	protected $primaryKey = 'id';
	protected $allowedFields = ['idUniq','NISN','nama','panggilan','foto','kelas','jk','state','openBook','bookColection','bookRead','favoriteBook','role','uname','pass'];

	public function sysUserState()
	{
		$db = \Config\Database::connect();
		$sql = "SELECT updated_at,state,idUniq FROM `user`";
		$result = $db->query($sql)->getResult();
		$updated = ['offline' => 0, 'delete' => 0];
		foreach ($result as $data) {
			if ($data->state === 'online') {
				$lastActive = Time::createFromFormat('Y-m-d H:i:s', $data->updated_at, 'Asia/Jakarta');
				$timeNow = Time::now('Asia/Jakarta');
				$timeDiff = date_diff($lastActive, $timeNow);
				if ($timeDiff->h >= 1) {
					$updated['offline']++;
					$sql = "UPDATE `user` SET state='offline' WHERE idUniq='{$data->idUniq}'";
					$db->query($sql)->getResult();
				}
			} else if ($data->state === 'offline') {
				$lastActive = Time::createFromFormat('Y-m-d H:i:s', $data->updated_at, 'Asia/Jakarta');
				$timeNow = Time::now('Asia/Jakarta');
				$timeDiff = date_diff($lastActive, $timeNow);	
				if( $timeDiff->y >= 3 ) {
					$updated['delete']++;
					$sql = "DELETE FROM `user` WHERE idUniq='{$data->idUniq}'";
					$db->query($sql)->getResult();
				} 
			}
		}
		return $updated;
	}
	public function filter(array $arrFilter, $kelasData, $search=false )
	{
		$node = 0;
		foreach ($arrFilter as $id) {
			foreach ($kelasData['items'] as $kelas) {
				if ($kelas['kode_kelas'] == $id) {
					$arrFilter[$node] = $kelas['kelas'];
				}
			}
			$node++;
		}
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM `user` WHERE ";
		if ($search) {
			$sql .= "(nama LIKE '%".$search."%') AND (";
		}
		$length = count($arrFilter);
		$node = 1;
		foreach ($arrFilter as $value) {
			$sql .= "kelas='".$value."'";
			if ($node < $length) {
				$sql .= " OR ";
			}
			$node++;
		}
		if ($search) {
			$sql .= ")";
		}
		$sql .= " ORDER BY kelas DESC";
		$result = $db->query($sql)->getResultArray();
		return $result;
	}
}