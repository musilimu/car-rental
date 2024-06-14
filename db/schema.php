<?php
// import instance
require_once('../utils/imports.php');
// create table users if not exists
$pdo->exec('CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,   
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role` varchar(255) NOT NULL DEFAULT "CUSTOMER",
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');
// create table cars if not exists
$pdo->exec('CREATE TABLE IF NOT EXISTS `cars` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `model` varchar(255) NOT NULL,   
    `category` varchar(255) NOT NULL,
    `image` TEXT NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');

// create table rents if not exists
$pdo->exec('CREATE TABLE IF NOT EXISTS `rents` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `car_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;');
// disconnect
$pdo = null;
