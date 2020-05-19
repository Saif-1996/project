<?php include("includes/connection.php"); ?>
<?php
//echo "<pre>";
//print_r($_FILES["image"]);
//print_r($_POST);
//die();
if ($_POST['action'] == "add") {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // echo("<pre>");
        $path = "uploads/cat/";
        $image = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp, $path . $image);

        $name = $_POST['name'];
        $query = "insert into cat (cat_name,cat_image) values ('$name','$path$image')";
        mysqli_query($conn, $query);
        unset($_POST);
        unset($_FILES);

    } else {
        $name = $_POST['name'];
        $query = "insert into cat (cat_name) values ('$name')";
        mysqli_query($conn, $query);
        unset($_POST);
    }
} elseif ($_POST['action'] == "update") {
    $query = "select cat_image from cat where cat_id={$_POST['id']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        unlink($row['cat_image']);

        // echo("<pre>");
        $path = "uploads/cat/";
        $image = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp, $path . $image);

        $name = $_POST['name'];
        $query = "update cat set cat_name='$name',
        cat_image='$path$image' 
        where cat_id={$_POST['id']}";
        mysqli_query($conn, $query);
        unset($_POST);
        unset($_FILES);

    } else {
        $name = $_POST['name'];
        $query = "update cat set cat_name='$name'
        where cat_id={$_POST['id']}";
        mysqli_query($conn, $query);
        unset($_POST);
    }
} elseif ($_POST['action'] == "delete") {
    $id = $_POST['id'];
    $query = "select * from cat where cat_id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(!empty($ro['cat_image'])){
    unlink($row['cat_image']);}
    $query = "delete from cat where cat_id=$id";
    mysqli_query($conn, $query);
    unset($_POST['id']);
    unset($_POST['action']);
    unset($_FILES);

}
$query = "select * from cat";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
               <td>' . $row['cat_id'] . '</td>
               <td id="name' . $row['cat_id'] . '">' . $row['cat_name'] . '</td>
               <td id="email' . $row['cat_id'] . '"><img src="' . $row['cat_image'] . '" width="50" height="50"></td>
               <td><button type="button" value="' . $row['cat_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['cat_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
                                         </tr>';

}


?>