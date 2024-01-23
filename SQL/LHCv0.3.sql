-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2024 at 12:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
CREATE DATABASE testLHC; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LHCv0.2`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `DishesId` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Duration` varchar(30) DEFAULT NULL,
  `Serves` int(2) DEFAULT NULL,
  `Cuisine` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`DishesId`, `Name`, `Duration`, `Serves`, `Cuisine`) VALUES
(1, 'Pancakes', '40 minutes', 4, 'American'),
(2, 'Cookies', '1 hour', 5, 'Dessert'),
(3, 'Millionaire Shortbread ', '1 hour & 30 minutes', 5, NULL),
(4, 'Butter Chicken', '1 hour & 30 minutes', 5, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `FollowedID` int(11) NOT NULL,
  `FollowerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`FollowedID`, `FollowerID`) VALUES
(2, 1),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `IngredientID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `FoodGroup` varchar(10) DEFAULT NULL,
  `Allergen` tinyint(1) DEFAULT NULL,
  `UnitType` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientID`, `Name`, `FoodGroup`, `Allergen`, `UnitType`) VALUES
(1, 'Eggs ', 'Protein', NULL, NULL),
(2, 'Plain Flour', NULL, NULL, NULL),
(3, 'Pepper', 'Vegetable', NULL, NULL),
(4, 'Penuts', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_dishes`
--

CREATE TABLE `ingredients_dishes` (
  `IngredientID` int(15) NOT NULL,
  `DishID` int(10) NOT NULL,
  `Quantity` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients_dishes`
--

INSERT INTO `ingredients_dishes` (`IngredientID`, `DishID`, `Quantity`) VALUES
(1, 1, '2'),
(1, 2, '1'),
(2, 1, '500g'),
(4, 4, '200');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `UserID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_ingredients`
--

CREATE TABLE `inventory_ingredients` (
  `InventoryID` int(15) NOT NULL,
  `IngredientID` int(15) NOT NULL,
  `Quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_ingredients`
--

INSERT INTO `inventory_ingredients` (`InventoryID`, `IngredientID`, `Quantity`) VALUES
(1, 1, 6),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`) VALUES
(1, 'Abdullah', '1234', ''),
(2, 'dani', '1234', 'danifooladi@gmail.com'),
(3, 'Mosam', '7890', ''),
(4, 'Brandon', '0182', ''),
(5, 'test', 'pass', 'test@gmail.com'),
(6, 'foo', 'foo', 'foo@mail.com'),
(7, 'dani1', '1', 'danifooladi4@gmail.com'),
(8, 'mani', '1', 'danifooladi12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`DishesId`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`FollowedID`,`FollowerID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`IngredientID`);

--
-- Indexes for table `ingredients_dishes`
--
ALTER TABLE `ingredients_dishes`
  ADD PRIMARY KEY (`IngredientID`,`DishID`),
  ADD KEY `DishID` (`DishID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `inventory_ingredients`
--
ALTER TABLE `inventory_ingredients`
  ADD PRIMARY KEY (`InventoryID`,`IngredientID`),
  ADD KEY `inventory_ingredients_ibfk_2` (`IngredientID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `DishesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`FollowedID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`FollowedID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `ingredients_dishes`
--
ALTER TABLE `ingredients_dishes`
  ADD CONSTRAINT `ingredients_dishes_ibfk_1` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`IngredientID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ingredients_dishes_ibfk_2` FOREIGN KEY (`DishID`) REFERENCES `dishes` (`DishesId`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `inventory_ingredients`
--
ALTER TABLE `inventory_ingredients`
  ADD CONSTRAINT `inventory_ingredients_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`InventoryID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ingredients_ibfk_2` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`IngredientID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
