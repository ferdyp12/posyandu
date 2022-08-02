<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePosyandu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_posyandu' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
            ],
        ]);

        $this->forge->addPrimaryKey('id_posyandu');
        $this->forge->createTable('posyandu');
    }

    public function down()
    {
        $this->forge->dropTable('posyandu');
    }
}
