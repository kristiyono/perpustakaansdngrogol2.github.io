<?php 
$id_admin=$_SESSION['admin']['id_admin'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$detail = $ambil->fetch_assoc();

$ambil1=$koneksi->query("SELECT *FROM admin WHERE id_admin");
$pecah=$ambil1->fetch_assoc($ambil1);
?>


<section class="col-lg-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Profilku</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
			<br>

			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="../img/<?php echo $detail['foto']; ?>" alt="User profile picture">

				<h3 class="profile-username text-center"><?php echo $detail['nama_lengkap']; ?></h3>

				<p class="text-muted text-center">Administrator Perpustakaan MA Al-Hanif</p>
				<br>

				<strong><i class="fa fa-envelope margin-r-5"></i><b>Email</b></strong> <a class="pull-right"><?php echo $detail['email']; ?></a>
				<br>
				<hr>
				<strong><i class="fa fa-phone margin-r-5"></i><b>No. Telepon</b></strong> <a class="pull-right"><?php echo $detail['telepon']; ?></a>
				<br>
				<hr>
				<strong><i class="fa fa-map-marker margin-r-5"></i> Alamat Tempat Tinggal</strong>
				<p class="text-muted text-right">
					<?php echo $detail['Alamat']; ?>
				</p>
				<hr>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editprofil" ><span class="fa fa-edit"> Edit Profil</span></button>
		</div>
	</section>

	<div id="editprofil" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Profil</h4>
				</div>
				<form method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label" for="nama">Nama Lengkap</label>
							<input type="text" name="nama" class="form-control" id="nama" value="<?php echo $pecah['nama_lengkap']; ?> ">
						</div>

						<div class="form-group">
							<label class="control-label" for="email">Email</label>
							<input type="email" name="email" class="form-control" id="email" value="<?php echo $pecah['email']; ?> ">
						</div>

						<div class="form-group">
							<label class="control-label" for="telepon">No. Telepon</label>
							<input type="text" name="telepon" class="form-control" id="telepon" value="<?php echo $pecah['telepon']; ?> ">
						</div>
						<div class="form-group">
							<label>Foto</label><br>
							<img src="../img/<?php echo $pecah['foto']?>" width="200px">
						</div>
						<div class="form-group">
							<label class="control-label" for="foto">Ganti Foto</label>
							<input type="file" name="foto" id="foto" class="form-control">
						</div>

						<div class="modal-footer">
							<button class="btn btn-primary" name="ubah" >Simpan</button>
						</div>
					</div>
				</form>


				<?php 
				if(isset($_POST['ubah']))
				{
					$namafoto=$_FILES ['foto']['name'];
					$lokasigambar=$_FILES ['foto']['tmp_name'];

						//Mengubah Foto
					if (!empty($lokasigambar)) 
					{
						move_uploaded_file($lokasigambar, "../img/$namafoto");
						$koneksi->query("UPDATE admin SET nama_lengkap='$_POST[nama]',

							email ='$_POST[email]', 
							telepon='$_POST[telepon]',
							foto='$namafoto' ");
					}
					else
					{
						$koneksi->query("UPDATE admin SET nama_lengkap='$_POST[nama]',
							email ='$_POST[email]', 
							telepon='$_POST[telepon]' 
							");	
					}
					echo "<script>alert('Data Profil Telah Diubah');</script>";
					echo "<script>location='index.php?halaman=profil';</script>";

				}
				?>
			</div>
		</div>
	</div>

