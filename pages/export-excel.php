<?php
include('../config/koneksi.php');

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=laporan-asset-inventaris.xls");

$sql_baca = "Select a.kode_inventaris, a.sn_inventaris, c.nama_jenis, b.nama_barang,
                f.nama_karyawan As karyawan_user, g.nama_karyawan As karyawan_pic,
                e.nama_divisi, d.nama_kota, a.status,a.tgl_pinjam, a.tgl_kembali,
                a.keterangan
    From inventaris_asset a 
    Join barang b on a.id_barang = b.id
    Join tb_jenis c On a.id_jenis = c.kode_jenis
    Join kota d On a.id_kota = d.id
    Join divisi e On a.divisi_id = e.id
    Join karyawan f on a.id_karyawan_user = f.nik
    Join karyawan g on a.id_karyawan_pic = g.nik";

$data_baca = mysqli_query($conn, $sql_baca);
?>
<div class="container">
    <h3>Laporan Inventaris Asset</h3>
    <table width='' class="table table-bordered" border='1'>
        <tr>
            <th>Kode Inventaris</th>
            <th>SN Inventaris</th>
            <th>Jenis Barang</th>
            <th>Nama Barang</th>
            <th>User</th>
            <th>PIC</th>
            <th>Divisi</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
        </tr>

        <?php
        while ($data_tampil = mysqli_fetch_array($data_baca)) {

            $baca_kode = $data_tampil['kode_inventaris'];
            $baca_nama = $data_tampil['sn_inventaris'];
            $baca_jenis = $data_tampil['nama_jenis'];
            $baca_barang = $data_tampil['nama_barang'];
            $baca_user = $data_tampil['karyawan_user'];
            $baca_pic = $data_tampil['karyawan_pic'];
            $baca_divisi = $data_tampil['nama_divisi'];
            $baca_kota = $data_tampil['nama_kota'];
            $baca_status = $data_tampil['status'];
            $baca_pinjam = $data_tampil['tgl_pinjam'];
            $baca_kembali = $data_tampil['tgl_kembali'];
            $baca_keterangan = $data_tampil['keterangan'];

        ?>

            <tr>
                <td><?php echo $baca_kode; ?></td>
                <td><?php echo $baca_nama; ?></td>
                <td><?php echo $baca_jenis; ?></td>
                <td><?php echo $baca_barang; ?></td>
                <td><?php echo $baca_user; ?></td>
                <td><?php echo $baca_pic ?></td>
                <td><?php echo $baca_divisi; ?></td>
                <td><?php echo $baca_kota; ?></td>
                <td><?php echo $baca_status; ?></td>
                <td><?php echo $baca_pinjam; ?></td>
                <td><?php echo $baca_kembali; ?></td>
                <td><?php echo $baca_keterangan; ?></td>
            </tr>

        <?php
        }
        ?>
    </table>