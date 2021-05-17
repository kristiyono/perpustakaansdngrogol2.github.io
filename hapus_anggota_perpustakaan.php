<?php

	$ambil = $koneksi->query("SELECT * FROM anggota WHERE id_anggota='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();

	$koneksi->query("DELETE FROM anggota WHERE id_anggota='$_GET[id]'");

	echo "<script>alert('Data Anggota Perpustakaan Berhasil Dihapus');</script>";
	echo "<script>location='index.php?halaman=anggota_perpustakaan'</script>";

?>