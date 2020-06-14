<?php
if (isset($_SESSION['flash_msg'])) { ?>
    <div class="alert alert-<?=$_SESSION['flash_msg_level']?> alert-dismissible">
    <button type = "button" class="close" data-dismiss = "alert">x</button>
    <?=$_SESSION['flash_msg']?>
    </div>
    <?php
    unset($_SESSION['flash_msg']);
    unset($_SESSION['flash_msg_level']);
}