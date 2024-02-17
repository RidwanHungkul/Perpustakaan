<?php 
include '../../koneksi.php';
session_start();

if(!$_SESSION["id"]){
  header("Location:../../login.php");
}
$id = $_GET["id"];
$sql = "SELECT * FROM buku";
$result = mysqli_query($koneksi, $sql);
  

$sql1 = "SELECT buku.*, kategori_buku.nama_kategori FROM buku INNER JOIN kategori_buku ON buku.kategori_id=kategori_buku.id WHERE buku.id='$id'";
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
        <a class="nav-link" onclick="return confirm('Apakah Anda yakin ingin keluar?')" href="../../logout.php">
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
          <li class="nav-item menu">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
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
        </ul>
      </nav>
    </div>
  </aside>


  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <?php if($result){
                $ruw = mysqli_fetch_assoc($result1);
                 
              ?>
                <div class="modal-header">            
                    <a href="../buku.php"><button type="button" class="close" aria-label="Close" style="margin-left:430px">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                  <div class="modal-body">
                    <!-- Isi formulir edit di sini -->
                    <form action="../proses/proses_edit_buku.php?id=<?= $ruw['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul :</label>
                <input type="text" class="form-control" name="judul"  value="<?= $ruw['judul'] ?>">
            </div>
            <div class="form-group">
                <label for="cover">Cover :</label>
                <input type="file" class="form-control" name="cover"  value="<?= $ruw['foto'] ?>">
            </div>
            <div class="form-group">
                <label for="penulis">Penulis :</label>
            <input type="text" class="form-control" name="penulis"  value="<?= $ruw['penulis'] ?>">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit :</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $ruw['penerbit']?>">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun terbit :</label>
                <input type="number" class="form-control" name="tahun_terbit" value="<?= $ruw['tahun_terbit']?>">
            </div>
            <div class="form-grup">
              <label for="sinopsis" class="mt-2" style="position:absolute;">Sinopsis :</label>
              <textarea name="sinopsis" id="" cols="62" rows="5" class="mt-5"><?= $ruw['sinopsis']?></textarea>
            </div>
            <div class="form-group">
           <label>Kategori :</label>
        <select class='form-control' name='kategori' required>
          <option value="<?= $ruw['kategori_id'] ?>"><?= $ruw['nama_kategori']?></option>
          <?php
             while ($rew = mysqli_fetch_assoc($result2)):
          ?>  
            <option value="<?= $rew['id'] ?>"><?= $rew['nama_kategori'];?></option>

          <?php endwhile ?>
        </select>
            </div>
                <div class="footer text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
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
              <button type="button" class="btn btn-primary" style="margin-left:170%;margin-top:-30px;position:absolute;width: 148px;">+ Tambah Buku</button>
            </a>
          </div>            
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content d-flex flex-col">
      <div class="container-fluid">
    <table class="table" style="margin-top:30px;width:90%; position:relative;left:50px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result)) :  $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td class='d-flex'>
                          <img src="../../asset/<?= $row['foto'] ?>" alt="Cover Buku" style="height:50px; width:50px;margin-right:10px;border-radius:3px"> 
                          <div>
                            <b><?= $row['judul'] ?></b><br>
                            <?= $row['penulis'] ?>
                            
                          </div>
                      </td>
                    <td><?= $row['penerbit'] ?></td>
                    <td><?= $row['tahun_terbit'] ?></td>
                    <td>
                        <a href="edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="../delete/delete_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
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