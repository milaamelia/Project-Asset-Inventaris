<?php
include "header.php";
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Data
			<small>Divisi</small>
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
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-divisi"><span class="fa fa-plus" aria-hidden="true"></span>
			Tambah
		</button>
	</section>

	<?php
	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($conn, "SELECT max(id) as kodeTerbesar FROM divisi");
	$data = mysqli_fetch_array($query);
	$kode_otomatis = $data['kodeTerbesar'];

	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kode_otomatis, 3, 3);

	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;

	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "DVS";
	$kode_otomatis = $huruf . sprintf("%03s", $urutan);
	?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Kode Divisi</th>
									<th>Nama Divisi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include '../config/koneksi.php';
								$tampil = "SELECT * FROM divisi";
								$hasil = mysqli_query($conn, $tampil);
								while ($data = mysqli_fetch_assoc($hasil)) :
								?>
									<tr>
										<td><?php echo $data['id']; ?></td>
										<td><?php echo $data['nama_divisi']; ?></td>
										<td>
											<button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_divisi<?php echo $data['id']; ?>">
												<i class='glyphicon glyphicon-edit'></i>
											</button>
											<a href="proses.php?hapus_divisi=<?php echo $data['id']; ?>" name="hapus_divisi" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
												<i class='glyphicon glyphicon-trash'></i>
											</a>
										</td>
										<!--modal edit data-->
										<div class="modal modal-info  fade" id="edit_divisi<?php echo $data['id']; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
														<img src="../image/png.png" class="img-circle" alt="User Image" style="margin-right:0;">
														<h4 class="modal-title">Edit Divisi</h4>
														<form action="proses.php" role="form" method="POST">
															<div class="modal-body">
																<div class="box-body">
																	<div class="form-group">
																		<label for="kd">Kode Divisi</label>
																		<input type="text" name="edit_kode_divisi" class="form-control" id="kd" value="<?php echo $data['id']; ?>" readonly>
																	</div>
																	<div class="form-group">
																		<label for="nb">Nama Divisi</label>
																		<input type="text" name="edit_nama_divisi" class="form-control" id="nb" value="<?php echo $data['nama_divisi']; ?>" placeholder="Nama Divisi" utocomplete="off" required>
																	</div>

																	<div class="modal-footer">
																		<button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
																		<button type="submit" name="edit_divisi" class="btn btn-outline">Save</button>
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
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal modal-success fade" id="tambah-divisi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<img src="../image/png.png" class="img-circle" alt="User Image" style="margin-right:0;">
					<h4 class="modal-title">Tambah Divisi</h4>
				</div>
				<form action="proses.php" role="form" method="POST">
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="kd">Kode Divisi</label>
								<input type="text" name="kode_divisi" class="form-control" id="kode_divisi" value="<?php echo $kode_otomatis; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="nb">Nama Divisi</label>
								<input type="text" name="nama_divisi" class="form-control" id="nama_divisi" placeholder="Nama Divisi" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
						<button type="submit" name="simpan_divisi" class="btn btn-outline">Save</button>
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