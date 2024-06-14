<?php
require_once('../utils/imports.php');

if (!isAuth()) {
    redirectTo("cars");
}

if (isset($_POST['delete_car_id'])) {
    try {
        Car::deleteCar($_POST['delete_car_id']);
        redirectTo("cars");
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}
