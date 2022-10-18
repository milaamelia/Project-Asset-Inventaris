
<?php  
include('../config/koneksi.php');


           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=download.xls"); 

           $sql_baca='SELECT  s.no_faktur, s.tgl_masuk,b.nama_barang, r.nama_supplier, s.jumlah, s.harga   FROM tb_barangmasuk s JOIN tb_barang b ON s.kode_barang= b.kode_barang JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier';
$data_baca = mysqli_query($conn,$sql_baca);
  ?>
  <div class="container">
  <h3>Daftra Barang Ibazaar</h3>
  <table width='' class="table table-bordered" border='1'>
    <tr>
    <th><b>NO Faktur</b></th>
     <th><b>Tanggal Masuk</b></th>
     <th><b>Nama Barang</b></th>
     <th>Nama Supplier</th>
     <th>Jumlah</th>
      <th>Harga Beli</th>
   </tr>
  
  <?php
while($data_tampil=mysqli_fetch_array($data_baca)){
  
  $baca_kode=$data_tampil['no_faktur'];
  $baca_masuk=$data_tampil['tgl_masuk'];
  $baca_barang=$data_tampil['nama_barang'];
  $baca_supplier=$data_tampil['nama_supplier'];
  $baca_jumlah=$data_tampil['jumlah'];
  $baca_beli=$data_tampil['harga'];
  ?>

  <tr >
 <td><?php   echo $baca_kode; ?></td>
 <td><?php   echo $baca_masuk; ?></td>
 <td><?php   echo $baca_barang; ?></td>
  <td><?php  echo $baca_supplier; ?></td>
  <td><?php  echo $baca_jumlah; ?></td>
  <td><?php  echo $baca_beli; ?></td>
  </tr> 
<?php
}


?>
</table>