<?php
require_once("utils/imports.php");
if (!isAuth()) {
    redirectTo("login");
};
?>
<form hx-post="/www/controllers/update_password.php" hx-target="body" hx-swap="outerHTML" class="d-grid gap-4">
    <div class="form-group">

        <label for="lpassword">
            Previous password
        </label>
        <input class="form-control" type="text" name="lpassword">
    </div>

    <div class="form-group">

        <label for="password">
            New Password
        </label>

        <input class="form-control" type="password" name="password">
    </div>
    <input type="submit" class="btn btn-primary" value="Update password">
</form>
<?php

footer();
