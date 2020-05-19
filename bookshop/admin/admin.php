<?php session_start(); ?>
<?php include("includes/connection.php"); ?>
<?php
if ($_POST["action"] == "login") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = "select * from admin where admin_email='$email' AND admin_password='$pass'";
    $result = mysqli_query($conn, $query);
    $adminSet = mysqli_fetch_assoc($result);
    if (isset($adminSet['admin_id'])) {
        $_SESSION['admin_id'] = $adminSet['admin_id'];
        echo "true";
//        header("Location:index.php");
    } else {
        echo "  <div class='form-group'>
                                        <div class='alert alert-danger' role='alert'>
                                        User is not found
                                        </div>";

    }

} else {
    if ($_POST['action'] == "add") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // echo("<pre>");
            $path = "uploads/admin";
            $image = $_FILES["image"]["name"];
            $tmp = $_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp, $path . $image);
            $query = "insert into admin (admin_fullname,admin_password,admin_email,admin_image) values ('$name','$password','$email','$path$image')";
            mysqli_query($conn, $query);
            unset($_POST);
        } else {
            $query = "insert into admin (admin_fullname,admin_password,admin_email) values ('$name','$password','$email')";
            mysqli_query($conn, $query);
            unset($_POST);
        }
    } elseif ($_POST['action'] == "update") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from admin where admin_id=$id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
           unlink($row["admin_image"]);
            $path = "uploads/admin";
            $image = $_FILES["image"]["name"];
            $tmp = $_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp, $path . $image);
            $query = "update  admin set admin_email ='$email',
	admin_password='$password',
	admin_fullname='$name',
	admin_image='$path$image'
	where admin_id = $id";
            mysqli_query($conn, $query);
            unset($_POST);}
        else{
            $query = "update  admin set admin_email ='$email',
	admin_password='$password',
	admin_fullname='$name'
	where admin_id = $id";
            mysqli_query($conn, $query);
            unset($_POST);}

        } elseif ($_POST['action'] == "delete") {
            $id = $_POST['id'];
        $query = "select * from admin where admin_id=$id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row['admin_image'])){
            unlink($row['admin_image']);}
            $query = "delete from admin where admin_id=$id";
            mysqli_query($conn, $query);
            unset($_POST['id']);
            unset($_POST);
        }
        $query = "select * from admin";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
               <td>' . $row['admin_id'] . '</td>
               <td id="name' . $row['admin_id'] . '"><img src="'.$row['admin_image'].'" width="50" height="50" class=" rounded-circle mr-3" alt="">' . $row['admin_fullname'] . '</td>
               <td id="email' . $row['admin_id'] . '">' . $row['admin_email'] . '</td>
               <td><button type="button" value="' . $row['admin_id'] . '" id="edit" class="edit btn mb-1 btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Edit</button></td>
               <td><button  onclick="delete_data(' . $row['admin_id'] . ')" type="button" class="delete btn mb-1 btn-danger">Delete</button></td>
                                         </tr>';
        }

    }
    ?>