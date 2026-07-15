$(document).ready(function () {

    $("#loginForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "ajax/login.php",

            type: "POST",

            data: $(this).serialize(),

            beforeSend: function () {

                $("#btnLogin").html("Checking...");

            },

            success: function (response) {

                if (response == "success") {

                    window.location = "dashboard.php";

                } else {

                    $("#msg").html(response);

                }

                $("#btnLogin").html("Login");

            }

        });

    });

});