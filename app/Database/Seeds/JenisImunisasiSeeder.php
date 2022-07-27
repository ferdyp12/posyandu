<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisImunisasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Hepatitis B', 'singkatan' => 'HB'],
            ['nama' => 'BCG', 'singkatan' => 'BCG'],
            ['nama' => 'MR', 'singkatan' => 'Campak - Rumbella (MR)'],
            ['nama' => 'MR 2', 'singkatan' => 'Campak - Rumbella (MR) Lanjutan'],
            ['nama' => 'IPV', 'singkatan' => 'Polio Suntik (IPV)'],
            ['nama' => 'DPT 1', 'singkatan' => 'DPT-HB-Hib 1'],
            ['nama' => 'DPT 2', 'singkatan' => 'DPT-HB-Hib 2'],
            ['nama' => 'DPT 3', 'singkatan' => 'DPT-HB-Hib 3'],
            ['nama' => 'DPT 4', 'singkatan' => 'DPT-HB-Hib (Lanjutan)'],
            ['nama' => 'PT 1', 'singkatan' => 'Polio Tetes 1'],
            ['nama' => 'PT 2', 'singkatan' => 'Polio Tetes 2'],
            ['nama' => 'PT 3', 'singkatan' => 'Polio Tetes 3'],
            ['nama' => 'PT 4', 'singkatan' => 'Polio Tetes 4']
        ];

        $this->db->table('jenis_imunisasi')->insertBatch($data);
    }
}
