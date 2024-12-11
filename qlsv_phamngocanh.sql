-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv_phamngocanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_students`
--

CREATE TABLE `table_students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students`
--

INSERT INTO `table_students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level`, `group`) VALUES
(1, 'Trần Thị Thu Huyền', '2005-05-23', 0, 'Hà Nội', 3, 4),
(2, 'Phạm Ngọc Ánh', '2005-05-23', 0, 'Thái Bình', 3, 4),
(3, 'Nguyễn Thị Yến Nhi', '2004-09-23', 0, 'Thái Bình', 3, 4),
(4, 'Đỗ Hà Duyên', '2005-10-15', 0, 'Nam Định', 3, 4),
(5, 'Ninh Thị Lành', '2005-01-18', 0, 'Nam Định', 3, 4),
(6, 'Hoàng Thị Hiền', '2005-06-23', 0, 'Hải Phòng', 3, 4),
(7, 'Đỗ Thị Lan Hương', '2005-05-23', 0, 'Hải Phòng', 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
