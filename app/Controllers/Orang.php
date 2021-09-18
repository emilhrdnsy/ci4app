<?php

namespace App\Controllers;

use \App\Models\OrangModel;

class Orang extends BaseController
{
  protected $orangModel;
  public function __construct()
  {
    $this->orangModel = new OrangModel();
  }

  public function index()
  {

    // $comic = $this->comicModel->findAll();
    $data = [
      'title'   => 'Orang',
      'title2'  => 'Orang List',
      // 'comic'   => $this->orang->getComic()
      'orang' => $this->orangModel->paginate(5),
      'pager' => $this->orangModel->pager

    ];

    // $komikModel = new \App\Models\KomikModel();
    // $komikModel = new KomikModel();

    return view('orang/index', $data);
  }

  // ---------------------------------------------------------------------------------------------------------



}
