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
        INNER JOIN buku ON peminjaman.buku=buku.id 
        ORDER BY CASE WHEN status_peminjaman = 'Dipinjam' THEN 0 ELSE 1 
        END,
        tanggal_pengembalian DESC";
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

// Query untuk mengambil data ulasan buku
$sql4 = "SELECT * FROM ulasan_buku";
$result4 = mysqli_query($koneksi, $sql4);
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
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style=" overflow-x:hidden;">
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
  <div class="content-wrapper" style="background-color: #fff; color:#161A30;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box"  style="background-color:#40A2E3; color:#fff; border-radius:10px">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result1)?></span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color:#FF9843; color:#fff; border-radius:10px">
              <span class="info-box-icon "><i class="fa-solid fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result2)?></span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color:#65B741; color:#fff; border-radius:10px">
              <span class="info-box-icon  "><i class="fa-solid fa-hand-holding-hand"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Peminjaman</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result3)?></span>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color:#FF6868; color:#fff; border-radius:10px">
              <span class="info-box-icon  "><i class="fa-solid fa-comment"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Ulasan</span>
                <span class="info-box-number"><?php echo mysqli_num_rows($result4)?></span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Data yang di dalam tabel -->
    <div class="header d-flex p-2 mb-3 ml-4" style="width:100%; height:50px;">
    <div class="judul" style="height:30px; width:200px; position:relative; top:15px;">
        <h5>Data Peminjaman</h5>
    </div>
    <div class="search" style="position: relative;left:650px; border-radius: 5px; top:7px; ">
        <form class="form-inline" action="" method="GET">
            <input id="searchInput" class="search-form " type="search" placeholder="Search" aria-label="Search" 
                   name="query" style="width:100%; padding:5px 10px; border-radius: 7px; border:2px solid #40A2E3">
        </form>
    </div>
    </div>
     <div class="table-container d-flex" style="width:100%;">
      <div class="container d-flex" style="position:relative; width:100%;">
      <table class="table" style="width:1057px; margin-left:13px">
        <thead>
        <tr>
                <th style="width: 52px;">No</th>
                <th style="width: 180px">Nama Peminjam</th>
                <th style="width: 198px">Buku</th>
                <th style="width: 182px">Tanggal Peminjaman</th>
                <th style="width: 196px">Tanggal Pengembalian</th>
                <th style="width: 148px">Status</th>
                <th>Aksi</th>
        </tr>
        </thead>
      </table>
      </div>
    </div>
    <div class="content" style="width: 99%; height: 410px; border-radius: 3px; margin: 0 auto; overflow-y: scroll; margin-top:-17px;">
    <!-- Kontainer tabel -->
    <div class="table-container d-flex" style="width:100%;">
    <div class="container d-flex" style="position:relative; width:100%;">
      <table class="table">
        <tbody>
        <?php 
        if($result->num_rows>0){$i=0;
          while ($row = $result->fetch_assoc()){  $i++;
            echo "<tr class='searchable'>";
            echo "<td style='width: 52px;'>" . $i . "</td>";
            echo "<td style='width: 175px'>" . (isset($row["nama_lengkap"]) ? $row["nama_lengkap"] : "") . "</td>";
            echo "<td style='width: 210px'>" . (isset($row["judul"]) ? $row["judul"] : "") . "</td>";
            echo "<td style='width: 178px'>" . $row["tanggal_peminjaman"] . "</td>";
            echo "<td style='width: 178px'>" . $row["tanggal_pengembalian"] . "</td>";
            if($row['status_peminjaman'] === 'Dikembalikan'){
              echo "<td>";
              echo  "<span style='color:green; padding:5px 15px;border-radius:20px; background-color:#E9F9F9;'>";
              echo  "<b>Dikembalikan</b>";
              echo "</span>";
              echo "</td>";
            }elseif($row['status_peminjaman'] === 'Dipinjam'){
              echo "<td style='color: red;'>";
              echo  "<span style='color:red; padding:5px 15px;border-radius:20px; background-color:#FFE9C5;'>";
              echo  "<b>Dipinjam</b>";
              echo "</span>";
              echo "</td>";
            }
            echo "<td>
            <a href='edit/edit_dashboard.php?id=" . $row['id'] . " 'class='btn btn-sm' style='background-color:#86A7FC; color:#fff'><i class='fa-solid fa-pen-to-square'></i></a>
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
