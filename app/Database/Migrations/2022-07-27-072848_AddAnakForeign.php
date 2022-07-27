<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAnakForeign extends Migration
{
    public function up()
    {
        $fields = [
            'id_ayah' => [
                'type'  => 'INT',
                'after' => 'id_anak',
                'null'  => TRUE
            ],
            'CONSTRAINT `anak_fk_id_ayah` FOREIGN KEY (`id_ayah`) REFERENCES `ayah`(`id_ayah`)'
        ];
        $this->forge->addColumn('anak', $fields);
    }

    public function down()
    {
        $this->forge->dropForeignKey('anak', 'anak_fk_id_ayah');
        $this->forge->dropColumn('anak', 'id_ayah');
    }
}
