<?php namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
	protected $table = 'book';
	protected $useTimestamps = true;
	protected $allowedFields = ['file_enc','slug_buku','author','judul_buku','penulis','penerbit','sampul','kategori','forClass','type','deskripsi','download','reader','rating','status','pesan'];

	public function getLimit($where,$limit)
	{
		$db = \Config\Database::connect();
		$kode = str_replace('Formal', '', $where);
		$fieldTB = ($where == $kode)? 'kategori' : 'forClass';
		if ($limit == 0) {
			$ddd = $this->table('book')->where($fieldTB, $kode)->findAll();
		} else {
			$ddd = $this->table('book')->where($fieldTB, $kode)->limit($limit)->findAll();
		}
		// $result = $db->query($sql);
		// $row = $result->getResult();
		// dd($row,$ddd);		
		return $ddd;
	}
	public function ubahData($field, $value, $idBuku)
	{
		$db = \Config\Database::connect();
		$sql = "UPDATE `book` SET $field='$value' WHERE slug_buku='$idBuku'";
		$result = $db->query($sql);
		$updated = $result->getResult();
		return $updated;
	}
	public function getBooks(array $arrIdBook)
	{
		$db = \Config\Database::connect();
		// $sql = "SELECT * FROM `book` WHERE slug_buku='Uu201fCCR216' AND WHERE slug_buku='Ciu01i68p416'";
		$sql = "SELECT * FROM `book` WHERE";
		$lengArr = count($arrIdBook);
		foreach ($arrIdBook as $id) {
			$sql = $sql .= " slug_buku='{$id}'";
			if ($lengArr > 1 ) {
				$sql = $sql .= " OR";
				$lengArr--;
			}
		}
		$result = $db->query($sql);
		$get = $result->getResult();
		return $get;
	}
	public function search($keyWord,$Limit)
	{
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM `book` WHERE judul_buku LIKE '%{$keyWord}%' || penulis LIKE '%{$keyWord}%' || penerbit LIKE '%{$keyWord}%'";
		$result = $db->query($sql);
		$get = $result->getResult();
		return $get;
	}
	public function getTop($top)
	{
		$db = \Config\Database::connect();
		$sql = "SELECT * FROM `book` ORDER BY `rating` DESC, `reader` DESC, `download` DESC LIMIT ".$top;
		$result = $db->query($sql);
		$get = $result->getResult();
		return $get;
	}
	public function getBook($keyWord)
	{
		return $this->table('book')->like('judul_buku', $keyWord);
	}
}

