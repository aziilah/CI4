<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comic'; //table name in db
    // protected $primaryKey = 'id'; //default
    protected $useTimestamps = true;
}