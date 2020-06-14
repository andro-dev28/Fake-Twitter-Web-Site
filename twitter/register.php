<?php
include "vendor/autoload.php";

if (isset($_COOKIE['logged-in'])) {
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
    <title>Register</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/register-script.js"></script>
</head>
<body>
<?php create_header(3) ?>

<div class="container">
    <br><br><br>
    <h1 class="text-center card-title">Register twitter account</h1>
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
                       class="form-control" placeholder="Enter a username">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">Email</div>
                </div>
                <input required id="email" type="email"
                       class="form-control" placeholder="Enter valid email address">
            </div>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-primary text-white">Password</div>
                </div>
                <input required id="password" type="password"
                       class="form-control" placeholder="Enter your account password">
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-6 col-lg-4">
                    <button type="button" onclick="register()" class="btn btn-primary btn-block">Register</button>
                </div>
            </div>
            <br><br>
        </div>
    </div>

</div>

</body>
</html>