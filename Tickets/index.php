<?php   include ('includes/header.php') ;?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div dir="rtl" class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive floating table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>اسم المستخدم</th>
                                            <th>الاسم</th>
                                            <th class="text-right">الرقم الوطني</th>
                                            <th class="text-right">تاريخ الميلاد</th>
                                            <th class="text-right">رقم الهاتف</th>
                                            <th class="text-right">نوع الشكوة</th>
                                            <th class="text-right">تحتاج متابعة</th>
                                            <th class="text-right">متكررة</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    <?php     
    
    $admin=new admin(); 
    if($admin->GetAllUser()!=0){
$data=$admin->GetAllUser();
$ty="";

foreach ($data as $row ) {
    if($row["type"]==1){
        $ty="أخذ الجرعة ولم يتم تسجيلها";
    }elseif($row["type"]==2){
        $ty="مشكلة بالاصابة بالكورونا";
}elseif($row["type"]==3){
    $ty="اولوية";
}elseif($row["type"]==4){
    $ty="متخلف عن موعده";
}elseif($row["type"]==5){
    $ty="مشكلة في نوع المطعوم";
}elseif($row["type"]==6){
    $ty="حساسية";
}elseif($row["type"]==7){
    $ty="منع تطعيم";
}elseif($row["type"]==8){
    $ty="اخرى";
}
 echo '<tr>
<td>'.$row["name"].'</td>
<td>'.$row["userid"].'</td>
<td class="text-right">'.$ty.'</td>
<td><button type="button"  onclick="show(' . $row['id'] . ')" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodal2">تعديل</button></td>
 <td><button type="button" onclick="delete_data(' . $row['id'] . ')" class="btn btn-danger" >حذف</button></td>
</tr>';
    }

}
  
                                    ?>  
                                        <tr>
                                            <td>2018-09-29 05:57</td>
                                            <td>100398</td>
                                            <td>iPhone X 64Gb Grey</td>
                                            <td class="text-right">$999.00</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">$999.00</td>
                                            <td class="text-right">3</td>
                                            <td class="text-right">$30.00</td>
                                            <td class="text-right">$30.00</td>
                                            <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#scrollmodal">تفاصيل</button></td>
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                            </div>
                           
                        </div>
<?php   include ('includes/footer.php') ;?>
