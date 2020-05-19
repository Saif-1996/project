<?php session_start(); ?>
<?php include("includes/connection.php"); ?>
<?php
if (isset($_SESSION["admin_id"])) {
    header("Location:index.php");

}

?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Log in</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#email").keydown(function () {
$("#er").empty();
            });
            $("#pass").keydown(function () {
$("#er").empty();
            });
            $("#submit").click(function () {
                var pass = $("#pass").val();
                var email = $("#email").val();
                $.post("admin.php",
                    {
                        pass: pass,
                        email: email,
                        action: "login",

                    },
                    function (data) {
                        if (data == "true") {
                            window.location.href = "index.php";
                        }
                        else {
                            $("#er").html(data);
                        }
                    });

            });

//
        });
    </script>

</head>

<body class="h-100">

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="index.html"><h4>Log in</h4></a>

                            <form class="mt-5 mb-5 login-input">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="pass" type="password" class="form-control" placeholder="Password">
                                    <span id="er"></span>
                                </div>
                                <!--                                <button class="btn login-form__btn submit w-100">Sign In</button>-->
                                <input id="submit" type="button" class="btn login-form__btn submit w-100"
                                       value="Sign In">

                            </form>
                            <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html"
                                                                                     class="text-primary">Sign Up</a>
                                now</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>

<script src="js/styleSwitcher.js"></script>
</body>
</html>





