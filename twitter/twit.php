<?php
include "vendor/autoload.php";

use App\database\DBHelper;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $pdo = DBHelper::getInstance()->getPdo();

    $twit = $pdo->query("SELECT * FROM twits WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    if (!empty($twit)) {
        $user = $pdo->query("SELECT * FROM users WHERE id = {$twit['user_id']}")->fetch(PDO::FETCH_ASSOC);
    }


} else {
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= empty($twit) ? "404 twit not found" : "Twit {$twit['id']}" ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>
<?php create_header(0) ?>

<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <?php if (empty($twit)) { ?>
            <h1>404 twit not found</h1>
        <?php } else { ?>
            <div class="col-md-8">
                <h1><?= $twit['title'] ?></h1>
                <p><?= $twit['body'] ?></p>
            </div>
            <div class="col-md-4">
                <h4>User details : </h4>
                <h5>username : <?= $user['username'] ?></h5>
                <h5>email : <?= $user['email'] ?></h5>
                <h4>Twit details : </h4>
                <h6>post at : <?= $twit['created_at'] ?></h6>
                <?php if ($twit['created_at'] !== $twit['updated_at']) { ?>
                    <h6>edited at : <?= $twit['updated_at'] ?></h6>
                <?php } ?>
            </div>


        <?php } ?>
    </div>

</div>
</body>
</html>
