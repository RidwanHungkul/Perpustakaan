<?php 
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['user'];
    $buku = $_POST['buku'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];


    $sql = "INSERT INTO ulasan_buku (user, buku, ulasan, rating) VALUES ('$user', '$buku', '$ulasan', '$rating')";

    if (mysqli_query($koneksi, $sql)) {
        header("location:../admin/buku.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>