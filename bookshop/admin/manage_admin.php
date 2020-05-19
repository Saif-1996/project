<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var id;

    function delete_data(d) {
        var id = d;
        $.post("admin.php",
            {
                id: id,
                action: "delete",

            },
            function (data) {
                $("#ta").html(data);

            });
    }

    // alert(sessionStorage.getItem("admin_id"));

    $(document).ready(function () {

        // $(".save").prop("disable", true);


        $("#submit").click(function () {
            if ($("#name").val() == "" || $("#email").val() == "" || $("#password").val() == "") {
                if ($("#name").val() == "") {
                    $("#na").html('<div class="alert alert-warning">Name must be filled out</div>');
                }
                if ($("#email").val() == "") {
                    $("#em").html('<div class="alert alert-warning">Email must be filled out</div>');

                }
                if ($("#password").val() == "") {
                    $("#pass").html('<div class="alert alert-warning">Password must be filled out</div>');

                }
            } else {
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var form = new FormData();
                if ($('#image')[0].files.length != 0) {
                    var file = $('#image')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("email", email);
                form.append("password", password);
                form.append("action", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "admin.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        $("#ta").html(value);
                        $('#myForm')[0].reset();
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
            $("#na").empty();
        });
        $("#password").one("keydown", function () {
            $("#pass").empty();
        });
        $("#email").one("keydown", function () {
            $("#em").empty();
        });

// Modal
        $(document).on('click', '.edit', function () {
            // $(".save").disabled();
            id = $(this).val();
            var name = $("#name" + id).text();
            var email = $("#email" + id).text();
            $("#ename").val(name);
            $("#eemail").val(email);
            // $("#epassword").val("");
        });

        $("#save").click(function () {


            if ($("#ename").val() == "" || $("#eemail").val() == "" || $("#epassword").val() == "") {
                if ($("#ename").val() == "") {
                    $("#ena").html('<div class="alert alert-warning">Name must be filled out</div>');
                }
                if ($("#eemail").val() == "") {
                    $("#eem").html('<div class="alert alert-warning">Email must be filled out</div>');

                }
                if ($("#epassword").val() == "") {
                    $("#epass").html('<div class="alert alert-warning">Password must be filled out</div>');

                }
            } else {
                $("#ena").empty();
                $("#eem").empty();
                $("#epass").empty();
// alert(id);
                // $(".save").prop("disable", false);
// $(".bootstrap-modal").hide();
                var name = $("#ename").val();
                var email = $("#eemail").val();
                var password = $("#epassword").val();
                var form = new FormData();
                if ($('#eimage')[0].files.length != 0) {
                    var file = $('#eimage')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("id", id);
                form.append("email", email);
                form.append("password", password);
                form.append("action", "update");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "admin.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        $("#ta").html(value);
                        $('.modal').modal('hide');
                        $("#ename").val("");
                        $("#eemail").val("");
                        $("#epassword").val("");

                    }
                });

            }


        });

//

        // modal
        $("#ename").one("keydown", function () {
            $("#ena").empty();
        });
        $("#epassword").one("keydown", function () {
            $("#epass").empty();
        });
        $("#eemail").one("keydown", function () {
            $("#eem").empty();
        });

    });
</script>
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Admin</h4>
                        <div class="basic-form">
                            <form method="post" id="myForm" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input required id="name" name="name" type="text" class="form-control"
                                               placeholder="Name">
                                        <span id="na"></span>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input required id="email" name="email" type="email" class="form-control"
                                               placeholder="Email">
                                        <span id="em"></span>

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Password</label>
                                        <input required id="password" name="password" type="password"
                                               class="form-control"
                                               placeholder="Password">
                                        <span id="pass"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Admin Image</label>
                                        <input type="file" accept="image/*" id="image" class="form-control-file">
                                        <span id="im"></span>

                                    </div>

                                </div>


                                <input id="submit" type="button" class="btn btn-dark" value="Sign up">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Admins</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="ta">
                                <?php
                                $query = "select * from admin";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
               <td>' . $row['admin_id'] . '</td>
               <td id="name' . $row['admin_id'] . '"><img src="' . $row['admin_image'] . '" width="50" height="50" class=" rounded-circle mr-3" alt="">' . $row['admin_fullname'] . '</td>
               <td id="email' . $row['admin_id'] . '">' . $row['admin_email'] . '</td>
               <td><button type="button" value="' . $row['admin_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['admin_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
                                         </tr>';
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="col-lg-12">-->
            <!--                <div class="card">-->
            <!--                    <div class="card-body">-->
            <!--                        <h4 class="card-title">Vertically centered</h4>-->
            <div class="bootstrap-modal">
                <!-- Button trigger modal -->
                <!--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Launch demo modal</button>-->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Admin Edit</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <label>Name</label>
                                    <input id="ename" name="name" type="text" class="form-control"
                                           placeholder="Name">
                                    <span id="ena"></span>

                                </div>
                                <div class="form-group col-md-12">
                                    <label>Email</label>
                                    <input id="eemail" name="email" type="email" class="form-control"
                                           placeholder="Email">
                                    <span id="eem"></span>

                                </div>

                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input id="epassword" name="password" type="password"
                                           class="form-control"
                                           placeholder="Password">
                                    <span id="epass"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Admin Image</label>
                                    <input type="file" accept="image/*" id="eimage" class="form-control-file">
                                    <span id="eim"></span>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="save" class="btn btn-primary">Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
