-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Server version: 5.5.24
-- PHP Version: 5.4.4-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(4) NOT NULL AUTO_INCREMENT,
  `uri` varchar(60) NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `dateCreated` datetime NOT NULL,
  `tags` varchar(30) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='holds blog articles' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
-- Enjoy the bacon
--

INSERT INTO `articles` (`article_id`, `uri`, `title`, `content`, `dateCreated`, `tags`) VALUES
(1, 'about-me', 'About me', '<p>Bacon ipsum dolor sit amet ham hock andouille ground round pork chuck chicken sirloin biltong short ribs beef spare ribs meatball pork belly frankfurter. Frankfurter hamburger jowl filet mignon tongue, rump tri-tip pork loin shankle ball tip ham hock pork chop kielbasa andouille pig. Frankfurter tenderloin pork chop flank turducken capicola short ribs shank drumstick hamburger strip steak leberkas filet mignon kielbasa ribeye. Filet mignon strip steak capicola shankle, pork loin leberkas short ribs bacon biltong salami t-bone pig kielbasa drumstick.</p>', '2012-10-21 18:11:05', 'about'),
(2, 'example-blog-post', 'Example blog post', '<p>Spare ribs kielbasa ham hock corned beef, sirloin pastrami turkey frankfurter. Boudin beef ribs turkey ribeye chuck jerky tenderloin t-bone hamburger spare ribs meatloaf doner tail prosciutto sirloin. Bresaola pastrami turkey drumstick chicken jerky meatloaf venison tongue hamburger shank sausage beef ribs ham hock spare ribs. Ball tip andouille pancetta hamburger shoulder jowl pork belly capicola.</p>', '2012-10-22 00:16:39', 'blog'),
(3, 'example-project', 'Example project', '<p>T-bone meatball salami leberkas biltong turducken boudin prosciutto turkey meatloaf pig filet mignon spare ribs ham sausage. Salami hamburger andouille flank jerky. Biltong corned beef shank spare ribs pork belly chicken. Ribeye drumstick meatloaf flank tenderloin jerky corned beef rump boudin hamburger. Boudin ground round shankle, turkey strip steak ribeye chicken tongue. Ribeye tail salami, venison pancetta andouille jowl capicola short ribs ball tip rump chuck chicken beef bresaola.</p>\r\n        <img src="http://cdn.baconipsum.com/theme/images/bacon-ipsum-banner1.jpg" title="Diagram of the mvc pattern"/>\r\n        <a href="http://baconipsum.com/">View Source More bacon -></a>\r\n', '2012-10-21 19:22:16', 'projects');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL COMMENT 'the title of the project',
  `about` text NOT NULL COMMENT 'short paragraph about the project',
  `rimage` varchar(60) NOT NULL COMMENT 'related image',
  `github` varchar(60) NOT NULL COMMENT 'link to the source code',
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'jay', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
