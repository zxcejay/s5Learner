-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 12:48 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s5learner`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `middlename`, `lastname`, `username`, `birthday`, `section`, `guardian`, `contact_number`, `address`, `password`) VALUES
(1, 'Johnny', 'alvarez', 'soriano', 'admin', '1995-02-16', 'dummies', 'your mother', 'Essa Geronimo', 'somewhere place', 'admin'),
(2, 'test name', 'test middle', 'santos', 'jemuel', '12-12-2012', 'dummy', 'your mother', '0912333333', 'somewhere place', '2018'),
(3, 'john', 'perez', 'delacruz', 's5learner', '12-12-2012', 'dummy', 'your mother', '0912345678', 'somewhere place', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `qid` varchar(222) NOT NULL,
  `_a` varchar(255) NOT NULL,
  `_b` varchar(255) NOT NULL,
  `_c` varchar(255) NOT NULL,
  `_d` varchar(255) NOT NULL,
  `answer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `qid`, `_a`, `_b`, `_c`, `_d`, `answer`) VALUES
(1, '3322', 'a plane', 'a truck', 'a boat', 'a school bus', 'd'),
(3, '2325', 'Cookie Monster', 'Maria', 'Oscar', 'Elmo', 'd'),
(4, '6977', 'blue', 'white', 'red', 'gray', 'c'),
(5, '7472', '10', '8', '7', '3', 'c'),
(6, '1933', 'w', 'w', 'wd', 'a', 'c'),
(7, '5312', 'plshopify1.2', 'Maria', 'Test C', 'Test D', 'b'),
(8, '9017', 'w', 'w', 'w', 'w', 'c'),
(9, '7765', 'plshopify1.2', 'Test B', 'Test C', 'Test D', 'b'),
(10, '1049', 'tmtealium', 'Test B', 'a boat', 'a school bus', 'c'),
(11, '5332', 'wwww', 'www', 'ww', 'w', 'd'),
(12, '1', 'awdada', 'dadada', 'awdada', 'awdad', 'b'),
(13, '4125', 'aaaaa', 'bbbbbb', 'ccccc', 'ddddd', 'd'),
(14, '17310', 'slfmskmve', 'kkauwniakwb', 'lenslina', 'olilsnekfse', 'b'),
(15, '91340', 'f', 'f', 'd', 'g', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `topic_id` int(22) NOT NULL,
  `qid` varchar(2222) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `topic_id`, `qid`, `content`) VALUES
(1, 2, '3322', 'What do many children ride on to go to school?'),
(3, 2, '2325', 'Who lives in a trash can on Sesame Street?'),
(4, 2, '6977', 'What color does the sky appear to be when it rains?'),
(5, 2, '7472', 'What is the sum of 5+2?'),
(6, 1, '1933', 'awdada'),
(7, 1, '5312', 'Test question here'),
(8, 7, '9017', 'ww'),
(12, 2, '1', 'ddddd'),
(13, 2, '4125', 'aaaaaaaaaaaaaaaaaa'),
(14, 1, '1', 'For tsting'),
(15, 2, '1', 'sek');

-- --------------------------------------------------------

--
-- Table structure for table `questions2`
--

CREATE TABLE `questions2` (
  `id` int(22) NOT NULL,
  `quarter_id` int(22) NOT NULL,
  `qid` int(22) NOT NULL,
  `content` varchar(2222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions2`
--

INSERT INTO `questions2` (`id`, `quarter_id`, `qid`, `content`) VALUES
(1, 1, 7765, 'Test question here'),
(2, 1, 1049, 'What do many children ride on to go to school?'),
(3, 2, 5332, 'wwwwwwwwwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `video_link` varchar(222) NOT NULL,
  `quarter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `exercise` varchar(222) NOT NULL DEFAULT 'false',
  `quiz` varchar(222) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `title`, `content`, `video_link`, `quarter_id`, `status`, `exercise`, `quiz`) VALUES
(1, 'Types of Weather Disturbances', '<p><strong>Weather Disturbance </strong>is any pulse of energy moving through the atmosphere. It is a disruption that affects the balance condition of the atmosphere.</p>\n\n<p><img src=\"http://www.sage.unsw.edu.au/currentstudents/ug/projects/Darmawan/Cyclone_files/cyclone.jpg\" /></p>\n\n<p><strong>Low Pressure Are (LPA) and High Pressure Area (HPA)</strong></p>\n\n<p>A <strong>low pressure area </strong>is a region where the atmospheric pressure is lower than that of a surrounding environment. It is also known as a <strong>cyclone</strong>. LPA is generally associated with cloudy or rainy weather.</p>\n\n<p>A <strong>high pressure area </strong>is a region where the atmospheric pressure is greater than that of a surrounding environment. It is also known as a <strong>anticyclone</strong>. LPA is generally associated with nice weather.</p>\n\n<p><strong>The Southwest and Northeast Monsoons</strong></p>\n\n<p>A <strong>monsoon</strong> is a kind of wind pattern generating a huge weather system that lasts for a period of months and affects a large area of the Earth.</p>\n\n<p><strong>Southwest monsoon (</strong>Hanging Habagat<strong>) </strong>is a strong, generally west or southwest breeze that is responsible for bringing significant rainfall to Asia and its subcontinents.</p>\n\n<p><strong>Northeast monsoon (</strong>Hanging Amihan<strong>) </strong>is generally less stong, east or northeast breeze that is cool and dry with prolonged periods of successive cloudless days that also features cool and dry air.</p>\n\n<p>The <strong>Intertropical Convergence Zone </strong>or <strong>ITCZ </strong>is a condition of low pressure that circls the Earth generally near the equator where the trade winds of the northern and southern hemisphere meet. When this tow trade winds meet, it will cause the formation of bands of clouds and heavy rain fall.</p>\n', 'https://www.youtube.com/watch?v=DnZo5lMICKc', 1, 1, 'true', 'false'),
(2, 'The Environment Before, During and After a Tropical Storm', '<p><strong>PAGASA </strong>modified their own warning system from our Public Storm Warning Signals to five Public Storm Warning Signals.</p>\n\n<p>The <strong>Public Storm Warning Signals (PSWS )</strong></p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\n	<tbody>\n		<tr>\n			<td><strong>PSWS</strong></td>\n			<td><strong>LEAD TIME (hours)</strong></td>\n			<td><strong>Winds (kph)</strong></td>\n			<td><strong>Impacts of the Wind</strong></td>\n		</tr>\n		<tr>\n			<td>1</td>\n			<td>36</td>\n			<td>30 &ndash; 60</td>\n			<td>No Damage to Very Light Damage</td>\n		</tr>\n		<tr>\n			<td>2</td>\n			<td>24</td>\n			<td>61 &ndash; 120</td>\n			<td>Light to Moderate Damage</td>\n		</tr>\n		<tr>\n			<td>3</td>\n			<td>18</td>\n			<td>121 &ndash; 170</td>\n			<td>Moderate to Heavy</td>\n		</tr>\n		<tr>\n			<td>4</td>\n			<td>12</td>\n			<td>171 &ndash; 220</td>\n			<td>Heavy to Very Heavy</td>\n		</tr>\n		<tr>\n			<td>5</td>\n			<td>12</td>\n			<td>171 &ndash; 220</td>\n			<td>Very Heavy to Widespread Damage</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<hr />\n<p><strong>PSWS NO. 1</strong></p>\n\n<p><strong>WINDS </strong></p>\n\n<p>30 to 60 Kph</p>\n\n<p>Expected in 36 hours on 1st issuance</p>\n\n<p><strong>SEA CONDITION</strong></p>\n\n<p>Wave Height: 1.25 to 4.0 meters</p>\n\n<p><strong>DAMAGE TO STRUCTURES</strong></p>\n\n<p>Very Light or no damage to high risk structures</p>\n\n<p>Light to medium and low risk structures</p>\n\n<p>Slight damage to some houses of very light materials or makeshift structures in exposed communities</p>\n\n<p><strong>DAMAGE TO VEGETATION</strong></p>\n\n<p>Some banana plants are tilted, a few downed and leaves are generally damaged.</p>\n\n<p>Twigs of small trees may be broken.</p>\n\n<p>Rice Crops however may suffer significant damage.</p>\n\n<hr />\n<p><strong>PSWS NO. 2</strong></p>\n\n<p><strong>WINDS </strong></p>\n\n<p>61 to 120 Kph</p>\n\n<p>Expected in 24 hours on 1st issuance</p>\n\n<p><strong>SEA CONDITION</strong></p>\n\n<p>Wave Height: 4.1 to 14.0 meters</p>\n\n<p><strong>DAMAGE TO STRUCTURES</strong></p>\n\n<p>Light to Moderate damage to high risk structures</p>\n\n<p>Very Light to light damage to medium risk structures</p>\n\n<p>No damage to very light damage to low risk structures</p>\n\n<p>Unshielded, old diapated schoolhouses, makeshift shanties and other structures of light materials are partially damaged or uprooted.</p>\n\n<p><strong>DAMAGE TO VEGETATION</strong></p>\n\n<p>Most banana plants, a few mango trees, and other similar trees are downed or broken.</p>\n\n<p>Some coconuts are tilted or broken</p>\n\n<p>Rice Crops however may be adversely affected.</p>\n\n<hr />\n<p><strong>PSWS NO. 3</strong></p>\n\n<p><strong>WINDS </strong></p>\n\n<p>121 to 170 Kph</p>\n\n<p>Expected in 18hours on 1st issuance</p>\n\n<p><strong>SEA CONDITION</strong></p>\n\n<p>Wave Height: 14.0 meters</p>\n\n<p><strong>DAMAGE TO STRUCTURES</strong></p>\n\n<p>Heavy damage to high risk structures</p>\n\n<p>Moderate damage to medium risk structures</p>\n\n<p>Light damage to low risk structures</p>\n\n<p>Increasing damage to old dilapidated residential structures and houses of light materials are partially damaged or uprooted.</p>\n\n<p><strong>DAMAGE TO VEGETATION</strong></p>\n\n<p>All most all of banana plantsare downed and some big trees are broken or uprooted.</p>\n\n<p>Some trees are blown down.</p>\n\n<hr />\n<p><strong>PSWS NO. 4</strong></p>\n\n<p><strong>WINDS </strong></p>\n\n<p>171 TO 220 Kph</p>\n\n<p>Expected in 12hours on 1st issuance</p>\n\n<p><strong>SEA CONDITION</strong></p>\n\n<p>Wave Height: More than 14.0 meters</p>\n\n<p><strong>DAMAGE TO STRUCTURES</strong></p>\n\n<p>Very Heavy damage to high risk structures</p>\n\n<p>Heavy damage to medium risk structures</p>\n\n<p>Moderate damage to low risk structures</p>\n\n<p>Considerable damage to structures of light materials. Complete roof&nbsp; structure failures. Collapsed house walls and extensive damage to doors and windows.</p>\n\n<p><strong>DAMAGE TO VEGETATION</strong></p>\n\n<p>Total damage to banana plantation</p>\n\n<p>Mango trees and other similar trees are downed or broken.</p>\n\n<p>Rice Crops however may suffer severe losses.</p>\n\n<hr />\n<p><strong>PSWS NO. 5</strong></p>\n\n<p><strong>WINDS </strong></p>\n\n<p>More than 220 Kph</p>\n\n<p>Expected in 12 hours on 1st issuance</p>\n\n<p><strong>SEA CONDITION</strong></p>\n\n<p>Wave Height: More than 14.0 meters<br />\nStorm surges of more than 3 meters possible at coastal areas</p>\n\n<p><strong>DAMAGE TO STRUCTURES</strong></p>\n\n<p>Widespread to high risk structures</p>\n\n<p>Very Heavy damage to medium risk structures</p>\n\n<p>Heavy damage to low risk structures</p>\n\n<p>Complete roof failure to residences and industrial structures<br />\nSevere and extensive window and door damage.</p>\n\n<p>Electrical power distribution and communication services may be severely disrupted</p>\n\n<p>Signages and billboards may be blown down</p>\n\n<p><strong>DAMAGE TO VEGETATION</strong></p>\n\n<p>Most trees are broken and uprooted or defoliated</p>\n\n<p>Coconuts trees are broken and uprooted</p>\n\n<p>Few plants and trees have survived</p>\n\n<hr />\n<p><strong>Things to do BEFORE, DURING and AFTER a TYPHOON</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Before the Typhoon:</strong></p>\n\n<ul>\n	<li>Store an adequate supply of food and clean water</li>\n	<li>Prepare foods that need not be cooked.</li>\n	<li>Keep flashlights, candles and battery-powered radios within easy reach.</li>\n	<li>Examine your house and repair its unstable parts.</li>\n	<li>Always keep yourself updated with the latest weather report.</li>\n	<li>Harvest crops that can be yielded already.</li>\n	<li>Secure domesticated animals in a safe place.</li>\n	<li>For fisher folks, place boats in a safe area.</li>\n	<li>Should you need to evacuate, bring clothes, first aid kit, candles/flashlight, battery-powered radio, food, etc.&nbsp;</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>During the Typhoon:</strong></p>\n\n<ul>\n	<li>Stay inside the house.</li>\n	<li>Always keep yourself updated with the latest weather report.</li>\n	<li>If safe drinking water is not available, boil water for at least 20 minutes. Place it in a container with cover.</li>\n	<li>Keep an eye on lighted candles or gas lamps.</li>\n	<li>Do not wade through floodwaters to avoid being electrocuted and contracting diseases.</li>\n	<li>If there is a need to move to an evacuation center, follow these reminders.</li>\n	<li>Evacuate calmly.</li>\n	<li>Close the windows and turn off the main power switch.</li>\n	<li>Put important appliances and belongings in a high ground.</li>\n	<li>Avoid the way leading to the river.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong>After the Typhoon:</strong></p>\n\n<ul>\n	<li>If your house was destroyed, make sure that it is already safe and stable when you enter.</li>\n	<li>Beware of dangerous animals such as snakes that may have entered your house</li>\n	<li>Watch out for live wires or outlet immersed in water.</li>\n	<li>Report damaged electrical cables and fallen electric posts to the authorities.</li>\n	<li>Do not let water accumulate in tires, cans or pots to avoid creating a favorable condition for mosquito breeding.</li>\n</ul>\n', '', 1, 0, 'true', 'false'),
(3, 'Testing', '<h1>Sample content</h1>', '', 1, 0, 'false', 'false'),
(7, 'Dengvaxia issue 2019', '<p><strong>This is a sample sub header</strong></p>\n\n<p>Issue one</p>\n\n<p>&nbsp;</p>\n\n<ol>\n	<li>&nbsp;&nbsp; &nbsp;Dengvaxia is not safe to use</li>\n	<li>&nbsp;&nbsp; &nbsp;Corruption rumors.</li>\n	<li>&nbsp;&nbsp; &nbsp;All grade 4 students injected by the vaccine.</li>\n</ol>\n\n<p><br />\nIssue two</p>\n\n<p><img alt=\"\" src=\"https://image.freepik.com/free-photo/blue-jeans-texture-for-any-background_1205-800.jpg\" style=\"height:217px; width:325px\" /></p>\n\n<p>All is well.<br />\n&nbsp;</p>\n', 'https://www.youtube.com/watch?v=DnZo5lMICKc', 1, 1, 'true', 'false'),
(8, 'awdada', '<p>awdawda</p>\n\n<p>wdad</p>\n\n<p>a</p>\n\n<p>d</p>\n\n<p>a</p>\n\n<p>da</p>\n\n<p>d</p>\n', 'awdadada', 1, 1, 'false', 'false'),
(13, 'Test Title by Tobi', '<p><strong>You Got Serve !</strong></p>\n\n<p>This is a sample body of the topic.</p>\n', 'www.youtube.com', 4, 0, 'false', 'false'),
(15, 'More test cases by Wilbert', '<p>This is a test body .This is a test body .This is a test body .This is a test body .This is a test body .</p>\n', 'www.facebook.com', 3, 0, 'false', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `questions2`
--
ALTER TABLE `questions2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `questions2`
--
ALTER TABLE `questions2`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
