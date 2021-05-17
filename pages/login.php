<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title></title>
  

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  
  <?php 
         if(isset($_POST['login']))
         {
         $ambil = $koneksi->query("SELECT *FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
         $yangcocok = $ambil->num_rows;
         if($yangcocok==1)
         {
           $_SESSION['admin']=$ambil->fetch_assoc();
           echo "<script>alert('Anda Berhasil Login'); </script> ";
           echo "<script>location='index.php';</script>";
         }
         else
         {
          echo "<script>alert('Maaf Username atau Password Yang Anda Masukan Salah'); </script> ";
          echo "<script>location='login.php';</script>";
         }
       }
      ?>
  
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="POST">
        <h2 class="form-login-heading">sign in admin</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="user" placeholder="Username 'admin'" autofocus>
          <br>
          <input type="password" class="form-control" name="pass" placeholder="Password 'admin'">
          <br>
            <label class="checkbox">
              <span class="pull-right">
                <a data-toggle="modal" href="login.html#myModal"> Lupa Password?</a><br><br>
              </span>
            </label>
          <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-user"></i> LOGIN</button>     
        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Lupa Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>   
    </div>
  </div>
  
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<!-- row -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <!-- footer copyright -->
          <div class="footer-copyright">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved Design By Rizal Amin
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
          <!-- /footer copyright -->
        </div>
      </div>
      <!-- /row -->
</html>
