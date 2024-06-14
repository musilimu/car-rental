<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="https://tyaza.org/logo-sm.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/www/public/bootstrap.min.css">
    <script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container my-4">
        <div class="my-4">

            <?php
            session_start();

            if (isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') {
            ?>
                <a href="/www/new_car.php" class="btn btn-primary">Add a new car</a>
                <a href="/www/update_password.php" class="btn btn-info">update password</a>
            <?
            }
            if (isset($_SESSION['role'])) {
            ?>
                <button class="btn btn-warning" hx-get="/www/controllers/logout.php" hx-target="body" hx-swap="outerHTML" hx-trigger="click" hx-push-url="true">logout</button>
        </div>

    <?php
            }
