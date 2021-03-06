<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
  protected $table = 'comic';
  protected $useTimestamps = true;

  // field yang akan diisi manual
  protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'volume', 'cover'];

  public function getComic($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }
}
