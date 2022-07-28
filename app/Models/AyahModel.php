<?php

namespace App\Models;

use CodeIgniter\Model;

class AyahModel extends Model
{
    protected $table            = 'ayah';
    protected $primaryKey       = 'id_ayah';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    =  ['nama', 'kk', 'nik', 'no_telp', 'alamat', 'rw', 'rt'];
    protected $useTimestamps = false;
}
