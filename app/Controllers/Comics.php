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
            'validation' => \Config\Services::validation()
        ];

        return view ('comics/create', $data);
    }

    //handle posted data from create to insert into table
    public function save() {
        // dd($this->request->getVar('title'));
        
        //input validation
        if(!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => 'Please provide a comic {field}!',
                    'is_unique' => 'Comic {field} already registered!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('comics/create')->withInput()->with('validation', $validation);
        }

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
    }

    public function delete($id) 
    {
        $this->comicModel->delete($id);

        //make flash data in index.php
        session()->setFlashdata('warning', 'Data has been deleted!');


        return redirect()->to('/comics/index');
    }

    public function edit($slug) 
    {
        $data = [
            'title' => 'Data Comic Edit Form',
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicModel->getComic($slug)
        ];

        return view ('comics/edit', $data);
    }

    public function update($id) 
    {
      //dd($this->request->getVar());

      //check title and fetch from old data
      $oldComic = $this->comicModel->getComic($this->request->getVar('slug'));
      if($oldComic['title'] == $this->request->getVar('title')) {
        $rule_title = 'required';
      } else {
        $rule_title = 'required|is_unique[comic.title]';
      }

      if(!$this->validate([
        'title' => [
            'rules' => $rule_title,
            'errors' => [
                'required' => 'Please provide a comic {field}!',
                'is_unique' => 'Comic {field} already registered!'
            ]
        ]
    ])) {
        $validation = \Config\Services::validation();
        // dd($validation);
        return redirect()->to('comics/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
    }

      $slug = url_title($this->request->getVar('title'), '-', true);
        //insert to db
        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'author' => $this->request->getVar('author'),
            'publisher' => $this->request->getVar('publisher'),
            'image' => $this->request->getVar('image')

        ]);

        //make flash data in index.php
        session()->setFlashdata('warning', 'Data has been updated!');

        //after save, redirect to index
        return redirect()->to('/comics/index');   
    }

}
