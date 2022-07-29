<?php

function auth()
{
    $modelUser = new \App\Models\UserModel();
    return $modelUser->select(['petugas.nama', 'users.foto', 'petugas.id_posyandu', 'petugas.id_petugas_jabatan', 'posyandu.nama as posyandu'])
        ->join('petugas', 'petugas.id_petugas = users.id_petugas')
        ->join('posyandu', 'posyandu.id_posyandu = petugas.id_posyandu')
        ->where('id_user', session('id_user'))
        ->first();
}
