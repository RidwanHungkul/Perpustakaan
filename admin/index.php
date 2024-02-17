<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

// Query untuk mengambil data peminjaman
$sql = "SELECT peminjaman.*, user.nama_lengkap, buku.judul 
        FROM `peminjaman`  
        INNER JOIN user ON peminjaman.user=user.id 
        INNER JOIN buku ON peminjaman.buku=buku.id ";
$result = mysqli_query($koneksi, $sql);

// Query untuk mengambil data user
$sql1 = "SELECT * FROM user";
$result1 = mysqli_query($koneksi, $sql1);

// Query untuk mengambil data buku
$sql2 = "SELECT * FROM buku";
$result2 = mysqli_query($koneksi, $sql2);

// Query untuk mengambil data buku yang sedang dipinjam
$sql3 = "SELECT * FROM peminjaman WHERE status_peminjaman='Dipinjam'";
$result3 = mysqli_query($koneksi, $sql3);

// Pagination
$limit = 5;
$page = isset($_GET['page']) ?$_GET['page']: 1;
$start = ($page - 1)* $limit;

// Ambil kata kunci pencarian jika ada
$searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Query untuk mengambil jumlah total buku
$queryCount = "SELECT COUNT(*) AS total FROM peminjaman";
$resultCount = mysqli_query($koneksi, $queryCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalBooks = $rowCount['total'];

// Query untuk mengambil data buku berdasarkan halaman dan kata kunci pencarian
$query = "SELECT peminjaman.*, user.nama_lengkap, buku.judul 
        FROM `peminjaman` 
        INNER JOIN user ON peminjaman.user = user.id 
        INNER JOIN buku ON peminjaman.buku = buku.id
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="overflow-x:hidden;">
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
    <!-- User -->
    <a href="#" class="brand-link" style="background-color:#0F1035; color:#fff;">
      <span class="brand-text font-weight-light ml-4">Hi Administrator !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
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


  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background-color: #EEEEEE; color:#161A30;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"  style="background-color:#40A2E3; color:#fff;">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result1)?></span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color:#FE0000; color:#fff;">
              <span class="info-box-icon "><i class="fa-solid fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result2)?></span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color:#65B741; color:#fff;">
              <span class="info-box-icon  "><i class="fa-solid fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Peminjaman</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result3)?></span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Data yang di dalam tabel -->
    <div class="content d-flex shadow p-3 mb-5 bg-body-tertiary rounded" style=" width:95%; height:410px; border-radius:3px; margin:0 auto; background-color:#fff;">
      <div class="judul" style="height:30px; width:200px;">
        <h5>Data Peminjaman</h5>
      </div>

      <div class="table-container d-flex" style="width:77%; position:absolute; top:190px; right:30px;">
        <div class="container d-flex" style="position:relative; width:100%;">
          <table class="table">
            <?php 
            echo "<thead><tr><th>No</th><th>Nama Peminjam</th><th>Buku</th><th>Tanggal Peminjaman</th><th>Tanggal Pengembalian</th><th>Status</th><th>Aksi</th></tr></thead>";
              if($result->num_rows>0){$i=0;
                while ($row = $result->fetch_assoc()){  $i++;
                  echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . (isset($row["nama_lengkap"]) ? $row["nama_lengkap"] : "") . "</td>";
                    echo "<td>" . (isset($row["judul"]) ? $row["judul"] : "") . "</td>";
                    echo "<td>" . $row["tanggal_peminjaman"] . "</td>";
                    echo "<td>" . $row["tanggal_pengembalian"] . "</td>";
                    echo "<td>" . $row["status_peminjaman"] . "</td>";
                    echo "<td>
                            <a href='edit/edit_dashboard.php?id=" . $row['id'] . " 'class='btn btn-sm' style='background-color:#FE7A36; color:#fff'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a target='_blank' href='../proses/download.php?id=" . $row['id'] . " 'class='btn btn-sm' style='background-color:#FF4646; color:#fff'><i class='fa-solid fa-file-arrow-down'></i></a>
                          </td>";
                  echo "</tr>";
                }
                  echo "</tbody></table>";
                }else{
                  echo "Data tidak ditemukan";
              }
            ?>
          </table>
        </div>
      </div>
    </div>

    <nav>
      <ul class="pagination" style="position:relative;left:82%;">
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

  </div>
</div>

<!-- REQUIRED SCRIPTS -->
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
