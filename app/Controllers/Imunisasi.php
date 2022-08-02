<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Imunisasi extends BaseController
{
    public function __construct()
    {
        $this->modelImunisasi = new \App\Models\ImunisasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Imunisasi',
            'imunisasi' => $this->modelImunisasi->getPaginated(7),
            'pager' => $this->modelImunisasi->pager
        ];

        return view('imunisasi/index', $data);
    }

    public function show($id_imunisasi)
    {
        $imunisasi = $this->modelImunisasi->findforUpdate($id_imunisasi);

        $data = [
            'title' => 'Lihat Data Imunisasi ' . $imunisasi->nama_anak,
            'imunisasi' => $imunisasi
        ];

        return view('imunisasi/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('imunisasi') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_anak' => $this->request->getVar('id_anak'),
                'id_jenis_imunisasi' => $this->request->getVar('id_jenis_imunisasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'keterangan' => $this->request->getVar('keterangan'),
                'usia_saat' => $this->request->getVar('usia_saat')
            ];

            $this->modelImunisasi->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Imunisasi'
        ];

        return view('imunisasi/create', $data);
    }

    public function edit($id_imunisasi)
    {
        $imunisasi = $this->modelImunisasi->findforUpdate($id_imunisasi);

        if ($this->request->isAJAX()) {
            if ($this->validate('imunisasi') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_anak' => $this->request->getVar('id_anak'),
                'id_jenis_imunisasi' => $this->request->getVar('id_jenis_imunisasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'keterangan' => $this->request->getVar('keterangan'),
                'usia_saat' => $this->request->getVar('usia_saat')
            ];

            $this->modelImunisasi->update($imunisasi->id_imunisasi, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $imunisasi->nama_anak . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Imunisasi ' . $imunisasi->nama_anak,
            'imunisasi' => $imunisasi
        ];

        return view('imunisasi/update', $data);
    }

    public function delete()
    {
        $this->modelImunisasi->delete($this->request->getVar('id_imunisasi'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('imunisasi') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
