-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 05, 2024 at 08:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorimarshellamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `nohp` text NOT NULL,
  `admin_sandi` text NOT NULL,
  `admin_foto` varchar(80) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_nama`, `admin_email`, `nohp`, `admin_sandi`, `admin_foto`, `level`) VALUES
(60, 'admin', 'Admin', 'admin@gmail.com', '08942189412', '$2y$10$i.q9fviZUwPWQnjdODeN2eLjHGUjZxInJZFUptgQaKASab1N2jRVO', 'bca55f176639ceee7ad709bb11e5efd8.jpg', 'Admin'),
(63, 'yanto', 'Yanto', 'yanto@gmail.com', '08948129498', '$2y$10$je0q4GIK1GY8cJ6EbhfapuwvzemecsU46hSHsti98JE1tEDJYqDH2', '17da4369497de9f16446a2d00e754ba3.png', 'Personal Trainer'),
(65, 'owner', 'Andrew', 'owner@gmail.com', '08948129444', '$2y$10$8Gl1JWhIJlAYlPCJvSJ4dOUXAxgeRvcNa.lxDLkAAUVHMZZ9xrp52', 'user.png', 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` text NOT NULL,
  `barang_stok` text NOT NULL,
  `barang_harga` text NOT NULL,
  `barang_deskripsi` longtext NOT NULL,
  `barang_foto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `barang_nama`, `barang_stok`, `barang_harga`, `barang_deskripsi`, `barang_foto`) VALUES
(3, 'Indomie Dus', '95', '300000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1a75978be30cb1988d07fa1da0655f70.jpg'),
(5, 'Beras 10 Kg', '101', '125000', '-', '95beae61454b2f32a6be5a71af4f7fcc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `idkeluar` int(11) NOT NULL,
  `kodekeluar` text NOT NULL,
  `namabarang` text NOT NULL,
  `harga` text NOT NULL,
  `jumlah` text NOT NULL,
  `total` text NOT NULL,
  `grandtotal` text NOT NULL,
  `nama` text NOT NULL,
  `tanggalkeluar` date NOT NULL,
  `waktuinput` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keluar`
--

INSERT INTO `tb_keluar` (`idkeluar`, `kodekeluar`, `namabarang`, `harga`, `jumlah`, `total`, `grandtotal`, `nama`, `tanggalkeluar`, `waktuinput`) VALUES
(11, '030424194403', 'Beras 10 Kg', '125000', '1', '125000', '125000', 'CV. Kartika', '2024-04-03', '2024-04-03 19:44:03'),
(12, '030424194419', 'Indomie Dus', '300000', '3', '900000', '900000', 'Yanto', '2024-04-03', '2024-04-03 19:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `idmasuk` int(11) NOT NULL,
  `kodemasuk` text NOT NULL,
  `namabarang` text NOT NULL,
  `harga` text NOT NULL,
  `jumlah` text NOT NULL,
  `total` text NOT NULL,
  `grandtotal` text NOT NULL,
  `nama` text NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `waktuinput` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`idmasuk`, `kodemasuk`, `namabarang`, `harga`, `jumlah`, `total`, `grandtotal`, `nama`, `tanggalmasuk`, `waktuinput`) VALUES
(3, '030424194349', 'Beras 10 Kg', '125000', '2', '250000', '850000', 'PT. Bukit Asam Tbk', '2024-04-03', '2024-04-03 19:43:49'),
(4, '030424194349', 'Indomie Dus', '300000', '2', '600000', '850000', 'PT. Bukit Asam Tbk', '2024-04-03', '2024-04-03 19:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `idkode` varchar(255) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `jeniskelamin` text NOT NULL,
  `alamat` text NOT NULL,
  `nohp` text NOT NULL,
  `noktp` text NOT NULL,
  `jenisolahraga` text NOT NULL,
  `kelaspt` text NOT NULL,
  `tanggalberakhir` text NOT NULL,
  `fotoprofil` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_sandi` text NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `idkode`, `user_nama`, `jeniskelamin`, `alamat`, `nohp`, `noktp`, `jenisolahraga`, `kelaspt`, `tanggalberakhir`, `fotoprofil`, `user_email`, `user_sandi`, `user_status`) VALUES
(1, '000001', 'Udin Harnojoyo', 'Laki - Laki', 'Jl. Srijaya Negara Palembang', '08492184921', '1671104890214021', 'Fitnes', '-', '2022-12-28', '75cb1a3f5fb84d3fbe7cce4c6c809c2b.jpg', 'udin@gmail.com', '', 'Aktif'),
(8, '000002', 'Husen Uchiha', 'Laki - Laki', 'Jl. Nungcik, Kalidoni, Palembang', '08492184921', '0489128492149821', 'Fitnes', 'Yanto', '2022-12-28', 'user.png', 'husen@gmail.com', '', 'Aktif'),
(827767642, '000003', 'Yanti', 'Perempuan', 'Jl. Srijaya Negara Palembang', '08948219421', '16702109412214', 'Fitnes', 'Yanto', '2022-10-28', 'user.png', 'yanti@gmail.com', '$2y$10$KXAsYl59BeIQgvKDEYiyVuaCK/hUNDIVKULOhbbwSM4tGBJXidM2e', 'Aktif'),
(894329458, '000004', 'Budi', 'Laki - Laki', 'Jl. Nungcik, Palembang', '089421894821', '16984217412421', 'Fitnes', 'Yanto', '2022-11-04', 'user.png', 'budi@gmail.com', '$2y$10$smZ5FSTTKQjEh45E94qecu.bwCetQ3Rjz12S4tOJ.EIYDUCCXnJre', 'Aktif'),
(894329459, '000005', 'Risa', 'Perempuan', 'Jl. Palembang', '08491284912', '124987214921', 'Fitnes', 'Yanto', '2023-02-04', 'user.png', 'risa@gmail.com', '$2y$10$FrZ1J2s1qIS6BNCX6P8MW.RuITWpQmqnyfXElxTpe3wcrp4Bgzu3a', 'Aktif'),
(894329460, '000006', 'Guin', 'Perempuan', 'Jl. Nungcik, Kalidoni, Palembang', '081294891284', '167402142', 'Fitnes', 'Yanto', '2022-11-04', 'b1f1e362c1c8ea258e7bfefb97233410.jpg', 'guin@gmail.com', '$2y$10$43vazRe/BX2GeWQqav/MIO6UuT1i3CNkrk.fyoaBHRcW7ZDqRhsB2', 'Aktif'),
(894329461, '000007', 'Vivin', 'Perempuan', 'Jl. Nungcik, Kalidoni, Palembang', '08491284921', '10248921421451', 'Fitnes', 'Yanto', '2022-11-19', 'user.png', 'vivin@gmail.com', '$2y$10$IPtTlAKnOuVsocczlfaxveYKvWTUfyHU3vJTcJnJVNj05SzZ0Nr.m', 'Aktif'),
(894329475, '050412000008', 'Budi', 'Laki - Laki', 'Jl. Palembang', '098214912', '0248190124', '', '-', '', 'user.png', 'budi123@gmail.com', '$2y$10$OVeMM5MlPjKrcWZsBUvziuojYA33Ih0Zsjq4dCZ.oYu1UBBNeL5zy', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894329476;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
