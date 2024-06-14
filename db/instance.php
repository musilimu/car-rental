<?php

class Database
{
    private static $instance;
    private $pdo;
    private $isConnected = false;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect()
    {
        if ($this->isConnected) {
            return $this->pdo;
        }
        try {
            $user = 'root';
            $pass = '';
            $this->pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
            // create database if not exists
            $this->pdo->exec('CREATE DATABASE IF NOT EXISTS `car_rental` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
            // use car_rental
            $this->pdo->exec('USE `car_rental`;');
            $this->isConnected = true;
            return $this->pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}

$database = Database::getInstance();
$pdo = $database->connect();
