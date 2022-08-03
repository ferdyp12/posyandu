<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanPetugasModel extends Model
{
    protected $table            = 'petugas_jabatan';
    protected $primaryKey       = 'id_petugas_jabatan';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'nama'];
    protected $useTimestamps    = false;
}
