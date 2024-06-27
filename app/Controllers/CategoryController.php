<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class CategoryController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('categories/index', [
            'categories' => $this->db->query('SELECT * FROM kategori')->getResultArray()
        ]);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to(site_url('categories/create'));
        }

        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi.',
                    'is_unique' => 'Nama Kategori sudah ada.'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $this->db->table('kategori')->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ]);

        return redirect()->to(site_url('admin/categories'))->with('success', 'Tambah data kategori berhasil.');
    }

    public function edit($id)
    {
        $category = $this->db->table('kategori')
            ->where('id_kategori', $id)
            ->get()
            ->getResultArray();

        return view('categories/edit', [
            'category' => $category
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('categories'));
        }

        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori harus diisi.',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $this->db->table('kategori')
            ->where('id_kategori', $this->request->getPost('id_kategori'))
            ->update([
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]);

        return redirect()->to(site_url('admin/categories'))->with('success', 'Ubah data kategori berhasil.');
    }

    public function destroy($id)
    {
        $this->db->table('kategori')
            ->where('id_kategori', $id)
            ->delete();

        session()->setFlashdata('success', 'Data kategori berhasil dihapus.');

        return redirect()->to(base_url('admin/categories'));
    }
}
