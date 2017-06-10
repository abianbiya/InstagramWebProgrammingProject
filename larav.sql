-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 10:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `larav`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_menu`
--

CREATE TABLE IF NOT EXISTS `group_menu` (
  `id_group_menu` int(11) NOT NULL,
  `nm_group_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_menu`
--

INSERT INTO `group_menu` (`id_group_menu`, `nm_group_menu`) VALUES
(0, 'Admin'),
(1, 'Root');

-- --------------------------------------------------------

--
-- Table structure for table `kewenangan_menu`
--

CREATE TABLE IF NOT EXISTS `kewenangan_menu` (
  `id_menu` int(11) NOT NULL,
  `id_peran` int(11) NOT NULL,
  `is_create` int(1) NOT NULL,
  `is_read` int(1) NOT NULL,
  `is_update` int(1) NOT NULL,
  `is_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kewenangan_menu`
--

INSERT INTO `kewenangan_menu` (`id_menu`, `id_peran`, `is_create`, `is_read`, `is_update`, `is_delete`) VALUES
(0, 1, 0, 1, 0, 1),
(0, 2, 1, 1, 1, 0),
(1, 1, 1, 1, 1, 0),
(1, 2, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kewenangan_user`
--

CREATE TABLE IF NOT EXISTS `kewenangan_user` (
  `id_user` int(11) NOT NULL,
  `id_peran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kewenangan_user`
--

INSERT INTO `kewenangan_user` (`id_user`, `id_peran`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id_list` int(11) NOT NULL,
  `desc_list` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `done` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(22) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id_list`, `desc_list`, `deadline`, `done`, `created_at`, `updated_at`) VALUES
(1, 'Belajar untuk UTS Algoritma genetika', '2017-04-18', 1, '2017-04-17 00:00:00', NULL),
(2, 'membaca buku', '2017-04-18', 1, NULL, '2017-04-18 09:13:23 am'),
(3, 'Membeli Buku Logika Fuzzy', '2017-04-19', 0, NULL, NULL),
(4, 'Membaca buku Teknik Informatika', '2017-04-19', 0, NULL, NULL),
(5, 'Memasak', '2017-04-18', 1, NULL, '2017-04-18 09:17:48 am'),
(6, 'Menyiapkan peralatan muncak', '2017-04-18', 1, NULL, '2017-04-18 09:19:41 am'),
(7, 'Membuat Bab I Proposal Skripsi', '2017-04-18', 0, NULL, NULL),
(8, 'beres beres rumah', '2017-04-19', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL DEFAULT '0',
  `nm_menu` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `id_group_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nm_menu`, `route`, `id_group_menu`) VALUES
(0, 'Menu Admin', 'menu.admin', 0),
(1, 'Menu Root', 'menu.root', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peran`
--

CREATE TABLE IF NOT EXISTS `peran` (
  `id_peran` int(11) NOT NULL,
  `nm_peran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peran`
--

INSERT INTO `peran` (`id_peran`, `nm_peran`) VALUES
(1, 'root'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'afit lilis', 'afitdamayanti@gmail.com', '$2y$10$VUhy2E5k//dHBM4Lx.F0Ce1mCUZLrofwe7mjQC5NP8VdgdD8iaYP2', '9JNj0qJxpwbv9gXkGz00M9aEl3KQNeS64DcS58MJQTiBJTJ7CTLdiQpH9YYk', '2017-04-25 18:08:59', '2017-04-25 18:08:59'),
(2, 'admin', 'admin@mail.com', '$2y$10$HrCBgSAn.JYjxtYorfhTNex3/GkOG8LBCf/3IOidoANeF/G8Yf6em', NULL, '2017-04-30 18:39:33', '2017-04-30 18:39:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_menu`
--
ALTER TABLE `group_menu`
  ADD PRIMARY KEY (`id_group_menu`);

--
-- Indexes for table `kewenangan_menu`
--
ALTER TABLE `kewenangan_menu`
  ADD PRIMARY KEY (`id_menu`,`id_peran`);

--
-- Indexes for table `kewenangan_user`
--
ALTER TABLE `kewenangan_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`id_peran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
