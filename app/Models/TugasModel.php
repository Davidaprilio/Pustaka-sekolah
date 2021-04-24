<?php namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
	protected $table = 'tugas';
	protected $useTimestamps = true;
	protected $allowedFields = ['kode_tugas', 'id_guru', 'judul', 'deskripsi', 'id_buku', 'id_kelas'];

	public function getInfo()
	{
		$data = $this->query("SELECT kode_tugas,id_guru,judul,deskripsi,id_buku,id_kelas,tugas.created_at,COUNT(kode_kelas) AS JumlahSiswa FROM tugas JOIN user ON tugas.id_kelas=user.kode_kelas")->getResultArray();
		return $data;
	}
		
}
// kode_tugas,id_guru,judul,deskripsi,id_buku,id_kelas,tugas.created_at
// tugas.kode_tugas,tugas.id_guru,tugas.judul,tugas.deskripsi,tugas.id_buku,tugas.id_kelas,tugas
// 3fg34
// SELECT 
// tugas.kode_tugas,tugas.id_guru,tugas.judul,tugas.deskripsi,tugas.id_buku,tugas.id_kelas,
// user.idUniq,user.nama
// FROM tugas 
// JOIN user ON tugas.id_kelas=user.kode_kelas
// JOIN submited ON tugas.kode_tugas=submited.tugas_kode