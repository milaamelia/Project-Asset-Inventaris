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
$pdf->Cell(190,7,'Daftar Barang Masuk Ibazaar',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,6,'kode Masuk',1,0);
$pdf->Cell(25,6,'Tanggal Masuk',1,0);
$pdf->Cell(25,6,'Nama Barang ',1,0);
$pdf->Cell(25,6,'stok Barang Masuk',1,0);
$pdf->Cell(25,6,'Keterangan',1,1);

 
$pdf->SetFont('Arial','',8);
 
include '../config/koneksi.php';
$barang = mysqli_query($conn, "SELECT b.kode_masuk, b.tgl_perubahan, k.kode_barang,k.nama_barang, b.stok_barangmasuk, b.keterangan   FROM tb_barangmasuk b JOIN tb_barang k ON b.kode_barang = k.kode_barang");
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(25,6,$row['kode_masuk'],1,0);
    $pdf->Cell(25,6,$row['tgl_perubahan'],1,0);
    $pdf->Cell(25,6,$row['nama_barang'],1,0);
    $pdf->Cell(25,6,$row['stok_barangmasuk'],1,0);
    $pdf->Cell(25,6,$row['keterangan'],1,1);
   
}
 
$pdf->Output();
?>