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

        $data = [
            'title' => 'Lihat Data Anak ' . $anak->nama_anak,
            'anak' => $anak
        ];

        return view('anak/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'id_ayah' => $this->request->getVar('id_ayah'),
                'nama_anak' => $this->request->getVar('nama_anak'),
                'nik_anak' => $this->request->getVar('nik_anak'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'bb_lahir' => $this->request->getVar('bb_lahir'),
                'tb_lahir' => $this->request->getVar('tb_lahir'),
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

        if ($this->request->isAJAX()) {
            $data = [
                'id_ayah' => $this->request->getVar('id_ayah'),
                'nama_anak' => $this->request->getVar('nama_anak'),
                'nik_anak' => $this->request->getVar('nik_anak'),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'bb_lahir' => $this->request->getVar('bb_lahir'),
                'tb_lahir' => $this->request->getVar('tb_lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            ];

            $this->modelAnak->update($anak->id_anak, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $anak->nama_anak . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Anak ' . $anak->nama_anak,
            'anak' => $anak
        ];

        return view('anak/update', $data);
    }

    public function delete()
    {
        $this->modelAnak->delete($this->request->getVar('id_anak'));

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }
}
