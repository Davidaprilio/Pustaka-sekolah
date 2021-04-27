<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
	protected $table = 'tugas';
	protected $useTimestamps = true;
	protected $allowedFields = ['kode_tugas', 'id_guru', 'judul', 'deskripsi', 'id_buku', 'id_kelas'];

	public function getInfo()
	{
		$data = $this->query("SELECT tugas.*,kelas.kelas,book.judul_buku,book.sampul FROM `tugas` JOIN kelas ON tugas.id_kelas=kelas.idkelas JOIN book ON tugas.id_buku=book.slug_buku")->getResultArray();
		return $data;
	}

	public function detail($idTugas)
	{
		$db = \Config\Database::connect();
		$tugas = $this->select('tugas.*,kelas.kelas')->join('kelas', 'tugas.id_kelas = kelas.idkelas')->where('kode_tugas', $idTugas)->get()->getResultArray();
		$buku = $db->table('book')->where('slug_buku', $tugas[0]['id_buku'])->get()->getResultArray();
		$tugas[0]['buku'] = [
			'judul' => $buku[0]['judul_buku'],
			'idBuku' => $buku[0]['slug_buku'],
			'sampul' => $buku[0]['sampul'],
			'size' => $buku[0]['size'],
			'page' => $buku[0]['page'],
		];
		$siswa = $db->table('user')->where('kode_kelas', $tugas[0]['id_kelas'])->get()->getResultArray();
		$tugas[0]['siswa'] = [
			'selesai' => count($siswa),
			'progress' => count($siswa),
			'belum' => count($siswa),
		];
		$in = 0;
		foreach ($siswa as $key) {
			$tugas[0]['siswa']['data'][$in] = [
				'nama' => $key['nama'],
				'id' => $key['idUniq'],
				'foto' => $key['foto'],
				'state' => $key['state'],
				'progress' => ' ',
			];
			$in++;
		}
		return $tugas;
	}
}
