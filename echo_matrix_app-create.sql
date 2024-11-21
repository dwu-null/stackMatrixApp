DROP DATABASE echo_matrix_app;
-- Database: `echo_matrix_app` and php web application user
CREATE DATABASE echo_matrix_app;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON echo_matrix_app.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE echo_matrix_app;

--
-- Table structure for table `USERS`
--
CREATE TABLE IF NOT EXISTS `USERS` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter` boolean NOT NULL DEFAULT FALSE,
  `sign_up_time` DATETIME NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Table structure for table `THREADS`
--
CREATE TABLE IF NOT EXISTS `THREADS` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_time` DATETIME NOT NULL,
  `name` varchar(100) NULL,
  `category` varchar(255) NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `THREADS`
--
INSERT INTO `THREADS` (`thread_id`, `post_time`, `message`) VALUES
(1, '2020-02-25', 'Anyone else feel like Mondays are harder after a long weekend, or is it just me?'),
(2, '2023-03-28', 'What’s your go-to comfort food when life gets tough?'),
(3, '2021-06-23', 'Do you think it’s possible to truly disconnect from social media in today’s world?');

--
-- Table structure for table `COMMENTS`
--
CREATE TABLE IF NOT EXISTS `COMMENTS` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_time` DATETIME NOT NULL,
  `message` varchar(255) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  CONSTRAINT fk_c_t_id FOREIGN KEY (thread_id) REFERENCES THREADS(thread_id)
            ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `COMMENTS`
--
INSERT INTO `COMMENTS` VALUES
(1, '2020-03-25', 'Reply to thread-1', 1),
(2, '2023-04-25', 'Reply to thread-1', 1),
(3, '2022-02-25', 'Reply to thread-3', 3);
