<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'username' => $faker->username,
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
                'telepon' => $faker->phoneNumber,
                'email'    => $faker->email,
                'password' => $faker->password,
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
