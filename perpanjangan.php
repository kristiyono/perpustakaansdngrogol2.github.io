<?php 

$id_transaksi = $_GET['id'];
$id = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat =$_GET['lambat'];

if ($lambat > 7) {
	?>
		<script type="text/javascript">
			alert("Peminjaman Buku Tidak Dapat Diperpanjang, karena sudah lebih dari 7 Hari. Diharapkan Mengembalikan Buku Terlebih Dahulu");
			window.location.href="?halaman=transaksi_pengembalian";
		</script>
	<?php
}else{
	$pecah_tgl_kembali = explode("-", $tgl_kembali);
	$next_7_hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0]+7, $pecah_tgl_kembali[2] );
	$hari_next = date("d-m-Y", $next_7_hari);

	$ambil = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE id=$id");
	if ($ambil) {
		# code...
		?>
			<script type="text/javascript">
			alert("Perpanjangan Peminjaman Buku Berhasil");
			window.location.href="?halaman=transaksi_peminjaman";
			</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
			alert("Perpanjangan Peminjaman Buku Gagal");
			window.location.href="?halaman=transaksi_peminjaman";
			</script>
		<?php
	}
}


?>