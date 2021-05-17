<?php  

$tgl_pinjam =date("Y-m-d");
$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$tgl_kembali = date("Y-m-d", $tujuh_hari);
?>

<!-- AWAL Form Tambah Anggota Perpustakaan -->
<section class="content">
	<div class="box box-default">
		<div class="box-header with-border">

			<h3 class="box-title">Form Tambah Transaksi Peminjaman Buku</h3>

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
							<label for="nama_anggota">Nama Anggota :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<select class="form-control" name="nama_anggota" id="nama_anggota">
									<option value=""></option>
									<?php  
									$ambil=$koneksi->query("SELECT * FROM anggota order by id_anggota");

									while ($peranggota = $ambil->fetch_assoc()) {
										echo "<option value='$peranggota[id_anggota].$peranggota[nama_anggota]'>$peranggota[id_anggota]. $peranggota[nama_anggota]</option>";
									}
									?>
									
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="judul">Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-book"></i>
								</div>
								<select class="form-control" name="judul">
									<option value=""></option>
									<?php  
									$ambil=$koneksi->query("SELECT * FROM tb_buku order by id");

									while ($perjudulbuku = $ambil->fetch_assoc()) {
										echo "<option value='$perjudulbuku[id].$perjudulbuku[judul]'>$perjudulbuku[id]. $perjudulbuku[judul]</option>";
									}
									?>
									
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tgl_pinjam">Tanggal Peminjaman Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" readonly >
							</div>
						</div>
						
						<div class="form-group">
							<label for="tgl_kembali">Tanggal Pengembalian Buku :</label>
							<!-- input group -->
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control" name="tgl_kembali" id="tgl_kembali" value="<?php echo $tgl_kembali; ?>" readonly>
							</div>
						</div>

						
						<button class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-plus"> Tambah</span></button>
						<?php 
						
						if (isset($_POST['simpan'])) {
							$tgl_pinjam = $_POST['tgl_pinjam'];
							$tgl_kembali = $_POST['tgl_kembali'];

							$buku = $_POST['judul'];
							$pecah_judul = explode(".", $buku);
							$id = $pecah_judul[0];
							$judul = $pecah_judul[1];

							$nama_anggota = $_POST['nama_anggota'];
							$pecah_nama_anggota = explode(".", $nama_anggota);
							$id_anggota = $pecah_nama_anggota[0];
							$nama_anggota = $pecah_nama_anggota[1];

							$ambil1 = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$id'");
							while ($pecah1 = $ambil1->fetch_assoc()) {
								# code...
								$sisa = $pecah1['jumlah_buku'];
								if ($sisa == 0) {
									?>
									<script type="text/javascript">
										alert("Stok Buku Kosong, Transaksi tidak dapat dilakukan, Silahkan Tambah Stok Buku Dahulu");
										window.location.href="?halaman=transaksi_peminjaman&aksi=tambah";
									</script>
									<?php  								 
								}else{
									$ambil2 = $koneksi->query("INSERT INTO tb_transaksi(judul,id_anggota,id, nama_anggota, tgl_pinjam, tgl_kembali) values ('$judul', '$id_anggota', '$id', '$nama_anggota', '$tgl_pinjam', '$tgl_kembali') ");
									$ambil3 = $koneksi->query("UPDATE tb_buku set jumlah_buku=(jumlah_buku-1) where id='$id'");
									?>
									<script type="text/javascript">
										alert("Data Transaksi Berhasil Disimpan");
										window.location.href="?halaman=transaksi_pengembalian";
									</script>
									<?php  		

								}
							}

							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- AKHIR Form Tambah Anggota Perpustakaan -->