
<?php  
include('../config/koneksi.php');


           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=dowload.xls"); 

           $sql_baca='SELECT b.kode_barang, b.nama_barang, k.nama_kategori, b.berat, s.nama_satuan, r.nama_supplier, b.harga_satuan
           FROM tb_barang b JOIN tb_kategori k ON b.id_kategori = k.id_kategori JOIN tb_satuan_barang s ON b.Id = s.Id 
           JOIN tb_supplier r ON b.kode_supplier = r.kode_supplier';
$data_baca = mysqli_query($conn,$sql_baca);
  ?>
  <div class="container">
  <h3>Daftra Barang Ibazaar</h3>
  <table width='' class="table table-bordered" border='1'>
    <tr>
    <th><b>Kode Barang</b></th>
     <th><b>Nama Barang</b></th>
     <th><b>Nama Kategori</b></th>
     <th>Berat</th>
     <th>Satuan</th>
     <th>Harga Satuan</th>
    </tr>
  
  <?php
while($data_tampil=mysqli_fetch_array($data_baca)){
  
  $baca_kode=$data_tampil['kode_barang'];
  $baca_nama=$data_tampil['nama_barang'];
  $baca_kategori=$data_tampil['nama_kategori'];
  $baca_berat=$data_tampil['berat'];
  $baca_satuan=$data_tampil['nama_satuan'];
  $baca_supplier=$data_tampil['nama_supplier'];
  $baca_harga=$data_tampil['harga_satuan'];


  ?>

  <tr >
 <td><?php  echo $baca_kode; ?></td>
 <td><?php  echo $baca_nama; ?></td>
  <td><?php  echo $baca_kategori; ?></td>
  <td><?php  echo $baca_berat; ?></td>
  <td><?php  echo $baca_satuan; ?></td>
  <td><?php  echo $baca_supplier ?></td>
  <td><?php  echo $baca_harga; ?></td>





  </tr>
  

  
<?php
}


?>
</table>