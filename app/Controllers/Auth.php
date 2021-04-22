<?php namespace App\Controllers;
use \App\Models\DataRegModel;
use \App\Models\UsersModel;
use \App\Models\GuruModel;
// use \App\Models\APIclientModel;
// use \App\Models\AppsModel;

class Auth extends BaseController
{
	protected $dataReg;
	protected $Users;
	protected $Guru;
	// protected $APIclient;
	// protected $apps;

	public function __construct()
	{
		$this->dataReg = new DataRegModel();
		$this->Users = new UsersModel();
		$this->Guru = new GuruModel();
		// $this->APIclient = new APIclientModel();
		// $this->apps = new AppsModel();
	}

	public function daftar()
	{
		$nisn = $this->request->getPost('nisn');
		$nxtPage = $this->request->getPost('nxtPage');
		if (!isset($nisn)) {
			return redirect()->to(base_url('/Pustaka'));
		}
		$user = $this->dataReg->where('NISN', $nisn)->first();
		if (is_null($user)) {
			return 'false';
		} else {
			$data['dataReg'] = $user;
			if (isset($nxtPage)) {
				$data['nxtP'] = $nxtPage;
			}
			$data['dataReg'] = $user;
			return view('layout/nextRegis', $data);
		}
	}

	// 0043628501
	public function newAccount()
	{
		helper('text');
		$nxt = $this->request->getPost('ke');
		$nisnSiswa = $this->request->getPost('nisn');
		$data = [
			'jk' => $this->request->getPost('jk'),
			'nama' => $this->request->getPost('name'),
			'NISN' => $nisnSiswa,
			'foto' => ($this->request->getPost('jk') == 'L')? 'boy.jpg':'girl.png',
			'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
			'kelas' => $this->request->getPost('class'),
			'uname' => $this->request->getPost('user'),
			'state' => 'offline',
			'idUniq' => random_string('alpha',15),
			'panggilan' => $this->request->getPost('fullname'),
		];
		$hsh = $this->Users->insert($data);
		$this->dataReg->where('NISN', $nisnSiswa)->delete();
		if ($hsh) {
			view('akun/accCreated');
			// sleep(3000);
			return redirect()->to(base_url('/Login'));
		} else {
			//GAGAL
			return redirect()->to(base_url('/Register'))->with('fail','Maaf ada yang salah');
		}
	}

	public function login()
	{
		$to = $this->request->getPost('direct');
		$u = $this->request->getPost('uname');
		$p = $this->request->getPost('pass');
		$get = $this->Users->where('uname', $u)->first();
		if ($get) {
			if ( password_verify($p, $get['pass']) ) {
				$data = [
					'role' => 'siswa',
					'nama' => $get['nama'],
					'panggilan' => $get['panggilan'],
					'id' => $get['idUniq'],
					'foto' => $get['foto'],
					'jk' => $get['jk'],
				];
				$this->Users->set('state', 'online')->where('idUniq', $get['idUniq'])->update();
				session()->set('userLogin', $data);
				return redirect()->to(base_url('/'));
			} else {
				# password salah
				return redirect()->back()->with('failPass', 'Password salah')->withInput();
			}
		} else {
			return redirect()->back()->with('failUname', 'username tidak ada')->withInput();
			# username gak ada
		}
	}

	public function out($nameSession = 'userLogin')
	{
		if ($nameSession == 'userLogin') {
			$sesi = session()->get($nameSession);
			if ($sesi) {
				session()->destroy();
				$this->Users->set(['state'=>'offline', 'openBook'=>null])->where('idUniq', $sesi['id'])->update();
			}
			return redirect()->to(base_url('/'));
		} else if ($nameSession == 'adminApp') {
			session()->destroy();
			return redirect()->to(base_url('/'));
		}
	}
	//-----------------------  Admin  -----------------------

	public function admin()
	{
		$u = $this->request->getPost('uname');
		$p = $this->request->getPost('pass');
		$get = $this->Guru->where('role', 'admin')->where('uname', $u)->first();
		if ($get) {
			if (password_verify($p, $get['pass'])) {
				$data = [
					'nama' => $get['nama'],
					'id' => $get['slug'],
					'foto' => $get['foto'],
				];
				session()->set('adminApp', $data);
				return redirect()->to(base_url('/Petugaspustaka/dashboard'));
			}
		}
		return redirect()->back();
	}
}
