<?php
require_once('../utils/imports.php');

if (!isAuth()) {
    redirectTo("cars");
}

if (isset($_POST['image']) && isset($_POST['model']) && isset($_POST['category'])) {
    try {
        Car::updateCarById($_POST['id'], $_POST['image'], $_POST['category'], $_POST['model']);
        redirectTo("cars");
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}
