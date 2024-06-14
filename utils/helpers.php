<?php

function redirectTo($path)
{
    header("Location: /www/$path.php");
    die();
}

function isAuth()
{
    return isset($_SESSION['username']);
}

function logout()
{
    session_destroy();
    session_unset();
    redirectTo("login");
    die();
}
