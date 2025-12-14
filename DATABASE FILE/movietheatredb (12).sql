-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 07:40 AM
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
-- Database: `movietheatredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `ticket_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`, `ticket_pdf`) VALUES
(12, 'BKID6369842', 4, 4, 17, 3, 1, 380, '2021-04-15', '2021-04-15', 1, NULL),
(13, 'BKID2313964', 6, 5, 21, 6, 4, 2400, '2021-04-16', '2021-04-15', 1, NULL),
(14, 'BKID1766021', 6, 5, 22, 6, 2, 1200, '2021-04-16', '2021-04-16', 1, NULL),
(18, 'BKID4223167', 6, 6, 21, 6, 2, 1200, '2025-06-22', '2025-06-22', 1, NULL),
(19, 'BKID5081307', 6, 6, 21, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(20, 'BKID4750966', 6, 6, 21, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(21, 'BKID4485255', 6, 6, 21, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(22, 'BKID8501299', 6, 6, 21, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(23, 'BKID1276473', 6, 6, 20, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(24, 'BKID6741210', 6, 6, 20, 6, 1, 600, '2025-06-22', '2025-06-22', 1, NULL),
(25, 'BKID8001615', 6, 6, 19, 5, 1, 300, '2025-06-22', '2025-06-22', 1, NULL),
(26, 'BKID1921167', 6, 6, 19, 5, 1, 300, '2025-06-22', '2025-06-22', 1, NULL),
(27, 'BKID1852797', 6, 6, 19, 5, 1, 300, '2025-06-22', '2025-06-22', 1, NULL),
(28, 'BKID5856187', 6, 2, 22, 6, 2, 1200, '2025-06-22', '2025-06-22', 1, 'tickets/ticket_BKID5856187.pdf'),
(29, 'BKID6025935', 6, 2, 21, 6, 3, 1800, '2025-06-22', '2025-06-22', 1, 'tickets/ticket_BKID6025935.pdf'),
(30, 'BKID9914292', 6, 6, 20, 6, 2, 1200, '2025-06-22', '2025-06-22', 1, 'tickets/ticket_BKID9914292.pdf'),
(31, 'BKID8777292', 6, 6, 22, 6, 2, 1200, '2025-06-24', '2025-06-24', 1, 'tickets/ticket_BKID8777292.pdf'),
(32, 'BKID1341722', 6, 6, 21, 6, 1, 600, '2025-06-25', '2025-06-24', 1, 'tickets/ticket_BKID1341722.pdf'),
(33, 'BKID3816980', 6, 5, 21, 6, 2, 1200, '2025-06-26', '2025-06-26', 1, 'tickets/ticket_BKID3816980.pdf'),
(34, 'BKID3904911', 6, 5, 21, 6, 1, 600, '2025-06-26', '2025-06-26', 1, 'tickets/ticket_BKID3904911.pdf'),
(35, 'BKID7218924', 6, 6, 24, 6, 1, 600, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID7218924.pdf'),
(36, 'BKID6508902', 6, 6, 23, 5, 1, 300, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID6508902.pdf'),
(37, 'BKID4467544', 6, 6, 23, 5, 1, 300, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID4467544.pdf'),
(38, 'BKID8499523', 6, 6, 21, 6, 1, 600, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID8499523.pdf'),
(39, 'BKID2019461', 6, 6, 21, 6, 1, 600, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID2019461.pdf'),
(40, 'BKID3958493', 6, 6, 21, 6, 1, 600, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID3958493.pdf'),
(41, 'BKID9882395', 6, 6, 21, 6, 1, 600, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID9882395.pdf'),
(42, 'BKID4264875', 6, 6, 23, 5, 1, 300, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID4264875.pdf'),
(43, 'BKID7038095', 6, 6, 23, 5, 1, 300, '2025-06-29', '2025-06-29', 1, 'tickets/ticket_BKID7038095.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 0, 'admin', 'password', 0),
(2, 3, 'theatre', 'password', 1),
(3, 4, 'theatre2', 'password', 1),
(12, 2, 'harryden@gmail.com', 'password', 2),
(15, 14, 'USR295127', 'PWD195747', 1),
(17, 4, 'bruno@gmail.com', 'password', 2),
(18, 6, 'admin', '12345678', 1),
(19, 5, 'james@gmail.com', 'password', 2),
(20, 6, 'sifat@gmail.com', '12345678', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(255) NOT NULL,
  `cast` varchar(500) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active ',
  `imdb_rating` float DEFAULT NULL,
  `awards` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`, `imdb_rating`, `awards`) VALUES
(1, 3, 'The Invisible Man', 'Elisabeth Moss, Oliver Jackson-Cohen, Aldis Hodge, Storm Reid', 'Cecilia\'s abusive ex-boyfriend fakes his death and becomes invisible to stalk and torment her. She begins experiencing strange events and decides to hunt down the truth on her own.', '2020-03-04', 'images/tim.jpg', 'https://www.youtube.com/watch?v=WO_FJdiY9dA', 0, NULL, NULL),
(12, 6, 'Godzilla vs. Kong', 'Millie Bobby Brown, Alexander Skarsgard, Rebecca Hall', 'The initial confrontation between the two titans -- instigated by unseen forces -- is only the beginning of the mystery that lies deep within the core of the planet.', '2021-03-31', 'images/gvkpster.jpg', 'https://www.youtube.com/watch?v=odM92ap8_c0', 0, NULL, NULL),
(17, 6, 'Justice League', 'Ben Affleck, Henry Cavil, Ezra Miller', 'This is a demo description for the movie ZSJL.', '2021-03-22', 'images/zsjl.jpg', 'https://www.youtube.com/watch?v=vM-Bja2Gy04', 0, NULL, NULL),
(19, 0, 'Tandob', 'Sakib', '\"Taandob\" is a Bangladeshi action thriller, starring Shakib Khan, that delves into themes of injustice, political unrest, and the struggles of the youth in Dhaka.', '2025-06-23', 'images/tandob.jpg', 'https://www.youtube.com/watch?v=2S8x4hIbbK4', 0, NULL, NULL),
(25, 6, '', 'Jahid Hasan,Chanchal Chowdhury, Jaya Ahsan, Aupee Karim', 'Jahangir (Zahid Hasan), a miserly middle-aged man, inherits a community center business following his cousin\'s sudden death. As Eid nears, he rebuffs a young neighbor\'s request to visit his cousin\'s grave, triggering supernatural encounters with the ghosts of his cousins (Chanchal Chowdhury, Jaya Ahsan, Aupee Karim).', '0000-00-00', 'images/utshob.jpg', '', 0, NULL, NULL),
(27, 6, 'fgfg', 'fgfgf', 'fgfgfg', '2025-06-29', 'images/ban3.jpg', 'rgrgr', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(3, 'Black Widow', 'Scarlett Johansson, Florence Pugh, David Harbour, Rachel Weisz', '2021-07-09', 'At birth the Black Widow (aka Natasha Romanova) is given to the KGB, which grooms her to become its ultimate operative.', 'news_images/blackwidow.jpg'),
(9, 'Shang-Chi and the Legend of the Ten Rings', 'Simu Liu, Awkwafina, Tony Leung, Fala Chen, Micheele Yeoh', '2021-09-14', 'Shang-Chi is a master of numerous unarmed and weaponry-based wushu styles, including the use of the gun, nunchaku, and jian.', 'news_images/shangchi.jpg'),
(10, 'The Eternals', 'Richard Madden, Salma Hayek, Angelina Jolie, Kit Harrington', '2021-11-04', 'The saga of the eternals, a race of immortal beings who lived on earth and shaped its history and civilizations.', 'news_images/eternals.jpg'),
(11, 'Tandob', 'Shakib Khan', '2025-06-30', '\"Taandob\" is a Bangladeshi action thriller, starring Shakib Khan, that delves into themes of injustice, political unrest, and the struggles of the youth in Dhaka. The movie follows Swadhin, a young ma', 'news_images/Tandob.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`) VALUES
(2, 'Harry Den', 'harryden@gmail.com', '1247778540', 22, 'gender'),
(4, 'Bruno', 'bruno@gmail.com', '7451112450', 30, 'gender'),
(5, 'James', 'james@gmail.com', '7124445696', 25, 'gender'),
(6, 'Sifat', 'siaft@gmail.com', '017849198100', 25, 'gender');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `user_name`, `review_text`, `created_at`) VALUES
(1, 'Messi', 'Good', '2025-06-17 04:03:48'),
(2, 'Shakib', 'This movie hall is outstanding.', '2025-06-17 04:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL,
  `seat_layout` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`, `seat_layout`) VALUES
(1, 3, 'Screen 1', 100, 350, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}'),
(2, 3, 'Screen 2', 150, 310, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}'),
(3, 4, 'Screen 1', 200, 380, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}'),
(4, 14, 'Screen1', 34, 250, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}'),
(5, 6, 'Demo Screen', 150, 300, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}'),
(6, 6, 'IMX Screen', 200, 600, '{\"rows\":10,\"cols\":15,\"gap_after\":[4,9]}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat_bookings`
--

CREATE TABLE `tbl_seat_bookings` (
  `id` int(11) NOT NULL,
  `show_id` int(11) DEFAULT NULL,
  `screen_id` int(11) DEFAULT NULL,
  `seat_number` varchar(10) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_seat_bookings`
--

INSERT INTO `tbl_seat_bookings` (`id`, `show_id`, `screen_id`, `seat_number`, `booking_id`, `booking_date`) VALUES
(5, 20, 6, 'A4', 24, '2025-06-22'),
(6, 19, 5, 'E5', 25, '2025-06-22'),
(7, 19, 5, 'E5', 26, '2025-06-22'),
(8, 19, 5, 'E5', 27, '2025-06-22'),
(9, 22, 6, 'A13', 28, '2025-06-22'),
(10, 22, 6, 'A14', 28, '2025-06-22'),
(11, 21, 6, 'A7', 29, '2025-06-22'),
(12, 21, 6, 'A8', 29, '2025-06-22'),
(13, 21, 6, 'A9', 29, '2025-06-22'),
(14, 20, 6, 'A12', 30, '2025-06-22'),
(15, 20, 6, 'A11', 30, '2025-06-22'),
(16, 22, 6, 'B10', 31, '2025-06-24'),
(17, 22, 6, 'B13', 31, '2025-06-24'),
(18, 21, 6, 'B12', 32, '2025-06-25'),
(19, 21, 6, 'A10', 33, '2025-06-26'),
(20, 21, 6, 'A11', 33, '2025-06-26'),
(21, 21, 6, 'A12', 34, '2025-06-26'),
(22, 24, 6, 'A7', 35, '2025-06-29'),
(23, 23, 5, 'A7', 36, '2025-06-29'),
(24, 23, 5, 'A8', 37, '2025-06-29'),
(25, 21, 6, 'A7', 38, '2025-06-29'),
(26, 21, 6, 'A9', 39, '2025-06-29'),
(27, 21, 6, 'A9', 40, '2025-06-29'),
(28, 21, 6, 'A6', 41, '2025-06-29'),
(29, 23, 5, 'J14', 42, '2025-06-29'),
(30, 23, 5, 'H9', 43, '2025-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `start_date`, `status`, `r_status`) VALUES
(19, 15, 6, 11, '2021-04-15', 0, 1),
(20, 20, 6, 13, '2021-04-15', 0, 1),
(21, 19, 6, 12, '2021-03-31', 1, 1),
(22, 18, 6, 17, '2021-04-16', 1, 1),
(23, 15, 6, 19, '2025-06-26', 1, 0),
(24, 19, 6, 27, '2025-06-29', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `name`, `start_time`) VALUES
(1, 1, 'Noon', '10:00:00'),
(2, 1, 'Matinee', '14:00:00'),
(3, 1, 'First', '18:00:00'),
(4, 1, 'Second', '21:00:00'),
(5, 2, 'Noon', '10:00:00'),
(6, 2, 'Matinee', '14:00:00'),
(7, 2, 'First', '18:00:00'),
(8, 2, 'Second', '21:00:00'),
(9, 3, 'Noon', '10:00:00'),
(10, 3, 'Matinee', '14:00:00'),
(11, 3, 'First', '18:00:00'),
(12, 3, 'Second', '21:00:00'),
(14, 4, 'Noon', '12:03:00'),
(15, 5, 'First', '00:08:00'),
(16, 5, 'Second', '15:10:00'),
(17, 5, 'Others', '18:10:00'),
(18, 6, 'Noon', '00:02:00'),
(19, 6, 'First', '06:35:00'),
(20, 6, 'Second', '09:18:00'),
(21, 5, 'Matinee', '20:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatre`
--

CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_theatre`
--

INSERT INTO `tbl_theatre` (`id`, `name`, `address`, `place`, `state`, `pin`) VALUES
(3, 'AMC Theatre', '11500 Ash St', 'Leawd', 'DM', 691523),
(4, 'Cinemark', '3900 Dallas Parkway Suite 500 Plano', '12 Street, Ep', 'UD', 691523),
(5, 'Midtown Cinemas', 'Aue', 'Charles Street, EUS', 'DMM', 691523),
(6, 'Riverview Theater', '12/1 Sat mosjid', 'Dhanmondi', 'Dhaka', 1200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_seat_bookings`
--
ALTER TABLE `tbl_seat_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_seat_bookings`
--
ALTER TABLE `tbl_seat_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_seat_bookings`
--
ALTER TABLE `tbl_seat_bookings`
  ADD CONSTRAINT `tbl_seat_bookings_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `tbl_bookings` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
