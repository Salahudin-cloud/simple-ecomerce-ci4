-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 08:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_date` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `delivery_person` varchar(255) NOT NULL,
  `phone_person` varchar(255) NOT NULL,
  `noreg` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Being Processed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_date`, `delivery_address`, `delivery_person`, `phone_person`, `noreg`, `product_name`, `quantity`, `total`, `status`) VALUES
('2023/03/31 08:54:03 AM', 'Jalan Merpati No.2 ', 'Toni suhendra', '08991238123', 'BGY2P28Y', 'kardus Gelas 120 ml', 3, '54000', 'Being Processed'),
('2023/04/14 08:20:52 AM', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'IULYKI76', 'Air Galon Hexahaq 19 liter', 20, '500000', 'Done'),
('2023/03/29 10:26:20 PM', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'ZL63MT86', 'Air Galon Hexahaq 19 liter', 5, '75000', 'Done'),
('2023/04/03 11:56:12 PM', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'ZO866MWB', 'Air Galon Hexahaq 19 liter', 50, '1250000', 'Done');

--
-- Triggers `delivery`
--
DELIMITER $$
CREATE TRIGGER `update_status` AFTER UPDATE ON `delivery` FOR EACH ROW BEGIN 

UPDATE transaction
SET status = NEW.status
WHERE noreg = NEW.noreg;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `stock`, `price`) VALUES
(1, 'Air Galon Hexahaq 19 liter', 80, 25000),
(2, 'kardus Gelas 120 ml', 47, 18000),
(3, 'kardus Botol 240 ml', 150, 25000),
(4, 'kardus Botol 600 ml', 38, 48000);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `date`, `product_name`, `quantity`) VALUES
(9, '2023/04/03 11:54:04 PM', 'Air Galon Hexahaq 19 liter', 10),
(10, '2023/04/03 11:54:50 PM', 'Air Galon Hexahaq 19 liter', 30);

--
-- Triggers `stock`
--
DELIMITER $$
CREATE TRIGGER `restock` AFTER INSERT ON `stock` FOR EACH ROW BEGIN

UPDATE products SET stock = stock + NEW.quantity WHERE product_name = NEW.product_name;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `noreg` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Being Processed',
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`noreg`, `date`, `person_name`, `phone`, `address`, `product_name`, `quantity`, `total`, `status`, `username`) VALUES
('BGY2P28Y', '2023/03/31 08:54:03 AM', 'Toni suhendra', '08991238123', 'Jalan Merpati No.2 ', 'kardus Gelas 120 ml', 3, '54000', 'Being Processed', 'toni'),
('IULYKI76', '2023/04/14 08:20:52 AM', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Air Galon Hexahaq 19 liter', 20, '500000', 'Done', 'salahudin'),
('ZL63MT86', '2023/03/29 10:26:20 PM', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Air Galon Hexahaq 19 liter', 5, '75000', 'Done', 'salahudin'),
('ZO866MWB', '2023/04/03 11:56:12 PM', 'Muhamamad Salahudin  Al Ayyubi', '+6285713803855', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', 'Air Galon Hexahaq 19 liter', 50, '1250000', 'Done', 'salahudin');

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `buy_items` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN

UPDATE products SET stock = stock - NEW.quantity WHERE product_name = NEW.product_name;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_delivery` AFTER INSERT ON `transaction` FOR EACH ROW BEGIN
  INSERT INTO delivery (delivery_date,delivery_address,delivery_person,phone_person,noreg,product_name,quantity,total,status)
  VALUES (NEW.date,NEW.address,NEW.person_name,NEW.phone,NEW.noreg,NEW.product_name,NEW.quantity,NEW.total,NEW.status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `address`, `phone`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '089991231', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'salahudin', 'Muhamamad Salahudin  Al Ayyubi', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', '+6285713803855', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'toni', 'Toni suhendra', 'Jalan Merpati No.2 ', '08991238123', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'ana123', 'Ana Nia', 'Pinggirejo Wates Magelang Rt 06 Rw 07 Kota Magelang Kecamatan Magelang Utara Kelurahan Wates', '+6285713803855', '276b6c4692e78d4799c12ada515bc3e4', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`noreg`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`noreg`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
