<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunallSeeder extends Seeder
{
    public function run()
    {
        $this->call('JenisImunisasiSeeder');
        $this->call('PosyanduSeeder');
        $this->call('PetugasJabatanSeeder');
        $this->call('PetugasSeeder');

        $this->db->table('users')->insert(['username' => 'admin', 'password' => password_hash('admin', PASSWORD_BCRYPT)]);
    }
}
