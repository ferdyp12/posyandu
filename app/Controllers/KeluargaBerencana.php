<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KeluargaBerencana extends BaseController
{
    public function __construct()
    {
        $this->modelKeluargaBerencana = new \App\Models\KeluargaBerencanaModel();
    }

    public function index()
    {
        if (auth()->id_posyandu) {
            $this->modelKeluargaBerencana->where('id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Keluarga Berencana',
            'kb' => $this->modelKeluargaBerencana->paginate(7),
            'pager' => $this->modelKeluargaBerencana->pager
        ];

        return view('kb/index', $data);
    }

    public function show($id_kb)
    {
        $kb = $this->modelKeluargaBerencana->find($id_kb);

        if ($kb->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $data = [
            'title' => 'Lihat Data Keluarga Berencana ' . $kb->nama_akseptor,
            'kb' => $kb
        ];

        return view('kb/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('kb') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_posyandu' => auth()->id_posyandu,
                'nama_akseptor' => $this->request->getVar('nama_akseptor'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'nama_suami' => $this->request->getVar('nama_suami'),
                'alamat' => $this->request->getVar('alamat'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'tensi' => $this->request->getVar('tensi'),
                'tanggal' => $this->request->getVar('tanggal')
            ];

            $this->modelKeluargaBerencana->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Keluarga Berencana'
        ];

        return view('kb/create', $data);
    }

    public function edit($id_kb)
    {
        $kb = $this->modelKeluargaBerencana->find($id_kb);

        if ($kb->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            if ($this->validate('kb') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $data = [
                'id_posyandu' => auth()->id_posyandu,
                'nama_akseptor' => $this->request->getVar('nama_akseptor'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'nama_suami' => $this->request->getVar('nama_suami'),
                'alamat' => $this->request->getVar('alamat'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'tensi' => $this->request->getVar('tensi'),
                'tanggal' => $this->request->getVar('tanggal')
            ];

            $this->modelKeluargaBerencana->update($kb->id_kb, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $kb->nama_akseptor . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Keluarga Berencana ' . $kb->nama_akseptor,
            'kb' => $kb
        ];

        return view('kb/update', $data);
    }

    public function delete()
    {
        $id_kb = $this->request->getVar('id_kb');
        $kb = $this->modelKeluargaBerencana->find($id_kb);

        if ($kb->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelKeluargaBerencana->delete($id_kb);

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('kb') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
