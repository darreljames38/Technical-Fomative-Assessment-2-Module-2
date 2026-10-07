<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->where('is_archived', 0)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('welcome', [
            'title' => 'Tasks for Today',
            'tasks' => $tasks,
        ]);
    }
}