<?php 
include '../koneksi.php';
session_start();

$id_user = $_SESSION['id'];

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}
$id = $_GET["id"];

$query = "SELECT buku.id, buku.judul, buku.penulis, buku.foto, buku.penerbit, buku.tahun_terbit, ulasan_buku.buku, ulasan_buku.rating,
          AVG(ulasan_buku.rating) as rating_buku
        FROM buku
        LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
        WHERE buku.id = '$id'
        GROUP BY buku.id";
$result = mysqli_query($koneksi, $query);

$view = "SELECT user.nama_lengkap, ulasan_buku.ulasan, ulasan_buku.rating
         FROM ulasan_buku
         INNER JOIN user ON ulasan_buku.user = user.id
         WHERE ulasan_buku.buku = '$id'";
$review = mysqli_query($koneksi, $view);

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

  <!-- Isi buku -->
  <div class="content-wrapper" style="background-color: #fff; color:#161A30;">
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
  <div class="row bg-body-tertiary shadow" style="width:70%;height:470px;margin-left:160px;margin-top:57px;">
  <div class="wrap p-3">
    <a href="index.php" style="position:relative;left:475px"><button type="button" class="close" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button></a>
    <div class="foto">
      <img src="../asset/<?=$row['foto']?>" alt="" style="width:250px;height:430px;object-fit:cover; margin-top:-20px">
    </div>
    <div class="desc d-flex " style="position: absolute; bottom:500px;left:700px">
      <h4><b><?= $row['judul'] ?></b></h4>
    </div>
    <div class="d-flex" style="position: absolute; bottom:463px;left:700px">
        <p class="mr-1"><?= $row['penulis'] ?> | </p>
        <p><?= $row['penerbit'] ?></p>
    </div>
        <p style="position: absolute; bottom:435px;left:700px">Tahun terbit : <?= $row['tahun_terbit'] ?></p>

       <form action="proses/proses_mengulas_buku.php" method="post"> 
        <div class="ulasan">
          <div class="form-grup">
            <input type="hidden" name="buku" value="<?= $id ?>">
            <input type="hidden" name="user" value="<?=$id_user ?>">
          </div>
          <div class="form_group" style="position: absolute; bottom:320px;left:700px">
            <p class="mb-1"><b>Ulasan :</b></p>
            <textarea name="ulasan" cols="58" rows="3" placeholder="Ulas buku" style="width:100%; padding:3px"></textarea>
          </div>
          <div class="form_group" style="position: absolute; bottom:245px;left:700px; width:450px;">
            <p class="mb-1"><b>Rating :</b></p>
            <input type="text" name="rating" class="form-control" placeholder="Rating 1-5">
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="position:relative; left:290px; bottom:120px">Ulas Buku</button>
        </div>
        </form>
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