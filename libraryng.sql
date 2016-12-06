-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Apr 2016 pada 08.58
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `username` varchar(64) NOT NULL COMMENT 'Username',
  `password` varchar(64) NOT NULL COMMENT 'Password',
  `last_login` datetime DEFAULT NULL COMMENT 'Last Login'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'aditya123', '$2y$13$/nM3F.l7dTArhDnqOH8Ph.MFsCcraTDPX4jqZS96kHgPiOsU4a0he', NULL),
(2, 'louis123', '$2y$13$/nM3F.l7dTArhDnqOH8Ph.MFsCcraTDPX4jqZS96kHgPiOsU4a0he', NULL),
(3, 'bona123', '$2y$13$fB8OVHvAjIYqusARWEs1rOZ6fMj8MLpXUoYbujOL9H7pah56SjoEe', NULL),
(5, 'devi123', '$2y$13$g217zJ.JGL6xmj3ek7.AiOsXd4gKkX3BPb0mWWeIpCPwwXeMkCmXW', NULL),
(6, 'bernike123', '$2y$13$yUeqaW14TeLYikPj8BHQUeIzAJ58IaYO6oAVbgk.Cx2K9dymJ/Y..', NULL),
(7, 'vico123', '$2y$13$6Y2tTV03wBzOFW87qPodduFcGApDuzCG7mPo42HgKQFb5GQkjS59C', NULL),
(23, 'member123', '$2y$13$Fq3G10jjMyTWHVEf2D9uguR84MYDLXN6ZjZVoRRsoNoBz2IZbmihq', NULL),
(24, 'admin123', '$2y$13$77gvJgGuvlq0iqUdgOS.euWDEfpVP0fWvTIVBMy/Iv/8ez4..wd3q', NULL),
(25, 'staff123', '$2y$13$jxmjFHZjR87sS6tv8UhpPuVXAHFhlVS8cCHt3Tm8ymA.hd3CLWila', NULL),
(26, 'Tupperware123', '$2y$13$zIzonaUqdl5HjoWb0BSHAOvcPVIYdYFfpGSIVv.qYNSMrBWD/S6mS', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `author`
--

CREATE TABLE `author` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `first_name` varchar(64) NOT NULL COMMENT 'First Name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Last Name',
  `email` varchar(128) DEFAULT NULL COMMENT 'E-mail'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Paul', 'Creswick', 'Paul_Creswick@author.com'),
(2, ' Umar Kayam', '', ' Umar_Kayam@author.com'),
(3, 'Serdar', 'Ozkan', 'Serdar@serdar.com'),
(4, 'Eiji', 'Yoshikawa', 'Eiji_Yoshikawa@gmail.com'),
(5, 'Seno Gumira', 'Ajidarma', 'Seno Gumira@Seno Gumira.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '1', 1451141273),
('administrator', '24', NULL),
('member', '23', NULL),
('member', '26', NULL),
('member', '3', NULL),
('member', '5', NULL),
('member', '6', NULL),
('member', '7', NULL),
('staff', '2', NULL),
('staff', '25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin_book', 2, '', NULL, '', NULL, NULL),
('admin_publisher', 2, '', NULL, '', NULL, NULL),
('administrator', 2, NULL, NULL, NULL, NULL, NULL),
('browse', 2, NULL, NULL, NULL, 1451141272, 1451141272),
('create_book', 2, '', NULL, '', NULL, NULL),
('create_publisher', 2, '', NULL, '', NULL, NULL),
('delete_book', 2, '', NULL, '', NULL, NULL),
('delete_publisher', 2, '', NULL, '', NULL, NULL),
('guest', 2, NULL, NULL, NULL, 1451141272, 1451141272),
('list_author', 2, 'list_author', NULL, NULL, 1451141272, 1451141272),
('list_book', 2, 'list_book', NULL, NULL, 1451141272, 1451141272),
('login', 2, 'login', NULL, NULL, 1451141271, 1451141271),
('manage_book', 2, '', NULL, '', NULL, NULL),
('manage_publisher', 2, '', NULL, '', NULL, NULL),
('member', 1, NULL, NULL, NULL, 1451141272, 1451141272),
('register', 2, 'Register', NULL, NULL, 1451141272, 1451141272),
('staff', 2, NULL, NULL, NULL, NULL, NULL),
('update_book', 2, '', NULL, '', NULL, NULL),
('update_profile', 2, 'update_profile', NULL, NULL, 1451141272, 1451141272),
('update_publisher', 2, '', NULL, '', NULL, NULL),
('view_author', 2, 'view_author', NULL, NULL, 1451141272, 1451141272),
('view_book', 2, 'view_book', NULL, NULL, 1451141272, 1451141272);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('administrator', 'staff'),
('browse', 'list_author'),
('browse', 'list_book'),
('browse', 'view_author'),
('browse', 'view_book'),
('guest', 'login'),
('guest', 'register'),
('manage_book', 'admin_book'),
('manage_book', 'create_book'),
('manage_book', 'delete_book'),
('manage_book', 'update_book'),
('manage_publisher', 'admin_publisher'),
('manage_publisher', 'create_publisher'),
('manage_publisher', 'delete_publisher'),
('manage_publisher', 'update_publisher'),
('member', 'browse'),
('member', 'update_profile'),
('staff', 'manage_book'),
('staff', 'manage_publisher'),
('staff', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `author_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Author ID',
  `publisher_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Publisher ID',
  `isbn` varchar(16) DEFAULT NULL COMMENT 'ISBN',
  `title` varchar(64) DEFAULT NULL COMMENT 'Title',
  `year` char(4) DEFAULT NULL COMMENT 'Year',
  `description` text COMMENT 'Description',
  `photo` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `author_id`, `publisher_id`, `isbn`, `title`, `year`, `description`, `photo`) VALUES
(1, 1, 1, '9789792763379', 'ROBIN HOOD – Kisah Legendaris Penguasa Sherwood', '2010', 'Robin Hood adalah salah satu kisah rakyat di Inggris Raya yang paling banyak ditulis ulang dalam berbagai versi dan diadaptasi menjadi bentuk drama atau film layar lebar. Kisah klasik ini sendiri menjadi begitu tenar dengan mengangkat ikon ‘sang pahlawan pencuri’ dengan tindakannya (yang kadang menjadi perdebatan) mencuri untuk kemudian hasilnya dibagi-bagikan kepada rakyat miskin.\r\n', 'uploads/books/7001.jpg'),
(2, 2, 2, '979-444-186-4', 'Para Priyayi', '1992', 'Berasal dari keluarga buruh tani Soedarsono oleh orang tua dan sanak saudara diharapkan dapat menjadi “sang pemula” untuk membangun dinasti keluarga priyayi kecil. Berkat dorongan Asisten Wedono Ndoro Seten ia bisa sekolah dan kemudian menjadi guru desa. Dari sinilah ia memasuki dunia elite birokrasi sebagai priyayi pangreh praja. Ketiga anak melewati zaman Belanda dan zaman Jepang tumbuh sebagai guru opsir Peta dan istri asisten wedana. Cita-cita keluarga berhasil', 'uploads/books/4802.jpg'),
(3, 3, 2, '0812312312312', 'The Missing Rose ( Mawar yang Hilang)', '2015', 'Diana adalah wanita muda yang cerdas dan cantik, dan memiliki segalanya, namun tidak bahagia, karena kebutuhannya untuk mendapatkan persetujuan dan pujian dari orang-orang lain, telah membuatnya tak bisa menjadi diri sendiri.\r\nKetika ibunya menjelang ajal, Diana baru mengetahui bahwa dia mempunyai saudari kembar bernama Mary. Sang ibu mengatakan Mary sedang dalam bahaya, dan Diana harus menemukan dan menyelamatkannya.', 'uploads/books/9703.jpg'),
(4, 4, 2, '979-655-603-0', 'Musashi', '2001', 'Miyamoto Musashi adalah anak desa yang bercita-cita menjadi samurai sejati. Di tahun 1600 yang penuh pergolakan itu, ia menceburkan diri ke dalam Pertempuran Sekigahara, tanpa menyadari betul apa yang diperbuatnya. Setelah pertempuran berakhir, ia mendapati dirinya terbaring kalah dan terluka di tengah ribuan mayat yang bergelimpangan.', 'uploads/books/1804.jpg'),
(5, 5, 3, '9794120901', 'Manusia Kamar (kumpulan Cerpen)', '1998', 'Manusia Kamar adalah kumpulan cerpen karya Seno Gumira Ajidarma.', 'uploads/books/6805.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_copy`
--

CREATE TABLE `book_copy` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `book_id` int(10) UNSIGNED NOT NULL COMMENT 'Book ID',
  `call_number` varchar(16) NOT NULL COMMENT 'Call Number',
  `year` char(4) DEFAULT NULL COMMENT 'Year',
  `availability` tinyint(1) DEFAULT '0' COMMENT 'Availability',
  `loanable` tinyint(1) DEFAULT '0' COMMENT 'Loanable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_copy`
--

INSERT INTO `book_copy` (`id`, `book_id`, `call_number`, `year`, `availability`, `loanable`) VALUES
(1, 1, '0812222222', '2015', 1, 1),
(2, 2, '082169271363', '2016', 1, 1),
(3, 2, '082124512', '2015', 1, 1),
(4, 1, '0824567890', '2015', 1, 1),
(5, 1, '082168271363', '2015', 1, 1),
(6, 1, '2015109213120', '2015', 1, 1),
(7, 2, '12312312', '2015', 1, 1),
(8, 2, '2102312', '2015', 1, 1),
(9, 3, '20151231231', '2015', 1, 1),
(10, 3, '201512312312', '2015', 1, 1),
(11, 3, '20151231239', '2015', 1, 1),
(12, 3, '20151231210', '2015', 1, 1),
(13, 4, '20150123120', '2015', 1, 1),
(14, 4, '20150111120', '2015', 1, 1),
(15, 4, '20120111120', '2015', 1, 1),
(16, 4, '20120191120', '2015', 1, 1),
(17, 5, '081231231231', '2015', 1, 1),
(18, 5, '081231230231', '2015', 1, 1),
(19, 5, '088231230231', '2015', 1, 1),
(20, 5, '188231230231', '2015', 1, 1),
(21, 5, '188231230232', '2015', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `loan`
--

CREATE TABLE `loan` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `copy_id` int(10) UNSIGNED NOT NULL COMMENT 'Copy ID',
  `borrower_id` int(10) UNSIGNED NOT NULL COMMENT 'Borrower ID',
  `staff_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Staff ID',
  `start_date` date NOT NULL COMMENT 'Start Date',
  `due_date` date DEFAULT NULL COMMENT 'Due Date',
  `return_date` date DEFAULT NULL COMMENT 'Due Date',
  `fines` float(5,2) DEFAULT '0.00' COMMENT 'Fines'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loan`
--

INSERT INTO `loan` (`id`, `copy_id`, `borrower_id`, `staff_id`, `start_date`, `due_date`, `return_date`, `fines`) VALUES
(1, 1, 1, 1, '2016-01-08', '2016-01-07', '2016-01-08', 200.00),
(3, 1, 1, 1, '2016-01-08', '2016-01-07', '2016-01-08', 200.00),
(4, 2, 1, 1, '2016-01-08', '2016-01-05', '2016-01-08', 600.00),
(5, 1, 1, NULL, '0000-00-00', '0000-00-00', NULL, 0.00),
(6, 1, 1, 1, '2016-01-08', '2016-01-06', '2016-01-10', 800.00),
(7, 2, 1, NULL, '0000-00-00', '0000-00-00', NULL, 0.00),
(8, 2, 3, 2, '2016-01-10', '2016-01-11', '2016-01-22', 999.99),
(9, 1, 5, NULL, '0000-00-00', '0000-00-00', NULL, 0.00),
(13, 1, 14, 15, '2016-01-12', '2016-01-15', '2016-01-12', 0.00),
(14, 3, 14, 15, '2016-01-12', '2016-01-12', '2016-01-12', 0.00),
(15, 20, 14, 15, '2016-01-12', '2016-01-12', '2016-01-22', 999.99),
(16, 15, 14, 2, '2016-01-12', '2016-01-15', '2016-01-22', 999.99),
(17, 1, 15, 15, '2016-01-22', '2016-01-25', '2016-01-22', 0.00),
(18, 1, 15, NULL, '0000-00-00', '0000-00-00', NULL, 0.00),
(19, 1, 16, NULL, '0000-00-00', '0000-00-00', NULL, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `account_id` int(10) UNSIGNED NOT NULL COMMENT 'Account ID',
  `first_name` varchar(64) NOT NULL COMMENT 'First Name',
  `last_name` varchar(64) DEFAULT NULL COMMENT 'Last Name',
  `email` varchar(128) DEFAULT NULL COMMENT 'E-mail',
  `address` varchar(128) DEFAULT NULL COMMENT 'Address',
  `photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `account_id`, `first_name`, `last_name`, `email`, `address`, `photo`) VALUES
(1, 1, 'Aditya Pranata Siregar', 'Siregar', 'siregaraditya@gmail.com', 'Jln Melanthon Siregar No:102 Pematangsiantar', NULL),
(2, 2, 'Louis Onike', 'Munthe', 'if314051@students.del.ac.id', 'Jln ', NULL),
(3, 3, 'Bona Juliana Manullang', 'Manullang', 'Bona@gmail.com', 'Jln', NULL),
(5, 5, 'Devi Stephanie', 'Sihombing', 'devi@gmail.com', 'Jln', NULL),
(6, 6, 'Bernike', 'Sitanggang', 'if314057@students.del.ac.id', 'Jln', NULL),
(7, 7, 'Viko Andrian', 'Manurung', 'Vico@students.del.ac.id', 'Gg Pd', NULL),
(14, 23, 'Member', '', 'Member@123.com', 'Jlan Sisingamangaraja', NULL),
(15, 24, 'Admin', '', 'Admin123@gmail.com', 'Admin', NULL),
(16, 25, 'staff', '', 'staff@del.ac.id', '', NULL),
(17, 26, 'Tupperware', '', 'Tupperware@gmail.com', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1451141205),
('m130524_201442_init', 1452498292),
('m140506_102106_rbac_init', 1451141236);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `ID_Kelompok` int(11) NOT NULL,
  `ID_Kategori` int(11) NOT NULL,
  `Keterangan` varchar(5000) DEFAULT NULL,
  `Abstrak` varchar(2000) DEFAULT NULL,
  `Tahun_Pembuatan` year(4) NOT NULL,
  `File_Location` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publisher`
--

CREATE TABLE `publisher` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `name` varchar(64) NOT NULL COMMENT 'Name',
  `email` varchar(128) DEFAULT NULL COMMENT 'E-mail',
  `address` varchar(128) DEFAULT NULL COMMENT 'Address',
  `phone` varchar(16) DEFAULT NULL COMMENT 'Phone'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Elex Media Komputindo', 'Elex_Media_Komputindo@publisher.com', 'Elex Media Komputindo', '081231231291'),
(2, 'Pustaka Utama Grafiti', 'Pustaka_Utama_Grafiti@publisher.com', 'Pustaka Utama Grafiti Tahun 1992', '0827123222'),
(3, 'CV Haji Masagung', 'CVHaji@Masagung1.988', 'CV Haji Masagung 1988', '092123123'),
(4, 'Gramedia Pustaka Utama', 'GramediaPustakaUtama@GramediaPustakaUtama.com', 'Gramedia Pustaka Utama', '021312312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `item_name` (`item_name`),
  ADD KEY `item_name_2` (`item_name`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_ref_author` (`author_id`),
  ADD KEY `book_ref_publisher` (`publisher_id`);

--
-- Indexes for table `book_copy`
--
ALTER TABLE `book_copy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `copy_ref_book` (`book_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_ref_borrower` (`borrower_id`),
  ADD KEY `loan_ref_staff` (`staff_id`),
  ADD KEY `loan_ref_copy` (`copy_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_ref_account` (`account_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`ID`,`ID_Kelompok`,`ID_Kategori`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book_copy`
--
ALTER TABLE `book_copy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ref_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_ref_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`);

--
-- Ketidakleluasaan untuk tabel `book_copy`
--
ALTER TABLE `book_copy`
  ADD CONSTRAINT `copy_ref_book` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Ketidakleluasaan untuk tabel `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ref_borrower` FOREIGN KEY (`borrower_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `loan_ref_copy` FOREIGN KEY (`copy_id`) REFERENCES `book_copy` (`id`),
  ADD CONSTRAINT `loan_ref_staff` FOREIGN KEY (`staff_id`) REFERENCES `member` (`id`);

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ref_account` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
