<?php
require_once("utils/imports.php");
if (isAuth()) {
    redirectTo("cars");
}
?>
<form hx-post="/www/controllers/login.php" hx-target="body" hx-swap="outerHTML" class="d-grid gap-4">
    <h1>Welcome again</h1>
    <div class="form-group">

        <label for="username">
            Username
        </label>
        <input class="form-control" class="form-control" type="text" name="username">
    </div>

    <div class="form-group">

        <label for="password">
            Password
        </label>

        <input class="form-control" type="text" name="password">
    </div>
    <input type="submit" class="btn btn-primary" value="Login">
</form>
<?php
footer();
