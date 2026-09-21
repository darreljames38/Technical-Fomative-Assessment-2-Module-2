<?php

namespace App\Controllers;

use App\Models\UserModel2;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel2();

        $data = [
            'user' => $userModel->first(),
        ];

        return view('profile', $data);
    }
}