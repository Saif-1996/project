
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
        $.post("app/Employee.php",
            {
               
                edit: id,

            },
            function (data) {
                $("#fo").html(data);

            });
    }

	$(document).ready(function(){








// ******************













// Add Employee   ***************

		$(".add").click(function(){ 
        var name = $("#name").val();
                var uid = $("#uid").val();
                var type = $("#type").val();
                var password = $("#pass").val();
                var form = new FormData();
               
                form.append("name", name);
                form.append("pass", password);
                form.append("id", uid);
                form.append("type", type);
                form.append("Add", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "app/Employee.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        // alert(value);
                        $("tbody").html(value);
                        $('#form')[0].reset();
                    }
                });

		});


// Update data

		$("#edit").click(function(){
            // console.log(id);
   var name = $("#edname").val();
            console.log(name);
   
                var userid = $("#edid").val();
                var type = $("#edtype").val();
                var password = $("#edpass").val();
                var form = new FormData();
               
                form.append("name", name);
                form.append("pass", password);
                form.append("id", id);
                form.append("userid", userid);
                form.append("type", type);
                form.append("update", "add");
                // alert(form["file"]);
                $.ajax({
                    type: "post",
                    url: "app/Employee.php",
                    data: form/*action :"add"*/,
                    contentType: false,
                    processData: false,
                    success: function (value) {
                        // alert(value);
                        $("tbody").html(value);
                        $('#form')[0].reset();
                    }
                });
                $('.modal').modal('hide');

	});


// Delet-----------------------------------------
$("#form").submit(function(e) {
    e.preventDefault();
});

});
</script>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div dir="rtl" class="row">
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="text-center title-2">إضافة موظف</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" id="form" method="post" novalidate="novalidate">
                                            
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">الأسم</label>
                                                <input id="name" name="name"  type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                            </div>
                                           
                                            </div>
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> الرقم الوطني / الشخصي</label>
                                                <input id="uid" name="id" type="text" maxlength="10" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            </div>
                                            
                                            
                                          
</div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">الصلاحية</label>
                                                    <div class="input-group">
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="0">بدون صلاحية</option>
                                                            <option value="1">كامل الصلاحية</option>
                                                         
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> الرقم السري</label>
                                                <input id="pass" name="pass" type="password" maxlength="10" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                                </div>
                                            </div>
                                          
                                            <div>
                                                <button id="payment-button"  name="submit" type="submit" class="add btn btn-lg btn-info btn-block m-t-20">
                                                    <span id="payment-button-amount">إضافة</span>
                                                </button>
                                            </div>
                                        </form>
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
                                            
                                            <th>الاسم</th>
                                            <th class="text-right">الرقم السري</th>
                                            <th class="text-right">الصلاحية</th>
                                            <th class="text-right">تعديل</th>
                                            <th class="text-right">حذف</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php     
    
    $admin=new admin(); 
    if($admin->GetAllUser()!=0){
$data=$admin->GetAllUser();
$ty="";

foreach ($data as $row ) {
    if($row["per"]==0){
        $ty="بدون صلاحية";
    }else{
        $ty="كامل صلاحية";

    
    }
 echo '<tr>
<td class="text-right">'.$row["emp_name"].'</td>
<td class="text-right">'.$row["user_id"].'</td>
<td class="text-right">'.$ty.'</td>
<td class="text-right"><button type="button"  onclick="show(' . $row['id'] . ')" class="btn btn-primary" data-toggle="modal" data-target="#scrollmodal2">تعديل</button></td>
 <td class="text-right"><button type="button" onclick="delete_data(' . $row['id'] . ')" class="btn btn-danger" >حذف</button></td>
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

