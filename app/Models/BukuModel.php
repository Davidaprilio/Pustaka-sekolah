<?php namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
	protected $table = 'book';
	protected $useTimestamps = true;
	protected $allowedFields = ['file_enc','slug_buku','author','judul_buku','penulis','penerbit','sampul','hastag','menu','size','page','type','deskripsi','download','reader','rating','status','pesan'];
	protected $db;
	public function getLimit($where,$limit)
	{
		// $kode = str_replace('Formal', '', $where);
		$kode = $where;
		if ($limit == 0) {
			$ddd = $this->table('book')->where('menu', $kode)->findAll();
		} else {
			$ddd = $this->table('book')->where('menu', $kode)->limit($limit)->get()->getResultArray();
		}
		return $ddd;
	}
	public function suggestBook()
	{
		$sql = "SELECT book.slug_buku,book.judul_buku,book.sampul,book.menu FROM `rekomendasi` JOIN book ON rekomendasi.slug_book=book.slug_buku";
		$res = $this->db->query($sql)->getResultArray();
		return $res;
	}
	public function notSuggestBook()
	{
		$sql = "SELECT book.slug_buku,book.judul_buku,book.sampul,book.menu FROM `rekomendasi` LEFT JOIN book ON rekomendasi.slug_book=book.slug_buku WHERE book.slug_buku IS NULL" ;
		$res = $this->db->query($sql)->getResultArray();
		return $res;
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

