<?php
include "header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data
            <small>Karyawan</small>
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-karyawan"><span class="fa fa-plus" aria-hidden="true"></span>
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
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Divisi</th>
                                    <th>Status</th>
                                    <th>Jabatan</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No Tlp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include '../config/koneksi.php';

                                $tampil = " Select a.nik, a.nama_karyawan,b.nama_divisi,
                                                   c.nama_jabatan,a.alamat,a.email,a.no_tlp,a.status,
                                                   a.jenis_kelamin
                                            From karyawan a
                                            Join divisi b On a.id_divisi =  b.id
                                            Join jabatan c On a.id_jabatan = c.id
                                            Order By a.nama_karyawan Asc";
                                $hasil = mysqli_query($conn, $tampil);
                                $no = 1;
                                while ($data = mysqli_fetch_assoc($hasil)) :
                                ?>
                                    <tr>
                                        <td><?php echo $data['nik']; ?></td>
                                        <td><?php echo $data['nama_karyawan']; ?></td>
                                        <td><?php echo $data['jenis_kelamin']; ?></td>
                                        <td><?php echo $data['nama_divisi']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><?php echo $data['nama_jabatan']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['no_tlp']; ?></td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_karyawan<?php echo $data['nik']; ?>">
                                                <i class='glyphicon glyphicon-edit'></i>
                                            </button>
                                            <a href="proses.php?hapus_karyawan=<?php echo $data['nik']; ?>" name="hapus_karyawan" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
                                                <i class='glyphicon glyphicon-trash'></i>
                                            </a>
                                        </td>
                                        <?php $no++; ?>
                                        <!--modal edit data-->
                                        <div class="modal modal-info  fade" id="edit_karyawan<?php echo $data['nik']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:0px;">
                                                        <h4 class="modal-title">Edit Karyawan</h4>
                                                        <form action="proses.php" role="form" method="POST">
                                                            <div class="modal-body">
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label for="nik">NIK</label>
                                                                        <input type="number" maxlength="11" name="nik" class="form-control" id="nik" value="<?php echo $data['nik']; ?>" readonly required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama-karyawan">Nama Karyawan</label>
                                                                        <input type="text" name="nama-karyawan" class="form-control" id="nama-karyawan" value="<?php echo $data['nama_karyawan']; ?>" required>
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
                                                                        <label for="jabatan">Jabatan</label>
                                                                        <select name="jabatan" for="jabatan" class="form-control" required>
                                                                            <option value="">Pilih Jenis Nama Jabatan</option>
                                                                            <?php
                                                                            $sql = mysqli_query($conn, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
                                                                            while ($tampil = mysqli_fetch_array($sql)) { ?>
                                                                                <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_jabatan']; ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis-kelamin">Jenis Kelamin</label>
                                                                        <select id="jenis-kelamin" name="jenis-kelamin" class="form-control" required>
                                                                            <option value="">Pilih Jenis Kelamin</option>
                                                                            <option value="Perempuan">Perempuan</option>
                                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="status-karyawan">Status Karyawan</label>
                                                                        <select id="status-karyawan" name="status-karyawan" class="form-control" required>
                                                                            <option value="">Pilih Status Karyawan</option>
                                                                            <option value="Karyawan Tetap">Karyawan Tetap</option>
                                                                            <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <textarea class="form-control" rows="3" name="alamat" value="<?php echo $data['alamat']; ?>" required></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input class="form-control" type="text" name="email" value="<?php echo $data['email']; ?>"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no-tlp">No.Tlp</label>
                                                                        <input type="text" name="no-tlp" class="form-control" id="no-tlp" value="<?php echo $data['no_tlp']; ?>" required>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="edit_karyawan" class="btn btn-outline">Save</button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal modal-success fade" id="tambah-karyawan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <img src="../image/Admin.png" class="img-circle" alt="User Image" style="margin-right:0px;">
                    <h4 class="modal-title">Tambah Data Karyawan</h4>
                </div>
                <form action="proses.php" role="form" method="POST">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" maxlength="11" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                            </div>
                            <div class="form-group">
                                <label for="nama-karyawan">Nama Karyawan</label>
                                <input type="text" name="nama-karyawan" class="form-control" id="nama-karyawan" placeholder="Nama Karyawan" required>
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
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" for="jabatan" class="form-control" required>
                                    <option value="">Pilih Jenis Nama Jabatan</option>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
                                    while ($tampil = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $tampil['id']; ?>"><?php echo $tampil['nama_jabatan']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis-kelamin">Jenis Kelamin</label>
                                <select id="jenis-kelamin" name="jenis-kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status-karyawan">Status Karyawan</label>
                                <select id="status-karyawan" name="status-karyawan" class="form-control" required>
                                    <option value="">Pilih Status Karyawan</option>
                                    <option value="Karyawan Tetap">Karyawan Tetap</option>
                                    <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" name="email" placeholder="name@example.com" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no-tlp">No.Tlp</label>
                                <input type="text" name="no-tlp" class="form-control" id="no-tlp" placeholder="No.Tlp" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" name="simpan_karyawan" class="btn btn-outline">Save</button>
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