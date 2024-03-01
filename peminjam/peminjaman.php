<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}


// Query untuk mengambil data buku yang dipinjam oleh pengguna dengan tanggal pengembalian yang masih 0
$id = $_SESSION['id'];
$query = "SELECT b.* 
          FROM buku b
          JOIN peminjaman p ON b.id = p.buku
          JOIN user u ON p.user = u.id
          WHERE u.id = '$id'
          AND p.status_peminjaman = 'dipinjam'";
$result = mysqli_query($koneksi, $query);

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
<style>
    .foto{
      overflow: hidden;
      width: 100%;
      height: 320px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .foto img{
      max-width: 100%;
      min-width: 100%;
      min-height: 320px;
      transition: 0.3s linear;
    }
    .foto:hover img{
      transform:scale(0.74);

    }
    .search{
      width: 800px;
      margin-right: 120px;
    }
    .search-form{
      width: 100%;
      height: 40px;
      border-radius: 50px;
      position: relative;
      top:8px;
      padding: 20px;
      border: 1px solid grey;
    }
</style>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background-color:#fff">
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
      <span class="brand-text font-weight-light ml-4">Hi <?= $_SESSION['nama_lengkap'] ?> !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bookmark.php" class="nav-link">
              <i class="nav-icon fa-solid fa-heart"></i>
              <p>
                Favourite
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="peminjaman.php" class="nav-link active">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
   <div class="container" style="width:100%">
    <div class="table-container d-flex" style="margin-left:20px">
      <div class="container d-flex flex-wrap" style="position:relative; width:100%;">
      <?php while ($rew = mysqli_fetch_assoc($result)) : ?>
    <div class="card ml-4" style="width:300px; position:relative;top:15px;border-radius:6px;">
        <div class="foto">
            <img src="../asset/<?= $rew['foto'] ?>" alt="">
        </div>
        <div class="descrip mt-3 p-3">
            <b><h4><?= $rew['judul'] ?></h4></b>
            <p><?= $rew['penulis'] ?></p>
            <p><?= $rew['penerbit'] ?></p>
            <p>Tahun terbit: <?= $rew['tahun_terbit'] ?></p>
            <?php 
            $iduser = $_SESSION['id'];
            $bukuid = $rew['id'];
            $sql1 = "SELECT * FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND user = '$iduser' AND buku='$bukuid' ";
            $result1 = mysqli_query($koneksi,$sql1);
            if(mysqli_num_rows($result1) > 0) {
            ?>
                <a href="proses/proses_pengembalian_peminjaman.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-danger">
                    Kembalikan
                </a>
            <?php } else { ?>
                <a href="proses/proses_input_peminjaman.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-primary">
                    Pinjam
                </a>
            <?php } ?>
            <!-- Tautan untuk membaca PDF -->
            <a href="buku/baca_buku.php?id=<?= $rew['id'] ?>" class="btn btn-sm btn-primary">
              Baca
            </a>
        </div>
    </div>
<?php endwhile ?>

      </div>
    </div>
   </div>
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