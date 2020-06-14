<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['title']) && isset($_POST['body'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];

    $pdo = DBHelper::getInstance()->getPdo();

    $statement = $pdo->prepare("INSERT INTO twits (user_id, title, body, created_at, updated_at)
        VALUES (:user_id, :title, :body, :created_at, :updated_at)");
    $res = $statement->execute([
        ":user_id" => $_COOKIE['user_id'],
        ":title" => $title,
        ":body" => $body,
        ":created_at" => date("Y-m-d H:i:s", time()),
        ":updated_at" => date("Y-m-d H:i:s", time())
    ]);

    if ($res) {
        flash_msg("Twit successfully posted", "success");

        echo "ok";
    } else {
        echo "internal server error";
    }


}