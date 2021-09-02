<?php

namespace App\Models;

use CodeIgniter\Model;


class AdminModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'username', 'fullname', 'user_image'];

    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
