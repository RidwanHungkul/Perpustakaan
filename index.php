<?php 
include 'koneksi.php';

session_start();

$query = "SELECT buku.id as buku_id, buku.foto, buku.judul, buku.penulis, ulasan_buku.buku, ulasan_buku.rating,
          COUNT(ulasan_buku.id_ulasan) as total,
          AVG(ulasan_buku.rating) as average_rating
          FROM buku
          LEFT JOIN ulasan_buku ON buku.id = ulasan_buku.buku
          GROUP BY buku.id
          ORDER BY average_rating DESC
          LIMIT 3";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
</head>
<style>
    *{
        margin: 0 auto;
        padding: 0 auto;
    }
    nav{
        display: flex;
        background-color: #13307E;
        width: 100%;
        height: 60px;
    }
    .logo{
        width: 45px;
        height: 45px;
        margin-top: 4px;
    }
    .logo img{
        width: 100%;
        height: 100%;
    }
    .brand{
        width: 1020px;
    }
    .brand h3{
        margin: 10px 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #fff;
        font-size: 23px;
        padding: 0px 20px;
    }
    .running-text {
    width: 60%;
    height: 20px;
    margin: 12px 15px 15px 15px;
    background: #0c284acb;
    align-items: center;
    border-right: 5px solid #f2f2f2;
    border-radius: 2px;
    position: relative;
    top: -45px;
    left: 320px;
    font-family:'Times New Roman', Times, serif;
    }
    .text1 {
    color: #c2bdbd;
    margin: 0px;
    }

    .text2 {
    color: #c2bdbd;
    margin: 0px 300px;
    }
    .btn{
        height: 40px;
        width: 100px;
        position: relative;
        left: -10px;
        background-color: transparent;
        border-radius: 5px;
        margin: 10px 5px;
        display: flex;
        border: 1px solid #fff;
        
    }
    a .daftar{
        position: relative;
        left:-10px;
    }
    a{
        width: 100%;
        height: 100%;
        margin: 7px auto;
        display: flex;
        justify-content: center;
        text-decoration: none;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: #fff;
    }
    .btn:hover{
        background-color: #1E488F;
        color: #fff;
        border: 1px solid;
    }
    .main{
        width: 100%;
        height: auto;
    }
    .deskripsi{
        width: 500px;
        height: 160px;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;
        position: relative;
        left: -300px;
        top: 120px;
        font-size: 22px;
    }
    .deskripsi span{
        font-weight: 900;
        font-size: 24px;
    }
    .deskripsi p{
        font-weight: 500;
    }
    .foto{
        width: 600px;
        height: 500px;
        position: relative;
        left: 300px;
        top: -100px;
    }
    .foto img{
        width: 100%;
        height: 100%;
    }
    .populer{
        width: 100%;
        height: 650px;
    }
    .populer-content{
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .card{
        width:300px;
        height: 450px;
        margin: 0px 15px;
        border-radius: 7px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
    }
    .cover{
        width: 100%;
        height: 400px;
    }
    .cover img{
        width: 100%;
        height: 100%;

    }
    .judul{
        font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 200;
        text-align: center;
        font-size: 20px;
        margin-top: 10px;
    }
    .head{
        width: 100%;
        height: 80px;
    }
    .head h1{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        color: #1E488F;
    }
    .rating{
        width: 100%;
        height: 60px;
    }
    .rating p{
        text-align: center;
        margin: 14px 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 600;
        font-size: 20px;
    }
</style>
<body>
    <div class="wraper">
        <nav>
            <div class="logo">
                <img src="asset/smk1.png" alt="">
            </div>
            <div class="brand">
                <h3>Semea Digital Library</h3>
                <marquee onmouseover="true" class="running-text">
                    <span class="text1">
                        Sambut era digital dengan akses tak terbatas ke pengetahuan!
                        SEMEA Digital Library, platform canggih yang menghadirkan 
                        ribuan judul buku, jurnal, dan artikel secara online.
                    </span>
                    <span class="text2">
                        Jelajahi koleksi luas kami dari kenyamanan rumah Anda, 
                        dengan fitur pencarian yang intuitif dan akses 24/7. 
                        Dengan SEMEA Digital Library, pengetahuan ada di ujung jari Anda. 
                        Bergabunglah dengan komunitas pembelajar online kami dan temukan
                        inspirasi baru setiap hari
                    </span>
                    <span class="text2">
                        Ayo, mulai petualangan literasi digital Anda sekarang dengan SEMEA Digital Library!
                    </span>
                </marquee>
            </div>
            <div class="btn">
                <a class="login" href="login.php">Login</a>
            </div>
            <div class="btn">
                <a class="daftar" href="register.php">Daftar</a>

            </div>
        </nav>
        <div class="main">
            <div class="main-conten">
                <div class="deskripsi">
                    <p><span>Semea Digital Library </span> menyediakan akses online ke berbagai jenis materi bacaan,
                      seperti buku, jurnal, artikel, dan lain sebagainya.
                      Semea Digital Library dapat diakses melalui internet, 
                      memungkinkan pengguna untuk mencari, membaca, dan bahkan 
                      mengunduh materi yang mereka butuhkan tanpa harus pergi ke
                      perpustakaan fisik.</p>
                    
                </div>
                <div class="foto">
                    <img src="asset/lp.jpg" alt="">
                </div>

                <div class="populer">
                    <div class="head">
                        <h1>Rating Terbaik</h1>
                    </div>
                    <div class="populer-content">
                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                            <div class="card">
                                <div class="cover">
                                    <img src="asset/<?= $row['foto'] ?>" alt="">
                                </div>
                                <div class="judul">
                                    <b><?= $row['judul'] ?></b>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>