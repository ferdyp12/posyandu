<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisImunisasiModel extends Model
{
    protected $table            = 'jenis_imunisasi';
    protected $primaryKey       = 'id_jenis_imunisasi';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'nama', 'singkatan'];
    protected $useTimestamps    = false;
}
