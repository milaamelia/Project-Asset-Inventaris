   <?php
    session_start();
    include "../config/koneksi.php";

    if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
    } else {
      header("location: ../login.php");
    }
    $session_id = $_SESSION['username'];
    ?>

<?php
include "../config/koneksi.php";

if (isset($_POST['simpan_jenis'])) { //simpan jenis
  $kd  = $_POST['kode_jenis'];
  $nk  = $_POST['nama_jenis'];
  $query = "INSERT INTO tb_jenis VALUES ('$kd','$nk')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('jenis.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_jenis'])) { // edit jenis
  $kd  = $_POST['edit_kode_jenis'];
  $nm  = $_POST['edit_nama_jenis'];
  $query_update = "UPDATE tb_jenis SET nama_jenis = '$nm' WHERE kode_jenis = '$kd'";
  $sql_update = mysqli_query($conn, $query_update);
  if ($sql_update) {
    echo "<script> location=('jenis.php');</script>";
  } else {
    echo "Error: " . $query_update;
    die();
  }
} else if (isset($_GET['hapus_jenis'])) { // hapus jenis
  $query = "DELETE from tb_jenis WHERE kode_jenis = '$_GET[hapus_jenis]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('jenis.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_divisi'])) { //simpan divisi
  $kd  = $_POST['kode_divisi'];
  $nk  = $_POST['nama_divisi'];
  $query = "INSERT INTO divisi VALUES ('$kd','$nk')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('divisi.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_divisi'])) { // edit divisi
  $kd  = $_POST['edit_kode_divisi'];
  $nm  = $_POST['edit_nama_divisi'];
  $query_update = "UPDATE divisi SET nama_divisi = '$nm' WHERE id = '$kd'";
  $sql_update = mysqli_query($conn, $query_update);
  if ($sql_update) {
    echo "<script> location=('divisi.php');</script>";
  } else {
    echo "Error: " . $query_update;
    die();
  }
} else if (isset($_GET['hapus_divisi'])) { // hapus divisi
  $query = "DELETE from divisi WHERE id = '$_GET[hapus_divisi]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('divisi.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_kota'])) { //simpan kota
  $kd  = $_POST['kode_kota'];
  $nk  = $_POST['nama_kota'];
  $query = "INSERT INTO kota VALUES ('$kd','$nk')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('kota.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_kota'])) { // edit kota
  $kd  = $_POST['edit_kode_kota'];
  $nm  = $_POST['edit_nama_kota'];
  $query_update = "UPDATE kota SET nama_kota = '$nm' WHERE id = '$kd'";
  $sql_update = mysqli_query($conn, $query_update);
  if ($sql_update) {
    echo "<script> location=('kota.php');</script>";
  } else {
    echo "Error: " . $query_update;
    die();
  }
} else if (isset($_GET['hapus_kota'])) { // hapus kota
  $query = "DELETE from kota WHERE id = '$_GET[hapus_kota]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('kota.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_jabatan'])) { //simpan jabatan
  $kd  = $_POST['kode_jabatan'];
  $nk  = $_POST['nama_jabatan'];
  $query = "INSERT INTO jabatan VALUES ('$kd','$nk')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('jabatan.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_jabatan'])) { //edit jabatan
  $kd  = $_POST['edit_kode_jabatan'];
  $nm  = $_POST['edit_nama_jabatan'];
  $query_update = "UPDATE jabatan SET nama_jabatan = '$nm' WHERE id = '$kd'";
  $sql_update = mysqli_query($conn, $query_update);
  if ($sql_update) {
    echo "<script> location=('jabatan.php');</script>";
  } else {
    echo "Error: " . $query_update;
    die();
  }
} else if (isset($_GET['hapus_jabatan'])) { //edit jabatan
  $query = "DELETE from jabatan WHERE id = '$_GET[hapus_jabatan]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('jabatan.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_barang'])) { //simpan barang
  $kd  = $_POST['kode_barang'];
  $nk  = $_POST['nama_barang'];
  $unit  = $_POST['unit_barang'];
  $harga_barang  = $_POST['harga_barang'];
  $query = "INSERT INTO barang VALUES ('$kd','$nk','$unit','$harga_barang')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('barang.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_barang'])) { //edit Barang
  $kd  = $_POST['edit_kode_barang'];
  $nm  = $_POST['edit_nama_barang'];
  $unit_barang  = $_POST['edit_unit_barang'];
  $harga_barang  = $_POST['edit_harga_barang'];
  $query_update = "UPDATE barang SET nama_barang = '$nm', unit = '$unit_barang', harga_barang = '$harga_barang' WHERE id = '$kd'";
  $sql_update = mysqli_query($conn, $query_update);
  if ($sql_update) {
    echo "<script> location=('jabatan.php');</script>";
  } else {
    echo "Error: " . $query_update;
    die();
  }
} else if (isset($_GET['hapus_barang'])) { //edit barang
  $query = "DELETE from barang WHERE id = '$_GET[hapus_barang]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('barang.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_karyawan'])) { //Simpan Karyawan 
  $nik  = $_POST['nik'];
  $nama  = $_POST['nama-karyawan'];
  $divisi  = $_POST['divisi'];
  $jabatan  = $_POST['jabatan'];
  $jenis_kelamin  = $_POST['jenis-kelamin'];
  $status_karyawan  = $_POST['status-karyawan'];
  $alamat  = $_POST['alamat'];
  $email  = $_POST['email'];
  $notlp  = $_POST['no-tlp'];
  $query = "INSERT INTO karyawan VALUES ('$nik','$nama','$jenis_kelamin','$divisi','$status_karyawan','$jabatan','$alamat','$email','$notlp')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('karyawan.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_karyawan'])) { //Edit Karyawan
  $nik  = $_POST['nik'];
  $nama  = $_POST['nama-karyawan'];
  $divisi  = $_POST['divisi'];
  $jabatan  = $_POST['jabatan'];
  $jenis_kelamin  = $_POST['jenis-kelamin'];
  $status_karyawan  = $_POST['status-karyawan'];
  $alamat  = $_POST['alamat'];
  $email  = $_POST['email'];
  $notlp  = $_POST['no-tlp'];
  $query = " UPDATE karyawan SET nama_karyawan = '$nama', jenis_kelamin = '$jenis_kelamin', id_divisi = '$divisi', status = '$status_karyawan', id_jabatan = '$jabatan', alamat = '$alamat',email = '$email', no_tlp = '$notlp' WHERE nik = '$nik'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('karyawan.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_GET['hapus_karyawan'])) { //Hapus Karyawan
  $query = "DELETE from karyawan WHERE nik = '$_GET[hapus_karyawan]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('karyawan.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['simpan_asset'])) { //Simpan Asset 
  $kode_inventaris  = $_POST['kode-inventaris'];
  $sn_inventaris  = $_POST['sn-inventaris'];
  $jenis  = $_POST['jenis'];
  $barang  = $_POST['barang'];
  $user  = $_POST['user'];
  $pic  = $_POST['pic'];
  $divisi  = $_POST['divisi'];
  $lokasi  = $_POST['lokasi'];
  $tgl_pinjam  = $_POST['tgl-pinjam'];
  $tgl_kembali  = $_POST['tgl-kembali'];
  $status  = $_POST['status'];
  $ket = $_POST['keterangan'];
  $tglpinjam = date("Y-m-d", strtotime($tgl_pinjam));
  $tglkembali = date("Y-m-d", strtotime($tgl_kembali));
  $query = "INSERT INTO inventaris_asset VALUES (null,'$kode_inventaris','$sn_inventaris','$user','$pic','$barang','$jenis','$status','$tglpinjam','$tglkembali','$lokasi','$divisi','$ket')";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('asset-inventaris.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_POST['edit_asset'])) { //Edit Asset 
  $kode_inventaris  = $_POST['kode-inventaris'];
  $sn_inventaris  = $_POST['sn-inventaris'];
  $jenis  = $_POST['jenis'];
  $barang  = $_POST['barang'];
  $user  = $_POST['user'];
  $pic  = $_POST['pic'];
  $divisi  = $_POST['divisi'];
  $lokasi  = $_POST['lokasi'];
  $tgl_pinjam  = $_POST['tgl-pinjam'];
  $tgl_kembali  = $_POST['tgl-kembali'];
  $status  = $_POST['status'];
  $ket = $_POST['keterangan'];
  $tglpinjam = date("Y-m-d", strtotime($tgl_pinjam));
  $tglkembali = date("Y-m-d", strtotime($tgl_kembali));
  $query = " UPDATE inventaris_asset SET sn_inventaris = '$sn_inventaris', id_karyawan_user = '$user', id_karyawan_pic = '$pic', id_barang = '$barang', id_jenis = '$jenis', status = '$status',tgl_pinjam = '$tglpinjam', tgl_kembali = '$tglkembali', id_kota = '$lokasi', divisi_id = '$divisi', keterangan = '$ket' WHERE kode_inventaris = '$kode_inventaris'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('asset-inventaris.php')</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
} else if (isset($_GET['hapus_asset'])) { //Hapus Asset
  $query = "DELETE from inventaris_asset WHERE id = '$_GET[hapus_asset]'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo "<script>location=('asset-inventaris.php');</script>";
  } else {
    echo "Error: " . $query;
    die();
  }
}

?>



