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
