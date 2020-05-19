<?php include('includes/header.php'); ?>
<?php include('includes/connection.php'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var id;

    function delete_data(d) {
        var id = d;
        $.post("category.php",
            {
                id: id,
                action: "delete",

            },
            function (data) {
                $("#ta").html(data);

            });
    }

    $(document).ready(function () {
        // $(".save").prop("disable", true);


        $("#submit").click(function () {
            if ($("#name").val() == "") {

                $("#na").html('<div class="alert alert-warning">Name must be filled out</div>');

            } else {
                var name = $("#name").val();
                var form = new FormData();
                if ($('#image')[0].files.length != 0) {
                    var file = $('#image')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("action", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "category.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        $("#ta").html(value);
                        $('#myForm')[0].reset();
                    }
                });
            }


        });
        $("#name").one("keydown", function () {
            $("#na").empty();
            $("#im").empty();
        });


// Modal
        $(document).on('click', '.edit', function () {
            // $(".save").disabled();
            id = $(this).val();
            var name = $("#name" + id).text();
            $("#ename").val(name);
        });

        $("#save").click(function () {


            if ($("#ename").val() == "") {

                $("#ena").html('<div class="alert alert-warning">Name must be filled out</div>');
            } else {
                $("#ena").empty();
                var form = new FormData();
                var name = $("#ename").val();
                if ($('#eimage')[0].files.length != 0) {
                    var file = $('#eimage')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("id", id);
                form.append("action", "update");
                $.ajax({
                    type: "post",
                    url: "category.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        $("#ta").html(value);
                        $('.modal').modal('hide');
                        $("#ename").val("");


                    }
                });
            }


        });

//

        // modal
        $("#ename").one("keydown", function () {
            $("#ena").empty();
        });

    });
</script>
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Category</h4>
                        <div class="basic-form">
                            <form method="post" id="myForm" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Category Name</label>
                                        <input required id="name" name="name" type="text" class="form-control"
                                               placeholder="Name">
                                        <span id="na"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Image</label>
                                        <input type="file" accept="image/*" id="image" class="form-control-file">
                                        <span id="im"></span>

                                    </div>

                                </div>


                                <input id="submit" type="button" class="btn btn-dark" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="ta">
                                <?php
                                $query = "select * from cat";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
               <td>' . $row['cat_id'] . '</td>
               <td id="name' . $row['cat_id'] . '">' . $row['cat_name'] . '</td>
               <td id="image' . $row['cat_id'] . '"><img src="' . $row['cat_image'] . '" width="50" height="50"></td>
               <td><button type="button" value="' . $row['cat_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['cat_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
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
                                <h5 class="modal-title">Category Edit</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <label>Category Name</label>
                                    <input id="ename" name="name" type="text" class="form-control"
                                           placeholder="Name">
                                    <span id="ena"></span>

                                </div>
                                <div class="form-group col-md-12">
                                    <label>Category Image</label>
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
