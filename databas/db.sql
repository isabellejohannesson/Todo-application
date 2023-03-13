-- Adminer 4.8.1 MySQL 8.0.31 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Todo`;
CREATE TABLE `Todo` (
  `TaskID` int NOT NULL AUTO_INCREMENT,
  `TaskTitle` varchar(50) DEFAULT NULL,
  `TaskDescription` varchar(255) DEFAULT NULL,
  `TaskStatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`TaskID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

