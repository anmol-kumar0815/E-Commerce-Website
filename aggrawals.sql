-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 07:09 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aggrawals`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutinfo`
--

CREATE TABLE `aboutinfo` (
  `ID` int(11) NOT NULL,
  `VISITERS` varchar(10) NOT NULL,
  `PRODUCTS` varchar(100) NOT NULL,
  `BRANDS` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutinfo`
--

INSERT INTO `aboutinfo` (`ID`, `VISITERS`, `PRODUCTS`, `BRANDS`) VALUES
(2, '200', '1000', '100');

-- --------------------------------------------------------

--
-- Table structure for table `aboutlist`
--

CREATE TABLE `aboutlist` (
  `ID` int(11) NOT NULL,
  `LIST` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutlist`
--

INSERT INTO `aboutlist` (`ID`, `LIST`) VALUES
(1, 'We are here since 2000.'),
(2, 'We deal\'s in all kind of general products.'),
(3, '100% Assured Products'),
(6, 'Trust of 200+ Customers.');

-- --------------------------------------------------------

--
-- Table structure for table `aboutpic`
--

CREATE TABLE `aboutpic` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutpic`
--

INSERT INTO `aboutpic` (`ID`, `IMAGE`) VALUES
(3, 'first.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`ID`, `USERNAME`, `EMAIL`, `PASSWORD`) VALUES
(1, 'Anmol kumar', 'anmolshrivastav.08@gmail.com', 'anmol@123'),
(2, 'Umang Aggrawal', 'umangaggrwal631@gmail.com', 'umang@123');

-- --------------------------------------------------------

--
-- Table structure for table `allcategory`
--

CREATE TABLE `allcategory` (
  `ID` int(11) NOT NULL,
  `CATEGORYNAME` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allcategory`
--

INSERT INTO `allcategory` (`ID`, `CATEGORYNAME`) VALUES
(36, 'soft_drinks'),
(35, 'instant_food'),
(37, 'biscuits'),
(40, 'household_cares');

-- --------------------------------------------------------

--
-- Table structure for table `biscuits`
--

CREATE TABLE `biscuits` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `PRICE` varchar(20) NOT NULL,
  `DISCOUNT` varchar(20) DEFAULT NULL,
  `COLOR` varchar(15) NOT NULL,
  `QUANTITY` varchar(15) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `DELIVERY` varchar(10) NOT NULL,
  `RETURNABLE` varchar(5) NOT NULL,
  `NUMBEROFPRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biscuits`
--

INSERT INTO `biscuits` (`ID`, `IMAGE`, `TITLE`, `PRICE`, `DISCOUNT`, `COLOR`, `QUANTITY`, `BRAND`, `DELIVERY`, `RETURNABLE`, `NUMBEROFPRODUCT`) VALUES
(1, 'parle.jpg', 'Parle-G BISCUITS', '5', '', 'yellow', '30 grm', 'parle', '0', 'No', 54),
(3, 'gooday.jpg', 'GOODAY BISCUID RS 5', '5', '', 'BLUE', '30GM', 'BRITANIA', '0', 'No', 0),
(4, 'anmol_biscuits_1.jpeg', 'BRITANNIA Treat Jim Jam Cream Sandwich', '33', '35', 'NA', '150 G', 'BRITANNIA', '0', 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`ID`, `IMAGE`) VALUES
(5, 'first.jpg'),
(9, 'ca.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `NAME`, `EMAIL`, `PHONE`, `MESSAGE`) VALUES
(2, 'Anmol kumar', 'anmolshrivastav.08@gmail.com', '9643538308', 'Awesome e-commerce website\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(3, 'jbdchdvsc', 'anmol123@gmail.com', '9643538308', 'hello i am anmol'),
(4, 'Avinash', 'avinashvangunde@gmail.com', '233344', 'Great Job Bro......'),
(5, 'anmol', 'anmol@gmail.com', '9643538308', 'Hey Anmol');

-- --------------------------------------------------------

--
-- Table structure for table `household_cares`
--

CREATE TABLE `household_cares` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `PRICE` varchar(20) NOT NULL,
  `DISCOUNT` varchar(20) DEFAULT NULL,
  `COLOR` varchar(15) NOT NULL,
  `QUANTITY` varchar(15) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `DELIVERY` varchar(10) NOT NULL,
  `RETURNABLE` varchar(5) NOT NULL,
  `NUMBEROFPRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `household_cares`
--

INSERT INTO `household_cares` (`ID`, `IMAGE`, `TITLE`, `PRICE`, `DISCOUNT`, `COLOR`, `QUANTITY`, `BRAND`, `DELIVERY`, `RETURNABLE`, `NUMBEROFPRODUCT`) VALUES
(1, 'HOUSEHOLD_EXCELSURF.jpg', ' SURF EXCEL EASY WASH  DETERGENT POWDER 3KG', '330', '350', 'BLUE', '3 KG', 'SURF EXCEL', '0', 'Yes', 331),
(2, 'HOUSEHOLD_EXCELSURF1.jpg', 'SURF EXCEL EASY WASY DETERGENT POWDER 1KG', '110', '114', 'BLUE', '1KG', 'SURF EXCEL', '0', 'Yes', 6631),
(3, 'HOUSEHOLD_EXCELSURF2.jpg', ' SURF EXCEL EASY WASH  DETERGENT POWDER 500GM', '55', '57', 'BLUE', '500GM', 'SURF EXCEL', '0', 'No', 2151),
(4, 'HOUSEHOLD_EXCELSURF3.jpg', ' SURF EXCEL EASY WASH  DETERGENT POWDER 12PCS x 10RS', '110', '120', 'BLUE', '150GM', 'SURF EXCEL', '0', 'No', 6616),
(5, 'SUR_EXCLE_QUICKWASH.jpg', 'Surf Excel Quick Wash - 1 kg with Free Comfort Fabric Conditioner Worth - 200 ml', '235', '240', 'VOILET', '1KG', 'SURF EXCEL', '0', 'Yes', 1616),
(6, 'HARPIC1.jpg', 'HARPIC DISINFECTION TOILET CLERANER 1LTR', '150', '168', 'VOILET', '1LTRS', 'HARPIC', '0', 'Yes', 211),
(7, 'HARPIC.jpg', 'HARPIC DISINFECTION TOILET CLERANER 2LTR', '300', '335', 'VOILET', '2LTR', 'HARPIC', '0', 'Yes', 55),
(8, 'WHEEL1KG.jpg', 'WHEEL 2 IN 1 DETERGENT POWDER 1KG', '60', '', 'VOILET', '1KG', 'WHEEL', '0', 'No', 3116),
(9, 'WHEELSURF.jpg', 'WHEEL 2 IN 1 DETERGENT POWDER 500GM', '30', '', 'GREEN', '500GM', 'WHEEL', '0', 'No', 615),
(10, 'LIZOLCAN.jpg', 'Lizol Disinfectant Surface & Floor Cleaner Liquid, Citrus - 5 L ', '687', '810', 'yellow', '5LTR', 'LIZOL', '0', 'Yes', 116),
(11, 'COLIN.jpg', 'Colin Glass and Surface Cleaner Liquid Spray, Regular - (Pack of 3) ', '225', '279', ' SKY BLUE', '3LTR', 'COLIN', '0', 'Yes', 548),
(12, 'COLIN1.jpg', 'Colin Glass and Surface Cleaner Liquid Spray, Regular ,', '90', '93', ' SKY BLUE', '1LTR', 'COLIN', '0', 'Yes', 548),
(13, 'FENASUR.jpg', 'FENA DETERGENT POWDER 1KG PACK', '62', '', 'BLUE AND WHITE', '1KG', 'FENA', '0', 'Yes', 942),
(14, 'GHARISURF.jpg', 'GHARI DETEGENT POWDER 1KG', '61', '', 'BLUE AND WHITE', '1KG', 'GHARI', '0', 'No', 2151),
(15, 'FENASUR1.jpg', 'FENA DETERGENT POWDER 500GM PACK', '31', '', 'BLUE AND WHITE', '500GM', 'FENA', '0', 'No', 515),
(16, 'GHARISURF1.jpg', 'GHARI DETEGENT POWDER 500gm', '31', '', 'BLUE AND WHITE', '500GM', 'GHARI', '0', 'No', 5464);

-- --------------------------------------------------------

--
-- Table structure for table `instant_food`
--

CREATE TABLE `instant_food` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `PRICE` varchar(20) NOT NULL,
  `DISCOUNT` varchar(20) DEFAULT NULL,
  `COLOR` varchar(15) NOT NULL,
  `QUANTITY` varchar(15) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `DELIVERY` varchar(10) NOT NULL,
  `RETURNABLE` varchar(5) NOT NULL,
  `NUMBEROFPRODUCT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instant_food`
--

INSERT INTO `instant_food` (`ID`, `IMAGE`, `TITLE`, `PRICE`, `DISCOUNT`, `COLOR`, `QUANTITY`, `BRAND`, `DELIVERY`, `RETURNABLE`, `NUMBEROFPRODUCT`) VALUES
(1, 'maggie_280g.jpg', 'Maggie', '50', '60', 'Yellow', '250g', 'Nestle Maggie', '0', 'No', 505),
(2, 'hakka.jpg', 'Hakka Noodles', '20', '25', 'White', '150g', 'Hakka Noodles', '0', 'Yes', 66),
(3, 'manchurian.jpg', 'Manchurian', '55', '62', '----', '250g', 'Manchurian', '0', 'No', 6),
(4, 'yipee 280g.jpg', 'Yipee', '50', '62', '---', '280g', 'Yipee', '0', 'No', 5441),
(5, 'yippee_520g.jpg', 'Yipee', '70', '100', '---', '520g', 'Yipee', '0', 'No', 505),
(6, 'anmol_instantFood_1.jpeg', 'TOP RAMEN Curry Instant Noodles Vegetarian', '80', '100', 'NA', '280 G', 'TOP RAMEN', '0', 'No', -10),
(7, 'anmol_instantFood_2.jpeg', 'Yellow Moong Dal (Split)  (500 g)', '49', '110', 'NA', '500 G', 'Unbranded', '0', 'Yes', -10),
(8, 'anmol_instantFood_3.jpeg', 'Origo Fresh Brown Horse Gram (Whole)  (200 g)', '19', '25', 'NA', '200 g', ' Origo Fresh', '0', 'Yes', -10),
(9, 'anmol_instantFood_4.jpeg', 'Tata Q Spicy Vegetable Biryani 330 g', '65', '90', 'NA', '330 G', 'Tata Q', '0', 'Yes', -10);

-- --------------------------------------------------------

--
-- Table structure for table `normaluser`
--

CREATE TABLE `normaluser` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `ADDRESS` varchar(1000) NOT NULL,
  `CITY` varchar(200) NOT NULL,
  `PINCODE` varchar(20) NOT NULL,
  `STATE` varchar(200) NOT NULL,
  `COUNTRY` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normaluser`
--

INSERT INTO `normaluser` (`ID`, `NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `ADDRESS`, `CITY`, `PINCODE`, `STATE`, `COUNTRY`) VALUES
(11, 'Anmol Kumar', 'anmolshrivastav.08@gmail.com', '9643538308', 'anmol@123', '1684 Kotla Mubarak Pur, New Delhi, India 110003', 'New Delhi', '110003', 'New Delhi', 'India'),
(12, 'Umang', 'umangaggrawal631@gmail.com', '9899126409', 'umang@123', 'T-350,Street number-09, Gautampuri Near Shiv Mandir New-Delhi 110053', 'New Delhi', '110053', 'Delhi', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `normaluser_cart_11`
--

CREATE TABLE `normaluser_cart_11` (
  `ID` int(11) NOT NULL,
  `PRODUCTCATEGORY` varchar(400) NOT NULL,
  `PRODUCTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normaluser_cart_11`
--

INSERT INTO `normaluser_cart_11` (`ID`, `PRODUCTCATEGORY`, `PRODUCTID`) VALUES
(3, 'instant_food', 4),
(4, 'biscuits', 3),
(5, 'soft_drinks', 9),
(6, 'soft_drinks', 11),
(7, 'household_cares', 5),
(8, 'soft_drinks', 20),
(10, 'instant_food', 2),
(11, 'instant_food', 3),
(12, 'soft_drinks', 2);

-- --------------------------------------------------------

--
-- Table structure for table `normaluser_cart_12`
--

CREATE TABLE `normaluser_cart_12` (
  `ID` int(11) NOT NULL,
  `PRODUCTCATEGORY` varchar(400) NOT NULL,
  `PRODUCTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normaluser_cart_12`
--

INSERT INTO `normaluser_cart_12` (`ID`, `PRODUCTCATEGORY`, `PRODUCTID`) VALUES
(1, 'soft_drinks', 5),
(2, 'soft_drinks', 4);

-- --------------------------------------------------------

--
-- Table structure for table `normaluser_wishlist_11`
--

CREATE TABLE `normaluser_wishlist_11` (
  `ID` int(11) NOT NULL,
  `PRODUCTCATEGORY` varchar(400) NOT NULL,
  `PRODUCTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normaluser_wishlist_11`
--

INSERT INTO `normaluser_wishlist_11` (`ID`, `PRODUCTCATEGORY`, `PRODUCTID`) VALUES
(8, 'instant_food', 3),
(9, 'soft_drinks', 2);

-- --------------------------------------------------------

--
-- Table structure for table `normaluser_wishlist_12`
--

CREATE TABLE `normaluser_wishlist_12` (
  `ID` int(11) NOT NULL,
  `PRODUCTCATEGORY` varchar(400) NOT NULL,
  `PRODUCTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normaluser_wishlist_12`
--

INSERT INTO `normaluser_wishlist_12` (`ID`, `PRODUCTCATEGORY`, `PRODUCTID`) VALUES
(1, 'instant_food', 5);

-- --------------------------------------------------------

--
-- Table structure for table `soft_drinks`
--

CREATE TABLE `soft_drinks` (
  `ID` int(10) UNSIGNED NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `PRICE` varchar(20) NOT NULL,
  `DISCOUNT` varchar(20) DEFAULT NULL,
  `COLOR` varchar(15) NOT NULL,
  `QUANTITY` varchar(15) NOT NULL,
  `BRAND` varchar(50) NOT NULL,
  `DELIVERY` varchar(10) NOT NULL,
  `RETURNABLE` varchar(5) NOT NULL,
  `NUMBEROFPRODUCT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soft_drinks`
--

INSERT INTO `soft_drinks` (`ID`, `IMAGE`, `TITLE`, `PRICE`, `DISCOUNT`, `COLOR`, `QUANTITY`, `BRAND`, `DELIVERY`, `RETURNABLE`, `NUMBEROFPRODUCT`) VALUES
(1, 'coca.jpg', 'Coca Cola', '100', '120', 'Black', '250 ml', 'Coca Cola', '0', 'No', 50),
(2, 'pepsi 2.jpg', 'Pepsi', '60', '75', 'Black', '200 ml', 'Pepsi', '0', 'No', 0),
(3, 'pepsi.png', 'Pepsi ', '40', '', '---', '50 ml', 'Pepsi', '10', 'No', 27),
(4, 'pepsi1.jpg', 'Pepsi', '50', '55', '---', '150 ml', 'Pepsi', '0', 'No', 19),
(6, 'softdrink1.jpeg', 'kinley Soda Extra Punch PET Bottle  (750 ml)', '17', '20', 'Clear', '750 ml', 'kinley', '0', 'Yes', 61),
(7, 'softdrink2.jpeg', 'Appy Fizz Can  (250 ml)', '25', '', 'Black', '250 ml', 'Appy', '0', 'No', 2),
(8, 'softdrink3.jpeg', 'coolberg Peach Non Alcoholic Beer - 330ml (Pack of 12) Glass Bottle  (12 x 330 ml)', '604', '948', 'Orange', '3960 ml', 'coolberg', '50', 'Yes', 51),
(9, 'softdrink4.jpeg', 'Glinter Sparkling Water Guava Flavoured Tonic Water best for Mixers, Pack of 6 Cans, 350ml Each Can  (6 x 350 ml)', '599', '720', 'Pink', '2100 ml', 'Glinter', '40', 'Yes', 260),
(10, 'softdrink5.jpeg', 'Mountain Dew Can  (250 ml)', '24', '30', 'NA', '250 ml', 'Mountain Dew', '0', 'No', 616),
(11, 'softdrink6.jpeg', 'Kingfisher Radler Lemon Flavour Can  (300 ml)', '29', '50', 'NA', '300 ml', 'Kingfisher', '0', 'No', 616),
(12, 'softdrink7.jpeg', 'Heineken Alcohol Free Beer Can  (330 ml)', '37', '75', 'NA', '330 ml', 'Heineken', '0', 'No', 3251),
(13, 'softdrink8.jpeg', 'Baron De Bercy Non-alcoholic Fruit Wine Glass Bottle  (1000 ml)', '300', '400', 'Black', '1000 ml', ' Baron De Bercy', '30', 'Yes', 94),
(14, 'softdrink9.jpeg', 'Gunsberg Ginger Ale -325ml Each Glass Bottle  (6 x 325 ml)', '520', '', 'NA', '1950', 'Gunsberg', '0', 'Yes', 4545),
(15, 'softdrink10.jpeg', 'Bavaria Premium Original Non Alcoholic Malt Beer Drink 330 ml Each Pack of 12 ( Total 3960 ml ) Can  (12 x 330 ml)', '1149', '1500', 'NA', '3960 ml', 'Bavaria', '0', 'No', 8545),
(16, 'softdrink11.jpeg', 'Kingfisher Radler Ginger Lime Non-Alcoholic Glass Bottle  (300 ml)', '48', '70', 'NA', '300 ml', 'Kingfisher', '0', 'No', 121),
(17, 'softdrink13.jpeg', 'SUN CRUSH Sparkling Lemon Can  (6 x 300 ml)', '300', '400', 'NA', '1800 ml', 'SUN CRUSH', '40', 'Yes', 511),
(18, 'softdrink14.jpeg', 'SUN CRUSH Malt (Apple) Can  (6 x 300 ml)', '346', '360', 'NA', '1800 ml', ' SUN CRUSH', '0', 'Yes', 64621),
(19, 'softdrink15.jpeg', 'Zenzi Sparkling Water - Assorted | Pack of 4 (350ml Each) | 100% Natural Flavour | Zero Sugar & Zero Calories PET Bottle  (4 x 350 ml)', '200', '252', 'NA', '1400 ml', 'Zenzi', '0', 'No', 215),
(20, 'softdrink16.jpeg', 'PEER Zero Cal. Indian Tonic Water | No Calories No Sugar| Nothing Artificial | Indiaâ€™s Lowest Calorie Tonic Water| Glass Bottle  (6 x 200 ml)', '570', '600', 'NA', '1200 ml', 'PEER', '0', 'Yes', 212),
(21, 'softdrink17.jpeg', 'monster energy MIXXD Punch 500ml each (pack of 6 cans) Tin  (6 x 500 ml)', '1550', '2200', 'NA', '3000 ML', ' monster energy', '0', 'No', 5515),
(22, 'softdrink18.jpeg', 'Zenzi Sparkling Water - Lime Ginger | Pack of 4 (350ml Each) | 100% Natural Flavour | Zero Sugar & Zero Calories PET Bottle  (4 x 350 ml)', '200', '252', 'NA', '1400 ML', 'Zenzi', '0', 'Yes', 511),
(23, 'softdrink19.jpeg', 'PERRIER Carbonated Water (Sparkling Water) 330ml Glass Bottle Glass Bottle  (4 x 330 ml)', '570', '600', 'NA', '1320 ml', ' PERRIER', '0', 'No', 5151),
(24, 'softdrink20.jpeg', 'Smart Natural Mixer Soda Water Tin  (6 x 250 ml)', '210', '300', 'NA', '1500 ML', 'Smart Natural Mixer', '0', 'Yes', 461),
(25, 'softdrink20jpeg.jpeg', 'Organisch nimbu soda (Lemon soda) 100 gm Pouch  (100 ml)', '101', '105', 'NA', '100 ml', ' Organisch', '0', 'No', 616),
(27, 'softdrink_30.jpeg', 'Paper boat Jaljeera', '30', '35', 'NA', '200 ml', ' Paper boat', '0', 'No', 0),
(28, 'WhatsApp Image 2021-12-02 at 10.28.13 AM.jpeg', 'dmcbdc', '646', '55551', 'NA', '280 G', 'TOP RAMEN', '0', 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`ID`, `IMAGE`, `TITLE`, `DESCRIPTION`) VALUES
(13, 'kunal.jpeg', 'Kunal Gaur', 'FrontEnd and Payment Gateway Integration'),
(12, 'saud.jpeg', 'Saud Akthar', 'FrontEnd and Payment Gateway Integration'),
(6, 'Umang.jpeg', 'Umang Aggrawal', 'Project Idea, Website Design, Database Schema Design and Front End'),
(5, 'image.jpeg', 'Anmol Shrivastav', 'Website Developer[FrontEnd + BackEnd]'),
(7, 'rohit.jpeg', 'Rohit Vishwakarma', 'Website Developer[FrontEnd + BackEnd]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutinfo`
--
ALTER TABLE `aboutinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `aboutlist`
--
ALTER TABLE `aboutlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `aboutpic`
--
ALTER TABLE `aboutpic`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `allcategory`
--
ALTER TABLE `allcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `biscuits`
--
ALTER TABLE `biscuits`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `household_cares`
--
ALTER TABLE `household_cares`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instant_food`
--
ALTER TABLE `instant_food`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `normaluser`
--
ALTER TABLE `normaluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `normaluser_cart_11`
--
ALTER TABLE `normaluser_cart_11`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `normaluser_cart_12`
--
ALTER TABLE `normaluser_cart_12`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `normaluser_wishlist_11`
--
ALTER TABLE `normaluser_wishlist_11`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `normaluser_wishlist_12`
--
ALTER TABLE `normaluser_wishlist_12`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `soft_drinks`
--
ALTER TABLE `soft_drinks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutinfo`
--
ALTER TABLE `aboutinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aboutlist`
--
ALTER TABLE `aboutlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aboutpic`
--
ALTER TABLE `aboutpic`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `allcategory`
--
ALTER TABLE `allcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `biscuits`
--
ALTER TABLE `biscuits`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `household_cares`
--
ALTER TABLE `household_cares`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `instant_food`
--
ALTER TABLE `instant_food`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `normaluser`
--
ALTER TABLE `normaluser`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `normaluser_cart_11`
--
ALTER TABLE `normaluser_cart_11`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `normaluser_cart_12`
--
ALTER TABLE `normaluser_cart_12`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `normaluser_wishlist_11`
--
ALTER TABLE `normaluser_wishlist_11`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `normaluser_wishlist_12`
--
ALTER TABLE `normaluser_wishlist_12`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soft_drinks`
--
ALTER TABLE `soft_drinks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
