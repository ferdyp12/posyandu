<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImunisasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_imunisasi' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'id_anak' => [
                'type' => 'INT',
                'null' => TRUE
            ],
            'id_jenis_imunisasi' => [
                'type' => 'INT',
                'null' => TRUE
            ],
            'tanggal' => [
                'type' => 'DATE'
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'usia_saat' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ]
        ]);

        $this->forge->addPrimaryKey('id_imunisasi');
        $this->forge->createTable('imunisasi');
    }

    public function down()
    {
        $this->forge->dropTable('imunisasi');
    }
}
