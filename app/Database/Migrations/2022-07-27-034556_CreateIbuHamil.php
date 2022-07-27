<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIbuHamil extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ibu_hamil' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'tinggi_badan' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'berat_badan' => [
                'type' => 'DOUBLE'
            ],
            'lingkar_tangan_atas' => [
                'type' => 'VARCHAR',
                'constraint' => '8'
            ],
            'lingkar_perut' => [
                'type' => 'VARCHAR',
                'constraint' => '8'
            ],
            'tekanan_darah' => [
                'type' => 'VARCHAR',
                'constraint' => '8'
            ],
            'denyut_jantung_bayi' => [
                'type' => 'VARCHAR',
                'constraint' => '64'
            ],
            'tgl_pemeriksaan' => [
                'type' => 'DATE'
            ],
        ]);

        $this->forge->addPrimaryKey('id_ibu_hamil');
        $this->forge->createTable('ibu_hamil');
    }

    public function down()
    {
        $this->forge->dropTable('ibu_hamil');
    }
}
