<?php
include "header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan
            <small>Asset Inventaris</small>
        </h1>
    </section>
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <center>
                <h6 style="font-size: 34px; font-family: arial; color:#000;" id="jam"></h6>
            </center>
        </div>
    </div>
    <section class="content-header">
        <a target="_blank" type="button" href="export-excel.php" class="btn btn-md btn-success"><span class="glyphicon glyphicon-PDF" aria-hidden="true"></span>
            &nbsp;Export To Excel
        </a>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
                            </thead>
                            <tbody>
                                <?php

                                include '../config/koneksi.php';

                                $tampil = " Select a.id,a.kode_inventaris, a.sn_inventaris, c.nama_jenis, b.nama_barang,
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
                                $hasil = mysqli_query($conn, $tampil);
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($hasil)) :
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?php echo $data['kode_inventaris']; ?></td>
                                        <td><?php echo $data['sn_inventaris']; ?></td>
                                        <td><?php echo $data['nama_jenis']; ?></td>
                                        <td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['karyawan_user']; ?></td>
                                        <td><?php echo $data['karyawan_pic']; ?></td>
                                        <td><?php echo $data['nama_divisi']; ?></td>
                                        <td><?php echo $data['nama_kota']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><?php echo $data['tgl_pinjam']; ?></td>
                                        <td><?php echo $data['tgl_kembali']; ?></td>
                                        <td><?php echo $data['keterangan']; ?></td>
                                        <?php $no++; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include "footer.php";
?>