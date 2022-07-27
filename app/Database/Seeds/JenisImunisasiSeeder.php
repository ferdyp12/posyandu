<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisImunisasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['singkatan' => 'Hepatitis B', 'nama' => 'HB'],
            ['singkatan' => 'BCG', 'nama' => 'BCG'],
            ['singkatan' => 'MR', 'nama' => 'Campak - Rumbella (MR)'],
            ['singkatan' => 'MR 2', 'nama' => 'Campak - Rumbella (MR) Lanjutan'],
            ['singkatan' => 'IPV', 'nama' => 'Polio Suntik (IPV)'],
            ['singkatan' => 'DPT 1', 'nama' => 'DPT-HB-Hib 1'],
            ['singkatan' => 'DPT 2', 'nama' => 'DPT-HB-Hib 2'],
            ['singkatan' => 'DPT 3', 'nama' => 'DPT-HB-Hib 3'],
            ['singkatan' => 'DPT 4', 'nama' => 'DPT-HB-Hib (Lanjutan)'],
            ['singkatan' => 'PT 1', 'nama' => 'Polio Tetes 1'],
            ['singkatan' => 'PT 2', 'nama' => 'Polio Tetes 2'],
            ['singkatan' => 'PT 3', 'nama' => 'Polio Tetes 3'],
            ['singkatan' => 'PT 4', 'nama' => 'Polio Tetes 4']
        ];

        $this->db->table('jenis_imunisasi')->insertBatch($data);
    }
}
