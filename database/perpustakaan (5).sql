-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Mar 2024 pada 16.50
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
  `sinopsis` text NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `perpus_id`, `foto`, `judul`, `penulis`, `penerbit`, `sinopsis`, `tahun_terbit`, `kategori_id`, `stok`, `pdf`, `created_at`) VALUES
(80, 1, 'Screenshot 2024-03-01 135419.png', 'Days of Violet', 'Sweta Kartika', 'Buku Indonesia', 'Komik', 2017, 8, 10, '2. Grey dan Jingga - Days of The Violet (Sweta Kartika) (z-lib.org).pdf', '2024-03-01 15:41:15'),
(81, 1, 'Screenshot 2024-03-01 135744.png', 'Coding Games in Python', 'Ben Ffrancon Davies', 'Penguin Random House', 'Python', 2023, 7, 10, 'Coding Games in Python (Carol Vorderman, Craig Steele, Claire Quigley etc.) (Z-Library).pdf', '2024-03-01 15:42:10'),
(82, 1, '65dfd4d94b9bf.jpg', '7 in 1 Pemograman Web Untuk Pemula', 'Rahi Abdulloh', 'Buku Indonesia', 'Lorem', 2024, 7, 10, '65dfd4d94b9c3.pdf', '2024-03-01 15:31:10'),
(85, 1, '65dfe3f0ad320.png', '101 Kisah Tabi\"in', 'Hepi Andi Bastoni', 'Z-Library', 'Kisah Tabiin', 2024, 21, 10, '65dfe3f0ad327.pdf', '2024-03-01 15:31:10');

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
(6, 'Kesehatan', '2024-02-21 02:32:18'),
(7, 'Pendidikan', '2024-02-12 03:46:35'),
(8, 'Komik', '2024-01-26 00:55:12'),
(12, 'Horor', '2024-02-12 03:46:24'),
(15, 'Novel', '2024-02-12 03:46:14'),
(18, 'Politik', '2024-02-17 04:31:36'),
(21, 'Agama', '2024-02-21 02:31:05');

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
(142, 1, 35, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 08:02:17'),
(143, 1, 35, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 08:02:41'),
(144, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:15:48'),
(145, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:16:05'),
(146, 1, 20, 85, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:16:40'),
(147, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:20:19'),
(148, 0, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:23:08'),
(149, 0, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:34:10'),
(150, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:36:09'),
(151, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:52:33'),
(155, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 13:52:34'),
(156, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:12:25'),
(157, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:13:16'),
(158, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:13:43'),
(159, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:14:01'),
(160, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:15:54'),
(161, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:16:48'),
(162, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:17:01'),
(163, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:17:13'),
(164, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:17:36'),
(165, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:17:49'),
(166, 1, 20, 85, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:18:05'),
(167, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:19:53'),
(168, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:19:54'),
(169, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:22:09'),
(170, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:33:50'),
(171, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:34:35'),
(172, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:39:07'),
(173, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:44:25'),
(174, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:44:41'),
(175, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:44:57'),
(176, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:46:03'),
(177, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:46:17'),
(178, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:55:42'),
(179, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:56:02'),
(180, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:57:06'),
(181, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:57:27'),
(182, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 14:57:40'),
(183, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:06:04'),
(184, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:06:18'),
(185, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:07:31'),
(186, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:14:57'),
(187, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:15:08'),
(188, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:15:16'),
(189, 1, 20, 82, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:16:14'),
(190, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:17:29'),
(191, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:38:27'),
(192, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:39:45'),
(193, 1, 20, 80, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:41:15'),
(194, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:42:10');

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
(3, 1, 'adam', '$2y$10$vwUG7l6w1b5/Da7OCXRsoeawzqIU3wP5iCQoNyMFZJrHGjApWqeuG', 'adamsp32012@gmail.com', 'Adam Suradi', 'Pintusinga Banjar', 'petugas', '2024-02-20 23:11:43'),
(16, 1, 'jenal', '$2y$10$.Blw/KhXrvs2c4QUi1GixOVEUA2YV9bsutrxKgdveO9WqWKgYFJFq', 'jenal@gmail.com', 'Jenal', 'Neglasari', 'peminjam', '2024-01-30 03:39:53'),
(18, 1, 'sur', '$2y$10$.uHhm7EgkI7v4p0gzY1Jjezh04gDTGEY9e2SLG8DUMVSgYeu2o.FS', 'suryana@gmail.com', 'Suryana', 'Balokang', 'petugas', '2024-02-05 05:47:57'),
(19, 1, 'asep', '$2y$10$gmnvvEtLjRlK5mrPfTXsuuK/vfEzSabf8GEbfohlB6lgJ3aQ.vhl6', 'asep04@gmail.com', 'Asep', 'Banjar', 'petugas', '2024-02-05 06:12:27'),
(20, 1, 'yogigoy', '$2y$10$VyuLOqgDGgZ/sobuRoisLuahtkjtjk1n4Ybw9NgDIbzLDgyTUMRtm', 'yogigoy@gmail.com', 'Yogi YF', 'Situbatu', 'peminjam', '2024-02-11 13:38:56'),
(25, 1, 'iwan', '$2y$10$4ob0TbDomuKOsaHz5JVRRe0wGFt33aauhA8OG/EBIooyw2efcmu3G', 'iwan@gmail.com', 'Ridwan', 'Banjar', 'peminjam', '2024-02-14 21:55:25'),
(26, 1, 'raihanrairendi', '$2y$10$4Jd6Ih8TxRRg2L.Nm3eGZeoW0RY3WZ/910mtQ5Gx0fpsDSUdOGuqi', 'raihanrairendi@gmail.com', 'Rendi Raihanrai', 'Dayeuhluhur', 'peminjam', '2024-02-16 03:38:50'),
(27, 1, 'rynr', '$2y$10$V7hPZAx4nR66x9Osp/YGS..obQ9HYVMRSsoovD0gMBQEh20mBg1Li', 'ryanyanuar@gmail.com', 'Ryan Yanuar Pradana', 'Situbatu', 'petugas', '2024-02-19 01:29:42'),
(28, 1, 'darsu', '$2y$10$fVORDkd44eEQGzbRp/R7iO2Cbtf7iVT/PLG9KYWluLXU0NUezrJKa', 'darsu.smkn1banjar@gmail.com', 'Darsu', 'Ciamis', 'peminjam', '2024-02-19 02:14:45'),
(31, 1, 'jen', '$2y$10$xt3FYVK21WrrYdO/Cv0wI.RWHYOeuAMQE1HuK4bfY4KGyYoEOPdJu', 'iweng@gmail.com', 'Ridwan', 'Bnajr', 'petugas', '2024-02-21 00:47:48'),
(35, 1, 'prabusemar', '$2y$10$gt4WnyXuSDmO9b819ZYJXukXrrMNWId0bMdC5mVIEM4slRm7OAKwG', 'pribadi@gmail.com', 'Pribadi', 'bjr', 'peminjam', '2024-02-21 02:35:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
