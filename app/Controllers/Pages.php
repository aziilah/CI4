<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Web Unpas',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'address' => [
                [
                    'type' => 'Home',
                    'address' => 'Lido Apartment, No 123',
                    'city' => 'Kota Kinabalu'
                ],
                [
                    'type' => 'Office',
                    'address' => 'Cyber Square, No 321',
                    'city' => 'Kota Kinabalu'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
