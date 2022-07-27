<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimbang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_timbang' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'berat_badan' => [
                'type' => 'DOUBLE'
            ],
            'tinggi_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'keterangan' => [
                'type' => 'TEXT'
            ],
            'tanggal' => [
                'type' => 'DATE'
            ]
        ]);

        $this->forge->addPrimaryKey('id_timbang');
        $this->forge->createTable('timbang');
    }

    public function down()
    {
        $this->forge->dropTable('timbang');
    }
}
