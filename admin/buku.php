<?php 
include '../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

// Query untuk mengambil data buku
$sql = "SELECT buku.*, kategori_buku.nama_kategori 
        FROM buku  
        INNER JOIN kategori_buku ON buku.kategori_id = kategori_buku.id";
$result = mysqli_query($koneksi, $sql);

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

  <style>
    .isi:hover{
      background-color: #525CEB;
      color:#FFf;
    }
    .search-form:focus{
    outline: 2px solid #40A2E3;
  }
    tr{
      border-bottom: 1px solid #eeeeee;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" style="background-color:#fff">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#0F1035;position:fixed">
    <!-- User -->
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
            <a href="peminjaman.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="buku.php" class="nav-link active">
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
  <div class="content-wrapper " style="height:91.6vh; background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#161A30;">Semua Buku</h1>
            <a href="input/input_buku.php">
              <button type="button" class="btn btn-primary" style="margin-left:186%;margin-top:-30px;position:absolute;"><i class="fa-solid fa-plus"></i></button>
            </a>
          </div>            
        </div>
        <div class="search" style="position: relative;margin-left:680px;">
         <form class="form-inline" action="" method="GET">
             <input id="searchInput" class="search-form " type="search" placeholder="Search" aria-label="Search" 
                    name="query" style="width:60%; margin-top:-38px; padding:5px 10px; border-radius: 10px; margin-left:90px; border:2px solid #40A2E3">
         </form>
     </div>
      </div>
  </section>
    <div class="container-fluid">
        <table class="table" style="margin-top:30px;width:961px; position:relative;left:58px;">
            <thead>
                <tr>
                    <th style="width: 47px;">No</th>
                    <th style="width: 320px;">Judul</th>
                    <th style="width: 256px;">Penerbit</th>
                    <th style="width: 115px;">Tahun Terbit</th>
                    <th style="width: 115px;">Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- Main content -->
    <section class="content d-flex flex-col">
      <div class="container-fluid" style="overflow-y:scroll; height: 390px; ">
        <table class="table" style="margin-top:-13px;width:92%; position:relative;left:50px;">
            <tbody>
                <?php $i=0; while ($row = mysqli_fetch_assoc($result)) :  $i++; ?>
                    <tr class="searchable">
                        <td style="width: 45px;"><?= $i ?></td>
                        <td class="d-flex" style="width:321px;">
                          <img src="../asset/<?= $row['foto'] ?>" alt="Cover Buku" style="height:50px; width:50px;margin-right:10px;border-radius:3px"> 
                          <div>
                            <b><?= $row['judul'] ?></b><br>
                            <?= $row['penulis'] ?>
                            
                          </div>
                        </td>
                        <td style="width: 257px;"><?= $row['penerbit'] ?></td>
                        <td style="width: 115px;"><?= $row['tahun_terbit'] ?></td>
                        <td style="width: 115px;"><?= $row['nama_kategori'] ?></td>
                        <td>
                            <a href="edit/edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="delete/delete_buku.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                            <a href="modal/isi_buku.php?id=<?=$row['id'] ?>" class="btn btn-sm" style="background-color:#FE7A36; color:#fff"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
<!-- ./wrapper -->

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