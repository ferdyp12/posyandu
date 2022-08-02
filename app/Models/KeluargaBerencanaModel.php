<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaBerencanaModel extends Model
{
    protected $table            = 'kb';
    protected $primaryKey       = 'id_kb';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_akseptor', 'tanggal_lahir', 'nama_suami', 'alamat', 'berat_badan', 'tinggi_badan', 'tensi', 'tanggal'];
    protected $useTimestamps    = false;
}
