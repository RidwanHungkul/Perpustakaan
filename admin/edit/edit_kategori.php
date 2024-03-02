<?php 
include '../../koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM kategori_buku WHERE id='$id' ";
$result = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM kategori_buku";
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
  <link rel="stylesheet" href="../../dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dashboard/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="hold-transitionx  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="overflow-y:hidden;">
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-light" style="background-color:#fff">
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Apakah Anda yakin ingin keluar?')" href="../../../logout.php">
          <i class="fa-solid fa-arrow-right-from-bracket" style="color:#7077A1;"></i>
        </a>
      </li>
    </ul>
  </nav>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#0F1035;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="background-color:#0F1035;">
      <span class="brand-text font-weight-light ml-4">Hi Administrator !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu">
            <a href="../index.php" class="nav-link">
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
            <a href="../buku.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Buku  
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="../kategori.php" class="nav-link active">
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

    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <?php if($result){
                $riw = mysqli_fetch_assoc($result);
              ?> 
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Edit Kategori</h4>
                    <a href="../kategori.php"><button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                <form action="../../proses/proses_edit_kategori.php?id=<?= $riw['id'] ?>" method="post">
                  <div class="modal-body">
        <div class="form-grup">
            <label for="kategori">Nama Kategori :</label>
            <input type="text" name="kategori" class="form-control" value="<?= $riw['nama_kategori'] ?>">
        </div>
                 </div>
                      <div class="modal-footer">
                        <a href="../kategori.php"><button  class="btn btn-primary">Simpan Kategori</button></a>
                  </div>
                  </form>
                <?php 
                    }  
                ?>
            </div>
        </div>
    </div>

   <div class="content-wrapper" style="background-color: #EEEEEE; color:#161A30; ">
    <!-- Content Header (Page header) -->
    <section class="content-header"><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   <section class="content">
    <div class="content-wrape shadow p-3 mb-5 bg-body-tertiary" style="width:100%;padding:10px;background:#fff;border-radius:7px; height:510px">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 style="color:#161A30;">Kategori</h2>
            <a href="../input/input_kategori.php">
              <button type="button" class="btn btn-primary" style="margin-left:190%;margin-top:-45px;position:absolute;"><i class="fa-solid fa-plus"></i></button>
            </a>
          </div>            
        </div>
      </div>
      <div class="search" style="position: relative; left: 795px; top:-16px; margin-top:-37px; width:220px;">
        <form class="form-inline" action="" method="GET">
            <input id="searchInput" class="search-form" type="search" placeholder="Search" aria-label="Search" name="keyword" style="width: 100%; padding: 5px 10px; border-radius: 10px; border: 2px solid #40A2E3">
        </form>
    </div>
    <div class="container-fluid" style="width: 90%; margin-top:10px; ">
    <table class="table">
        <thead>
            <tr>
                <th style="width:100px">No</th>
                <th style="width:600px">Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    </div>
    <div class="container-fluid" style="width: 90%; height: 340px; overflow-y: scroll;">
    <table class="table" style="position:relative; top:-10px;"> 
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result1)) :  $i++; ?>
                <tr class="searchable">
                    <td style="width:100px"><?= $i ?></td>
                    <td style="width:600px"><?= $row['nama_kategori'] ?></td>
                    <td>
                        <a href="edit_kategori.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="../delete/delete_kategori.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
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
<script>
        $(document).ready(function(){
            $('#editModal').modal('show');
        });
    </script>
</body>
</html>