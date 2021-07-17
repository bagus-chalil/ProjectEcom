-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2021 at 05:11 PM
-- Server version: 10.2.39-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventtec_eventtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `author` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `date_created` int(11) NOT NULL,
  `tgl_blog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `tag_id`, `judul`, `author`, `slug`, `deskripsi`, `date_created`, `tgl_blog`, `gambar`) VALUES
(65, 1, '6 JENIS BAHASA PEMROGRAMAN TERPOPULER DI INDONESIA', 1, '6-jenis-bahasa-pemrograman-terpopuler-di-indonesia', '<p>sdsdsdsd</p>', 1624607328, '2021-06-16 07:48:00', '123.png'),
(66, 2, 'Webinar nasional Sandi Uno', 2, 'webinar-nasional-sandi-uno', '<p>zassacsacc</p>\r\n', 1624943097, '2021-06-27 05:16:00', 'sandiuno2.png'),
(67, 2, '“LECO (Learning College)” Inovasi Kegiatan Perkuliahan Kampus Merdeka Di Era Pandemi Covid-19 Berbasis Aplikasi Website', 1, 'leco-learning-college-inovasi-kegiatan-perkuliahan-kampus-merdeka-di-era-pandemi-covid-19-berbasis-aplikasi-website', '<p><strong>Leco</strong>, juga ditulis <strong>Leko</strong>, adalah <a href=\"https://id.wikipedia.org/wiki/Bahasa_isolat\" title=\"Bahasa isolat\">bahasa isolat</a> yang dituturkan oleh 20 sampai 40 orang di sebelah timur <a href=\"https://id.wikipedia.org/wiki/Danau_Titicaca\" title=\"Danau Titicaca\">Danau Titicaca</a>, <a href=\"https://id.wikipedia.org/wiki/Bolivia\" title=\"Bolivia\">Bolivia</a>. Bahasa ini awalnya dikira sudah lama punah. Saat ini terdapat kurang lebih 80 orang suku Leco.</p>\r\n', 1624943072, '2021-07-08 04:58:00', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(1, 'Webinar'),
(2, 'Lomba'),
(3, 'Workshop');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `author` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `kuota` int(5) NOT NULL,
  `tgl_event` datetime NOT NULL,
  `thumbs` varchar(128) DEFAULT NULL,
  `gambar` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_id`, `judul`, `category_id`, `deskripsi`, `author`, `date_created`, `harga`, `kuota`, `tgl_event`, `thumbs`, `gambar`, `status`) VALUES
(1, 'EVT07210001', 'Workshop GIT', 3, '<p>Workshop GIT</p>\r\n', 1, 1626499488, '10000', 15, '2021-07-17 11:55:00', '13.png', 'Pamflete5.png', 0),
(2, 'EVT07210002', 'Webinar Technopreneur', 1, '<p>Webinar Technopreneur</p>\r\n', 1, 1626498544, '5000', 80, '2021-07-31 09:00:00', 'Feed_Semnas(B)4.png', 'Poster modif 1.png', 0),
(3, 'EVT07210003', 'Webinar SI', 1, '<p>Webinar SI</p>\r\n', 1, 1626498874, '0', 55, '2021-07-17 12:12:00', 'Bg_Webinar.png', 'Poster.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventcode`
--

CREATE TABLE `eventcode` (
  `id` int(11) NOT NULL,
  `event_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcode`
--

INSERT INTO `eventcode` (`id`, `event_code`) VALUES
(1, 'EVT');

-- --------------------------------------------------------

--
-- Table structure for table `event_jual`
--

CREATE TABLE `event_jual` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_jual`
--

INSERT INTO `event_jual` (`id`, `id_event`, `kuota`) VALUES
(1, 4, 50),
(2, 4, 10);

--
-- Triggers `event_jual`
--
DELIMITER $$
CREATE TRIGGER `terjual_event` AFTER INSERT ON `event_jual` FOR EACH ROW BEGIN
	UPDATE event SET kuota=kuota-NEW.kuota
    WHERE id = NEW.id_event;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_midtrans`
--

CREATE TABLE `pembayaran_midtrans` (
  `id` int(11) NOT NULL,
  `event` varchar(20) NOT NULL,
  `status_code` varchar(3) NOT NULL,
  `status_message` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gross_amount` decimal(20,2) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `transaction_status` varchar(40) NOT NULL,
  `bank` varchar(40) NOT NULL,
  `va_number` varchar(40) NOT NULL,
  `fraud_status` varchar(40) NOT NULL,
  `bca_va_number` varchar(40) NOT NULL,
  `permata_va_number` varchar(40) NOT NULL,
  `pdf_url` varchar(200) NOT NULL,
  `finish_redirect_url` varchar(200) NOT NULL,
  `bill_key` varchar(20) NOT NULL,
  `biller_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_midtrans`
--

INSERT INTO `pembayaran_midtrans` (`id`, `event`, `status_code`, `status_message`, `transaction_id`, `order_id`, `nama`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `bank`, `va_number`, `fraud_status`, `bca_va_number`, `permata_va_number`, `pdf_url`, `finish_redirect_url`, `bill_key`, `biller_code`) VALUES
(2, 'EVT07210002', '201', 'Transaksi sedang diproses', '5e77d3ab-395c-4b6b-b491-eff8faa9168f', '511432208', 'Admin Event', 350000.00, 'bank_transfer', '2021-07-17 02:40:52', 'pending', 'bca', '13367131909', 'accept', '13367131909', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3d5a29b8-9785-485a-bd77-e8fca8bff07a/pdf', 'http://example.com?order_id=511432208&status_code=201&transaction_status=pending', '-', '-'),
(4, 'EVT07210001', '201', 'Transaksi sedang diproses', 'b141814b-af84-4fe2-a02c-3a572efc2764', '1365431841', 'Bagus Chalil', 10000.00, 'bank_transfer', '2021-07-17 15:53:24', 'settlement', 'bni', '9881336717262229', 'accept', '-', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/11fe8f23-d2d1-4f53-b692-ae92513374b2/pdf', 'http://example.com?order_id=1365431841&status_code=201&transaction_status=pending', '-', '-'),
(5, 'EVT07210002', '201', 'Transaksi sedang diproses', 'e9bac0bf-527a-419a-846e-387d553afa22', '2069364272', 'Admin Event', 5000.00, 'echannel', '2021-07-17 15:56:50', 'expire', '-', '-', 'accept', '-', '-', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c5d74130-453e-46ab-84bf-d567696cab89/pdf', 'http://example.com?order_id=2069364272&status_code=201&transaction_status=pending', '898402624966', '70012');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `nameplan` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `colorplan` varchar(50) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `offer` text NOT NULL,
  `not_offer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `nameplan`, `harga`, `colorplan`, `gambar`, `offer`, `not_offer`) VALUES
(1, 'Free Plan', '0', '#07d5c0', 'pricing-free1.png', '<p>Posting Poster 5x24 Jam</p>\r\n\r\n<p>Posting Poster Social Media Event Tech</p>\r\n', '<p>Platform Zoom Meetings</p>\r\n\r\n<p>E-Ticket event</p>\r\n\r\n<p>Sertifikat Event</p>\r\n\r\n<p>Live Streaming</p>\r\n'),
(2, 'Starter Plan', '500', '#65c600', 'pricing-starter.png', '<p>Posting Poster 6x24 Jam</p>\r\n\r\n<p>Posting Poster Social Media Event Tech</p>\r\n', '<p>Platform Zoom Meetings</p>\r\n\r\n<p>E-Ticket event</p>\r\n\r\n<p>Sertifikat Event</p>\r\n\r\n<p>Live Streaming</p>\r\n'),
(3, 'Business Plan', '100', '#ff901c', 'pricing-business.png', '<p>Posting Poster 7x24 Jam</p>\r\n\r\n<p>Posting Poster Social Media Event Tech</p>\r\n\r\n<p>Platform Zoom Meetings</p>\r\n\r\n<p>E-Ticket event</p>\r\n', '<p>Sertifikat Event</p>\r\n\r\n<p>Live Streaming</p>\r\n'),
(4, 'Ultimate Plan', '500', '#ff0071', 'pricing-ultimate.png', '<p>Posting Poster Full time</p>\r\n\r\n<p>Posting Poster Social Media Event Tech</p>\r\n\r\n<p>Platform Zoom Meetings</p>\r\n\r\n<p>E-Ticket event</p>\r\n\r\n<p>Sertifikat Event</p>\r\n\r\n<p>Live Streaming</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tags_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tags_name`) VALUES
(1, 'Teknologi'),
(2, 'Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `desk` text NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `penyelenggara`, `desk`, `gambar`) VALUES
(1, 'HMDTI Udinus', 'mantab pokoknya pakai event tech terus maju mantebbbbbbbbbbbb', 'hmdti.png'),
(4, 'HM Ubuntu', '<p>sangat mudah dan bagus dan membantu penjualan tiket event</p>', 'Ubuntu-Logo1.png'),
(6, 'HM Windows 11', '<p class=\"MsoNormal\">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam, quam? Soluta, provident ut?</p>', 'Windows-11-Logo-Featured1.png'),
(7, 'HM Apple', '<p class=\"MsoNormal\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque maiores hic veritatis tempora! Nihil alias cum commodi eos qui. Eum?</p>', 'appple.jpg'),
(8, 'HM Debian', 'Kualitas baik dengan harga bersahabat', 'debina.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telephone`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin Event', 'admin@event.com', '087825178901', 'user2.jpg', '$2y$10$dgcNn2LRAAnxasR/3PNX6uaPTUNNEMYjivNaaNYRGY8cV/ANRKsdW', 1, 1, 1624938875),
(2, 'bagus', 'bagus@gmail.com', '1231313', 'default.jpg', '$2y$10$AX0p.6Ekuqgcfb4dVkKMeO.jcLJ50nQtAh6MC7blfPEkVrT4gOoIG', 2, 1, 1624939048),
(3, 'M Bagus Chalil A', 'bagus.chalil@gmail.com', '982173', 'default.jpg', '$2y$10$qHZ6O7VCysQZUtqr.B7iMObjfGqXxt2Ddn44nX2BCytSReCKlGEoy', 3, 1, 1625027292),
(15, 'bagus akbar', 'bagusakbar482@gmail.com', NULL, 'default.jpg', '$2y$10$ja5gi3XMlShr2EJV2tIJc.l5oYPuAAcZBCvVoZJHk9fY9HED9aVOS', 2, 0, 1626440970),
(26, 'catur', 'udinuscatur@gmail.com', NULL, 'default.jpg', '$2y$10$WTJmkOGY/G3TtLUqoodnI.p38mn52I9n0RwiClCAWjE.gJGgpcUxC', 3, 0, 1626448446),
(27, 'Aditya', 'adityaajinug@gmail.com', NULL, 'default.jpg', '$2y$10$OHF0YCebQzeRvnHDuiJMsuYmBHwuuFMq3C0uV0SJIUoftVgL12heO', 3, 1, 1626448498),
(28, 'Jsisjs', 'bdhsh@jsjs.com', NULL, 'default.jpg', '$2y$10$62LK8Cjg/sbisV.LEa2fFO7em9Hzv.MnY9/Q9w1/JN4OHJxXJCO6.', 3, 0, 1626465561),
(34, 'Adit nug', 'adityaajinug31@gmail.com', NULL, 'default.jpg', '$2y$10$z4vYbrwNIXnniPcAOY2EpuIbM5pb/Zc189S5fUgZfeIvioeQZjM7e', 3, 0, 1626501668);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 5),
(8, 1, 3),
(9, 1, 2),
(11, 1, 6),
(12, 1, 7),
(13, 1, 5),
(14, 1, 4),
(15, 2, 2),
(16, 2, 6),
(18, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Event'),
(3, 'Pembayaran'),
(4, 'Kategori'),
(5, 'Blog'),
(6, 'Users'),
(7, 'Tools'),
(8, 'Testimoni');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Tabel Event', 'event/view_tabel', 'fas fa-fw fa-th-list', 1),
(3, 3, 'Tabel Pembayaran', 'pembayaran', 'fas fa-fw fa-th', 1),
(4, 3, 'Verifikasi ', 'Transaction ', 'fas fa-fw fa-credit-card', 1),
(5, 5, 'Write Blog', 'blog', 'fab fa-fw fa-blogger', 1),
(6, 6, 'Profil', 'profil', 'fas fa-fw fa-user', 1),
(17, 7, 'Menu Management', 'tools', 'fas fa-fw fa-tag', 1),
(18, 7, 'Sub Menu', 'tools/submenu', 'fas fa-fw fa-tags', 1),
(19, 6, 'Change Password', 'profil/changepassword', 'fas fa-fw fa-key', 1),
(20, 6, 'Edit Profil', 'profil/edit', 'fas fa-fw fa-user-times', 1),
(22, 1, 'Role User', 'admin/role', 'fas fa-fw fa-user-plus', 1),
(23, 2, 'Upload Event', 'event', 'fas fa-fw fa-upload', 1),
(24, 4, 'Kategori Event', 'kategori', 'fas fa-fw fa-folder-open', 1),
(25, 4, 'Buat Kategori', 'kategori/add_kategori', 'fas fa-fw fa-pencil-alt', 0),
(26, 1, 'Data Pengguna', 'admin/pengguna', 'fas fa-fw fa-users', 1),
(27, 4, 'Price List', 'kategori/pricelist', 'fas fa-fw fa-list-ul', 1),
(28, 5, 'Upload Blog', 'blog/tambah_blog', 'fas fa-fw fa-upload', 1),
(29, 4, 'Tags Blog', 'kategori/view_tags', 'fas fa-fw fa-hashtag', 1),
(30, 3, 'Midtrans', 'snap', 'fas fa-fw fa-money-bill-alt', 1),
(31, 8, 'Lihat Testimoni', 'testimoni', 'fas fa-fw fa-star', 1),
(32, 8, 'Tambah Testimoni', 'testimoni/tambah', 'fas fa-fw fa-upload', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'adityaajinug31@gmail.com', '8b335f382e0ea49129caad29e7123aa5ea639bb3702c5998461f2245deb37473', 1626501073),
(2, 'adityaajinug31@gmail.com', 'c544160b876a2b7dab89862c18bfae411a8f2c1ed650bd442c1794fe56ccd8fc', 1626501250),
(3, 'adityaajinug31@gmail.com', 'bd5a3495429b18a15b0794cab096c3da011a9be0b37c481f1b8cc3894d384890', 1626501373),
(4, 'adityaajinug31@gmail.com', '57af53036e7d33849342a175f1e84c3b09e4ec6d89a407843ab3791e462a8fe2', 1626501445),
(5, 'adityaajinug31@gmail.com', 'ac496ba18176bba528339f8cd166ac296e1c20cb29f410a4388f7b7df862083c', 1626501538),
(6, 'adityaajinug31@gmail.com', '4305fec85b9621362ae9ea47a8459c827a30a0139e8ecc4cde3f54de14b9dbfe', 1626501668),
(7, 'bagus@gmail.com', '8f6a08aee57464e94eb5661e35af057acc563462a429d22f8a2b9e4cef179c3a', 1626503657);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventcode`
--
ALTER TABLE `eventcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_jual`
--
ALTER TABLE `event_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_midtrans`
--
ALTER TABLE `pembayaran_midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventcode`
--
ALTER TABLE `eventcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_jual`
--
ALTER TABLE `event_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_midtrans`
--
ALTER TABLE `pembayaran_midtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
