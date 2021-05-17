<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="/dist/img/images.png">

	<title>Perpustakaan Madrasah Al-Hanif</title>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<!-- Bootstrap 3.3.7 -->

	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>

	<?php
	//koneksi database
	require "koneksi.php";

	?>


	<div class="container">

		<center><h2>LAPORAN PEMINJAMAN BUKU</h2></center>
		<center><h4>Perpustakaan Madrasah Al-Hanif</h4></center>
		<br/>
		<hr>
		<br/>
		<?php 
		if(isset($_GET['dari']) && isset($_GET['sampai'])){

			$dari = $_GET['dari'];
			$sampai = $_GET['sampai'];
			?>
			<h4>Data Laporan Peminjaman Buku dari Tanggal <b><?php echo $dari; ?></b> sampai Tanggal <b><?php echo $sampai; ?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th>No</th>
					<th>Buku</th>
					<th>ID Anggota</th>
					<th>Nama Anggota</th>
					<th>Tanggal Peminjaman</th>
					<th>Tanggal Pengembalian</th>
					<th>Terlambat</th>
					<th>Status</th>
				</tr>

				<tr>
					<?php $nomor=1; ?>
					<?php 

					require 'koneksi.php';
					require 'function.php';
					$ambil=$koneksi->query("SELECT *FROM tb_transaksi WHERE status='Sedang Dipinjam' AND DATE(tgl_pinjam) > '$dari' AND DATE(tgl_pinjam) < '$sampai' ORDER BY id_transaksi DESC"); ?>
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
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</table>

			<?php } ?>

		</div>

		<script type="text/javascript">
			window.print();
		</script>			

	</body>
	</html>