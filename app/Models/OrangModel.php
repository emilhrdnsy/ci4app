<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
  protected $table = 'orang';
  protected $useTimestamps = true;

  // field yang akan diisi manual
  protected $allowedFields = ['name', 'address'];
}
