<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisImunisasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_imunisasi' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '64'
            ],
            'singkatan' => [
                'type' => 'VARCHAR',
                'constraint' => '8'
            ]
        ]);

        $this->forge->addPrimaryKey('id_jenis_imunisasi');
        $this->forge->createTable('jenis_imunisasi');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_imunisasi');
    }
}
