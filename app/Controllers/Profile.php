<?php

namespace App\Controllers;

use App\Models\UserModel2;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel2();

        // Select only safe profile fields.
        $user = $userModel
            ->select([
                'id',
                'username',
                'full_name',
                'email',
                'created_at',
            ])
            ->first();

        return view('profile', [
            'title' => 'Profile',
            'user'  => $user,
        ]);
    }
}