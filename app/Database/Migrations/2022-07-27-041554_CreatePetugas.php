<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePetugas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_petugas' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_posyandu' => [
                'type' => 'INT',
                'null' => TRUE
            ],
            'id_petugas_jabatan' => [
                'type' => 'INT',
                'null' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ],
            'status' => [
                'type' => 'BOOLEAN',
                'null' => TRUE
            ]
        ]);

        $this->forge->addPrimaryKey('id_petugas');
        $this->forge->createTable('petugas');
    }

    public function down()
    {
        $this->forge->dropTable('petugas');
    }
}
