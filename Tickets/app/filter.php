<?php include_once("../class/admin.php");
if(isset($_POST["type"])){

 
    $admin=new admin(); 
    $data;
    if($_POST["type"]!=0){
          if($admin->GetType($_POST["type"])!=0){

$data=$admin->GetType($_POST["type"]);
read($data);

}
  }else{
    if($admin->GetAll()!=0){
              
       
      $data=$admin->GetAll();
      }
read($data);
    

  }
  


}




if (isset($_POST["delete"])) {
    $admin=new admin();
    $admin->RemoveCase($_POST["id"]);
    
 
    if ($admin->GetAll()!=0) {
        $data=$admin->GetAll();
        read($data);
        unset($_POST['delete']);
    }


   
}

function read($data){
    if($data !=0){

  $ty="";

    foreach ($data as $row) {
        if ($row["type"]==1) {
            $ty="أخذ الجرعة ولم يتم تسجيلها";
        } elseif ($row["type"]==2) {
            $ty="مشكلة بالاصابة بالكورونا";
        } elseif ($row["type"]==3) {
            $ty="اولوية";
        } elseif ($row["type"]==4) {
            $ty="متخلف عن موعده";
        } elseif ($row["type"]==5) {
            $ty="مشكلة في نوع المطعوم";
        } elseif ($row["type"]==6) {
            $ty="حساسية";
        } elseif ($row["type"]==7) {
            $ty="منع تطعيم";
        } elseif ($row["type"]==8) {
            $ty="اخرى";
        }
        echo '<tr>
<td class="text-right">'.$row["date"].'</td>
<td class="text-right">'.$row["emp_name"].'</td>
<td class="text-right">'.$row["name"].'</td>
<td class="text-right">'.$row["national_id"].'</td>
<td class="text-right">'.$row["birth"].'</td>
<td class="text-right">'.$row["phone"].'</td>
<td class="text-right">'.$ty.'</td>
<td class="text-right">'.$ty.'</td>
<td class="text-right">'.$ty.'</td>

<td><button type="button" class="btn btn-secondary" onclick="show(' . $row['case_id'] . ')"data-toggle="modal" data-target="#scrollmodal2">تفاصيل</button></td>
<td class="text-right"><button type="button" onclick="delete_data(' . $row['case_id'] . ')" class="btn btn-primary" >انجاز</button></td>

</tr>';
    }

    }
  
}



