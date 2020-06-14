<?php
include "vendor/autoload.php";

if (!isset($_COOKIE['logged-in'])) {
    header("Location: login.php");
}

use App\database\DBHelper;

$pdo = DBHelper::getInstance()->getPdo();

$user_id = $_COOKIE['user_id'];

$twits = $pdo->query("SELECT * FROM twits WHERE user_id = $user_id")->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>
<?php create_header(2) ?>

<div class="container mt-5">
    <div class="row border border-primary rounded justify-content-center p-2 m-1">
        <div class="col-md-8 col-lg-9 col-10">
            <h5>username : <?= $_COOKIE['username'] ?></h5>
            <h5>email : <?= $_COOKIE['email'] ?></h5>
        </div>
        <div class="col-md-4 col-lg-3 col-10 mt-sm-3 mt-md-0">
            <a href="edit-profile.php" class="btn btn-primary btn-block text-white">Edit Profile</a>
            <a href="change_password.php" class="btn btn-primary btn-block text-white">Change Password</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h2>Your twits</h2>
            <div class="card-columns">
                <?php foreach ($twits as $twit) { ?>
                    <div class="card border-secondary p-2 bg-light text-dark">
                        <h3 class="card-title m1 text-primary"><a
                                href="twit.php?id=<?= $twit['id'] ?>"><?= $twit['title'] ?></a></h3>

                        <p class="card-text m-2"><?= substr($twit['body'], 0, 200) ?>...</p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


</div>

</body>
</html>
