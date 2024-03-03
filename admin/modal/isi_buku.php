<?php 
include '../../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}
$id = $_GET["id"];
$sql = "SELECT buku.*, kategori_buku.nama_kategori 
        FROM buku
        INNER JOIN kategori_buku ON buku.kategori_id = kategori_buku.id";
$result = mysqli_query($koneksi, $sql);
  

$sql1 = "SELECT buku.*, kategori_buku.nama_kategori 
        FROM buku 
        INNER JOIN kategori_buku ON buku.kategori_id=kategori_buku.id 
        WHERE buku.id='$id'";
$result1 = mysqli_query($koneksi, $sql1);

$sql2 = "SELECT * FROM kategori_buku";
$result2 = mysqli_query($koneksi, $sql2);
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
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
          <li class="nav-item menu-open">
            <a href="../buku.php" class="nav-link active">
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


  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:100%;height:565px;" >
              <?php if($result){
                $ruw = mysqli_fetch_assoc($result1);
                 
              ?>
                <div class="modal-header">
                    <h3 class="modal-title" id="editModalLabel"><?=$ruw['judul'] ?></h3>
                    <a href="../buku.php"><button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                <div class="modal-body d-flex">
                <div class="foto" style="width: 135px; height:200px;">
                  <img src="../../asset/<?= $ruw['foto'] ?>" alt="" style="width:100%; height:100%">
                </div>
                  <div class="modal-body" style="width:250px;margin-top:-19px;">
                    <!-- Isi formulir edit di sini -->
                    <div class="form_group">
                      <p> <?=$ruw['penulis'] ?> | <?=$ruw['penerbit'] ?> | <?=$ruw['nama_kategori'] ?></p>
                    </div>
                    <div class="form_group" style="margin-top:-10px">
                      <p>Tahun Terbit : <?=$ruw['tahun_terbit'] ?></p>
                    </div>
                    <p>Sinopsis : </p>
                    <div class="form_group" style="margin-top:10px; width:305px; height: 255px; text-indent:20px; overflow-y:scroll;">
                      <p><?=$ruw['sinopsis'] ?></p>
                    </div>
                 </div> 
                 </div>
                      <div class="modal-footer" style="margin-top:-15px;">
                        <a href="ulasan_buku.php?id=<?=$ruw['id'] ?>"><button  class="btn btn-primary">Ulas Buku</button></a>
                        <a href="../delete/delete_buku.php?id=<?=$ruw['id'] ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button></a>
                  </div>
                <?php 
                    }  
                ?>
            </div>
        </div>
    </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper " style="height:91.6vh; background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#161A30;">Semua Buku</h1>
            <a href="../input/input_buku.php">
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
                <?php $i=0; while ($row = mysqli_fetch_assoc($result  )) :  $i++; ?>
                    <tr class="searchable">
                        <td style="width: 45px;"><?= $i ?></td>
                        <td class="d-flex" style="width:321px;">
                          <img src="../../asset/<?= $row['foto'] ?>" alt="Cover Buku" style="height:50px; width:50px;margin-right:10px;border-radius:3px"> 
                          <div>
                            <b><?= $row['judul'] ?></b><br>
                            <?= $row['penulis'] ?>
                            
                          </div>
                        </td>
                        <td style="width: 257px;"><?= $row['penerbit'] ?></td>
                        <td style="width: 115px;"><?= $row['tahun_terbit'] ?></td>
                        <td style="width: 115px;"><?= $row['nama_kategori'] ?></td>
                        <td>
                            <a href="../edit/edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-sm" style='background-color:#86A7FC; color:#fff'><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../delete/delete_buku.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                            <a href="isi_buku.php?id=<?=$row['id'] ?>" class="btn btn-sm" style="background-color:#FE7A36; color:#fff"><i class="fa-solid fa-eye"></i></a>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="path/to/bootstrap/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
        $(document).ready(function(){
            $('#editModal').modal('show');
        });
    </script>
</body>
</html>