<?php

namespace App\Controllers;

use \App\Models\ComicModel;

class Comic extends BaseController
{
  protected $comikModel;
  public function __construct()
  {
    $this->comicModel = new ComicModel();
  }

  public function index()
  {

    $comic = $this->comicModel->findAll();

    $data = [
      'title' => 'Comic',
      'title2' => 'Comic List',
      'comic' => $comic
    ];

    // $komikModel = new \App\Models\KomikModel();
    // $komikModel = new KomikModel();

    return view('comic/index', $data);
  }

  public function add_comic()
  {
    // session(); dipindah ke BaseController
    $data = [
      'title' => 'Add Comic Form',
      'title2' => 'Add Comic Form',
      'validation' => \Config\Services::validation()
    ];

    return view('comic/add', $data);
  }

  public function detail_comic($id)
  {
    $data = [
      'title' => 'Detail Comic',
      'title2' => 'Detail of Comic',
      'comic' => $this->comicModel->where(['id' => $id])->first()
    ];
    return view('comic/detail', $data);
  }

  public function save_comic()
  {
    // input validation
    if (!$this->validate([
      // 'title' => 'required|is_unique[comic.title]'
      'title' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} comic must be filled.'
          // 'is_unique' => "{field} comic can't filled more than one."
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/comic/add_comic')->withInput()->with('validation', $validation);
    }

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

    return redirect()->to('/comic');
  }

  public function delete_comic($id)
  {
    // $comic = new ComicModel();
    // $comic->delete($id);

    $this->comicModel->delete($id);
    session()->setFlashdata('message', 'Deleted comic successfully');
    return redirect()->to('/comic');
  }

  // public function delete($id)
  // {
  //   // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
  //   $hapus = $this->product->delete_product($id);

  //   // Jika berhasil melakukan hapus
  //   if ($hapus) {
  //     // Deklarasikan session flashdata dengan tipe warning
  //     session()->setFlashdata('warning', 'Deleted product successfully');
  //     // Redirect ke halaman product
  //     return redirect()->to(base_url('product'));
  //   }
  // } 
}
