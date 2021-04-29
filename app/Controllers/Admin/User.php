<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{

    public function index()
    {
        $userModel = new UserModel();
        $data =
            [
                'nama' => "Administrator",
                'link' => "user",
                'list' => $userModel->FindAll(),
            ];
        return view('admin/user/user', $data);
    }

    public function detail($username)
    {
        $userModel = new UserModel();
        $data =
            [
                'nama' => "Administrator",
                'link' => "user",
                'item' => $userModel->where(['username' => $username])->first(),
            ];
        return view('admin/user/detail', $data);
    }

    public function create()
    {
        $data =
            [
                'nama' => "Administrator",
                'link' => "user"
            ];
        return view('admin/user/form', $data);
    }

    public function insert()
    {
        $userModel = new UserModel();
        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $namaavatar = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/img/profil', $namaavatar);
        } else {
            $namaavatar = 'default.jpg';
        }

        $input = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempatlahir'),
            'tanggal_lahir' => $this->request->getVar('tanggallahir'),
            'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar
        ];
        $userModel->save($input);

        session()->setFlashdata('label', 'Data anggota berhasil ditambahkan');
        return redirect()->to('/admin/user');
    }
}
