<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if ($this->session->has('id_user')) {
            return redirect('Dashboard::index');
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', $data);
    }

    public function login()
    {
        if ($this->request->isAJAX()) {
            if ($this->validate('login') === FALSE) {
                $data = [
                    'status' => false,
                    'message' => 'Validasi error',
                    'errors' => $this->validator->getErrors()
                ];

                return $this->response->setJSON($data);
            } else {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $modelUser = new UserModel();
                $user = $modelUser->where('username', $username)->first();

                if ($user) {
                    if (!password_verify($password, $user->password)) {
                        return $this->response->setJSON(['success' => false, 'message' => 'Password Salah!']);
                    }

                    $this->session->set(['id_user' => $user->id_user, 'id_petugas' => isset($user->id_petugas) ? $user->id_posyandu : NULL]);
                    return $this->response->setJSON(['success' => true, 'message' => 'Login Berhasil']);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'Username Tidak Terdaftar!']);
                }
            }
        }
    }

    public function loginValidation()
    {
        $this->validate('login');

        $data = [
            'status' => false,
            'message' => 'Validasi error',
            'errors' => $this->validator->getErrors()
        ];

        return $this->response->setJSON($data);
    }

    public function logout()
    {
        $this->session->remove('id_user');
        return redirect('Auth::login');
    }
}
