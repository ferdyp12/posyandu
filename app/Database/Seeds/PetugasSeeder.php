<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 1,
                'nama' => 'Iko Haryanti'
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 2,
                'nama' => 'Vera Wati'
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 3,
                'nama' => 'Yeni Suhaeni'
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 4,
                'nama' => 'Novi'
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 4,
                'nama' => 'Yanti'
            ]
        ];

        $this->db->table('petugas')->insertBatch($data);
    }
}
