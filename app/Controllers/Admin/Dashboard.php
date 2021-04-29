<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data =
            [
                'nama' => "Administrator",
                'link' => "dashboard"
            ];
        return view('admin/dashboard', $data);
    }
}
