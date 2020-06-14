<?php
if (isset($_COOKIE['logged-in'])) {
    setcookie("logged-in", false, time()*-100, "/");
    setcookie("user_id", null, time()*-100, "/");
    setcookie("username", null, time()*-100, "/");
    setcookie("email", null, time()*-100, "/");

}
header("Location: ../../index.php");
