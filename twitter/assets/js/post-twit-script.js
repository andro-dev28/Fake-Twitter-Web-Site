function postTwit() {
    let title = $("#title").val().trim();
    let body = $("#body").val().trim();

    if (title.length !== 0 && body.length !== 0) {
        $.ajax({
            type : "post",
            url : "app/twit/post.php",
            data : {
                "title" : title,
                "body" : body,
            },
            success : function (response) {
                if (response === "ok") {
                    window.location = "post-twit.php"
                } else {
                    alert(response, "danger")
                }
            },
            error : function (error) {

            }
        })
    } else {
        alert("fields are empty! please fill out form", "danger")
    }
}

function alert(msg, level = 'info') {
    $("#flash_msg_content").html(
        "<div class=\"alert alert-" + level + " alert-dismissible\">\n" +
        "    <button type = \"button\" class=\"close\" data-dismiss = \"alert\">x</button>\n" +
        "    " + msg + "\n" +
        "    </div>"
    );
    $(".alert-dismissible").delay(4000).slideUp(300);
}