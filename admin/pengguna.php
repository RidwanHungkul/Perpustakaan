<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$sql = "SELECT user.*, perpustakaan.nama_perpus 
        FROM `user` 
        INNER JOIN  perpustakaan ON user.perpus_id=perpustakaan.id
        ORDER BY FIELD(role, 'petugas') DESC, nama_lengkap ASC;";
$result = mysqli_query($koneksi, $sql);

$limit = 5;
$page = isset($_GET['page']) ?$_GET['page']: 1;
$start = ($page - 1)* $limit;

// Ambil kata kunci pencarian jika ada
$searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query untuk mengambil jumlah total buku
$queryCount = "SELECT COUNT(*) AS total FROM user";
$resultCount = mysqli_query($koneksi, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalBooks = $rowCount['total'];

// Query untuk mengambil data buku berdasarkan halaman dan kata kunci pencarian
$query = "SELECT user.*, perpustakaan.nama_perpus 
        FROM `user` 
        INNER JOIN  perpustakaan ON user.perpus_id=perpustakaan.id
        ORDER BY FIELD(role, 'petugas') DESC, nama_lengkap ASC 
        LIMIT $start, $limit";
$result = mysqli_query($koneksi, $query);

$int = ($page - 1) * $limit;
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="overflow-x:hidden; overflow-y:hidden">
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
          <li class="nav-item menu-open">
            <a href="pengguna.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="peminjaman.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Peminjaman
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
          <li class="nav-item menu">
            <a href="ulasan.php" class="nav-link">
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
  <div class="content-wrapper" style="background-color: #eeeeee; color:#161A30; ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
   <section class="content">
    <div class="content-wrape ml-2 shadow p-3 mb-5 bg-body-tertiary" style="width:98%;padding:10px;background:#fff;border-radius:7px;margin-left:-10px">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 style="color:#161A30;">Pengguna</h2>
            <a href="input/registrasi_pengguna.php">
              <button type="button" class="btn btn-primary" style="margin-left:188%;margin-top:-30px;position:absolute;"><i class="fa-solid fa-plus"></i></button>
            </a>
          </div>            
        </div>
      </div><!-- /.container-fluid -->
  <div class="container-fluid">
    <table class="table" style="margin-top:30px; width:102%; margin-left:-9px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Role</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result)) :  $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['nama_lengkap'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <?php if($row['role'] === 'petugas') : ?>
                    <td>
                      <span style="color:blue; padding:5px 15px;border-radius:20px; background-color:#E9F9F9;">
                        <b>Petugas</b>
                      </span>
                    </td>
                    <?php elseif($row['role'] === 'peminjam') : ?>
                      <td style="color: red;">
                        <span style="color:red; padding:5px 15px;border-radius:20px; background-color:#FFE9C5;">
                          <b>Peminjam</b>
                        </span>
                      </td>
                    <?php endif; ?>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="edit/edit_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="delete/delete_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
         </tbody>
    </table>
  </div>
  </div>
  <nav>
      <ul class="pagination" style="position:relative;left:83%;">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page - 1); ?>&keyword=<?php echo $searchKeyword; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>

        <?php
        // Hitung jumlah halaman yang akan ditampilkan sesuai dengan batasan maksimum (3)
        $maxPages = min($page + 2, ceil($totalBooks / $limit));
        $minPages = max(1, $maxPages - 2);
        ?>

        <?php for ($i = $minPages; $i <= $maxPages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>&keyword=<?php echo $searchKeyword; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($maxPages < ceil($totalBooks / $limit)): ?>
            <li class="page-item disabled">
                <span class="page-link">...</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($maxPages + 1); ?>&keyword=<?php echo $searchKeyword; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
      </ul>
    </nav>
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