<?php   include ('includes/header.php') ;?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
// Delete
var id;
function delete_data(d) {
        var id = d;
        $.post("app/filter.php",
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

		$("#filter").change(function(){

$.post("app/filter.php",{

type:$("#filter").val()

},function(data){

$("tbody").html(data);
});


        });
     

});
</script>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center title-2"> </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" id="form" method="post" novalidate="novalidate">
                                            
          
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">تصفية النتائج</label>
                                                    <div class="input-group">
                                                        <select name="type" id="filter" class="form-control">
                                                        <option value="0">الكل</option>
                                                            <option value="1">أخذ الجرعة ولم يتم تسجيلها</option>
                                                            <option value="2">مشكلة بالاصابة بالكورونا</option>
                                                            <option value="3">اولوية</option>
                                                            <option value="4">متخلف عن موعده</option>
                                                            <option value="5">مشكلة في نوع المطعوم</option>
                                                            <option value="6">حساسية</option>
                                                            <option value="7">منع تطعيم</option>
                                                            <option value="8">اخرى</option>
                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                          
                                            <div>
                                           
                                            </div>
                                        </form>
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    <?php     
    
    $admin=new admin(); 
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
<td class="text-right"><button type="button" onclick="delete_data(' . $row['case_id'] . ')" class="btn btn-primary" >انجاز</button></td>
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
