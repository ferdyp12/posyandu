<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiDetailModel extends Model
{
    protected $table            = 'imunisasi_detail';
    protected $primaryKey       = 'id_detail_imunisasi';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_imunisasi', 'id_jenis_imunisasi', 'bulan', 'tanggal', 'keterangan'];
    protected $useTimestamps = false;
}
