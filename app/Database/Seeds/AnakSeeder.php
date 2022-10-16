<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnakSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $jk = $faker->randomElement(['Laki - Laki', 'Perempuan']);

            if ($jk == "Laki - Laki") {
                $gender = "male";
            } else {
                $gender = "female";
            }

            $data = [
                'id_posyandu' => 1,
                'id_ayah' => $i + 1,
                'nama' => $faker->name($gender),
                'nik' => $faker->randomNumber(9),
                'anak_ke' => rand(1, 9),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', 'now'),
                'berat_badan_lahir' => $faker->randomFloat(null, 1, 5),
                'tinggi_badan_lahir' => $faker->randomFloat(null, 1, 5),
                'jenis_kelamin' => $jk,
            ];
            $this->db->table('anak')->insert($data);
        }
    }
}
