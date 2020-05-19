<?php include("includes/header.php");
if (!isset($_SESSION["cust"])) {

    header("Location:sign_up.php");
}
?>
    <script type="text/javascript">
        function buy() {
            window.location.href = "buy.php";
        }

        $(document).ready(function () {



        });
    </script>

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
    <!-- container -->
    <div class="container">
    <!-- row -->
    <div class="row">



    <div class="col-md-12">
        <div class="shiping-methods">
            <div class="section-title">
                <h4 class="title">Shiping Methods</h4>
            </div>
            <div class="input-checkbox">
                <input type="radio" name="shipping" id="shipping-1" checked>
                <label for="shipping-1">Cash On Delivery</label>
                <div class="caption">
                    <!--									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.-->
                    <!--										<p>-->
                </div>
            </div>

        </div>


    </div>

    <div class="col-md-12">
    <div class="order-summary clearfix">
    <div class="section-title">
        <h3 class="title">Order Review</h3>
    </div>
    <table class="shopping-cart-table table">
    <thead>
    <tr>
        <th>Product</th>
        <th></th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Price</th>
<!--        <th class="text-center">Total</th>-->
        <th class="text-right"></th>
    </tr>
    </thead>
    <tbody>

<?php
foreach ($proCart as $key) {
    # code...
    ?>
    <tr>
        <td class="thumb"><img src="admin/<?php echo $key["pro_image"];?>" alt=""></td>
        <td class="details">
            <a href="product_details.php?id=<?php echo $key["pro_id"];?>"><?php echo $key["pro_name"];?></a>
            <ul>
                <li><span>Status: <?php echo $key["pro_status"]?>;</span></li>

            </ul>
        </td>
        <td class="qty text-center"><input class="input" disabled type="number" value="<?php echo $product[$key["pro_id"]]?>"></td>

        <td class="price text-center">

        <?php if ($key["pro_status"]=="on_sale"){
            $old_price=$key["pro_price"]*$product[$key["pro_id"]]*0.20;
            $new_price=$key["pro_price"]*$product[$key["pro_id"]]-$old_price;
            echo '<strong>$'.$new_price.'</strong><br>
            <del class="font-weak"><small>$'.$key["pro_price"]*$product[$key["pro_id"]].'</small></del>';

        } else{
            echo '<strong>$'.$key["pro_price"]*$product[$key["pro_id"]].'</strong';
        }?>

        </td>

<!--        <td class="total text-center"><strong class="primary-color">$32.50</strong></td>-->
        <td class="text-right">
            <button onclick="remove(<?php echo $key["pro_id"];?>)" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
        </td>
    </tr>
   <?php }?>

    </tbody>
    <tfoot>
    <tr>
        <th class="empty" colspan="3"></th>
        <th>SUBTOTAL</th>
        <th colspan="2" class="sub-total">$<?php echo $count; ?></th>
    </tr>
    <tr>
        <th class="empty" colspan="3"></th>
        <th>SHIPING</th>
        <td colspan="2">Free Shipping</td>
    </tr>
    <tr>
        <th class="empty" colspan="3"></th>
        <th>TOTAL</th>
        <th colspan="2" class="total">$<?php echo $count; ?></th>
    </tr>
    </tfoot>
    </table>
    <div class="pull-right">
        <button onclick="buy()"  class="buy primary-btn">Place Order</button>
    </div>
    </div>

    </div>

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /section -->
    <?php include("includes/footer.php"); ?>