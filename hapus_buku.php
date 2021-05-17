<?php

	$ambil = $koneksi->query("SELECT * FROM tb_buku WHERE id='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM tb_buku WHERE id='$_GET[id]'");

	echo "<script>alert('Data Buku Berhasil Dihapus');</script>";
	echo "<script>location='index.php?halaman=buku'</script>";

?>