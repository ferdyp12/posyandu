<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimbangForeign extends Migration
{
    public function up()
    {
        $fields = [
            'id_anak' => [
                'type' => 'INT',
                'after' => 'id_timbang',
                'null' => TRUE
            ],
            'CONSTRAINT `timbang_fk_id_anak` FOREIGN KEY (`id_anak`) REFERENCES `anak`(`id_anak`)'
        ];
        $this->forge->addColumn('timbang', $fields);
    }

    public function down()
    {
        $this->forge->dropForeignKey('timbang', 'timbang_fk_id_anak');
        $this->forge->dropColumn('timbang', 'id_anak');
    }
}
