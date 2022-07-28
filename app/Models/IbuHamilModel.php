<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuHamilModel extends Model
{
    protected $table            = 'ibu_hamil';
    protected $primaryKey       = 'id_ibu_hamil';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'tinggi_badan', 'berat_badan', 'lingkar_tangan_atas', 'lingkar_perut', 'tekanan_darah', 'denyut_jantung_bayi', 'tanggal_pemeriksaan'];
    protected $useTimestamps    = false;
}
