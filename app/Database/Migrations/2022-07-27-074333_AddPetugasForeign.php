<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPetugasForeign extends Migration
{


    public function up()
    {
        $field1 = [
            'id_posyandu' => [
                'type' => 'INT',
                'after' => 'id_petugas',
                'null' => TRUE
            ],
            'CONSTRAINT `imunisasi_fk_id_posyandu` FOREIGN KEY (`id_posyandu`) REFERENCES `posyandu`(`id_posyandu`)',
        ];
        $this->forge->addColumn('petugas', $field1);

        $field2 = [
            'id_petugas_jabatan' => [
                'type' => 'INT',
                'after' => 'id_posyandu',
                'null' => TRUE
            ],
            'CONSTRAINT `imunisasi_fk_id_petugas_jabatan` FOREIGN KEY (`id_petugas_jabatan`) REFERENCES `petugas_jabatan`(`id_petugas_jabatan`)'
        ];
        $this->forge->addColumn('petugas', $field2);
    }

    public function down()
    {
        $this->forge->dropForeignKey('petugas', 'imunisasi_fk_id_posyandu');
        $this->forge->dropForeignKey('petugas', 'imunisasi_fk_id_petugas_jabatan');
        $this->forge->dropColumn('petugas', 'id_posyandu');
        $this->forge->dropColumn('petugas', 'id_petugas_jabatan');
    }
}
