<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['current_password']) && isset($_POST['new_password'])) {
    $curr_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $user_id = $_COOKIE['user_id'];

    $pdo = DBHelper::getInstance()->getPdo();

    $curr_password = sha1($curr_password);
    $new_password = sha1($new_password);

    $user = $pdo->query("SELECT * FROM users WHERE id = $user_id")->fetch(PDO::FETCH_ASSOC);
    if ($user['password'] == $curr_password) {
        $res = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id ");
        $res = $res->execute([
            ":password" => $new_password,
            ":id" => $user_id
        ]);

        if ($res) {
            echo "ok";
        } else {
            echo "internal server error";
        }
    } else {
        echo "password is wrong!";
    }
}
