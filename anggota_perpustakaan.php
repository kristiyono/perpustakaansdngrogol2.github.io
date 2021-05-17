<?php  
$ambilkelas = $koneksi->query("SELECT * FROM anggota");
$kelas = $ambilkelas->fetch_assoc();
$jumlahkelas = $ambilkelas->num_rows;
?>
<!-- AWAL Form Tambah Anggota Perpustakaan -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border alert alert-warning">

			<h3 class="box-title">Form Tambah Anggota Perpustakaan</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<br>

		<div class="box-body">
			<div class="row">
				<form method="POST">
					<div class="col-md-6">
						<!-- form group -->
						<div class="form-group">
							<label for="nis">NIS :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="nis" id="nis">
							</div>
						</div>
						<div class="form-group">
							<label for="nama_anggota">Nama Anggota :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="nama_anggota" id="nama_anggota">
							</div>
						</div>
						<div class="form-group">

							<label for="">Kelas :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-home"></i>
								</div>
								<select class="form-control" name="kd_kelas">
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
								<select class="form-control" name="jenis_kelamin">
									<option value="">- Pilih Jenis Kelamin -</option>
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
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
								<input type="text" class="form-control" name="alamat" id="alamat">
							</div>
						</div>
						
						<div class="form-group">

							<label for="">Status :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="status">
									<option value="">- Pilih Status Anggota Perpustakaan -</option>
									<option value="Aktif">Aktif</option>
									<option value="Tidak Aktif">Tidak Aktif</option>
								</select>
							</div>
						</div>

						
						<button class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-save"> Simpan</span> </button>
						<?php 
						

						if (isset($_POST['simpan'])) {

							$koneksi->query("INSERT INTO anggota
								(id_anggota, nama_anggota, kd_kelas, jenis_kelamin, alamat, status)
								VALUES ('$_POST[nis]','$_POST[nama_anggota]','$_POST[kd_kelas]','$_POST[jenis_kelamin]','$_POST[alamat]','$_POST[status]')");

							echo "<script>alert('Anggota Perpustakaan Berhasil Ditambahkan');</script>";
							echo "<script>location='index.php?halaman=anggota_perpustakaan';</script>";

						}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- AKHIR Form Tambah Anggota Perpustakaan -->


<!-- Data Anggota Perpustakaan -->
<section class="content">
	<div class="box">
		<div class="box-header alert-warning">
			<h3 class="box-title">Data Anggota Perpustakaan</h3>
		</div>
		<br>
		<div class="box-body">        	
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>Nama Anggota</th>
						<th>Jenis Kelamin</th>
						<th>Kelas</th>
						<th>Alamat</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT *FROM anggota JOIN tb_kelas ON anggota.kd_kelas=tb_kelas.kd_kelas WHERE status='Aktif'"); ?>
						<?php while($pecah = $ambil->fetch_assoc()){ ?>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['id_anggota']; ?></td>
						<td><?php echo $pecah['nama_anggota']; ?></td>
						<td><?php echo $pecah['jenis_kelamin']; ?></td>
						<td><?php echo $pecah['kelas']; ?></td>
						<td><?php echo $pecah['alamat']; ?></td>
						<td><?php echo $pecah['status'] ?></td>
						<td>
							<!-- Tombol Ubah Data Anggota Perpustakaan -->
							<a href="index.php?halaman=edit_anggota_perpustakaan&id=<?php echo $pecah['id_anggota']; ?>" class="btn btn-primary"><span class="fa fa-edit"> Ubah</span></a>
							<br>
							<!-- Tombol Hapus Data Anggota Perputakaan -->
							<a href="index.php?halaman=hapus_anggota_perpustakaan&id=<?php echo $pecah['id_anggota']; ?>" class="btn btn-danger"><span class="fa fa-trash"> Hapus</span></button>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- INFORMASI -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border alert alert-info">
			<h3 class="box-title"><span class="fa fa-info-circle"> Informasi</span></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<ul>
					<li><b>Penambahan Data Anggota Perpustakaan</b></li><br>
					<ul>
						<li>Untuk Menambah Anggota Perpustakaan, Harap mengisi Data Anggota Perpustakaan dengan lengkap pada <b>Form Tambah Anggota Perpustakaan</b>, setelah itu klik tombol <button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-save"> Simpan</span> </button></li>
					</ul>
					<br>
					<li><b>Pengelolaan Data Anggota Perpustakaan</b></li><br>
					<ul>
						<li>Untuk Mengubah atau Mengedit Anggota Perpustakaan, klik tombol <button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-edit"> Ubah</span> </button></li>

						<li>Untuk Menghapus Anggota Perpustakaan, klik tombol <button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"> Hapus</span> </button></li>
					</ul>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- INFORMASI -->
