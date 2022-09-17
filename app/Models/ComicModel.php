<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = 'comic'; //table name in db
    protected $useTimestamps = true;
    //allow field that user can fill in
    protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'image'];

    public function getComic($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

}