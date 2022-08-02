<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JabatanPetugas extends BaseController
{
    public function __construct()
    {
        $this->modelJabatanPetugas = new \App\Models\JabatanPetugasModel();
    }

    public function index()
    {
        if (isset(auth()->id_posyandu) != NULL) {
            $this->modelJabatanPetugas->where('id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Jabatan Petugas',
            'jp' => $this->modelJabatanPetugas->paginate(7),
            'pager' => $this->modelJabatanPetugas->pager
        ];

        return view('jabatan-petugas/index', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('jp') === FALSE) {
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

            $this->modelJabatanPetugas->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Jabatan Petugas'
        ];

        return view('jabatan-petugas/create', $data);
    }

    public function edit($id_petugas_jabatan)
    {
        $jp = $this->modelJabatanPetugas->find($id_petugas_jabatan);

        if ($this->request->isAJAX()) {
            if ($this->validate('jp') === FALSE) {
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

            $this->modelJabatanPetugas->update($jp->id_petugas_jabatan, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $jp->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Jabatan Petugas ' . $jp->nama,
            'jp' => $jp
        ];

        return view('jabatan-petugas/update', $data);
    }

    public function delete()
    {
        $this->modelJabatanPetugas->delete($this->request->getVar('id_petugas_jabatan'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('jp') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
