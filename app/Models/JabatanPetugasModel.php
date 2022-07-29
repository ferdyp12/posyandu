<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanPetugasModel extends Model
{
    protected $table            = 'petugas_jabatan';
    protected $primaryKey       = 'id_petugas_jabatan';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama'];
    protected $useTimestamps    = false;
}
