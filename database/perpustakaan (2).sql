-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2024 pada 01.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `perpus_id`, `foto`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `kategori_id`, `created_at`) VALUES
(2, 1, 'Milea_Suara_dari_Dilan.jpg', 'Milea Suara dari Dilan', 'Pidi Baiq', 'Angkringan Milenial', 2024, 8, '2024-02-12 03:58:49'),
(13, 1, 'si_kancil.jpg', 'Petualangan si Kancil', 'Iweng Baik', 'PT Banjarangsana', 2021, 8, '2024-02-12 03:58:49'),
(17, 1, 'Pengabdi-Setan.jpg', 'Pengabdi Setan', 'Sulaeman Ibrahim', 'PT Alba', 2024, 15, '2024-02-12 03:58:49'),
(45, 1, 'dilan.png', 'Dilan & Milea 1990', 'Pidi Baiq', 'Angkringan Milenial', 2024, 8, '2024-02-12 01:46:51'),
(46, 1, 'dilan1991.jpg', 'Dilan & Milea 1991', 'Pidi Baiq', 'PT Banjarangsana', 2024, 8, '2024-02-12 03:58:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `nama_kategori`, `created_at`) VALUES
(6, 'Kesehatan1', '2024-02-13 06:23:02'),
(7, 'Pendidikan', '2024-02-12 03:46:35'),
(8, 'Komik', '2024-01-26 00:55:12'),
(12, 'Horor', '2024-02-12 03:46:24'),
(15, 'Novel', '2024-02-12 03:46:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`id`, `user`, `buku`, `created_at`) VALUES
(9, 16, 2, '2024-02-11 12:25:05'),
(10, 16, 13, '2024-02-11 12:49:57'),
(11, 1, 2, '2024-02-11 13:32:59'),
(12, 1, 13, '2024-02-11 13:33:01'),
(13, 20, 2, '2024-02-12 01:23:48'),
(15, 20, 51, '2024-02-12 06:13:34'),
(16, 22, 2, '2024-02-13 05:53:25'),
(17, 25, 2, '2024-02-14 22:07:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `perpus_id`, `user`, `buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status_peminjaman`, `created_at`) VALUES
(2, 1, 11, 1, '2024-01-21', '2024-01-24', 'Dikembalikan', '2024-02-01 01:00:49'),
(3, 1, 2, 2, '2024-02-01', '2024-02-20', 'Dikembalikan', '2024-02-13 06:15:08'),
(5, 1, 11, 10, '2024-01-30', '2024-01-30', 'Dikembalikan', '2024-01-30 07:13:12'),
(6, 1, 2, 1, '2024-01-30', '2024-01-30', 'Dikembalikan', '2024-01-30 07:13:03'),
(7, 1, 2, 13, '2024-01-30', '2024-01-30', 'Dikembalikan', '2024-01-30 07:13:17'),
(8, 1, 16, 13, '2024-01-30', '2024-01-31', 'Dikembalikan', '2024-02-01 00:51:34'),
(9, 1, 2, 13, '2024-02-03', '2024-02-03', 'Dikembalikan', '2024-02-03 04:37:52'),
(10, 1, 16, 2, '2024-02-06', '2024-02-06', 'Dikembalikan', '2024-02-06 03:21:16'),
(11, 1, 16, 2, '2024-02-06', '2024-02-06', 'Dikembalikan', '2024-02-06 03:21:10'),
(12, 1, 16, 18, '2024-02-06', '2024-02-06', 'Dikembalikan', '2024-02-06 03:23:04'),
(13, 1, 16, 2, '2024-02-06', '2024-02-06', 'Dikembalikan', '2024-02-06 04:37:37'),
(14, 1, 16, 2, '2024-02-07', '2024-02-11', 'Dikembalikan', '2024-02-11 13:32:20'),
(15, 1, 20, 2, '2024-02-20', '2024-02-12', 'Dikembalikan', '2024-02-12 03:26:35'),
(16, 1, 20, 13, '2024-02-13', '2024-02-13', 'Dikembalikan', '2024-02-12 03:26:20'),
(17, 1, 20, 2, '2024-02-12', '2024-02-12', 'Dikembalikan', '2024-02-12 03:27:52'),
(18, 1, 20, 17, '2024-02-12', '2024-02-12', 'Dikembalikan', '2024-02-12 03:47:20'),
(19, 1, 22, 13, '2024-02-15', '2024-02-16', 'Dikembalikan', '2024-02-14 12:51:37'),
(20, 1, 1, 2, '2024-02-14', '2024-02-15', 'Dikembalikan', '2024-02-14 12:51:55'),
(21, 1, 25, 2, '2024-02-15', '0000-00-00', 'Dipinjam', '2024-02-14 22:06:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id` int(11) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perpustakaan`
--

INSERT INTO `perpustakaan` (`id`, `nama_perpus`, `alamat`, `no_tlp`, `created_at`) VALUES
(1, 'Perpustakaan SMKN 1 BANJAR', 'SMKN 1 BANJAR', '0999022332', '2024-01-29 19:07:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_buku`
--

CREATE TABLE `ulasan_buku` (
  `id_ulasan` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan_buku`
--

INSERT INTO `ulasan_buku` (`id_ulasan`, `user`, `buku`, `ulasan`, `rating`, `created_at`) VALUES
(5, 1, 2, 'test', 5, '2024-01-25 00:16:03'),
(6, 1, 13, 'test', 5, '2024-01-30 07:32:11'),
(8, 1, 10, 'Bagus', 5, '2024-02-01 01:17:17'),
(9, 1, 10, 'Bagus', 5, '2024-02-01 01:17:22'),
(10, 1, 17, 'Sangat Serem ', 3, '2024-02-03 04:34:44'),
(11, 1, 18, 'Bagus Banget alur ceritanya', 5, '2024-02-05 05:57:15'),
(12, 1, 18, 'Bagus Kali', 5, '2024-02-05 06:01:41'),
(13, 1, 18, 'terbaik', 5, '2024-02-05 06:02:00'),
(14, 16, 2, 'Bagus Bagus', 4, '2024-02-06 02:53:03'),
(15, 16, 10, 'Bagus Bangtttt', 5, '2024-02-06 02:56:13'),
(16, 16, 2, 'Sangat wortit Untuk di baca', 5, '2024-02-06 03:02:22'),
(18, 16, 2, 'ertyuk', 5, '2024-02-07 19:17:38'),
(20, 1, 13, 'Luvv', 5, '2024-02-07 19:23:31'),
(21, 1, 2, 'Lopyuu', 5, '2024-02-07 19:24:56'),
(22, 16, 2, 'HIHIHIHI', 4, '2024-02-07 19:26:33'),
(23, 16, 2, 'Bagus Sekali', 5, '2024-02-11 12:27:53'),
(24, 1, 46, 'AAAAaaa lucuuu Bangetttt', 5, '2024-02-13 03:32:50'),
(25, 22, 2, 'aaaaabagus', 5, '2024-02-13 05:54:04'),
(26, 1, 46, 'buaguss', 4, '2024-02-13 06:22:42'),
(27, 25, 2, 'Bagus Banget', 5, '2024-02-14 22:06:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `perpus_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','petugas','peminjam','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `perpus_id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`, `created_at`) VALUES
(1, 0, 'iweng', '$2a$12$lzrnN..vMjHnA0VCWa8yFuGT2MeAbulEZXQCKPF4KvF3zjlnC1rR.', 'ridwanbanjar1122@gmail.com', 'Ridwan', 'Pintusinga Banjar', 'admin', '2024-01-17 02:40:22'),
(2, 1, 'radit', '$2y$10$NLh0pNlszKy11E.0j8EjEOCQ26pNHLkTJ7Ngi5kE.ILwpr7rRTDme', 'adit12@gmail.com', 'Raditya', 'Pintusinga Banjar', 'peminjam', '2024-02-13 03:23:09'),
(3, 1, 'adam', '$2y$10$eHR.KjNYtLbiHMWfBnODR.n8YqLHWds1qTkhA//KFKZlMrpgDscFW', 'adamsp12@gmail.com', 'Adam Suradi', 'Pintusinga Banjar', 'petugas', '2024-01-30 07:15:00'),
(16, 1, 'jenal', '$2y$10$.Blw/KhXrvs2c4QUi1GixOVEUA2YV9bsutrxKgdveO9WqWKgYFJFq', 'jenal@gmail.com', 'Jenal', 'Neglasari', 'peminjam', '2024-01-30 03:39:53'),
(18, 1, 'sur', '$2y$10$.uHhm7EgkI7v4p0gzY1Jjezh04gDTGEY9e2SLG8DUMVSgYeu2o.FS', 'suryana@gmail.com', 'Suryana', 'Balokang', 'petugas', '2024-02-05 05:47:57'),
(19, 1, 'asep', '$2y$10$gmnvvEtLjRlK5mrPfTXsuuK/vfEzSabf8GEbfohlB6lgJ3aQ.vhl6', 'asep04@gmail.com', 'Asep', 'Banjar', 'petugas', '2024-02-05 06:12:27'),
(20, 1, 'yogigoy', '$2y$10$VyuLOqgDGgZ/sobuRoisLuahtkjtjk1n4Ybw9NgDIbzLDgyTUMRtm', 'yogigoy@gmail.com', 'Yogi YF', 'Situbatu', 'peminjam', '2024-02-11 13:38:56'),
(24, 1, 'albia lubang pantat', '$2y$10$FxVrs5Z255tHnyx6WvE9cOAPHmXkHuv.6Nus4MXN7oHb5AWW2QV5K', 'aal@gmail.com', 'aal', 'role ipsum', 'petugas', '2024-02-13 07:13:16'),
(25, 1, 'iwan', '$2y$10$4ob0TbDomuKOsaHz5JVRRe0wGFt33aauhA8OG/EBIooyw2efcmu3G', 'iwan@gmail.com', 'Ridwan', 'Banjar', 'peminjam', '2024-02-14 21:55:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
