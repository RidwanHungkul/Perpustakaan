<?php 
include 'koneksi.php';

session_start();
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
            width: 56%;
            margin: 17% auto;
            padding: 30px 20px;
            border-radius: 6px;
            border: 1px solid #176B87;
        }

        .login-container input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 50px;
            height: 25px;
            
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
            margin-top: 10px;
        }

        .login-container button:hover {
            background-color: #86B6F6;
        }
        .login-container a{
            text-decoration: none;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 6px;
            font-size: 13px;
        }
        .foto{
            width: 50%;
        }
        .form{
            width: 50%;
            text-align: center;
            padding-left: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="foto">
        <img src="asset/rak.jpg" alt="User Image"> 
    </div>
    <div class="form">
    <?php 

    // Logika Login
    if(isset($_POST['login'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    
    if($data = mysqli_fetch_assoc($admin)){
      if(password_verify($password, $data['password'])){
        $_SESSION['username'] = $data['username'];
        
        // Login Admin
        if($data['role'] == 'admin'){
          $_SESSION['id'] = $data['id'];
          $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
          $_SESSION['role'] = $data['role'];
          header('location: admin/index.php');
        }

        // Login Petugas
        elseif($data['role'] == 'petugas'){
          $_SESSION['id'] = $data['id'];
          $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
          $_SESSION['role'] = $data['role'];
          header('location: petugas/index.php');
        }

        // Login Peminjam
        elseif($data['role'] == 'peminjam'){
          $_SESSION['id'] = $data['id'];
          $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
          $_SESSION['role'] = $data['role'];
          header('location: peminjam/index.php');
        }

      } else {
        echo "username dan password salah";
      }
    } else {
      echo "akun tidak ada";
    }
}
    ?>
    <form action="login.php" method="post">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username " required>
    
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>
        <a href="register.php">Daftar akun pengunjung?</a>
    </form>
    </div>
</div>

</body>
</html>

