<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_petugas';
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_posyandu', 'id_petugas_jabatan', 'nama'];
    protected $useTimestamps    = false;

    public function getPaginated($num)
    {
        $this->select(['petugas.id_petugas', 'petugas.id_posyandu', 'petugas.nama', 'petugas_jabatan.nama AS jabatan', 'users.username']);
        $this->join('posyandu', 'posyandu.id_posyandu = petugas.id_posyandu');
        $this->join('users', 'users.id_petugas = petugas.id_petugas');
        $this->join('petugas_jabatan', 'petugas_jabatan.id_petugas_jabatan = petugas.id_petugas_jabatan');
        $this->where('petugas.id_posyandu', auth()->id_posyandu);
        return $this->paginate($num);
    }

    public function findforUpdate($id_petugas)
    {
        $this->select(['petugas.id_petugas', 'petugas.id_posyandu', 'petugas.id_petugas_jabatan', 'petugas.nama', 'petugas_jabatan.nama AS jabatan', 'users.id_user', 'users.username']);
        $this->join('posyandu', 'posyandu.id_posyandu = petugas.id_posyandu');
        $this->join('users', 'users.id_petugas = petugas.id_petugas');
        $this->join('petugas_jabatan', 'petugas_jabatan.id_petugas_jabatan = petugas.id_petugas_jabatan');
        return $this->find($id_petugas);
    }
}
