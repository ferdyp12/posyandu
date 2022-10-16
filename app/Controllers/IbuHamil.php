<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IbuHamil extends BaseController
{
    public function __construct()
    {
        $this->modelIbuHamil = new \App\Models\IbuHamilModel();
        $this->modelIbuHamilDetail = new \App\Models\IbuHamilDetailModel();
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
        $ibuHamil = $this->modelIbuHamil->find($id_ibu_hamil);
        $ibuHamilDetail = $this->modelIbuHamilDetail->where('id_ibu_hamil', $ibuHamil->id_ibu_hamil)->findAll();

        if ($ibuHamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $data = [
            'title' => 'Lihat Data Ibu Hamil ' . $ibuHamil->nama,
            'ibuHamil' => $ibuHamil,
            'ibuHamilDetail' => $ibuHamilDetail,
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

            $dataIbuHamil = [
                'id_posyandu' => auth()->id_posyandu,
                'nama' => $this->request->getVar('nama'),
                'tinggi_badan' => $this->request->getVar('tinggi_badan'),
                'berat_badan' => $this->request->getVar('berat_badan'),
                'tanggal_pemeriksaan' => $this->request->getVar('tanggal_pemeriksaan')
            ];

            $idIbuHamil = $this->modelIbuHamil->insert($dataIbuHamil);

            $dataIbuHamilDetail = [
                'id_ibu_hamil' => $idIbuHamil,
                'trisemester' => $this->request->getVar('trisemester'),
                'timbang' => $this->request->getVar('timbang'),
                'ukur_lingkar_lengan_atas' => $this->request->getVar('ukur_lingkar_lengan_atas'),
                'tekanan_darah' => $this->request->getVar('tekanan_darah'),
                'periksa_tinggi_rahim' => $this->request->getVar('periksa_tinggi_rahim'),
                'periksa_letak_dan_denyut_jantung_janin' => $this->request->getVar('periksa_letak_dan_denyut_jantung_janin'),
                'status_dan_imunisasi_tetanus' => $this->request->getVar('status_dan_imunisasi_tetanus'),
                'konseling' => $this->request->getVar('konseling'),
                'skrining_dokter' => $this->request->getVar('skrining_dokter')
            ];

            $this->modelIbuHamilDetail->insert($dataIbuHamilDetail);

            return $this->response->setJSON(['success' => true, 'message' => 'Data Berhasil Dibuat']);
        }

        $data = [
            'title' => 'Buat Data Ibu Hamil'
        ];

        return view('ibu-hamil/create', $data);
    }

    public function edit($id_ibu_hamil)
    {
        $ibuHamil = $this->modelIbuHamil->find($id_ibu_hamil);
        $ibuHamilDetail = $this->modelIbuHamilDetail->where('id_ibu_hamil', $ibuHamil->id_ibu_hamil)->findAll();

        if ($ibuHamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        if ($this->request->isAJAX()) {
            $dataIbuHamilDetail = [
                'id_ibu_hamil' => $ibuHamil->id_ibu_hamil,
                'trisemester' => $this->request->getVar('trisemester'),
                'timbang' => $this->request->getVar('timbang'),
                'ukur_lingkar_lengan_atas' => $this->request->getVar('ukur_lingkar_lengan_atas'),
                'tekanan_darah' => $this->request->getVar('tekanan_darah'),
                'periksa_tinggi_rahim' => $this->request->getVar('periksa_tinggi_rahim'),
                'periksa_letak_dan_denyut_jantung_janin' => $this->request->getVar('periksa_letak_dan_denyut_jantung_janin'),
                'status_dan_imunisasi_tetanus' => $this->request->getVar('status_dan_imunisasi_tetanus'),
                'konseling' => $this->request->getVar('konseling'),
                'skrining_dokter' => $this->request->getVar('skrining_dokter')
            ];

            $this->modelIbuHamilDetail->insert($dataIbuHamilDetail);

            return $this->response->setJSON(['success' => true, 'message' => 'Data ' . $ibuHamil->nama . ' berhasil ditambah!']);
        }

        $data = [
            'title' => 'Edit Data Ibu Hamil ' . $ibuHamil->nama,
            'ibuHamil' => $ibuHamil,
            'ibuHamilDetail' => $ibuHamilDetail,
        ];

        return view('ibu-hamil/update', $data);
    }

    public function delete()
    {
        $idIbuHamil = $this->request->getVar('id_ibu_hamil');
        $ibu_hamil = $this->modelIbuHamil->find($idIbuHamil);

        if ($ibu_hamil->id_posyandu != auth()->id_posyandu) {
            return redirect()->to(previous_url());
        }

        $this->modelIbuHamilDetail->where('id_ibu_hamil', $idIbuHamil)->delete();
        $this->modelIbuHamil->delete($idIbuHamil);

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
