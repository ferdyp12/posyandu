<?php

namespace App\Models;

use CodeIgniter\Model;

class IbuHamilModel extends Model
{
    protected $table            = 'ibu_hamil';
    protected $primaryKey       = 'id_ibu_hamil';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'nama', 'tinggi_badan', 'berat_badan', 'tanggal_pemeriksaan'];
    protected $useTimestamps    = false;
}
