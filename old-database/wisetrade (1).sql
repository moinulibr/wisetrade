-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 04:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisetrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproducts`
--

CREATE TABLE `addproducts` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `sku` varchar(200) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `productid` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `userid` tinyint(3) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `cash` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `bank_amount` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addproducts`
--

INSERT INTO `addproducts` (`id`, `sku`, `price`, `vat`, `discount`, `productid`, `userid`, `stock`, `verified`, `created_at`, `bank_id`, `cash`, `amount`, `bank_amount`, `customerid`) VALUES
(6, 'Bangla and english', 300.00, 5.00, 2.00, 13, 1, 10, 1, '2018-11-21', 1, 0, 0, 0, 1),
(7, 'tHIsisnot1234New', 65000.00, 65.00, 12.00, 13, 1, 50, 1, '2018-11-27', 1, 0, 0, 0, 1),
(8, 'tyuyhuijyguhj', 6513521.00, 98.00, 96.00, 13, 1, 89, 1, '2018-11-27', 1, 0, 0, 0, 1),
(9, 'gjhbjh', 54.00, 2.00, 1.00, 13, 1, 65, 1, '2018-11-27', 1, 0, 0, 0, 1),
(10, 'UNIQUE NUMBER', 6500.00, 5.00, 10.00, 13, 1, 98, 0, '2018-11-27', 4, 500, 6500, 6000, 1),
(11, 'EDITINGINFO', 10000.00, 15.00, 20.00, 10, 1, 35, 0, '2018-11-28', 5, 5000, 10000, 5000, 3),
(12, 'ASS12', 1000.00, 10.00, 50.00, 16, 34, 20, 0, '2018-11-28', 7, 500, 1000, 500, 11),
(13, 'ACb34DddQw', 4000.00, 10.00, 20.00, 13, 34, 50, 0, '2018-11-28', 1, 2000, 4000, 2000, 1),
(14, 'dfdsaefad', 7000.00, 20.00, 20.00, 16, 34, 50, 0, '2018-11-28', 1, 3000, 7000, 4000, 13),
(15, 'jskfdjgdskjflq', 4000.00, 30.00, 40.00, 13, 34, 20, 0, '2018-11-28', 1, 3000, 4000, 1000, 3),
(16, 'IUENHFKJDSBVUF', 5000.00, 10.00, 20.00, 13, 34, 30, 0, '2018-11-28', 11, 3000, 5000, 2000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `account_no` varchar(30) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `balanch` double(8,2) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_no`, `branch`, `balanch`, `created_at`, `updated_at`) VALUES
(1, 'Exam Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-17', '2018-11-18'),
(2, 'Islamic Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-17', '2018-11-18'),
(3, 'Janata Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-17', '2018-11-18'),
(4, 'Markintail Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-18', '2018-11-28'),
(5, 'Basic Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-18', '2018-11-28'),
(6, 'Eastern Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-18', '2018-11-28'),
(7, 'IFIC Bank ltd', '80980450934', 'Mirpur', 100000.00, '2018-11-18', '2018-11-28'),
(8, 'Social Islamic Bank', '45643341', 'Dhanmondi', 34500.00, '2018-11-18', NULL),
(9, 'Bank Asia ltd', '2490458490', 'Mothijel', 345000.00, '2018-11-18', NULL),
(11, 'Dutch Bangla Bank Ltd', '98450344', 'Kawran Bazar', 455500.00, '2018-11-18', NULL),
(12, 'Shahajalal Islamic Bank', '3344556', 'Mirpur', 49854.00, '2018-11-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposits`
--

CREATE TABLE `bank_deposits` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `bankid` tinyint(3) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `usersid` tinyint(3) UNSIGNED DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_deposits`
--

INSERT INTO `bank_deposits` (`id`, `bankid`, `amount`, `date`, `usersid`, `verified`, `created_at`, `updated_at`) VALUES
(1, 2, 9000.00, '2018-11-28', 1, 3, '2018-11-28', '2018-11-28'),
(4, 9, 5000.00, '2018-11-28', 1, 0, '2018-11-28', NULL),
(10, 11, 4566.00, '2018-11-28', 1, 0, '2018-11-28', NULL),
(11, 12, 56000.00, '2018-11-28', 1, 0, '2018-11-28', NULL),
(12, 7, 3000.00, '2018-11-28', 34, 0, '2018-11-28', NULL),
(13, 4, 5500.00, '2018-11-28', 1, 0, '2018-11-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(13) NOT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `contact_person`, `address`, `email`, `contact_number`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'Samith Group', 'Md. Shamim', 'Shahadadhpur, Baddha', 'shamim@gmail.com', '00993344', 1, NULL, NULL),
(2, 'Panna group ', 'Mithun Rahman', 'Mirpur dhaka', 'mithun@gmail.com', '123485094', 1, NULL, NULL),
(3, 'Bangla Tech', 'Kamal', 'Sewrapara, Mirpur', 'kamal@gmail.com', '94058937', 1, NULL, NULL),
(4, 'Bangla tech', 'Mukter', 'Shahabagh, Dhaka', 'mukter@gmail.com', '43243', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_expense`
--

CREATE TABLE `daily_expense` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `projectid` tinyint(3) UNSIGNED DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(156) DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `cash` int(10) UNSIGNED DEFAULT '0',
  `bank_id` tinyint(3) UNSIGNED DEFAULT '0',
  `bank_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `payment_method` tinyint(3) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `usersid` tinyint(3) UNSIGNED DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_expense`
--

INSERT INTO `daily_expense` (`id`, `projectid`, `title`, `description`, `amount`, `cash`, `bank_id`, `bank_amount`, `payment_method`, `date`, `usersid`, `verified`, `created_at`, `updated_at`) VALUES
(31, 0, 'OUR SERVICES', 'dfadsfds', 20000, 20000, 0, 0, NULL, '2018-11-26', 1, 0, '2018-11-26', NULL),
(33, 2, 'OUR SERVICES', 'Extra cost', 10000, 5000, 8, 5000, 3, '2018-11-28', 1, 0, '2018-11-28', NULL),
(35, 4, 'best serv..', 'other cost', 3000, 1000, 11, 2000, 3, '2018-11-28', 1, 1, '2018-11-26', '2018-11-28'),
(36, 5, 'OUR SERVICES', 'cost', 4500, 4000, 1, 500, 3, '2018-11-28', 1, 0, '2018-11-26', '2018-11-28'),
(37, 4, 'OUR SERVICES', 'others cost', 3000, 1000, 3, 2000, 3, '2018-11-28', 1, 0, '2018-11-27', '2018-11-28'),
(38, 2, 'OUR SERVICES', 'cost', 12000, 6000, 9, 6000, 3, '2018-11-28', 1, 0, '2018-11-27', '2018-11-28'),
(39, 5, 'OUR SERVICES', 'sadsa', 2000, 1000, 2, 1000, NULL, '2018-11-27', 1, 1, '2018-11-27', NULL),
(40, 12, 'Fish Transport', 'From Dhaka to Rajbari', 5000, 5000, 0, 0, NULL, '2018-11-28', 1, 1, '2018-11-28', NULL),
(42, 0, 'Fish Transport', 'From Dhaka to Rajbary', 7000, 0, 11, 7000, NULL, '2018-11-28', 1, 1, '2018-11-28', NULL),
(43, 12, 'Fish Transport', 'From Dhaka To Magura', 10000, 0, 12, 10000, NULL, '2018-11-28', 1, 0, '2018-11-28', NULL),
(44, 19, 'OUR SERVICES', 'Road Cost', 20000, 5000, 11, 15000, 3, '2018-11-28', 1, 0, '2018-11-28', NULL),
(45, 2, 'OUR SERVICES', 'dfads', 3000, 0, 2, 3000, 2, '2018-11-28', 1, 0, '2018-11-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `salary` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `userid` tinyint(3) UNSIGNED NOT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `salary`, `status`, `userid`, `verified`) VALUES
(3, 'Hiron Ahmed', 'Computer Operator', 12000.00, 1, 1, 0),
(4, 'Shamim Ahamed', 'APS', 7000.00, 1, 1, 0),
(5, 'Shakib', 'ast.officer', 12000.00, 1, 1, 0),
(6, 'Sifat', 'Ast.Officer', 20000.00, 1, 1, 1),
(7, 'Moinul Islam', 'Sales And Marketing', 12344.00, 1, 1, 0),
(8, 'Kabul', 'Cleaner', 3422.00, 1, 1, 1),
(9, 'Kamal', 'Messanger', 6000.00, 1, 1, 0),
(11, 'Uzal', 'Ast.Officer', 12000.00, 1, 1, 1),
(12, 'Skakil', 'Marketing Officer', 12340.00, 1, 1, 0),
(14, 'Sabbir Rahman', 'Trainy Officer', 7000.00, 1, 1, 0),
(15, 'Nondan', 'Trainy Officer', 12300.00, 1, 1, 0),
(17, 'nondadkf', 'Trainy Officer', 12344.00, 1, 1, 1),
(18, 'Amir Hamza', 'Trainy Officer', 12334.00, 1, 1, 0),
(19, 'Mahamudulliah', 'Messanger', 4500.00, 1, 1, 1),
(20, 'Abul Karim', 'Officer', 233455.00, 1, 1, 0),
(21, 'Mohsin Alam', 'Trainy Officer', 12345.00, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `salesid` tinyint(3) UNSIGNED NOT NULL,
  `payment_method` tinyint(3) UNSIGNED DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `userid` tinyint(3) UNSIGNED NOT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `salesid`, `payment_method`, `amount`, `status`, `userid`, `verified`, `created_at`) VALUES
(2, 3, 3, 800.00, 1, 1, 1, '2018-11-25'),
(9, 3, 1, 123.00, 1, 1, 0, '2018-11-25'),
(10, 3, 1, 98000.00, 1, 1, 0, '2018-11-25'),
(11, 1, 1, 456.63, 1, 1, 1, '2018-11-25'),
(12, 1, 1, 980.00, 1, 1, 1, '2018-11-27'),
(13, 2, 2, 3000.00, 1, 34, 1, '2018-11-28'),
(14, 1, 3, 5000.00, 1, 34, 1, '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `customerid` int(10) UNSIGNED DEFAULT NULL,
  `userid` tinyint(3) UNSIGNED DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `unitid` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `customerid`, `userid`, `verified`, `created_at`, `unitid`) VALUES
(10, 'Yamaha', 'Ei company er bike', NULL, 1, 0, '2018-11-21', 1),
(13, 'New Products', 'Notun Ponno asce', 1, 34, 1, '2018-11-28', 8),
(16, 'Vibes', 'Tv series', 1, 1, 1, '2018-11-28', 7),
(17, 'OUR SERVICES', 'dsafdsf', 2, 34, 1, '2018-11-28', 7);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `customerid`, `date`, `status`, `verified`, `created_at`, `updated_at`) VALUES
(2, 'Man Power', 1, '2018-11-21', 1, 0, '2018-11-20', '2018-11-21'),
(4, 'gov project', 3, '2018-11-18', 0, 0, '2018-11-18', NULL),
(5, 'private project', 2, '2018-11-18', 0, 0, '2018-11-18', NULL),
(9, 'Dhaka project', 1, '2018-11-21', 2, 1, '2018-11-21', NULL),
(11, 'khulna project', 1, '2018-11-21', 2, 1, '2018-11-21', NULL),
(12, 'Fish project', 2, '2018-11-21', 2, 1, '2018-11-21', NULL),
(15, 'car  project', 3, '2018-11-21', 2, 1, '2018-11-21', NULL),
(17, 'Food project', 3, '2018-11-21', 2, 1, '2018-11-21', NULL),
(18, 'Home Development ', 4, '2018-11-21', 2, 1, '2018-11-21', NULL),
(19, 'Road and high way', 2, '2018-11-21', 2, 1, '2018-11-21', NULL),
(23, 'Blood Donate', 4, '2018-11-22', 1, 0, '2018-11-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `employeeid` smallint(5) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `bonus` double(8,2) DEFAULT NULL,
  `penalty` double(8,2) DEFAULT NULL,
  `usersid` tinyint(3) UNSIGNED DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employeeid`, `date`, `amount`, `bonus`, `penalty`, `usersid`, `verified`, `created_at`, `updated_at`) VALUES
(3, 4, '2018-11-21', 816.00, 332.00, 23.00, 1, 1, '2018-11-21', NULL),
(4, 7, '2018-11-24', 12344.00, 3.00, 4.00, 34, 1, '2018-11-24', NULL),
(5, 9, '2018-11-24', 6000.00, 7.00, 8.00, 34, 0, '2018-11-24', NULL),
(6, 15, '2018-11-25', 12300.00, 400.00, 100.00, 1, 1, '2018-11-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `projectid` int(10) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `usersid` tinyint(3) UNSIGNED DEFAULT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customerid`, `projectid`, `date`, `usersid`, `verified`) VALUES
(1, 3, 2, '2018-11-20', 48, 0),
(2, 2, 4, '2018-11-20', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_men`
--

CREATE TABLE `service_men` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `earning` double(8,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customerid` int(10) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_men`
--

INSERT INTO `service_men` (`id`, `title`, `cost`, `earning`, `date`, `customerid`, `created_at`, `updated_at`) VALUES
(2, 'OUR SERVICES', 3455.00, 4334.00, '2018-11-28', 3, '2018-11-22', '2018-11-28'),
(3, 'This service is..', 454345.00, 123.00, '2018-11-22', 2, '2018-11-22', NULL),
(4, 'One tech', 4985.00, 453.00, '2018-11-22', 4, '2018-11-22', '2018-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `verified` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `verified`) VALUES
(1, 'gram', 0, '0000-00-00', 0),
(2, 'kg', 0, '0000-00-00', 0),
(3, 'gram', 0, '0000-00-00', 0),
(7, 'Mile', 1, '2018-11-28', 0),
(8, 'Kilometer', 1, '2018-11-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contract` varchar(13) DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contract`, `type`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$6KMgFYwME3r0TMEGSP7c3OEzKHz3OdpYzjZYAhOUS49en9E0w35XS', '01729108697', 2, 1, '2018-11-15 08:18:37', '2018-11-20 01:01:40', 'CNulv2fh8awM9JvcV4vcNH8qh1JQQGZ6elkcYxOWvHspHJQFxT627vjvwCA7'),
(34, 'Mahabub A Alam', 'user@gmail.com', '$2y$10$pbllkbgx.5MZkBK9W4NDteTn8VQ8X/3SvnuIB73gqdTYLQg1FdmSi', '1234457689', 1, 1, NULL, NULL, 'aIVorseG1G2SpKfY4xG07EK9LNPytlZTi8McDG7HUqw5DKrq2Dx9bg9hf9pa'),
(36, 'Anamul', 'ana@gmail.com', '$2y$10$7uU38IkADV1dQsND2xSfYeqGTY2M1tZNSFFHyUg6W/B0hcLKVyrBu', '096859720', 1, 1, NULL, NULL, NULL),
(37, 'Md Kabir Hossain', 'kabir@gmail.com', '$2y$10$2O6raMgRZm25CBUj9Rr0geHHtu91YNJCMba/aMQ/.p5Bdg7LkoCGO', '009988333', 1, 0, NULL, NULL, NULL),
(39, 'Salam khan', 'salam@gmail.com', '$2y$10$VSvwTizP5CImdupca3mqWeWWalLG3gA16DOXLBAhD9qb.mqB4zh7i', '00112233', 1, 0, NULL, NULL, NULL),
(40, 'Md. Moinul Islam', 'moinulibr@gmail.com', '$2y$10$mPpp5ioUCbAAgWSB896T6.B4xZvY9WUNWBjYQ0XExl2sZI08TcahC', '01712794033', 1, 1, NULL, NULL, NULL),
(41, 'Piku', 'piki@gmail.com', '$2y$10$QAd52m80IYgQZyRL03.OK.ph9e4gX.XD3a2q5qbqiIgrqXH1s4Rzi', '01729108697', 1, 1, NULL, NULL, NULL),
(42, 'Khair Uddin', 'khair@gmail.com', '$2y$10$6Akub7GDHHadusxCe8BgEedr0pZ6eLq5x0plF9C1EY8Ou2LmWJ5O2', '3986509604', 1, 1, NULL, NULL, NULL),
(44, 'Nazim Hossain', 'nazim@gmail.com', '$2y$10$HZxZRKAO7aqCc.ivGVvYCO/qmI4opx3qdv7qFz4tNAOADbAG9ecVu', '45984985', 1, 1, NULL, NULL, NULL),
(45, 'Rakibul Islam', 'rakib@gmail.com', '$2y$10$mhgmB3c9ZyU4mc/0vafOJexcIcaz.jA2aaSEc.WvC4kxxZTRC6zP6', '0394885932', 1, 1, NULL, NULL, NULL),
(46, 'Abdul Malik', 'malik@gmail.com', '$2y$10$U2macFL2KOb8a5O6lcvlmOZYMcE1jwcDYBu8/lciM9RP4V6nNiKrK', '1233456', 1, 1, NULL, NULL, NULL),
(47, 'Mukter', 'muk@gmail.com', '$2y$10$Wl9qiaqt6tdjD07DBeA6fuvAkp7ZsFm0lDAqYfJ8hvNAwlHNYl6Pq', '123345667', 1, 1, NULL, NULL, NULL),
(48, 'Al Mamun', 'manum@gmail.com', '$2y$10$Hq7fvBSFgPJyn/4c8LG8E.548ga6zK/QW4ud4z2G2LpthCieaT3re', '12344556', 1, 0, NULL, NULL, NULL),
(49, 'Abdullah Al Masud', 'abdul@gmail.com', '$2y$10$Fj7h0fd98pAMCnqS.sldWuClAnnq8yziaAx4YIsdHx7Sb0GjMPqaq', '01729108697', 2, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproducts`
--
ALTER TABLE `addproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bankid` (`bank_id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankid` (`bankid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_expense`
--
ALTER TABLE `daily_expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesid` (`salesid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `unitid` (`unitid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `projectid` (`projectid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `service_men`
--
ALTER TABLE `service_men`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproducts`
--
ALTER TABLE `addproducts`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daily_expense`
--
ALTER TABLE `daily_expense`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_men`
--
ALTER TABLE `service_men`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_deposits`
--
ALTER TABLE `bank_deposits`
  ADD CONSTRAINT `bank_deposits_ibfk_1` FOREIGN KEY (`bankid`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `bank_deposits_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `daily_expense`
--
ALTER TABLE `daily_expense`
  ADD CONSTRAINT `daily_expense_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `salary_ibfk_3` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`projectid`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `service_men`
--
ALTER TABLE `service_men`
  ADD CONSTRAINT `service_men_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
