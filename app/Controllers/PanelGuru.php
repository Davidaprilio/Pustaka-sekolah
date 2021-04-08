<?php namespace App\Controllers;
use \App\Models\BukuModel;
use \App\Models\UsersModel;
use \App\Models\KategoriModel;
use \App\Models\BookReaderModel;
use CodeIgniter\I18n\Time;


class PanelGuru extends BaseController
{
	protected $buku, $user, $theme, $kategori, $reader, $dataAdmin;

	public function __construct()
	{
		helper('helpmy');
		// $sesi = getSession('appsPtgLog', 'loginPetugas');
		// // dd($sesi);
		// // dd( session('appsPtgLog') );
		// if (is_null( $sesi )) {
		// 	// if ( $_SERVER['REQUEST_URI'] == '/Petugaspustaka' ) {
		// 		direct('http://appsschool.smektaliterasi.com/Authorize/Petugas/Pustaka');
		// 	// }
		// }
		// $this->dataAdmin = $sesi;
		$this->buku = new BukuModel();
		$this->user = new UsersModel();
		$this->reader = new BookReaderModel();
		$this->kategori = new KategoriModel();
		$sys = new \App\Models\Sys();
		$get = $sys->select('value')->where('keyword','themeAdmin')->first();
		$this->theme = $get['value'];
	}
	public function dashboard()
	{
		helper('text');
	    $result = curl_getAPI('http://appsschool.smektaliterasi.com/API/kelas');
	    $jsonKelas = json_decode($result, true);

	    $filter = $this->request->getGet('filter');
	    if (isset($_POST['key']) && !is_null($filter)) {
	    	$keyw = $this->request->getPost('key');
		    $dataUser = $this->user->filter($filter, $jsonKelas, $keyw);
	    } else if (isset($_POST['key'])) {
	    	$keyw = $this->request->getPost('key');
		    $dataUser = $this->user->like('nama', $keyw)->findAll();
	    } else if (!is_null($filter)) {
		    $dataUser = $this->user->filter($filter, $jsonKelas);
	    } else {
		    $dataUser = $this->user->findAll();
	    }
		$no = 0;
	    foreach ($dataUser as $key) {
	    	if ($key['state'] == 'baca') {
	    		$result = $this->reader->select('bookReader.startTime, bookReader.time, bookReader.start, book.judul_buku, book.sampul')->where('idUser',$key['idUniq'])->where('idBook',$key['openBook'])->join('book','book.slug_buku = bookReader.idBook')->first();
	    		$timeS = $result['startTime'];
	    		$timeR = $result['time'];
	    		$timeST = $result['start'];
	    		$bookT = ellipsize($result['judul_buku'], 20);
	    		$bookIMG = $result['sampul'];
	    	}
	    	else {
	    		$timeS = null;
	    		$timeR = null;
	    		$timeST = null;
	    		$bookIMG = null;
	    		$bookT = null;
	    	}
	    	$dataUser[$no]['startTime'] = $timeS;
	    	$dataUser[$no]['readTime'] = $timeR;
	    	$dataUser[$no]['start'] = $timeST;
	    	$dataUser[$no]['sampulBuku'] = $bookIMG;
	    	$dataUser[$no]['judulBuku'] = $bookT;
	    	$no++;
	    }
		$data = [
			'tema' => $this->theme,
			'dataKelas' => $jsonKelas['items'],
			'users' => $dataUser,
			'filter' => $filter,
		];

		return view('panel_guru/dashboard', $data);
	}
}
