<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Images\Exceptions\ImageException;

class Users extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users', [
            'users' => $this->userModel->findAll(),
        ]);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|max_length[50]|is_unique[users.username]',
            ],
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))
            ->with('success', 'User created successfully.');
    }

    public function edit(int $id)
    {
        $user = $this->userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/edit', [
            'user' => $user,
        ]);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            ],
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
        ];

        $avatar = $this->request->getFile('avatar');

        // Avatar is optional, but validated when a file is selected.
        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = [
                'label' => 'Avatar',
                'rules' => [
                    'uploaded[avatar]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                    'max_size[avatar,2048]',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];

        if ($avatar !== null && $avatar->isValid()) {
            $uploadDirectory = FCPATH . 'uploads/avatars/';

            if (! is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $filename = $avatar->getRandomName();
            $destination = $uploadDirectory . $filename;

            try {
                service('image')
                    ->withFile($avatar->getTempName())
                    ->fit(300, 300, 'center')
                    ->save($destination, 85);
            } catch (ImageException $exception) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', [
                        'avatar' => 'The avatar could not be processed.',
                    ]);
            }

            $updateData['avatar'] = $filename;
        }

        $this->userModel->update($id, $updateData);

        return redirect()->to(site_url('users'))
            ->with('success', 'User updated successfully.');
    }
}