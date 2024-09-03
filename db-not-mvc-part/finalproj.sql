-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 11:34 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ujjen Bania', 'ujjenms.bania@gmail.com', '$2y$10$uhixBYrLikb.jKnA9kt0SeHjqYv6ICQZmygY9dN90HRr8FWLagDpa', 0, 'xPMlC9pqdV9ejvGIHeJs5zTIoIfm3KSwXo2FILwSqzTel4XXny2vrOsutSEV', NULL, '2017-10-04 04:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `avg_rate` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `user_id`, `avg_rate`, `created_at`, `updated_at`) VALUES
(75, 'Geography', 8, 3.6667, '2017-10-15 23:22:51', '2017-10-16 03:53:55'),
(76, 'History', 8, 5, '2017-10-15 23:32:09', '2017-10-15 23:58:53'),
(78, 'Computer Ethics', 10, 3.5, '2017-10-15 23:50:40', '2017-10-16 02:20:20'),
(79, 'Php', 8, NULL, '2017-10-16 03:55:13', '2017-10-16 03:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_04_092907_CreateAdminTable', 2),
(4, '2017_10_05_035415_create_roles_table', 3),
(5, '2017_10_05_035456_create_role_users_table', 3),
(6, '2017_10_06_050420_CreateCategoryTable', 4),
(7, '2017_10_06_101411_CreateQuestionsTable', 5),
(8, '2017_10_09_035020_CreateQuiztakenTable', 6),
(9, '2017_10_09_043245_CreateQuiztakensTable', 7),
(10, '2017_10_09_064413_CreateRatingTable', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('johnny.henei@gmail.com', '$2y$10$88MnD9Y4wkwzSgYm2fL4YON2wdeBhcYwBeZ0JR7Zvi0CfPv2Is7EC', '2017-10-04 04:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category_id`, `created_at`, `updated_at`) VALUES
(38, 'What is the capital of Pakistan?', 'Islamabad', 'Kabul', 'Kathmandu', 'Berlin', 1, 75, '2017-10-15 23:24:18', '2017-10-15 23:24:18'),
(39, 'Which international river flows through Argentina, Bolivia and Paraguay?', 'Rio Negro', 'Orinoco', 'Putumayo', 'Pilcomaya', 4, 75, '2017-10-15 23:26:23', '2017-10-15 23:26:23'),
(40, 'What is the longest river in South America?', 'Bagmati', 'Amazon', 'Missisipi', 'Ganga', 2, 75, '2017-10-15 23:28:17', '2017-10-15 23:28:17'),
(41, 'What is Earth\'s largest continent by population?', 'Africa', 'Asia', 'Europe', 'Australia', 2, 75, '2017-10-15 23:29:16', '2017-10-15 23:29:16'),
(42, 'What is Earth\'s largest continent by surface size?', 'North America', 'Europe', 'Antartica', 'Asia', 4, 75, '2017-10-15 23:29:55', '2017-10-15 23:29:55'),
(43, 'Jack Ruby became known for assassinating which person?', 'John Lennon', 'Lee Harvey Oswald', 'Robert F. Kennedy', 'Jesse James', 2, 76, '2017-10-15 23:33:06', '2017-10-15 23:33:06'),
(44, 'Who was the Prime Minister of the United Kingdom when NATO was founded?', 'Anthony Eden', 'Winston Churchill', 'Clement Attlee', 'Harold Macmillian', 3, 76, '2017-10-15 23:34:59', '2017-10-15 23:34:59'),
(45, 'Up to 2014, which continent has had the most UN Peacekeeping missions?', 'Europe', 'Africa', 'Asia', 'North America', 2, 76, '2017-10-15 23:36:03', '2017-10-15 23:36:03'),
(46, 'Napoleon Bonaparte suffered a major defeat when he led the French to invade which country on 24 June 1812?', 'England', 'Spain', 'United Stated', 'Russia', 4, 76, '2017-10-15 23:37:49', '2017-10-15 23:37:49'),
(51, 'What are computer ethics?', 'An honest, moral code that should be followed when on the computer', 'A computer program about honesty', 'A computer that fits on or under a desk', 'A list of commandments in the Bible', 1, 78, '2017-10-15 23:51:17', '2017-10-15 23:51:17'),
(52, 'Thou shalt not copy ___________________________ software or materials', 'Public-domain', 'Copyrighted', 'Self created', 'Self published', 2, 78, '2017-10-15 23:52:32', '2017-10-15 23:52:32'),
(53, 'What is NOT an example of cyberbullying?', 'Creating an embarassing picture of your classmate and posting it', 'Sending someone a mean text', 'Bullying someone in the hallway', 'Threatening someone in an instant message', 3, 78, '2017-10-15 23:55:53', '2017-10-15 23:55:53'),
(54, 'Sfgsdf', 'Asfasdf', 'Asdfadsf', 'Asdfasdf', 'Asdfasd', 2, 79, '2017-10-16 03:55:38', '2017-10-16 03:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `quiztakens`
--

CREATE TABLE `quiztakens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `incorrect` int(11) NOT NULL,
  `no_attempt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiztakens`
--

INSERT INTO `quiztakens` (`id`, `user_id`, `category_id`, `score`, `correct`, `incorrect`, `no_attempt`, `created_at`, `updated_at`) VALUES
(74, 9, 75, 100, 5, 0, 0, '2017-10-15 23:38:46', '2017-10-15 23:38:46'),
(75, 11, 78, 100, 3, 0, 0, '2017-10-15 23:57:26', '2017-10-15 23:57:26'),
(76, 11, 75, 60, 3, 2, 0, '2017-10-15 23:58:05', '2017-10-15 23:58:05'),
(77, 11, 76, 75, 3, 1, 0, '2017-10-15 23:58:44', '2017-10-15 23:58:44'),
(78, 9, 78, 67, 2, 1, 0, '2017-10-16 02:20:06', '2017-10-16 02:20:06'),
(79, 9, 75, 20, 1, 0, 4, '2017-10-16 03:52:14', '2017-10-16 03:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rate`, `comment`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(20, 5, 'Amazing quiz.', 9, 75, '2017-10-15 23:38:55', '2017-10-15 23:38:55'),
(21, 4, 'It was good', 11, 78, '2017-10-15 23:57:40', '2017-10-15 23:57:40'),
(22, 3, 'It was hard', 11, 75, '2017-10-15 23:58:16', '2017-10-15 23:58:16'),
(23, 5, 'Nice quiz', 11, 76, '2017-10-15 23:58:53', '2017-10-15 23:58:53'),
(24, 3, 'Questions should be added', 9, 78, '2017-10-16 02:20:20', '2017-10-16 02:20:20'),
(25, 3, 'Nice', 9, 75, '2017-10-16 03:53:55', '2017-10-16 03:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'teacher', NULL, NULL),
(2, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 8, '2017-10-15 23:22:19', '2017-10-15 23:22:19'),
(8, 2, 9, '2017-10-15 23:38:12', '2017-10-15 23:38:12'),
(9, 1, 10, '2017-10-15 23:39:41', '2017-10-15 23:39:41'),
(10, 2, 11, '2017-10-15 23:56:38', '2017-10-15 23:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `quiz_involved` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission`, `quiz_involved`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'John Henry', 'johnny.henei@gmail.com', '$2y$10$81H059R.kOMlj93l7F7qaenqWpfPBZ4NDj9B./5jLTUz6R3r0I.0i', 1, 3, 'OlKQrJ3lY0vlRxcuAvQlcVgPJivK63eeGw77C9WTxOS3GNDng1Wz11kUTKbU', '2017-10-15 23:22:19', '2017-10-16 03:55:13'),
(9, 'William Gallas', 'william@gmail.com', '$2y$10$QGHiid6YhH2zo96SKc.mleCOxWMhsll8XCxh503xOHJyct13ri9ZO', 2, 3, 'GjENx1TFEizfxCMiSTYTWgqoqIgC0tOmOffMbUUrsaDBrWyVrUEbAeD3Dnjy', '2017-10-15 23:38:12', '2017-10-16 03:52:14'),
(10, 'George Bust', 'george@gmail.com', '$2y$10$b3pTLb2zbN6GYlcSi2oMbuzIXM087VGRrMkLn/sZorBWSAxNOu6p2', 1, 1, 'r9mXIp0NDsSTqZXy8dUFcwXsUrnLeyMz0n7X0Gf6r1FGFgMPH6uKYXGyvg22', '2017-10-15 23:39:41', '2017-10-15 23:41:10'),
(11, 'Fatima Green', 'green@gmail.com', '$2y$10$7RQa75N5FLAPZ.4mQVZ5lOT5/rkXL3AvZ54ZN03QGJp8gTvYldWri', 2, 3, '4WMUctJnaVbyTz8RbKvoKzD6Mof9PcYbjhsBVNxujCCCGYboKYIm1rxiiLpg', '2017-10-15 23:56:38', '2017-10-15 23:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_ibfk_1` (`user_id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `quiztakens`
--
ALTER TABLE `quiztakens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `quiztakens`
--
ALTER TABLE `quiztakens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiztakens`
--
ALTER TABLE `quiztakens`
  ADD CONSTRAINT `quiztakens_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiztakens_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
