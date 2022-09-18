<?php

namespace App\Controllers;

use App\Models\AuthorModel;

class Authors extends BaseController
{
    protected $authorModel;

    public function __construct()
    {
        $this->authorModel = new AuthorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Author Registration',
            // 'author' => $this->authorModel->findAll()
            'author' => $this->authorModel->paginate(10, 'author'),
            'pager' => $this->authorModel->pager,
        ];

        return view('authors/index', $data);
    }
}
