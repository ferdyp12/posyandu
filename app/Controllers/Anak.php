<?php

namespace App\Controllers;

class Anak extends \App\Controllers\BaseController
{
    public function __construct()
    {
        $this->modelAnak = new \App\Models\AnakModel();
    }

    public function index()
    {
        if (auth()->id_posyandu) {
            $this->modelAnak->where('id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Anak',
            'anak' => $this->modelAnak->paginate(7),
            'pager' => $this->modelAnak->pager
        ];

        return view('anak/index', $data);
    }

    public function show($id_anak)
    {
        $anak = $this->modelAnak->find($id_anak);

        if ($anak->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $data = [
            'title' => 'Lihat Data Anak ' . $anak->nama,
            'anak' => $anak
        ];

        return view('anak/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('anak') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_posyandu' => auth()->id_posyandu,
                'id_ayah' => $this->request->getVar('id_ayah'),
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'anak_ke' => $this->request->getVar('anak_ke'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'berat_badan_lahir' => $this->request->getVar('berat_badan_lahir'),
                'tinggi_badan_lahir' => $this->request->getVar('tinggi_badan_lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            ];

            $this->modelAnak->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Anak'
        ];

        return view('anak/create', $data);
    }

    public function edit($id_anak)
    {
        $anak = $this->modelAnak->find($id_anak);

        if ($anak->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            if ($this->validate('anak') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_posyandu' => auth()->id_posyandu,
                'id_ayah' => $this->request->getVar('id_ayah'),
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'anak_ke' => $this->request->getVar('anak_ke'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'berat_badan_lahir' => $this->request->getVar('berat_badan_lahir'),
                'tinggi_badan_lahir' => $this->request->getVar('tinggi_badan_lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            ];

            $this->modelAnak->update($anak->id_anak, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $anak->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Anak ' . $anak->nama,
            'anak' => $anak
        ];

        return view('anak/update', $data);
    }

    public function delete()
    {
        $id_anak = $this->request->getVar('id_anak');
        $anak = $this->modelAnak->find($id_anak);

        if ($anak->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelAnak->delete($id_anak);

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('anak') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }

    public function validationSelect()
    {
        if ($this->validate('anak_select') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
