<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersForeign extends Migration
{
    public function up()
    {
        $fields = [
            'id_petugas' => [
                'type' => 'INT',
                'after' => 'id_user',
                'null' => TRUE
            ],
            'CONSTRAINT `users_fk_id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas`(`id_petugas`)'
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropForeignKey('users', 'users_fk_id_petugas');
        $this->forge->dropColumn('users', 'id_petugas');
    }
}
