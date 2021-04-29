<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
		// return "Method index punyanya class Home";
	}

	public function coba()
	{
		return "Method coba punyanya class Home";
	}
}
