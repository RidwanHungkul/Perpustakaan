<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori = $_POST['kategori'];
    $cover = $_FILES['cover'];

    // Query Untuk mengambil data lama
    $sql = "SELECT * FROM buku WHERE id = $user";
    $result = mysqli_query($koneksi, $sql);
    $fetchData = mysqli_fetch_assoc($result);
    $gambarLama = $fetchData['foto'];

    if (!empty($judul) && !empty($penulis) && !empty($penerbit) && !empty($tahun_terbit) && !empty($sinopsis) && !empty($kategori)) {

        // Jika ada file yang diunggah
        if (!empty($cover['name'])) {
            // Mengunggah foto baru
            $targetDir = ""; // Direktori penyimpanan foto baru
            $targetFile = $targetDir . basename($_FILES["cover"]["name"]);
            move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile);
            $fotoBaru = $targetFile;

        } else {
            // Jika tidak ada file yang diunggah, gunakan gambar lama
            $fotoBaru = $gambarLama;
        }

        // Mengupdate data buku
        $updateSql = "UPDATE buku SET foto = '$fotoBaru', judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', sinopsis = '$sinopsis', kategori_id = '$kategori' WHERE id = $user";

        if (mysqli_query($koneksi, $updateSql)) {
            echo "updated successfully!";
            header("Location: ../admin/buku.php");
            exit();
        } else {
            echo "Error updating: " . mysqli_error($koneksi);
        }
    } else {
        echo "Semua field harus diisi";
    }
} else {
    exit();
}
?>
