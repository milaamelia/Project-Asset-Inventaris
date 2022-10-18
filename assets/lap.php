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
$pdf->Cell(190,7,'Daftar Barang Ibazaar',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'kode Barang',1,0);
$pdf->Cell(30,6,'Nama Barang',1,0);
$pdf->Cell(30,6,'Nama kategori',1,0);
$pdf->Cell(30,6,'Berat',1,0);
$pdf->Cell(30,6,'Nama Satuan',1,0);
$pdf->Cell(30,6,'Nama Supplier',1,1);	

 
$pdf->SetFont('Arial','',8);
 
include '../config/koneksi.php';
$barang = mysqli_query($conn, "SELECT b.kode_barang, b.nama_barang, k.nama_kategori, b.berat, s.nama_satuan, r.nama_supplier
					 FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
					 JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier");
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(30,6,$row['kode_barang'],1,0);
    $pdf->Cell(30,6,$row['nama_barang'],1,0);
    $pdf->Cell(30,6,$row['nama_kategori'],1,0);
     $pdf->Cell(30,6,$row['berat'],1,0);
    $pdf->Cell(30,6,$row['nama_satuan'],1,0);
    $pdf->Cell(30,6,$row['nama_supplier'],1,1);
   
}
 
$pdf->Output();
?>