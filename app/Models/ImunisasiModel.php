<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table            = 'imunisasi';
    protected $primaryKey       = 'id_imunisasi';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'id_anak', 'id_jenis_imunisasi', 'tanggal', 'keterangan', 'usia_saat'];
    protected $useTimestamps    = false;

    public function getPaginated($num)
    {
        $this->select([
            "imunisasi.id_imunisasi",
            'imunisasi.id_posyandu',
            'anak.nama AS nama_anak',
            "MAX(imunisasi_detail.tanggal) AS tanggal_terakhir"
        ]);
        $this->join('anak', 'anak.id_anak = imunisasi.id_anak');
        $this->join('imunisasi_detail', 'imunisasi.id_imunisasi = imunisasi_detail.id_imunisasi', 'left');
        $this->groupBy('id_imunisasi');
        return $this->paginate($num);
    }
}
