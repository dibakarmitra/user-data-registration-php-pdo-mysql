# dibakarmitra-user-data-registration-php-pdo-mysql

dibakarmitra/user-data-registration-php-pdo-mysql

change database details in config.php

create a database and create the users table.

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `details` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`email`)
)

feel free to edit in your way.


