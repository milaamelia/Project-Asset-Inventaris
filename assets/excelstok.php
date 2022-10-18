
<?php  
include('../config/koneksi.php');


           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=download.xls"); 

           $sql_baca= 'SELECT s.id_stok,b.nama_barang, t.nama_kategori, r.nama_supplier, s.stok FROM tb_stok s JOIN tb_barang b ON s.kode_barang = b.kode_barang JOIN tb_kategori t ON s.id_kategori = t.id_kategori  JOIN tb_supplier r ON s.kode_supplier = r.kode_supplier';
$data_baca = mysqli_query($conn,$sql_baca);
  ?>
  <div class="container">
  <h3>Daftra Barang Ibazaar</h3>
  <table width='' class="table table-bordered" border='1'>
    <tr>
    <th><b>Kode Stok</b></th>
     <th><b>Nama Barang</b></th>
     <th><b>Nama Kategori</b></th>
     <th>Nama Supplier</th>
     <th>Stok</th>
   </tr>
  
  <?php
while($data_tampil=mysqli_fetch_array($data_baca)){
  
  $baca_kode=$data_tampil['id_stok'];
  $baca_nama=$data_tampil['nama_barang'];
  $baca_kategori=$data_tampil['nama_kategori'];
  $baca_supplier=$data_tampil['nama_supplier'];
  $baca_stok=$data_tampil['stok'];
  ?>

  <tr >
 <td><?php  echo $baca_kode; ?></td>
 <td><?php  echo $baca_nama; ?></td>
  <td><?php  echo $baca_kategori; ?></td>
  <td><?php  echo $baca_supplier; ?></td>
  <td><?php  echo $baca_stok; ?></td>
  </tr> 
<?php
}


?>
</table>