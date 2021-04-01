<?php namespace App\Controllers;
use \App\Models\DocsModel;
use \App\Models\DocsMenuModel;
use \App\Models\DocsPartModel;
use \App\Models\APIclientModel;
use \App\Models\AppsModel;

use CodeIgniter\I18n\Time;

class Dev extends BaseController
{
	protected $docs, $menu, $part, $admin, $dDown;

	public function __construct()
	{
		$this->docs = new DocsModel();
		$this->menu = new DocsMenuModel();
		$this->part = new DocsPartModel();
		$this->dDown = new APIclientModel();
		$this->apps = new AppsModel();
		$this->admin = session()->get('admin');
	}

	public function index()
	{
		return view('devlop/index');
	}
	public function Docs($page = null)
	{
		if (is_null($page)) {
			return view('errors/html/error_404');
			exit(0);
		}
		$list = $this->docs->select('title,slug')->findAll();
		$docConten = $this->docs->where('slug', $page)->first();
		// $menu = $this->menu->where('ondocs', $page)->orderby('sortby','DESC')->findAll();
		$isi = json_decode($docConten['dataIsi'], true);
		$data = [
			'listApi' => $list,
			'doc' => $isi['blocks'],
		];
		return view('devlop/docs', $data);
	}
	public function edit($page)
	{
		$doc = $this->docs->where('slug', $page)->first();
		$data = [
			'id' => $doc['id'],
			'doc' => $doc['dataIsi'],
			'all' => $doc
		];
		return view('devlop/editingDocs', $data);
	}
	//--------------------------------------------------------------------


	public function saveChangeDocsAPI($c = '')
	{
		$dataIsi = $this->request->getPost('docsData');
		$ID = $this->request->getPost('idDocs');

		return $this->docs->update($ID,[
			'dataIsi' => base64_decode($dataIsi)
		]);
	}

	public function newDocs($title)
	{
		helper('text');
		$s = str_replace(' ', '_', $title);
		$this->part->save([
			'conten' => '<h1>'.$title.'</h1>',
			'onpart' => 1,
			'iddocs' => $s,
		]);
		$this->docs->save([
			'slug' => $s,
			'title' => $title,
			'iddocs' => random_string('alnum', 20)
		]);
		return true;
	}

	public function uploadFile()
	{
		$data = [
			"success" => 1,
			"file" => [
				"data" => "sekarang kosong",
				"data2" => "ok",
				"data2" => "ok",
				"data2" => "ok",
			]
		];
		$jsonResponse = json_encode($data);
		echo $jsonResponse;
	}

	public function getMenuDdown()
	{
		$menu = $this->apps->findAll();
		$json = json_encode($menu);
		header('Access-Control-Allow-Origin : http://mysite.com')
		echo $json;
	}
}