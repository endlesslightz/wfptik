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

    public function getdata()
    {
        if ($this->request->isAjax()) {
            $userModel = new UserModel();
            $data = [
                'list' => $userModel->findAll()
            ];

            $hasil = [
                'data' => view('admin/user/list', $data)
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

    public function getform()
    {
        if ($this->request->isAjax()) {
            $hasil = [
                'data' => view('admin/user/tambah')
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

    public function insertv2()
    {
        if ($this->request->isAJAX()) {

            $validasi = \Config\Services::validation();
            $valid = $this->validate([
                'namadepan' => [
                    'label' => 'Nama Depan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $pesan = [
                    'error' => [
                        'namadepan' => $validasi->getError('namadepan')
                    ]
                ];
                echo json_encode($pesan);
            } else {
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
                $pesan = [
                    'sukses' => 'Data anggota berhasil diinput'
                ];
                echo json_encode($pesan);
            }
        } else {
            exit('Request salah');
        }
    }

    public function geteditform($id)
    {
        if ($this->request->isAjax()) {
            $userModel = new UserModel();
            $item = $userModel->find($id);
            $nama = explode(" ", $item['nama']);
            $data = [
                'id' => $item['id'],
                'nama_depan' => $nama[0],
                'nama_belakang' => $nama[1],
                'alamat' => $item['alamat'],
                'tempat_lahir' => $item['tempat_lahir'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'telepon' => $item['telepon'],
                'email' => $item['email'],
                'username' => $item['username'],
                'password' => $item['password'],
                'avatar' => $item['avatar']
            ];
            $hasil = [
                'data' => view('admin/user/edit', $data)
            ];
            echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diload');
        }
    }

    public function update($id)
    {
        if ($this->request->isAJAX()) {
            $userModel = new UserModel();
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/img/profil', $namaavatar);
            } else {
                $namaavatar = $this->request->getVar('avalama');
            }

            if ($this->request->getVar('password') != $this->request->getVar('passlama')) {
                $pass = md5($this->request->getVar('password'));
            } else {
                $pass = $this->request->getVar('passlama');
            }

            $input = [
                'id' => $id,
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'tempat_lahir' => $this->request->getVar('tempatlahir'),
                'tanggal_lahir' => $this->request->getVar('tanggallahir'),
                'jenis_kelamin' => $this->request->getVar('jeniskelamin'),
                'telepon' => $this->request->getVar('telepon'),
                'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => $pass,
                'avatar' => $namaavatar
            ];
            $userModel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diupdate'
            ];
            echo json_encode($pesan);
        } else {
            exit('Request salah');
        }
    }

    public function hapus($id)
    {
        if ($this->request->isAjax()) {
            $userModel = new UserModel();
            $userModel->delete($id);

            $pesan = [
                'sukses' => "Data anggota dengan ID=$id berhasil dihapus"
            ];
            echo json_encode($pesan);
        } else {
            exit('Data tidak dapat dihapus');
        }
    }
}
