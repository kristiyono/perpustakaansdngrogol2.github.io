<?php 
$ambil=$koneksi->query("SELECT *FROM tb_buku WHERE id='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$lokasi=$pecah['lokasi_buku'];
$tgl_perubahan=date("Y-m-d");



?>
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border">

			<h3 class="box-title">Form Edit Buku</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<br>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<form method="POST">
						<!-- form group -->
						<div class="form-group">
							<label for="judul">Judul Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['judul']; ?> " name="judul" required >
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Pengarang :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['pengarang']; ?>" name="pengarang" required>
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Penerbit :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['penerbit']; ?> " name="penerbit" required>
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Tahun Terbit :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['tahun_terbit']; ?> " name="tahun_terbit" required>
							</div>
						</div>
						<button class="btn btn-primary" name="ubah"><span class="glyphicon glyphicon-save"> Ubah</span> </button>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pengarang">ISBN :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-bookmark"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['isbn']; ?> " name="isbn" required>
							</div>
						</div>

						<div class="form-group">
							<label for="pengarang">Jumlah Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" value="<?php echo $pecah['jumlah_buku']; ?> " name="jumlah_buku" required>
							</div>
						</div>

						<div class="form-group">

							<label for="">Lokasi Buku :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="lokasi_buku" required>

									<option value="Rak 1" <?php if ($lokasi=='Rak 1') {echo "selected";} ?>> Rak 1</option>
									<option value="Rak 2" <?php if ($lokasi=='Rak 2') {echo "selected";} ?>>Rak 2</option>
									<option value="Rak 3" <?php if ($lokasi=='Rak 3') {echo "selected";} ?>>Rak 3</option>

								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pengarang">Tanggal Perubahan Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="tgl_input" value="<?php echo $tgl_perubahan; ?>" readonly  >
							</div>
						</div>
						<?php 
						$tgl_perubahan=date("Y-m-d h:i:s");

						if (isset($_POST['ubah'])) {
							$koneksi->query("UPDATE tb_buku SET judul='$_POST[judul]',
								pengarang='$_POST[pengarang]',
								penerbit='$_POST[penerbit]',
								tahun_terbit='$_POST[tahun_terbit]',
								isbn='$_POST[isbn]',
								jumlah_buku='$_POST[jumlah_buku]', 
								lokasi_buku='$_POST[lokasi_buku]', 
								tgl_input='$tgl_perubahan'
								WHERE id='$_GET[id]'");

							echo "<script>alert('Buku Berhasil Ditambahkan');</script>";
							echo "<script>location='index.php?halaman=buku';</script>";

						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>