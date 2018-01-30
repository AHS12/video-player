-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 03:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videoplayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `vid_name` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `serial`, `title`, `vid_name`, `video_url`, `description`, `week`) VALUES
(1, 1, 'Avanger', 'video1.mp4', 'videos/video1.mp4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consectetur consequuntur ipsam libero odit porro quidem quos rerum sapiente. Assumenda delectus laboriosam qui quidem sit. Deleniti id nisi provident suscipit.', 1),
(2, 2, 'Avanger IW', 'video2.mp4', 'videos/video2.mp4', '22222Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consectetur consequuntur ipsam libero odit porro quidem quos rerum sapiente. Assumenda delectus laboriosam qui quidem sit. Deleniti id nisi provident suscipit.', 1),
(3, 3, 'THOR regnerok', 'video3.mp4', 'videos/video3.mp4', '33333Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor error laboriosam magni recusandae? Adipisci beatae cupiditate deserunt dolore earum eius illo nobis obcaecati, officia quae quis quisquam rem veritatis voluptatibus.\r\n', 1),
(4, 4, 'PHP tutorial 1', '1516691102PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'videos/1516691102PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'oncnnnvv djfoD DNV DSOVDOV ODVIDV', 1),
(5, 5, 'newvideo1', '1516699690video1.mp4', 'videos/1516699690video1.mp4', 'its a movie trailer odsmkmsmsv', 1),
(6, 6, 'newvideo2', '1517289185video1.mp4', 'videos/1517289185video1.mp4', 'TGKTJGPTJGPTJ4GPJJT4GTGPJTPJGTPG4PJPJGPGJ4PJGGdcl;skd;k;k;kvekve', 1),
(8, 7, 'PHP tutorial 2', '1517290430PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'videos/1517290430PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'serial 7 week 1 for sure', 1),
(9, 8, 'newvideo3', '1517290497video1.mp4', 'videos/1517290497video1.mp4', 'serial 8 week 2', 2),
(10, 9, 'New Trailer2', '1517293703video1.mp4', 'videos/1517293703video1.mp4', 'new trailer serial 9 maybe so week 2', 2),
(11, 10, 'kawser', '1517298538PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'videos/1517298538PHP- Video Upload & Playback (Using Database) - YouTube.MP4', 'sjcuashdcssdcnindncodsncsndcknsdkcnsojodvdsod', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
