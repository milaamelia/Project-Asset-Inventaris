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
$pdf->Cell(30,6,'No Faktur',1,0);
$pdf->Cell(30,6,'Tanggal Masuk',1,0);
$pdf->Cell(30,6,'Nama Pelanggan',1,0);
$pdf->Cell(30,6,'Total',1,0);
$pdf->Cell(30,6,'Harga Kirim',1,0);
$pdf->Cell(30,6,'Nama Barang',1,0);
$pdf->Cell(30,6,'Harga Jual',1,0);
$pdf->Cell(30,6,'Harga Total',1,0);
$pdf->Cell(30,6,'QTY',1,1);	

 
$pdf->SetFont('Arial','',8);
 
include '../config/koneksi.php';
$barang = mysqli_query($conn, "SELECT j.jual_id, n.kode_pelanggan, n.nama_pelanggan, j.total, j.harga_kirim, b.kode_barang, b.nama_barang, d.harga_jual, d.qty, d.harga_total, j.tgl_jual
                  FROM tb_barang b 
                  INNER JOIN tb_detail_jual d ON b.kode_barang = d.kode_barang
                  INNER JOIN tb_jual j ON j.jual_id = d.jual_id 
                  INNER JOIN tb_pelanggan n ON j.kode_pelanggan= n.kode_pelanggan");
while ($row = mysqli_fetch_array($barang)){
    $pdf->Cell(30,6,$row['jual_id'],1,0);
    $pdf->Cell(30,6,$row['tgl_jual'],1,0);
    $pdf->Cell(30,6,$row['nama_pelanggan'],1,0);
    $pdf->Cell(30,6,$row['total'],1,0);
    $pdf->Cell(30,6,$row['harga_kirim'],1,0);
    $pdf->Cell(30,6,$row['nama_barang'],1,0);
    $pdf->Cell(30,6,$row['harga_jual'],1,0);
      $pdf->Cell(30,6,$row['harga_total'],1,0);
        $pdf->Cell(30,6,$row['qty'],1,1);

   
}
 
$pdf->Output();
?>