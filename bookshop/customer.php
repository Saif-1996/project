<?php
session_start();
include("admin/includes/connection.php");
if (isset($_POST["action"]) && $_POST["action"] == "add") {
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $add = $_POST["address"];
    $query = "INSERT INTO customer(cust_name,cust_email,cust_password,cust_mobile,cust_address)
VALUES('$name','$email','$pass','$mobile','$add') ";
    mysqli_query($conn, $query);
unset($_POST);
    $_SESSION["cust"] = $row["cust_id"];


}
elseif (isset($_POST["action"]) && $_POST["action"]== "fetch") {
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $query = "SELECT * FROM customer WHERE cust_password='$pass' AND cust_email='$email' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (isset($row["cust_id"])) {
        $_SESSION["cust"] = $row["cust_id"];
        echo "true";

    } else {
        echo "  <div class='form-group'>
                                        <div class='alert alert-danger' role='alert'>
                                        User is not found
                                        </div>";
    }
    unset($_POST);

}
elseif (isset($_GET["logout"])){
    unset($_SESSION["cust"]);
    unset($_GET);
    header("Location:index.php");

}