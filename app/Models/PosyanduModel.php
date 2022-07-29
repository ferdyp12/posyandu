<?php

namespace App\Models;

use CodeIgniter\Model;

class PosyanduModel extends Model
{
    protected $table            = 'posyandu';
    protected $primaryKey       = 'id_posyandu';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'alamat', 'rt'];
    protected $useTimestamps    = false;
}
