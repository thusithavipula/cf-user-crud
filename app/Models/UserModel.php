<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'cf-user-crud';
    protected $primaryKey = 'user_id';

    protected $useAutoIncrement = true;

    // protected $returnType     = 'array';

    protected $allowedFields = ['first_name', 'first_name', 'email', 'mobile', 'username', 'password'];
}