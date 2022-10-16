<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Imunisasi extends BaseController
{
    public function __construct()
    {
        $this->modelImunisasi = new \App\Models\ImunisasiModel();
        $this->modelImunisasiDetail = new \App\Models\ImunisasiDetailModel();
    }

    public function index()
    {
        if (auth()->id_posyandu) {
            $this->modelImunisasi->where('imunisasi.id_posyandu', auth()->id_posyandu);
        }

        $data = [
            'title' => 'Data Imunisasi',
            'imunisasi' => $this->modelImunisasi->getPaginated(7),
            'pager' => $this->modelImunisasi->pager
        ];

        return view('imunisasi/index', $data);
    }

    public function show($id_imunisasi)
    {
        $imunisasi = $this->modelImunisasi->select(['imunisasi.id_imunisasi', 'imunisasi.id_posyandu', 'anak.nama AS nama_anak'])->join('anak', 'imunisasi.id_anak = anak.id_anak')->find($id_imunisasi);
        $imunisasiDetail = $this->modelImunisasiDetail->select(['jenis_imunisasi.nama', 'imunisasi_detail.bulan', 'imunisasi_detail.tanggal', 'imunisasi_detail.keterangan'])->join('jenis_imunisasi', 'jenis_imunisasi.id_jenis_imunisasi = imunisasi_detail.id_jenis_imunisasi')->where('id_imunisasi', $id_imunisasi)->findAll();

        if ($imunisasi->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $data = [
            'title' => 'Lihat Data Imunisasi ' . $imunisasi->nama_anak,
            'imunisasi' => $imunisasi,
            'imunisasiDetail' => $imunisasiDetail
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

            $dataImunisasi = [
                'id_posyandu' => auth()->id_posyandu,
                'id_anak' => $this->request->getVar('id_anak'),
            ];

            $id_imunisasi = $this->modelImunisasi->insert($dataImunisasi);

            $dataImunisasiDetail = [
                'id_imunisasi' => $id_imunisasi,
                'id_jenis_imunisasi' => $this->request->getVar('id_jenis_imunisasi'),
                'bulan' => $this->request->getVar('bulan'),
                'tanggal' => $this->request->getVar('tanggal'),
                'keterangan' => $this->request->getVar('keterangan')
            ];

            $this->modelImunisasiDetail->insert($dataImunisasiDetail);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Imunisasi'
        ];

        return view('imunisasi/create', $data);
    }

    public function edit($id_imunisasi)
    {
        $imunisasi = $this->modelImunisasi->select(['imunisasi.*', 'anak.nama AS nama_anak',])->join('anak', 'imunisasi.id_anak = anak.id_anak')->find($id_imunisasi);
        $imunisasiDetail = $this->modelImunisasiDetail->select(['jenis_imunisasi.id_jenis_imunisasi', 'jenis_imunisasi.nama', 'imunisasi_detail.bulan', 'imunisasi_detail.tanggal', 'imunisasi_detail.keterangan'])->join('jenis_imunisasi', 'jenis_imunisasi.id_jenis_imunisasi = imunisasi_detail.id_jenis_imunisasi')->where('id_imunisasi', $id_imunisasi)->findAll();

        if ($imunisasi->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            if ($this->validate('imunisasi') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            }

            $dataImunisasiDetail = [
                'id_imunisasi' => $imunisasi->id_imunisasi,
                'id_jenis_imunisasi' => $this->request->getVar('id_jenis_imunisasi'),
                'bulan' => $this->request->getVar('bulan'),
                'tanggal' => $this->request->getVar('tanggal'),
                'keterangan' => $this->request->getVar('keterangan')
            ];

            echo '<pre>';
            var_dump($dataImunisasiDetail);
            echo '</pre>';
            exit;

            $this->modelImunisasiDetail->insert($dataImunisasiDetail);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $imunisasi->nama_anak . ' berhasil ditambah!']);
        }

        $data = [
            'title' => 'Edit Data Imunisasi ' . $imunisasi->nama_anak,
            'imunisasi' => $imunisasi,
            'imunisasiDetail' => $imunisasiDetail
        ];

        return view('imunisasi/update', $data);
    }

    public function delete()
    {
        $id_imunisasi = $this->request->getVar('id_imunisasi');
        $imunisasi = $this->modelImunisasi->find($id_imunisasi);

        if ($imunisasi->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelImunisasiDetail->where('id_imunisasi', $id_imunisasi)->delete();
        $this->modelImunisasi->delete($id_imunisasi);

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
