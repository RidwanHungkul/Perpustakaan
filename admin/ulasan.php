<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$query = "SELECT buku.id as buku_id, buku.foto, buku.judul, buku.penulis, ulasan_buku.buku, ulasan_buku.rating,
          COUNT(ulasan_buku.id_ulasan) as total,
          AVG(ulasan_buku.rating) as average_rating
        FROM buku
        LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
        GROUP BY buku.id
        ORDER BY average_rating DESC";
$result = mysqli_query($koneksi, $query);

$sql1 = "SELECT * FROM buku";
$result1 = mysqli_query($koneksi, $sql1);

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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " style="background-color:#fff">
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
      <span class="brand-text font-weight-light ml-4">Hi Administrator !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="pengguna.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="buku.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Buku  
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="kategori.php" class="nav-link">
              <i class="nav-icon fa-solid fa-list"></i>
              <p>
                Kategori  
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="ulasan.php" class="nav-link active">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #EEEEEE; color:#161A30; ">
    <!-- Content Header (Page header) -->
    <section class="content-header"><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">
    <div class="content-wrape shadow p-3 mb-5 bg-body-tertiary" style="width:100%;padding:10px;background:#fff;border-radius:7px;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 style="color:#161A30;">Ulasan</h2>
          </div>            
        </div>
      </div>
    <div class="container-fluid" style="width: 90%;">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Jumlah Ulasan</th>
                <th>Rata-rata Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                <?php $i=0; while ($row = mysqli_fetch_assoc($result)) : $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class='d-flex'>
                          <img src="../asset/<?= $row['foto'] ?>" alt="Cover Buku" style="height:50px; width:50px;margin-right:10px;border-radius:3px"> 
                          <div>
                            <b><?= $row['judul']; ?></b><br>
                            <p><?= $row['penulis']; ?></p>                            
                          </div>
                      </td>
                    <td><?= $row['total'] ?></td>
                    <td><?= number_format($row['average_rating'], 1) ?></td>
                    <td>
                        <a href="modal/isi_ulasan.php?id=<?= $row['buku_id'] ?>" class="btn btn-primary btn-sm" style="margin-top:15px;"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </div>x
    </div>
   </section>
  </div>
</div>

<!-- jQuery -->
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