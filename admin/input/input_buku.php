<?php 
include '../../koneksi.php';

$sql = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM  kategori_buku ";
$result1 = mysqli_query($koneksi, $sql1);

$sql2 = "SELECT buku.*, kategori_buku.nama_kategori 
         FROM buku 
         INNER JOIN kategori_buku ON buku.kategori_id=kategori_buku.id";
$result2 = mysqli_query($koneksi, $sql2);

$sql3 = "SELECT * FROM  kategori_buku ";
$result3 = mysqli_query($koneksi, $sql3);


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
<body class="hold-transitionx  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
    <a href="#" class="brand-link">
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
            <a href="../peminjaman.php" class="nav-link">
              <i class="nav-icon fa-solid fa-book"></i>
              <p>
                Peminjaman
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
            <div class="modal-content">
              <?php if($result){
                $riw = mysqli_fetch_assoc($result1);
              ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Tambah Buku</h4>
                    <a href="../buku.php"><button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
                </div>
                <form action="../../proses/proses_tambah_buku.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <!-- Isi formulir edit di sini -->
                    <?php
                    if ($result) {
                      echo "<label for='perpustakaan'>Perpustakaan :</label>";
                      echo "<select class='form-control' name='perpustakaan' required>";

                    while ($row = mysqli_fetch_assoc($result)) {
                      $nama_perpustakaan = $row['nama_perpus'];
                      $id_perpus = $row['id'];
                      echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                    }

                    echo "</select>";
                    } else {
                      echo "Gagal mengambil data";
                 }
              ?>
          <div class="form-grup">
            <label for="cover">Upload Cover:</label>
            <input type="file" name="cover" class="form-control" required style="height:45px;">
        </div>
          <div class="form-grup">
            <label for="judul">Judul buku:</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="penulis">Penulis :</label>
            <input type="text" name="penulis" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="penerbit">Penerbit :</label>
            <input type="text" name="penerbit" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="tahun_terbit">Tahun terbit :</label>
            <input type="date" name="tahun_terbit" class="form-control" required>
        </div>
        <div class="form-grup">
            <label for="sinopsis" class="mt-2" style="position:absolute;">Sinopsis :</label>
            <textarea name="sinopsis" id="" cols="62" rows="5" class="mt-5"></textarea>
        </div>


        <label>Kategori :</label>
        <select class='form-control' name='kategori' required>
          <option>pilih kategori</option>
          <?php
             while ($rew = mysqli_fetch_assoc($result3)):
          ?>  
            <option value="<?= $rew['id'] ?>"><?= $rew['nama_kategori'];?></option>
          <?php endwhile ?>
        </select>
        </div>
                 
                      <div class="modal-footer">
                        <a href="../buku.php"><button type="submit"  class="btn btn-primary">Simpan Buku</button></a>
                  </div>
                  </form>
                <?php 
                    }  
                ?>
            </div>
        </div>
    </div>

    <div class="content-wrapper " style="height:91.6vh; background-color: #EEEEEE; color:#161A30;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color:#161A30;">Semua Buku</h1>
            <a href="input/input_buku.php">
              <button type="button" class="btn btn-primary" style="margin-left:170%;margin-top:-30px;position:absolute;width:140px;">+ Tambah Buku</button>
            </a>
          </div>            
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Content Header (Page header) -->
    <section class="content d-flex flex-col">
      <div class="container-fluid">
    <table class="table" style="margin-top:30px;width:90%; position:relative;left:50px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; while ($row = mysqli_fetch_assoc($result2)) :  $i++; ?>
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
                      <td><?= $row['nama_kategori'] ?></td>
                    <td>
                        <a href="edit/edit_buku.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="delete/delete_pengguna.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
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