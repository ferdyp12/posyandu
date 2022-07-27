<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIbu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ibu' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ]
        ]);

        $this->forge->addPrimaryKey('id_ibu');
        $this->forge->createTable('ibu');
    }

    public function down()
    {
        $this->forge->dropTable('ibu');
    }
}
