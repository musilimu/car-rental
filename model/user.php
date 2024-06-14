<?php
class User
{
    function __construct($name, $email, $password)
    {
        global $pdo;
        $stm = $pdo->prepare("INSERT INTO `users` (`name`,`email`,`password`) VALUES (?, ?, ?)");
        $stm->bindValue(2, $email);
        $stm->bindValue(3, password_hash($password, PASSWORD_BCRYPT));
        $stm->bindValue(1, $name);
        $stm->execute();
    }

    public static function getUserByEmail($email)
    {
        global $pdo;
        $stm = $pdo->prepare("SELECT * FROM users WHERE email = :username");
        $stm->bindValue(":username", $email);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function updateUserPasswordById($id, $password)
    {

        global $pdo;
        try {
            $stm = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stm->bindValue(":password", password_hash($password, PASSWORD_BCRYPT));
            $stm->bindValue(":id", (int) $id, PDO::PARAM_INT);
            $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }
}
