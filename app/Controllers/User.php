<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }


    public function index()
    {
        $data = [
            'title' => 'My Profile',
        ];
        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('user/create', $data);
    }

    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah tersedia.'
                ]
            ],
            'user_image' => [
                'rules' => 'max_size[user_image,2048]is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max ukuran gambar 2mb.',
                    'is_image' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                    'mime_in' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                ]
            ]
        ])) {

            return redirect()->to('/user/create')->withInput();
        }

        // Ambil Image
        $fileImage = $this->request->getFile('user_image');
        // Jika tidak ada Image yang diupload
        if ($fileImage->getError() == 4) {
            $namaImage = 'default.svg';
        } else {
            // Generate nama img
            $namaImage = $fileImage->getName();
            // Pindah Image ke img
            $fileImage->move('img/profile/', $namaImage);
        }

        $this->userModel->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'user_image' => $namaImage
        ]);
        session()->setFlashdata('pesan', 'Ditambahkan');
        return redirect()->to('/user');
    }

    public function delete()
    {
        $user = $this->userModel->getUserById(user_id());

        if ($user->user_image != 'default.svg') {
            unlink('img/profile/' . $user->user_image);
        }
        $this->builder->select()->where('users.id', user_id())->delete();

        session()->setFlashData('pesan', 'Dihapus');
        return redirect()->to('/logout');
    }

    public function edit($id)
    {
        $data = [
            'user'  => $this->userModel->getUserById($id),
            'title' => 'Edit Profile'
        ];

        // $data = [
        // 	'title' => 'Ubah Data User',
        // 	'validation' => \Config\Services::validation(),
        // 	'user' => $this->userModel->findAll()
        // ];

        session()->setFlashData('pesan');
        return view('/user/edit', $data);
    }

    public function update($id)
    {
        //Validasi & cek nama, Update ambil dari save 
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah tersedia.'
                ]
            ],
            'user_image' => [
                'rules' => 'max_size[user_image,2048]is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max ukuran gambar 2mb.',
                    'is_image' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                    'mime_in' => 'Yang anda masukkan bukan file berformat gambar (jpg,jpeg,png).',
                ]
            ]
        ])) {
            return redirect()->to('/user/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileImage = $this->request->getFile('user_image');

        // Cek Image apa tetap Image lama
        if ($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('imageLama');
        } else {
            // Generate file name
            $namaImage = $fileImage->getName();
            // Pindah Image User
            $fileImage->move('img/profile/', $namaImage);
            if ($this->request->getVar('imageLama') != 'default.svg') {
                // Hapus Image yang lama
                unlink('img/profile/' . $this->request->getVar('imageLama'));
            }
        }

        $this->userModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'user_image' => $namaImage
        ]);

        session()->setFlashdata('pesan', 'Diubah');

        return redirect()->to('/user');
    }
}
