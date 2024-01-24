-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2024 at 03:39 AM
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
-- Database: `LHCv0.2`
--

-- --------------------------------------------------------

--
-- Table structure for table `CookingSteps`
--

CREATE TABLE `CookingSteps` (
  `StepId` int(11) NOT NULL,
  `DishesId` int(11) DEFAULT NULL,
  `StepNumber` int(11) DEFAULT NULL,
  `Instruction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CookingSteps`
--

INSERT INTO `CookingSteps` (`StepId`, `DishesId`, `StepNumber`, `Instruction`) VALUES
(1, 1, 1, 'Put 100g plain flour, 2 large eggs, 300ml milk, 1 tbsp sunflower or vegetable oil, and a pinch of salt into a bowl or large jug, then whisk to a smooth batter.'),
(2, 1, 2, 'Set aside for 30 mins to rest if you have time, or start cooking straight away.'),
(3, 1, 3, 'Set a medium frying pan or crêpe pan over a medium heat and carefully wipe it with some oiled kitchen paper.'),
(4, 1, 4, 'When hot, cook your pancakes for 1 min on each side until golden, keeping them warm in a low oven as you go.'),
(5, 1, 5, 'Serve with lemon wedges and caster sugar, or your favourite filling.'),
(6, 1, 6, 'Once cold, you can layer the pancakes between baking parchment, then wrap in cling film and freeze for up to 2 months.');

-- --------------------------------------------------------

--
-- Table structure for table `DishDescription`
--

CREATE TABLE `DishDescription` (
  `DescriptionId` int(30) NOT NULL,
  `DishesId` int(30) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DishDescription`
--

INSERT INTO `DishDescription` (`DescriptionId`, `DishesId`, `Description`) VALUES
(1, 1, 'You’ll never reach for a box of pancake mix again after making this easy pancake recipe from scratch. Requiring only a handful of pantry staples and 20 minutes of your time, these homemade pancakes are as simple, fluffy, and delicious as breakfast recipes get.');

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
-- Table structure for table `DishVideo`
--

CREATE TABLE `DishVideo` (
  `VideoID` int(11) NOT NULL,
  `Title` varchar(40) DEFAULT NULL,
  `DishID` int(10) NOT NULL,
  `URL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DishVideo`
--

INSERT INTO `DishVideo` (`VideoID`, `Title`, `DishID`, `URL`) VALUES
(1, 'Pancake Video', 1, 'https://www.youtube.com/watch?v=FLd00Bx4tOk');

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
  `IngredientID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `IngredientID`, `Quantity`) VALUES
(1, 1, 6),
(1, 2, 500),
(1, 3, 2),
(1, 4, 2),
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
(3, 'Mowsam', '7890', ''),
(4, 'Brandon', '0182', ''),
(5, 'test', 'pass', 'test@gmail.com'),
(6, 'foo', 'foo', 'foo@mail.com'),
(7, 'dani1', '1', 'danifooladi4@gmail.com'),
(8, 'mani', '1', 'danifooladi12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CookingSteps`
--
ALTER TABLE `CookingSteps`
  ADD PRIMARY KEY (`StepId`),
  ADD KEY `DishesId` (`DishesId`);

--
-- Indexes for table `DishDescription`
--
ALTER TABLE `DishDescription`
  ADD PRIMARY KEY (`DescriptionId`),
  ADD KEY `DishesId` (`DishesId`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`DishesId`);

--
-- Indexes for table `DishVideo`
--
ALTER TABLE `DishVideo`
  ADD PRIMARY KEY (`VideoID`),
  ADD KEY `DishID` (`DishID`);

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
  ADD PRIMARY KEY (`InventoryID`,`IngredientID`),
  ADD KEY `IngredientID` (`IngredientID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CookingSteps`
--
ALTER TABLE `CookingSteps`
  MODIFY `StepId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `DishDescription`
--
ALTER TABLE `DishDescription`
  MODIFY `DescriptionId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `DishesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `DishVideo`
--
ALTER TABLE `DishVideo`
  MODIFY `VideoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CookingSteps`
--
ALTER TABLE `CookingSteps`
  ADD CONSTRAINT `cookingsteps_ibfk_1` FOREIGN KEY (`DishesId`) REFERENCES `Dishes` (`DishesId`);

--
-- Constraints for table `DishDescription`
--
ALTER TABLE `DishDescription`
  ADD CONSTRAINT `dishdescription_ibfk_1` FOREIGN KEY (`DishesId`) REFERENCES `Dishes` (`DishesId`);

--
-- Constraints for table `DishVideo`
--
ALTER TABLE `DishVideo`
  ADD CONSTRAINT `dishvideo_ibfk_1` FOREIGN KEY (`DishID`) REFERENCES `dishes` (`DishesId`);

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
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`IngredientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
