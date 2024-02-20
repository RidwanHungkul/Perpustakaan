<?php 
include '../koneksi.php';

session_start();

if (!$_SESSION["id"]) {
    header("Location:../login.php");
}

// Query awal tanpa pencarian
$sql = "SELECT user.*, perpustakaan.nama_perpus 
        FROM `user` 
        INNER JOIN  perpustakaan ON user.perpus_id=perpustakaan.id
        ORDER BY FIELD(role, 'petugas') DESC, nama_lengkap ASC;";

// Ambil kata kunci pencarian jika ada
$searchKeyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if (!empty($searchKeyword)) {
    // Ubah query untuk mencari berdasarkan kata kunci
    $sql = "SELECT user.*, perpustakaan.nama_perpus 
            FROM `user` 
            INNER JOIN  perpustakaan ON user.perpus_id=perpustakaan.id
            WHERE nama_lengkap LIKE '%$searchKeyword%' 
            OR username LIKE '%$searchKeyword%' 
            OR role LIKE '%$searchKeyword%' 
            OR alamat LIKE '%$searchKeyword%' 
            OR email LIKE '%$searchKeyword%'
            ORDER BY FIELD(role, 'petugas') DESC, nama_lengkap ASC;";
}

$result = mysqli_query($koneksi, $sql);

$int = 0;
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
<style>
  .search-form:focus{
    outline: 2px solid #40A2E3;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="overflow-y:hidden; overflow-x:hidden;">
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
    <div class="content-wrape ml-2 shadow p-3 mb-5 bg-body-tertiary" style="width:98%;padding:10px;background:#fff;border-radius:7px;margin-left:-10px;height:550px;">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 style="color:#161A30; position:relative; top:13px">Pengguna</h2>
            <a href="input/registrasi_pengguna.php">
              <button type="button" class="btn btn-primary" style="margin-left:188%;margin-top:-30px;position:absolute;"><i class="fa-solid fa-plus"></i></button>
            </a>
          </div>            
        </div>
      </div>
      <div class="search" style="position: relative; left: 765px; margin-top:-37px; width:215px">
        <form class="form-inline" action="" method="GET">
            <input id="searchInput" class="search-form" type="search" placeholder="Search" aria-label="Search" name="keyword" style="width: 100%; padding: 5px 10px; border-radius: 10px; border: 2px solid #40A2E3" value="<?php echo $searchKeyword; ?>">
        </form>
    </div>
  <div class="container-fluid">
    <table class="table" style="margin-top:25px; width:102%; margin-left:-9px;">
      <thead>
            <tr>
                <th style="width: 47px;">No</th>
                <th style="width: 184px;">Nama Lengkap</th>
                <th style="width: 144px;">Username</th>
                <th style="width: 130px;">Role</th>
                <th style="width: 162px;">Alamat</th>
                <th style="width: 265px;">Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
  </div>
  <div class="container-fluid" style="height: 387px; overflow-y: scroll; overflow-x:hidden">
    <table class="table" style="margin-top:-10px; width:105%; margin-left:-9px;">
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result)) :  $i++; ?>
                <tr class="searchable">
                    <td style="width: 47px;"><?= $i ?></td>
                    <td style="width: 184px;"><?= $row['nama_lengkap'] ?></td>
                    <td style="width: 134px;"><?= $row['username'] ?></td>
                    <?php if($row['role'] === 'petugas') : ?>
                    <td style="width: 140px;">
                      <span style="color:blue; padding:5px 15px;border-radius:20px; background-color:#E9F9F9;">
                        <b>Petugas</b>
                      </span>
                    </td>
                    <?php elseif($row['role'] === 'peminjam') : ?>
                      <td style="width: 140px;">
                        <span style="color:green; padding:5px 15px;border-radius:20px; background-color:#DCFFB7;">
                          <b>Peminjam</b>
                        </span>
                      </td>
                    <?php endif; ?>
                    <td style="width: 162px;"><?= $row['alamat'] ?></td>
                    <td style="width: 265px;"><?= $row['email'] ?></td>
                    <td>
                        <a href="edit/edit_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-sm" style="background-color:#86A7FC; color:#fff;"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="delete/delete_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
         </tbody>
    </table>
  </div>
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
<script>
  $(document).ready(function(){
        // Add an input event listener to the search input
        $("#searchInput").on("input", function() {
            let searchTerm = $(this).val().toLowerCase(); // Get the value of the input and convert to lowercase

            // Keep track if any results are found
            let resultsFound = false;

            // Loop through each searchable card
            $(".searchable").each(function() {
                let cardText = $(this).text().toLowerCase(); // Get the text content of the card and convert to lowercase

                // Check if the card text contains the search term
                if (cardText.includes(searchTerm)) {
                    $(this).show(); // If yes, show the card
                    resultsFound = true; // Mark that results are found
                } else {
                    $(this).hide(); // If no, hide the card
                }
            });

            // Show/hide the no results message based on resultsFound
            if (resultsFound) {
                $("#noResultsMessage").hide();
            } else {
                $("#noResultsMessage").show();
            }
      });
   });
</script>
</body>
</html>