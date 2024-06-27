<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ProductReportController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('products/report', [
            'products' => $this->db->query('SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori')->getResultArray()
        ]);
    }

    public function pdf()
    {
        $products = $this->db->table('produk')->countAll();
        if ($products <= 0) {
            return redirect()->to(site_url('products'))->with('error', 'Tidak ada data yang dapat diexport.');
        }

        $filename = date('y-m-d') . '-data-produk';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('products/pdf', [
            'products' => $this->db->query('SELECT * FROM produk')
                ->getResultArray()
        ]));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function excel()
    {
        $products = $this->db->table('produk')->countAll();
        if ($products <= 0) {
            return redirect()->to(site_url('products'))->with('error', 'Tidak ada data yang dapat diexport.');
        }

        $products = $this->db
            ->query('SELECT * FROM produk')
            ->getResultArray();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama produk')
            ->setCellValue('B1', 'Deskripsi')
            ->setCellValue('C1', 'Harga')
            ->setCellValue('D1', 'Stok')
            ->setCellValue('E1', 'Link');

        $column = 2;
        foreach ($products as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama_produk'])
                ->setCellValue('B' . $column, $data['deskripsi'])
                ->setCellValue('C' . $column, $data['harga'])
                ->setCellValue('D' . $column, $data['stok'])
                ->setCellValue('E' . $column, $data['link']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $filename = date('y-m-d') . '-data-produk';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
