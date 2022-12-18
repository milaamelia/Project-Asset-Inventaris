<?php
include "header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-asset"><span class="fa fa-plus" aria-hidden="true"></span>
            Tambah
        </button>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
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
                                    <th>Status Inventaris</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include '../config/koneksi.php';

                                $tampil = " Select a.id,a.kode_inventaris, a.sn_inventaris, c.nama_jenis, b.nama_barang,
                                                f.nama_karyawan As karyawan_user, g.nama_karyawan As karyawan_pic,
                                                e.nama_divisi, d.nama_kota, a.status,a.tgl_pinjam, a.tgl_kembali,
                                                a.keterangan, a.status_inventaris
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
                                        <td><?php echo $data['status_inventaris']; ?></td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_asset<?php echo $data['id']; ?>">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </button>
                                            <a href="proses.php?pengembalian_asset=<?php echo $data['id']; ?>" name="pengembalian_asset" title="Pengembalian Data Asset" class="btn btn-warning" onclick="return confirm('You are sure?');">
                                                <i class='fa fa-arrow-down'></i>
                                            </a>
                                            <a href="proses.php?hapus_asset=<?php echo $data['id']; ?>" name="hapus_asset" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
                                                <i class='glyphicon glyphicon-trash'></i>
                                            </a>
                                        </td>
                                        <?php $no++; ?>
                                        <!--modal edit data-->
                                        <div class="modal modal-info  fade" id="edit_asset<?php echo $data['id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:0px;">
                                                        <h4 class="modal-title">Edit Inventaris Asset</h4>
                                                        <form action="proses.php" role="form" method="POST">
                                                            <div class="modal-body">
                                                                <div class="box-body">
                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label for="kode-inventaris">Kode Inventaris</label>
                                                                            <input type="text" name="kode-inventaris" class="form-control" id="kode-inventaris" value="<?php echo $data['kode_inventaris']; ?>" readonly required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="sn-inventaris">SN Inventaris</label>
                                                                            <input type="text" name="sn-inventaris" class="form-control" id="sn-inventaris" value="<?php echo $data['sn_inventaris']; ?>" required>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="jenis">Jenis Barang</label>
                                                                                <select name="jenis" for="jenis" class="form-control" required>
                                                                                    <option value="">Pilih Jenis Nama Divisi</option>
                                                                                    <?php
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY nama_jenis ASC");
                                                                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                        <option value="<?php echo $tampil['kode_jenis']; ?>"><?php echo $tampil['nama_jenis']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="barang">Nama Barang</label>
                                                                                <select name="barang" for="barang" class="form-control" required>
                                                                                    <option value="">Pilih Jenis Nama Barang</option>
                                                                                    <?php
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
                                                                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                        <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_barang']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="user">User</label>
                                                                                <select name="user" for="user" class="form-control" required>
                                                                                    <option value="">Pilih Nama User</option>
                                                                                    <?php
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY nama_karyawan ASC");
                                                                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                        <option value="<?php echo $tampil['nik']; ?>"><?php echo $tampil['nama_karyawan']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="pic">PIC</label>
                                                                                <select name="pic" for="pic" class="form-control" required>
                                                                                    <option value="">Pilih Nama PIC</option>
                                                                                    <?php
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY nama_karyawan ASC");
                                                                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                        <option value="<?php echo $tampil['nik']; ?>"><?php echo $tampil['nama_karyawan']; ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="divisi">Divisi</label>
                                                                            <select name="divisi" for="divisi" class="form-control" required>
                                                                                <option value="">Pilih Jenis Nama Divisi</option>
                                                                                <?php
                                                                                $sql = mysqli_query($conn, "SELECT * FROM divisi ORDER BY nama_divisi ASC");
                                                                                while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                    <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_divisi']; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="lokasi">Lokasi</label>
                                                                            <select name="lokasi" for="lokasi" class="form-control" required>
                                                                                <option value="">Pilih Jenis Nama Lokasi</option>
                                                                                <?php
                                                                                $sql = mysqli_query($conn, "SELECT * FROM kota ORDER BY nama_kota ASC");
                                                                                while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                    <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_kota']; ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-6">
                                                                                <label>Tanggal Pinjam:</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                    <input type="date" name="tgl-pinjam" value="<?php echo $data['tgl_pinjam']; ?>" class="form-control pull-right" id="datepicker" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label>Tanggal Kembali:</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon">
                                                                                        <i class="fa fa-calendar"></i>
                                                                                    </div>
                                                                                    <input type="date" name="tgl-kembali" value="<?php echo $data['tgl_kembali']; ?>" class="form-control pull-right" id="datepicker" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status">Status</label>
                                                                            <input class="form-control" type="text" value="<?php echo $data['status']; ?>" name="status" required></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Keterangan</label>
                                                                            <textarea class="form-control" rows="3" name="keterangan" value="<?php echo $data['keterangan']; ?>" required></textarea>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="edit_asset" class="btn btn-outline">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal modal-success fade" id="tambah-asset">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:0px;">
                    <h4 class="modal-title">Tambah Data Inventaris</h4>
                </div>
                <form action="proses.php" role="form" method="POST">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kode-inventaris">Kode Inventaris</label>
                                <input type="text" name="kode-inventaris" class="form-control" id="kode-inventaris" placeholder="Kode Inventori" required>
                            </div>
                            <div class="form-group">
                                <label for="sn-inventaris">SN Inventaris</label>
                                <input type="text" name="sn-inventaris" class="form-control" id="sn-inventaris" placeholder="SN Inventaris" required>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="jenis">Jenis Barang</label>
                                    <select name="jenis" for="jenis" class="form-control" required>
                                        <option value="">Pilih Jenis Nama Divisi</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM tb_jenis ORDER BY nama_jenis ASC");
                                        while ($tampil = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo $tampil['kode_jenis']; ?>"><?php echo $tampil['nama_jenis']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="barang">Nama Barang</label>
                                    <select name="barang" for="barang" class="form-control" required>
                                        <option value="">Pilih Jenis Nama Barang</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
                                        while ($tampil = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_barang']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="user">User</label>
                                    <select name="user" for="user" class="form-control" required>
                                        <option value="">Pilih Nama User</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY nama_karyawan ASC");
                                        while ($tampil = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo $tampil['nik']; ?>"><?php echo $tampil['nama_karyawan']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic">PIC</label>
                                    <select name="pic" for="pic" class="form-control" required>
                                        <option value="">Pilih Nama PIC</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY nama_karyawan ASC");
                                        while ($tampil = mysqli_fetch_array($sql)) { ?>
                                            <option value="<?php echo $tampil['nik']; ?>"><?php echo $tampil['nama_karyawan']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="divisi">Divisi</label>
                                <select name="divisi" for="divisi" class="form-control" required>
                                    <option value="">Pilih Jenis Nama Divisi</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM divisi ORDER BY nama_divisi ASC");
                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_divisi']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <select name="lokasi" for="lokasi" class="form-control" required>
                                    <option value="">Pilih Jenis Nama Lokasi</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM kota ORDER BY nama_kota ASC");
                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_kota']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Tanggal Pinjam:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="tgl-pinjam" class="form-control pull-right" id="datepicker" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tanggal Kembali:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" name="tgl-kembali" class="form-control pull-right" id="datepicker" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input class="form-control" type="text" name="status" placeholder="Status" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" rows="3" name="keterangan" placeholder="Keterangan..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" name="simpan_asset" class="btn btn-outline">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<?php
include "footer.php";
?>