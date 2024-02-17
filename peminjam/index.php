<?php 
include '../koneksi.php';

session_start();

if(!$_SESSION["id"]){
  header("Location:../login.php");
}

$idbuku = $_GET["id"];


$query1 = isset($idbuku) ? "SELECT buku.id as buku_id, buku.judul, buku.foto, buku.tahun_terbit, buku.penulis, buku.penerbit, ulasan_buku.buku, ulasan_buku.rating,
          AVG(ulasan_buku.rating) as rating_buku
        FROM buku
        LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
        WHERE buku.kategori_id = '$idbuku'
        GROUP BY buku.id" : 

        "SELECT buku.id as buku_id, buku.judul, buku.foto, buku.tahun_terbit, buku.penulis, buku.penerbit, ulasan_buku.buku, ulasan_buku.rating,
          AVG(ulasan_buku.rating) as rating_buku
        FROM buku
        LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
        GROUP BY buku.id";
$result2 = mysqli_query($koneksi, $query1);


$query_buku = isset($idbuku) ? "SELECT * FROM buku WHERE kategori_id = $idbuku" : "SELECT * FROM buku";
$resultbuku = mysqli_query($koneksi,$query_buku);

$username = $_SESSION['username'];  

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && isset($_GET['action'])) {
        $bookId = $_GET['id'];
        $action = $_GET['action'];
        // Validasi action
        if ($action !== 'add' && $action !== 'delete') {
            echo "Action tidak valid.";
            exit();
        }

        // Validasi apakah buku dengan ID tertentu ada di database
        $checkBookQuery = "SELECT * FROM buku WHERE id = $bookId";
        $checkBookResult = mysqli_query($koneksi, $checkBookQuery);

        if (mysqli_num_rows($checkBookResult) > 0) {
            // Buku ditemukan, lanjutkan proses bookmark
            if ($action == 'add') {
                // Jika action=add, tambahkan buku ke koleksi pribadi
                $insertQuery = "INSERT INTO koleksi_pribadi (user, buku) VALUES ((SELECT id FROM user WHERE username = '$username'), $idbuku)";
                mysqli_query($koneksi, $insertQuery);
            } elseif ($action == 'delete') {
                // Jika action=delete, hapus buku dari koleksi pribadi
                $deleteQuery = "DELETE FROM koleksi_pribadi WHERE user = (SELECT id FROM user WHERE username = '$username') AND buku = $idbuku";
                mysqli_query($koneksi, $deleteQuery);
            }

            // Redirect kembali ke halaman utama setelah bookmark berhasil ditambahkan atau dihapus
            header("Location: index.php");
            exit();
        } else {
            // Jika buku dengan ID tertentu tidak ditemukan, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
            echo "Buku dengan ID $bukuid tidak ditemukan.";
            exit();
        }
    } else {
        // Jika parameter id atau action tidak valid, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
    }
} else {
    // Jika bukan metode GET, bisa ditangani sesuai kebutuhan (contoh: berikan pesan)
    echo "Metode yang diterima hanya GET.";

}

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
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="overflow-x:hidden;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background-color:#fff">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li>
        <form class="form-inline" action="search.php" method="GET">
                <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Cari..." aria-label="Search" name="query">
        </form>
      </li>
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
      <span class="brand-text font-weight-light">Hi <?= $_SESSION['nama_lengkap'] ?> !</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item menu">
            <a href="bookmark.php" class="nav-link">
              <i class="nav-icon fa-solid fa-bookmark"></i>
              <p>
                Bookmark
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #fff; color:#161A30;margin-top:20px; margin-left:268px">
<div class="container" style="width:100%;">
    <div class="table-container d-flex" style="margin-left:20px">
    <div class="container d-flex flex-wrap" style="position:relative; width:100%;">
        <?php while ($rew = mysqli_fetch_assoc($result2)) : ?>
        <div class="card ml-4 searchable" style="width:300px; position:relative;top:15px;border-radius:6px;">
        <div class="foto">
            <img src="../asset/<?= $rew['foto'] ?>" alt="" style="">
        </div>
        <div class="descrip mt-3 p-2">
            <b><h4><?= $rew['judul'] ?></h4></b>
            <p><?= $rew['penulis'] ?></p>
            <p><?= $rew['penerbit'] ?></p>
            <p>Tahun terbit: <?= $rew['tahun_terbit'] ?></p>
              <?php 
                $iduser = $_SESSION['id'];
                $idbuku = $rew['buku_id'];
                $sql = "SELECT * FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND user = '$iduser' AND buku='$idbuku' ";
                $result = mysqli_query($koneksi,$sql);
                if(mysqli_num_rows($result) > 0){
                 ?>
                  <a href="#" class="btn btn-sm btn-secondary">
                      Sedang dipinjam
                  </a>
                <?php } else { ?>
                  <a href="peminjaman.php?id=<?= $rew['buku_id'] ?>" class="btn btn-sm btn-primary" style="">
                      Pinjam
                  </a>
                <?php } ?>
            <a href="ulasan.php?id=<?= $rew['buku_id'] ?>" class="btn btn-sm btn-success">Ulas</a>
            <a href="sinopsis.php?id=<?=$rew['buku_id'] ?>" class="btn btn-sm" style="background-color:#FE7A36; color:#fff">Detail</a>
                        <?php
                            // Cek apakah buku sudah ada di koleksi pribadi user
                        $checkQuery = "SELECT * FROM koleksi_pribadi WHERE user = (SELECT id FROM user WHERE username = '$username') AND buku = {$rew['buku_id']}";
                        $checkResult = mysqli_query($koneksi, $checkQuery);

                        if (mysqli_num_rows($checkResult) > 0) :?>
                            <a href="index.php?id=<?=$rew['buku_id'];?>&action=delete" class="btn btn-secondary" onclick="return confirmDelete()">
                            <i class="fa-solid fa-bookmark"></i></a>
                        <?php else :?>
                            <a href="index.php?id=<?=$rew['buku_id'];?>&action=add" class="btn btn-secondary">
                            <i class="fa-regular fa-bookmark"></i></a>
                      <?php endif; ?>
        </div>
    </div>
      <?php endwhile; ?>
  </div>
</div>
</div>

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
