<?php
class Car
{
    private $tableName = 'cars';
    function __construct($image, $category, $model)
    {
        global $pdo;
        $stm = $pdo->prepare("INSERT INTO `$this->tableName` (`image`,`category`,`model`) VALUES (?, ?, ?)");
        $stm->bindValue(2, $image);
        $stm->bindValue(3, $category);
        $stm->bindValue(1, $model);
        $stm->execute();
    }
    public static function updateCarById($id, $image, $category, $model)
    {
        global $pdo;
        $stm = $pdo->prepare("UPDATE `cars` SET  image = :image, category = :category, model = :model WHERE id = :id");
        $stm->bindValue(":image", $image);
        $stm->bindValue(":category", $category);
        $stm->bindValue(":model", $model);
        $stm->bindValue(":id", (int) $id, PDO::PARAM_INT);
        $stm->execute();
    }


    public static function getAllCars($skip = 0, $limit = 5)
    {
        global $pdo;
        try {
            $stm = $pdo->prepare("SELECT * FROM `cars` LIMIT :limit OFFSET :offset");
            $stm->bindValue(":limit", (int) $limit, PDO::PARAM_INT);
            $stm->bindValue(":offset", (int) $skip, PDO::PARAM_INT);
            $stm->execute();
            $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
    public static function getCarById($id)
    {
        global $pdo;
        try {
            $stm = $pdo->prepare("SELECT * FROM `cars` WHERE id = :id");
            $stm->bindValue(":id", (int) $id, PDO::PARAM_INT);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public static function deleteCar($id)
    {
        global $pdo;
        try {
            $stm = $pdo->prepare("DELETE FROM cars WHERE id = :id");
            $stm->bindValue(":id", (int) $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
