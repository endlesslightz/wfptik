<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data =
            [
                'nama' => "Administrator",
                'link' => "about"
            ];
        return view('admin/about', $data);
    }
}
