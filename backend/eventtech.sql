-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2021 at 03:44 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `author` varchar(128) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `date_created` int(11) NOT NULL,
  `tgl_blog` timestamp NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `tag_id`, `judul`, `author`, `slug`, `deskripsi`, `date_created`, `tgl_blog`, `gambar`) VALUES
(65, 1, '6 JENIS BAHASA PEMROGRAMAN TERPOPULER DI INDONESIA', 'Admin Event', '6-jenis-bahasa-pemrograman-terpopuler-di-indonesia', '<p>sdsdsdsd</p>', 1624607328, '2021-06-16 07:48:00', '123.png'),
(66, 1, 'Webinar nasional Sandi Uno', 'Admin Event', 'webinar-nasional-sandi-uno', '<p>zassacsacc</p>', 1624677701, '2021-06-27 05:16:00', 'sandiuno2.png');

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
(3, 'Lomba'),
(5, 'Workhsop');

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
  `gambar` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_id`, `judul`, `category_id`, `deskripsi`, `author`, `date_created`, `harga`, `kuota`, `tgl_event`, `gambar`, `status`) VALUES
(1, 'wbr_01', '“LECO (Learning College)” Inovasi Kegiatan Perkuliahan Kampus Merdeka Di Era Pandemi Covid-19 Berbasis Aplikasi Website', 1, '<p>Ini Seru Loh</p>', 1, 1624429841, '100', 100, '2021-06-25 10:34:00', '13.jpg', 0),
(2, 'wbr_02', 'Semnas Technopreneur', 1, '<p>Semnas yang pastinya seru</p>', 2, 1624452686, '1000', 100, '2021-06-26 23:50:00', 'Poster.png', 0),
(3, 'lmb_01', 'Lomba 17 Agustus', 1, '<p>Memperingati HUT RI 76 Tahun</p>', 1, 1624470079, '15000', 21, '2021-08-17 19:51:00', 'universitas-dian-nuswantoro-udinus-semarang-logo-NDA2OQ.png', 0),
(4, 'wbr_03', 'Workshop GIT', 5, '<p>ashjdghjagdhjsagdjhagdhjsagjdhjsad</p>', 2, 1624577341, '10000', 100, '2021-07-03 20:40:00', 'Pamflete.png', 0),
(5, 'wrk_890', 'HMDTI Goes to School', 5, '<p>sdsd</p>', 2, 1624577322, '200000', 100, '2021-06-25 06:24:00', '1.png', 0),
(9, 'Wrk_555', 'tekno lomba', 3, '<p>sdasdsadsadsa</p>\r\n', 3, 1624893670, '2111', 20, '2021-06-30 22:19:00', 'download_(3)1.jpg', 0),
(14, 'Wbr_2224', 'Webinar Asik', 1, '<p>sdsadsadsadsadsadsad</p>\r\n', 14, 1624894579, '100', 17, '2021-06-28 22:35:00', 'wallpaperflare_com_wallpaper_(1).jpg', 0);

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
(3, 'Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin Event', 'admin@event.com', 'default.jpg', '$2y$10$jgFIdSVkUPUhwVi2X0ZoTOsiulfd75cKDDob/N6ZxXHhvcruvlnKe', 1, 1, 1624183377),
(2, 'Bagus Akbar', 'bagus@gmail.com', '1.jpg', '$2y$10$0ZL7cYGi.ZVj0tZFpsNpJebY.Fsz75CHEbs5weB6BzXQXcl09F01y', 2, 1, 1624278635),
(3, 'bagus chalil', 'bagus@yahoo.com', 'default.jpg', '$2y$10$hhvZhOz1THVq6znGmZlaqOvuDx7rnkuJ1yTIgsLmwDLtz.gIGNqeu', 2, 1, 1624328408),
(7, 'M Bagus Chalil Akbar', 'bagus.chalil@gmail.com', 'user1.jpg', '$2y$10$4GqZLshxCXIdWr.6IUz2HukuFu76dCfGXozh4EDZLfjRVAZxOimkq', 2, 1, 1624362209),
(13, 'Adit', 'adityaajinug31@gmail.com', 'default.jpg', '$2y$10$/Be78EWalywI/IjHwVBL6uJc2VtFxMv1vlioHYS7qdADsXZY8gs8a', 2, 0, 1624782405),
(14, 'Aditya Ajie Nugroho', 'adityaajinug@gmail.com', 'default.jpg', '$2y$10$6kTqz1lDzhngA8A0984QxeKF4RcOoBW0iFtLHTLA212GxKl2ZYLTO', 2, 1, 1624893822);

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
(15, 2, 2);

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
(7, 'Tools');

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
(1, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Tabel Event', 'Event/view_tabel', 'fas fa-fw fa-th-list', 1),
(3, 3, 'Tabel Pembayaran', 'Pembayaran', 'fas fa-fw fa-list-ol', 1),
(4, 3, 'Verifikasi ', 'Pembayaran/konfirmasi', 'fas fa-fw fa-credit-card', 1),
(5, 5, 'Write Blog', 'Blog', 'fab fa-fw fa-blogger', 1),
(6, 6, 'Profil', 'profil', 'fas fa-fw fa-user', 1),
(17, 7, 'Menu Management', 'tools', 'fas fa-fw fa-tag', 1),
(18, 7, 'Sub Menu', 'tools/submenu', 'fas fa-fw fa-tags', 1),
(19, 6, 'Change Password', 'profil/changepassword', 'fas fa-fw fa-key', 1),
(20, 6, 'Edit Profil', 'profil/edit', 'fas fa-fw fa-user-times', 1),
(22, 1, 'Role User', 'Admin/role', 'fas fa-fw fa-user', 1),
(23, 2, 'Upload Event', 'Event', 'fas fa-fw fa-upload', 1),
(24, 4, 'Kategori Event', 'kategori', 'fas fa-fw fa-folder-open', 1),
(25, 4, 'Buat Kategori', 'Kategori/add_kategori', 'fas fa-fw fa-pencil-alt', 0),
(26, 1, 'Data Pengguna', 'admin/datapengguna', 'fas fa-fw fa-users', 1),
(27, 4, 'Price List', 'kategori/pricelist', 'fas fa-fw fa-list-ul', 1),
(28, 5, 'Upload Blog', 'blog/tambah_blog', 'fas fa-fw fa-upload', 1),
(29, 4, 'Tags Blog', 'kategori/view_tags', 'fas fa-fw fa-hashtag', 1);

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
(1, 'bagus.chalil@gmail.com', 'fb38e5b3f44aa0b2e34946f2376bfdf2254166d5614b58f0b2d26dfea0f810be', 1624365988),
(2, 'bagus.chalil@gmail.com', '6cf518936dd481e32fe49a0dee9186ef545be2aeb91c63f9ecffdb813408fb67', 1624366083),
(3, 'bagus.chalil@gmail.com', '45dd0fda3ef03212a1ee63ef0fb8c38fd188d2615251f34c92ff2bbaa231e02f', 1624366249),
(4, 'bagus.chalil@gmail.com', '901a532ca464e32a4a4ca1a20b19d0a05e3144f2ec685265955d93a2332d25cc', 1624366286),
(5, 'bagus.chalil@gmail.com', 'b62fe3a326e13ffc6891d7c389e8ce7feb4481a042fcddd55c6f77a06dc1772b', 1624366482),
(6, 'bagus.chalil@gmail.com', '35f8812fca960252ec4faac391dd5cd0bdf7e34a5bcdee3b33e7a53082cdbf41', 1624367243),
(7, 'bagus.chalil@gmail.com', '97d7d38ade8f9780b5a52e9bdbb2daf13663afc3c1df7eeed324e41a5de1a4ca', 1624367420),
(9, 'adityaajinug31@gmail.com', '29860a44563605e3d6354d9d5b6d9248018d0c6cf6b018a7516c903e2f78f9c3', 1624782405);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_id` (`event_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
