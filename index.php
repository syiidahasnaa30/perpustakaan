<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Anda harus login terlebih dahulu');</script>";
  echo "<script>location='login.html';</script>";
  exit();
} else {
?>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Manajemen | Perpustakaan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
  </head>

  <body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <?php require_once('partial/navbar.php') ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php require_once('partial/sidebar.php') ?>
      <!-- Content start-->
      <div class="content-wrapper">
        <?php
        if (isset($_GET['hal'])) {
          if ($_GET['hal'] == "databuku") {
            require_once('data_buku.php');
          } else if ($_GET['hal'] == "inputbuku") {
            require_once('form_buku.php');
          } else if ($_GET['hal'] == "dataanggota") {
            require_once('data_anggota.php');
          } else if ($_GET['hal'] == "inputanggota") {
            require_once('form_anggota.php');
          } else if ($_GET['hal'] == "editanggota") {
            require_once('form_edit_anggota.php');
          } elseif ($_GET['hal'] == "editbuku") {
            require_once('form_edit_buku.php');
          } else if ($_GET['hal'] == "inputpinjam") {
            require_once('form_pinjam.php');
          } else if ($_GET['hal'] == "datapinjam") {
            require_once('data_pinjam.php');
          } else if ($_GET['hal'] == "profil") {
            require_once('profil.php');
          } else {
            require_once('home.php');
          }
        } else {
          require_once('home.php');
        }

        ?>
      </div>
      <!-- Content end -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <?php //require_once('partial/control_sidebar.php');
        ?>
      </aside>
      <!-- /.control-sidebar -->
      <?php require_once('partial/footer.php') ?>
      <!-- ./wrapper -->
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>

</html>
<?php
}
?>