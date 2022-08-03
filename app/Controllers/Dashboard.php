<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $countAyah = $db->table('ayah')->countAll();
        $countAnak = $db->table('anak')->countAll();
        $countIbuHamil = $db->table('ibu_hamil')->countAll();
        $countImunisasi = $db->table('imunisasi')->countAll();
        $countKb = $db->table('kb')->countAll();
        $countTimbang = $db->table('timbang')->countAll();

        $data = [
            'title' => 'Dashboard',
            'countAyah' => $countAyah,
            'countAnak' => $countAnak,
            'countIbuHamil' => $countIbuHamil,
            'countImunisasi' => $countImunisasi,
            'countKb' => $countKb,
            'countTimbang' => $countTimbang
        ];

        return view('dashboard/index', $data);
    }
}
