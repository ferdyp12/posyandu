<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anak' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_ayah' => [
                'type' => 'INT',
                'null' => TRUE
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '192',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '64',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'berat_badan_lahir' => [
                'type' => 'DOUBLE'
            ],
            'tinggi_badan_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
            ]
        ]);

        $this->forge->addPrimaryKey('id_anak');
        $this->forge->createTable('anak');
    }

    public function down()
    {
        $this->forge->dropTable('anak');
    }
}
