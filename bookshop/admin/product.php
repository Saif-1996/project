<?php include("includes/connection.php"); ?>
<?php
//echo "<pre>";
//print_r($_FILES["image"]);
//print_r($_POST);
//die();
if ($_POST['action'] == "add") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $page = $_POST['page'];
    $desc = $_POST['description'];
    $status = $_POST['status'];
    $cat = $_POST['cat'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // echo("<pre>");
        $path = "uploads/";
        $image = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp, $path . $image);
        $query = "insert into product (pro_name,pro_image,pro_price,author,page,pro_status,pro_desc,cat_id) 
        values ('$name','$path$image',$price,'$author',$page,'$status','$desc',$cat)";
        mysqli_query($conn, $query);
        unset($_POST);
        unset($_FILES);

    } else {
        $query = "insert into product (pro_name,pro_price,author,page,pro_status,pro_desc,cat_id) 
values ('$name',$price,'$author',$page,'$status','$desc',$cat)";
        mysqli_query($conn, $query);
        unset($_POST);
    }
} //update


elseif ($_POST['action'] == "update") {

    $name = $_POST['name'];
    $page = $_POST['page'];
    $author = $_POST['author'];
    $price = sprintf("%.2f", $_POST['price']);
    $desc = $_POST['description'];
    $status = $_POST['status'];
    $cat = $_POST['cat'];
    $query = "select pro_image from product where pro_id={$_POST['id']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        unlink($row['pro_image']);

        // echo("<pre>");
        $path = "uploads/";
        $image = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp, $path . $image);
        $query = "update product set pro_name='$name',
        pro_image='$path$image' ,
        pro_desc='$desc' ,
        author='$author' ,
        page=$page ,
        pro_price='$price' ,
        cat_id='$cat' ,
        pro_status='$status'
        where pro_id={$_POST['id']}";
        mysqli_query($conn, $query);
        unset($_POST);
        unset($_FILES);

    } else {
        $name = $_POST['name'];
        $query = "update product set pro_name='$name',
        pro_desc='$desc' ,
        author='$author' ,
        page=$page ,
        pro_price='$price' ,
        cat_id='$cat' ,
        pro_status='$status'
        where pro_id={$_POST['id']}";
        mysqli_query($conn, $query);
        unset($_POST);
    }
} //delete


elseif ($_POST['action'] == "delete") {
    $id = $_POST['id'];
    $query = "select * from product where pro_id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (!empty($row['pro_image'])) {
        unlink($row['pro_image']);
    }
    $query = "delete from product where pro_id=$id";
    mysqli_query($conn, $query);
    unset($_POST['id']);
    unset($_POST['action']);
    unset($_FILES);

}
$query = "select *,cat.cat_name from product INNER JOIN cat ON product.cat_id=cat.cat_id ";
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
               <td id="cat' . $row['pro_id'] . '">' . $row['cat_name'] . '</td>
               <input id="hide' . $row['pro_id'] . '" type="hidden" value="' . $row['cat_id'] . '">
               <td id="image' . $row['pro_id'] . '"><img src="' . $row['pro_image'] . '" width="50" height="50"></td>
               <td><button type="button" value="' . $row['pro_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['pro_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
                                         </tr>';
}
?>