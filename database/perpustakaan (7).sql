-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 13.14
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
(80, 1, 'Screenshot 2024-03-01 135419.png', 'Days of Violet', 'Sweta Kartikaaa', 'Buku Indonesia', 'Kisah ini adalah tentang dirinya. Tentang hari harinya yang akan seperti violet. Warna kesedihan, yang di ungkapkan dengan keceriaan.', 2014, 15, 11, '2. Grey dan Jingga - Days of The Violet (Sweta Kartika) (z-lib.org).pdf', '2024-03-05 12:09:43'),
(81, 1, 'Screenshot 2024-03-01 135744.png', 'Coding Games in Python', 'Ben Ffrancon Davies', 'Penguin Random House', '\"Buku Coding Games in Python\" mengajarkan konsep-konsep dasar pemrograman Python dengan pendekatan yang interaktif dan menyenangkan melalui pembuatan berbagai permainan komputer. Dengan buku ini, pembaca akan belajar dasar-dasar pemrograman Python seperti variabel, fungsi, perulangan, percabangan, dan lainnya, sambil membangun permainan-permainan yang menarik.\r\n\r\nSetiap bab dalam buku ini fokus pada pembuatan satu jenis permainan, mulai dari permainan sederhana seperti tebak angka, hingga permainan yang lebih kompleks seperti game platformer atau game puzzle. Pembaca akan dipandu melalui proses pembuatan permainan langkah demi langkah dengan penjelasan yang jelas dan contoh kode yang mudah dipahami.\r\n\r\nMelalui pembuatan permainan-permainan ini, pembaca akan mengembangkan pemahaman yang kuat tentang konsep-konsep pemrograman Python dan bagaimana menerapkannya dalam konteks pembuatan permainan komputer. Buku ini cocok untuk pemula yang ingin belajar pemrograman Python secara praktis sambil memiliki pengalaman yang menyenangkan dalam pembuatan permainan.', 2023, 7, 10, 'Coding Games in Python (Carol Vorderman, Craig Steele, Claire Quigley etc.) (Z-Library).pdf', '2024-03-03 14:44:15'),
(82, 1, '65dfd4d94b9bf.jpg', '7 in 1 Pemograman Web Untuk Pemula', 'Rahi Abdulloh', 'Buku Indonesia', '\"Buku 7 in 1 Pemrograman Web Untuk Pemula\" merupakan panduan komprehensif yang dirancang khusus untuk pemula yang ingin mempelajari pemrograman web dari awal. Buku ini menawarkan pendekatan praktis dengan menyajikan tujuh proyek pemrograman web yang berbeda, dimulai dari yang sederhana hingga yang lebih kompleks.\r\n\r\nSetiap proyek dalam buku ini dirancang untuk memperkenalkan pembaca pada konsep-konsep kunci pemrograman web, termasuk HTML, CSS, JavaScript, serta beberapa teknologi dan alat modern seperti Bootstrap, jQuery, dan lainnya. Melalui pembuatan proyek-proyek tersebut, pembaca akan belajar cara membuat halaman web interaktif, mendesain tata letak yang menarik, dan mengimplementasikan fitur-fitur dinamis.\r\n\r\nBuku ini ditulis dengan gaya yang mudah dipahami dan dilengkapi dengan contoh kode yang jelas serta penjelasan yang mendalam tentang setiap langkah yang diambil dalam pembuatan proyek-proyek tersebut. Dengan demikian, pembaca tidak hanya akan memperoleh pengetahuan dasar tentang pemrograman web, tetapi juga akan memiliki keterampilan praktis untuk membangun situs web mereka sendiri.\r\n\r\n\"Buku 7 in 1 Pemrograman Web Untuk Pemula\" cocok bagi siapa saja yang ingin memulai perjalanan mereka dalam dunia pemrograman web tanpa memiliki pengalaman sebelumnya. Dengan mengikuti proyek-proyek yang disajikan dalam buku ini, pembaca akan dapat memperoleh dasar yang kokoh dalam pemrograman web dan siap untuk menjelajahi lebih lanjut dalam bidang ini.', 2024, 7, 10, '65dfd4d94b9c3.pdf', '2024-03-04 03:34:23'),
(85, 1, '65dfe3f0ad320.png', '101 Kisah Tabiin', 'Hepi Andi Bastoni', 'Pustaka Al-Kautsar', '\"Buku 101 Kisah Tabiin\" menghadirkan kisah-kisah inspiratif tentang kehidupan para tabiin, para pengikut pertama Islam yang hidup setelah masa Nabi Muhammad SAW. Dalam buku ini, pembaca akan disajikan dengan serangkaian cerita tentang kebaikan, keteguhan iman, pengorbanan, dan perjalanan spiritual para tabiin yang menginspirasi.\r\n\r\nSetiap kisah dalam buku ini memberikan gambaran yang menyentuh hati tentang bagaimana para tabiin menghadapi tantangan, mengamalkan ajaran Islam, dan memberikan kontribusi besar dalam penyebaran agama Islam. Kisah-kisah ini tidak hanya memperkenalkan pembaca pada tokoh-tokoh yang memainkan peran penting dalam sejarah Islam, tetapi juga memberikan pelajaran moral dan spiritual yang berharga yang dapat diambil dan diaplikasikan dalam kehidupan sehari-hari.\r\n\r\nBuku ini ditulis dengan gaya yang menarik dan mudah dipahami, membuatnya cocok untuk pembaca dari berbagai latar belakang dan tingkat pengetahuan tentang Islam. Dengan membaca kisah-kisah dalam buku ini, pembaca akan dibawa dalam perjalanan yang menginspirasi melalui kehidupan para tabiin dan mendapatkan wawasan yang lebih dalam tentang nilai-nilai yang mendasari kekuatan spiritual dan moral dalam Islam.\r\n\r\n\"Buku 101 Kisah Tabiin\" adalah sumber inspirasi bagi siapa saja yang ingin memperdalam pemahaman mereka tentang sejarah Islam dan mengambil pelajaran dari kehidupan para tabiin yang menjadi teladan dalam keimanan, ketabahan, dan pengabdian kepada Allah SWT.', 2012, 21, 10, '65dfe3f0ad327.pdf', '2024-03-05 07:51:26'),
(86, 1, '65e1fd8df4057.png', 'His Dark Materials 3 Teropong', 'Philip Pullman', 'PT Gramedia Pustaka Utama', 'Will adalah si pembawa pisau. Sekarang, didampingi para\r\nmalaikat, ia bertugas mengantarkan senjata yang dahsyat\r\ndan berbahaya itu kepada Lord Asriel––sesuai perintah\r\nayahnya ketika menjelang ajal.\r\nTapi bagaimana ia bisa mencari Lord Asriel, padahal Lyra\r\nhilang? Hanya dengan bantuan gadis itu ia dapat memahami\r\nberbagai intrik yang mengepungnya.\r\nDua kekuatan besar dari banyak dunia bersiap-siap perang,\r\ndan Will harus menemukan Lyra, sebab mereka dalam perjalanan menuju pertempuran, perjalanan tak terelakkan yang bahkan\r\nakan membawa mereka ke dunia kematian... ', 2022, 12, 10, '65e1fd8df405b.pdf', '2024-03-01 16:08:46'),
(87, 1, '65e1fe10c0e4d.png', 'The Monstrumologist 1 : Sang Ali Monster', 'Ricky Yancey', 'PT Gramedia Pustaka Utama', 'Dalam \"The Monstrumologist 1: Sang Ali Monster\", pembaca dibawa ke dunia Victoria-era yang gelap dan mengerikan di mana Dr. Pellinore Warthrop, seorang monstrumolog terkemuka, mempelajari makhluk-makhluk mengerikan yang menghuni dunia yang tidak dikenal oleh sebagian besar orang. Warthrop, bersama dengan asistennya, Will Henry, menjalani kehidupan yang berbahaya di dunia yang penuh dengan rahasia dan ancaman.\r\n\r\nKetika kota mereka diserang oleh serangkaian pembunuhan mengerikan yang tampaknya dilakukan oleh makhluk yang belum pernah mereka lihat sebelumnya, Warthrop dan Will Henry terjerumus ke dalam petualangan yang menegangkan untuk mengungkap kebenaran di balik keberadaan sang \"Ali Monster\". Mereka harus berhadapan dengan rintangan yang mengerikan dan bertarung melawan kekuatan yang jauh lebih besar daripada yang mereka duga sebelumnya.\r\n\r\nNovel ini menawarkan kombinasi yang menarik antara horor, misteri, dan petualangan yang tak terlupakan. Dengan penggambaran yang mendalam tentang karakter-karakter yang kompleks dan atmosfer yang gelap dan menakutkan, \"The Monstrumologist 1: Sang Ali Monster\" akan memikat pembaca dari awal hingga akhir, sambil menghadirkan pertanyaan-pertanyaan tentang keberanian, kesetiaan, dan harga dari pengetahuan yang terlalu dalam.', 2021, 12, 12, '65e1fe10c0e57.pdf', '2024-03-05 08:04:13'),
(88, 1, '65e1ff500b857.png', 'Kambing Jantan', 'Raditya Dika', 'PT Gramedia Pustaka Utama', '\"Buku Kambing Jantan\" adalah kumpulan kisah autobiografi yang mengisahkan pengalaman-pengalaman lucu dan menggelitik Raditya Dika dalam menjalani kehidupan sehari-hari. Melalui gaya penulisan yang cerdas dan kocak, Raditya Dika mengajak pembaca masuk ke dalam dunianya yang unik dan penuh dengan humor.\r\n\r\nBuku ini berisi tentang berbagai kejadian absurd dan situasi kocak yang dialami oleh Raditya Dika sejak kecil hingga menjadi dewasa. Mulai dari kisah-kisah lucu di sekolah, pengalaman-pengalaman cinta yang konyol, hingga kelucuan-kelucuan dalam kehidupan sehari-hari, semuanya disajikan dengan cara yang menghibur dan mengundang tawa.\r\n\r\nSelain menghibur, \"Buku Kambing Jantan\" juga memberikan gambaran tentang kehidupan anak muda di Indonesia pada masanya, dengan segala kegembiraan, kegilaan, dan ketidakpastian yang menyertainya. Buku ini menjadi sangat populer di kalangan pembaca karena kejujuran dan ketulusan Raditya Dika dalam berbagi pengalaman pribadinya, serta kemampuannya mengolahnya menjadi cerita yang menghibur.\r\n\r\nSecara keseluruhan, \"Buku Kambing Jantan\" adalah bacaan yang cocok untuk mereka yang mencari hiburan ringan dan tertawa sejenak dengan kisah-kisah humor sehari-hari yang penuh dengan kejutan.', 2023, 15, 10, '65e1ff500b85a.pdf', '2024-03-01 16:16:16'),
(89, 1, '65e1ffc4c1832.png', 'Catching Fire', 'Suzanne Collins', 'PT Gramedia Pustaka Utama', 'Api pemberontakan sudah tersulut. Dan Capitol ingin membalas dendam\r\nKatniss Everdeen berhasil keluar sebagai pemenang Hunger Games bersama\r\nPeeta Mellark. Tapi kemenangan itu menyulut kemarahan Capitol.\r\nKemenangan Katniss ternyata membangkitkan semangat pemberontakan di\r\nbeberapa distrik untuk menentang kekuasaan Presiden Snow yang kejam.\r\nPresiden Snow mengancam Katniss untuk meredakan kegelisahan penduduk\r\ndistrik dalam Tur Kemenangan. Satu-satunya cara meredam keinginan\r\npenduduk untuk memberontak adalah dengan membuktikan bahwa dia dan\r\nPeeta saling mencintai tanpa ada keraguan sedikit pun. Jika gagal, keluarga\r\ndan semua orang yang disayangi Katniss menjadi taruhannya.... ', 2021, 15, 10, '65e1ffc4c1839.pdf', '2024-03-01 16:18:12'),
(90, 1, '65e200e0be9dc.png', 'Andai Sel-sel Dalam Tubuhmu Berbicara', 'Rizaldo', 'PT Bintang Pustaka', 'Dalam \"Andai Sel-Sel dalam Tubuh Dapat Berbicara\", pembaca diajak untuk menjelajahi dunia mikroskopis di dalam tubuh manusia melalui sudut pandang yang belum pernah dipikirkan sebelumnya: sudut pandang sel-sel yang berinteraksi di dalam tubuh. Penulis mengambil pembaca dalam perjalanan ilmiah yang menarik, di mana sel-sel menjadi narator dan menceritakan kisahnya sendiri.\r\n\r\nMelalui narasi yang mengalir dan ajaib, pembaca akan mengenal lebih dalam tentang berbagai jenis sel yang ada dalam tubuh manusia, bagaimana sel-sel tersebut bekerja sama untuk menjaga kesehatan dan kelangsungan hidup tubuh, serta bagaimana mereka bereaksi terhadap berbagai kondisi dan penyakit.\r\n\r\nBuku ini tidak hanya mengajak pembaca untuk mengeksplorasi ilmu pengetahuan tentang anatomi dan biologi manusia secara mendalam, tetapi juga memberikan wawasan yang menarik tentang kompleksitas tubuh manusia dan betapa luar biasanya interaksi sel-sel di dalamnya. Dengan gaya penceritaan yang cerdas dan menghibur, pembaca akan dibawa dalam perjalanan yang mengagumkan dan menginspirasi melalui dunia kecil yang tersembunyi di dalam tubuh kita.\r\n\r\n\"Andai Sel-Sel dalam Tubuh Dapat Berbicara\" adalah buku yang cocok bagi siapa saja yang tertarik pada sains dan ingin mendapatkan pemahaman yang lebih dalam tentang fungsi tubuh manusia secara unik dan kreatif. Dengan bahasa yang mudah dipahami dan ilustrasi yang menarik, buku ini akan memikat pembaca dari awal hingga akhir, sambil memberikan wawasan yang berharga tentang keajaiban alam dan kompleksitas kehidupan manusia.', 2020, 6, 10, '65e200e0be9e2.pdf', '2024-03-01 16:22:56'),
(91, 1, '65e204fced58a.png', 'Algoritma Machine Learning Python', 'Dr. Jhosep Teguh Santoso', 'Yayasan Primaagus Teknik', '\"Buku Algoritma Machine Learning Python\" adalah panduan komprehensif yang ditujukan untuk para pembaca yang ingin mempelajari dasar-dasar dan konsep-konsep utama dalam machine learning menggunakan bahasa pemrograman Python. Buku ini membahas berbagai algoritma machine learning dari yang paling dasar hingga yang lebih canggih, serta memberikan pemahaman yang mendalam tentang bagaimana menerapkan algoritma-algoritma tersebut dalam bahasa Python.\r\n\r\nDengan menggunakan pendekatan yang praktis dan didukung dengan contoh kode yang jelas, pembaca akan dipandu melalui berbagai teknik dalam machine learning seperti regresi, klasifikasi, pengelompokan, dan lain-lain. Selain itu, buku ini juga membahas konsep-konsep penting seperti pengolahan data, validasi model, evaluasi kinerja, dan pemrosesan data yang diperlukan sebelum menerapkan algoritma machine learning.\r\n\r\nMelalui pembacaan buku ini, pembaca akan memperoleh pemahaman yang kuat tentang bagaimana machine learning bekerja, serta keterampilan praktis untuk menerapkan algoritma machine learning dalam proyek-proyek nyata menggunakan Python. Buku ini cocok untuk pembaca yang memiliki pengetahuan dasar tentang pemrograman Python dan ingin memperluas pemahaman mereka tentang machine learning.\r\n\r\nDengan demikian, \"Buku Algoritma Machine Learning Python\" merupakan sumber yang sangat berguna bagi para pembaca yang tertarik untuk mempelajari machine learning menggunakan bahasa pemrograman Python, baik untuk tujuan akademis maupun profesional.', 2020, 7, 10, '65e204fced58d.pdf', '2024-03-01 16:40:28'),
(92, 1, '65e20571776a3.png', 'Calculus All In On For Dummies', 'Mark Ryan', 'Dummies', 'Dalam \"Buku Calculus All-In-One For Dummies\", pembaca akan dibawa dalam perjalanan yang menyeluruh melalui konsep-konsep kalkulus, dimulai dari dasar-dasar yang paling mendasar hingga topik-topik yang lebih lanjut dan kompleks. Buku ini dirancang khusus untuk para pembelajar yang ingin memahami kalkulus tanpa harus memiliki latar belakang matematika yang mendalam.\r\n\r\nBuku ini menggabungkan materi-materi dari beberapa buku Dummies yang terpisah, termasuk \"Calculus For Dummies\", \"Calculus Workbook For Dummies\", \"Calculus II For Dummies\", dan \"Calculus III For Dummies\". Ini berarti pembaca akan diberikan panduan lengkap untuk memahami konsep kalkulus mulai dari kalkulus diferensial hingga kalkulus integral, serta topik-topik yang lebih lanjut seperti deret Taylor, turunan parsial, integral lipat, dan banyak lagi.\r\n\r\nDengan gaya penulisan yang ramah dan pendekatan yang mudah dipahami, pembaca akan dibimbing melalui setiap konsep matematika dengan jelas dan sistematis. Buku ini juga dilengkapi dengan banyak contoh, latihan, dan solusi yang dirancang untuk membantu pembaca menguasai materi dengan lebih baik.\r\n\r\n\"Calculus All-In-One For Dummies\" adalah sumber belajar yang ideal bagi siapa saja yang ingin memahami kalkulus dengan cara yang mudah dipahami dan ramah bagi pemula. Dengan menggunakan buku ini, pembaca akan dapat memperoleh pemahaman yang kuat tentang kalkulus dan mempersiapkan diri untuk menghadapi tantangan matematika yang lebih lanjut.', 2019, 7, 10, '65e20571776a6.pdf', '2024-03-01 16:42:25'),
(93, 1, '65e206bad5083.png', 'Kalkulus Dasar', 'Irmayanti', 'Yayasan Penerbit Muhammad Zaini', '\"Buku Teori dan Aplikasi Kalkulus Dasar\" adalah panduan komprehensif yang membahas konsep-konsep dasar dalam kalkulus serta penerapannya dalam berbagai bidang. Buku ini dirancang untuk memberikan pemahaman yang kokoh tentang prinsip-prinsip dasar kalkulus kepada pembaca, mulai dari konsep fungsi, limit, diferensiasi, hingga integrasi.\r\n\r\nPembaca akan dibimbing melalui setiap tahap pembelajaran dengan bahasa yang jelas dan mudah dipahami. Penulis menyajikan konsep-konsep matematika dengan ilustrasi yang kaya dan contoh yang relevan, sehingga memudahkan pembaca untuk memahami dan mengaplikasikan konsep-konsep tersebut dalam berbagai konteks.\r\n\r\nSelain membahas teori dasar kalkulus, buku ini juga menguraikan berbagai aplikasi kalkulus dalam berbagai bidang seperti fisika, ekonomi, teknik, dan lain-lain. Ini membantu pembaca untuk melihat relevansi dan pentingnya kalkulus dalam pemecahan masalah dunia nyata.\r\n\r\nDengan menggunakan buku ini, pembaca akan memperoleh pemahaman yang kokoh tentang dasar-dasar kalkulus serta kemampuan untuk menerapkan konsep-konsep tersebut dalam analisis dan pemodelan berbagai fenomena. Buku ini cocok untuk siapa saja yang tertarik untuk mempelajari kalkulus, baik sebagai dasar untuk pengetahuan matematika yang lebih lanjut atau untuk penerapan langsung dalam berbagai bidang ilmu pengetahuan dan teknik.', 2021, 7, 10, '65e206bad5085.pdf', '2024-03-01 16:47:54'),
(94, 1, '65e207b2d47a2.png', 'Buku Kimia Pintar', 'Devina Putri', 'Kawah Media', '\"Buku Pintar Kimia\" adalah sumber belajar yang komprehensif yang dirancang untuk membantu pembaca memahami konsep-konsep kimia dengan lebih baik. Melalui gaya penulisan yang jelas dan terstruktur, buku ini membahas berbagai topik dalam kimia mulai dari struktur atom dan tabel periodik hingga ikatan kimia, reaksi kimia, dan stoikiometri.\r\n\r\nDengan menggunakan pendekatan yang interaktif, buku ini menawarkan penjelasan yang mendalam tentang konsep-konsep kimia yang kompleks melalui ilustrasi, contoh-contoh, dan latihan-latihan yang relevan. Ini membantu pembaca untuk memahami dengan lebih baik bagaimana konsep-konsep tersebut berlaku dalam berbagai situasi.\r\n\r\nSelain membahas konsep-konsep dasar, \"Pintar Kimia\" juga menyoroti berbagai aplikasi kimia dalam kehidupan sehari-hari dan di berbagai bidang ilmu lainnya. Ini membantu pembaca untuk melihat relevansi dan pentingnya kimia dalam dunia nyata.\r\n\r\nDengan menggunakan buku ini, pembaca akan dapat memperoleh pemahaman yang kokoh tentang dasar-dasar kimia serta kemampuan untuk menerapkan konsep-konsep tersebut dalam berbagai konteks. Buku ini cocok untuk siapa saja yang tertarik untuk mempelajari kimia, baik sebagai dasar untuk pengetahuan kimia yang lebih lanjut atau untuk penerapan langsung dalam kehidupan sehari-hari dan karir ilmiah.', 2020, 7, 10, '65e207b2d47a5.pdf', '2024-03-01 16:52:02'),
(95, 1, '65e2083201467.png', 'Pintar Matematika', 'Surya A Pratama', 'Cakrawala', '\"Buku Pintar Matematika\" adalah sumber belajar yang komprehensif yang dirancang untuk membantu pembaca memahami konsep-konsep matematika dengan lebih baik. Melalui gaya penulisan yang jelas dan terstruktur, buku ini membahas berbagai topik dalam matematika mulai dari aritmetika dan aljabar hingga geometri, trigonometri, kalkulus, dan topik-topik lanjutan lainnya.\r\n\r\nDengan menggunakan pendekatan yang interaktif, buku ini menawarkan penjelasan yang mendalam tentang konsep-konsep matematika yang kompleks melalui ilustrasi, contoh-contoh, dan latihan-latihan yang relevan. Ini membantu pembaca untuk memahami dengan lebih baik bagaimana konsep-konsep tersebut berlaku dalam berbagai situasi.\r\n\r\nSelain membahas konsep-konsep dasar, \"Pintar Matematika\" juga menyoroti berbagai aplikasi matematika dalam kehidupan sehari-hari dan di berbagai bidang ilmu lainnya. Ini membantu pembaca untuk melihat relevansi dan pentingnya matematika dalam dunia nyata.\r\n\r\nDengan menggunakan buku ini, pembaca akan dapat memperoleh pemahaman yang kokoh tentang dasar-dasar matematika serta kemampuan untuk menerapkan konsep-konsep tersebut dalam berbagai konteks. Buku ini cocok untuk siapa saja yang tertarik untuk mempelajari matematika, baik sebagai dasar untuk pengetahuan matematika yang lebih lanjut atau untuk penerapan langsung dalam kehidupan sehari-hari dan karir ilmiah.', 2019, 7, 14, '65e208320146d.pdf', '2024-03-02 13:10:50'),
(96, 1, '65e20936112a9.png', 'TheArt of Clean Code', 'Christian Mayer', 'PT Gramedia Pustaka Utama', '\"The Art of Clean Code\" adalah panduan yang mendalam tentang bagaimana menulis kode yang berkualitas tinggi dan mudah dipelihara. Buku ini mengajarkan pembaca tentang prinsip-prinsip dasar dalam menulis kode yang bersih dan terorganisir dengan baik, serta memberikan wawasan tentang teknik-teknik khusus yang dapat membantu dalam meningkatkan kualitas kode.\r\n\r\nMelalui contoh-contoh praktis dan penjelasan yang jelas, penulis menjelaskan tentang berbagai aspek yang harus diperhatikan dalam menulis kode yang bersih, seperti penggunaan nama variabel yang deskriptif, strukturisasi kode, penanganan error, dan banyak lagi. Buku ini juga membahas tentang pentingnya pengujian kode dan dokumentasi yang baik dalam memastikan kualitas dan keberlanjutan sebuah proyek perangkat lunak.\r\n\r\nSelain itu, \"The Art of Clean Code\" juga membahas tentang bagaimana menangani kode yang kompleks dan memperbaiki kode yang sudah ada. Penulis memberikan strategi yang praktis untuk memperbaiki kode yang buruk dan mengubahnya menjadi kode yang lebih bersih dan terorganisir.\r\n\r\nDengan menggunakan buku ini, pembaca akan memperoleh pemahaman yang mendalam tentang pentingnya kode yang bersih dalam pengembangan perangkat lunak, serta keterampilan praktis untuk menerapkan prinsip-prinsip tersebut dalam pekerjaan sehari-hari mereka. Buku ini cocok untuk para pengembang perangkat lunak yang ingin meningkatkan kualitas kode mereka dan memperbaiki praktik pengkodean mereka.', 2021, 7, 10, '65e20936112ac.pdf', '2024-03-02 12:54:57'),
(98, 1, '65e6d03081332.png', 'The Twilight', 'Sweta Kartika', 'Buku Indonesia', 'Jika cinta itu mudah terucap, maka takkan ada cinta yang berliku.\r\nGrey dan Jingga adalah bukti bahwa cinta adalah rasa yang sulit tersamar ', 2015, 15, 10, '65e6d03081339.pdf', '2024-03-05 07:56:32');

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

--
-- Dumping data untuk tabel `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`id`, `user`, `buku`, `created_at`) VALUES
(35, 20, 85, '2024-03-04 03:38:50');

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
(194, 1, 20, 81, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-01 15:42:10'),
(195, 1, 35, 95, '2024-03-01', '2024-03-01', 'Dikembalikan', '2024-03-02 13:10:50'),
(196, 1, 20, 80, '2024-03-03', '2024-03-03', 'Dikembalikan', '2024-03-03 14:33:22'),
(197, 1, 20, 81, '2024-03-03', '2024-03-03', 'Dikembalikan', '2024-03-03 14:44:15'),
(198, 1, 20, 80, '2024-03-03', '2024-03-03', 'Dikembalikan', '2024-03-03 14:33:30'),
(199, 1, 20, 80, '2024-03-03', '2024-03-03', 'Dikembalikan', '2024-03-03 14:35:25'),
(200, 1, 20, 80, '2024-03-03', '2024-03-03', 'Dikembalikan', '2024-03-03 14:44:03'),
(201, 1, 20, 82, '2024-03-03', '2024-03-04', 'Dikembalikan', '2024-03-04 03:34:23'),
(202, 1, 20, 80, '2024-03-04', '2024-03-04', 'Dikembalikan', '2024-03-04 03:34:28'),
(203, 1, 20, 87, '2024-03-04', '2024-03-06', 'Dikembalikan', '2024-03-05 08:04:13'),
(204, 1, 20, 80, '2024-03-04', '2024-03-05', 'Dikembalikan', '2024-03-05 08:03:53'),
(205, 1, 35, 80, '2024-03-05', '2024-03-05', 'Dikembalikan', '2024-03-05 08:08:06');

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
(35, 1, 96, 'Sangat membantu pembelajaran di kelas', 5, '2024-03-02 13:06:15'),
(36, 1, 80, 'Sangat Bagus', 5, '2024-03-02 13:03:02'),
(37, 35, 80, 'Bagus banget', 5, '2024-03-02 13:46:54'),
(38, 20, 80, 'gg', 5, '2024-03-04 03:43:50'),
(39, 1, 98, 'Sangat seru', 5, '2024-03-05 07:59:40'),
(40, 35, 80, 'Keren banget ceritanya', 5, '2024-03-05 08:06:15');

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
(35, 1, 'prabusemar', '$2y$10$gt4WnyXuSDmO9b819ZYJXukXrrMNWId0bMdC5mVIEM4slRm7OAKwG', 'pribadi@gmail.com', 'Pribadi', 'bjr', 'peminjam', '2024-02-21 02:35:23'),
(39, 1, 'pelung', '$2y$10$C/OUneZOZnL34msb3LwpoeAHC/tlmr4wHLwa3kmR9Cgp3OEUrfqRG', 'radit@gmail.com', 'Raditya', 'Pintusinga', 'peminjam', '2024-03-05 07:47:08');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
