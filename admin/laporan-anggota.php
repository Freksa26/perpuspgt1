<?php
include "../conn.php";
require('../fpdf17/fpdf.php');

// Initialize FPDF object
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(80);
$pdf->Cell(30, 10, 'DATA ANGGOTA', 0, 0, 'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30, 10, 'Website PerpustakaanKU', 0, 0, 'C');
$pdf->Ln();

// Fetch data from database
$result = mysqli_query($conn, "SELECT * FROM data_anggota ORDER BY id ASC") or die(mysqli_error($conn));

// Initialize column variables
$column_nama = "";
$column_jk = "";
$column_kelas = "";
$column_ttl = "";
$column_alamat = "";

// Iterate through database rows
while ($row = mysqli_fetch_array($result)) {
    $nama = $row["nama"];
    $jk = $row["jk"];
    $kelas = $row["kelas"];
    $ttl = $row["ttl"];
    $alamat = $row["alamat"];

    // Append data to columns
    $column_nama .= $nama . "\n";
    $column_jk .= $jk . "\n";
    $column_kelas .= $kelas . "\n";
    $column_ttl .= $ttl . "\n";
    $column_alamat .= $alamat . "\n";
}

// Set header row
$pdf->SetFillColor(110, 180, 230);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(55, 8, 'Nama', 1, 0, 'C', 1);
$pdf->Cell(15, 8, 'JK', 1, 0, 'C', 1);
$pdf->Cell(50, 8, 'Tempat Tanggal Lahir', 1, 0, 'C', 1);
$pdf->Cell(55, 8, 'Alamat', 1, 0, 'C', 1);
$pdf->Ln();

// Set data rows
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(55, 6, $column_nama, 1, 'L');
$pdf->MultiCell(15, 6, $column_jk, 1, 'C');
$pdf->MultiCell(50, 6, $column_ttl, 1, 'L');
$pdf->MultiCell(55, 6, $column_alamat, 1, 'L');

// Output PDF
$pdf->Output();

?>
