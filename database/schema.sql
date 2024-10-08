CREATE TABLE `client` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `manager` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(15) NOT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `hall` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `rent` int NOT NULL,
  `size` varchar(50) NOT NULL,
  `manager_id` int NOT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (manager_id) REFERENCES manager(id) ON DELETE CASCADE
);

CREATE TABLE `booking` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `client_id` int NOT NULL,
  `hall_id` int NOT NULL,
  `slot` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE,
  FOREIGN KEY (hall_id) REFERENCES hall(id) ON DELETE CASCADE
);

INSERT INTO
  `users` (`username`, `password`, `type`)
VALUES
  (
    'admin',
    '$2y$10$V83zRKf1NHotDGEDvsYXqebh8pJwyOuDW9fqBA.22TvJ71P6hImeu',
    'admin'
  );