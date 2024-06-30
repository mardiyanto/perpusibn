<?php
include '../config/koneksi.php';
require('../fpdf/fpdf.php');

// Ambil data dari POST request
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';

// Query database berdasarkan rentang tanggal
$sql = "SELECT * FROM tbl_transaksi WHERE tgl_pinjam BETWEEN '$tgl_awal' AND '$tgl_akhir'";
$result = $koneksi->query($sql);

// Membuat class PDF dengan orientasi landscape
class PDF extends FPDF {
    function __construct() {
        parent::__construct('L', 'mm', 'A4'); // Mengatur orientasi ke Landscape dan ukuran kertas A4
    }

    // Page header
    function Header() {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Laporan Transaksi Buku',0,1,'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Load data
    function LoadData($result) {
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Table with adjusted column width
    function ImprovedTable($header, $data) {
        // Column widths
        $columnWidth = [
            10, // No
            90, // Judul
            60, // Nama
            30, // Tgl Pinjam
            30, // Tgl Kembali
            20, // Status
            40  // Keterangan
        ];

        // Header
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($columnWidth[$i], 7, $header[$i], 1);
        }
        $this->Ln();

        // Data
        $no = 1;
        foreach($data as $row) {
            $this->Cell($columnWidth[0], 6, $no++, 1); // No
            $this->Cell($columnWidth[1], 6, $row['judul'], 1); // Judul
            $this->Cell($columnWidth[2], 6, $row['nama'], 1); // Nama
            $this->Cell($columnWidth[3], 6, $row['tgl_pinjam'], 1); // Tgl Pinjam
            $this->Cell($columnWidth[4], 6, $row['tgl_kembali'], 1); // Tgl Kembali
            $this->Cell($columnWidth[5], 6, $row['status'], 1); // Status
            $this->Cell($columnWidth[6], 6, $row['ket'], 1); // Keterangan
            $this->Ln();
        }
    }
}

// Membuat objek PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$header = ['No', 'Judul', 'Nama', 'Tgl Pinjam', 'Tgl Kembali', 'Status', 'Keterangan'];
$data = $pdf->LoadData($result);
$pdf->ImprovedTable($header, $data);
$pdf->Output();
?>
