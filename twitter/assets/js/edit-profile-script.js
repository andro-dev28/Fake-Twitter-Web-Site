let before_username, before_email;

window.onload = function () {
    before_username = $("#username").val().trim();
    before_email = $("#email").val().trim();
};

function editProfile() {
    let username = $("#username").val().trim();
    let email = $("#email").val().trim();

    let data = {};

    if (email.length !== 0 && username.length !== 0) {
        if (before_email===email && before_username===username) {
            window.location = "profile.php"
        } else {
            if (before_username!==username) {
                data['username'] = username
            }
            if (before_email!==email) {
                data['email'] = email
            }

            $.ajax({
                type : "post",
                url : "app/auth/user-email-checker.php",
                data: data,
                success : function (response) {
                    if (response==="ok") {
                        $.ajax({
                            type: "post",
                            url: "app/auth/update-profile.php",
                            data: {
                                "username" : username,
                                "email" : email
                            },
                            success: function (response) {
                                if (response === "ok") {
                                    window.location = "profile.php"
                                } else {
                                    alert(response, "danger")
                                }
                            },
                            error: function (error) {
                                alert("request error", "danger")
                            }
                        });
                    } else {
                        alert(response, "danger")
                    }
                },
                error: function (error) {
                    alert("request error", "danger")
                }
            });
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