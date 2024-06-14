<?php
require_once('../utils/imports.php');

if (!isAuth()) {
    redirectTo("cars");
}

if (isset($_POST['lpassword']) && isset($_POST['password'])) {
    try {
        $user = User::getUserByEmail($_SESSION['username']);
        print_r($user);
        if (password_verify($_POST['lpassword'], $user['password'])) {
            User::updateUserPasswordById($user['id'], $_POST['password']);
            logout();
        } else {
            echo "password not match";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}
