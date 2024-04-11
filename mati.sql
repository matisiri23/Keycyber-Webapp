-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Task_id` int(8) NOT NULL,
  `Task_name` varchar(512) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `taskdate` date NOT NULL,
  `Due_date` date NOT NULL,
  `Priority` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `assigned_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Task_id`, `Task_name`, `Description`, `taskdate`, `Due_date`, `Priority`, `Status`, `assigned_by`) VALUES
(13, 'photocopy', 'clot', '2024-04-07', '2024-05-04', '3', 'In Progress', 'test'),
(15, 'bomboclout', 'fdfd', '2024-04-08', '2024-04-10', 'Medium', 'Completed', 'mark'),
(16, 'bomboclout', 'dgdfg', '2024-04-08', '2024-04-11', 'Medium', 'Completed', 'mark');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(8) NOT NULL,
  `First_name` varchar(512) NOT NULL,
  `Last_name` varchar(512) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `First_name`, `Last_name`, `Email`, `Password`, `User_type`) VALUES
(75, 'mark', 'Dhoni', 'dhoni@csk.com', '$2y$10$4BWcrglw41V6mid.frnWkODKH8m5qPQxCJn/C09RaPsB7Ca1zxVN6', 'Admin'),
(77, 'test', 'test', 'test@test.com', 'test', ''),
(78, 'mark', 'Dhoni', 'dhoni@csk.com', '$2y$10$wwSmteKH469nobuXC1FZ0OKwITjfPo0Vq84UEyKJM0uRXsU5VL5Vi', 'User'),
(79, 'mark', 'Dhoni', 'dhoni@csk.com', '$2y$10$8.RrX/B6y5EN7sS7524zKuxfr0x5w/CO3j.36P7RA5gig4UMyvHsO', 'User'),
(80, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$88XiunzHkfHQn.gAbQPQaeBOT4DHxFEfwLjymKK6W1Dji7q9LpKCS', 'Admin'),
(81, 'sha', 'siri', 'm4tuzzo23@gmail.com', '$2y$10$dYAkASrCcsesbdMWvgf1M.cFM3FOR7wt4kdJ69SHedbJcMptxtEJu', 'Admin'),
(82, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$JQPT22w/MYOZB/d6YDv1L.AXfG2bxhurGoHszIF9Kst6e7toV60C2', 'Admin'),
(83, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$fDbNd0FI4AKHblGV4GDMuOaFNCwuBcbHVZeVRih7duiVw9DfwxyGa', 'Admin'),
(84, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$iGH.pz5hYkwUGnk9zsvXh.GgSq6VPu1LV2eRZej.BE2mnGBhzTaZ6', 'Admin'),
(85, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$.gT3ZYxOYcFA1s0hghVnlOmPKZ/luyvZzRa/np1dILE2neOmka2Sm', 'Admin'),
(86, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$yiWARqB/spFPrJakcd7Ymu.K/3Z26Wfh7jSv/3SZdaMxU2gLEw3XG', 'Admin'),
(87, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$kONmSpz/2uqtFDWuUgVuO.pOU09Tnp3Zwttz2su1ibUDXtSlZK1La', 'Admin'),
(88, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$xhVaDe6ydtp7umLfEY7T1eRsD5KBomf1HyLE0J2AlQnk4TLJXFYii', 'Admin'),
(89, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$8K1z4DLu8vhSEixscVrkSuj5ba.k5R4f9gBeLooAVfLTuFkIvozqa', 'Admin'),
(90, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$nb6ezKoNuMYtH9KWO0VsXeGmoZ2Tji1wsP0cVLUWHRhW1X4APixUq', 'Admin'),
(91, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$6qaM/aJvFWcXE2DI8VCLt.0UJSENMAcUXk/dH6SOGtRY6VIXegsR2', 'Admin'),
(92, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$HNbYPgav661MRJ1vjtF6Fu.vKr/LORqPGXN4h01KLK7IRZYJz0UF2', 'Admin'),
(93, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$6qyXGy5uQeQq6muC6T7oF.XWff/DImeJ108gYCI7lInoKP/U0h42e', 'Admin'),
(94, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$.14NzfHpyJPzCUZEh.dro.wBA03EFDa.GJzq9S3YVY1A4AYQoET.q', 'Admin'),
(95, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$jRBQpZNih5V4kg266Fwl0uHOdIfUCHtzj98/udpPeCRom5AbNOK6q', 'Admin'),
(96, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$bpnc4bc73AP8VHA1L3TcCuk.WjpWi41eiKQnv8sBi8XR5SZSNyB1a', 'Admin'),
(97, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$ZfNIcjBYReS9IeQR438skOxUaMePfG.hhOXZbicYZMCtk/0kkduTi', 'Admin'),
(98, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$N4uLIQ0V7zLBe.HYzkdAheEQfAI1UIdPTFyisN.rmSnwXzzIbKrFa', 'Admin'),
(99, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$UGrZkCBI268Di8HpJ3PsXOBv6NR1QfNwUQA8k9IUuFn4LFRiNFmCW', 'Admin'),
(100, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$OXbucpE5.gSnXt7vrr0aFulTF91sA9RL0lgsNLrr9RCLJUDMM4jQ.', 'Admin'),
(101, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$wk4bhYxU8hM5hHHRpeNVeetetqISqXe4By4Ms20egiu10fetu5E6C', 'Admin'),
(102, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$Y3nWM3W7E9JXeyJ8zfhIv.fLe514TH0yBzkex/Z5/CkBpxkp3CkRy', 'Admin'),
(103, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$UCDQENBlZKHNSQrP2UzxWuiA3sQ7cpnNAi.p.EZ7b1i/Ymbe.91La', 'Admin'),
(104, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$o9O49.4miGKrhOKTo1fIY.Vzdu8JpfgZbKXTnG7L4P.Bp7YSmoBIa', 'Admin'),
(105, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$/SSxzhW6Jh8I/jaZ4ZZO3ueEP.G5gxoHDnQEHpueEhFRl3DPJZzum', 'Admin'),
(106, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$w38wxDLI2/wlRyQhNOJsCOx1c4fZxfr0rG6fVyGuG7PyRwpMa/IAm', 'Admin'),
(107, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$CbDjlov2PyQ5TzuU84YA9u5pTLQvafNTtpF8cwCP8j0RogUYwR75W', 'Admin'),
(108, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$jkc/PFNedOc/M6l1eV8NoePsUixVN6L8iaym3P7pw3XEjxk1Fy80C', 'Admin'),
(109, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$GPcsDsgl1alUDEazSWoI6O5tqQjZY8MmM3KE/KA0Tnh7oMsth//7.', 'Admin'),
(110, 'matisha', 'temiya', 'justmati02@gmail.com', '$2y$10$BV/iE.xBcdVa4Ju.SEsfiuw5gBwcC34nytbBsU3aF2xM.h6/PYFTm', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Error reading structure for table mati.users: #1932 - Table 'mati.users' doesn't exist in engine
-- Error reading data for table mati.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `mati`.`users`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Task_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Task_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
