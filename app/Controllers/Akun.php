<?php namespace App\Controllers;
// use \App\Models\APIclientModel;
use \App\Models\DataRegModel;

class Akun extends BaseController
{
	protected $DataReg;
		// $APIclient;

	public function __construct()
	{
		// $this->APIclient = new APIclientModel(); 
		$this->DataReg = new DataRegModel();
	}
	public function dashboard()
	{
		return view('akun');
	}
	public function saya()
	{
		return view('akun/saya');
	}
	public function profile()
	{
		return view('akun');
	}

	public function masuk($keyClient=false)
	{
		$directTo = $this->request->getGet('ke');
		// $dataKey = $this->APIclient->where('keyClient', $keyClient)->first();
		// if ($keyClient == false) {
		// 	$dataKey == true;
		// }
		// if ($dataKey) {
			$data['lanjutke'] = $directTo;
			return view('akun/login', $data);
		// } else {
			// return view('akun/notallow');
		// }
	}
	public function daftar($sesi = null, $nisn = null)
	{
		if (is_null($sesi) || is_null($nisn)) {
			session()->set('loginSesi', 'mcowihf873nfg7w');
			return view('akun/daftar', ['sesi' => 'mcowihf873nfg7w']);
			exit(0);
		} else {
			$s = session()->get('loginSesi');
			session()->destroy('loginSesi');
		}
		$data['user'] = $this->DataReg->where('NISN', $nisn)->first();
		return view('akun/daftar2', $data);
	}
	public function keluar()
	{
		$directPage = $this->request->getGet('ke');
		session()->remove('userLogin');
		// setcookie('tknUOauth', '', time() - 86400, '/', 'davidweb.localhost', false, true);
		return redirect()->to($directPage);
	}
	//--------------------------------------------------------------------

}
