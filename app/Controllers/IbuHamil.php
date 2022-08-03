<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IbuHamil extends BaseController
{
    public function __construct()
    {
        $this->modelIbuHamil = new \App\Models\IbuHamilModel();
    }

    public function index()
    {
        if (auth()->id_posyandu) {
            $this->modelIbuHamil->where('id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Ibu Hamil',
            'ibu_hamil' => $this->modelIbuHamil->paginate(7),
            'pager' => $this->modelIbuHamil->pager
        ];

        return view('ibu-hamil/index', $data);
    }

    public function show($id_ibu_hamil)
    {
        $ibu_hamil = $this->modelIbuHamil->find($id_ibu_hamil);

        if ($ibu_hamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $data = [
            'title' => 'Lihat Data Ibu Hamil ' . $ibu_hamil->nama,
            'ibu_hamil' => $ibu_hamil
        ];

        return view('ibu-hamil/view', $data);
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('ibu_hamil') === FALSE) {
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
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'lingkar_tangan_atas' => $this->request->getVar('lingkar_tangan_atas'),
                'lingkar_perut' => $this->request->getVar('lingkar_perut'),
                'tekanan_darah' => $this->request->getVar('tekanan_darah'),
                'denyut_jantung_bayi' => $this->request->getVar('denyut_jantung_bayi'),
                'tanggal_pemeriksaan' => $this->request->getVar('tanggal_pemeriksaan')
            ];

            $this->modelIbuHamil->insert($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Ibu Hamil'
        ];

        return view('ibu-hamil/create', $data);
    }

    public function edit($id_ibu_hamil)
    {
        $ibu_hamil = $this->modelIbuHamil->find($id_ibu_hamil);

        if ($ibu_hamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            if ($this->validate('ibu_hamil') === FALSE) {
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
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'lingkar_tangan_atas' => $this->request->getVar('lingkar_tangan_atas'),
                'lingkar_perut' => $this->request->getVar('lingkar_perut'),
                'tekanan_darah' => $this->request->getVar('tekanan_darah'),
                'denyut_jantung_bayi' => $this->request->getVar('denyut_jantung_bayi'),
                'tanggal_pemeriksaan' => $this->request->getVar('tanggal_pemeriksaan')
            ];

            $this->modelIbuHamil->update($ibu_hamil->id_ibu_hamil, $data);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $ibu_hamil->nama . ' berhasil diubah!']);
        }

        $data = [
            'title' => 'Edit Data Ibu Hamil ' . $ibu_hamil->nama,
            'ibu_hamil' => $ibu_hamil
        ];

        return view('ibu-hamil/update', $data);
    }

    public function delete()
    {
        $id_ibu_hamil = $this->request->getVar('id_ibu_hamil');
        $ibu_hamil = $this->modelIbuHamil->find($id_ibu_hamil);

        if ($ibu_hamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelIbuHamil->delete($id_ibu_hamil);

        return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    }

    public function validation()
    {
        if ($this->validate('ibu_hamil') === FALSE) {
            $data = [
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $this->validator->getErrors()
            ];

            return $this->response->setJSON($data);
        }
    }
}
