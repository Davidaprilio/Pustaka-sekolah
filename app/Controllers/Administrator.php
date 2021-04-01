<?php namespace App\Controllers;
use \App\Models\DataRegModel;
use \App\Models\SiswaModel;
use \App\Models\GuruModel;
use \App\Models\BukuModel;

class Administrator extends BaseController
{
	protected $dataReg, $siswa, $guru, $buku;

	public function __construct()
	{
		$this->dataReg = new DataRegModel();
		$this->siswa = new SiswaModel();
		$this->guru = new GuruModel();
		$this->buku = new BukuModel();
		helper('helpmy');
		if ( is_null( session()->get('admin') ) ) {
			if ( $_SERVER['REQUEST_URI'] != '/Administrator/login') {
				direct(base_url('Administrator/login'));
			}
		}
	}
	public function dashboard()
	{
		$data = [
			'admin' => session()->get('admin'),
		];
		return view('admin/dashboard', $data);
	}
	public function guruman()
	{
		$data = [
			'guru' => $this->guru->select('idUniq,nama_lengkap,wali,pengajar,jk,NIP')->findAll(),
			'admin' => session()->get('admin'),
		];
		return view('admin/guruManager',$data);
	}
	public function login()
	{
		if (session()->get('admin')) {
			return redirect()->to(base_url('/Administrator/dashboard'));
			exit(0);
		}
		$u = $this->request->getPost('uname');
		$p = $this->request->getPost('pass');
		$nxt = $this->request->getPost('next');
		if ($u && $p) {
			$cek = $this->guru->where(['user'=>$u,'rules'=>'admin'])->first();
			if (!is_null($cek)) {
				if (password_verify($p, $cek['pass'])) {
					session()->set([
						'admin' => [
							'nama' => $cek['nama_lengkap'],
							'foto' => $cek['fotoprofile'],
							'email' => $cek['email'],
							'NIP' => $cek['NIP'],
						]
					]);
					return redirect()->to( base_url('Administrator/dashboard') );
				} else {
					$data['pesan'] = 'Username atau Password Salah';
					return view('admin/login',$data);
					exit();
				}
			} else {
				//Gagal Login
				$data['pesan'] = 'Username atau Password Salah';
				return view('admin/login',$data);
			}
		} else {
			return view('admin/login');
		}
	}
	public function importUserReg()
	{
		$c = $this->request->getPost('cek');
		if (isset($c)) {
			$file = $this->request->getFile('tabel');
			helper('xlsReader');
			dd($file);
		} else {
			return view('admin/uplodTableUser');
		}

	}
	//--------------------------------------------------------------------
	public function uptable()
	{
		
	}
	public function updataGuru()
	{
		$this->request->getPost();
	}
	
}
