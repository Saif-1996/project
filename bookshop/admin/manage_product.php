<?php include'includes/header.php';
?>
<?php include('includes/connection.php'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var id;


    function delete_data(d) {
        var id = d;
        $.post("product.php",
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
            if ($("#name").val() == "" || $("#author").val()=="" || $("#decription").val() =="" || $("#price").val()=="" || $("#cat").val()=="" || $("#status").val()=="") {
                if ($("#name").val() == "") {
                    $("#na").html('<div class="alert alert-warning">Name must be filled out</div>');
                }
                if ($("#description").val() == "") {
                    $("#de").html('<div class="alert alert-warning">Description must be filled out</div>');
                }
                if ($("#page").val() == "") {
                    $("#pa").html('<div class="alert alert-warning">Page must be filled out</div>');
                }
                if ($("#author").val() == "") {
                    $("#uth").html('<div class="alert alert-warning">Author must be filled out</div>');
                }
                if ($("#price").val() == "") {
                    $("#na").html('<div class="alert alert-warning">Price must be filled out</div>');
                }
                if ($("#status").val() == "") {
                    $("#st").html('<div class="alert alert-warning">Status must be filled out</div>');
                }
                if ($("#cat").val() == "") {
                    $("#ca").html('<div class="alert alert-warning">Category must be filled out</div>');
                }

            } else {
                var name = $("#name").val();
                var author = $("#author").val();
                var page = $("#page").val();
                var status = $("#status").val();
                var price = parseFloat($("#price").val());
                var desc = $("#description").val();
                var cat = $("#cat").val();
                var form = new FormData();
                if ($('#image')[0].files.length != 0) {
                    var file = $('#image')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("author", author);
                form.append("page", page);
                form.append("status", status);
                form.append("price", price);
                form.append("cat", cat);
                form.append("description", desc);
                form.append("action", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "product.php",
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
        });
        $("#description").one("keydown", function () {
            $("#de").empty();
        });
        $("#page").one("keydown", function () {
            $("#pa").empty();
        });
        $("#author").one("keydown", function () {
            $("#uth").empty();
        });
        $("#price").one("keydown", function () {
            $("#pr").empty();
        });
        $("#cat").one("change", function () {
            $("#ca").empty();
        });
        $("#status").one("change", function () {
            $("#st").empty();
        });



// Modal
        $(document).on('click', '.edit', function () {
            // $(".save").disabled();
            id = $(this).val();
            var name = $("#name" + id).text();
            var author = $("#author" + id).text();
            var page = $("#page" + id).text();
            var price = $("#price" + id).text();
            var desc = $("#desc" + id).text();
            var status = $("#status" + id).text();
            var cat = $("#hide" + id).val();
            // alert(cat);
            $("#ename").val(name);
            $("#eauthor").val(author);
            $("#epage").val(page);
            $("#eprice").val(price);
            $("#estatus").val(status);
            $("#edescribtion").val(desc);
            $("#ecat").val(cat);
        });

        $("#save").click(function () {


            if ($("#ename").val() == "" || $("#epage").val() ==" " || $("#edecription").val() =="" || $("#eprice").val()=="" || $("#ecat").val()=="" || $("#estatus").val()=="") {
                if ($("#ename").val() == "") {
                    $("#ena").html('<div class="alert alert-warning">Name must be filled out</div>');
                }
                if ($("#epage").val() == "") {
                    $("#epa").html('<div class="alert alert-warning">Page must be filled out</div>');
                }
                if ($("#edescription").val() == "") {
                    $("#ede").html('<div class="alert alert-warning">Description must be filled out</div>');
                }
                if ($("#eauthor").val() == "") {
                    $("#euth").html('<div class="alert alert-warning">Author must be filled out</div>');
                }
                if ($("#eprice").val() == "") {
                    $("#epr").html('<div class="alert alert-warning">Price must be filled out</div>');
                }
                if ($("#estatus").val() == "") {
                    $("#est").html('<div class="alert alert-warning">Status must be filled out</div>');
                }
                if ($("#ecat").val() == "") {
                    $("#eca").html('<div class="alert alert-warning">Category must be filled out</div>');
                }

            } else {
                $("#ena").empty();
                $("#epr").empty();
                $("#eca").empty();
                $("#euth").empty();
                $("#epa").empty();
                $("#est").empty();
                $("#ede").empty();
                var name = $("#ename").val();
                var page = $("#epage").val();
                var author = $("#eauthor").val();
                var status = $("#estatus").val();
                var price = ($("#eprice").val());
                var desc = $("#edescription").val();
                var cat = $("#ecat").val();
                var form = new FormData();
                if ($('#eimage')[0].files.length != 0) {
                    var file = $('#eimage')[0].files[0];
                    form.append("image", file);
                }
                form.append("name", name);
                form.append("author", author);
                form.append("status", status);
                form.append("price", price);
                form.append("cat", cat);
                form.append("page", page);
                form.append("id", id);
                form.append("description", desc);
                form.append("action", "update");
                $.ajax({
                    type: "post",
                    url: "product.php",
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
        $("#eprice").one("keydown", function () {
            $("#epr").empty();
        });
        $("#estatus").one("change", function () {
            $("#est").empty();
        });
        $("#edescribtion").one("keydown", function () {
            $("#ede").empty();
        });
        $("#ecat").one("change", function () {
            $("#eca").empty();
        });
        $("#epage").one("change", function () {
            $("#epa").empty();
        });

    });
</script>
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Product</h4>
                        <div class="basic-form">
                            <form method="post" id="myForm" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Product Name</label>
                                        <input required id="name"  type="text" class="form-control"
                                               placeholder="Name">
                                        <span id="na"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Price</label>
                                        <input required id="price"  step="0.01" type="number" class="form-control"
                                               placeholder="Price">
                                        <span id="pr"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Description</label>
                                        <textarea class="form-control h-150px" rows="10" id="description"></textarea>
                                        <span id="de"></span>

                                    </div>


                                    <div class="form-group col-md-12">
                                        <label>Product Image</label>
                                        <input type="file" accept="image/*" id="image" class="form-control-file">
                                        <span id="im"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>ِAuthor</label>
                                        <input required id="author"  type="text" class="form-control"
                                               placeholder="Author Name">
                                        <span id="uth"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>ِNum Of Page</label>
                                        <input required id="page"  type="number" class="form-control"
                                               placeholder="Page">
                                        <span id="pa"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Status</label>
                                        <select class="form-control" id="status" name="val-skill">
                                            <option value="">Please select</option>
                                            <option value="none">None</option>
                                            <option value="soon">Coming Soon</option>
                                            <option value="on_sale">On Sale</option>
                                            <option value="feature">Feature</option>
                                        </select>
                                        <span id="st"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select class="form-control" id="cat" name="val-skill">
                                            <option value="">Please select</option>
                                            <?php
                                            $query = "select * from cat";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value={$row['cat_id']}>{$row['cat_name']}</option>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                                        </select>
                                        <span id=ca></span>

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
                                    <th>Price</th>
                                    <th>Author</th>
                                    <th>Page</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody id="ta">
                                <?php
                                $conn=mysqli_connect("localhost","root","","ecom");
                                if(!$conn){

                                    die("cannot conect to server");
                                }
                                $query  ="select * from product INNER JOIN cat ON product.cat_id=cat.cat_id ";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
               <td>' . $row['pro_id'] . '</td>
               <td id="name' . $row['pro_id'] . '">' . $row['pro_name'] . '</td>
               <td id="price' . $row['pro_id'] . '">' . $row['pro_price'] . '</td>
               <td id="author' . $row['pro_id'] . '">' . $row['author'] . '</td>
               <td id="page' . $row['pro_id'] . '">' . $row['page'] . '</td>
               <td id="desc' . $row['pro_id'] . '">' . $row['pro_desc'] . '</td>
               <td id="status' . $row['pro_id'] . '">' . $row['pro_status'] . '</td>
               <td  id="cat' . $row['pro_id'] . '">' . $row['cat_name'] . '</td>
               <input id="hide'.$row['pro_id'].'" type="hidden" value="'.$row['cat_id'].'">
               <td id="image' . $row['pro_id'] . '"><img src="' . $row['pro_image'] . '" width="50" height="50"></td>
               <td><button type="button" value="' . $row['pro_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['pro_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
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
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Product Name</label>
                                        <input required id="ename"  type="text" class="form-control"
                                               placeholder="Name">
                                        <span id="ena"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Price</label>
                                        <input required id="eprice" step="0.01" type="number" class="form-control"
                                               placeholder="Name">
                                        <span id="epr"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Describtion</label>
                                        <textarea class="form-control h-150px" rows="10" id="edescribtion"></textarea>
                                        <span id="ede"></span>

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Product Image</label>
                                        <input type="file" accept="image/*" id="eimage" class="form-control-file">
                                        <span id="eim"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>ِAuthor</label>
                                        <input required id="eauthor"  type="text" class="form-control"
                                               placeholder="Author Name">
                                        <span id="euth"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>ِNum Of Page</label>
                                        <input required id="epage"  type="number" class="form-control"
                                               placeholder="Page">
                                        <span id="epa"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Product Status</label>
                                        <select class="form-control" id="estatus" name="val-skill">
                                            <option value="">Please select</option>
                                            <option value="none">None</option>
                                            <option value="soon">Coming Soon</option>
                                            <option value="on_sale">On Sale</option>
                                            <option value="feature">Feature</option>
                                        </select>
                                        <span id="est"></span>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select class="form-control" id="ecat" name="val-skill">
                                            <option value="">Please select</option>
                                            <?php
                                            $query = "select * from cat";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value={$row['cat_id']}>{$row['cat_name']}</option>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                                        </select>
                                        <span id=eca></span>

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
