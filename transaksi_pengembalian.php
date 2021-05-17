<?php  

$tujuh_hari = mktime(0,0,0, date("n"), date("j")+7, date("Y"));
$tgl_kembali = date("Y-m-d", $tujuh_hari);
?>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Daftar Buku Yang Sedang Dipinjam</h3>
			<hr>
		</div>
		<br>
		<div class="box-body">        	
			<table class="table table-striped table-bordered" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Buku</th>
						<th>ID Anggota</th>
						<th>Nama Anggota</th>
						<th>Tanggal Peminjaman</th>
						<th>Tanggal Pengembalian</th>
						<th>Terlambat</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT *FROM tb_transaksi WHERE status='Sedang Dipinjam'"); ?>
						<?php while($pecah = $ambil->fetch_assoc()){ ?>
						<td><?php echo $nomor; ?></td>
						<th><?php echo $pecah['judul']; ?></th>
						<td><?php echo $pecah['id_anggota']; ?></td>
						<td><?php echo $pecah['nama_anggota']; ?></td>
						<td><?php echo $pecah['tgl_pinjam']; ?></td>
						<td><?php echo $pecah['tgl_kembali']; ?></td>
						<td>
							<?php  
							$denda = 1000;
							$tgl_dateline = $pecah['tgl_kembali'];
							$tgl_kembali = date("Y-m-d");
							$lambat = terlambat($tgl_dateline, $tgl_kembali);
							$denda1 = $lambat*$denda;


							if ($lambat>0) {
					
								echo "<span class='btn btn-danger'>
								$lambat Hari <br>Denda (Rp. $denda1)";
								
							}
							else{
								echo "<span class='btn btn-info'> 0 Hari";

							}
							
							?>
						</td>
						<td><?php echo $pecah['status']; ?></td>

						<td>
							<!-- Pengembalian Peminjaman Buku -->
							<a href="index.php?halaman=pengembalian&id=<?php echo $pecah['id_transaksi']; ?>&judul=<?php echo $pecah['id']; ?>" class="btn btn-warning btn-xs"> Pengembalian </a>
							<br>
							<!-- Perpanjangan Peminjaman Buku -->
							<a onclick="return confirm('Apakah anda akan memperpanjang peminjaman Buku ?')" href="index.php?halaman=perpanjangan&id=<?php echo $pecah['id_transaksi']; ?>&judul=<?php echo $pecah['id']; ?>&lambat=<?php echo $lambat ?>&tgl_kembali=<?php echo $pecah['tgl_kembali'] ?>" class="btn btn-primary btn-xs"> Perpanjangan </a>
						</td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
			<br>
			<br>
		</div>
	</div>
</section>

<!-- AKHIR Transaksi Peminjaman Buku Perpustakaan -->

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Daftar Buku Yang Telah Dikembalikan</h3>
			<hr>
		</div>
		<br>
		<div class="box-body">        	
			<table class="table table-striped table-bordered" id="dataTables-example">
				<thead>
					<tr>
						<th>No</th>
						<th>Buku</th>
						<th>ID Anggota</th>
						<th>Nama Anggota</th>
						<th>Tanggal Peminjaman</th>
						<th>Tanggal Pengembalian</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT *FROM tb_transaksi WHERE status='Telah Dikembalikan'"); ?>
						<?php while($pecah = $ambil->fetch_assoc()){ ?>
						<td><?php echo $nomor; ?></td>
						<th><?php echo $pecah['judul']; ?></th>
						<td><?php echo $pecah['id_anggota']; ?></td>
						<td><?php echo $pecah['nama_anggota']; ?></td>
						<td><?php echo $pecah['tgl_pinjam']; ?></td>
						<td><?php echo $pecah['tgl_kembali']; ?></td>
						<td><?php echo $pecah['status']; ?></td>
					</tr>
					<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
			<br>
			<br>
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
					<li><b>Aturan Peminjaman Buku Perpustakaan</b></li><br>
					<ul>
						<li>Tanggal Pengembalian Buku Harus Sesuai dengan Tanggal Pengembalian </li>
						<li>
							Jika Melebihi Batas Tanggal Pengembalian Buku, Maka Anggota Perpustakaan Akan Dikenakan Denda
						</li>
						<li>
							Lewat 1 Hari Akan Dikenakan Denda Sebesar = <font color="red">Rp. 1.000 Rupiah</font>
						</li>
						<li>Jika Ingin Melakukan Perpanjangan Peminjaman Buku diharapkan mengembalikan buku terlebih dahulu, jika sudah dikembalikan maka transaksi perpanjangan peminjaman buku bisa dilakukan</li>
					</ul>
					<br>
					<li><b>Pengelolaan Transaksi Pengembalian Buku Perpustakaan</b></li><br>
					<ul>
						<li>Untuk Mengembalikan Buku Perpustakaan, klik tombol <button class="btn btn-warning btn-xs" > Pengembalian</button></li>

						<li>Untuk Melakukan perpanjangan peminjaman Buku Perpustakaan, klik tombol <button class="btn btn-primary btn-xs" > Perpanjangan</button></li>
					</ul>
				</ul>
			</div>
		</div>
	</div>
</section>
