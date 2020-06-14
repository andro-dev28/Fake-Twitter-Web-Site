<?php
include "vendor/autoload.php";

if (!isset($_COOKIE['logged-in'])) {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Twit</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/post-twit-script.js"></script>

</head>
<body>
<?php create_header(3); ?>

<div class="container">
    <br><br><br>
    <h1 class="text-center card-title">Post new Twit</h1>
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-8 col-11 card">
            <br><br>

            <div id="flash_msg_content">
                <?php include "app/utils/flash_msg.php";?>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">Title</div>
                </div>
                <input required id="title" type="text" class="form-control" placeholder="Enter twit title...">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">body</div>
                </div>
                <textarea required id="body" type="text" class="form-control" placeholder="Enter twit body..."></textarea>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-6 col-lg-4">
                    <button type="button" onclick="postTwit()" class="btn btn-primary btn-block">Post</button>
                </div>
            </div>
            <br><br>
        </div>
    </div>

</div>
</body>
</html>
