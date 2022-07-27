<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAyah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ayah' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ],
            'kk' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'no_telp' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ]
        ]);

        $this->forge->addPrimaryKey('id_ayah');
        $this->forge->createTable('ayah');
    }

    public function down()
    {
        $this->forge->dropTable('ayah');
    }
}
