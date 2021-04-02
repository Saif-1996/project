<?php   include ('../class/admin.php') ;?>
<?php
$admin=new admin();
$op1="";
$op2="";
if(isset($_POST["edit"])){
$data=$admin->GetOne($_POST["edit"]);
if($data["per"]==0){
$op1="selected";
}else{
    $op2="selected";

}
echo'           <div class="row">
<div class="col-6">
    <div class="form-group">
    <label for="cc-payment" class="control-label mb-1">الأسم</label>
    <input id="edname" name="edname" value="'.$data["name"].'" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
</div>

</div>
<div class="col-6">
<div class="form-group has-success">
    <label for="cc-name" class="control-label mb-1"> الرقم الوطني / الشخصي</label>
    <input id="edid" name="id" value="'.$data["userid"].'" type="text" maxlength="10" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
    <span class="help-block field-validation-valid"   data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>

</div>



</div>

<div class="row">
    <div class="col-6">
        <label for="x_card_code" class="control-label mb-1">الصلاحية</label>
        <div class="input-group">
            <select name="type" id="edtype" class="form-control">
                <option '.$op1.' value="0">بدون صلاحية</option>
                <option '.$op2.' value="1">كامل الصلاحية</option>
             
            </select>
        </div>
    </div>
    <div class="col-6">
    <div class="form-group has-success">
    <label for="cc-name" class="control-label mb-1"> الرقم السري</label>
    <input id="edpass" value="'.$data["password"].'" name="edpass" type="password" maxlength="10" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>
    </div>
</div>

       ';
    unset($_POST['edit']);

}
else{
    if (isset($_POST['Add'])) {
        $id  =  $_POST['id'];
        $name   =  $_POST['name'];
        $type   =  $_POST['type'];
        $pass   =  $_POST['pass'];
        $admin->AddEmployee($name, $pass, (int)$id, (int)$type);

        $email = "";
        $name  = "";
        $pass  = "";
        unset($_POST['Add']);
    }

    if (isset($_POST['update'])) {
        $id  =  $_POST['id'];
        $userid  =  $_POST['userid'];
        $name   =  $_POST['name'];
        $type   =  $_POST['type'];
        $pass   =  $_POST['pass'];
        $admin->UpdateUser((int)$id,$name, $pass, (int)$userid, (int)$type);
        unset($_POST['update']);
    }




    if (isset($_POST["delete"])) {
        $admin->RemoveUser($_POST["id"]);
        unset($_POST['dlete']);
    }





    if ($admin->GetAllUser()!=0) {
        $data=$admin->GetAllUser();
        $ty="";

        foreach ($data as $row) {
            if ($row["per"]==0) {
                $ty="بدون صلاحية";
            } else {
                $ty="كامل صلاحية";
            }
            echo '<tr>
<td>'.$row["name"].'</td>
<td>'.$row["userid"].'</td>
<td class="text-right">'.$ty.'</td>
<td><button type="button" onclick="show(' . $row['id'] . ')"  class="btn btn-primary" data-toggle="modal" data-target="#scrollmodal2">تعديل</button></td>
<td><button type="button" onclick="delete_data(' . $row['id'] . ')" class="btn btn-danger" >حذف</button></td>
</tr>';
        }
    }
}

?>