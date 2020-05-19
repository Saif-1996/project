-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 06:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_image`) VALUES
(1, 'saifziada96@gmail.com', '0787', 'saif', '');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `cat_image`) VALUES
(17, 'Information', 'uploads/cat/it.jpg'),
(18, 'Novels', 'uploads/cat/cat.jpg'),
(19, 'Art', 'uploads/cat/art.jpg'),
(20, 'Self Help', 'uploads/cat/download.jpg'),
(21, 'Comics', 'uploads/cat/MUSTREAD_20190114_WonderComics_5c3e4b8d091c94.82772322.jpg'),
(22, 'Novels', 'uploads/cat/01.10.2016-world-fiction-special-590.jpg'),
(23, 'Marketing', 'uploads/cat/download (1).jpg'),
(24, 'Natural Science', 'uploads/cat/download (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_mobile` varchar(100) NOT NULL,
  `cust_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_mobile`, `cust_address`) VALUES
(1, 'pc111111111111111222222222222', 'saifziada96@yahoo.com', '000', '3', 'aa'),
(14, 'saif', 'saifziada@gmail.com', '0787', '0787', '');

-- --------------------------------------------------------

--
-- Table structure for table `cust_rating`
--

CREATE TABLE `cust_rating` (
  `rating_id` int(200) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `rev` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_rating`
--

INSERT INTO `cust_rating` (`rating_id`, `cust_id`, `pro_id`, `rating`, `rev`) VALUES
(1, 1, 48, 1, 'smasndjkahnadsj'),
(2, 4, 58, 4, 'thank you'),
(3, 14, 48, 4, 'xzsa'),
(4, 14, 55, 4, 'xas'),
(5, 14, 57, 5, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `list_order`
--

CREATE TABLE `list_order` (
  `order_id` int(12) NOT NULL,
  `order_date` date NOT NULL,
  `cust_id` int(2) NOT NULL,
  `total_price` int(2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_order`
--

INSERT INTO `list_order` (`order_id`, `order_date`, `cust_id`, `total_price`, `status`, `qty`) VALUES
(2, '2020-05-15', 14, 298, 'cash', 6),
(3, '2020-05-15', 14, 202, 'cash', 4),
(4, '2020-05-16', 14, 206, 'cash', 6),
(5, '2020-05-16', 14, 53, 'cash', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_pr`
--

CREATE TABLE `order_pr` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_pr`
--

INSERT INTO `order_pr` (`order_id`, `pro_id`, `qty`) VALUES
(3, 56, 2),
(3, 48, 2),
(4, 60, 4),
(4, 56, 2),
(5, 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(250) DEFAULT NULL,
  `pro_price` int(10) DEFAULT NULL,
  `pro_desc` mediumtext DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `page` int(250) NOT NULL,
  `pro_image` varchar(200) DEFAULT NULL,
  `pro_status` varchar(30) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_desc`, `author`, `page`, `pro_image`, `pro_status`, `cat_id`) VALUES
(47, 'Sketching: Drawing Techniques for Product Designers', 50, 'Sketching is an incredibly broad and practical survey of sketching techniques for product designers.', 'Koos Eissen , Roselien Steur', 254, 'uploads/9789063691714.jpg', 'soon', 19),
(48, 'Java Swing', 60, 'This volume covers all the features available in Java 2 SDK 1.3 and 1.4. It takes a practical approa', 'Cole, Brian', 1260, 'uploads/asd.jpg', 'on_sale', 17),
(55, 'DB2 for the Cobol Programmer', 55, 'The aim of this text is to provide the programmer with the knowledge to access and process DB2 data in COBOL programs using embedded SQL. This second edition has been updated includes: basic   ', 'Garvin, Curtis', 431, 'uploads/9781890774028.jpg', 'feature', 17),
(56, 'Access 2010 All-in-One For Dummies', 66, 'The all-in-one reference to all aspects of Microsoft Access 2010 If you want to learn Microsoft Access inside and out, the nine mini-books in this easy-access reference are exactly what you need. Read the book cover to cover, or jump into any of the mini-books for the instruction and topics you need most.', 'Stockman, Joseph C.', 792, 'uploads/9780470532188.jpg', 'on_sale', 17),
(57, 'The Definitive Guide to MongoDB: The NOSQL Database for Cloud and Desktop Computing', 50, 'This is first practical guide to MongoDB, a new database and a new database type with astonishing uptake — 45,000 users before it even hits version 1.0. The book is written by internationally recognized experts and tech reviewed by the creator of MongoDB.', 'Membrey, Peter', 331, 'uploads/51GSWrIyQtL._SX404_BO1,204,203,200_.jpg', 'none', 17),
(58, 'Bruce Nauman: The True Artist', 100, 'The first authorized monograph on the world-famous sculptor, photographer, and video artist.\n\nIn Bruce Nauman: The True Artist, Peter Plagens – a renowned writer, critic, and author who has known Nauman for more than forty years – delivers a personal and   ', 'Peter Plagens', 289, 'uploads/9780714849959.jpg', 'soon', 19),
(59, 'The Stress of Life', 18, 'Considering stress, this text covers the discovery of stress; the dissection of stress; the disease of adaptation; and implications and applications. Annotated references are also included.   \n', 'Selye, Hans', 516, 'uploads/9780070562127.jpg', 'soon', 20),
(60, 'Helping Your Child Overcome Separation Anxiety or School Refusal: A Step-by-step Guide for Parents', 25, 'This step-by-step handbook offers parents effective techniques for dealing with normal separation anxiety issues, separation anxiety disorder (SAD), and school refusal. With their unique approach to the problem, the authors give parents the tools they need to make real progress with these issues.   \n', 'Eisen, Andrew R', 192, 'uploads/9781572244313.jpg', 'feature', 20),
(61, 'The Book on Writing: The Ultimate Guide to Writing Well', 24, 'The Book on Writing: The Ultimate Guide to Writing Well\n', 'LaRocque, Paula', 240, 'uploads/9780966517699.jpg', 'none', 20),
(62, 'The Ghost Rider', 20, 'A classic medieval mystery from the Albanian master', 'Kadare, Ismail', 218, 'uploads/9781847673411.jpg', 'on_sale', 22),
(63, 'Devils in Exile: A Novel', 15, 'A Boston-based thriller involving an Iraq war veteran who gets involved with dangerous big-time drug dealers. Now in paperback.   \n', 'Hogan, Chuck', 400, 'uploads/9781451633399.jpg', 'soon', 22),
(64, 'Eating the Big Fish: How Challenger Brands Can Compete Against Brand Leaders', 40, 'A revised and updated version of the classic book on what it takes for small brands to eat the big tuna Since Wiley first published Eating the Big Fish in 1999, the concept of the challenger brand has become a mainstream idea among marketers and advertisers.   \n', 'Morgan, Adam', 367, 'uploads/9780470238271.jpg', 'none', 23),
(67, 'Game-Based Marketing: Inspire Customer Loyalty Through Rewards, Challenges, and Contests', 40, 'Advertising is dead. So how to you reach your elusive, media-cynical, social media-obsessed customers? With games. Game-Based Marketing makes professionals aware of how pervasive games are today, how large a role they are playing in business marketing, and how to better use \"funware\" to create an engaged and loyal customer base.   \n', 'Linder, Joselin', 236, 'uploads/9780470562239.jpg', 'none', 23),
(68, 'Inferno', 20, 'With these words echoing in his head, eminent Harvard symbologist Robert Langdon awakes in a hospital bed with no recollection of where he is or how he got there. A threat to his life will propel him and a young doctor, Sienna Brooks, into a breakneck chase across the city of Florence.   \n', 'Dan Brown', 480, 'uploads/9780593072493.jpg', 'on_sale', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `cust_rating`
--
ALTER TABLE `cust_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `list_order`
--
ALTER TABLE `list_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cust_rating`
--
ALTER TABLE `cust_rating`
  MODIFY `rating_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_order`
--
ALTER TABLE `list_order`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
