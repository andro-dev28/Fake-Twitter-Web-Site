<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = DBHelper::getInstance()->getPdo();

    $res = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $password = sha1($password);

    $res->bindParam(":username", $username);
    $res->bindParam(":email", $email);
    $res->bindParam(":password", $password);

    if ($res->execute()) {
        $user = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")
            ->fetch(PDO::FETCH_ASSOC);
        setcookie("logged-in", true, time()*100, "/");
        setcookie("user_id", $user['id'], time()*100, "/");
        setcookie("username", $username, time()*100, "/");
        setcookie("email", $email, time()*100, "/");

        echo "ok";
    } else {
        echo "internal server error";
    }
}
