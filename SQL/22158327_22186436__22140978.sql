-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2024 at 06:10 PM
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
-- Database: `22158327_22186436_ 22140978`
--
CREATE DATABASE IF NOT EXISTS `22158327_22186436_ 22140978` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `22158327_22186436_ 22140978`;

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
(6, 1, 6, 'Once cold, you can layer the pancakes between baking parchment, then wrap in cling film and freeze for up to 2 months.'),
(7, 2, 1, 'Beat butter, peanut butter, white sugar, and brown sugar with an electric mixer in a large bowl until smooth; beat in eggs.'),
(8, 2, 2, 'Sift flour, baking soda, baking powder, and salt into a separate bowl; stir into butter mixture until dough is just combined. Chill cookie dough in the refrigerator for 1 hour to make it easier to work with.'),
(9, 2, 3, 'Preheat the oven to 375 degrees F (190 degrees C).'),
(10, 2, 4, 'Roll dough into 1-inch balls and place 2 inches apart onto ungreased baking sheets. Flatten each ball with a fork, making a crisscross pattern.'),
(11, 2, 5, 'Bake in the preheated oven until edges are golden, about 7 to 10 minutes. Cool on the baking sheets briefly before removing to a wire rack to cool completely.'),
(15, 4, 1, 'In a medium bowl, mix all the marinade ingredients with some seasoning. Chop the chicken into bite-sized pieces and toss with the marinade. Cover and chill in the fridge for 1 hr or overnight.'),
(16, 4, 2, 'In a large, heavy saucepan, heat the oil. Add the onion, garlic, green chilli, ginger and some seasoning. Fry on a medium heat for 10 mins or until soft.'),
(17, 4, 3, 'Add the spices with the tomato purée, cook for a further 2 mins until fragrant, then add the stock and marinated chicken. Cook for 15 mins, then add any remaining marinade left in the bowl. Simmer for 5 mins, then sprinkle with the toasted almonds. Serve with rice, naan bread, chutney, coriander and lime wedges, if you like.'),
(18, 5, 1, 'Preheat the oven to 350 degrees F (175 degrees C).'),
(19, 5, 2, 'Mix ground beef, quick oats, onion, milk, eggs, 1/4 cup ketchup, parsley, garlic, salt, basil, and black pepper together in a large bowl until thoroughly combined; pat the mixture into a 9x5-inch loaf pan.'),
(20, 5, 3, 'Bake meatloaf in the preheated oven until firm and no longer pink inside, 1 to 1 1/4 hours. An instant-read meat thermometer inserted into the center of the meatloaf should read at least 160 degrees F (70 degrees C).'),
(21, 5, 4, 'Remove from oven, spread 2 tablespoons ketchup over loaf, and top with Cheddar cheese slices; return to oven and bake until cheese has melted, about 5 more minutes.'),
(22, 6, 1, 'Tip the cornmeal, flour, egg, caster sugar, salt, baking powder and milk into a bowl, and whisk until you have a smooth, lump-free batter. Carefully pour the batter into a tall jug or glass.\r\n'),
(23, 6, 2, 'Push a wooden skewer through the length of each frankfurter, so it goes about three-quarters of the way through. Fill a pan no more than a third full with oil and heat to 180C, or until a cube of bread dropped in browns within 30 seconds.'),
(24, 6, 3, 'Working with one frankfurter at a time, submerge it into the batter and gently turn to coat – it should be completely covered. Carefully drop into the oil and fry for 2-3 mins, or until the batter is crisp and golden. Drain on a sheet of kitchen paper. Repeat with the remaining frankfurters. Serve with ketchup and American mustard for dipping or drizzling over.'),
(25, 7, 1, 'Mix the lemon juice with the paprika and red onions in a large shallow dish. Slash each chicken thigh three times, then turn them in the juice and set aside for 10 mins.'),
(26, 7, 2, 'Mix all of the marinade ingredients together and pour over the chicken. Give everything a good mix, then cover and chill for at least 1 hr. This can be done up to a day in advance.'),
(27, 7, 3, 'Heat the grill. Lift the chicken pieces onto a rack over a baking tray. Brush over a little oil and grill for 8 mins on each side or until lightly charred and completely cooked through.'),
(28, 8, 1, 'Toss the lamb in a bowl with the garlic, ginger and a large pinch of salt. Marinate in the fridge overnight or for at least a couple of hours.\r\n'),
(29, 8, 2, 'Heat the oil in a casserole. Fry the lamb for 5-10 mins until starting to brown. Add the onion, cumin seeds and nigella seeds, and cook for 5 mins until starting to soften. Stir in the curry paste, then cook for 1 min more. Scatter in the rice and curry leaves, then pour over the stock and bring to the boil. Meanwhile, heat oven to 180C/160C fan/gas 4.'),
(30, 8, 3, 'Stir in the paneer, spinach and some seasoning. Cover the dish with a tight lid of foil, then put the lid on to ensure it’s well sealed. Cook in the oven for 20 mins, then leave to stand, covered, for 10 mins. Bring the dish to the table, remove the lid and foil, scatter with the coriander and chillies and serve with yogurt on the side.'),
(31, 9, 1, 'In a large bowl, combine the pork, ginger, garlic, green onion, soy sauce, sesame oil, egg and cabbage. Stir until well mixed.'),
(32, 9, 2, 'Place 1 heaping teaspoon of pork filling onto each wonton skin. Moisten edges with water and fold edges over to form a triangle shape. Roll edges slightly to seal in filling. Set dumplings aside on a lightly floured surface until ready to cook.'),
(33, 9, 3, 'Arrange dumplings in a covered bamboo or metal steamer so they don\'t touch to prevent them from sticking together; steam for 15 minutes, or until pork is cooked through.'),
(34, 10, 1, 'Place carrots in a small saucepan and cover with water. Bring to a low boil and cook for 3 to 5 minutes. Stir in peas, then immediately drain in a colander.'),
(35, 10, 2, 'Heat a wok over high heat. Pour in vegetable oil, then stir in carrots, peas, and garlic; cook for about 30 seconds. Add eggs; stir quickly to scramble eggs with vegetables.'),
(36, 10, 3, 'Stir in cooked rice. Add soy sauce and toss rice to coat. Drizzle with sesame oil and toss again.'),
(37, 11, 1, 'Make the wontons: Mix pork, shrimp, rice wine, soy sauce, brown sugar, green onions, and ginger together in a large bowl until well combined. Let stand for 25 to 30 minutes.'),
(38, 11, 2, 'Spoon about 1 teaspoon filling onto the center of a wonton wrapper. Moisten all four wrapper edges with water and fold over filling to make a triangle; press the edges firmly to seal. Bring left and right corners together above filling; overlap the tips of these corners, moisten with water, and press together to seal. Repeat until all wrappers have been filled and sealed.'),
(39, 11, 3, 'Make the soup: Bring chicken stock to a rolling boil in a pot. Gently drop in wontons and cook for 5 minutes.\r\n'),
(40, 11, 4, 'Ladle into bowls and garnish with green onions.');

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
(1, 1, 'You’ll never reach for a box of pancake mix again after making this easy pancake recipe from scratch. Requiring only a handful of pantry staples and 20 minutes of your time, these homemade pancakes are as simple, fluffy, and delicious as breakfast recipes get.'),
(2, 2, 'A favorite for all the peanut butter lovers, these cookies are made with hand-rolled dough that is often flattened with a fork to achieve that familiar waffle pattern. There is nothing like a peanut butter cookie to satisfy your sweet tooth and lift your spirits. This peanut butter cookie recipe will quickly become a family favorite.'),
(3, 4, 'Fancy a healthy version of your favourite Friday night curry? Try our easy butter chicken – the meat can be marinaded the day before so you can get ahead on your prep'),
(4, 5, 'Meatloaf is a weeknight classic. This version stays with the tried and true elements while adding vegetables for a healthier twist. The pureed vegetables also add a lot of moisture and flavor, as does the classic glaze. Besides the ingredients, the key to a great meatloaf recipe is cooking the meat to the right temperature.'),
(5, 6, 'Make American-inspired corndogs by coating frankfurter sausages in a cornmeal batter, then deep-frying and serving with ketchup and yellow mustard'),
(6, 7, 'This healthy, low-fat curried chicken is packed full of flavour. It\'s quick to cook, and the marinade does all the work – who needs takeaways?'),
(7, 8, 'Make this classic Indian dish for deliciously moist lamb with paneer, rice and spinach, all spiced to perfection. Great for casual entertaining'),
(8, 9, 'These tasty steamed pork dumplings make a perfect appetizer for a party or you can serve them as a main dish. Serve with hoisin sauce, hot Chinese-style mustard, and toasted sesame seeds.\r\nIf you\'re looking for the best steamed pork dumplings recipe on the internet, you\'ve come to the right place. These pork dumplings are as easy to assemble and steam as they are to eat.'),
(9, 10, 'Fried rice is the ultimate family-friendly dish that yields maximum flavor without fuss. Loaded with tender sauteed veggies and delicious bits of scrambled egg, this top-rated recipe makes it easy to recreate a takeout favorite from home in just 20 minutes.\r\n\r\n Over a thousand home cooks agree — this simple, savory recipe is a winner. But what if you don\'t have a wok on hand? Learn the best methods for making fried rice at home, from a griddle to Instant Pot preparation.'),
(10, 11, 'Wonton soup is a simple, light, Chinese classic with pork-filled dumplings in seasoned chicken broth. Whether in soup or fried, wontons always add delicious, hearty flavor to any dish!');

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
(4, 'Butter Chicken', '1 hour & 30 minutes', 5, 'Indian'),
(5, 'All-American Meatloaf', '1 hour & 30 minutes', 8, 'American'),
(6, 'Corndogs', '30 minutes', 8, 'American'),
(7, 'Tandoori chicken', '45 minutes', 6, 'Indian'),
(8, 'Lamb biryani', '1 hour', 6, 'Indian'),
(9, 'Pork Dumplings', '1 hour', 7, 'Chinese'),
(10, 'Vegetable Fried Rice', '20 minutes', 4, 'Chinese'),
(11, 'Wonton Soup', '1 hour & 20 minutes', 7, 'Chinese');

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
(1, 'Pancake Video', 1, 'https://www.youtube.com/watch?v=FLd00Bx4tOk'),
(2, 'Cookie Cooking Video', 2, 'https://www.youtube.com/watch?v=PFJAuAWxuvI'),
(3, 'Butter Chicken', 4, 'https://www.youtube.com/watch?v=a03U45jFxOI'),
(4, 'All-American Meatloaf Cooking Video', 5, 'https://www.youtube.com/watch?v=m6IrjnZMu9E'),
(5, 'Corndogs Cooking Video', 6, 'https://www.youtube.com/watch?v=zGT45vVJNso'),
(6, 'Tandoori chicken Cooking Video', 7, 'https://www.youtube.com/watch?v=Eot2K6IDUcI'),
(7, 'Lamb biryani Cooking Video', 8, 'https://www.youtube.com/watch?v=Yk6Hi2Z9BNM'),
(8, 'Pork Dumplings Cooking Video', 9, 'https://www.youtube.com/watch?v=oNaijqLvUz0'),
(9, 'Vegetable Cooking Video', 10, 'https://www.youtube.com/watch?v=g1Zbx81LlbE'),
(10, 'Wonton Soup Cooking Video', 11, 'https://www.youtube.com/watch?v=5-5WAmkqlCQ');

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
(18, 15),
(18, 16),
(18, 17);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `IngredientID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`IngredientID`, `Name`) VALUES
(1, 'Eggs '),
(2, 'Plain Flour'),
(3, 'Pepper'),
(4, 'Penuts'),
(5, 'Baking powder'),
(6, 'Sugar'),
(7, 'Salt'),
(8, 'Milk'),
(9, 'Butter'),
(10, 'Chicken Thigh'),
(11, 'Red onions'),
(12, 'Garam masala'),
(13, 'Ground cumin'),
(14, 'Chilli powder'),
(15, 'Paprika'),
(16, 'Ginger'),
(17, 'Vegetable Oil'),
(18, 'Basmati rice'),
(19, 'Lamb Meat'),
(20, 'Lamb Broth'),
(21, 'Paneer'),
(22, 'Spinach'),
(23, 'Sliced green chillies'),
(24, 'Chopped coriander'),
(25, 'Wonton '),
(26, 'Pork'),
(27, 'Soy sauce'),
(28, 'Cabbage'),
(29, 'Chopped Baby Carrots');

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
(1, 6, '4'),
(1, 10, '4'),
(1, 11, '4'),
(2, 1, '500g'),
(2, 6, '100'),
(4, 4, '200'),
(5, 1, '15'),
(5, 2, '4'),
(5, 6, '10'),
(5, 7, '10'),
(5, 8, '10'),
(6, 1, '12.5'),
(6, 2, '200'),
(7, 1, '2'),
(7, 2, '3'),
(7, 10, '30'),
(7, 11, '30'),
(8, 1, '300'),
(8, 2, '300'),
(8, 6, '150'),
(9, 1, '45'),
(9, 2, '250'),
(10, 4, '100'),
(10, 7, '200'),
(11, 4, '50'),
(11, 7, '60'),
(11, 8, '80'),
(11, 9, '50'),
(11, 10, '40'),
(11, 11, '40'),
(12, 4, '5'),
(13, 4, '8'),
(14, 4, '8'),
(15, 4, '5'),
(15, 7, '50'),
(15, 8, '60'),
(16, 4, '10'),
(16, 9, '12'),
(17, 4, '50'),
(17, 6, '30'),
(17, 7, '30'),
(17, 8, '50'),
(17, 10, '40'),
(17, 11, '40'),
(18, 4, '400'),
(18, 8, '500'),
(18, 10, '400'),
(18, 11, '500'),
(19, 8, '400'),
(19, 9, '700'),
(22, 8, '100'),
(23, 9, '20'),
(25, 9, '200');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `IngredientID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`) VALUES
(15, 'dani', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'danifooladi@gmail.com'),
(16, 'abdullah', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'abdullah@mail.com'),
(17, 'mowsam', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'mowsam@mail.com'),
(18, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin@gmail.com');

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
  MODIFY `StepId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `DishDescription`
--
ALTER TABLE `DishDescription`
  MODIFY `DescriptionId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `DishesId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `DishVideo`
--
ALTER TABLE `DishVideo`
  MODIFY `VideoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
