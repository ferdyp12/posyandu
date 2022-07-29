<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Posyandu extends BaseController
{
    public function __construct()
    {
        $this->modelPosyandu = new \App\Models\PosyanduModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Posyandu',
            'posyandu' => $this->modelPosyandu->paginate(7),
            'pager' => $this->modelPosyandu->pager
        ];

        return view('posyandu/index', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('posyandu') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'rt' => $this->request->getVar('rt')
            ];

            $this->modelPosyandu->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Posyandu'
        ];

        return view('posyandu/create', $data);
    }

    public function edit($id_posyandu)
    {
        $posyandu = $this->modelPosyandu->find($id_posyandu);

        if ($this->request->isAJAX()) {
            if ($this->validate('posyandu') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'rt' => $this->request->getVar('rt')
            ];

            $this->modelPosyandu->update($posyandu->id_posyandu, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $posyandu->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Posyandu ' . $posyandu->nama,
            'posyandu' => $posyandu
        ];

        return view('posyandu/update', $data);
    }

    public function delete()
    {
        $this->modelPosyandu->delete($this->request->getVar('id_posyandu'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('posyandu') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
