<?php 
$tanggal_sekarang =date("d M Y");

$id_admin=$_SESSION['admin']['id_admin'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin'");
$detail = $ambil->fetch_assoc();

$ambil1=$koneksi->query("SELECT *FROM admin WHERE id_admin");
$pecah=$ambil1->fetch_assoc();
?>
<!-- Content Header (Page header) -->
<section class="content">
  <h2>
    Dashboard
    <small>Control panel</small>
  </h2>
  <hr>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>
            <?php 
            $ambil=$koneksi->query("SELECT COUNT(*) AS anggota_perpustakaan FROM anggota");
            $hasil=$ambil->fetch_assoc();
            echo $hasil['anggota_perpustakaan'];
            ?>
          </h3>
          <p>Anggota <br>Perpustakaan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="index.php?halaman=anggota_perpustakaan" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Jumlah Koleksi Buku -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>
            <?php 
            $ambil=$koneksi->query("SELECT COUNT(jumlah_buku) AS jumlah_buku FROM tb_buku");
            $hasil=$ambil->fetch_assoc();
            echo $hasil['jumlah_buku'];
            ?>
          </h3>

          <p>Buku <br>Perpustakaan</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-book"></i>
        </div>
        <a href="index.php?halaman=buku" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Transaksi Peminjaman -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>
            <?php 
            $ambil=$koneksi->query("SELECT COUNT(nama_anggota) AS jumlah_transaksi FROM tb_transaksi WHERE status='Sedang Dipinjam'");
            $hasil=$ambil->fetch_assoc();
            echo $hasil['jumlah_transaksi'];
            ?>
          </h3>

          <p>Buku <br> Yang Dipinjam</p>
        </div>
        <div class="icon">
          <i class="ion ion-document"></i>
        </div>
        <a href="index.php?halaman=transaksi_pengembalian" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <!-- Transaksi Peminjaman -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>
            <?php 
            $ambil=$koneksi->query("SELECT COUNT(nama_anggota) AS jumlah_transaksi FROM tb_transaksi WHERE status='Telah Dikembalikan'");
            $hasil=$ambil->fetch_assoc();
            echo $hasil['jumlah_transaksi'];
            ?>
          </h3>

          <p>Buku <br> Yang Sudah Dikembalikan</p>
        </div>
        <div class="icon">
          <i class="ion ion-document"></i>
        </div>
        <a href="index.php?halaman=transaksi_pengembalian" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</section>
<section class="col-lg-7">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><span class="fa fa-user"> Profilku </span></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
      <br>

      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="../img/<?php echo $detail['foto']; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $detail['nama_lengkap']; ?></h3>

        <p class="text-muted text-center">Petugas Perpustakaan</p>
        <br>
        
        <strong><i class="fa fa-envelope margin-r-5"></i><b>Email</b></strong> <a class="pull-right"><?php echo $detail['email']; ?></a>
        <br>
        <hr>
        <strong><i class="fa fa-map-phone margin-r-5"></i><b>No. Telepon</b></strong> <a class="pull-right"><?php echo $detail['telepon']; ?></a>
        <br>
        <hr>
        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat Tempat Tinggal</strong>
        <p class="text-muted">
                <?php echo $detail['Alamat']; ?>
        </p>
        <hr>
      </div>

    </div>
  </section>
  <section class="col-lg-5">
    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient">
      <div class="box-header">
        <i class="fa fa-calendar"></i>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <!-- button with a dropdown -->
          <?php  
              echo $tanggal_sekarang;
              ?>
          <div class="btn-group">           
            </div>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>

        <!-- /.box-body -->
        <div class="box-footer text-black">
          <div class="row">
            <div class="col-lg-5">
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </section>
