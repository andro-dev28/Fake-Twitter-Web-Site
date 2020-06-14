function login() {
    let email = $("#email").val().trim();
    let password = $("#password").val().trim();

    if (email.length !== 0 && password.length !== 0) {
        $.ajax({
            type: "post",
            url: "app/auth/login.php",
            data: {
                "email": email,
                "password": password,
            },
            success: function (response) {
                if (response === "ok") {
                    window.location = "index.php"
                } else {
                    alert(response, "danger")
                }
            },
            error: function (error) {
                alert("request error", "danger")
            }
        });
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