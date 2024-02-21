<?php
include '../../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $perpustakaan = $_POST['perpustakaan'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $sinopsis = $_POST['sinopsis'];
    $kategori = $_POST['kategori'];
    $cover = $_FILES["cover"];

    // Lakukan validasi dan penambahan buku
    if (!empty($judul) && !empty($penulis) && !empty($penerbit) && !empty($tahun_terbit) && !empty($kategori)) {
        // Memeriksa ekstensi file
        $allowedExtensions = array("jpg", "jpeg", "png", "svg");
        $fileExtension = strtolower(pathinfo($cover["name"], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            // Mengunggah foto jika ekstensinya valid
            $targetDir = "../ ../asset/";
            $targetFileName = uniqid() . '.' . $fileExtension; // Menyimpan nama unik file untuk menghindari tumpang tindih nama
            $targetFile = $targetDir . $targetFileName;

            if (move_uploaded_file($cover["tmp_name"], $targetFile)) {
                // Query untuk menambahkan buku ke dalam database
                $add_book_query = "INSERT INTO `buku` (perpus_id, foto, judul, penulis, penerbit, tahun_terbit, sinopsis, kategori_id)
                               VALUES ('$perpustakaan', '$targetFileName', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$sinopsis', '$kategori')";

                // Eksekusi query dan tampilkan pesan sukses atau error
                if (mysqli_query($koneksi, $add_book_query)) {
                    $success_message = "Buku berhasil ditambahkan.";
                    // Redirect to the desired page after successful insertion
                    header("location:../buku.php");
                    exit; // Exit the script after redirection
                } else {
                    $error_message = "Error: " . mysqli_error($koneksi);
                }
            } else {
                $error_message = "Maaf, terjadi kesalahan saat mengunggah gambar.";
            }
        } else {
            $error_message = "Hanya file dengan ekstensi .jpg, .jpeg, .png, atau .svg yang diperbolehkan.";
        }
    } else {
        $error_message = "Semua kolom harus diisi.";
    }

    // Display error message if any
    if (isset($error_message)) {
        echo $error_message;
    }

    // Close the database connection
    mysqli_close($koneksi);
}
?>
