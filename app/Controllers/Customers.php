<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    protected CustomerModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        return view('customers', [
            'customers' => $this->customerModel->findAll(),
        ]);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->insert([
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer created successfully.');
    }

    public function edit(int $id)
    {
        $customer = $this->customerModel->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound(
                'Customer not found.'
            );
        }

        return view('customers/edit', [
            'customer' => $customer,
        ]);
    }

    public function update(int $id)
    {
        $customer = $this->customerModel->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound(
                'Customer not found.'
            );
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->customerModel->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer updated successfully.');
    }
}