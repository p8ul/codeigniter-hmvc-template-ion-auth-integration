-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 12:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `body` text,
  `title` varchar(250) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`body`, `title`, `id`) VALUES
('bears are fuzzy and cute - but don\'\'t try to pet them!', 'Something about bears', 1),
('This is dumb and boring, too.', 'Dumb and boring post', 2);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `dob` datetime NOT NULL,
  `phone` varchar(19) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `district` varchar(120) NOT NULL,
  `membership` varchar(120) NOT NULL,
  `baptism_date` date NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `confirmation_date` date NOT NULL,
  `transfer_date` date NOT NULL,
  `death_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `middle_name`, `dob`, `phone`, `gender`, `district`, `membership`, `baptism_date`, `marital_status`, `confirmation_date`, `transfer_date`, `death_date`, `created_by`, `created_date`) VALUES
(1, 'kinuthia', 'kim', '', '0000-00-00 00:00:00', 'xhr.responseText', 'male', 'thika', 'Full', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00 00:00:00'),
(2, 'kinuthjia', 'kim', 'hj', '0000-00-00 00:00:00', '0719739180', 'male', 'thika', 'Full', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00 00:00:00'),
(3, 'kinuthjia', 'kim', 'hj', '0000-00-00 00:00:00', '0719739180', 'male', 'thika', 'Full', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00 00:00:00'),
(4, 'qwerty', 'kim', 'hj', '0000-00-00 00:00:00', '123456789', 'female', 'Nairobi', 'Adherent', '0000-00-00', 'male', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `gender`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'CvhHjbNtC2QeogGJv5ZFTu', 1268889823, 1501184215, 1, 'Admin', 'istrator', 'ADMIN', '000000000000', ''),
(2, '::1', 'sky@sky.com', '$2y$08$eSffq4qlpQ6ctJu2WxkauuY7JcB18JaEWlysOIbewqUSfHACbgDru', NULL, 'sky@sky.com', NULL, NULL, NULL, NULL, 1500649608, NULL, 1, 'kinuthia', 'Kinamni', 'n/a', '123456789', ''),
(3, '::1', 'admin@asdmin.com', '$2y$08$sOZvYkqiNmdCBRVlNKiN/ORy.A6Q/tAN8JC3ZSpvh5Nn.CRb0JP5C', NULL, 'admin@asdmin.com', NULL, NULL, NULL, NULL, 1500700116, NULL, 1, 'joseph', 'kinyua', 'czc', 'ssdfsdf', ''),
(4, '::1', 'admin@sdfadmin.com', '$2y$08$R53DI1Bagvkrb5SgwtFrLeSGSB2sd.4Oh8r4AFE4CQIrvfc1SOb0u', NULL, 'admin@sdfadmin.com', NULL, NULL, NULL, NULL, 1500719182, NULL, 1, 'kinuthia', 'Kinamni', NULL, '123456789', 'female'),
(5, '::1', 'qwew@tahho.com', '$2y$08$V69EmiTT/ZCfO4uklgLxUuehbjWdALsXKUO1O46Or6wgm1QfKLwNu', NULL, 'qwew@tahho.com', NULL, NULL, NULL, NULL, 1500730628, NULL, 1, 'qweqw', 'wqeqw', NULL, '123', '--'),
(6, '::1', 'qwerty@gmail.com', '$2y$08$paQuXGVNAsDZ8t95AYLRGe7XBr3hQSt117GUcxv2jpFkVW.I1oe2q', NULL, 'qwerty@gmail.com', NULL, NULL, NULL, NULL, 1500732159, NULL, 1, 'kamau', 'qwert', NULL, '1234567', 'male'),
(7, '::1', 'sky@svvky.com', '$2y$08$M1Z6Tj4n1HiT5LgMCLvheuKq4Hem9nrFRPlhxLnMiY.BLPZeavGaO', NULL, 'sky@svvky.com', NULL, NULL, NULL, NULL, 1500776441, NULL, 1, 'kuria', 'Kinamni', NULL, '123456789', 'male'),
(8, '::1', 'paul@paul.com', '$2y$08$7B2jgd2.YUtrKiPe81xwm.x95wCjECs88oQpu/QPRIJf4F.jSSGGS', NULL, 'paul@paul.com', NULL, 'qh.-XH.eVn780i1S-zX6.991822b03599fde39d', 1500798229, NULL, 1500790682, NULL, 1, 'paul', 'kim', 'n/a', '1234567', 'male'),
(9, '::1', 'pasjjjjul@paul.com', '$2y$08$9cKJPz527VtaFuVkf.1dcuPPycnlnMHnSCQTsuhWEg7Rtt7I9I1vm', NULL, 'pasjjjjul@paul.com', NULL, NULL, NULL, NULL, 1500793274, NULL, 1, 'paul', 'kim', 'n/a', '1234567', 'male'),
(10, '::1', 'sqwky@sky.com', '$2y$08$FagXGEsNEaA0oc/fT2wh9e8xBWmnBFTuUeXUm3.Y4IXEr/LPdszLS', NULL, 'sqwky@sky.com', NULL, NULL, NULL, NULL, 1500819237, NULL, 1, 'kinuthia', 'kim', NULL, '123456789', 'male'),
(11, '::1', 'john@doe.com', '$2y$08$RVEx/v7eNgkugZQMRuWE6e6v1zopCxdyxd16T2ZruELudTJtrMM7m', NULL, 'john@doe.com', NULL, NULL, NULL, 'dPDvYVR86jxRtFjbz3SI9.', 1500822192, 1500822222, 1, 'john', 'doe', NULL, '123456789', 'male'),
(12, '::1', 'github@gmail.com', '$2y$08$OhoKsyfsDsgZCnL5DnYGZuV7xXuG44Fmbv0UYi2LJg824YRjyDDqu', NULL, 'github@gmail.com', NULL, NULL, NULL, 'KJndNkSDYwIAMNwZtVDjm.', 1501192320, 1501192354, 1, 'githua', 'phanto', 'n/a', '1234567', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(11, 1, 1),
(12, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(13, 10, 2),
(14, 11, 2),
(16, 12, 1),
(17, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `articles` ADD FULLTEXT KEY `body` (`body`,`title`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
