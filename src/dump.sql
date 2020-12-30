--
-- Database: `todolist`
--
CREATE DATABASE todolist;
-- --------------------------------------------------------

--
-- Table structure for table `users` and `tasks`
--
CREATE TABLE `todolist`.`users` ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `todolist`.`tasks` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `taskname` VARCHAR(50) NOT NULL , `description` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`taskname`)) ENGINE = InnoDB;

--
-- Dumping data for table `users`
--

--INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, 'anand', '12345');