<?php
include "header.php";
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Data
			<small>Barang</small>
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
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-barang"><span class="fa fa-plus" aria-hidden="true"></span>
			Tambah
		</button>
	</section>

	<?php
	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($conn, "SELECT max(id) as kodeTerbesar FROM barang");
	$data = mysqli_fetch_array($query);
	$kode_otomatis = $data['kodeTerbesar'];

	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kode_otomatis, 3, 3);

	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
	$huruf = "BGR";
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
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Unit Barang</th>
									<th>Harga Barang</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include '../config/koneksi.php';
								$tampil = "SELECT * FROM barang";
								$hasil = mysqli_query($conn, $tampil);
								while ($data = mysqli_fetch_assoc($hasil)) :
								?>
									<tr>
										<td><?php echo $data['id']; ?></td>
										<td><?php echo $data['nama_barang']; ?></td>
										<td><?php echo $data['unit']; ?></td>
										<td><?php echo $data['harga_barang']; ?></td>
										<td>
											<button type="button" title="Update" class="btn btn-info" data-toggle="modal" data-target="#edit_barang<?php echo $data['id']; ?>">
												<i class='glyphicon glyphicon-edit'></i>
											</button>
											<a href="proses.php?hapus_barang=<?php echo $data['id']; ?>" name="hapus_barang" title="Delete" class="btn btn-danger" onclick="return confirm('You are sure?');">
												<i class='glyphicon glyphicon-trash'></i>
											</a>
										</td>
										<!--modal edit data-->
										<div class="modal modal-info  fade" id="edit_barang<?php echo $data['id']; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
														<img src="../image/png.png" class="img-circle" alt="User Image" style="margin-right:0;">
														<h4 class="modal-title">Edit Barang</h4>
														<form action="proses.php" role="form" method="POST">
															<div class="modal-body">
																<div class="box-body">
																	<div class="form-group">
																		<label for="kd">Kode Barang</label>
																		<input type="text" name="edit_kode_barang" class="form-control" id="edit_kode_barang" value="<?php echo $data['id']; ?>" readonly>
																	</div>
																	<div class="form-group">
																		<label for="nb">Nama Barang</label>
																		<input type="text" name="edit_nama_barang" class="form-control" id="edit_nama_barang" value="<?php echo $data['nama_barang']; ?>" placeholder="Nama Barang" utocomplete="off" required>
																	</div>
																	<div class="form-group">
																		<label for="edit_unit_barang">Unit</label>
																		<select id="edit_unit_barang" name="edit_unit_barang" class="form-control">
																			<option value="">Pilih Satuan</option>
																			<option value="PCS">PCS</option>
																			<option value="KG">KG</option>
																			<option value="GRAM">GRAM</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="nb">Harga Barang</label>
																		<input type="number" name="edit_harga_barang" class="form-control" id="edit_harga_barang" value="<?php echo $data['harga_barang']; ?>" placeholder="Harga Barang" utocomplete="off" required>
																	</div>

																	<div class="modal-footer">
																		<button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
																		<button type="submit" name="edit_barang" class="btn btn-outline">Save</button>
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
	<div class="modal modal-success fade" id="tambah-barang">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<img src="../image/png.png" class="img-circle" alt="User Image" style="margin-right:0;">
					<h4 class="modal-title">Tambah Barang</h4>
				</div>
				<form action="proses.php" role="form" method="POST">
					<div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="kode_barang">Kode Barang</label>
								<input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?php echo $kode_otomatis; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="nama_barang">Nama Barang</label>
								<input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" required>
							</div>
							<div class="form-group">
								<label for="unit_barang">Unit</label>
								<select id="unit_barang" name="unit_barang" class="form-control">
									<option value="">Pilih Satuan</option>
									<option value="PCS">PCS</option>
									<option value="KG">KG</option>
									<option value="GRAM">GRAM</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nb">Harga Barang</label>
								<input type="number" name="harga_barang" class="form-control" id="harga_barang" placeholder="Harga Barang" utocomplete="off" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
						<button type="submit" name="simpan_barang" class="btn btn-outline">Save</button>
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