function changePassword() {
    let curr_password = $("#current_password").val().trim();
    let new_password = $("#new_password").val().trim();

    if (curr_password.length > 0 && new_password.length > 0) {
        if (new_password.length >= 8) {
            $.ajax({
                url: "app/auth/change-password.php",
                type: "post",
                data: {
                    "current_password": curr_password,
                    "new_password": new_password
                },
                success: function (response) {
                    if (response === "ok") {
                        window.location = "profile.php"
                    } else {
                        alert(response, "danger")
                    }
                },
                error: function () {
                    alert("request error", "danger")
                }
            })
        } else {
            alert("password small than 8 characters", "danger")
        }
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