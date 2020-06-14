<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = DBHelper::getInstance()->getPdo();

    $password = sha1($password);

    $user = $pdo->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")
        ->fetch(PDO::FETCH_ASSOC);

    if (!empty($user)) {
        $user_id = $user['id'];
        $username = $user['username'];
        $email = $user['email'];

        setcookie("logged-in", true, time()*100, "/");
        setcookie("user_id", $user_id, time()*100, "/");
        setcookie("username", $username, time()*100, "/");
        setcookie("email", $email, time()*100, "/");

        echo "ok";
    } else {
        echo "email or password wrong";
    }

}