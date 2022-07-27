<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AyahSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 35; $i++) {
            $data = [
                'nama' => $faker->name('male'),
                'nik' => $faker->randomNumber(9),
                'no_telp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'rw' => '00' . $faker->randomNumber(1),
                'rt' => '00' . $faker->randomNumber(1),
            ];
            $this->db->table('ayah')->insert($data);
        }
    }
}
