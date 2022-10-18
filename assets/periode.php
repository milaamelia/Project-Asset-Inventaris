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
$pdf->Cell(190,7,'Daftar Barang Masuk',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'No Faktur',1,0);
$pdf->Cell(30,6,'Tanggal Masuk',1,0);
$pdf->Cell(30,6,'Nama Barang',1,0);
$pdf->Cell(30,6,'Nama Supplier',1,0);
$pdf->Cell(30,6,'Jumlah',1,0);
$pdf->Cell(30,6,'Harga',1,1); 

 
$pdf->SetFont('Arial','',8);
 
include '../config/koneksi.php';
$sql =$barang = mysqli_query($conn,"SELECT * FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier WHERE tgl_masuk BETWEEN  $_POST['awl'] AND $_POST['ahr']");
while ($row = mysqli_fetch_array($sql)){
    $pdf->Cell(30,6,$row['no_faktur'],1,0);
    $pdf->Cell(30,6,$row['tgl_masuk'],1,0);
    $pdf->Cell(30,6,$row['nama_barang'],1,0);
     $pdf->Cell(30,6,$row['nama_supplier'],1,0);
    $pdf->Cell(30,6,$row['jumlah'],1,0);
    $pdf->Cell(30,6,$row['harga_beli'],1,1);
   
}
 
$pdf->Output();
?>