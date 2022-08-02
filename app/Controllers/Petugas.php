<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->modelPetugas = new \App\Models\PetugasModel();
        $this->modelUser = new \App\Models\UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Petugas',
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
                'nama' => $this->request->getVar('nama'),
                'id_posyandu' => auth()->id_posyandu,
                'id_petugas_jabatan' => $this->request->getVar('id_petugas_jabatan')
            ];

            $user = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];

            $this->modelPetugas->insert($data);
            $this->modelUser->insert($user);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Petugas'
        ];

        return view('petugas/create', $data);
    }

    public function edit($id_petugas_jabatan)
    {
        $petugas = $this->modelPetugas->findforUpdate($id_petugas_jabatan);

        if ($this->request->isAJAX()) {
            if ($this->validate('petugas_update') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'nama' => $this->request->getVar('nama'),
                'id_petugas_jabatan' => $this->request->getVar('id_petugas_jabatan')
            ];

            $user = [
                'username' => $this->request->getVar('username')
            ];

            if (!empty($this->request->getVar('password'))) {
                $user['password'] = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            }

            $this->modelPetugas->update($petugas->id_petugas, $data);
            $this->modelUser->update($petugas->id_user, $user);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $petugas->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Petugas ' . $petugas->nama,
            'petugas' => $petugas
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

    public function validationUpdate()
    {
        if ($this->validate('petugas_update') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
