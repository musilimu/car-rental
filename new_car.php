<?php
require_once("utils/imports.php");
if (!isAuth()) {
  redirectTo("login");
};
?>
<form class="d-grid gap-4" hx-post="/www/controllers/new_car.php" hx-target="body" hx-swap="outerHTML">
  <div class="form-group">
    <label for="formGroupExampleInput">Enter model</label>
    <input type="text" class="form-control" name="model" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Enter category</label>
    <input type="text" class="form-control" name="category" placeholder="Another input">
  </div>
  <textarea name="image" style="display:none"></textarea>

  <div class="form-group">
    <label for="formGroupExampleInput2">Add image</label>
    <input type="file" id="image">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add a car</button>
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
    }
  }
</script>
<?php
footer();
