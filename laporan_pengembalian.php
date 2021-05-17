<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan MA Al-Hanif</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  
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

<section class="content">
	<div class="panel">
		<div class="panel-heading">
			<h4>Filter Laporan Pengembalian Buku</h4>
		</div>
		<div class="panel-body">
			<br>		

			<form action="laporan_pengembalian.php" method="POST">
				<table class="table table-striped">
					<tr>				
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>							
						<th width="1%"></th>
					</tr>
					<tr>
						<td>
							<br/>
							<input type="date" name="tgl_dari" class="form-control">
						</td>
						<td>
							<br/>
							<input type="date" name="tgl_sampai" class="form-control">
							<br/>
						</td>
						<td>
		
							<br/>
							<input type="submit" class="btn btn-primary" value="Filter">
						</td>
					</tr>

				</form>
			</table>
		</div>
	</section>
	<br/>

	<?php
	if (isset($_POST['tgl_dari']) && isset($_POST['tgl_sampai'])) {


		$dari = $_POST['tgl_dari'];
		$sampai = $_POST['tgl_sampai'];

		
		?>

		<div class="panel">
			<div class="panel-heading">
				<h2 align="center">Data Laporan Pengembalian Buku Perpustakaan Dari <b><?php echo $dari; ?></b> Sampai <b><?php echo $sampai; ?></b></h2>
			</div>
			<div class="panel-body">			

				<a target="_blank" href="cetak_print_pengembalianbuku.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
				<br/>
				<br/>
				<table class="table table-striped table-bordered" >
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
						<?php 

							require 'koneksi.php';
							require 'function.php';
							$ambil=$koneksi->query("SELECT *FROM tb_transaksi WHERE status='Telah Dikembalikan' AND DATE(tgl_pinjam) > '$dari' AND DATE(tgl_pinjam) < '$sampai' ORDER BY id_transaksi DESC"); ?>
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
		</div>
	</div>
	<?php } ?>
