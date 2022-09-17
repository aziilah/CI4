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
        $comic = $this->comicModel->findAll();

        $data = [
            'title' => 'Register Comic',
            'comic' => $comic
        ];

        // //method to connect db without model
        // $db = \Config\Database::connect();
        // $comic = $db->query("SELECT * FROM comic");
        // foreach($comic->getResultArray() as $row) {
        //     d($row);
        // }

        
        return view('comics/index', $data);
    }
}
