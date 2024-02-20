<?php 
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perpustakaan = $_POST['perpustakaan'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $namalengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    // Inisialisasi array untuk menyimpan pesan kesalahan
    $errors = array();

    // Cek apakah username sudah ada
    $cek_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($cek_username) > 0){
        // Jika username sudah ada, tambahkan pesan kesalahan ke array
        $errors[] = "Username sudah digunakan. Silakan pilih username lain.";
    }

    // Cek apakah email sudah ada
    $cek_email = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
    if(mysqli_num_rows($cek_email) > 0){
        // Jika email sudah ada, tambahkan pesan kesalahan ke array
        $errors[] = "Email sudah digunakan. Silakan gunakan email lain.";
    }

    // Jika array errors tidak kosong, berarti ada kesalahan
    if(!empty($errors)) {
        // Gabungkan pesan kesalahan menjadi satu string dengan menggunakan fungsi implode()
        $pesan_kesalahan = implode("\\n", $errors);
        // Simpan nilai-nilai input ke dalam session
        session_start();
        $_SESSION['perpustakaan'] = $perpustakaan;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['nama_lengkap'] = $namalengkap;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['role'] = $role;
        // Tampilkan pesan kesalahan menggunakan JavaScript alert
        echo "<script>alert('$pesan_kesalahan'); window.location.href = '../register.php';</script>";
    } else {
        // Jika tidak ada kesalahan, lanjutkan proses register
        $sql = "INSERT INTO user (perpus_id, username, password, email, nama_lengkap, alamat, role) VALUES ('$perpustakaan', '$username', '$hashed_password', '$email', '$namalengkap', '$alamat', '$role')";

        if (mysqli_query($koneksi, $sql)) {
            header("location:../login.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>
