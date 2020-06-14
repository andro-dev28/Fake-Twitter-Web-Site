<?php
include "../../vendor/autoload.php";

use App\database\DBHelper;

if (isset($_POST['username']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $pdo = DBHelper::getInstance()->getPdo();

    $res = $pdo->query("SELECT * FROM users WHERE username = '$username'")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($res)) {
        $res = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetchAll(PDO::FETCH_ASSOC);
        if (empty($res)) {
            echo "ok";
        } else {
            echo "email used by another user! if you have account <a href='login.php'>login</a>";
        }
    } else {
        echo "username used by another user! please enter other username";
    }
} else if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $pdo = DBHelper::getInstance()->getPdo();

    $res = $pdo->query("SELECT * FROM users WHERE username = '$username'")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($res)) {
        echo "ok";
    } else {
        echo "username used by another user! please enter other username";
    }
} else if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $pdo = DBHelper::getInstance()->getPdo();

    $res = $pdo->query("SELECT * FROM users WHERE email = '$email'")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($res)) {
        echo "ok";
    } else {
        echo "email used by another user! if you have account <a href='login.php'>login</a>";
    }
}