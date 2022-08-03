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
        if (auth()->id_posyandu) {
            $this->modelTimbang->where('timbang.id_posyandu', auth()->id_posyandu);
        }

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

        if ($timbang->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

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
                'id_posyandu' => auth()->id_posyandu,
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

        if ($timbang->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

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
                'id_posyandu' => auth()->id_posyandu,
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
        $id_timbang = $this->request->getVar('id_timbang');
        $timbang = $this->modelIbuHamil->find($id_timbang);

        if ($timbang->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelTimbang->delete($id_timbang);

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
