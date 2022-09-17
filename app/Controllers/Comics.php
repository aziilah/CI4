<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comics extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }

    public function index()
    {
        // $comic = $this->comicModel->findAll();

        $data = [
            'title' => 'Register Comic',
            'comic' => $this->comicModel->getComic()
        ];

        // //method to connect db without model
        // $db = \Config\Database::connect();
        // $comic = $db->query("SELECT * FROM comic");
        // foreach($comic->getResultArray() as $row) {
        //     d($row);
        // }
        
        return view('comics/index', $data);
    }

    public function detail($slug) {
        
        $data = [
           'title' => 'Comic Details',
           'comic' => $this->comicModel->getComic($slug)
        ];

        //if comic not available in table
        if(empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comic Title ' . $slug . ' is not found!');
        }
        return view ('comics/detail', $data);
    }

    public function create() {
        $data = [
            'title' => 'Data Comic Form',
            // 'comic' => $this->comicModel->getComic()
        ];

        return view ('comics/create', $data);
    }

    //handle posted data from create to insert into table
    public function save() {
        // dd($this->request->getVar('title'));

        $slug = url_title($this->request->getVar('title'), '-', true);
        //insert to db
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'image' => $this->request->getVar('image')

        ]);

        //make flash data in index.php
        session()->setFlashdata('warning', 'Data has been added!');

        //after save, redirect to index
        return redirect()->to('/comics/index');

        // return view ('comics/save');
        
    }
}
