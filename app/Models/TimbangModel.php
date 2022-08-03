<?php

namespace App\Models;

use CodeIgniter\Model;

class TimbangModel extends Model
{
    protected $table            = 'timbang';
    protected $primaryKey       = 'id_timbang';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'id_anak', 'berat_badan', 'tinggi_badan', 'keterangan', 'tanggal'];
    protected $useTimestamps    = false;

    public function getPaginated($num)
    {
        $this->select(['timbang.id_timbang', 'timbang.id_anak', 'anak.nama AS nama_anak', 'timbang.tanggal']);
        $this->join('anak', 'anak.id_anak = timbang.id_anak');
        return $this->paginate($num);
    }

    public function findforUpdate($id_timbang)
    {
        $this->select(['timbang.*', 'anak.nama AS nama_anak']);
        $this->join('anak', 'anak.id_anak = timbang.id_anak');
        return $this->find($id_timbang);
    }
}
