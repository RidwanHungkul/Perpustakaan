<?php 
include 'koneksi.php';

session_start(); // Mulai session

$sql = "SELECT * FROM perpustakaan";
$result = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #176B87;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1200px;
            height: 500px;
        }

        .login-container img {
            width: 100%;
            border-radius: 4px; 
            margin-right: 20px;
            height: 100%;
        }

        .login-container form h1 {
            text-align: center;
            margin-top: -7px;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
            width: 80%;
            margin: auto 8%;
            padding: 30px 20px;
            border-radius: 6px;
            border: 1px solid #176B87;
            height: 100%;
        }
        .login-container select{
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 50px;
            height: 35px;
        }

        .login-container input{
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 50px;
            height: 20px;
            
        }

        .login-container textarea{
            border-radius: 7px;
            height: 45px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .login-container button {
            background-color: #176B87;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            width: 60%;
            margin-left: 20%;
            margin-top: 9%;
        }

        .login-container button:hover {
            background-color: #86B6F6;
        }
        .login-container a{
            text-decoration: none;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 6px;
            font-size: 13px;
            text-align: center;
        }
        .foto{
            width: 50%;
        }
        .form{
            width: 45%;
            text-align: center;
            padding-left: 10px;
            border-left: 2px solid #176B87;
            margin-left: 50px;
        }
        .scrollable-form {
        max-height: 100%;
        width: 51%;
        overflow-y: auto;
        overflow-x: hidden;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="foto">
        <img src="asset/rak.jpg" alt="User Image"> 
    </div>

    <!-- Form Register -->
    <div class="scrollable-form">
    <form action="proses/proses_register_peminjam.php" method="post">
        <h1>Daftar Akun</h1>
        <label for="perpustakaan"></label>
        <select class="form-control" name="perpustakaan" required>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama_perpustakaan = $row['nama_perpus'];
                    $id_perpus = $row['id'];
                    echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                }
            } else {
                echo "<option value=''>Gagal mengambil data outlet.</option>";
            }
            ?>
        </select>
        <input type="text" name="username" placeholder="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : ''; ?>" required>
        <textarea type="textarea" name="alamat" placeholder="Alamat" required><?php echo isset($_SESSION['alamat']) ? $_SESSION['alamat'] : ''; ?></textarea>
        <input type="text" name="role" value="peminjam" style="display: none;">
        <button type="submit" name="daftar">Daftar</button>
        <a href="login.php">Kembali ke login</a>
    </form>
    </div>
    <!-- /Form Register -->
</div>
</body>
</html>
