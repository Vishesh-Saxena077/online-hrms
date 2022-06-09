-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 09:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees__salary`
--

CREATE TABLE `employees__salary` (
  `Sno` int(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `sal_month` varchar(255) NOT NULL,
  `basic_pay` varchar(255) NOT NULL,
  `p` varchar(255) DEFAULT NULL,
  `HRA` varchar(255) NOT NULL,
  `mediclaim` varchar(255) NOT NULL,
  `pf` varchar(255) NOT NULL,
  `tax_for_month` varchar(255) NOT NULL,
  `bonus` varchar(255) NOT NULL,
  `TA` varchar(255) NOT NULL,
  `DA` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `sal_status` varchar(255) NOT NULL,
  `sal_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees__salary`
--

INSERT INTO `employees__salary` (`Sno`, `employee_id`, `sal_month`, `basic_pay`, `p`, `HRA`, `mediclaim`, `pf`, `tax_for_month`, `bonus`, `TA`, `DA`, `others`, `sal_status`, `sal_note`) VALUES
(1, 'HR-40905', '45000', '500', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Approved', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `hr_table`
--

CREATE TABLE `hr_table` (
  `Sno` int(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `desig` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `account_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr_table`
--

INSERT INTO `hr_table` (`Sno`, `employee_id`, `password`, `cpassword`, `email`, `name`, `lname`, `address`, `gender`, `age`, `dob`, `phone_number`, `country`, `state`, `city`, `desig`, `department`, `department_id`, `status`, `account_status`) VALUES
(1, 'HR-40905', '$2y$10$6q3BhXWgY8t093XUqmBpTON/lo49qnoRoiOLOnnwVQ8V2f3MRs5Jy', '$2y$10$/MzGYpZkgNxemWsKocX6qeFMjWl0VvD.cryYypDAHruoTpFKUP39W', 'saxena7777@gmail.com', 'vishesh', 'saxena', '', 'M', '', '', '', '', '', '', '', '', '', '', 'OFFLINE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees__salary`
--
ALTER TABLE `employees__salary`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `hr_table`
--
ALTER TABLE `hr_table`
  ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees__salary`
--
ALTER TABLE `employees__salary`
  MODIFY `Sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_table`
--
ALTER TABLE `hr_table`
  MODIFY `Sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
