<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comic'; //table name in db
    // protected $primaryKey = 'id'; //default
    protected $useTimestamps = true;

    public function getComic($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug]) -> first();
    }

}