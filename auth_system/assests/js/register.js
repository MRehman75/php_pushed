$(document).ready(function () {

    $("#registerForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "ajax/register.php",
            type: "POST",
            data: $(this).serialize(),

            beforeSend: function () {

                $("#btnRegister").html("Please Wait...");

            },

            success: function (response) {

                if (response == "success") {

                    $("#msg").html('<div class="alert alert-success">Registration Successful</div>');

                    $("#registerForm")[0].reset();

                    setTimeout(function () {

                        window.location = "login.php";

                    }, 1500);

                } else {

                    $("#msg").html(response);

                }

                $("#btnRegister").html("Register");

            }

        });

    });

});