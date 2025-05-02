-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2025 at 12:48 PM
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
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `room_type` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `guests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_type`, `check_in_date`, `check_out_date`, `guests`) VALUES
(1, 1, 'Junior', '2024-11-03', '2024-11-15', 4),
(2, 2, 'Triple', '2024-11-17', '2024-11-20', 2),
(3, 2, 'Deluxe', '2024-11-17', '2024-11-23', 3),
(4, 3, 'Premium', '2024-11-16', '2024-11-30', 2),
(5, 4, 'Single', '2024-11-09', '2024-11-20', 3),
(6, 4, 'Single', '2024-11-03', '2024-11-12', 1),
(7, 5, 'Double', '2024-12-11', '2024-12-29', 2),
(8, 8, 'Deluxe', '2024-12-14', '2024-12-23', 4),
(9, 3, 'Junior', '2024-12-18', '2024-12-27', 3),
(10, 2, 'Double', '2025-01-23', '2025-01-29', 3),
(11, 1, 'Double', '2025-01-08', '2025-01-15', 2),
(12, 10, 'Single', '2025-01-03', '2025-02-20', 1),
(13, 21, 'Single', '2025-01-03', '2025-02-20', 1),
(14, 7, 'Single', '2025-01-03', '2025-02-20', 1),
(15, 8, 'Single', '2025-01-03', '2025-02-20', 1),
(16, 5, 'Single', '2025-01-03', '2025-02-20', 1),
(17, 8, 'Single', '2025-01-03', '2025-02-20', 1),
(18, 15, 'Single', '2025-01-03', '2025-02-20', 1),
(19, 12, 'Single', '2025-01-03', '2025-02-20', 1),
(20, 11, 'Double', '2025-03-12', '2025-03-30', 4),
(21, 26, 'Double', '2025-02-28', '2025-03-29', 4),
(23, 19, 'Double', '2025-03-07', '2025-03-21', 2),
(24, 19, 'Double', '2025-03-21', '2025-03-20', 4),
(29, 999, 'Junior', '2025-04-17', '2025-04-20', 2),
(30, 999, 'Premium', '2025-04-06', '2025-04-13', 1),
(31, 1000, 'Deluxe', '2025-05-01', '2025-05-10', 3),
(32, 999, 'Deluxe', '2025-04-06', '2025-04-27', 3),
(33, 1000, 'Triple', '2025-04-13', '2025-05-30', 2),
(34, 1000, 'Deluxe', '2025-04-05', '2025-05-04', 2),
(35, 1000, 'Triple', '2025-04-03', '2025-04-19', 2),
(36, 1000, 'Single', '2025-04-06', '2025-04-20', 1),
(37, 1000, 'Double', '2025-04-23', '2025-04-27', 2),
(38, 1000, 'Deluxe', '2025-04-20', '2025-05-11', 2),
(39, 1001, 'Premium', '2025-04-06', '2025-05-11', 3),
(40, 999, 'Premium', '2025-04-13', '2025-05-10', 3),
(41, 1002, 'Deluxe', '2025-04-06', '2025-05-11', 3),
(42, 999, 'Premium', '2025-05-04', '2025-05-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `email`) VALUES
(1, 'shanks', '$2y$10$O5.wQCL8l9hIokQFD9GI5.4JKxwpOh7WLH6CLOg6Fdkz/Il2EFcIW', 0, 'jenny.smith92@gmail.com'),
(2, 'Jimmy', '$2y$10$ejzxQ/0HSPdgY9pI636TSuqj8LOFJjIxUBW41bULfv7TUK85tvwKG', 0, 'tommy_b1987@sky.com'),
(3, 'Teigan', '$2y$10$SSwLJYK/sZLA5H997VCFQeyfbNc7DfNznncTpdvAqU6LwjxnVWfY2', 0, 'alex.roberts21@yahoo.com'),
(4, 'drake', '$2y$10$TTqDVXo4iOLEFyaVVPbVO.S.NiZeyNbj9V9iiUGkWDehsqcCBPYvW', 0, 'mike.hunter938@gmail.com'),
(5, 'kevin', '$2y$10$3kEbjbzC3QQYSPVUrjf7ierHsEer7gLNET9D7Foks9kIqFUFRIKWe', 0, 'sarahw_84@sky.com'),
(6, 'Zoro', '$2y$10$glK/oq9mVPkIZH/PshtoYeSbm3zpDdv99hcfa5utPLZmowrkCtag2', 0, 'zoe.taylor231@yahoo.com'),
(7, 'Naruto', '$2y$10$zC6fRxaDNFCawS25zgLfT.2Bs5Bk.5m64RmrDL16tBT44OIqVCnuu', 0, 'ryan_miles94@gmail.com'),
(8, 'Sanji', '$2y$10$779aSLFCT/0pP4v51VCp6.edLBMSU6QU7.C/JGB0ipM4GQufacR7C', 0, 'grace.j_027@sky.com'),
(10, 'frieren', '$2y$10$qgwthP5p/gXaRGqXzA9oCurkl9z/7DGOU/nooalzngCPj1gmd6Sa.', 0, 'example10@gmail.com'),
(11, 'sungjin', '$2y$10$8kLLJXuRrdBnOt4Ewg8FuOBvDE/zAF4W35IrK9UtA0Y9VoGBjpeCe', 0, 'nathan.jones91@outlook.com'),
(12, 'franky12', '$2y$10$FaVajv/NkjRkbd8ZUZj3/uy1/8nugQJUxGwG0WdykZiN0R.O.Ny4m', 0, 'georgia.clark77@sky.com'),
(13, 'Carrot12', '$2y$10$wkbKHSHC077b/nt2oKkdoOKLqRcWGCwCobuYcK/9h5ejdZcp9q0DW', 0, 'freya.bennett19@sky.com'),
(14, 'Spiderman', '$2y$10$YqInhJPpirxBAz2NlsvVv.QFFDAEW3YMN41Pddapy7u6JHZtEwSBm', 0, 'erin.turner26@sky.com'),
(15, 'example1', '$2y$10$SdWgfJBPhAt9ZCun0wLTgeuVhBu0uf6.BP0aAe5ozIr1wdrV6AynS', 0, 'sebastian_hill67@gmail.com'),
(16, 'example30', '$2y$10$EakQniohGnBEY/VpdHIjc.YEmT.ZVpwpxImVPK3yxSNjPVRgPFXGi', 0, 'example30@gmail.com'),
(17, 'example4', '$2y$10$8whZ2.Eg.UJrJ.Z1z2BZuOW7pXNKrpes.pVWznnqphBuKqFQtRy3K', 0, 'example4@gmail.com'),
(18, 'example6', '$2y$10$vAMuaJtYoYRisXz8QEJCnOMOKDII4MLPBU9hm6yFcO2oJOi9NSWdm', 0, 'example6@gmail.com'),
(19, 'example44', '$2y$10$pwfMK8S.Qh2PpmoQVKiuMuEEjFy/EdK2ONaqtT0wp0AzYe2TYewPK', 0, 'example44@gmail.com'),
(20, 'test1', '$2y$10$pY9UQAYFF4QpJBCky52YyOMW6UJgB8dHFRoCOeTdyxT/is7KFFb9u', 0, 'test1@gmail.com'),
(21, 'example33', '$2y$10$edBMbOpk322NiL7rXFRCuOlmcH93XHOm6GpU.5iGILfZD18LVnRsC', 0, 'example33@gmail.com'),
(22, 'test2', '$2y$10$9iQWf3o4U4uX6WbbfOSlXODDpgf4f5sudMoLvsis2/RqAy/p.GzBa', 0, 'test2@gmail.com'),
(23, 'test3', '$2y$10$CGB4QMGpduRH3H49ef.Dhen5DC6Q0jqMt8X3PdwjjcJl3vDrHYCMO', 0, 'test3@gmail.com'),
(24, 'jeff12', '$2y$10$2mrAAj1tf/6m/rnTPoOCU.r2INnLP.9.A3a1qbKFSLHnlD3MXMU3K', 0, 'Jeff12@sky.com'),
(25, 'example100', '$2y$10$4qfbfUKYldLJ.khzHOCxVOzmpwDeUS8yLk4s4TdsMH/iZeoIQ6QSq', 0, 'example100@gmail.com'),
(26, 'example444', '$2y$10$cZ.JXwP3zmfAQ3uocvhSLusVp.bPx6wulSfNg/IO1RYCBtzrER0NW', 0, 'example444@gmail.com'),
(27, 'ironman45', '$2y$10$YA7K168PrCiA0o6JsQMDT.3DRm5sPxnbe0SWRR3sn4YVs/X0vIOe.', 0, 'steel@yahoo.com'),
(28, 'ironman455', '$2y$10$vTm8X9IGQyOJvz2LUELu8e9GnDDGbAzyYSyXtl2O4gbfCi1mdimni', 0, 'steel3@yahoo.com'),
(29, 'example23', '$2y$10$KeEdlQF952sWZsgY.8nmUeXbRlR860OfFOVHK2AHs.scM5bLFM.cG', 0, 'example23@gmail.com'),
(30, 'test101', '$2y$10$1LvQQ5.aOahtVo.yOJWWEOHKjLz5xaq1G1LXe1vuGEL6sa7A1g/J.', 0, 'test101@gmail.com'),
(31, 'booking1', '$2y$10$2zK7DediU36WSlfJiuuJaOq33laH4gCN3qgx2BPGtYq4Ak5bHgQmC', 0, 'booking1@gmail.com'),
(999, 'System Admin', NULL, 1, 'admin@system.com'),
(1000, 'User12', '$2y$10$P/IXPFGRQQTaODCkRwE7Fu5odfFuxgStjMHGnmW4/BDFTTk7XQ/T.', 0, 'User12@gmail.com'),
(1001, 'RoanoaZ', '$2y$10$LN54YqfRGWSVWO.waFYA4eWckUPoiZO6iGuI7VF3RTJlQJWVpmSHq', 0, 'RoanoaZ160@yahoo.com'),
(1002, 'Luffy23', '$2y$10$ZEdz0HXF5ZSCYIBIiMoXHuh.kEcO7iOj.yUvzEtenGpznP5kVZZ6q', 0, 'Luffy23@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
