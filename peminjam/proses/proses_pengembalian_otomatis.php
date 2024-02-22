<?php
include '../../koneksi.php';

// Cek peminjaman yang telah melewati batas waktu pengembalian
$today = date('Y-m-d');
$expiredDate = date('Y-m-d', strtotime('-2 days', strtotime($today))); // Tanggal dua hari sebelumnya

$getExpiredPeminjamanQuery = "SELECT id, buku FROM peminjaman WHERE status_peminjaman = 'Dipinjam' AND tanggal_pengembalian < '$expiredDate'";
$getExpiredPeminjamanResult = mysqli_query($koneksi, $getExpiredPeminjamanQuery);

if ($getExpiredPeminjamanResult) {
    while ($row = mysqli_fetch_assoc($getExpiredPeminjamanResult)) {
        $peminjamanId = $row['id'];
        $bookId = $row['buku'];

        // Perbarui status peminjaman menjadi "Dikembalikan"
        $updatePeminjamanQuery = "UPDATE peminjaman SET status_peminjaman = 'Dikembalikan' WHERE id = $peminjamanId";
        mysqli_query($koneksi, $updatePeminjamanQuery);

        // Tambahkan stok buku yang sesuai
        $updateStokQuery = "UPDATE buku SET stok = stok + 1 WHERE id = $bookId";
        mysqli_query($koneksi, $updateStokQuery);
    }
} else {
    echo "Gagal mendapatkan peminjaman yang telah kadaluarsa.";
}
?>
