<?php

namespace App\Controllers;


class App extends BaseController
{

	public function index()
	{
		$data = [
			'title' => 'Home',
			'title2' => 'Home',
		];
		return view("pages/home", $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About',
			'title2' => 'About',
		];
		return view('pages/about', $data);
	}

	public function Contact()
	{
		$data = [
			'title' => 'Contact',
			'title2' => 'Contact',
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


	// public function comic()
	// {

	// 	$comic = $this->comicModel->findAll();

	// 	$data = [
	// 		'title' => 'Comic',
	// 		'comic' => $comic
	// 	];

	// 	// $komikModel = new \App\Models\KomikModel();
	// 	// $komikModel = new KomikModel();

	// 	return view('comic/index', $data);
	// }

	// public function add_comic()
	// {
	// 	// session(); dipindah ke BaseController
	// 	$data = [
	// 		'title' => 'Add Comic Form',
	// 		'validation' => \Config\Services::validation()
	// 	];

	// 	return view('comic/add', $data);
	// }

	// public function save_comic()
	// {
	// 	// input validation
	// 	if (!$this->validate([
	// 		// 'title' => 'required|is_unique[comic.title]'
	// 		'title' => [
	// 			'rules' => 'required',
	// 			'errors' => [
	// 				'required' => '{field} comic must be filled.'
	// 				// 'is_unique' => "{field} comic can't filled more than one."
	// 			]
	// 		]
	// 	])) {
	// 		$validation = \Config\Services::validation();
	// 		return redirect()->to('/app/add_comic')->withInput()->with('validation', $validation);
	// 	}

	// 	$slug = url_title($this->request->getVar('title'), '-', true);

	// 	$this->comicModel->save([
	// 		'title' => $this->request->getVar('title'),
	// 		'slug' => $slug,
	// 		'author' => $this->request->getVar('author'),
	// 		'publisher' => $this->request->getVar('publisher'),
	// 		'volume' => $this->request->getVar('volume'),
	// 		'cover' => $this->request->getVar('cover')
	// 	]);

	// 	session()->setFlashData('message', 'New Comic have been added.');

	// 	return redirect()->to('/app/comic');
	// }
}
