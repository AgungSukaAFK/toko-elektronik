<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    // Field yang boleh diisi/disimpan
    protected $allowedFields    = ['username', 'password', 'created_at'];

    // Settings
    protected $useTimestamps = false;
}