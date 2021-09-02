<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        // Untuk Pagination
        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;
        // Keyword Pencarian
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel;
        }

        $data = [
            'title' => 'Daftar Produk',
            'product' => $product->paginate(10, 'product'),
            'pager'     => $this->productModel->pager,
            'currentPage' => $currentPage
        ];


        return view('product/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Produk',
            'product' => $this->productModel->getProduct($slug)
        ];

        //Jika Produk tidak ada ditable
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Product ' . $slug . ' tidak ditemukan !');
        }

        return view('product/detail', $data);
    }

    public function create()
    {
        // session();/
        $data = [
            'title' => 'Tambah Data Produk',
            'validation' => \Config\Services::validation()
        ];
        return view('product/create', $data);
    }

    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[product.nama]',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => '{field} produk sudah tersedia.'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max ukuran gambar 2mb.',
                    'is_image' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                    'mime_in' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                ]
            ]
        ])) {
            return redirect()->to('/product/create')->withInput();
        }

        // Ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // Jika tidak ada foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            // Generate nama foto random
            $namaFoto = $fileFoto->getName();
            // Pindah foto ke img
            $fileFoto->move('img/produk/', $namaFoto);
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->productModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'status' => $this->request->getVar('status'),
            'harga' => $this->request->getVar('harga'),
            'foto' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan');
        return redirect()->to('/product');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $product = $this->productModel->find($id);

        // Cek jika file gambar default
        if ($product['foto'] != 'default.png') {
            // Hapus gambar
            unlink('img/produk/' .  $product['foto']);
        }

        $this->productModel->delete($id);
        session()->setFlashdata('pesan', 'Dihapus');
        return redirect()->to('/product');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Produk',
            'validation' => \Config\Services::validation(),
            'product' => $this->productModel->getProduct($slug)
        ];
        return view('product/edit', $data);
    }

    public function update($id)
    {
        //Validasi & cek nama, Update ambil dari save 
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[product.nama,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} produk harus diisi.',
                    'is_unique' => '{field} produk sudah tersedia.'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max ukuran gambar 2mb.',
                    'is_image' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                    'mime_in' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                ]
            ]
        ])) {
            return redirect()->to('/produk/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        // Cek foto apa tetap foto lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // Generate file name
            $namaFoto = $fileFoto->getName();
            // Pindah foto produk
            $fileFoto->move('img/produk/', $namaFoto);
            if ($this->request->getVar('fotoLama') != 'default.png') {
                // Hapus foto yang lama
                unlink('img/produk/' . $this->request->getVar('fotoLama'));
            }
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->productModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'status' => $this->request->getVar('status'),
            'harga' => $this->request->getVar('harga'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Diubah');

        return redirect()->to('/product');
    }
}
