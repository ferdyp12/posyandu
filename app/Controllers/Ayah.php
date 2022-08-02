<?php

namespace App\Controllers;

class Ayah extends \App\Controllers\BaseController
{
    public function __construct()
    {
        $this->modelAyah = new \App\Models\AyahModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Ayah',
            'ayah' => $this->modelAyah->paginate(7),
            'pager' => $this->modelAyah->pager
        ];

        return view('ayah/index', $data);
    }

    public function show($id_ayah)
    {
        $ayah = $this->modelAyah->find($id_ayah);

        $data = [
            'title' => 'Lihat Data Ayah ' . $ayah->nama,
            'ayah' => $ayah
        ];

        return view('ayah/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('ayah') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'kk' => $this->request->getVar('kk'),
                'nik' => $this->request->getVar('nik'),
                'no_telp' => $this->request->getVar('no_telp'),
                'alamat' => $this->request->getVar('alamat'),
                'rw' => $this->request->getVar('rw'),
                'rt' => $this->request->getVar('rt'),
            ];

            $this->modelAyah->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Ayah'
        ];

        return view('ayah/create', $data);
    }

    public function edit($id_ayah)
    {
        $ayah = $this->modelAyah->find($id_ayah);

        if ($this->request->isAJAX()) {
            if ($this->validate('ayah') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'kk' => $this->request->getVar('kk'),
                'nik' => $this->request->getVar('nik'),
                'no_telp' => $this->request->getVar('no_telp'),
                'alamat' => $this->request->getVar('alamat'),
                'rw' => $this->request->getVar('rw'),
                'rt' => $this->request->getVar('rt'),
            ];

            $this->modelAyah->update($ayah->id_ayah, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $ayah->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Ayah ' . $ayah->nama,
            'ayah' => $ayah
        ];

        return view('ayah/update', $data);
    }

    public function delete()
    {
        $this->modelAyah->delete($this->request->getVar('id_ayah'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('ayah') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
