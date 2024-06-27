<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class PaymentController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('payments/index', [
            'payments' => $this->db->query('SELECT * FROM pembayaran')->getResultArray()
        ]);
    }

    public function create()
    {
        return view('payments/create', [
            'products' => $this->db->query('SELECT * FROM produk')->getResultArray()
        ]);
    }

    public function show($id)
    {
        $payment = $this->db->table('pembayaran')
            ->where('id_pembayaran', $id)
            ->get()
            ->getResultArray();

        return view('payments/show', [
            'payment' => $payment,
        ]);
    }

    public function store()
    {
        if (!$this->request->is('post')) {
            return redirect()->to(site_url('payments/create'));
        }

        if (!$this->validate([
            'nama_pembeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pembeli harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                ]
            ],
            'tgl_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal pembayaran harus diisi.',
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal pembayaran harus diisi.',
                ]
            ],
            'id_produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Produk harus diisi.',
                ]
            ],
            'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]|max_size[bukti_pembayaran,4096]',
            'total' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Total harus diisi.',
                    'numeric' => 'Total harus diisi angka.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $upload = $this->request->getFile('bukti_pembayaran');
        $uploadName = $upload->getRandomName();
        $upload->move(WRITEPATH . '../public/assets/img/bukti/', $uploadName);

        $this->db->table('pembayaran')->insert([
            'nama_pembeli' => $this->request->getPost('nama_pembeli'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'bukti_pembayaran' => $upload->getName(),
            // 'id_produk' => $this->request->getPost('id_produk'),
            'total' => $this->request->getPost('total'),
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ]);

        return redirect()->to(site_url('admin/payments'))->with('success', 'Tambah data produk berhasil.');
    }

    public function edit($id)
    {
        $payment = $this->db->table('pembayaran')
            ->where('id_pembayaran', $id)
            ->get()
            ->getResultArray();

        return view('payments/edit', [
            'payment' => $payment,
            'products' => $this->db->query('SELECT * FROM produk')->getResultArray()
        ]);
    }

    public function update()
    {
        if (!$this->request->is('put')) {
            return redirect()->to(site_url('payments'));
        }

        if (!$this->validate([
            'nama_pembeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pembeli harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                ]
            ],
            'tgl_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal pembayaran harus diisi.',
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal pembayaran harus diisi.',
                ]
            ],
            'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]|max_size[bukti_pembayaran,4096]',
            'total' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Total harus diisi.',
                    'numeric' => 'Total harus diisi angka.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->db->table('pembayaran')
            ->where('id_pembayaran', $this->request->getPost('id_pembayaran'))
            ->get()->getResultArray();
        $path = '../public/assets/img/bukti/';
        @unlink($path . $data[0]['bukti_pembayaran']);

        $upload = $this->request->getFile('bukti_pembayaran');
        $uploadName = $upload->getRandomName();
        $upload->move(WRITEPATH . '../public/assets/img/bukti/', $uploadName);

        $this->db->table('pembayaran')
            ->where('id_pembayaran', $this->request->getPost('id_pembayaran'))
            ->update([
                'nama_pembeli' => $this->request->getPost('nama_pembeli'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
                'tgl_pembayaran' => $this->request->getPost('tgl_pembayaran'),
                'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                'bukti_pembayaran' => $upload->getName(),
                // 'id_produk' => $this->request->getPost('id_produk'),
                'total' => $this->request->getPost('total'),
                'updated_at' => Time::now()
            ]);

        return redirect()->to(site_url('admin/payments'))->with('success', 'Ubah data pembayaran berhasil.');
    }

    public function destroy($id)
    {
        $data = $this->db->table('pembayaran')
            ->where('id_pembayaran', $id)
            ->get()->getResultArray();
        $path = '../public/assets/img/bukti/';
        @unlink($path . $data[0]['bukti_pembayaran']);

        $this->db->table('pembayaran')
            ->where('id_pembayaran', $id)
            ->delete();

        session()->setFlashdata('success', 'Data pembayaran berhasil dihapus.');

        return redirect()->to(base_url('admin/payments'));
    }
}
