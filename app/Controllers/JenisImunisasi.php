<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JenisImunisasi extends BaseController
{
    public function __construct()
    {
        $this->modelJenisImunisasi = new \App\Models\JenisImunisasiModel();
    }

    public function index()
    {
        if (auth()->id_posyandu) {
            $this->modelJenisImunisasi->where('id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Jenis Imunisasi',
            'imunisasi' => $this->modelJenisImunisasi->paginate(7),
            'pager' => $this->modelJenisImunisasi->pager
        ];

        return view('jenis-imunisasi/index', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('jenis_imunisasi') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_posyandu' => auth()->id_posyandu,
                'nama' => $this->request->getVar('nama'),
                'singkatan' => $this->request->getVar('singkatan')
            ];

            $this->modelJenisImunisasi->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Jenis Imunisasi'
        ];

        return view('jenis-imunisasi/create', $data);
    }

    public function edit($id_jenis_imunisasi)
    {
        $imunisasi = $this->modelJenisImunisasi->find($id_jenis_imunisasi);

        if ($imunisasi->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            if ($this->validate('jenis_imunisasi') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'singkatan' => $this->request->getVar('singkatan')
            ];

            $this->modelJenisImunisasi->update($imunisasi->id_jenis_imunisasi, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $imunisasi->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Jenis Imunisasi ' . $imunisasi->nama,
            'imunisasi' => $imunisasi
        ];

        return view('jenis-imunisasi/update', $data);
    }

    public function delete()
    {
        $id_jenis_imunisasi = $this->request->getVar('id_jenis_imunisasi');
        $imunisasi = $this->modelJenisImunisasi->find($id_jenis_imunisasi);

        if ($imunisasi->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelJenisImunisasi->delete($id_jenis_imunisasi);

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('jenis_imunisasi') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
