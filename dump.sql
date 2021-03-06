-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.15 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица secbase.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица secbase.securities
CREATE TABLE IF NOT EXISTS `securities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица secbase.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Дамп структуры для таблица secbase.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '0',
  `position` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.firms
CREATE TABLE IF NOT EXISTS `firms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `firm_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_visitors_firms` (`firm_id`),
  KEY `FK_visitors_cars` (`car_id`),
  CONSTRAINT `FK_visitors_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  CONSTRAINT `FK_visitors_firms` FOREIGN KEY (`firm_id`) REFERENCES `firms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.currentdates
CREATE TABLE IF NOT EXISTS `currentdates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.dategroups
CREATE TABLE IF NOT EXISTS `dategroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currentdate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_dategroups_dates` (`currentdate_id`),
  CONSTRAINT `FK_dategroups_dates` FOREIGN KEY (`currentdate_id`) REFERENCES `currentdates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.dategroup_security
CREATE TABLE IF NOT EXISTS `dategroup_security` (
  `dategroup_id` int(11) DEFAULT '0',
  `security_id` int(11) DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `FK_dategroup_security_dategroups` (`dategroup_id`),
  KEY `FK_dategroup_security_securities` (`security_id`),
  CONSTRAINT `FK_dategroup_security_dategroups` FOREIGN KEY (`dategroup_id`) REFERENCES `dategroups` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_dategroup_security_securities` FOREIGN KEY (`security_id`) REFERENCES `securities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.



-- Дамп структуры для таблица secbase.faults
CREATE TABLE IF NOT EXISTS `faults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_time` time NOT NULL,
  `system` char(50) NOT NULL,
  `name` char(50) NOT NULL,
  `place` char(50) NOT NULL,
  `comment` text NOT NULL,
  `currentdate_id` int(11) DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.incidents
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_time` time NOT NULL,
  `description` text NOT NULL,
  `action` text NOT NULL,
  `currentdate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.incomecards
CREATE TABLE IF NOT EXISTS `incomecards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `currentdate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incomecards_cards` (`card_id`),
  KEY `FK_incomecards_currentdates` (`currentdate_id`),
  CONSTRAINT `FK_incomecards_cards` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`),
  CONSTRAINT `FK_incomecards_currentdates` FOREIGN KEY (`currentdate_id`) REFERENCES `currentdates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица secbase.employee_incomecard
CREATE TABLE IF NOT EXISTS `employee_incomecard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incomecard_id` int(11) NOT NULL DEFAULT '0',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_employee_incomecard_incomecards` (`incomecard_id`),
  KEY `FK_employee_incomecard_employees` (`employee_id`),
  CONSTRAINT `FK_employee_incomecard_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `FK_employee_incomecard_incomecards` FOREIGN KEY (`incomecard_id`) REFERENCES `incomecards` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.
-- Дамп структуры для таблица secbase.incomecars
CREATE TABLE IF NOT EXISTS `incomecars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_id` int(11) DEFAULT NULL,
  `currentdate_id` int(11) DEFAULT NULL,
  `security_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incomecar_visitors` (`visitor_id`),
  KEY `FK_incomecar_currentdates` (`currentdate_id`),
  KEY `FK_incomecar_securities` (`security_id`),
  KEY `FK_incomecar_emploees` (`employee_id`),
  CONSTRAINT `FK_incomecar_currentdates` FOREIGN KEY (`currentdate_id`) REFERENCES `currentdates` (`id`),
  CONSTRAINT `FK_incomecar_emploees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `FK_incomecar_securities` FOREIGN KEY (`security_id`) REFERENCES `securities` (`id`),
  CONSTRAINT `FK_incomecar_visitors` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Дамп структуры для таблица secbase.incomevisitors
CREATE TABLE IF NOT EXISTS `incomevisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currentdate_id` int(11) DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `visitor_id` int(11) DEFAULT NULL,
  `security_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_incomepeople_currentdates` (`currentdate_id`),
  KEY `FK_incomepeople_visitors` (`visitor_id`),
  KEY `FK_incomepeople_securities` (`security_id`),
  KEY `FK_incomepeople_emploees` (`employee_id`),
  CONSTRAINT `FK_incomepeople_currentdates` FOREIGN KEY (`currentdate_id`) REFERENCES `currentdates` (`id`),
  CONSTRAINT `FK_incomepeople_emploees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `FK_incomepeople_securities` FOREIGN KEY (`security_id`) REFERENCES `securities` (`id`),
  CONSTRAINT `FK_incomepeople_visitors` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Экспортируемые данные не выделены.

-- Экспортируемые данные не выделены.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
