<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthorModel extends Model
{
    protected $table = 'author';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($keyword)
    {
        // $builder = $this->table('author');
        // $builder->like('name', $keyword);
        // return $builder;

        return $this->table('author')->like('name', $keyword)->orLike('address', $keyword);
    }
}
