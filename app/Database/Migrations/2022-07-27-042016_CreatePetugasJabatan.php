<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePetugasJabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_petugas_jabatan' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
            ]
        ]);

        $this->forge->addPrimaryKey('id_petugas_jabatan');
        $this->forge->createTable('petugas_jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('petugas_jabatan');
    }
}
