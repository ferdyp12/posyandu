<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->modelPetugas = new \App\Models\PetugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Petugas ' . auth()->posyandu,
            'petugas' => $this->modelPetugas->getPaginated(7),
            'pager' => $this->modelPetugas->pager
        ];

        return view('petugas/index', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('petugas') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama')
            ];

            $this->modelPetugas->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Petugas'
        ];

        return view('petugas/create', $data);
    }

    public function edit($id_petugas_jabatan)
    {
        $jp = $this->modelPetugas->find($id_petugas_jabatan);

        if ($this->request->isAJAX()) {
            if ($this->validate('petugas') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama')
            ];

            $this->modelPetugas->update($jp->id_petugas_jabatan, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $jp->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Petugas ' . $jp->nama,
            'petugas' => $jp
        ];

        return view('petugas/update', $data);
    }

    public function delete()
    {
        $this->modelPetugas->delete($this->request->getVar('id_petugas_jabatan'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('petugas') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
