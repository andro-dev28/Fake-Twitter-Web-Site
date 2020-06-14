<?php
session_start();

function create_pagination_data($page_id, $count_page)
{
    $data = [
        'prev' => false,
        'next' => 'true',
        $data['page_id'] = $page_id,
        $data['page_count'] = $count_page
    ];
    if ($page_id == 1) {
        $data['prev'] = false;
        if ($page_id < $count_page) {
            $data['next'] = true;
        } else {
            $data['next'] = false;
        }
        $data['page_id'] = $page_id;
        $data['page_count'] = $count_page;
    } else if ($page_id > 1) {
        $data['prev'] = true;
        if ($page_id < $count_page) {
            $data['next'] = true;
        } else {
            $data['next'] = false;
        }
        $data['page_id'] = $page_id;
        $data['page_count'] = $count_page;
    }
    return $data;
}

function create_header($activeItem, $searchValue = '')
{
    $nav_items_guest = [
        [
            "name" => "Home",
            "href" => "index.php"
        ],
        [
            "name" => "Login",
            "href" => "login.php"
        ],
        [
            "name" => "Register",
            "href" => "register.php"
        ],
    ];

    $nav_items_user = [
        [
            "name" => "Home",
            "href" => "index.php"
        ],
        [
            "name" => "Profile",
            "href" => "profile.php"
        ],
        [
            "name" => "Post Twit",
            "href" => "post-twit.php"
        ],
        [
            "name" => "Logout",
            "href" => "app/auth/logout.php"
        ],
    ];

    $nav_items = isset($_COOKIE['logged-in']) ? $nav_items_user : $nav_items_guest;
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top sticky-top">
        <a href="index.php" class="navbar-brand">
            <h1>Twitter</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-menu4">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav-menu4" class="collapse navbar-collapse">
            <nav class="navbar-nav font-weight-bold">
                <?php for ($i = 0; $i < count($nav_items); $i++) {
                    $item = $nav_items[$i]; ?>

                    <?php if ($i+1 == $activeItem) { ?>
                        <a href="<?= $item['href'] ?>" class="nav-link active"><?= $item['name'] ?></a>
                    <?php } else { ?>
                        <a href="<?=$item['href']?>" class="nav-link"><?=$item['name']?></a>
                    <?php } ?>

                <?php } ?>
            </nav>
            <div class="form-inline ml-auto">
                <input id="searchInput" class="form-control border-white"
                       type="text" placeholder="search in twits..." value="<?=$searchValue?>">
                <button type="submit" onclick="search()" class="btn btn-primary text-white border-white ml-md-1 mt-1 mt-sm-0">Search</button>
            </div>
        </div>

    </nav>
<?php }

function flash_msg($msg, $level = 'info'){
    $_SESSION['flash_msg'] = $msg;
    $_SESSION['flash_msg_level'] = $level;
}
