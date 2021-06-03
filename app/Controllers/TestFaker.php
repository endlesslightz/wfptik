<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestFaker extends BaseController
{

    public function index()
    {
        $faker = \Faker\Factory::create('id_ID');
        d($faker->name);
        d($faker->address);
        d($faker->city);
        d($faker->date($format = 'Y-m-d', $max = 'now'));
        d($faker->randomElement(['laki-laki', 'perempuan']));
        d($faker->phoneNumber);
        d($faker->email);
        d($faker->password);
        d($faker->imageUrl($width = 640, $height = 480));
    }
}
