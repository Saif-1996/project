<?php   include ('../includes/Database.php') ;?>
<?php
$NewUser=new user();
if(isset($_POST['Add'])){
	$id  =  $_POST['id'];
	$name   =  $_POST['name'];
	$type   =  $_POST['type'];
	$pass   =  $_POST['pass'];
$NewUser->Insert($name,$pass,(int)$id,(int)$type);
$email = "";
$name  = "";
$pass  = ""; 
unset($_POST['Add']);

}
if($NewUser->Select()!=0){
$data=$NewUser->Select();
$ty="";
while($row[]=$data){
    if($row["type"]==0){
        $ty="بدون صلاحية";
    }else{
        $ty="كامل صلاحية";

    
    }
 echo '<tr>
<td>'.$row["name"].'</td>
<td>'.$row["userid"].'</td>
<td>'.$row["password"].'</td>
<td class="text-right">'.$ty.'</td>
<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodal">تعديل</button></td>
 <td><button type="button" class="btn btn-danger" >حذف</button></td>
</tr>';
}
}



?>