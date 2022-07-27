<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIbuHamilForeign extends Migration
{
    public function up()
    {
        $fields = [
            'id_ibu' => [
                'type' => 'INT',
                'after' => 'id_ibu_hamil',
                'null' => TRUE
            ],
            'CONSTRAINT `ibuhamil_fk_id_ibu` FOREIGN KEY (`id_ibu`) REFERENCES `ibu`(`id_ibu`)'
        ];
        $this->forge->addColumn('ibu_hamil', $fields);
    }

    public function down()
    {
        $this->forge->dropForeignKey('ibu_hamil', 'ibuhamil_fk_id_ibu');
        $this->forge->dropColumn('ibu_hamil', 'id_ibu');
    }
}
