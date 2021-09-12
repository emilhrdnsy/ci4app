<?php

namespace App\Controllers;

use \App\Models\ComicModel;

class Comic extends BaseController
{
  protected $comicModel;
  public function __construct()
  {
    $this->comicModel = new ComicModel();
  }

  public function index()
  {

    // $comic = $this->comicModel->findAll();

    $data = [
      'title'   => 'Comic',
      'title2'  => 'Comic List',
      'comic'   => $this->comicModel->getComic()
    ];

    // $komikModel = new \App\Models\KomikModel();
    // $komikModel = new KomikModel();

    return view('comic/index', $data);
  }

  // ---------------------------------------------------------------------------------------------------------

  public function add_comic()
  {
    // session(); dipindah ke BaseController
    $data = [
      'title'       => 'Add Comic Form',
      'title2'      => 'Add Comic Form',
      'validation'  => \Config\Services::validation()
    ];

    return view('comic/add', $data);
  }

  // ---------------------------------------------------------------------------------------------------------

  public function detail_comic($slug)
  {
    $data = [
      'title'   => 'Detail Comic',
      'title2'  => 'Detail of Comic',
      'comic'   => $this->comicModel->getComic($slug)
    ];
    return view('comic/detail', $data);
  }

  // ---------------------------------------------------------------------------------------------------------

  public function save_comic()
  {
    // input validation
    if (!$this->validate([
      // 'title' => 'required|is_unique[comic.title]'
      'title' => [
        'rules' => 'required|is_unique[comic.title]',
        'errors' => [
          'required' => '{field} comic must be filled.',
          // 'is_unique' => "{field} comic can't filled more than one."
          'is_unique' => "{field} comic have been added."
        ]
      ],
      'author' => [
        'rules' => 'alpha_space',
        'errors' => [
          'alpha_space' => '{field} comic must be fill with alphabetic characters or spaces.'
        ]
      ],
      'volume' => [
        'rules' => 'decimal',
        'errors' => [
          'decimal' => '{field} comic must be fill with a decimal number.'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'image size maximum 1MB.',
          'is_image' => 'selected file is not image.',
          'mime_in' => 'selected file is not image.'
        ]
      ]
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->to('/comic/add')->withInput()->with('validation', $validation);
      return redirect()->to('/comic/add')->withInput();
    }

    // ambil gambar
    $fileCover = $this->request->getFile('cover');

    //jika tidak ada file gambar yang diupload
    if ($fileCover->getError() == 4) {
      $coverName = 'default.png';
    } else {
      // generate nama file
      $coverName = $fileCover->getRandomName();
      // pindahkan file ke folder image
      $fileCover->move('image', $coverName);
      // ambil nama file cover
      // $coverName = $fileCover->getName();
    }


    $slug = url_title($this->request->getVar('title'), '-', true);

    $this->comicModel->save([
      'title'       => $this->request->getVar('title'),
      'slug'        => $slug,
      'author'      => $this->request->getVar('author'),
      'publisher'   => $this->request->getVar('publisher'),
      'volume'      => $this->request->getVar('volume'),
      'cover'       => $coverName
    ]);

    session()->setFlashData('message', 'New Comic have been added.');

    return redirect()->to('/comic');
  }

  // ---------------------------------------------------------------------------------------------------------

  public function delete_comic($id)
  {
    // cari gambar berdasarkan id
    $comic = $this->comicModel->find($id);

    // cek apakah file gambarnya adalah default.png
    if ($comic['cover'] != 'default.png') {
      // hapus gambar
      unlink('img/' . $comic['cover']);
    }
    // $comic = new ComicModel();
    // $comic->delete($id);
    $this->comicModel->delete($id);
    session()->setFlashdata('message', 'Deleted comic successfully');
    return redirect()->to('/comic');
  }

  // ---------------------------------------------------------------------------------------------------------

  public function edit_comic($slug)
  {
    // session(); dipindah ke BaseController
    $data = [
      'title'       => 'Edit Comic Form',
      'title2'      => 'Edit Comic Form',
      'validation'  => \Config\Services::validation(),
      'comic'       => $this->comicModel->getComic($slug)
    ];

    return view('comic/edit', $data);
  }

  // ---------------------------------------------------------------------------------------------------------

  public function update_comic($id)
  {
    // cek judul
    $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));
    if ($oldComic['title'] == $this->request->getVar('title')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[comic.title]';
    }

    // input validation
    if (!$this->validate([
      // 'title' => 'required|is_unique[comic.title]'
      'title' => [
        'rules' => $rule_title,
        'errors' => [
          'required' => '{field} comic must be filled.',
          // 'is_unique' => "{field} comic can't filled more than one."
          'is_unique' => "{field} comic have been added."
        ]
      ],
      'author' => [
        'rules' => 'alpha_space',
        'errors' => [
          'alpha_space' => '{field} comic must be fill with alphabetic characters or spaces.'
        ]
      ],
      'volume' => [
        'rules' => 'decimal',
        'errors' => [
          'decimal' => '{field} comic must be fill with a decimal number.'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'image size maximum 1MB.',
          'is_image' => 'selected file is not image.',
          'mime_in' => 'selected file is not image.'
        ]
      ]
    ])) {
      // $validation = \Config\Services::validation();
      // return redirect()->to('/comic/' . $this->request->getVar('slug') . '/edit')->withInput()->with('validation', $validation);
      return redirect()->to('/comic/' . $this->request->getVar('slug') . '/edit')->withInput();
    }

    $fileCover = $this->request->getFile('cover');

    // cek gambar, apakah tetap gambar lama
    if ($fileCover->getError() == 4) {
      $coverName = $this->request->getVar('oldCover');
    } else {
      // generate nama file random
      $coverName = $fileCover->getRandomName();
      // move gambar
      $fileCover->move('image', $coverName);
      // hapus file yang lama
      unlink('image/' . $this->request->getVar('oldCover'));
    }

    $slug = url_title($this->request->getVar('title'), '-', true);

    $this->comicModel->save([
      'id'        => $id,
      'title'     => $this->request->getVar('title'),
      'slug'      => $slug,
      'author'    => $this->request->getVar('author'),
      'publisher' => $this->request->getVar('publisher'),
      'volume'    => $this->request->getVar('volume'),
      'cover'     => $coverName
    ]);

    session()->setFlashData('message', 'New Comic have been updated.');

    return redirect()->to('/comic');
    // dd($this->request->getVar());
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
