-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2024 at 07:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifetivity`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int NOT NULL,
  `judul_catatan` varchar(255) DEFAULT NULL,
  `isi_catatan` text,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `judul_catatan`, `isi_catatan`, `id_user`) VALUES
(8, 'Catatan List Media Pembelajaran untuk programing pemula', 'hkhj', 2),
(28, 'asd', 'asd', 9),
(29, 'Kerja Kelompok ', 'Tugas PBL', 10),
(31, 'test', 'test', 9),
(32, 'Acara', 'Acraa', 15),
(33, 'd', 'd', 9),
(34, 'asd', 'asd', 9),
(35, 'rapip spotify', 'ga tau', 18),
(36, 'asd', 'asd', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `judul_jadwal` varchar(255) DEFAULT NULL,
  `isi_jadwal` text,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_pengingat` time DEFAULT NULL,
  `senin` tinyint(1) DEFAULT NULL,
  `selasa` tinyint(1) DEFAULT NULL,
  `rabu` tinyint(1) DEFAULT NULL,
  `kamis` tinyint(1) DEFAULT NULL,
  `jumat` tinyint(1) DEFAULT NULL,
  `sabtu` tinyint(1) DEFAULT NULL,
  `minggu` tinyint(1) DEFAULT NULL,
  `id_user` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `judul_jadwal`, `isi_jadwal`, `tanggal_mulai`, `tanggal_selesai`, `waktu_pengingat`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`, `minggu`, `id_user`) VALUES
(8, 'asdsad', 'asdasd', '2024-12-20', '2024-12-26', '22:02:00', 1, 0, 0, 0, 0, 0, 0, 8),
(10, 'asd', 'asasd', '2024-12-19', '2024-12-25', '22:02:00', 1, 0, 0, 0, 0, 0, 0, 9),
(12, 'Dasar Pemrograman ', 'Tugas Phyton ', '2024-12-19', '2024-12-26', '00:00:00', 0, 0, 0, 1, 0, 0, 0, 10),
(13, 'asd', 'asd', '0022-02-22', '0022-02-22', '22:02:00', 0, 1, 0, 0, 0, 0, 0, 36);

-- --------------------------------------------------------

--
-- Table structure for table `tantangan`
--

CREATE TABLE `tantangan` (
  `id_tantangan` int NOT NULL,
  `judul_tantangan` varchar(255) DEFAULT NULL,
  `isi_tantangan` text,
  `tanggal_pengingat` date DEFAULT NULL,
  `waktu_pengingat` time DEFAULT NULL,
  `id_pembuat` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tantangan`
--

INSERT INTO `tantangan` (`id_tantangan`, `judul_tantangan`, `isi_tantangan`, `tanggal_pengingat`, `waktu_pengingat`, `id_pembuat`) VALUES
(34, 'asd', 'asd', '2024-12-19', '22:02:00', 9),
(35, 'ADS', 'AD', '2024-12-18', '22:02:00', 9),
(36, 'ASD', '222', '0002-02-22', '22:02:00', 9),
(37, '222', '222', '0022-02-22', '22:22:00', 9),
(38, 'foto', '22', '2024-12-28', '22:02:00', 30),
(39, 'VIDIO DEMO APLIKASI DAN PPT', 'ok', '2024-12-28', '22:02:00', 9),
(40, 'LARI 10KM', 'oke\r\n', '2024-12-28', '22:02:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tantangan_stat`
--

CREATE TABLE `tantangan_stat` (
  `id_tantangan` int NOT NULL,
  `id_user` int NOT NULL,
  `status_tantangan` tinyint(1) DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nilai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tantangan_stat`
--

INSERT INTO `tantangan_stat` (`id_tantangan`, `id_user`, `status_tantangan`, `keterangan`, `bukti`, `nilai`) VALUES
(34, 8, 1, NULL, NULL, NULL),
(38, 8, 1, NULL, NULL, NULL),
(40, 8, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int NOT NULL,
  `judul_tugas` varchar(255) DEFAULT NULL,
  `isi_tugas` text,
  `tanggal_pengingat` date DEFAULT NULL,
  `waktu_pengingat` time DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `status_tugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `judul_tugas`, `isi_tugas`, `tanggal_pengingat`, `waktu_pengingat`, `id_user`, `status_tugas`) VALUES
(14, 'jndkjf', 'wefwe3', '2024-12-28', '03:33:00', 8, '1'),
(18, 'Tugas Sistem Komputer ', 'Rakit PC ', '2024-12-19', '00:00:00', 10, '0'),
(19, 'Porter', 'Peler', '2024-12-23', '21:02:00', 19, '0'),
(25, 'asd', '2', '0022-02-22', '22:02:00', 9, '0'),
(26, 'okela', 's', '2024-12-28', '00:00:00', 32, '1'),
(27, 'asd', 'ok', '2024-12-29', '00:00:00', 32, '0'),
(28, 'okee', 'aaa', '2024-12-28', '22:02:00', 32, '0'),
(30, 'PRAKTIKUM DASWEB 13', 'sad', '2024-12-28', '22:02:00', 8, '0'),
(31, 'asd', 'asd', '2024-12-28', '22:02:00', 9, '0'),
(32, '334', 'asd', '2024-12-31', '22:22:00', 34, '0'),
(33, 'PRAKTIKUM DASWEB 13', 'ok', '2024-12-30', '22:40:00', 10, '0'),
(34, 'ad', 'asd', '2024-12-19', '22:22:00', 36, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `is_guru` tinyint(1) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `telp` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_guru`, `foto_profil`, `telp`) VALUES
(9, 'ryan gosling', '$2y$10$ADdUh6ZdIBV7iWjrpKQmBeiSIIqcGU86TVo/FiVZNrcjVDoI2CeSa', 'gosling@gmail.com', 1, '../../asset/uploads/profiles/ryangosling.jpg', NULL),
(10, 'Adrian', '$2y$10$YFCIHRaQYJsWAZhxoNtvQuBJS3iWGjyLfV2Z0yDGG8HJH1N5iKWLW', 'adrian01@gmail.com', 0, '../../asset/uploads/profiles/100b6df306b6acd2586939d52b66a270.webp', '895603792033'),
(11, 'Rizqullah', '$2y$10$jKKyk63rVayG7dW7Bb3HKe0zfGPaA8lLV9gNxdpfr4xv.k7osJDGC', 'rizqullah02@gmail.com', 1, NULL, NULL),
(12, 'Marwan', '$2y$10$N8LhbLNtXLVQ4wUr1T8U8e5QBuZ.D7e0g2ryH9ulX2zyzMSRMJizO', 'dl@gmail', 1, NULL, NULL),
(13, 'TiaraJovina', '$2y$10$YlKDeDvSlp4LWNbnalRmJuPaC47KXCetOb9NEWC2Um/TKIX7ANGSS', 'tiaraaajovi@gmail.com', 0, NULL, NULL),
(14, 'Yoongi', '$2y$10$fiJnBptk765oGXr2zWCA..vUBrGtp7qfXK.RBE.MYJu1o3xvOoIfG', 'suga@gmail.com', 1, NULL, NULL),
(15, 'Rivaldo', '$2y$10$jfgyQROeFylruRAEG8/ctu29tegpGWGhSU5wnnn5vESh/inVQmSsm', 'rivaldo22@gmail.com', 0, NULL, NULL),
(16, 'lukki', '$2y$10$tCHNHQetQKmONiHp6iBoh.SETvHRNgwzxkJC1DHSZe24vtZ1fPD16', 'luki@gmail.com', 0, '../../asset/uploads/profiles/Screenshot 2024-09-25 205303.png', NULL),
(17, 'RivaldoFranscisco', '$2y$10$FDlXUuxMoq1UQq/oXA5cW.O0YIW4hH5TIcKWXnXFwfCJTecg0hkjS', 'rivaldofaldo09@gmail.com', 0, NULL, NULL),
(18, 'dwikyubuntu', '$2y$10$uz41M1ENXmy5kpydN9SHpOw5rrney6tWWz5EChwOoy.LWA7Hl3uQK', 'ubunturimex@gmail.com', 1, NULL, NULL),
(19, 'zhari', '$2y$10$Fo5d.NZ62Sx3KLFrr/KkIeEYB2tRqyRzebYSDe1S7eSbgvBcsCt8y', 'zhariramadhanefendy@gmail.com', 0, NULL, NULL),
(20, 'asdasd', '$2y$10$9VeHVT9xaZmqI3hEotfmsOPD/ha9qF08NRp3n9LosMiXj0Qjo89ju', 'aliffajriadi1@gmail.com', 1, NULL, NULL),
(21, 'ogiik', '$2y$10$95AmOYruOR1D55EjwzDgcu3685BpJEYwlB27WElCCokzn/jPdPAyG', 'aliffajri59@gmail.com', 1, NULL, NULL),
(22, 'okkee', '$2y$10$QxOYu4kHslVnnDSZV5mBaOuA6hEogQmxQtOi1lNY3XvhKE75eBFx6', 'aliffajri59@gmail.com', 1, '../../asset/uploads/profiles/ryangosling.jpg', NULL),
(23, 'anjay', '$2y$10$tV.591zTu4UxB5AxmIMQu.R.DHKNfe/nO0D3nJbyNMQU5x6EGEJIa', 'alipgacor@gmail.com', 1, '../../asset/uploads/profiles/default_foto.jpg', NULL),
(27, 'adapaa1', '$2y$10$wZipbgmmZICq6/k1mk.XZ.R1pv6UkYn5wbXjlCur4mXRh6aCu9.cq', 'alipgacor@gmail.com', 1, '../../asset/uploads/profiles/default_foto.jpg', NULL),
(31, 'wahyu', '$2y$10$QNNHdvd9y0jMzzo2266sa.9DJI1WP9w0.mfe51lnlOBK7CENvsMgS', 'wah@gmail.com', 1, NULL, NULL),
(33, 'ramaa', '$2y$10$7/bZyOzARENUIAA3myWLQe23Kedm/N.8hgeM586C5hS7jhbdsc3Zq', 'ram@gmail.com', 1, '../../asset/uploads/profiles/default_foto.jpg', NULL),
(36, 'aliff', '$2y$10$bet4jZRCtJNCHL9aFN20o.CReA5LsDCcazIDEdqaYbBMR9O3./kMC', 'aliffajriadi@gmail.com', 0, '../../asset/uploads/profiles/default_foto.jpg', '895603792033');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tantangan`
--
ALTER TABLE `tantangan`
  ADD PRIMARY KEY (`id_tantangan`);

--
-- Indexes for table `tantangan_stat`
--
ALTER TABLE `tantangan_stat`
  ADD PRIMARY KEY (`id_tantangan`,`id_user`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tantangan`
--
ALTER TABLE `tantangan`
  MODIFY `id_tantangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
