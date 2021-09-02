<?php

namespace App\Controllers;

use App\Models\PenjualanModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;

    public function __construct()
    {
        $this->penjualanModel = new PenjualanModel();
    }

    public function index()
    {
        // Untuk Pagination
        $currentPage = $this->request->getVar('page_penjualan') ? $this->request->getVar('page_penjualan') : 1;
        // Keyword Pencarian
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $penjualan = $this->penjualanModel->search($keyword);
        } else {
            $penjualan = $this->penjualanModel;
        }

        $data = [
            'title' => 'Penjualan',
            // 'penjualan' => $this->penjualanModel->findAll()
            'penjualan' => $penjualan->paginate(10, 'penjualan'),
            'pager'     => $this->penjualanModel->pager,
            'currentPage' => $currentPage
        ];

        return view('penjualan/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Tambah Data Penjualan',
            'validation' => \Config\Services::validation()
        ];
        return view('penjualan/create', $data);
    }
    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'customer' => [
                'rules' => 'required[penjualan.customer]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required[penjualan.harga]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'unit' => [
                'rules' => 'required[penjualan.unit]',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/penjualan/create')->withInput();
        }
        // Rumus untuk total harga
        $harga = $this->request->getVar('harga');
        $unit = $this->request->getVar('unit');
        $total_harga = ($harga * $unit);
        $this->penjualanModel->save([
            'customer' => $this->request->getVar('customer'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'unit' => $this->request->getVar('unit'),
            'tgl_beli' => $this->request->getVar('tgl_beli'),
            'total_harga' => $total_harga
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan');
        return redirect()->to('/penjualan');
    }

    public function delete($id)
    {
        $this->penjualanModel->delete($id);
        session()->setFlashdata('pesan', 'Dihapus');
        return redirect()->to('/penjualan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Penjualan',
            'validation' => \Config\Services::validation(),
            'penjualan' => $this->penjualanModel->getPenjualan($id)
        ];
        return view('penjualan/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'customer' => [
                'rules' => 'required[penjualan.customer]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('/penjualan/create')->withInput();
        }
        // Rumus untuk total harga
        $harga = $this->request->getVar('harga');
        $unit = $this->request->getVar('unit');
        $total_harga = ($harga * $unit);
        // Memanfaatkan kepintaran CI4 menggunakan input dari save jika didalam save ada id = update jika tidak ada makan insert data.
        $this->penjualanModel->save([
            'id' => $id,
            'customer' => $this->request->getVar('customer'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
            'unit' => $this->request->getVar('unit'),
            'tgl_beli' => $this->request->getVar('tgl_beli'),
            'total_harga' => $total_harga
        ]);
        session()->setFlashdata('pesan', 'Berhasil diubah');
        return redirect()->to('/penjualan');
    }
}
