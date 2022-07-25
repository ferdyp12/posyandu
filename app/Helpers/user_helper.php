<?php

function auth()
{
    $modelUser = new \App\Models\UserModel();
    return $modelUser->select('username')->where('id_user', session('id_user'))->first();
}
