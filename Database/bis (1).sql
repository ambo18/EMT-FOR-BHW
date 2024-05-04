-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 06:16 AM
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
-- Database: `bis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bp`
--

CREATE TABLE `tbl_bp` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `sbp` int(5) DEFAULT NULL,
  `dbp` int(5) DEFAULT NULL,
  `dateofbp` date DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bp`
--

INSERT INTO `tbl_bp` (`id`, `p_name`, `birthdate`, `age`, `gender`, `address`, `sbp`, `dbp`, `dateofbp`, `phone`, `remarks`) VALUES
(1, 'R-JHEL B. TANDUGON', '2001-10-18', 21, 'MALE', 'SEGUINON SALCEDO EASTERN SAMAR', 120, 110, '2023-10-04', 2147483647, 'GOOD'),
(2, 'AMBROSYO H. GWAPO', '2022-06-26', 22, 'FEMALE', 'DIMATAGPUAN', 115, 100, '2023-10-25', 2147483647, 'NOT GOOD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_children_information`
--

CREATE TABLE `tbl_children_information` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `name_parent` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_children_information`
--

INSERT INTO `tbl_children_information` (`id`, `p_name`, `name_parent`, `address`, `birthdate`, `age`, `gender`, `phone`) VALUES
(1, 'Nick Jr. B. Flores', 'Anabel B. Flores', 'seguinon', '2017-01-01', '7', 'MALE', '09971478896'),
(3, 'AMBO R-JHEL', 'R-JHEL TANDUGON', 'BRGY.SEGUINON SALCEDO EASTERN SAMAR', '2016-01-01', '8', 'MALE', '09971478896'),
(4, 'ANABEL B. TANDUGON', 'R-JHEL TANDUGON', 'BRGY.SEGUINON SALCEDO EASTERN SAMAR', '2013-01-01', '11', 'MALE', '09971478896');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deworming`
--

CREATE TABLE `tbl_deworming` (
  `id` int(11) NOT NULL,
  `p_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateofdeworming` date DEFAULT NULL,
  `typeofdeworming` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_deworming`
--

INSERT INTO `tbl_deworming` (`id`, `p_name`, `dateofdeworming`, `typeofdeworming`, `remarks`) VALUES
(1, 'NICK JR. B. FLORES', '2024-04-24', 'A', 'VERY GOOD'),
(2, 'AMBO R-JHEL', NULL, NULL, NULL),
(4, 'ANABEL B. TANDUGON', '2024-04-20', 'O', 'NOT GOOD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distribution_of_vitamin`
--

CREATE TABLE `tbl_distribution_of_vitamin` (
  `id` int(5) NOT NULL,
  `p_name` varchar(250) DEFAULT NULL,
  `vitamin` text DEFAULT NULL,
  `dateofdisofvitamin` date DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_distribution_of_vitamin`
--

INSERT INTO `tbl_distribution_of_vitamin` (`id`, `p_name`, `vitamin`, `dateofdisofvitamin`, `remarks`) VALUES
(5, 'NICK JR. B. FLORES', 'Q', '2024-04-01', 'NOT GOOD'),
(7, 'AMBO R-JHEL', 'VITAMIN A', '2024-04-05', 'VERY GOOD'),
(8, 'ANABEL B. TANDUGON', '', '0000-00-00', 'EXCELLENT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medical_supply`
--

CREATE TABLE `tbl_medical_supply` (
  `id` int(11) NOT NULL,
  `supply_name` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medical_supply`
--

INSERT INTO `tbl_medical_supply` (`id`, `supply_name`, `description`, `category`, `quantity`) VALUES
(20, 'KISSPIRRIN', 'pampatangal stress', 'FIRST AID', 100),
(21, 'QWERTY', 'none', 'PROTECTIVE GEAR', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `generic_name` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `dosage` int(5) DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `generic_name`, `description`, `category`, `quantity`, `dosage`, `unit`) VALUES
(21, 'KISSPIRRIN', 'Pamapatangal Stress', 'INSULIN', 0, 500, 'MG'),
(22, 'QWERTY', 'none', 'ANTIDEPRESSANT', 90, 100, 'MG'),
(23, 'AFDAFDF', 'dgfvbvb', 'ANALGESIC', 500, 23, 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_category`
--

CREATE TABLE `tbl_med_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_med_category`
--

INSERT INTO `tbl_med_category` (`id`, `category`) VALUES
(1, 'ANALGESIC'),
(2, 'ANTIBIOTIC'),
(3, 'VITAMINS'),
(4, 'INSULIN'),
(5, 'ANTIDEPRESSANT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_supply_category`
--

CREATE TABLE `tbl_med_supply_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_med_supply_category`
--

INSERT INTO `tbl_med_supply_category` (`id`, `category`) VALUES
(1, 'PROTECTIVE GEAR'),
(2, 'FIRST AID'),
(5, 'DIGITAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med_unit`
--

CREATE TABLE `tbl_med_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_med_unit`
--

INSERT INTO `tbl_med_unit` (`id`, `unit`) VALUES
(1, 'MG'),
(2, 'ML'),
(3, 'G'),
(5, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_operation_timbang`
--

CREATE TABLE `tbl_operation_timbang` (
  `id` int(3) NOT NULL,
  `p_name` varchar(250) DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `nutritional_status` text DEFAULT NULL,
  `dateofopertimbang` date DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_operation_timbang`
--

INSERT INTO `tbl_operation_timbang` (`id`, `p_name`, `weight`, `height`, `nutritional_status`, `dateofopertimbang`, `remarks`) VALUES
(1, 'NICK JR. B. FLORES', '20', '50', 'NORMAL', '2024-04-27', 'EXCELLENT'),
(2, 'ANABEL B. TANDUGON', '', '', '', '0000-00-00', ''),
(3, 'AMBO R-JHEL', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pregnant`
--

CREATE TABLE `tbl_pregnant` (
  `id` int(11) NOT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `p_guardian_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `lmp` date DEFAULT NULL,
  `edd` date DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `bloodtype` text DEFAULT NULL,
  `rhfactor` text DEFAULT NULL,
  `sbp` int(5) DEFAULT NULL,
  `dbp` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pregnant`
--

INSERT INTO `tbl_pregnant` (`id`, `p_name`, `birthdate`, `age`, `p_guardian_name`, `address`, `lmp`, `edd`, `allergies`, `bloodtype`, `rhfactor`, `sbp`, `dbp`) VALUES
(1, 'ANABEL B. TANDUGON', '2022-11-02', 25, 'FELISA BASIJAN TANDUGON', 'SEGUINON SALCEDO EASTERN SAMAR', '2023-02-02', '2024-07-11', 'NONE', 'TYPE O', 'POSITIVE', 120, 110);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT '',
  `avatar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `display_name` varchar(50) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `user_type`, `avatar`, `created_at`, `display_name`, `status`) VALUES
(24, 'sys-admin', '9acc1ea50c1adf38a8465dd2c42b591c83f1e2e2', 'system-maintenance', 'user-placeholder.png', '2023-01-21 12:47:52', 'System Admin', 1),
(55, 'resident', '891cde22cc4a68f910b34799af7503b8229c74ea', 'resident', 'user-placeholder.png', '2023-01-21 17:06:05', 'Resident', 1),
(63, 'med-admin', 'd608bbbc552e65ee8d99dc2c0d38686ce3865caa', 'medical-admin', '', '2023-03-08 13:46:27', 'MEDICAL ADMIN', 1),
(64, 'rjhel-admin', '19e72ad8b482c85f81e68766a1191a6eb5dc4b60', 'medical-admin', NULL, '2023-09-28 05:43:40', 'R-JHEL B. TANDUGON', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bp`
--
ALTER TABLE `tbl_bp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_children_information`
--
ALTER TABLE `tbl_children_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_deworming`
--
ALTER TABLE `tbl_deworming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_distribution_of_vitamin`
--
ALTER TABLE `tbl_distribution_of_vitamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medical_supply`
--
ALTER TABLE `tbl_medical_supply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_med_category`
--
ALTER TABLE `tbl_med_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_med_supply_category`
--
ALTER TABLE `tbl_med_supply_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_med_unit`
--
ALTER TABLE `tbl_med_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_operation_timbang`
--
ALTER TABLE `tbl_operation_timbang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pregnant`
--
ALTER TABLE `tbl_pregnant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bp`
--
ALTER TABLE `tbl_bp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_children_information`
--
ALTER TABLE `tbl_children_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_deworming`
--
ALTER TABLE `tbl_deworming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_distribution_of_vitamin`
--
ALTER TABLE `tbl_distribution_of_vitamin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_medical_supply`
--
ALTER TABLE `tbl_medical_supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_med_category`
--
ALTER TABLE `tbl_med_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_med_supply_category`
--
ALTER TABLE `tbl_med_supply_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_med_unit`
--
ALTER TABLE `tbl_med_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_operation_timbang`
--
ALTER TABLE `tbl_operation_timbang`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pregnant`
--
ALTER TABLE `tbl_pregnant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
