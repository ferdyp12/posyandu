<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosyanduSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Posyandu Sawi',
                'alamat' => 'Jl. Miftahul Huda Jl. Hartono Raya No.5, RT.005/RW.005, Cipete, Kec. Pinang, Kota Tangerang, Banten 15142',
                'rt' => '005'
            ],
            [
                'nama' => 'Posyandu Timun',
                'alamat' => 'Jl. Majelis Taklim Al-Mansyuriah, RT.006/RW.005, Cipete, Kec. Pinang, Kota Tangerang, Banten 16969',
                'rt' => '006'
            ],
        ];

        $this->db->table('posyandu')->insertBatch($data);
    }
}
