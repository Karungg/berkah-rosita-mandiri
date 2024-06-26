<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class ProductController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('products/index', [
            'products' => $this->db->query('SELECT * FROM produk')->getResultArray()
        ]);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to(site_url('products/create'));
        }

        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => 'Nama Produk harus diisi.',
                    'is_unique' => 'Nama Produk sudah ada.'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Harga harus diisi angka.',
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stok harus diisi.',
                    'numeric' => 'Stok harus diisi angka.',
                ]
            ],
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,4096]'
        ])) {
            return redirect()->back()->withInput();
        }

        $upload = $this->request->getFile('gambar');
        $uploadName = $upload->getRandomName();
        $upload->move(WRITEPATH . '../public/assets/img/', $uploadName);

        $this->db->table('produk')->insert([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'gambar' => $upload->getName(),
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ]);

        return redirect()->to(site_url('admin/products'))->with('success', 'Tambah data produk berhasil.');
    }

    public function edit($id)
    {
        $product = $this->db->table('produk')
            ->where('id_produk', $id)
            ->get()
            ->getResultArray();

        return view('products/edit', [
            'product' => $product
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('products'));
        }

        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk harus diisi.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.',
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Harga harus diisi angka.',
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stok harus diisi.',
                    'numeric' => 'Stok harus diisi angka.',
                ]
            ],
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,4096]'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->db->table('produk')
            ->where('id_produk', $this->request->getPost('id_produk'))
            ->get()->getResultArray();
        $path = '../public/assets/img/';
        @unlink($path . $data[0]['gambar']);

        $upload = $this->request->getFile('gambar');
        $uploadName = $upload->getRandomName();
        $upload->move(WRITEPATH . '../public/assets/img/', $uploadName);

        $this->db->table('produk')
            ->where('id_produk', $this->request->getPost('id_produk'))
            ->update([
                'nama_produk' => $this->request->getPost('nama_produk'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'gambar' => $upload->getName(),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]);

        return redirect()->to(site_url('admin/products'))->with('success', 'Ubah data produk berhasil.');
    }

    public function destroy($id)
    {
        $data = $this->db->table('produk')
            ->where('id_produk', $id)
            ->get()->getResultArray();
        $path = '../public/assets/img/';
        @unlink($path . $data[0]['gambar']);

        $this->db->table('produk')
            ->where('id_produk', $id)
            ->delete();

        session()->setFlashdata('success', 'Data produk berhasil dihapus.');

        return redirect()->to(base_url('admin/products'));
    }
}
