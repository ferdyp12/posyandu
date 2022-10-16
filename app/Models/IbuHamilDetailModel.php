<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuHamilDetailModel extends Model
{
    protected $table            = 'ibu_hamil_detail';
    protected $primaryKey       = 'id_ibu_hamil_detail';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_ibu_hamil', 'trisemester', 'timbang', 'ukur_lingkar_lengan_atas', 'tekanan_darah', 'periksa_tinggi_rahim', 'periksa_letak_dan_denyut_jantung_janin', 'status_dan_imunisasi_tetanus', 'konseling', 'skrining_dokter'];
    protected $useTimestamps = false;
}
