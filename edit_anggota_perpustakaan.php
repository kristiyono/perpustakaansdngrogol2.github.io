<?php 
$ambil=$koneksi->query("SELECT *FROM anggota WHERE id_anggota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$status=$pecah['status'];
$jenis_kelamin=$pecah['jenis_kelamin'];

$ambilkelas = $koneksi->query("SELECT * FROM tb_kelas");
$kelas = $ambilkelas->fetch_assoc();
$jumlahkelas = $ambilkelas->num_rows;

?>
<!-- AWAL Form Tambah Buku -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border">

			<h3 class="box-title">Form Ubah Anggota Perpustakaan</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<br>

		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<form method="POST">
						<!-- form group -->
						<div class="form-group">
							<label for="nis">NIS :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="nis" id="nis" value="<?php echo $pecah['id_anggota']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="nama_anggota">Nama Anggota :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="<?php echo $pecah['nama_anggota']; ?>">
							</div>
						</div>
						<div class="form-group">

							<label for="">Kelas :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<select class="form-control" name="kd_kelas" required >
									<option value="">- Pilih Kelas -</option>
									<?php for ($i=0; $i <= $jumlahkelas; $i++) { 
										$ambilkelas = $koneksi->query("SELECT * FROM tb_kelas WHERE kd_kelas='$i'");
										$kelas = $ambilkelas->fetch_assoc();
										echo "<option value=";
										echo $kelas['kd_kelas'];
										echo ">";
										echo $kelas['kelas'];
										echo "</option>";
									} ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">

							<label for="">Jenis Kelamin :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="jenis_kelamin" required>
									<option value="">- Pilih Jenis Kelamin -</option>
									<option value="L" <?php if ($jenis_kelamin=='L') {echo "selected";} ?>>Laki - Laki</option>
									<option value="P" <?php if ($jenis_kelamin=='P') {echo "selected";} ?>>Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat:</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-bookmark"></i>
								</div>
								<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $pecah['alamat']; ?>">
							</div>
						</div>
						
						<div class="form-group">

							<label for="">Status :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="status">
									<option value="Aktif" <?php if ($status=='Aktif') {echo "selected";} ?>> Aktif</option>
									<option value="Tidak Aktif" <?php if ($status=='Tidak Aktif') {echo "selected";} ?>>Tidak Aktif</option>
								</select>
							</div>
						</div>

						
						<button class="btn btn-primary" name="ubah"><span class="glyphicon glyphicon-save"> Ubah</span> </button>
						<?php 
						
						if (isset($_POST['ubah'])) {
							$koneksi->query("UPDATE anggota SET
								id_anggota='$_POST[nis]',
								nama_anggota='$_POST[nama_anggota]',
								kd_kelas='$_POST[kd_kelas]',
								jenis_kelamin='$_POST[jenis_kelamin]',
								alamat='$_POST[alamat]',
								status='$_POST[status]' 
								WHERE id_anggota=$_GET[id]");

							echo "<script>alert('Anggota Perpustakaan Berhasil DiUbah');</script>";
							echo "<script>location='index.php?halaman=anggota_perpustakaan';</script>";

						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
