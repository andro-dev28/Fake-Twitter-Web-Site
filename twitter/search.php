<?php
include "vendor/autoload.php";

use App\database\DBHelper;

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $pdo = DBHelper::getInstance()->getPdo();

    $limit = 20;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page_id = $_GET['page'];
    } else {
        $page_id = 1;
    }

    $count_twits = $pdo
        ->query("SELECT count(1) FROM twits WHERE title LIKE '%$q%' OR body LIKE '%$q%'")
        ->fetch(PDO::FETCH_ASSOC)['count(1)'];
    settype($count_twits, "int");

    $count_page = (int)($count_twits / $limit);
    if ($count_twits % $limit != 0) {
        $count_page += 1;
    }
    $page_data = create_pagination_data($page_id, $count_page);

    $twits = $pdo->query("SELECT * FROM twits WHERE title LIKE '%$q%' OR body LIKE '%$q%' LIMIT $limit OFFSET " . ($page_id * $limit - $limit))->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Search</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

    <script src="assets/js/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>
<?php create_header(0, $q) ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 row justify-content-center">
            <?php if (!empty($twits)) { ?>
                <h1 class="col-12">Search result by title '<?= $q ?>'</h1>

                <div class="col-12">
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

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php if ($page_data['prev'] === true) {  ?>
                            <li class="page-item"><a class="page-link"
                                                     href="search.php?q=<?=$q?>&page=<?= $page_data['page_id'] - 1  ?>">Previous</a>
                            </li>
                        <?php } else {  ?>
                            <li class="page-item disabled"><a class="page-link"
                                                              href="search.php?q=<?=$q?>&page=<?= $page_data['page_id'] - 1  ?>">Previous</a>
                            </li>
                        <?php }  ?>
                        <?php for ($i = 1; $i <= $page_data['page_count']; $i++) {  ?>
                            <li class="page-item <?= $page_data['page_id'] == $i ? " active
                            " : ""  ?>">
                                <a class="page-link" href="search.php?q=<?=$q?>&page=<?= $i  ?>"><?= $i  ?></a>
                            </li>
                        <?php }  ?>
                        <?php if ($page_data['next'] === true) {  ?>
                            <li class="page-item"><a class="page-link"
                                                     href="search.php?q=<?=$q?>&page=<?= $page_data['page_id'] + 1  ?>">Next</a>
                            </li>
                        <?php } else {  ?>
                            <li class="page-item disabled"><a class="page-link"
                                                              href="search.php?q=<?=$q?>&page=<?= $page_data['page_id'] + 1  ?>">Next</a>
                            </li>
                        <?php }  ?>
                    </ul>
                </nav>
            <?php } else { ?>
                <h1>404 twit by this title not found</h1>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>