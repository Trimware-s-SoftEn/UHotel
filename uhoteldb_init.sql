-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 09:00 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uhoteldb_init`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouthotel`
--

CREATE TABLE `abouthotel` (
  `popularity` text COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `departmentName` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`, `description`) VALUES
(1, 'Accounting', 'The accounting department is responsible for recording and reporting the cash flow transactions of a company. This department has some key roles and responsibilities, including accounts receivable, accounts payable, payroll, financial reporting, and maintaining financial controls.'),
(2, 'Administration', 'Administration department is backbone of an organization. An effective administrator is an asset to an organization. He or she is the link between an organization\'s various departments and ensures the smooth flow of information from one part to the other. Thus without an effective administration, an organization would not run professionally and smoothly.'),
(3, 'Banquet', 'Employed by a catering service or a hotel, banquet servers are roaming non-standard waiters and waitresses. In a typical restaurant setting, the wait staff will have tables they are assigned to cover, but banquet servers are responsible for accommodating all guests at a function while circulating the room.'),
(4, 'Catering Sales', 'The sales manager solicits new catering customers through traditional and non-traditional sales techniques. Other important duties include booking, selling, planning and coordinating all special social events while assuring the highest level of customer service.'),
(5, 'Engineering', 'Engineers work in a variety of fields to analyze, develop and evaluate large-scale, complex systems. This can mean and improve and maintaining current systems or creating brand new projects. Engineers will design and draft blueprints, visit systems in the field and manage projects.'),
(6, 'Executive Office', 'A successful Administrative Officer will act as the point of contact for all employees, providing administrative support and managing their queries. Main duties include managing office stock, preparing regular reports (e.g. expenses and office budgets) and organizing company records.'),
(7, 'Finance', 'Financial Officers are in charge of overseeing the financial transactions of a company. Also known as Chief Financial Officers, these professionals are tasked with developing budgets, monitoring transactions, and preparing financial reports. They possess strong accounting and analytical skills.'),
(8, 'Food & Beverage', 'Food and Beverage Servers are customer service professionals that work for restaurants, cocktail bars and other establishments. In addition to serving food and drinks, Food and beverage Servers perform tasks, such as setting up tables, removing used dishes and preparing simple dishes.'),
(9, 'Front Office', 'Responsible for handling front office reception and administration duties, including greeting guests and offering them a beverage, answering phones, handling company inquiries, and sorting and distributing mail. Mail also schedule meetings and travel for executives.'),
(10, 'Housekeeping', 'In general, housekeeping departments are in charge of keeping buildings clean. They sweep, mop, dust, vacuum and clean the bathrooms. Housekeeping staff also clean windows and public areas, and they often remove trash and deposit it in the building\'s dumpsters.'),
(11, 'Human resources', 'Human resources specialists are responsible for recruiting, screening, interviewing and placing workers. They may also handle employee relations, payroll, benefits, and training. Human resources managers plan, direct and coordinate the administrative functions of an organization.'),
(12, 'Information Technology', 'Overseeing all technology operations and evaluating them according to established goals. Devising and establishing IT policies and systems to support the implementation of strategies set by upper management. Analyzing the business requirements of all departments to determine their technology needs.'),
(13, 'In-Room Dining', 'Assist in the organizing, management and administration and all operational aspects for the In Room dining department. Maintain high quality products and service levels.'),
(14, 'Laundry', 'In general, a Laundry Attendant\'s duties include washing, drying and folding clothes and linens. Laundry Attendants employed in the hospitality industry, for example, often are responsible for washing towels and sheets, as well as the personal items of guests.'),
(15, 'Marketing', 'Contributing in the implementation of marketing strategies. Supporting the marketing manager in overseeing the department\'s operations. Organizing and attending marketing activities or events to raise brand awareness.'),
(16, 'Public Relations', 'planning publicity strategies and campaigns. writing and producing presentations and press releases. dealing with enquiries from the public, the press, and related organisations. organizing and attending promotional events such as press conferences, open days, exhibitions, tours and visits.'),
(17, 'Reservations', 'Fulfill reservation requests by determining the rooms available to meet customer desires. They verify customer information and payment options, assign rooms and respond to customers with confirmation emails or letters.'),
(18, 'Residences', 'Developing educational, social and personal growth programs, group advising, promoting the safety and welfare of all residents, and individual counseling.'),
(19, 'Rooms', 'Performs routine duties in cleaning and servicing of guest rooms. Room attendant promotes a positive image of the property to guests and must be pleasant, honest, friendly and should also able to address guest requests and problems.'),
(20, 'Security', 'Periodically patrols buildings and grounds. Requires a high school diploma or its equivalent and 0-2 years of experience in the field or in a related area. Familiar with standard concepts, practices and procedures within a particular field. Rely on limited experience and judgment to plan and accomplish goals. Perform a variety of tasks. Work under general supervision; typically reports to a supervisor or manager. A certain degree of creativity and latitude is expected.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventName` text COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `roomID` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `startDateTime` datetime NOT NULL,
  `endDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `promotionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `picturegallery`
--

CREATE TABLE `picturegallery` (
  `pictureID` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picturegallery`
--

INSERT INTO `picturegallery` (`pictureID`, `name`, `picture`) VALUES
(1, 'Room Type 1', 'roomTypePic\\Type1.jpg'),
(2, 'Room Type 2', 'roomTypePic\\Type2.jpg'),
(3, 'Room Type 3', 'roomTypePic\\Type3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picturetag`
--

CREATE TABLE `picturetag` (
  `pictureID` int(11) NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionID` int(11) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `positionName` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `requirement` text COLLATE utf8_unicode_ci NOT NULL,
  `employmentType` text COLLATE utf8_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positionrequire`
--

CREATE TABLE `positionrequire` (
  `positionID` int(11) NOT NULL,
  `announceDate` datetime NOT NULL,
  `closeDate` datetime NOT NULL,
  `stillAccept` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionID` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `isPrivate` tinyint(4) NOT NULL,
  `startDateTime` datetime NOT NULL,
  `endDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `roomNo` int(11) NOT NULL,
  `reserveDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `reservationStatus` tinyint(4) NOT NULL COMMENT '0 notCom, 1 Com',
  `customerAmount` int(11) NOT NULL,
  `isReservationDesk` tinyint(4) NOT NULL,
  `customerName` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `customerEmail` text COLLATE utf8_unicode_ci NOT NULL,
  `customerTel` text COLLATE utf8_unicode_ci NOT NULL,
  `specialRequest` text COLLATE utf8_unicode_ci NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `userID` int(11) NOT NULL,
  `roomTypeName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `reviewScore` tinyint(4) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`userID`, `roomTypeName`, `review`, `reviewScore`, `dateTime`) VALUES
(1, 'Deluxe Premier Room', 'Dee', 4, '2019-12-01 22:32:50'),
(1, 'Premier Suite', 'Dee Ei Ei', 4, '2019-12-01 22:32:05'),
(1, 'Royal Suite', 'Dee Mak Mak Luey', 5, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL,
  `roomTypeName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '-1 out, 0 notAvai, 1 Avai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `roomTypeName`, `status`) VALUES
(101, 'Deluxe Premier Room', 1),
(102, 'Deluxe Premier Room', 1),
(103, 'Deluxe Premier Room', 1),
(104, 'Deluxe Premier Room', 1),
(105, 'Deluxe Premier Room', 1),
(201, 'Premier Suite', 1),
(202, 'Premier Suite', 1),
(203, 'Premier Suite', 1),
(301, 'Royal Suite', 1),
(302, 'Royal Suite', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomTypeName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `pictureID` int(11) NOT NULL,
  `numberofBed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomTypeName`, `price`, `description`, `pictureID`, `numberofBed`) VALUES
('Deluxe Premier Room', 15800, 'Elegant bedroom with separate walk in shower & bath. Twin beds is available.  Sitting area with sofa.', 1, 2),
('Premier Suite', 55800, 'Spacious room with private dining area for 5. Private balcony also provided with seats. Have large walk-in closest.', 2, 2),
('Royal Suite', 180000, 'Provide private dining room for 8 people. The design is opulent and give the feeling of royalty. Have large living room, separate dressing area and facilites, such as private spa & fitness rooms.', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `fName` text COLLATE utf8_unicode_ci NOT NULL,
  `lName` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phoneNo` text COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '-1' COMMENT '-1 is Cus, 0 Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `password`, `fName`, `lName`, `email`, `phoneNo`, `isAdmin`) VALUES
(1, '12345678', 'IAm', 'Customer', 'customer@mail.com', '+667544444', -1),
(2, '12345678', 'IAm', 'Staff', 'staff@mail.com', '6693234432', -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouthotel`
--
ALTER TABLE `abouthotel`
  ADD PRIMARY KEY (`slogan`),
  ADD KEY `pictureID` (`pictureID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `pictureID` (`pictureID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`name`),
  ADD KEY `pictureID` (`pictureID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `picturegallery`
--
ALTER TABLE `picturegallery`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `picturetag`
--
ALTER TABLE `picturetag`
  ADD PRIMARY KEY (`category`,`pictureID`),
  ADD KEY `pictureID` (`pictureID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`),
  ADD KEY `pictureID` (`pictureID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `positionrequire`
--
ALTER TABLE `positionrequire`
  ADD PRIMARY KEY (`positionID`,`announceDate`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionID`),
  ADD KEY `pictureID` (`pictureID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`roomNo`,`reserveDateTime`),
  ADD KEY `userID` (`userID`),
  ADD KEY `reservation_ibfk_4` (`paymentID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`userID`,`roomTypeName`),
  ADD KEY `roomTypeName` (`roomTypeName`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`),
  ADD KEY `roomTypeName` (`roomTypeName`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomTypeName`),
  ADD KEY `pictureID` (`pictureID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picturegallery`
--
ALTER TABLE `picturegallery`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouthotel`
--
ALTER TABLE `abouthotel`
  ADD CONSTRAINT `abouthotel_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomNo`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`);

--
-- Constraints for table `picturetag`
--
ALTER TABLE `picturetag`
  ADD CONSTRAINT `picturetag_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`),
  ADD CONSTRAINT `picturetag_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category`);

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`),
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Constraints for table `positionrequire`
--
ALTER TABLE `positionrequire`
  ADD CONSTRAINT `positionrequire_ibfk_1` FOREIGN KEY (`positionID`) REFERENCES `position` (`positionID`);

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`roomTypeName`) REFERENCES `roomtype` (`roomTypeName`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`roomTypeName`) REFERENCES `roomtype` (`roomTypeName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD CONSTRAINT `roomtype_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `picturegallery` (`pictureID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
