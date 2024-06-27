<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    protected $helpers = ['form', 'auth'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('home', [
            'products' => $this->db->query('SELECT * FROM produk LIMIT 4')->getResultArray(),
            'categories' => $this->db->query('SELECT * FROM kategori')->getResultArray()
        ]);
    }

    public function byCategory($categoryName)
    {
        $products = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.nama_kategori = '$categoryName'")->getResultArray();

        return view('by-category', [
            'products' => $products,
            'categories' => $this->db->query('SELECT * FROM kategori')->getResultArray()
        ]);
    }
}
