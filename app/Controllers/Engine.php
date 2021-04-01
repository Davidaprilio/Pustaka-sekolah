<?php namespace App\Controllers;
use \App\Models\BukuModel;
use \App\Models\UsersModel;
use \App\Models\BookReaderModel;
use \App\Models\KategoriModel;
use CodeIgniter\I18n\Time;

class Engine extends BaseController
{
	protected $buku, $user, $read, $kate;

	public function __construct()		
	{
		helper('helpmy');
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
		$this->kate = new KategoriModel();
		$this->read = new BookReaderModel();
	}
	public function upBook()
	{
		$test = $this->request->getPost('upload');
		if ( isset($test) ) {
			$sampul = $this->request->getFile('imgSampul');
			$book = $this->request->getFile('book');
			$title = $this->request->getPost('titlebook');
			$writer = $this->request->getPost('writer');
			$kate = $this->request->getPost('Kategori');
			$kateProdi = $this->request->getPost('tag');
			$publisher = $this->request->getPost('publisher');
			$deskr = $this->request->getPost('deskripsi');
			if ( $book->getError() == 4 ) {
				return redirect()->to(base_url('/Petugaspustaka/tambahbuku'));
			} else {
				
				if ( $sampul->getError() == 4 ) {
					$namesampul = 'default.jpg';
				} else {
					$resizeIMG = \Config\Services::image();
					$namebook = $book->getRandomName();
					$slugBook = randomString(3).date('m').randomString(5).date('d');
					$namesampul = date('y').randomString(5).date('md').'.'.$sampul->getClientExtension();

					$book->move('book', $namebook);
					$sampul->move('img/book', $namesampul);
					$resizeIMG->withFile('img/book/'.$namesampul)->resize(350, 250, true)->save('img/book/min/'.$namesampul);
				}

				$data = [
					'file_enc' => $namebook,
					'slug_buku' => $slugBook,
					'author' => 'admin Pustaka',
					'judul_buku' => $title,
					'penulis' => $writer,
					'penerbit' => $publisher,
					'sampul' => $namesampul,
					'kategori' => json_encode($kateProdi),
					'forClass' => $kate,
					'deskripsi' => $deskr,
					'download' => 0,
					'reader' => 0
				];
				$this->buku->insert($data);
				session()->setFlashdata('pesan', 'Buku berhasil di upload');
				return redirect()->to(base_url('/Petugaspustaka/tambahbuku'));
			}
		} else {
			// return redirect()->to(base_url('/Administrator/tambahbuku'));
		}
	}

	public function dropBuku($idBuku)
	{
		$tes = $this->buku->select('file_enc,sampul')->where('slug_buku', $idBuku)->first();
		$this->buku->where('slug_buku', $idBuku)->delete();
		//hapus Sampul
		if ($tes['sampul'] != 'default.jpg') {
			//hapus gambar
			unlink('img/book/' . $tes['sampul']);
			unlink('img/book/min/' . $tes['sampul']);
		}
		unlink('book/'.$tes['file_enc']);
		return redirect()->to(base_url('/Petugaspustaka/kelolabuku'));
	}

	public function addKategori()
	{
		$def = $this->request->getPost('def');
		$val = $this->request->getPost('value');
		helper('text');
		$this->kate->insert([
			'page' => '',
			'kat_grub' => $def,
			'kat_menu' => $val,
			'slugID' => str_replace(' ', '', $val).'@'.random_string('alpha',7),
		]);
		return redirect()->to(base_url('/Petugaspustaka/menu'));
	}

	public function rmKategori($id)
	{
		$this->kate->where('id', $id)->delete();
		return redirect()->to(base_url('/Petugaspustaka/menu'));
	}
	public function likeAndunlike($idBuku,$value)
	{
		$fileBuku = $this->buku->select('rating')->where('slug_buku', $idBuku)->first();
		if ($value == 'plus') {
			$update = (int)$fileBuku['rating'] + 1;
		}elseif ($value == 'min') {
			$update = (int)$fileBuku['rating'] - 1;
		} else {
			return redirect()->to('/Pustaka');
		}
		return $this->buku->set('rating',$update)->where('slug_buku', $idBuku)->update();
	}
	
	public function sycUser($data='bio')
	{
		// $gg = getSession('appsSch', 'userLogin');
		if ($data == 'bio') {
			$dataUser = json_decode(base64_decode($this->request->getGet('tknusr')), true);
			// dd($dataUser);
			if ($dataUser['akun'] == 'siswa') {
				$cek = $this->user->where('idUniq', $dataUser['id'])->first();
				if (is_null($cek)) {
					$save = $this->user->save([
						'idUniq' => $dataUser['id'],
						'nama' => $dataUser['nama_lengkap'],
						'kelas' => $dataUser['kelas'],
						'jk' => $dataUser['gender'],
						'state' => 'online',
						'bookColection' => '{}',
						'bookRead' => '{}',
					]);
				} else {
					$save = $this->user->set([
						'idUniq' => $dataUser['id'],
						'nama' => $dataUser['nama_lengkap'],
						'kelas' => $dataUser['kelas'],
						'jk' => $dataUser['gender'],
						'state' => 'online',
					])->where('id', $cek['id'])->update();
				}
			}
			return redirect()->to(base_url('/'));
		} if ($data == 'status') {
			$this->request->getPost('state');
			$this->user->set('state','baca')->where('idUniq', )->update();
		}
		
	}
 	
 	public function register()
 	{
 		$age = $this->request->getPost('age');
 		$p1 = $this->request->getPost('pass');
 		$p2 = $this->request->getPost('passConfirm');
 		if ( $p1 == $p2) {
			$passHash = password_hash($p1, PASSWORD_DEFAULT);
	 		$data = [
	 			'idUniq' => randomString(7),
	 			'firstName' => $this->request->getPost('fname'),
	 			'lastName' => $this->request->getPost('lname'),
	 			'age' => $age,
	 			'gender' => $this->request->getPost('jk'),
	 			'uname' => $this->request->getPost('uname'),
	 			'pass' => $passHash,
	 			'fromClass' => $this->request->getPost('kelas'),
	 		];
	 		$this->user->insert($data);
 			return redirect()->to(base_url('/Pustaka/login'));
 		} else {
 			return redirect()->to(base_url('/Pustaka/register'));
 		}
 	}

 	public function out()
 	{
 		$this->user->sysUserState();
 		$sesi = getSession('appsSch', 'userLogin');
 		$this->user->set(['state'=>'offline', 'openBook'=>null])->where('idUniq', $sesi['id'])->update();
 		return redirect()->to('http://appsschool.smektaliterasi.com/Akun/keluar/?ke=http://smektaliterasi.com/');
 	}

 	public function endRead(string $idBook, string $idUser)
 	{
 		$sesi = getSession('appsSch', 'userLogin');
 		$this->user->set(['state'=>'online', 'openBook'=>null])->where('idUniq', $idUser)->update();
 	}

 	public function startRead(string $idBook, string $idUser)
	{	
		//update data baca buku di table buku
		$fileBuku = $this->user->set(['state'=>'baca', 'openBook'=>$idBook])->where('idUniq', $idUser)->update();
		$fileBuku = $this->buku->select('reader')->where('slug_buku', $idBook)->first();
		$read = (int)$fileBuku['reader'] + 1;
		$this->buku->set('reader',$read)->where('slug_buku', $idBook)->update();
		//tambah/update data buku yg dibaca user
		$dataU = $this->read->where('idUser', $idUser)->where('idBook', $idBook)->first();
		if (!is_null($dataU)) {
			$data = [
				'id' => $dataU['id'],
			];
		} else {
			$data = [
				'idUser' => $idUser,
				'idBook' => $idBook,
			];
		}
		$data['startTime'] = Time::parse('now', 'Asia/Jakarta')->toTimeString();
		$data['start'] = Time::parse('now', 'Asia/Jakarta')->toTimeString();
		$cek = $this->read->save($data);
		dd($cek);
	}

	public function upReadUser(string $idBook, string $idUser)
	{
		$dataU = $this->read->where('idUser', $idUser)->where('idBook', $idBook)->first();
		if (!is_null($dataU)) {
			$startTime = Time::createFromFormat('H:i:s', $dataU['startTime'], 'Asia/Jakarta');
			$time = Time::createFromFormat('H:i:s', $dataU['time'], 'Asia/Jakarta');
			$timeNow = Time::now('Asia/Jakarta');
			$timeDiff = date_diff($startTime, $timeNow );
			date_add($time, $timeDiff);
			$this->read->save([
				'id' => $dataU['id'],
				'time' => $time->toTimeString(),
				'startTime' => $timeNow->toTimeString(),
			]);
		}
	}

 	// public function loginPetugasPustaka()
 	// {
 	// 	$u = $this->request->getPost('uname');
 	// 	$p = $this->request->getPost('pass');
 	// 	$a = $this->guru->where(['user'=>$u,'rules'=>'petugasPustaka'])->first();
 	// 	if (is_null($a)) {
 	// 		return redirect()->to(base_url('/Petugaspustaka'));
 	// 		exit(0);
 	// 	} else {
 	// 		if (password_verify($p, $a['pass'])) {
 	// 			session()->set('sPetugasPutaka', $a);
 	// 		}else{
 	// 			return redirect()->to(base_url('/Petugaspustaka'));
 	// 		}
 	// 	}
 	// 	return redirect()->to(base_url('/Petugaspustaka/dashboard'));
 	// }
	//--------------------------------------------------------------------

	public function updataTableBuku($idbuku,$fieldTable,$value)
	{
		switch ($fieldTable) {
			case '1':
				$colom = 'judul_buku';
				break;
			case '2':
				$colom = 'penulis';
				break;
			case '3':
				$colom = 'penerbit';
				break;
			case '4':
				$colom = 'deskripsi';
				break;
		}
		$this->buku->ubahData($colom,$value,$idbuku);
	}

	public function datailBookAjax($idBuku)
	{
		helper('helpmy');
		$get = $this->buku->where('slug_buku', $idBuku)->first();
		if (is_null($get)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak dapat ditemukan');
		} 
		$data = [
			'user' => $get,
			'tgl' => tgl_Id(date('Y-m-d', strtotime($get['created_at'])) )
		];
		return view('pustaka/detail', $data);
	}
}