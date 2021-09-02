<?php

namespace App\Controllers;

use \App\Models\ComicModel;

class App extends BaseController
{
	protected $comikModel;
	public function __construct()
	{
		$this->comicModel = new ComicModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Home'
		];
		return view("pages/home", $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About'
		];
		return view('pages/about', $data);
	}

	public function Contact()
	{
		$data = [
			'title' => 'Contact',
			'address' => [
				[
					'tipe' => 'Home',
					'alamat' => 'Jl.Mangga',
					'kota' => 'palu'
				]
			]
		];
		return view('pages/contact', $data);
	}


	public function comic()
	{
		$comic = $this->comicModel->findAll();

		$data = [
			'title' => 'Comic',
			'comic' => $comic
		];

		// $komikModel = new \App\Models\KomikModel();
		// $komikModel = new KomikModel();

		return view('comic/index', $data);
	}

	public function add_comic()
	{
		$data = [
			'title' => 'Add Comic Form'
		];

		return view('comic/add', $data);
	}

	public function save_comic()
	{
		$slug = url_title($this->request->getVar('title'), '-', true);

		$this->comicModel->save([
			'title' => $this->request->getVar('title'),
			'slug' => $slug,
			'author' => $this->request->getVar('author'),
			'publisher' => $this->request->getVar('publisher'),
			'volume' => $this->request->getVar('volume'),
			'cover' => $this->request->getVar('cover')
		]);

		session()->setFlashData('message', 'New Comic have been added.');

		return redirect()->to('/app/comic');
	}
}
