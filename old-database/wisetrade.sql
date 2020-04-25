-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 01:21 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `additional_products`
--

CREATE TABLE `additional_products` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `productsid` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bankid` int(11) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentid` int(11) DEFAULT NULL,
  `daily_expenseid` int(11) DEFAULT NULL,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `debit_credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentid` int(11) DEFAULT NULL,
  `daily_expenseid` int(11) DEFAULT NULL,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `debit_credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_expense`
--

CREATE TABLE `daily_expense` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `projectsid` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `paymentmethod` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_13_104102_create_additional_products_table', 1),
(2, '2018_11_13_104102_create_bank_deposit_table', 1),
(3, '2018_11_13_104102_create_bank_table', 1),
(4, '2018_11_13_104102_create_cash_table', 1),
(5, '2018_11_13_104102_create_customers_table', 1),
(6, '2018_11_13_104102_create_daily_expense_table', 1),
(7, '2018_11_13_104102_create_employee_table', 1),
(8, '2018_11_13_104102_create_payment_table', 1),
(9, '2018_11_13_104102_create_products_table', 1),
(10, '2018_11_13_104102_create_projects_table', 1),
(11, '2018_11_13_104102_create_salary_table', 1),
(12, '2018_11_13_104102_create_sales_table', 1),
(13, '2018_11_13_104102_create_salesdetails_table', 1),
(14, '2018_11_13_104102_create_users_table', 1),
(15, '2018_11_13_104111_add_foreign_keys_to_additional_products_table', 1),
(16, '2018_11_13_104111_add_foreign_keys_to_bank_deposit_table', 1),
(17, '2018_11_13_104111_add_foreign_keys_to_cash_table', 1),
(18, '2018_11_13_104111_add_foreign_keys_to_daily_expense_table', 1),
(19, '2018_11_13_104111_add_foreign_keys_to_employee_table', 1),
(20, '2018_11_13_104111_add_foreign_keys_to_payment_table', 1),
(21, '2018_11_13_104111_add_foreign_keys_to_products_table', 1),
(22, '2018_11_13_104111_add_foreign_keys_to_projects_table', 1),
(23, '2018_11_13_104111_add_foreign_keys_to_salary_table', 1),
(24, '2018_11_13_104111_add_foreign_keys_to_sales_table', 1),
(25, '2018_11_13_104111_add_foreign_keys_to_salesdetails_table', 1),
(26, '2018_11_13_121859_create_additional_products_table', 0),
(27, '2018_11_13_121859_create_bank_table', 0),
(28, '2018_11_13_121859_create_bank_deposit_table', 0),
(29, '2018_11_13_121859_create_cash_table', 0),
(30, '2018_11_13_121859_create_customers_table', 0),
(31, '2018_11_13_121859_create_daily_expense_table', 0),
(32, '2018_11_13_121859_create_employee_table', 0),
(33, '2018_11_13_121859_create_password_resets_table', 0),
(34, '2018_11_13_121859_create_payment_table', 0),
(35, '2018_11_13_121859_create_products_table', 0),
(36, '2018_11_13_121859_create_projects_table', 0),
(37, '2018_11_13_121859_create_salary_table', 0),
(38, '2018_11_13_121859_create_sales_table', 0),
(39, '2018_11_13_121859_create_salesdetails_table', 0),
(40, '2018_11_13_121859_create_users_table', 0),
(41, '2018_11_13_121903_add_foreign_keys_to_additional_products_table', 0),
(42, '2018_11_13_121903_add_foreign_keys_to_bank_deposit_table', 0),
(43, '2018_11_13_121903_add_foreign_keys_to_cash_table', 0),
(44, '2018_11_13_121903_add_foreign_keys_to_daily_expense_table', 0),
(45, '2018_11_13_121903_add_foreign_keys_to_employee_table', 0),
(46, '2018_11_13_121903_add_foreign_keys_to_payment_table', 0),
(47, '2018_11_13_121903_add_foreign_keys_to_products_table', 0),
(48, '2018_11_13_121903_add_foreign_keys_to_projects_table', 0),
(49, '2018_11_13_121903_add_foreign_keys_to_salary_table', 0),
(50, '2018_11_13_121903_add_foreign_keys_to_sales_table', 0),
(51, '2018_11_13_121903_add_foreign_keys_to_salesdetails_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salesid` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `customersid` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customersid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double(10,2) DEFAULT NULL,
  `bonus` double(10,2) DEFAULT NULL,
  `penalty` double(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bankid` int(11) DEFAULT NULL,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customersid` int(11) DEFAULT NULL,
  `projectsid` int(11) DEFAULT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usersid` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salesid` int(11) DEFAULT NULL,
  `productsid` int(11) DEFAULT NULL,
  `vat` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_products`
--
ALTER TABLE `additional_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productsid` (`productsid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankid` (`bankid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`),
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
  ADD KEY `projectsid` (`projectsid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesid` (`salesid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customersid` (`customersid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customersid` (`customersid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeid` (`employeeid`),
  ADD KEY `bankid` (`bankid`),
  ADD KEY `usersid` (`usersid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customersid` (`customersid`),
  ADD KEY `projectsid` (`projectsid`);

--
-- Indexes for table `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesid` (`salesid`),
  ADD KEY `productsid` (`productsid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_products`
--
ALTER TABLE `additional_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_expense`
--
ALTER TABLE `daily_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_products`
--
ALTER TABLE `additional_products`
  ADD CONSTRAINT `additional_products_ibfk_1` FOREIGN KEY (`productsid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `additional_products_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD CONSTRAINT `bank_deposit_ibfk_1` FOREIGN KEY (`bankid`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `bank_deposit_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `cash`
--
ALTER TABLE `cash`
  ADD CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `daily_expense`
--
ALTER TABLE `daily_expense`
  ADD CONSTRAINT `daily_expense_ibfk_1` FOREIGN KEY (`projectsid`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `daily_expense_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`bankid`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `salary_ibfk_3` FOREIGN KEY (`usersid`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customersid`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`projectsid`) REFERENCES `projects` (`id`);

--
-- Constraints for table `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD CONSTRAINT `salesdetails_ibfk_1` FOREIGN KEY (`salesid`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `salesdetails_ibfk_2` FOREIGN KEY (`productsid`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
