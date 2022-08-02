<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Timbang extends BaseController
{
    public function __construct()
    {
        $this->modelTimbang = new \App\Models\TimbangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Timbang',
            'timbang' => $this->modelTimbang->getPaginated(7),
            'pager' => $this->modelTimbang->pager
        ];

        return view('timbang/index', $data);
    }

    public function show($id_timbang)
    {
        $timbang = $this->modelTimbang->findforUpdate($id_timbang);

        $data = [
            'title' => 'Lihat Data Timbang ' . $timbang->nama_anak,
            'timbang' => $timbang
        ];

        return view('timbang/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('timbang') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_anak' => $this->request->getVar('id_anak'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'keterangan' => $this->request->getVar('keterangan'),
                'tanggal' => $this->request->getVar('tanggal')
            ];

            $this->modelTimbang->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Timbang'
        ];

        return view('timbang/create', $data);
    }

    public function edit($id_timbang)
    {
        $timbang = $this->modelTimbang->findforUpdate($id_timbang);

        if ($this->request->isAJAX()) {
            if ($this->validate('timbang') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'berat_badan' => $this->request->getVar('berat_badan'),
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'keterangan' => $this->request->getVar('keterangan'),
                'tanggal' => $this->request->getVar('tanggal')
            ];

            $this->modelTimbang->update($timbang->id_timbang, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $timbang->nama_anak . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Timbang ' . $timbang->nama_anak,
            'timbang' => $timbang
        ];

        return view('timbang/update', $data);
    }

    public function delete()
    {
        $this->modelTimbang->delete($this->request->getVar('id_timbang'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('timbang') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
