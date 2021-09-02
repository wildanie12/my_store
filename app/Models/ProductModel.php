<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'slug', 'status', 'harga', 'foto'];

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('product/')->like('nama', $keyword);
    }
}
