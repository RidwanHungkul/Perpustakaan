<?php 
include '../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}
$id = $_GET["id"];

$query = "SELECT * FROM buku WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpustakaan</title>

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
<body class="hold-transition sidebar-mini" style="overflow-y:hidden;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" style="background-color:#fff">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Apakah Anda yakin ingin keluar?')" href="../logout.php">
          <i class="fa-solid fa-arrow-right-from-bracket" style="color:#7077A1;"></i>
        </a>
      </li>
    </ul>
  </nav>
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
            <a href="bookmark.php" class="nav-link">
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

  <!-- Isi buku -->
  <div class="content-wrapper" style="background-color: #fff; color:#161A30;">
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
  <div class="row bg-body-tertiary shadow" style="width:70%;height:470px;margin-left:160px;margin-top:57px;">
  <div class="wrap p-3">
    <a href="index.php" style="position:relative;left:490px"><button type="button" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></a>
    <div class="foto">
      <img src="../asset/<?=$row['foto']?>" alt="" style="position:relative;bottom:24px;width:250px;height:430px;object-fit:cover;border-radius:4px;">
    </div>
    <div class="desc d-flex" style="position: absolute; bottom:500px;left:700px">
      <h4><b><?= $row['judul'] ?></b></h4>
    </div>
    <div class="d-flex" style="position: absolute; bottom:463px;left:700px">
        <p class="mr-1"><?= $row['penulis'] ?> | </p>
        <p><?= $row['penerbit'] ?></p>
    </div>
        <p style="position: absolute; bottom:435px;left:700px">Tahun terbit : <?= $row['tahun_terbit'] ?></p>
        <div class="ulasan">
          <h5 style="position:absolute;bottom:410px;left:700px;color:black; font-weight:400;">Sinopsis</h5>
        </div>
    </div>
    <div class="isi" style="width:465px; height: 270px; position:relative; top:150px;left:8px; text-indent:20px; overflow-y:scroll;">
        <p><?= $row['sinopsis']; ?></p>
    </div>
    <div class="btn" style="position: relative; left:650px; bottom:68px">
        <a href="isi_buku.php?id=<?= $row['id'] ?>">Lihat Ulasan >></a>
    </div>
  </div>
    <?php endwhile; ?>
  </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="path/to/bootstrap/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>