<?php

namespace App\Controllers;

use App\Models\UserModel2;

class TaskAuth extends BaseController
{
    public function login()
    {
        if (session()->get('task_logged_in') === true) {
            return redirect()->to(site_url('tasks'));
        }

        return view('task_auth/login', [
            'title' => 'Tasks Login',
        ]);
    }

    public function attempt()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim(
            (string) $this->request->getPost('username')
        );

        $password = (string) $this->request->getPost('password');

        $userModel = new UserModel2();

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
            'task_user_id'   => $user['id'],
            'task_username'  => $user['username'],
            'task_full_name' => $user['full_name'],
            'task_logged_in' => true,
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('success', 'Tasks login successful.');
    }

    public function logout()
    {
        session()->remove([
            'task_user_id',
            'task_username',
            'task_full_name',
            'task_logged_in',
        ]);

        return redirect()->to(site_url('tasks/login'))
            ->with('success', 'You have logged out.');
    }
}