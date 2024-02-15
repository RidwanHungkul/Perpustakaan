<?php 
include '../../koneksi.php';

$id = $_GET['id'];
$sql = "SELECT peminjaman.*, user.nama_lengkap, buku.judul FROM `peminjaman` INNER JOIN user ON peminjaman.user=user.id INNER JOIN buku ON peminjaman.buku=buku.id WHERE peminjaman.id=$id";
$result = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dashboard/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Hi Administrator !</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="../index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="../pengguna.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="../peminjaman.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="../buku.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Buku  
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="../kategori.php" class="nav-link">
              <i class="nav-icon fa-solid fa-list"></i>
              <p>
                Kategori  
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="../ulasan.php" class="nav-link">
              <i class="nav-icon fa-solid fa-pen-to-square"></i>
              <p>
                Ulasan 
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper" style="margin-top:-1px;">
    <?php $data=mysqli_fetch_assoc($result); ?>

    <section class="content-header">
    </section>

    <section class="content">
      <div class="content-wraper shadow p-3 mb-5 bg-body-tertiary" style="width:50%;margin-left:25%;padding:10px;background:#fff;border-radius:7px;">
       <div class="container-fluid">
        <h2 style="color:#161A30; text-align:center;">Dashboard</h2>
         <form action="../../proses/proses_edit_dashboard.php?id=<?= $data['id'] ?>" method="post">
            <div class="form-group">
                <label for="nama_lengkap">Nama peminjam :</label>
                <input type="text" class="form-control" name="nama_lengkap"  value="<?= $data['nama_lengkap'] ?>">
            </div>
            <div class="form-group">
                <label for="judul">Buku :</label>
            <input class="form-control" name="judul"  value="<?= $data['judul'] ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_peminjaman">Tanggal peminjaman :</label>
                <input type="date" class="form-control" name="tanggal_peminjaman" value="<?= $data['tanggal_peminjaman']?>">
            </div>
            <div class="form-group">
                <label for="tanggal_pengembalian">Tanggal pengembalian :</label>
                <input type="date" class="form-control" name="tanggal_pengembalian" value="<?= $data['tanggal_pengembalian']?>">
            </div>
            <div class="form-group">
          <label for="status">Status :</label>
          <select class="form-control" name="status_peminjaman" required>
            <option value=""><?= $data['status_peminjaman']?></option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Dikembalikan">Dikembalikan</option>
          </select>
            </div>
                <div class="footer text-center">
                <a href="../index.php"><button type="button" class="btn btn-secondary">Close</button></a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
          </div>
        </div>
    </section>
  </div>
</div>

<!-- jQuery -->
<script src="../../dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dashboard/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../dashboard/plugins/raphael/raphael.min.js"></script>
<script src="../../dashboard/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../dashboard/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../dashboard/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dashboard/dist/js/pages/dashboard2.js"></script>
</body>
</html>