<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    protected TaskModel $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks', [
            'title' => 'Task List',
            'tasks' => $tasks,
        ]);
    }

    public function new()
    {
        return view('tasks/new', [
            'title' => 'New Task',
        ]);
    }

    public function create()
    {
        $rules = [
            'title' => [
                'label' => 'Task title',
                'rules' => 'required|max_length[150]',
            ],
            'task_date' => [
                'label' => 'Task date',
                'rules' => 'required|valid_date[Y-m-d]',
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[pending,in_progress,completed]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => trim(
                (string) $this->request->getPost('title')
            ),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('success', 'Task created successfully.');
    }

    public function edit(int $id)
    {
        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        return view('tasks/edit', [
            'title' => 'Edit Task',
            'task'  => $task,
        ]);
    }

    public function update(int $id)
    {
        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $rules = [
            'title' => [
                'label' => 'Task title',
                'rules' => 'required|max_length[150]',
            ],
            'task_date' => [
                'label' => 'Task date',
                'rules' => 'required|valid_date[Y-m-d]',
            ],
            'status' => [
                'label' => 'Status',
                'rules' => 'required|in_list[pending,in_progress,completed]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->update($id, [
            'title' => trim(
                (string) $this->request->getPost('title')
            ),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('success', 'Task updated successfully.');
    }

    public function archive(int $id)
    {
        $task = $this->taskModel
            ->where('id', $id)
            ->where('is_archived', 0)
            ->first();

        if ($task === null) {
            throw PageNotFoundException::forPageNotFound(
                'Task not found.'
            );
        }

        $this->taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('success', 'Task archived successfully.');
    }
}