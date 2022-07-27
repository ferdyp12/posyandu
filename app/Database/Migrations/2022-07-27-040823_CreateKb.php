<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kb' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_akseptor' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE'
            ],
            'nama_suami' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'berat_badan' => [
                'type' => 'DOUBLE'
            ],
            'tinggi_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '4'
            ],
            'tensi' => [
                'type' => 'DOUBLE'
            ],
            'tanggal' => [
                'type' => 'DATE'
            ]
        ]);

        $this->forge->addPrimaryKey('id_kb');
        $this->forge->createTable('kb');
    }

    public function down()
    {
        $this->forge->dropTable('kb');
    }
}
