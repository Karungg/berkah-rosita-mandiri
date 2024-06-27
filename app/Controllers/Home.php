<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index(): string
    {
        return view('home', [
            'products' => $this->db->query('SELECT * FROM produk LIMIT 4')->getResultArray()
        ]);
    }
}
