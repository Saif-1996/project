<?php   include_once ('../class/admin.php') ;?>

<?php
$admin=new admin();
if(isset($_POST["show"])){
    $data=$admin->GetOneCase($_POST["show"]);
    $ty="";


    if($data["type"]==1){
        $ty="أخذ الجرعة ولم يتم تسجيلها";
    }elseif($data["type"]==2){
        $ty="مشكلة بالاصابة بالكورونا";
}elseif($data["type"]==3){
    $ty="اولوية";
}elseif($data["type"]==4){
    $ty="متخلف عن موعده";
}elseif($data["type"]==5){
    $ty="مشكلة في نوع المطعوم";
}elseif($data["type"]==6){
    $ty="حساسية";
}elseif($data["type"]==7){
    $ty="منع تطعيم";
}elseif($data["type"]==8){
    $ty="اخرى";
}
   
    echo'      <div class="form-group">
    <label for="cc-payment" class="control-label mb-1">الأسم</label>
    <input id="cc-name" name="cc-name" value="'.$data["name"].'" disabled type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
</div>
<div class="row">
<div class="col-6">
<div class="form-group has-success">
    <label for="cc-name" class="control-label mb-1">الرقم الوطني</label>
    <input id="cc-name" name="cc-name" value="'.$data["national_id"].'" disabled type="text" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
</div>
</div>
<div class="col-6">
  <div class="form-group">
    <label for="cc-number" class="control-label mb-1">تاريخ الميلاد</label>
    <input id="cc-name" name="cc-name" value="'.$data["birth"].'" disabled type="text" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">

    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
</div>
</div>



</div>

<div class="row">
    <div class="col-6">
        <label for="cc-payment" class="control-label mb-1">نوع الشكوى</label>
    <input id="cc-name" name="cc-name" value="'.$ty.'" disabled type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">

    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="cc-exp" class="control-label mb-1">رقم الهاتف</label>
            <input id="cc-exp" value="'.$data["phone"].'" name="cc-exp" type="فثءف" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="" autocomplete="cc-exp" maxlength="10">
            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
        </div>
    </div>
</div>

<div class="row" id="sel1" style="display: none;">
    <div class="col-12">
        <div class="form-check">
            <div class="radio">
                <label for="radio1" class="form-check-label m-r-20 pl-20">
                    <input type="radio" id="radio1" name="radios" value="مصاب سابق ولا يظهر على النظام" class="form-check-input">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;مصاب سابق ولا يظهر على النظام
                </label>
            </div>
            <div class="radio">
                <label for="radio2" class="form-check-label  m-r-20 pl-20">
                    <input type="radio" id="radio2" name="radios" value="غير مصاب ومسجل على النظام مصاب" class="form-check-input"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;غير مصاب ومسجل على النظام مصاب
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">ملاحظات</label>
            <textarea name="textarea-input" id="textarea-input" rows="3" placeholder="" class="form-control">value="'.$data["note"].'"</textarea>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-12">
        <div class="form-check">
            <div class="radio">
                <label for="radio1" class="form-check-label m-r-20 pl-20">
                    <input type="radio" id="radio1" name="radios" value="تم حل المشكلة" class="form-check-input">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تم حل المشكلة
                </label>
            </div>
            <div class="radio">
                <label for="radio2" class="form-check-label  m-r-20 pl-20">
                    <input type="radio" id="radio2" name="radios" value="تحتاج متابعة" class="form-check-input"> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تحتاج متابعة
                </label>
            </div>
        </div>
    </div>
</div>
    
           ';
        unset($_POST['edit']);
    
    }