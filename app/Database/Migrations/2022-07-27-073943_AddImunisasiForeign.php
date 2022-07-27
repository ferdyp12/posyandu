<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImunisasiForeign extends Migration
{
    public function up()
    {
        $field1 = [
            'id_anak' => [
                'type' => 'INT',
                'after' => 'id_imunisasi',
                'null' => TRUE
            ],
            'CONSTRAINT `imunisasi_fk_id_anak` FOREIGN KEY (`id_anak`) REFERENCES `anak`(`id_anak`)',
        ];
        $this->forge->addColumn('imunisasi', $field1);

        $field2 = [
            'id_jenis_imunisasi' => [
                'type' => 'INT',
                'after' => 'id_anak',
                'null' => TRUE
            ],
            'CONSTRAINT `imunisasi_fk_id_jenis_imunisasi` FOREIGN KEY (`id_jenis_imunisasi`) REFERENCES `jenis_imunisasi`(`id_jenis_imunisasi`)'
        ];
        $this->forge->addColumn('imunisasi', $field2);
    }

    public function down()
    {
        $this->forge->dropForeignKey('imunisasi', 'imunisasi_fk_id_anak');
        $this->forge->dropForeignKey('imunisasi', 'imunisasi_fk_id_jenis_imunisasi');
        $this->forge->dropColumn('imunisasi', 'id_anak');
        $this->forge->dropColumn('imunisasi', 'id_jenis_imunisasi');
    }
}
