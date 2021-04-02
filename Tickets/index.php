<?php   include ('includes/header.php') ;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
// Delete
var id;
function delete_data(d) {
        var id = d;
        $.post("app/Employee.php",
            {
                id: id,
                delete: "delete",

            },
            function (data) {
                $("tbody").html(data);

            });
    }




    // show data in model 


    function show(d) {
        id = d;
        $.post("app/Ticket.php",
            {
               
                show: id,

            },
            function (data) {
                $("#fo").html(data);

            });
    }

	$(document).ready(function(){

		
     

});
</script>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div dir="rtl" class="col-lg-3">
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>United States</td>
                                                        <td class="text-right">$119,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td class="text-right">$70,261.65</td>
                                                    </tr>
                                                    <tr>
                                                        <td>United Kingdom</td>
                                                        <td class="text-right">$46,399.22</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turkey</td>
                                                        <td class="text-right">$35,364.90</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Germany</td>
                                                        <td class="text-right">$20,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>France</td>
                                                        <td class="text-right">$10,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td class="text-right">$5,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Italy</td>
                                                        <td class="text-right">$1639.32</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <th class="text-right">نوع الشكوى</th>
                                            <th class="text-right">تحتاج متابعة</th>
                                            <th class="text-right">متكررة</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    <?php     
    
    $admin=new user(); 
    if($admin->GetAll()!=0){
$data=$admin->GetAll();
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

</tr>';
    }

}
  
                                    ?>  
                                     
                                     
                                    </tbody>
                                </table>
                            </div>
                            </div>
                           
                        </div>
<?php   include ('includes/footer.php') ;?>
