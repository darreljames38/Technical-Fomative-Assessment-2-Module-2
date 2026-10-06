<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('is_logged_in') === true) {
            return redirect()->to(site_url('pos'));
        }

        return view('auth/login', [
            'title' => 'POS Login',
        ]);
    }

    public function attempt()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if (
            $user === null
            || ! password_verify($password, $user['password'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'full_name'    => $user['full_name'],
            'is_logged_in' => true,
        ]);

        return redirect()->to(site_url('pos'))
            ->with('success', 'Login successful.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}