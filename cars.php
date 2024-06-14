<?php
require_once("utils/imports.php");
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
if (!isAuth()) {
    redirectTo("login");
}

?>
<div id="app" class="my-4">


    <h1 class="my-4">Cars</h1>
    <div class="row">
        <?php
        try {
            $cars = Car::getAllCars($offset, $limit);
            foreach ($cars as $car) {
        ?>
                <div class="col-sm">

                    <div class="card mt-3" style="min-width: 20rem">
                        <img class="card-img-top" src="<?= $car['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $car['category'] ?></h5>
                            <p class="card-text"><?= $car['model'] ?></p>
                            <a href="#" class="btn btn-primary">Rent now</a>

                            <?php
                            if ($_SESSION['role'] == 'ADMIN') {
                            ?>

                                <a href="/www/update_car.php?id=<?= $car['id'] ?>" class="btn btn-info">Update</a>
                                <form class="d-inline" hx-post="/www/controllers/delete_car.php" hx-target="body" hx-swap="outerHTML">
                                    <input type="hidden" name="delete_car_id" value="<?= $car['id'] ?>">
                                    <button class="btn btn-warning">delete</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        ?>
    </div>

</div>
<nav aria-label="cars navigation mt-4">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="/www/cars.php?offset=<?= $offset - 2 ?>&limt=<?= $limit ?>">Previous</a></li>
        <li class="page-item"><a class="page-link" href="/www/cars.php?offset=<?= $offset + 2 ?>&limt=<?= $limit ?>">Next</a></li>
    </ul>
</nav>

<?php
footer();
