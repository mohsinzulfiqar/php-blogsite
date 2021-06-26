-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 01:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `ctype` varchar(50) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `ctype`, `post`) VALUES
(1, 'Python', 3),
(2, 'HTML', 2),
(3, 'CSS', 2),
(4, 'Javascript', 2),
(5, 'Node.js', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `ptitle` varchar(500) NOT NULL,
  `pdetail` text NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aurhor` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `ppic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `ptitle`, `pdetail`, `p_date`, `aurhor`, `category`, `ppic`) VALUES
(1, 'What is Node.js?', 'As an asynchronous event-driven JavaScript runtime, Node.js is designed to build scalable network applications. In the following \"hello world\" example, many connections can be handled concurrently. Upon each connection, the callback is fired, but if there is no work to be done, Node.js will sleep.\r\n\r\n', '2021-06-26 10:22:48', '1', '5', 'wp2465956-javascript-wallpapers.jpg'),
(2, 'Python !!!  Getting Started', 'Python can be easy to pick up whether you\'re a first time programmer or you\'re experienced with other languages. The following pages are a useful first step to get on your way writing programs with Python!\r\n\r\n', '2021-06-26 10:24:56', '1', '1', 'wp7133297-python-code-wallpapers.jpg'),
(4, 'HTML Easy?', 'HTML is the standard markup language for Web pages.With HTML you can create your own Website.HTML is easy to learn - You will enjoy it!\r\n\r\n', '2021-06-26 10:30:15', '1', '2', 'wp2742475-html-css-wallpapers.jpg'),
(5, 'Javascript Introduction', 'JavaScript.com is a resource built by the Pluralsight team for the JavaScript community.\r\n\r\nBecause JavaScript is a great language for coding beginners, we\'ve gathered some of the best learning resources around and built a JavaScript course to help new developers get up and running.\r\n\r\nWith the help of community members contributing content to the site, JavaScript.com aims to also keep more advanced developers up to date on news, frameworks, and libraries.', '2021-06-26 10:32:32', '1', '4', 'wp7421209-html-css-wallpapers.jpg'),
(6, 'CSS is very useful', 'Stands for \"Cascading Style Sheet.\" Cascading style sheets are used to format the layout of Web pages. They can be used to define text styles, table sizes, and other aspects of Web pages that previously could only be defined in a page\'s HTML.\r\n\r\n', '2021-06-26 10:34:33', '1', '3', 'wp7420855-html-css-wallpapers.jpg'),
(8, 'Node.js library', '                   Node.js is similar in design to, and influenced by, systems like Ruby\'s Event Machine and Python\'s Twisted. Node.js takes the event model a bit further. It presents an event loop as a runtime construct instead of as a library. In other systems, there is always a blocking call to start the event-loop. Typically, behavior is defined through callbacks at the beginning of a script, and at the end a server is started through a blocking call like EventMachine::run().                ', '2021-06-26 10:38:12', '2', '5', 'wp3366737-nodejs-wallpapers.png'),
(9, 'Friendly & Easy to Learn', 'The community hosts conferences and meetups, collaborates on code, and much more. Python\'s documentation will help you along the way, and the mailing lists will keep you in touch.', '2021-06-26 10:49:03', '2', '1', 'wp7685759-python-code-wallpapers.jpg'),
(10, 'HTML Introduction', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript', '2021-06-26 10:50:13', '2', '2', 'wp7421028-html-css-wallpapers.jpg'),
(11, 'Quick Start to JavaScript', 'Throughout this series of JavaScript tutorials for beginners, we\'ll learn how to write the programming language from scratch, so you can start creating code of your own.\r\n\r\nQuick Starts are a series of specially constructed tutorials meant to be followed in sequence and include valuable exercises to reinforce learned concepts.\r\n\r\nThis tutorial assumes no prior programming experience and starts exploring the logic of a language and the concepts needed to write code from the ground up.', '2021-06-26 10:52:08', '2', '4', 'wp2465913-javascript-wallpapers.jpg'),
(12, 'CSS', 'CSS helps Web developers create a uniform look across several pages of a Web site. Instead of defining the style of each table and each block of text within a page\'s HTML, commonly used styles need to be defined only once in a CSS document. Once the style is defined in cascading style sheet, it can be used by any page that references the CSS file. Plus, CSS makes it easy to change styles across several pages at once. For example, a Web developer may want to increase the default text size from 10pt to 12pt for fifty pages of a Web site. If the pages all reference the same style sheet, the text size only needs to be changed on the style sheet and all the pages will show the larger text.', '2021-06-26 10:53:54', '2', '3', 'wp7421087-html-css-wallpapers.png'),
(13, 'Python Applications', 'The Python Package Index (PyPI) hosts thousands of third-party modules for Python. Both Python\'s standard library and the community-contributed modules allow for endless possibilities.\r\n\r\n', '2021-06-26 10:55:41', '2', '1', 'wp5268499-python-code-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `password`, `name`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1),
(2, 'mosn', 'd748076f40eaaebbf664e5b69e150c81', 'Mohsin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
