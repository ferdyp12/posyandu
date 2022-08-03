<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakModel extends Model
{
    protected $table            = 'anak';
    protected $primaryKey       = 'id_anak';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_posyandu', 'id_ayah', 'nama', 'nik', 'anak_ke', 'tempat_lahir', 'tanggal_lahir', 'berat_badan_lahir', 'tinggi_badan_lahir', 'jenis_kelamin'];
    protected $useTimestamps = false;
}
