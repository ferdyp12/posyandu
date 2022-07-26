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
                'nama_ayah' => $faker->name('male'),
                'nik_ayah' => $faker->randomNumber(9),
                'no_telp_ayah' => $faker->phoneNumber,
                'alamat_ayah' => $faker->address,
                'rw_ayah' => '00' . $faker->randomNumber(1),
                'rt_ayah' => '00' . $faker->randomNumber(1),
            ];
            $this->db->table('ayah')->insert($data);
        }
    }
}
