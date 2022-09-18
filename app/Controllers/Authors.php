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

        //url
        $currentPage = $this->request->getVar('page_author') ? $this->request->getVar('page_author') : 1;

        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $author = $this->authorModel->search($keyword);
        } else {
            $author = $this->authorModel;
        }

        $data = [
            'title' => 'Author Registration',
            // 'author' => $this->authorModel->findAll()
            'author' => $author->paginate(10, 'author'),
            'pager' => $this->authorModel->pager,
            'currentPage' => $currentPage
        ];

        return view('authors/index', $data);
    }
}
