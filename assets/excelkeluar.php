
<?php  
include('../config/koneksi.php');


           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=download.xls"); 

                  $sql_baca='SELECT j.jual_id n.kode_pelanggan, n.nama_pelanggan, j.total, j.harga_kirim, b.kode_barang, b.nama_barang, d.harga_jual, d.qty, d.harga_total, j.tgl_jual
                  FROM tb_barang b 
                  INNER JOIN tb_detail_jual d ON b.kode_barang = d.kode_barang
                  INNER JOIN tb_jual j ON j.jual_id = d.jual_id 
                  INNER JOIN tb_pelanggan n ON j.kode_pelanggan= n.kode_pelanggan';
                  $data_baca = mysqli_query($conn,$sql_baca);
  ?>
  <div class="container">
  <h3>Daftar Transaksi Barang</h3>
  <table width='' class="table table-bordered" border='1'>
    <tr>
    <th><b>No Faktur</b></th>
     <th><b>Tanggal Transaksi</b></th>
     <th><b>Nama Pelanggan</b></th>
     <th>Total</th>
     <th>Harga Kirim</th>
     <th>Nama Barang</th>
     <th>Harga Jual</th>
     <th>QTY</th>
     <th>Harga Total</th>
    </tr>
  
  <?php
while($data_tampil=mysqli_fetch_array($data_baca)){
  
  $baca_kode=$data_tampil['jual_id'];
  $baca_jual=$data_tampil['tgl_jual'];
  $baca_pelanggan=$data_tampil['nama_pelanggan'];
  $baca_total=$data_tampil['total'];
  $baca_kirim=$data_tampil['harga_kirim'];
  $baca_barang=$data_tampil['nama_barang'];
  $baca_harga=$data_tampil['harga_jual'];
  $baca_qty=$data_tampil['qty'];
  $baca_hartol=$data_tampil['harga_total'];


  ?>

  <tr >
  <td><?php  echo $baca_kode; ?></td>
  <td><?php  echo $baca_jual; ?></td>
  <td><?php  echo $baca_pelanggan; ?></td>
  <td><?php  echo $baca_total; ?></td>
  <td><?php  echo $baca_kirim; ?></td>
  <td><?php  echo $baca_barang; ?></td>
  <td><?php  echo $baca_harga; ?></td>
  <td><?php  echo $baca_qty;?></td>
  <td><?php  echo $baca_hartol;?></td>





  </tr>
  

  
<?php
}


?>
</table>