<?php
include "vendor/autoload.php";

if (!isset($_COOKIE['logged-in'])) {
    header("Location: login.php");
}

use App\database\DBHelper;

$pdo = DBHelper::getInstance()->getPdo();

$user_id = $_COOKIE['user_id'];
$user = $pdo->query("SELECT * FROM users WHERE id = $user_id")->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/edit-profile-script.js"></script>

</head>
<body>
<?php create_header(0) ?>

<div class="container">
    <br><br><br>
    <h1 class="text-center card-title">Edit your profile</h1>
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-7 col-11 card">
            <br><br>

            <div id="flash_msg_content">
                <?php include "app/utils/flash_msg.php";?>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">Username</div>
                </div>
                <input required id="username" type="text"
                       class="form-control" placeholder="Enter valid email address" value="<?=$user['username']?>">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">Email</div>
                </div>
                <input required id="email" type="email"
                       class="form-control" placeholder="Enter your account password" value="<?=$user['email']?>">
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-6 col-lg-4">
                    <button type="button" onclick="editProfile()" class="btn btn-primary btn-block">Edit</button>
                </div>
            </div>
            <br><br>
        </div>
    </div>

</div>

</body>
</html>
