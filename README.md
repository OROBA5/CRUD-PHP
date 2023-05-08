# CRUD-PHP
 
Dastabase name : juniordev.liga.lomakina


CREATE TABLE `book` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` int(11) NOT NULL,
 `weight` decimal(10,2) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `product_id` (`product_id`),
 CONSTRAINT `book_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `dvd` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` int(11) NOT NULL,
 `size` decimal(10,2) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `product_id` (`product_id`),
 CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `furniture` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `product_id` int(11) NOT NULL,
 `height` decimal(10,2) DEFAULT NULL,
 `width` decimal(10,2) DEFAULT NULL,
 `length` decimal(10,2) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `product_id` (`product_id`),
 CONSTRAINT `furniture_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `product` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `sku` varchar(255) NOT NULL,
 `name` varchar(255) NOT NULL,
 `price` decimal(10,2) NOT NULL,
 `product_type_id` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `product_type_id` (`product_type_id`),
 CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `product_type` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci