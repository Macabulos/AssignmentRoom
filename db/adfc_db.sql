-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 07:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adfc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_year_section` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_year_section`, `Department`, `major`) VALUES
(47, 'bist', 'eded', 'math');

-- --------------------------------------------------------

--
-- Table structure for table `departmet`
--

CREATE TABLE `departmet` (
  `department_id` int(11) NOT NULL,
  `person_incharge` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departmet`
--

INSERT INTO `departmet` (`department_id`, `person_incharge`, `title`, `department`) VALUES
(11, 'dfdf', 'dfdf', 'eded'),
(12, 'Sir Rivas', 'Prof', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `date`, `data`, `action`, `user`) VALUES
(1428, '2024-12-17 18:10:25', 'Christine Redoblo', 'Login', 'Admin'),
(1429, '2024-12-17 18:16:08', 'Christine Redoblo', 'Login', 'Admin'),
(1430, '2024-12-17 18:24:22', '', 'Add Entry School Year', 'Admin'),
(1431, '2024-12-17 18:24:43', '200222', 'Add Entry School Year', 'Admin'),
(1432, '2024-12-17 18:26:36', '2022-2023', 'Add Entry School Year', 'Admin'),
(1433, '2024-12-17 18:35:19', 'Christine Redoblo', 'Login', 'Admin'),
(1434, '2024-12-17 18:45:26', 'eded', 'Add Entry Department', 'Admin'),
(1435, '2024-12-17 18:49:41', 'jake', 'Add Entry Teacher', 'Admin'),
(1436, '2024-12-17 18:49:59', 'bist', 'Add Entry Course', 'Admin'),
(1437, '2024-12-17 18:50:13', 'lab 1', 'Add Entry Room', 'Admin'),
(1438, '2024-12-17 18:54:06', 'itp414', 'Add Entry subject', 'Admin'),
(1439, '2024-12-17 18:54:43', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1440, '2024-12-17 18:54:51', 'Christine Redoblo', 'Logout', 'Admin'),
(1441, '2024-12-17 18:55:04', 'Christine Redoblo', 'Login', 'Admin'),
(1442, '2024-12-17 18:55:43', 'lab 2', 'Add Entry Room', 'Admin'),
(1443, '2024-12-17 18:58:01', '3:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1444, '2024-12-18 06:21:58', 'Christine Redoblo', 'Login', 'Admin'),
(1445, '2024-12-18 07:06:43', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1446, '2024-12-18 07:12:51', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1447, '2024-12-18 07:18:42', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1448, '2024-12-18 08:31:54', 'Christine Redoblo', 'Login', 'Admin'),
(1449, '2024-12-18 08:43:43', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1450, '2024-12-18 08:43:50', '4:00 pm', 'Delete  Schedule', 'Admin'),
(1451, '2024-12-18 11:26:47', 'Christine Redoblo', 'Login', 'Admin'),
(1452, '2024-12-18 11:27:45', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1453, '2024-12-18 11:35:09', 'Christine Redoblo', 'Logout', 'Admin'),
(1454, '2024-12-18 11:35:20', 'Christine Redoblo', 'Login', 'Admin'),
(1455, '2024-12-18 11:44:04', 'Christine Redoblo', 'Logout', 'Admin'),
(1456, '2024-12-18 11:44:24', 'Christine Redoblo', 'Login', 'Admin'),
(1457, '2024-12-18 11:44:39', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1458, '2024-12-18 11:45:17', '2:00 pm&nbsp;2:30 pm', 'Add Schedule', 'Admin'),
(1459, '2024-12-18 11:46:02', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1460, '2024-12-18 11:46:31', '2:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1461, '2024-12-18 11:47:36', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1462, '2024-12-18 11:49:15', '3:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1463, '2024-12-18 12:00:53', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1464, '2024-12-18 12:06:34', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1465, '2024-12-18 12:08:04', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1466, '2024-12-18 12:08:38', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1467, '2024-12-18 12:08:58', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1468, '2024-12-18 12:26:18', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1469, '2024-12-18 12:27:27', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1470, '2024-12-18 12:30:33', '14:20&nbsp;16:00', 'Add Schedule', 'Admin'),
(1471, '2024-12-18 12:30:43', '14:20', 'Delete  Schedule', 'Admin'),
(1472, '2024-12-18 12:31:08', '14:20&nbsp;16:00', 'Add Schedule', 'Admin'),
(1473, '2024-12-18 12:34:56', '14:20', 'Delete  Schedule', 'Admin'),
(1474, '2024-12-18 12:35:18', '3:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1475, '2024-12-18 12:36:43', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1476, '2024-12-18 12:37:35', '2:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1477, '2024-12-18 12:37:47', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1478, '2024-12-18 12:38:17', '3:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1479, '2024-12-18 12:38:28', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1480, '2024-12-18 12:38:44', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1481, '2024-12-18 12:38:53', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1482, '2024-12-18 12:39:46', '2:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1483, '2024-12-18 12:39:53', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1484, '2024-12-18 12:41:13', '2:00 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1485, '2024-12-18 12:45:53', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1486, '2024-12-18 12:47:35', '2:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1487, '2024-12-18 12:49:41', '3:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1488, '2024-12-18 12:54:29', '4:00 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1489, '2024-12-18 12:57:52', 'Computer Science', 'Add Entry Department', 'Admin'),
(1490, '2024-12-18 12:58:38', 'itp414', 'Add Entry subject', 'Admin'),
(1491, '2024-12-18 12:59:07', 'itp414', 'Update Entry subject', 'Admin'),
(1492, '2024-12-18 13:02:25', '1:30 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1493, '2024-12-18 13:05:55', 'lester', 'Add Entry Teacher', 'Admin'),
(1494, '2024-12-18 13:06:37', '5:00 pm&nbsp;6:00 pm', 'Add Schedule', 'Admin'),
(1495, '2024-12-18 13:08:00', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1496, '2024-12-18 13:08:04', '4:00 pm', 'Delete  Schedule', 'Admin'),
(1497, '2024-12-18 13:08:08', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1498, '2024-12-18 13:08:12', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1499, '2024-12-18 13:08:16', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1500, '2024-12-18 13:08:20', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1501, '2024-12-18 13:09:32', '1:00 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1502, '2024-12-18 13:11:31', '1:30 pm&nbsp;11:30 am', 'Add Schedule', 'Admin'),
(1503, '2024-12-18 14:00:29', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1504, '2024-12-18 14:00:31', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1505, '2024-12-18 14:00:44', '3:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1506, '2024-12-18 14:01:42', '3:30 pm&nbsp;5:30 pm', 'Add Schedule', 'Admin'),
(1507, '2024-12-18 14:11:50', '2:30 pm&nbsp;8:00 pm', 'Add Schedule', 'Admin'),
(1508, '2024-12-18 14:12:03', '2:30 pm', 'Delete  Schedule', 'Admin'),
(1509, '2024-12-18 14:12:17', '3:30 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1510, '2024-12-18 14:16:38', '1:00 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1511, '2024-12-18 14:24:42', '1:00 pm&nbsp;3:00 pm', 'Add Schedule', 'Admin'),
(1512, '2024-12-18 14:25:12', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1513, '2024-12-18 14:25:19', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1514, '2024-12-18 14:25:28', '--Select--', 'Delete  Schedule', 'Admin'),
(1515, '2024-12-18 14:31:45', '3:30 pm&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1516, '2024-12-18 14:54:24', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1517, '2024-12-18 15:02:22', '7:30 am&nbsp;8:00 am', 'Add Schedule', 'Admin'),
(1518, '2024-12-18 15:02:34', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1519, '2024-12-18 15:07:03', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1520, '2024-12-18 15:09:48', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1521, '2024-12-18 15:09:53', '--Select--', 'Delete  Schedule', 'Admin'),
(1522, '2024-12-18 15:09:56', '--Select--', 'Delete  Schedule', 'Admin'),
(1523, '2024-12-18 15:09:58', '--Select--', 'Delete  Schedule', 'Admin'),
(1524, '2024-12-18 15:12:10', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1525, '2024-12-18 15:12:18', '--Select--', 'Delete  Schedule', 'Admin'),
(1526, '2024-12-18 15:13:04', '1:00 pm&nbsp;2:00 pm', 'Add Schedule', 'Admin'),
(1527, '2024-12-18 15:13:16', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1528, '2024-12-18 15:13:30', '1:00 pm&nbsp;2:30 pm', 'Add Schedule', 'Admin'),
(1529, '2024-12-18 15:14:01', '1:00 pm&nbsp;3:30 pm', 'Add Schedule', 'Admin'),
(1530, '2024-12-18 15:14:06', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1531, '2024-12-18 15:14:09', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1532, '2024-12-18 15:14:40', '7:30 am', 'Delete  Schedule', 'Admin'),
(1533, '2024-12-18 15:15:30', '1:00 pm&nbsp;2:00 pm', 'Add Schedule', 'Admin'),
(1534, '2024-12-18 15:15:36', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1535, '2024-12-18 15:16:45', '1:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1536, '2024-12-18 15:18:17', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1537, '2024-12-18 15:18:24', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1538, '2024-12-18 15:18:27', '--Select--', 'Delete  Schedule', 'Admin'),
(1539, '2024-12-18 15:18:55', '3:30 pm&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1540, '2024-12-18 15:19:22', '4:00 pm&nbsp;6:00 pm', 'Add Schedule', 'Admin'),
(1541, '2024-12-18 15:19:58', '7:30 pm&nbsp;8:00 pm', 'Add Schedule', 'Admin'),
(1542, '2024-12-18 15:20:32', '7:30 pm&nbsp;8:30 pm', 'Add Schedule', 'Admin'),
(1543, '2024-12-18 15:21:04', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1544, '2024-12-18 15:21:13', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1545, '2024-12-18 15:21:19', '--Select--', 'Delete  Schedule', 'Admin'),
(1546, '2024-12-18 15:22:09', '7:30 am&nbsp;5:00 pm', 'Add Schedule', 'Admin'),
(1547, '2024-12-18 15:22:26', '7:30 am', 'Delete  Schedule', 'Admin'),
(1548, '2024-12-18 15:23:27', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1549, '2024-12-18 15:26:56', '--Select--', 'Delete  Schedule', 'Admin'),
(1550, '2024-12-18 15:26:58', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1551, '2024-12-18 15:27:01', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1552, '2024-12-18 15:27:06', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1553, '2024-12-18 15:27:08', '--Select--', 'Delete  Schedule', 'Admin'),
(1554, '2024-12-18 15:27:21', '3:30 pm', 'Delete  Schedule', 'Admin'),
(1555, '2024-12-18 15:36:02', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1556, '2024-12-18 15:38:30', '--Select--', 'Delete  Schedule', 'Admin'),
(1557, '2024-12-18 15:44:55', '--Select--&nbsp;--Select--', 'Add Schedule', 'Admin'),
(1558, '2024-12-18 16:33:50', 'ITP106', 'Add Entry subject', 'Admin'),
(1559, '2024-12-18 20:00:04', 'Christine Redoblo', 'Login', 'Admin'),
(1560, '2024-12-18 20:28:15', '34344', 'Add Entry School Year', 'Admin'),
(1561, '2024-12-18 21:24:09', '2:00 pm&nbsp;4:00 pm', 'Add Schedule', 'Admin'),
(1562, '2024-12-18 22:17:04', '2020-2025', 'Add Entry School Year', 'Admin'),
(1563, '2024-12-18 22:23:20', '', 'Delete School Year', 'YourUserName'),
(1564, '2024-12-19 08:31:27', 'Christine Redoblo', 'Login', 'Admin'),
(1565, '2024-12-19 10:04:44', '12:00 pm&nbsp;1:00 pm', 'Add Schedule', 'Admin'),
(1566, '2024-12-19 10:17:19', '8:00 am to 9:00 am', 'Add Schedule', 'Admin'),
(1567, '2024-12-19 10:32:47', '8:00 am to 9:00 am', 'Add Schedule', 'Admin'),
(1568, '2024-12-19 10:38:58', '2:00 pm', 'Delete  Schedule', 'Admin'),
(1569, '2024-12-19 10:39:19', '3:30 pm to 4:00 pm', 'Add Schedule', 'Admin'),
(1570, '2024-12-19 10:39:38', '1:30 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1571, '2024-12-19 10:39:42', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1572, '2024-12-19 10:44:04', ' ', 'Delete Teacher', 'Admin'),
(1573, '2024-12-19 10:50:33', '3:00 pm to 3:30 pm', 'Add Schedule', 'Admin'),
(1574, '2024-12-19 10:50:53', '9:00 am to 10:00 am', 'Add Schedule', 'Admin'),
(1575, '2024-12-19 10:50:57', '3:00 pm', 'Delete Schedule', 'Admin'),
(1576, '2024-12-19 11:01:03', '4:30 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1577, '2024-12-19 11:07:02', '4:30 pm', 'Delete Schedule', 'Admin'),
(1578, '2024-12-19 11:11:13', '7:30 am to 8:30 am', 'Add Schedule', 'Admin'),
(1579, '2024-12-19 11:15:05', '4:00 pm to 3:00 pm', 'Add Schedule', 'Admin'),
(1580, '2024-12-19 11:15:24', '12:30 pm to 1:30 pm', 'Add Schedule', 'Admin'),
(1581, '2024-12-19 11:17:49', '4:00 pm', 'Delete Schedule', 'Admin'),
(1582, '2024-12-19 11:21:50', '4:30 pm to 5:00 pm', 'Add Schedule', 'Admin'),
(1583, '2024-12-19 11:22:35', '1:00 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1584, '2024-12-19 11:22:41', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1585, '2024-12-19 12:13:53', '200222', 'Delete School Year', 'YourUserName'),
(1586, '2024-12-19 12:25:28', '1:30 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1587, '2024-12-19 12:25:48', '4:30 pm to 5:00 pm', 'Add Schedule', 'Admin'),
(1588, '2024-12-19 12:25:52', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1589, '2024-12-19 12:59:18', '', 'Add Entry Teacher', 'Admin'),
(1590, '2024-12-19 12:59:32', ' ', 'Delete Teacher', 'Admin'),
(1591, '2024-12-19 13:27:50', '', 'Add Entry Room', 'Admin'),
(1592, '2024-12-19 13:39:02', 'lab 1', 'Add Entry Room', 'Admin'),
(1593, '2024-12-19 13:39:12', 'lab 1', 'Update Entry Room', 'Admin'),
(1594, '2024-12-19 13:42:49', 'lab 1', 'Update Entry Room', 'Admin'),
(1595, '2024-12-19 13:43:08', 'lab 2', 'Update Entry Room', 'Admin'),
(1596, '2024-12-19 13:58:46', '34344', 'Delete School Year', 'YourUserName'),
(1597, '2024-12-19 13:58:48', '2022-2023', 'Delete School Year', 'YourUserName'),
(1598, '2024-12-19 14:05:36', '4:00 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1599, '2024-12-19 14:08:21', 'Christine Redoblo', 'Logout', 'Admin'),
(1600, '2024-12-19 14:08:26', 'Christine Redoblo', 'Login', 'Admin'),
(1601, '2025-01-21 07:56:48', 'Christine Redoblo', 'Login', 'Admin'),
(1602, '2025-01-21 09:22:53', '1:00 pm to 2:00 pm', 'Add Schedule', 'Admin'),
(1603, '2025-01-21 10:00:56', '4:30 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1604, '2025-01-21 10:07:32', '4:30 pm', 'Delete  Schedule', 'Admin'),
(1605, '2025-01-21 10:07:41', '4:00 pm', 'Delete  Schedule', 'Admin'),
(1606, '2025-01-21 10:08:00', '3:00 pm to 4:00 pm', 'Add Schedule', 'Admin'),
(1607, '2025-01-21 10:09:51', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1608, '2025-01-21 10:10:05', '1:30 pm to 3:30 pm', 'Add Schedule', 'Admin'),
(1609, '2025-01-21 10:12:44', '1:00 pm to 3:30 pm', 'Add Schedule', 'Admin'),
(1610, '2025-01-21 10:12:50', '1:00 pm', 'Delete  Schedule', 'Admin'),
(1611, '2025-01-21 10:12:53', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1612, '2025-01-21 10:14:35', '1:30 pm to 3:00 pm', 'Add Schedule', 'Admin'),
(1613, '2025-01-21 10:15:48', '1:30 pm to 3:00 pm', 'Add Schedule', 'Admin'),
(1614, '2025-01-21 10:19:08', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1615, '2025-01-21 10:19:10', '1:30 pm', 'Delete  Schedule', 'Admin'),
(1616, '2025-01-21 10:19:24', '3:00 pm to 5:00 pm', 'Add Schedule', 'Admin'),
(1617, '2025-01-21 10:20:41', '12:00 pm to 2:00 pm', 'Add Schedule', 'Admin'),
(1618, '2025-01-21 10:20:48', '3:00 pm', 'Delete  Schedule', 'Admin'),
(1619, '2025-01-21 10:20:50', '12:00 pm', 'Delete  Schedule', 'Admin'),
(1620, '2025-01-21 10:23:38', '4:30 pm to 5:30 pm', 'Add Schedule', 'Admin'),
(1621, '2025-01-21 10:32:25', '1:30 pm to 2:30 pm', 'Add Schedule', 'Admin'),
(1622, '2025-01-21 11:25:45', 'Christine Redoblo', 'Logout', 'Admin'),
(1623, '2025-01-21 11:25:50', 'Christine Redoblo', 'Login', 'Admin'),
(1624, '2025-01-21 11:26:11', '2:30 pm to 4:30 pm', 'Add Schedule', 'Admin'),
(1625, '2025-01-21 11:29:49', 'software ', 'Add Entry subject', 'Admin'),
(1626, '2025-01-21 11:30:47', 'dsadsa', 'Add Entry subject', 'Admin'),
(1627, '2025-01-21 11:30:52', '', 'Delete Subject', 'Admin'),
(1628, '2025-01-21 11:30:53', 'dsadsa', 'Delete Subject', 'Admin'),
(1629, '2025-01-21 13:04:38', 'Christine Redoblo', 'Login', 'Admin'),
(1630, '2025-01-21 13:12:43', 'Christine Redoblo', 'Logout', 'Admin'),
(1631, '2025-01-21 13:12:50', 'Christine Redoblo', 'Login', 'Admin'),
(1632, '2025-01-21 13:21:49', 'Christine Redoblo', 'Login', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `description`) VALUES
(0, 'lab 2', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `teacher` varchar(50) NOT NULL,
  `room` varchar(20) NOT NULL,
  `day` varchar(100) NOT NULL,
  `time` varchar(20) NOT NULL,
  `time_end` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `day1` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `subject`, `teacher`, `room`, `day`, `time`, `time_end`, `type`, `day1`) VALUES
(11, 'itp414', 'lester', 'lab 2', 'Monday Tuesday Thursday', '4:30 pm', '5:30 pm', '', ''),
(12, 'ITP106', 'lester', 'lab 2', 'Friday Saturday Sunday', '1:30 pm', '2:30 pm', '', ''),
(13, 'itp414', 'lester', 'lab 2', 'Monday Thursday Saturday', '2:30 pm', '4:30 pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_category` varchar(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `Lab_hours` varchar(50) NOT NULL,
  `lecture_hours` varchar(50) NOT NULL,
  `total` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_id`, `subject_code`, `subject_title`, `subject_category`, `semester`, `Lab_hours`, `lecture_hours`, `total`) VALUES
(58, 'itp414', 'Accounting 2', 'Major', '1st', '', '', ''),
(59, 'itp414', 'Networking', 'Major', '1st', '', '', ''),
(60, 'ITP106', 'Integrative Programming', 'Major', '1st', '', '', ''),
(61, 'software ', 'engineering ', 'Major', '1st', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE `sy` (
  `sy_id` int(11) NOT NULL,
  `sy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`sy_id`, `sy`) VALUES
(11, '2020-2025');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Academic_Rank` varchar(100) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `Name`, `Academic_Rank`, `Designation`, `Department`) VALUES
(67, 'lester', 'rank 2', 'Information System', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `time_end`
--

CREATE TABLE `time_end` (
  `time_end_id` int(11) NOT NULL,
  `time_end` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `time_end`
--

INSERT INTO `time_end` (`time_end_id`, `time_end`) VALUES
(1, '8:00 am'),
(2, '8:30 am'),
(3, '9:00 am'),
(4, '9:30 am'),
(5, '10:00 am'),
(6, '10:30 am'),
(7, '11:30 am'),
(8, '12:00 pm'),
(9, '12:30 pm'),
(10, '1:00 pm'),
(11, '1:30 pm'),
(12, '2:00 pm'),
(13, '2:30 pm'),
(14, '3:00 pm'),
(36, '8:30 pm'),
(35, '8:00 pm'),
(34, '7:30 pm'),
(33, '7:00 pm'),
(32, '6:30 pm'),
(31, '6:00 pm'),
(30, '5:30 pm'),
(29, '5:00 pm'),
(28, '4:30 pm'),
(27, '4:00 pm'),
(26, '3:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `time_start`
--

CREATE TABLE `time_start` (
  `time_id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `time_start`
--

INSERT INTO `time_start` (`time_id`, `time`) VALUES
(1, '7:30 am'),
(2, '8:00 am'),
(3, '8:30 am'),
(4, '9:00 am'),
(5, '9:30 am'),
(6, '10:00 am'),
(7, '10:30 am'),
(8, '11:00 am'),
(9, '11:30 am'),
(10, '12:00 pm'),
(11, '12:30 pm'),
(12, '1:00 pm'),
(13, '1:30 pm'),
(14, '2:00 pm'),
(15, '2:30 pm'),
(16, '3:00 pm'),
(17, '3:30 pm'),
(18, '4:00 pm'),
(19, '4:30 pm'),
(20, '5:00 pm'),
(21, '5:30 pm'),
(22, '6:00 pm'),
(23, '6:30 pm'),
(24, '7:00 pm'),
(25, '7:30 pm'),
(26, '8:00 pm'),
(27, '8:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `College` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `UserName`, `Password`, `User_Type`, `FirstName`, `LastName`, `College`) VALUES
(6, 'jk', 'jk', 'Admin', 'john kevin', 'lorayna', ''),
(8, 'aki', 'aki', 'User', 'achilles', 'Palma', 'COE'),
(11, 'jkl', 'jkl', 'User', 'john kevin', 'lorayna', 'SAS'),
(12, 'kj', 'kj', 'User', 'kent', 'lorayna', 'SAS'),
(13, 'admin', 'admin', 'Admin', 'Christine', 'Redoblo', 'CIT'),
(14, 'teph', 'teph', 'Admin', 'john kevin ', 'lorayna', 'CIT'),
(15, 'jsmith', 'jsmith123', 'User', 'John', 'Smith', 'SAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departmet`
--
ALTER TABLE `departmet`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`);

--
-- Indexes for table `sy`
--
ALTER TABLE `sy`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `time_end`
--
ALTER TABLE `time_end`
  ADD PRIMARY KEY (`time_end_id`);

--
-- Indexes for table `time_start`
--
ALTER TABLE `time_start`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `departmet`
--
ALTER TABLE `departmet`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1633;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sy`
--
ALTER TABLE `sy`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `time_end`
--
ALTER TABLE `time_end`
  MODIFY `time_end_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `time_start`
--
ALTER TABLE `time_start`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
