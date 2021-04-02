<?php   include ('includes/header.php') ;?>

<?php if(isset($_POST["submit"])){
$name=$_POST["name"];
$phone=$_POST["phone"];
$type=$_POST["type"];
$note=$_POST["note"];
$national_id=$_POST["national_id"];
$birth=$_POST["day"]."/".$_POST["mounth"]."/".$_POST["year"];
$user_id=$_SESSION["id"];
$case=new user();
$case->AddCase($user_id,$name,$national_id,$birth,$phone,$note,$type);


unset($_POST);

} ?>
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
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">الأسم</label>
                                                <input id="cc-name" name="name"  type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                            </div>
                                            <div class="row">
                                            <div class="col-6">
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> الرقم الوطني / الشخصي</label>
                                                <input id="cc-name" name="national_id" type="text" maxlength="10" class="form-control cc-name valid" data-val="true" data-val-required="يرجى ادخال الرقم الوطني" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">تاريخ الميلاد</label>
                                                <div class="row">
                                                <div class="col-4">
                                                <input id="cc-number" name="day" type="text" maxlength="2" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="يوم">
                                                    </div>
                                                    <div class="col-4">
                                                <input id="cc-number" name="mounth" type="text" maxlength="2" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="شهر">
                                                    </div>
                                                    <div class="col-4">
                                                <input id="cc-number" name="year" type="text" maxlength="4" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" placeholder="سنة">
                                                    </div>
                                                
                                                </div>
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            </div>
                                            
                                            
                                          
</div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">نوع الشكوة</label>
                                                    <div class="input-group">
                                                        <select name="type" id="select1" class="form-control">
                                                            <option value="0">-- اختر --</option>
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">رقم الهاتف</label>
                                                        <input id="cc-exp" name="phone" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="" autocomplete="cc-exp" maxlength="10">
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
                                                        <textarea name="note" id="textarea-input" rows="3" placeholder="" class="form-control"></textarea>
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
                                            <div>
                                                <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block m-t-20">
                                                    <span id="payment-button-amount">ارسال</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    
<?php   include ('includes/footer.php') ;?>

