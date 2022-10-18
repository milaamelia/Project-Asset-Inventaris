<?php
include "header.php";
date_default_timezone_set("ASIA/JAKARTA");
if (empty($_SESSION['username'])) {
  echo "<script>location=('../index.php');</script>";
} else {
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Yayasan Tadika Puri
      </h1>
    </section>
    <br>
    <section class="content">
      <div class="callout callout-success">
        <h4></h4>
        <center>
          <font size="">
            <p>Selamat Datang <b><?php echo $username; ?>
          </font></b></p>
        </center>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-lg-3 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?php
                  include '../config/koneksi.php';
                  $query = "select count(*) jumlah_karyawan from karyawan ";
                  $sql = mysqli_query($conn, $query);
                  $tampil = mysqli_fetch_assoc($sql);
                  echo $tampil['jumlah_karyawan']; ?>
                </h3>
                <p>Data Karyawan</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="" class="small-box-footer">
                Data Karyawan <i class="fa fa-users"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-4">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>
                  <?php
                  include '../config/koneksi.php';
                  $query = "select count(*) jumlah_barang from barang ";
                  $sql = mysqli_query($conn, $query);
                  $tampil = mysqli_fetch_assoc($sql);
                  echo $tampil['jumlah_barang']; ?>
                </h3>
                <p>Data Barang</p>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="../mila.js/index.php" class="small-box-footer">
                Data Barang <i class="fa fa-cubes"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>4</h3>
                <p>Data Peminjam
              </div>
              <div class="icon">
                <i class=" fa fa-arrow-up"></i>
              </div>
              <a href="#" class="small-box-footer">
                Data Peminjam <i class="fa fa-arrow-up"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>4<sup style="font-size: 20px"></sup></h3>

                <p>Data Pengembalian</p>
              </div>
              <div class="icon">
                <i class=" fa fa-arrow-down"></i>
              </div>
              <a href="../mila.js/diagrammasuk.php" class="small-box-footer">
                Data Pengembalian <i class="fa fa-arrow-down"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
  </div>
<?php
  include "footer.php";
}
?>