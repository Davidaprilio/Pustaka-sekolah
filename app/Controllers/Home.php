<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// return redirect()->to(base_url('/Pustaka'));
		// return view('home/index');
		$pass = password_hash('admin123', PASSWORD_DEFAULT);
		$faker = \Faker\Factory::create('id_ID');
		dd($pass);
	}
	public function user()
	{
	}
	//--------------------------------------------------------------------

}