-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2023 at 03:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `id`, `password`, `email`) VALUES
('admin', 1, '$2y$10$gAxobo9IulLx.Yq4d973YuOiOQigiF8bStMVE9RMjumwstZSpmQWq', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `nama_lengkap` varchar(300) NOT NULL,
  `id` int(11) NOT NULL,
  `jumlah_suara` int(11) DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`nama_lengkap`, `id`, `jumlah_suara`, `foto`, `visi_misi`, `profil`) VALUES
('Mahadi', 5, 92, '65735daee21db.jpg', 'membangun negeri', 'Hallo nama saya mahadi'),
('Sidu', 6, 80, '65735dcabf0c7.png', 'Membangun Pohon', 'App Sinar Mas'),
('Robot', 7, 78, '65735f88de5e8.png', 'membangun robot', 'Robot'),
('Gojo', 8, 2, '65737d74e79a6.png', 'Yowaimo', 'Gojo');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `nama_lengkap` varchar(300) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status_memilih` enum('sudah','belum') DEFAULT 'belum',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_admin`
--

CREATE TABLE `session_admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_admin`
--

INSERT INTO `session_admin` (`id`, `user_id`, `username_session`) VALUES
(1, '6571c1c8cfde0', 'admin'),
(1, '6572750dbe55e', 'admin'),
(1, '65737dd652a4e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `session_user`
--

CREATE TABLE `session_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_user`
--

INSERT INTO `session_user` (`id`, `user_id`, `username_session`) VALUES
(1, '6571c12a13866', 'mahadi_dn'),
(1, '6571e747b9c8c', 'mahadi_dn'),
(1, '6571f108c6c18', 'mahadi_dn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(300) NOT NULL,
  `status_memilih` enum('sudah','belum') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `id`, `password`, `email`, `nama_lengkap`, `status_memilih`) VALUES
('mahadi_dn', 1, '$2y$10$fIW20HrjvOO8gnCxK9MmHuwb0OFuHW1yozIWRozRQOTef7Tkizhvq', 'mahadidwinugraha@gmail.com', 'Mahadi Dwi Nugraha', 'belum'),
('user1', 3, '$2y$10$riB.rb/KDKIi2wVunoPpMObffa9kEjUE8335js2FDR1sr76elRC1e', 'user1@gmail.com', 'user1_1', 'sudah'),
('user2', 4, '$2y$10$kc2ExwOG09vo4cBARM4FouULej1xGQhMiVQE.WoEIqKgi5TBqku/e', 'user2@gmail.com', 'user2', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD KEY `fk_idpemilih_user` (`id_user`);

--
-- Indexes for table `session_admin`
--
ALTER TABLE `session_admin`
  ADD KEY `fk_sessionAdmin_admin` (`id`);

--
-- Indexes for table `session_user`
--
ALTER TABLE `session_user`
  ADD KEY `fk_sessionUser_user` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `fk_idpemilih_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_admin`
--
ALTER TABLE `session_admin`
  ADD CONSTRAINT `fk_sessionAdmin_admin` FOREIGN KEY (`id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_user`
--
ALTER TABLE `session_user`
  ADD CONSTRAINT `fk_sessionUser_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
