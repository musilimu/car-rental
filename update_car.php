<?php
require_once("utils/imports.php");
if (!isAuth()) {
    redirectTo("login");
};
if (isset($_GET["id"])) {
    $car = Car::getCarById($_GET["id"]);
}
?>
<form class="d-grid gap-4" hx-post="/www/controllers/update_car.php" hx-target="body" hx-swap="outerHTML">
    <img src="<?= $car['image'] ?>" alt="">
    <div class="form-group">
        <label for="formGroupExampleInput">Enter model</label>
        <input type="text" class="form-control" name="model" value="<?= $car['model'] ?>" placeholder="Example input">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Enter category</label>
        <input type="text" class="form-control" name="category" value="<?= $car['category'] ?>" placeholder="Another input">
    </div>
    <textarea name="image" style="display:none"><?= $car['image'] ?></textarea>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
    <div class="form-group">
        <label for="formGroupExampleInput2">Add image</label>
        <input type="file" id="image">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">update this car</button>
    </div>

</form>
<script>
    let image = document.querySelector("#image")
    image.onchange = (e) => {
        console.log(e.target.files);
        const fileReader = new FileReader()
        fileReader.readAsDataURL(e.target.files[0])
        fileReader.onload = (ev) => {
            document.querySelector("textarea").value = ev.target.result
            document.querySelector("img").src = ev.target.result
        }
    }
</script>
<?php
footer();
