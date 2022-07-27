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
                'nama' => 'Iko Haryanti',
                'status' => 1
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 2,
                'nama' => 'Vera Wati',
                'status' => 1
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 3,
                'nama' => 'Yeni Suhaeni',
                'status' => 1
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 4,
                'nama' => 'Novi',
                'status' => 1
            ],
            [
                'id_posyandu' => 1,
                'id_petugas_jabatan' => 4,
                'nama' => 'Yanti',
                'status' => 1
            ]
        ];

        $this->db->table('petugas')->insertBatch($data);
    }
}
