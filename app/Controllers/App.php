<?php

namespace App\Controllers;

use \App\Models\KomikModel;

class App extends BaseController
{
	protected $komikModel;
	public function __construct()
	{
		$this->komikModel = new KomikModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Beranda'
		];
		return view("pages/beranda", $data);
	}

	public function tentang()
	{
		$data = [
			'title' => 'Tentang'
		];
		return view('pages/tentang', $data);
	}

	public function kontak()
	{
		$data = [
			'title' => 'Kontak',
			'alamat' => [
				[
					'tipe' => 'Rumah',
					'alamat' => 'Jl.Mangga',
					'kota' => 'palu'
				]
			]
		];
		return view('pages/kontak', $data);
	}

	public function komik()
	{
		$komik = $this->komikModel->findAll();

		$data = [
			'title' => 'Komik',
			'komik' => $komik
		];

		// $komikModel = new \App\Models\KomikModel();
		// $komikModel = new KomikModel();

		return view('pages/komik', $data);
	}

	public function detailkomik()
	{
		$data = [
			'title' => 'Detail Komik'

		];

		return view('pages/detailkomik', $data);
	}
}
