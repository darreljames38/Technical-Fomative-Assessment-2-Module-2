<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel2 extends Model
{
    protected $DBGroup = 'tasks';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'username',
        'full_name',
        'email',
        'created_at',
    ];
}