

CREATE DATABASE assignment2;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON assignment2.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE assignment2;
--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Table structure for table `posts`
--
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_content` varchar(1000) NOT NULL,
  `poster_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`poster_id`) REFERENCES `users`(`users_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `follow`
--
CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_users_id`  int(11)  NOT NULL,
  `follow_poster_id` int(11)  NOT NULL,
  PRIMARY KEY (`follow_id`),
  FOREIGN KEY (`follow_users_id`) REFERENCES `users`(`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`follow_poster_id`) REFERENCES `users`(`users_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `login`, `password`) VALUES
(1, 'Mendel', '1234'),
(2, 'Ashworth', '1234'),
(3, 'Blank', '1234');

--
-- Dumping data for table `users`
--
INSERT INTO `posts` ( `post_id`,`post_content`, `poster_id`)
VALUES
(1,'Learning SQL is fun!', 1),
(2,'I just mastered JOINS in SQL!', 1),
(3,'Understanding foreign keys made my day!', 2),
(4,'Database design is an art.', 2),
(5,'Referential integrity is key to consistency.', 2),
(6,'Optimizing queries can save time.', 2),
(7,'What is your favorite SQL trick?', 3),
(8,'Never underestimate the power of a good index.', 3);

-- Dumping data for table `users`
--
INSERT INTO `follow` (`follow_id`,`follow_users_id`, `follow_poster_id`)
VALUES
(1,1,3),
(2,2,3),
(3,3,2),
(4,2,1);
