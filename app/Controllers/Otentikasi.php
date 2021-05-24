<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Otentikasi extends BaseController
{

	public function index()
	{
		return view('login');
	}

	public function login()
	{
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$userModel = new UserModel;
		$auth = $userModel->where(['username' => $username])->first();
		if ($auth) {
			$verify_pass = password_verify(md5($password), password_hash($auth['password'], PASSWORD_DEFAULT));
			if ($verify_pass) {
				$sesi = [
					'username'  	=> $auth['username'],
					'id' 			=> $auth['id'],
					'logged_in'     => TRUE
				];
				session()->set($sesi);
				$remember = $this->request->getVar('rememberme');
				if (isset($remember)) {
					// $cookie = [
					// 	'name'   => 'username',
					// 	'value'  => $auth['username'],
					// 	'expire' => time() + (86400 * 15),
					// 	'path'	 => '/'

					// ];
					// set_cookie($cookie);
					$nama = 'username';
					$nilai = $auth['username'];
					$durasi = time() + (86400 * 15);
					$path = "/";
					setcookie($nama, $nilai, $durasi, $path);
				}
				return redirect()->to('/');
			} else {
				session()->setFlashdata('pesan', 'Password salah');
				return redirect()->to('/masuk');
			}
		} else {
			session()->setFlashdata('pesan', 'Username tidak terdaftar!');
			return redirect()->to('/masuk');
		}
	}

	public function logout()
	{
		session()->destroy();
		$nama = 'username';
		$nilai = '';
		$durasi = time() - 3600;
		setcookie($nama, $nilai, $durasi);
		return redirect()->to('/masuk');
	}
}
