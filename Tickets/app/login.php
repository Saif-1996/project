<?php session_start(); ?>
<?php   include ('../class/user.php') ;?>
<?php
$user=new user();
if ($_POST["login"]) {
    $userid = $_POST['userid'];
    $pass = $_POST['pass'];
  
    $adminSet = $user->login($pass,$userid);
    if (isset($adminSet['id'])) {
        $_SESSION['Emp_id'] = $adminSet['id'];
        echo true;
        // echo $_SESSION["user_id"];
   
    } else {
        echo "  <div class='form-group'>
                                        <div style='text-align: right;'' class='alert alert-danger' role='alert'>
                                       المستخدم غير موجود
                                        </div>";
        echo $_SESSION["user_id"];

    }
}