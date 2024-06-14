<?php
require_once('../utils/imports.php');

if (!isAuth()) {
    redirectTo("new_car");
}

if (isset($_POST['image']) && isset($_POST['model']) && isset($_POST['category'])) {
    try {
        new Car($_POST['model'], $_POST['category'], $_POST['image']);
        redirectTo("cars");
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}
