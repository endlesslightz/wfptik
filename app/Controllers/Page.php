<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        $data['nama'] = 'Budi';
        $data['prodi'] = 'PTIK';
        $data['list'] = ['siska', 'jennie', 'rendi'];
        echo view('template/header');
        echo view('home', $data);
        echo view('template/footer');
    }

    public function coba()
    {
        return "Method coba punyanya class Home";
    }
}
