<?php namespace App\Controllers;
use \App\Models\DataRegModel;
// use \App\Models\APIclientModel;
use \App\Models\SiswaModel;
use \App\Models\GuruModel;
// use \App\Models\AppsModel;

class OAuth extends BaseController
{
	protected $dataReg;
	// protected $APIclient;
	protected $siswa;
	protected $guru;
	// protected $apps;

	public function __construct()
	{
		$this->dataReg = new DataRegModel();
		// $this->APIclient = new APIclientModel();
		$this->siswa = new SiswaModel();
		$this->guru = new GuruModel();
		// $this->apps = new AppsModel();
	}

	public function login()
	{
		$u = $this->request->getPost('uname');
		$p = $this->request->getPost('pass');
		$nxt = $this->request->getPost('next');
		$siswaC = true;

		if ( $u && $p) {
			$cekData = $this->siswa->where('user', $u)->first();
			if (!$cekData) {
				$cekData = $this->guru->where('user', $u)->first();
				$siswaC = false;
			}
			if (!is_null($cekData)) {
				if (password_verify($p, $cekData['pass'])) {
					//create token json and encode to base64
					if ($siswaC) {
						$dataUser = json_encode([
							'id' => $cekData['idUniq'],
							'nama' => $cekData['nama'],
							'nama_lengkap' => $cekData['nama_lengkap'],
							'fotoprofile' => $cekData['fotoprofile'],
							'gender' => $cekData['JK'],
							'tglLahir' => $cekData['tgl_lahir'],
							'kelas' => $cekData['kelas'],
							'nisn' => $cekData['NISN'],
							'email' => $cekData['email'],
							'alamat' => $cekData['alamat'],
							'akun' => 'siswa',
						]);
					} else {
						$dataUser = json_encode([
							'id' => $cekData['idUniq'],
							'nama' => $cekData['nama'],
							'nama_lengkap' => $cekData['nama_lengkap'],
							'fotoprofile' => $cekData['fotoprofile'],
							'gender' => $cekData['JK'],
							'tglLahir' => $cekData['tgl_lahir'],
							'waliKelas' => $cekData['wali'],
							'NIP' => $cekData['NIP'],
							'email' => $cekData['email'],
							'alamat' => $cekData['alamat'],
							'pengajar' => $cekData['pengajar'],
							'akun' => $cekData['rule'],
						]);

					}
					// $config         = new \Config\Encryption();
					// $config->key    = 'IniKunciSangatRahasia';
					// $config->driver = 'OpenSSL';

					// $encrypter = \Config\Services::encrypter($config);
					// $encToken = $encrypter->encrypt($dataUser);
					$token = base64_encode($dataUser);
					session()->set('userLogin', $token);
					// $tknOauth = base64_encode($encToken);

					// Setting user tsb agar mempunya cookie token yang aktif
					// setcookie('tknUOauth', $tknOauth, time() + 86400, '/', 'project.localhost', false, true);

					if ($nxt == 'myprofile') {
						return redirect()->to(base_url('/'));
					} else {
						return redirect()->to($nxt.'?tknusr='.$token);
					}
					
				} else {
					// pass false
					session()->setFlashdata('validatePass', 'Password salah');
					session()->setFlashdata('oldUname', $u);
					return redirect()->to(base_url('/Akun/masuk?ke='.$nxt));
				}
			} else {
				//user null
				session()->setFlashdata('validateUname', 'User tidak dikenal');
				return redirect()->to(base_url('/Akun/masuk?ke='.$nxt));
			}
		}
		// return redirect()->to($directTo.'/?wtc='.$user);
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
			return view('akun/nextRegis', $data);
		}
	}
	// 0043628501
	public function createnewAccount()
	{
		helper('text');
		$nxt = $this->request->getPost('ke');
		$nisnSiswa = $this->request->getPost('nisn');
		$data = [
			'idUniq' => random_string('alpha',15),
			'nama' => $this->request->getPost('name'),
			'nama_lengkap' => $this->request->getPost('fullname'),
			'fotoprofile' => ($this->request->getPost('jk') == 'L')? 'boy.jpg':'girl.png',
			'jk' => $this->request->getPost('jk'),
			'tgl_lahir' => $this->request->getPost('tglLahir'),
			'kelas' => $this->request->getPost('class'),
			'alamat' => $this->request->getPost('address'),
			'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
			'user' => $this->request->getPost('user'),
			'email' => '',
			'NISN' => $nisnSiswa,
		];
		$hsh = $this->siswa->insert($data);
		$this->dataReg->where('NISN', $nisnSiswa)->delete();
		if ($hsh) {
			view('akun/accCreated');
			// sleep(3000);
			return view('akun/accCreated',['link'=>$nxt]);
		} else {
			//GAGAL
			return redirect()->to(base_url('/Akun/masuk/?ke='.$nxt.'&fail=true'));
		}
		if ($nxt) {
			return redirect()->to(base_url('/Akun/masuk/?ke='.$nxt));
		}
		return redirect()->to(base_url('/Akun/masuk'));
	}
	//--------------------------------------------------------------------
}
