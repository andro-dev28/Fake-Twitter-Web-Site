<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['username']) && isset($_POST['email'])) {
    $user_id = $_COOKIE['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $pdo = DBHelper::getInstance()->getPdo();

    $res = $pdo->prepare("UPDATE users SET username = :username , email = :email WHERE id = :id ");
    $res = $res->execute([
        ":username" => $username,
        ":email" => $email,
        ":id" => $user_id
    ]);

    if ($res) {
        setcookie("user_id", $user_id, time()*100, "/");
        setcookie("username", $username, time()*100, "/");
        setcookie("email", $email, time()*100, "/");

        echo "ok";
    } else {
        echo "internal server error";
    }
}

