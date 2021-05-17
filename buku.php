<!-- AWAL Form Tambah Buku -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border alert alert-warning">

			<h3 class="box-title">Form Tambah Buku</h3>

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
							<label for="judul">Judul Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="judul" id="judul">
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Pengarang :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="pengarang" id="pengarang">
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Penerbit :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input type="text" class="form-control" name="penerbit" id="penerbit">
							</div>
						</div>
						<div class="form-group">
							<label for="pengarang">Tahun Terbit :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pengarang">ISBN :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-bookmark"></i>
								</div>
								<input type="text" class="form-control" name="isbn" id="isbn">
							</div>
						</div>

						<div class="form-group">
							<label for="pengarang">Jumlah Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<input type="text" class="form-control" name="jumlah_buku" id="jumlah_buku">
							</div>
						</div>

						<div class="form-group">

							<label for="">Lokasi Buku :</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="lokasi_buku">
									<option value="">- Pilih Lokasi Penyimpanan Buku -</option>
									<option value="Rak 1">Rak 1</option>
									<option value="Rak 2">Rak 2</option>
									<option value="Rak 3">Rak 3</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pengarang">Tanggal Penginputan Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="tgl_input" id="tgl_input">
							</div>
						</div>
						<button class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-save"> Simpan</span> </button>
						<?php 
						$tgl_input=date("Y-m-d h:i:s");

						if (isset($_POST['simpan'])) {
							$koneksi->query("INSERT INTO tb_buku
								(judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi_buku, tgl_input)
								VALUES ('$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun_terbit]','$_POST[isbn]','$_POST[jumlah_buku]', '$_POST[lokasi_buku]', '$tgl_input')");

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
<!-- AKHIR Form Tambah Buku -->


<!-- AWAL Tabel Data Buku Perpustakaan -->
<section class="content">
	<div class="box">
		<div class="box-header alert alert-warning">
			<h3 class="box-title">Data Buku Perpustakaan</h3>
		</div>
		<br>
		<div class="box-body">        	
			<table class="table table-striped table-bordered" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Buku</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Tahun Terbit</th>
						<th>ISBN</th>
						<th>Jumlah Buku</th>
						<th>Lokasi Buku</th>
						<th>Tanggal Penginputan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT *FROM tb_buku"); ?>
						<?php while($pecah = $ambil->fetch_assoc()){ ?>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['judul']; ?></td>
						<td><?php echo $pecah['pengarang']; ?></td>
						<td><?php echo $pecah['penerbit']; ?></td>
						<td><?php echo $pecah['tahun_terbit']; ?></td>
						<td><?php echo $pecah['isbn']; ?></td>
						<td><?php echo $pecah['jumlah_buku']; ?></td>
						<td><?php echo $pecah['lokasi_buku']; ?></td>
						<td><?php echo $pecah['tgl_input']; ?></td>
						<td>
							<!-- Tombol Ubah Data Buku -->
							<a href="index.php?halaman=edit_buku&id=<?php echo $pecah['id']; ?>" class="btn btn-primary"><span class="fa fa-edit"> Ubah</span></a>
							<br>
							<!-- Tombol Hapus Data Buku -->
							<a onclick="return confirm('Apakah anda yakin akan menghapus Buku ini ?')" href="index.php?halaman=hapus_buku&id=<?php echo $pecah['id']; ?>" class="btn btn-danger"><span class="fa fa-trash"> Hapus</span></a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!-- AKHIR Data Buku Perpustakaan -->


<!-- INFORMASI -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border alert alert-info">
			<h3 class="box-title"><span class="fa fa-info-circle"> Informasi</span></h3>
		</div>
		<div class="box-body">
			<div class="row">
				<ul>
					<li><b>Penambahan Data Buku Perpustakaan</b></li><br>
					<ul>
						<li>Untuk Menambah Buku Perpustakaan, Harap mengisi Data Buku Perpustakaan dengan lengkap pada <b>Form Tambah Buku Perpustakaan</b>, setelah itu klik tombol <button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-save"> Simpan</span> </button></li>
					</ul>
					<br>
					<li><b>Pengelolaan Data Buku Perpustakaan</b></li><br>
					<ul>
						<li>Untuk Mengubah atau Mengedit Buku Perpustakaan, klik tombol <button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-edit"> Ubah</span> </button></li>

						<li>Untuk Menghapus Buku Perpustakaan, klik tombol <button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"> Hapus</span> </button></li>
					</ul>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- INFORMASI -->