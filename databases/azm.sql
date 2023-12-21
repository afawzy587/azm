-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 11:34 PM
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
-- Database: `azm`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` text NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `img`, `content`, `user_id`, `create_at`) VALUES
(1, 'My Experience After Three Years of Migration from PHP to Golang Language', './uploads/1703197254_1_QDPOEePo7UiS9eDY4iyKhA.webp', 'PHP has a lot of facilities and development is super fast. even if you know about CakePHP, it just needs to define a database, and then boom!!, everything becomes perfect. It will make a model, controller, and view by a single command.\r\nBut in maintenance it was terrible and in a high TPS system, it became a disaster. Yes Mr. PHP FPM I have you. PHP fpm uses CPU and RAM in high requests and will ruin our server.\r\nI need some thing super small, fast, and reliable. Golang is one of the languages I have ever seen. It is super small and super fast. But you need to have deep knowledge about software engineering and design patterns.\r\nWhen we want to write a docker-compose for PHP, It will be dirty and hard but in Golang it just becomes 10 lines. and also the volume of the Golang microservice is less than 200 MB but the PHP container becomes to 2GB.', 3, '2023-12-22 00:20:54'),
(2, 'AEGIS Encryption with PHP Sodium Extension', './uploads/1703197563_aegis-php84-ext-sodium.webp', 'AEGIS is an AES-based family of authenticated encryption algorithms that are significantly faster than ubiquitous algorithms such as AES-GCM and CHACHA20-POLY1305. The Sodium extension in PHP 8.4 supports&amp;nbsp;AEGIS-128L&amp;nbsp;and&amp;nbsp;AEGIS-256&amp;nbsp;encryption algorithms if the Sodium extension is compiled with&amp;nbsp;libsodium&amp;nbsp;1.0.19 or later.\r\nThe two encryption algorithms in the AEGIS family,&amp;nbsp;AEGIS-128L&amp;nbsp;and&amp;nbsp;AEGIS-256, are 2-3 times faster than AES-GCM, and 3-4 times faster than the CHACHA20-POLY1305 algorithms. They leverage hardware AES acceleration on&amp;nbsp;x86_64&amp;nbsp;and&amp;nbsp;aarch64&amp;nbsp;(64-bit ARM architecture) CPU architectures.\r\nThe&amp;nbsp;AEGIS paper&amp;nbsp;provides detailed information about the inner workings of the algorithms.', 3, '2023-12-22 00:26:03'),
(3, 'Tell, Don’t Ask” principle — All You Need to Know', './uploads/1703197742_0_FUBf-LxAcU5HtvnL.webp', 'Have you ever heard of the &amp;ldquo;Tell, Don&amp;rsquo;t Ask&amp;rdquo; principle?\r\nThe general idea is that you should avoid asking an object a question about itself to make another decision about something you are going to do with that object. Instead, you should push that responsibility into that object, so you can just tell it what you need without asking questions first.\r\nThe &amp;ldquo;Tell, Don&amp;rsquo;t Ask&amp;rdquo; principle encourages instructing objects to perform tasks rather than querying them for information and making decisions externally.', 2, '2023-12-22 00:29:02'),
(4, 'Larawiz just got a new (old) home', './uploads/1703197892_0_XP2lXFlWp6OIbjPT.webp', 'The PHP language has come a long way in its development. Programming in this language is quite different from how you tried to build your first website in 2005. It&amp;rsquo;s now a mature language with mature solutions tested in real-world conditions.\r\nIn this article, I would like to show you what dependency injection is, using PHP as an example, and why it&amp;rsquo;s a &amp;lsquo;must-have&amp;rsquo; in a programmer&amp;rsquo;s knowledge.\r\nCohesion and coupling\r\nWe can&amp;rsquo;t discuss dependency injection without explaining what cohesion and coupling are.\r\nCoupling&amp;nbsp;refers to the degree of interdependence or connectivity between different components or modules in a software system. In other words, it measures how much one module relies on or is aware of the internal details of another module.\r\n\r\nLow Coupling:&amp;nbsp;This is the ideal state where modules are loosely connected and do not rely heavily on each other. Changes to one module have minimal impact on other modules. Low coupling promotes code reusability and maintainability.\r\nHigh Coupling:&amp;nbsp;High coupling occurs when modules are tightly connected, and changes in one module can have a significant impact on other modules. This can make the system fragile and difficult to change without unintended consequences.\r\n\r\nCohesion, on the other hand, measures how closely the responsibilities and functions within a module are related to each other. In essence, it determines how well a module&amp;rsquo;s internal elements are focused on a single, well-defined task.\r\n\r\nLow Cohesion: Low cohesion occurs when the elements within a module have little or no meaningful relationship to each other and may be responsible for multiple, unrelated tasks. In a module with low cohesion, you typically find a mix of functions or methods that don&amp;rsquo;t have a clear and consistent purpose or theme.\r\nHigh cohesion&amp;nbsp;is the opposite of low cohesion and represents a desirable design characteristic. It occurs when the elements within a module are closely related and focused on a single, well-defined task or responsibility.', 2, '2023-12-22 00:31:32'),
(5, 'PHP isn’t that bad, so why the hate?', './uploads/1703197949_1_v-LEGfEnzSHtJ7ocIlLvog.webp', '<p id=\"c2aa\" class=\"pw-post-body-paragraph adm adn yz ado b adp afe adr ads adt aff adv adw nr afg ady adz nv afh aeb aec nz afi aee aef aeg nl bj\" data-selectable-paragraph=\"\">The PHP language has come a long way in its development. Programming in this language is quite different from how you tried to build your first website in 2005. It&rsquo;s now a mature language with mature solutions tested in real-world conditions.</p>\n<p id=\"635d\" class=\"pw-post-body-paragraph adm adn yz ado b adp adq adr ads adt adu adv adw nr adx ady adz nv aea aeb aec nz aed aee aef aeg nl bj\" data-selectable-paragraph=\"\">In this article, I would like to show you what dependency injection is, using PHP as an example, and why it&rsquo;s a &lsquo;must-have&rsquo; in a programmer&rsquo;s knowledge.</p>\n<h1 id=\"917a\" class=\"aev aew yz be aex kw aey kx ky kz aez la lb lc afa ld le lf afb lg lh li afc lj lk afd bj\" data-selectable-paragraph=\"\">Cohesion and coupling</h1>\n<p id=\"a58c\" class=\"pw-post-body-paragraph adm adn yz ado b adp afe adr ads adt aff adv adw nr afg ady adz nv afh aeb aec nz afi aee aef aeg nl bj\" data-selectable-paragraph=\"\">We can&rsquo;t discuss dependency injection without explaining what cohesion and coupling are.</p>\n<p id=\"a35a\" class=\"pw-post-body-paragraph adm adn yz ado b adp adq adr ads adt adu adv adw nr adx ady adz nv aea aeb aec nz aed aee aef aeg nl bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">Coupling</strong>&nbsp;refers to the degree of interdependence or connectivity between different components or modules in a software system. In other words, it measures how much one module relies on or is aware of the internal details of another module.</p>\n<ul class=\"\">\n<li id=\"1ed4\" class=\"adm adn yz ado b adp adq adr ads adt adu adv adw nr adx ady adz nv aea aeb aec nz aed aee aef aeg afk afl afm bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">Low Coupling:</strong>&nbsp;This is the ideal state where modules are loosely connected and do not rely heavily on each other. Changes to one module have minimal impact on other modules. Low coupling promotes code reusability and maintainability.</li>\n<li id=\"866a\" class=\"adm adn yz ado b adp afn adr ads adt afo adv adw nr afp ady adz nv afq aeb aec nz afr aee aef aeg afk afl afm bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">High Coupling:</strong>&nbsp;High coupling occurs when modules are tightly connected, and changes in one module can have a significant impact on other modules. This can make the system fragile and difficult to change without unintended consequences.</li>\n</ul>\n<p id=\"719b\" class=\"pw-post-body-paragraph adm adn yz ado b adp adq adr ads adt adu adv adw nr adx ady adz nv aea aeb aec nz aed aee aef aeg nl bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">Cohesion</strong>, on the other hand, measures how closely the responsibilities and functions within a module are related to each other. In essence, it determines how well a module&rsquo;s internal elements are focused on a single, well-defined task.</p>\n<ul class=\"\">\n<li id=\"19ff\" class=\"adm adn yz ado b adp adq adr ads adt adu adv adw nr adx ady adz nv aea aeb aec nz aed aee aef aeg afk afl afm bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">Low Cohesion</strong>: Low cohesion occurs when the elements within a module have little or no meaningful relationship to each other and may be responsible for multiple, unrelated tasks. In a module with low cohesion, you typically find a mix of functions or methods that don&rsquo;t have a clear and consistent purpose or theme.</li>\n<li id=\"4015\" class=\"adm adn yz ado b adp afn adr ads adt afo adv adw nr afp ady adz nv afq aeb aec nz afr aee aef aeg afk afl afm bj\" data-selectable-paragraph=\"\"><strong class=\"ado nm\">High cohesion</strong>&nbsp;is the opposite of low cohesion and represents a desirable design characteristic. It occurs when the elements within a module are closely related and focused on a single, well-defined task or responsibility.</li>\n</ul>', 2, '2023-12-22 00:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `article_id`, `user_id`, `create_at`) VALUES
(1, 'Thank you for reading until the end. Before you go:', 1, 3, '2023-12-22 00:21:16'),
(2, 'Please consider clapping and following the writer! ?', 1, 3, '2023-12-22 00:21:33'),
(3, 'AEGIS Availability on PHP', 2, 3, '2023-12-22 00:26:21'),
(4, 'thank you', 1, 2, '2023-12-22 00:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$Jb41voITB640xgTOobB.0.BnxVQmzAGtkwhB1erJaP.sYLgCcrCsC'),
(2, 'user', '$2y$10$Jb41voITB640xgTOobB.0.BnxVQmzAGtkwhB1erJaP.sYLgCcrCsC'),
(3, 'user2', '$2y$10$OYQztEsAcQw3sQCWjz6JxOZd9uzUxoSAMiGLJZtn.fs2EBqNZCz/S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_forgain` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_index` (`user_id`),
  ADD KEY `article_index` (`article_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `user_id_forgain` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
