<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $useTimestamps = true;
    protected $allowedFields = ['customer', 'nama_produk', 'harga', 'unit', 'tgl_beli', 'total_harga'];

    public function getPenjualan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function search($keyword)
    {
        return $this->table('penjualan')->like('customer', $keyword);
    }
}
