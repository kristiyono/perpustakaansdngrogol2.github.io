<?php  

$id_transaksi = $_GET['id'];
$id = $_GET['judul'];

$ambil = $koneksi->query("UPDATE tb_transaksi set status='Telah Dikembalikan' WHERE id_transaksi=$id_transaksi");

$ambil = $koneksi->query("UPDATE tb_buku set jumlah_buku=(jumlah_buku+1) WHERE id=$id");

?>
	<script type="text/javascript">
		alert("Proses Pengembalian Buku Berhasil");
		window.location.href="index.php?halaman=transaksi_pengembalian";
	</script>
<?php

?>