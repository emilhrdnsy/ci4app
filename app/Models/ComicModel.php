<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
  protected $table = 'comic';
  protected $useTimestamps = true;
  protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'volume', 'cover'];
}
