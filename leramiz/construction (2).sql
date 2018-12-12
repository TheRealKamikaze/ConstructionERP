-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 08:53 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `projectName` varchar(100) NOT NULL,
  `documentType` varchar(100) NOT NULL,
  `documentLink` varchar(500) NOT NULL,
  `architectName` varchar(100) NOT NULL,
  `floor` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`projectName`, `documentType`, `documentLink`, `architectName`, `floor`) VALUES
('Saad CHS', 'displayImage', 'img/single-list-slider/4.jpg', 'Akshada Bhat', 2),
('Saad CHS', 'displayImage', 'img/single-list-slider/4.jpg', 'Akshada Bhat', 3),
('Saad CHS', 'floorPlan', 'img/plan-sketch.jpg', 'Akshada Bhat', 2),
('Saad CHS', 'floorPlan', 'img/plan-sketch.jpg', 'Akshada Bhat', 4),
('Saad CHS', 'floorPlan', 'document/about.jpg.jpg', 'Akshada Bhat', 0),
('Saad CHS', 'floorPlan', 'document/about.jpg.jpg', 'Akshada Bhat', 0),
('Saad CHS', 'floorPlan', 'document/logo.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'projectImage', 'document/map-marker-1.png.png', 'Akshada Bhat', 0),
('Saad CHS', 'noc', 'document/1611087-exp3 ADBMS.pdf.pdf', 'Akshada Bhat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `phoneNo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`name`, `emailId`, `projectName`, `phoneNo`) VALUES
('abc', 'a@b.com', 'Ekadanta Heritage', 7123),
('abc', 'a@b.com', 'Ekadanta Heritage', 7123),
('asd', 'a@b.com', 'Saad CHS', 7651),
('sdf', 'a@b.com', 'Saad CHS', 1231),
('asd', 'a@b.com', 'Saad CHS', 2311),
('adf', 'a@b.com', 'Ekadanta Heritage', 3412),
('adf', 'a@b.com', 'Ekadanta Heritage', 3412),
('llllll', 'yyyy@gggg.com', 'Saad CHS', 9988776);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `changeMade` varchar(100) NOT NULL,
  `changeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employeeName` varchar(100) NOT NULL,
  `isVerified` int(10) NOT NULL DEFAULT '0',
  `logId` int(100) NOT NULL,
  `employeeType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`changeMade`, `changeDate`, `employeeName`, `isVerified`, `logId`, `employeeType`) VALUES
('Uploaded document', '2018-10-03 15:20:26', 'Amit Mahajan', 0, 1, 'architect'),
('Inserted CAD Model View', '2018-10-03 15:20:26', 'Amit Mahajan', 1, 2, 'architect');

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE `mailinglist` (
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `extraMsg` varchar(500) NOT NULL,
  `phoneNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist`
--

INSERT INTO `mailinglist` (`name`, `emailId`, `extraMsg`, `phoneNo`) VALUES
('', '', 'No Message', ''),
('', '', 'No Message', ''),
('', '', 'No Message', ''),
('', '', 'No Message', ''),
('jaineel', 'jaineelchamp@gmail.com', 'bot jaineel noob', '8828301921'),
('maithili', 'abcd@gmail,com', 'hello', '7890567891');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsImage` varchar(500) NOT NULL DEFAULT 'https://i.ytimg.com/vi/xHjbxJCounI/maxresdefault.jpg',
  `newsPaperName` varchar(255) NOT NULL,
  `newsDate` date NOT NULL,
  `newsDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsImage`, `newsPaperName`, `newsDate`, `newsDescription`) VALUES
('https://i.ytimg.com/vi/xHjbxJCounI/maxresdefault.jpg', 'Loksatta', '2018-09-16', 'We are very good in building projects that last very long.'),
('https://i.ytimg.com/vi/xHjbxJCounI/maxresdefault.jpg', 'New York Times', '2018-09-13', 'Indian builder tops the construction charts');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectName` varchar(255) NOT NULL,
  `projectLocation` varchar(255) NOT NULL,
  `projectPrice` int(10) NOT NULL,
  `projectImage` varchar(255) NOT NULL DEFAULT 'https://content.makaan.com/16/8577373/274/23829390.jpeg',
  `architectName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `mapLink` varchar(1000) NOT NULL DEFAULT '<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=k.j.%20somaiya%20college%20of%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>',
  `projectDescription` varchar(500) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectName`, `projectLocation`, `projectPrice`, `projectImage`, `architectName`, `startDate`, `endDate`, `mapLink`, `projectDescription`) VALUES
('Ekadanta Heritage', 'Badlapur', 250, 'https://images.pexels.com/photos/323705/pexels-photo-323705.jpeg', 'Suman Talwar', '2018-09-02', '2018-10-23', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=k.j.%20somaiya%20college%20of%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'),
('Hello', 'Badlapur', 167, 'https://content.makaan.com/16/8577373/274/23829390.jpeg', 'Jaineel Shah', '2018-09-03', '2018-10-10', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=k.j.%20somaiya%20college%20of%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'),
('Mohan Heights', 'Badlapur', 200, 'http://www.ceconline.edu/qdig/college%20building.jpg', 'Kuntal Nage', '2018-09-09', '2018-09-16', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=mohan%20heights&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'),
('Mohan Pride', 'Kalyan', 250, 'https://e3.365dm.com/18/08/750x563/skynews-carbuncle-cup-building-design_4404403.jpg', 'Nupur Likhite', '2018-09-10', '2018-09-30', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=mohan%20pride&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'),
('One Avighna', 'Lower Parel', 550, 'https://content.makaan.com/16/8577373/274/23829390.jpeg', 'Mohit Wakle', '2018-09-04', '2018-09-30', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=one%20avighna&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus egestas fermentum ornareste. Donec index lorem. Vestibulum  aliquet odio, eget tempor libero. Cras congue cursus tincidunt. Nullam venenatis dui id orci egestas tincidunt id elit. Nullam ut vuputate justo. Integer lacnia pharetra pretium. Casan ante ipsum primis in faucibus orci luctus et ultrice.'),
('Saad CHS', 'Badlapur', 260, 'https://image.freepik.com/free-photo/giant-building-with-the-sun-above_1127-400.jpg', 'Akshada Bhat', '2018-09-03', '2018-09-29', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"350\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=saad%20chs&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.pureblack.de\">website erstellen lassen</a></div><style>.mapouter{text-align:right;height:350px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:600px;}</style></div>', 'This is dombivli\'s best project available. Public here is too good. Mahajan family which lives here is just too awesome to live with. And i am running out of things to say. I am thor- son of odin. Are you ready?');

-- --------------------------------------------------------

--
-- Table structure for table `projectfeatures`
--

CREATE TABLE `projectfeatures` (
  `projectName` varchar(50) NOT NULL,
  `feature` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectfeatures`
--

INSERT INTO `projectfeatures` (`projectName`, `feature`) VALUES
('Saad CHS', '24/7 Water Supply'),
('Saad CHS', 'Fire Proof'),
('Saad CHS', 'Earthquake Proof'),
('Saad CHS', 'Air Conditioning');

-- --------------------------------------------------------

--
-- Table structure for table `projectreview`
--

CREATE TABLE `projectreview` (
  `name` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `occupation` varchar(255) NOT NULL DEFAULT 'Not to be disclosed',
  `reviewMessage` varchar(1000) NOT NULL,
  `photo` varchar(500) NOT NULL DEFAULT 'https://d30y9cdsu7xlg0.cloudfront.net/png/547804-200.png',
  `rating` int(11) NOT NULL DEFAULT '5',
  `projectName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectreview`
--

INSERT INTO `projectreview` (`name`, `occupation`, `reviewMessage`, `photo`, `rating`, `projectName`) VALUES
('Tarun Lohana', 'Entrepreneur', 'Very good construction site, almost bought a whole building!', 'http://pngimage.net/wp-content/uploads/2018/06/person-logo-png.png', 4, 'Saad CHS'),
('Sahil Dusane', 'Mechanical Engineer', 'Too cheap materials used, won\'t recommend buying this', 'https://d30y9cdsu7xlg0.cloudfront.net/png/547804-200.png', 1, 'Mohan Pride'),
('Anonymous', 'Not to be disclosed', 'too costly', 'https://d30y9cdsu7xlg0.cloudfront.net/png/547804-200.png', 3, 'Saad CHS'),
('Anonymous', 'Not to be disclosed', 'too deep bro!', 'https://d30y9cdsu7xlg0.cloudfront.net/png/547804-200.png', 5, 'Mohan Pride');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `emailId` varchar(50) NOT NULL,
  `phoneNo` bigint(10) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `employeeType` varchar(100) NOT NULL,
  `uniqueNumber` int(4) NOT NULL,
  `employeeImage` varchar(500) NOT NULL,
  `employeeName` varchar(100) NOT NULL,
  `employeeAge` int(100) NOT NULL DEFAULT '0',
  `employeeSalary` int(100) NOT NULL DEFAULT '0',
  `employeeExperience` int(100) NOT NULL DEFAULT '0',
  `employeeGender` varchar(100) NOT NULL DEFAULT 'other'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`emailId`, `phoneNo`, `password`, `employeeType`, `uniqueNumber`, `employeeImage`, `employeeName`, `employeeAge`, `employeeSalary`, `employeeExperience`, `employeeGender`) VALUES
('akshada@gmail.com', 8828301921, '$2y$10$rPZU7tAsab6LA1dhIQG2xe.2VXeifRb0hbqZNGVbRUXpGJeQfcWha', 'architect', 987, 'employeeDetails/2.png', 'Akshada Bhat', 0, 0, 0, 'other'),
('akshay@gmail.com', 9876987676, '$2y$10$nhR.xDqLTC0F2P6CQA5U7eu.dV3YuMq7qSnUukIMwFbNqoqeqjGHG', 'architect', 987, 'employeeDetails/author.jpg', '', 0, 0, 0, 'other'),
('amit.mahajan@somaiya.edu', 8828301921, '$2y$10$ovZEvbelEt846nKO47IcLe4V4f9FSygipfaPsnq9GfGQprnyxaTGu', 'architect', 777, 'employeeDetails/IMG_4981.JPG', 'Amit Mahajan', 0, 0, 0, 'other'),
('dagdushet@gmail.com', 9988774567, '$2y$10$wU/LWajZFFeC3z90wTxciOHY5QbJcxZqqlnddB1FBsNJngJrQhCYe', 'architect', 100, 'employeeDetails/about.jpg.jpg', '', 0, 0, 0, 'other'),
('rashmimahajan42@gmail.com', 8828301921, '$2y$10$uEEfrFzUpkAjqwxuBdmPs.YNwNMaPHxzzCvfEjzYa.XOtbMYs.yZm', 'architect', 100, 'employeeDetails/map-marker-1.png.png', '', 0, 0, 0, 'other'),
('tarun.lohana@somaiya.edu', 9702695960, '$2y$10$DTPOLJbwegUFpieJJUAXxuRr2Zsl/KioKxG76jZZPUTql.AmNYgKG', 'architect', 1011, 'employeeDetails/cd.jpg', 'Tarun Lohana', 34, 10000, 7, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`emailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
