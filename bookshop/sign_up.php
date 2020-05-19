<?php include("includes/header.php"); ?>

<?php include("admin/includes/connection.php"); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var id;


    // alert(sessionStorage.getItem("admin_id"));

    $(document).ready(function () {

        // $(".save").prop("disable", true);


        $("#submit").click(function () {
            if ($("#name").val() == "" || $("#email").val() == "" || $("#pass").val() == "" || $("#mobile").val() == "" || $("#address").val() == "") {
                if ($("#name").val() == "") {
                    $("#ename").html('<div class="alert alert-warning">Name must be filled out</div>');
                }
                if ($("#email").val() == "") {
                    $("#eemail").html('<div class="alert alert-warning">Email must be filled out</div>');

                }
                if ($("#pass").val() == "") {
                    $("#epass").html('<div class="alert alert-warning">Password must be filled out</div>');

                }
                if ($("#mobile").val() == "") {
                    $("#emobile").html('<div class="alert alert-warning">Mobile must be filled out</div>');

                }
                if ($("#address").val() == "") {
                    $("#eaddress").html('<div class="alert alert-warning">Address must be filled out</div>');

                }
            } else {
                var name = $("#name").val();
                var email = $("#email").val();
                var pass = $("#pass").val();
                var address = $("#address").val();
                var mobile = $("#mobile").val();
                var form = new FormData();

                form.append("name", name);
                form.append("email", email);
                form.append("pass", pass);
                form.append("mobile", mobile);
                form.append("add", address);
                form.append("action", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "customer.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,

                    success: function (value) {
                        window.location.href = "index.php";

                    }
                });

                // $.post("admin.php",
                //     {
                //         name: name,
                //         email: email,
                //         password: password,
                //         action: "add",
                //
                //     },
                //     function (data) {
                //         $("#ta").html(data);
                //         $('#myForm')[0].reset();
                //     });
            }


        });

        // login   ******
        $("#submit2").click(function () {
            if ($("#pass2").val() == "" || $("#email2").val() == "") {

                if ($("#email2").val() == "") {
                    $("#eemail2").html('<div class="alert alert-warning">Email must be filled out</div>');
                }
                if ($("#pass2").val() == "") {
                    $("#epass2").html('<div class="alert alert-warning">Password must be filled out</div>');

                }

            } else {
                var email = $("#email2").val();
                var pass = $("#pass2").val();
                var form = new FormData();
                form.append("email", email);
                form.append("pass", pass);
                form.append("action", "fetch");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "customer.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,

                    success: function (value) {
                        if (value == "true") {
                            window.location.href = "index.php";


                        } else {
                            $("#ero").html(value);
                        }


                    }
                });

                // $.post("admin.php",
                //     {
                //         name: name,
                //         email: email,
                //         password: password,
                //         action: "add",
                //
                //     },
                //     function (data) {
                //         $("#ta").html(data);
                //         $('#myForm')[0].reset();
                //     });
            }


        });
        $("#name").one("keydown", function () {
            $("#ename").empty();
        });
        $("#pass").one("keydown", function () {
            $("#epass").empty();
        });
        $("#email").one("keydown", function () {
            $("#eemail").empty();
        });
        $("#mobile").one("keydown", function () {
            $("#emobile").empty();
        });
        $("#address").one("keydown", function () {
            $("#eaddress").empty();
        });
        $("#email2").one("keydown", function () {
            $("#eemail2").empty();
        });
        $("#pass2").one("keydown", function () {
            $("#epass2").empty();
        });

// Modal


//

    });
</script>
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Checkout</li>
        </ul>
    </div>
</div>
<div id="main">
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-6">
                    <form id="checkout-form" class="clearfix">
                        <div class="billing-details">

                            <div class="section-title">
                                <h3 class="title">Sign Up</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" id="name" type="text" name="first-name" placeholder="Full Name">
                                <span id="ename"></span>
                            </div>
                            <div class="form-group">
                                <input class="input" id="pass" type="password" name="last-name" placeholder="Password">
                                <span id="epass"></span>
                            </div>
                            <div class="form-group">
                                <input class="input" id="email" type="email" name="email" placeholder="Email">
                                <span id="eemail"></span>
                            </div>
                            <div class="form-group">
                                <input class="input" id="address" type="text" name="address" placeholder="Address">
                                <span id="eaddress"></span>
                            </div>
                            <div class="form-group">
                                <input class="input" id="mobile" type="number" name="address" placeholder="Mobile">
                                <span id="emobile"></span>
                            </div>
                            <input id="submit" type="button" class="primary-btn"
                                   value="Sign Up">


                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form id="checkout-form" class="clearfix">
                        <div class="billing-details">

                            <div class="section-title">
                                <h3 class="title">Sign In</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" id="email2" type="email" name="email" placeholder="Email">
                                <span id="eemail2"></span>
                            </div>
                            <div class="form-group">
                                <input class="input" id="pass2" type="password" name="last-name" placeholder="Password">
                                <span id="epass2"></span>
                            </div>
                            <div class="form-group">
                                <span id="ero"></span>
                            </div>
                            <input id="submit2" type="button" class="primary-btn"
                                   value="Sign In">


                        </div>
                    </form>
                </div>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /section -->
<?php include("includes/footer.php"); ?>
