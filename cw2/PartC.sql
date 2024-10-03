CREATE DATABASE IF NOT EXISTS cw2;
USE cw2;

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Staff_id` int UNSIGNED AUTO_INCREMENT NOT NULL,
  `Staff_name` varchar(255) NOT NULL,
  `Staff_password` varchar(255) NOT NULL,
  PRIMARY KEY (`Staff_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------
--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `Student_id` int UNSIGNED AUTO_INCREMENT NOT NULL,
  `Student_name` varchar(255) NOT NULL,
  `Student_password` varchar(255) NOT NULL,
  PRIMARY KEY (`Student_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Quiz`
--

CREATE TABLE IF NOT EXISTS `Quiz` (
  `Quiz_id` int UNSIGNED AUTO_INCREMENT NOT NULL,
  `Quiz_name` varchar(255) NOT NULL,
  `Quiz_author` varchar(255) NOT NULL,
  `Quiz_available` varchar(255) NOT NULL,
  `Quiz_duration` varchar(255) NOT NULL,
  PRIMARY KEY (`Quiz_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
  `Quiz_id` int UNSIGNED NOT NULL,
  `Question_id` int UNSIGNED NOT NULL,
  `Questions` varchar(255) NOT NULL,
  PRIMARY KEY (`Quiz_id`,`Question_id`),
  FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz`(`Quiz_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------


--
-- Table structure for table `Answer`
--

CREATE TABLE IF NOT EXISTS `Answer` (
  `Quiz_id` int UNSIGNED NOT NULL,
  `Question_id` int UNSIGNED NOT NULL,
  `Options` varchar(10) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `Score` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Quiz_id`,`Question_id`,`Options`),
  FOREIGN KEY (`Quiz_id`,`Question_id`) REFERENCES `Question`(`Quiz_id`, `Question_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Staff_Time`
--

CREATE TABLE IF NOT EXISTS `Staff_Time` (
  `Quiz_id` int UNSIGNED NOT NULL,
  `Staff_id` int UNSIGNED NOT NULL,
  `Date` datetime NOT NULL,
  `Score` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Quiz_id`,`Staff_id`,`Date`),
  FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`),
  FOREIGN KEY (`Staff_id`) REFERENCES `Staff` (`Staff_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Student_Time`
--

CREATE TABLE IF NOT EXISTS `Student_Time` (
  `Quiz_id` int UNSIGNED NOT NULL,
  `Student_id` int UNSIGNED NOT NULL,
  `Date` datetime NOT NULL,
  `Score` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Quiz_id`,`Student_id`,`Date`),
  FOREIGN KEY (`Quiz_id`) REFERENCES `Quiz` (`Quiz_id`),
  FOREIGN KEY (`Student_id`) REFERENCES `Student` (`Student_id`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




