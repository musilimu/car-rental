<?php
require_once('../utils/imports.php');

if (isAuth()) {
    redirectTo("cars");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $user = User::getUserByEmail($_POST['username']);
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['username'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            redirectTo("cars");
        } else {
            echo "Invalid username or password";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}
