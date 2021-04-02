<?php session_start(); ?>
<?php   include ('../class/admin.php') ;?>
<?php
$user=new user();
if ($_POST["login"]) {
    $userid = $_POST['userid'];
    $pass = $_POST['pass'];
  
    $adminSet = $user->login($pass,$userid);
    if (isset($adminSet['id'])) {
        $_SESSION['id'] = $adminSet['id'];
        echo "true";
   
    } else {
        echo "  <div class='form-group'>
                                        <div style='text-align: right;'' class='alert alert-danger' role='alert'>
                                       المستخدم غير موجود
                                        </div>";
    }
}