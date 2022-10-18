<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Ibazaar',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Daftar Barang Stok Ibazaar',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'kode Stok',1,0);
$pdf->Cell(30,6,'Nama Barang',1,0);
$pdf->Cell(30,6,'Nama kategori',1,0);
$pdf->Cell(30,6,'Nama Supplier',1,0);
$pdf->Cell(30,6,'stok',1,1);

 
$pdf->SetFont('Arial','',8);
 
include '../config/koneksi.php';
$barang = mysqli_query($conn, "SELECT s.id_stok,b.nama_barang, t.nama_kategori, r.nama_supplier, s.stok FROM tb_stok s JOIN tb_barang b ON s.kode_barang = b.kode_barang JOIN tb_kategori t ON s.id_kategori = t.id_kategori  JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier");
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(30,6,$row['id_stok'],1,0);
    $pdf->Cell(30,6,$row['nama_barang'],1,0);
    $pdf->Cell(30,6,$row['nama_kategori'],1,0);
    $pdf->Cell(30,6,$row['nama_supplier'],1,0);
    $pdf->Cell(30,6,$row['stok'],1,1);
   
}
 
$pdf->Output();
?>