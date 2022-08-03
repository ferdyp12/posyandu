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
        $this->select(['imunisasi.id_imunisasi', 'imunisasi.id_posyandu', 'anak.nama AS nama_anak', 'jenis_imunisasi.nama AS nama_imunisasi', 'imunisasi.usia_saat', 'imunisasi.tanggal']);
        $this->join('anak', 'anak.id_anak = imunisasi.id_anak');
        $this->join('jenis_imunisasi', 'jenis_imunisasi.id_jenis_imunisasi = imunisasi.id_jenis_imunisasi');
        return $this->paginate($num);
    }

    public function findforUpdate($id_imunisasi)
    {
        $this->select(['imunisasi.*', 'anak.nama AS nama_anak', 'jenis_imunisasi.nama AS nama_imunisasi']);
        $this->join('anak', 'anak.id_anak = imunisasi.id_anak');
        $this->join('jenis_imunisasi', 'jenis_imunisasi.id_jenis_imunisasi = imunisasi.id_jenis_imunisasi');
        return $this->find($id_imunisasi);
    }
}
