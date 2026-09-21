<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel
                ->where('task_date', date('Y-m-d'))
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('welcome', $data);
    }
}