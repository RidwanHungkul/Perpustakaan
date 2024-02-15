<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$id = $_GET['id'];
$sql = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);

$sql2 = "SELECT * FROM buku WHERE id='$id'";
$result2 = mysqli_query($koneksi, $sql2);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perminjaman</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dashboard/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">  
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#0F1035;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-color:#0F1035; color:#fff;">
      <span class="brand-text font-weight-light">Hi <?= $_SESSION['nama_lengkap'] ?> !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="peminjaman.php" class="nav-link">
              <i class="nav-icon fa-solid fa-bookmark"></i>
              <p>
                Bookmark
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper" style="margin-top:-1px; background-color: #eeee; color:#161A30;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
   <section class="content mt-5">
    <div class="content-wraper shadow p-3 mb-5 bg-body-tertiary" style="width:50%;margin-left:25%;padding:10px;background:#fff;border-radius:7px;">
  <div class="container-fluid">
    <h2 style="color:#161A30; text-align:center;">Peminjaman</h2>
    <a href="index.php" style="position:relative;top:-50px"><button type="button" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></a>
    <form action="proses/proses_input_peminjaman.php" method="post">
      <?php
            if ($result) {
                echo "<label for='perpustakaan'>Perpustakaan :</label>";
                echo "<select class='form-control' name='perpustakaan' required>";

                while ($row = mysqli_fetch_assoc($result)) {
                    $nama_perpustakaan = $row['nama_perpus'];
                    $id_perpus = $row['id'];
                    echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                    }

                    echo "</select>";
                } else {
                    echo "Gagal mengambil data";
                }
        ?>
        <div class="form-grup">
            <label for="nama">Nama :</label>
            <select name="nama" id="" class="form-control">
            <option value="<?= $_SESSION['id'] ?>"><?=$_SESSION['nama_lengkap'] ?></option>
            </select>
        </div>
        <?php
            if ($result2) {
                echo "<label for='buku'>Buku :</label>";
                echo "<select class='form-control' name='buku' required>";

                while ($rew = mysqli_fetch_assoc($result2)) {
                    $nama_buku = $rew['judul'];
                    $id_buku = $rew['id'];
                    echo "<option value='$id_buku'>$nama_buku</option>";
                    }

                    echo "</select>";
                } else {
                    echo "Gagal mengambil data";
                }
        ?>
        <div class="form-grup">
            <label for="tanggal_peminjaman">Tanggal peminjaman :</label>
            <input type="date" name="tanggal_peminjaman" class="form-control">
        </div>
        <div class="form-grup">
            <label for="status">Status :</label>
            <select name="status" class="form-control">
                <option value="Dipinjam">Dipinjam</option>
            </select>
        </div>
        <div class="form-grup" style="margin-left: 40%;">
        <button type="submit" name="registrasi" class="btn btn-info mt-4" style="width:100px">Pinjam</button>
        </div>
    </form>
  </div>
  </div>
   </section>
  </div>
</div>
<script src="../dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dashboard/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../dashboard/plugins/raphael/raphael.min.js"></script>
<script src="../dashboard/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../dashboard/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../dashboard/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dashboard/dist/js/pages/dashboard2.js"></script>
</body>
</html>