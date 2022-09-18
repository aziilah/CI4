<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = 'author';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];
}
