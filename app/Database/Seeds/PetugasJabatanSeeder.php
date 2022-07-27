<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PetugasJabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Ketua'],
            ['nama' => 'Sekretaris'],
            ['nama' => 'Bendahara'],
            ['nama' => 'Anggota'],
        ];

        $this->db->table('petugas_jabatan')->insertBatch($data);
    }
}
