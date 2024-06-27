<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class PaymentReportController extends BaseController
{
    protected $db;

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('payments/report', [
            'payments' => $this->db->query('SELECT * FROM pembayaran')->getResultArray()
        ]);
    }

    public function pdf()
    {
        $payments = $this->db->table('pembayaran')->countAll();
        if ($payments <= 0) {
            return redirect()->to(site_url('payments'))->with('error', 'Tidak ada data yang dapat diexport.');
        }

        $filename = date('y-m-d') . '-data-pembayaran';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('payments/pdf', [
            'payments' => $this->db->query('SELECT * FROM pembayaran')
                ->getResultArray()
        ]));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function excel()
    {
        $payments = $this->db->table('pembayaran')->countAll();
        if ($payments <= 0) {
            return redirect()->to(site_url('payments'))->with('error', 'Tidak ada data yang dapat diexport.');
        }

        $payments = $this->db
            ->query('SELECT * FROM pembayaran')
            ->getResultArray();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Pembeli')
            ->setCellValue('B1', 'Alamat')
            ->setCellValue('C1', 'Nomor Telepon')
            ->setCellValue('D1', 'Tanggal Pembayaran')
            ->setCellValue('E1', 'Metode Pembayaran')
            ->setCellValue('F1', 'Total');

        $column = 2;
        foreach ($payments as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['nama_pembeli'])
                ->setCellValue('B' . $column, $data['alamat'])
                ->setCellValue('C' . $column, $data['no_telp'])
                ->setCellValue('D' . $column, $data['tgl_pembayaran'])
                ->setCellValue('E' . $column, $data['metode_pembayaran'])
                ->setCellValue('F' . $column, $data['total']);
            $column++;
        }
        $writer = new Xls($spreadsheet);
        $filename = date('y-m-d') . '-data-pembayaran';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
