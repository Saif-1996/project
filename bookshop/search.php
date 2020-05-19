<?php
include("admin/includes/connection.php");
$query = "SELECT * FROM product WHERE pro_name LIKE '%{$_POST["name"]}%'  OR author LIKE '%{$_POST["name"]}%'";


?>
<style type="text/css">
    .product.product-single .product-thumb>img {
       width:  auto;
    }
</style>
<div class="section">

<div class="container">
    <div id="store">
        <!-- row -->
        <div class="row">

            <?php

            if (isset($_POST["name"])) {

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {


                    echo '

<!-- Single Product  -->
                            <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                 
                                       <!-- <span>New</span>-->';
                    if ($row["pro_status"] == "on_sale") {
                        echo '   <div class="product-label">
                                                        <span class="sale">-20%</span> 
                                                     </div>';

                    }
                    echo '    <!--<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view
                                    </button>-->
                                    <img   height="350" src="admin/' . $row["pro_image"] . '" alt="">
                                </div>
                                <div  class="product-body">';
                    if ($row["pro_status"] == "on_sale") {
                        $dis = $row["pro_price"] * .20;
                        $price = $row["pro_price"] - $dis;
                        echo '<h3 class="product-price">$' . $price . '
                                        <del class="product-old-price">$' . $row["pro_price"] . '</del>  </h3>';
                    } else {
                        echo '<h3 class="product-price">$' . $row["pro_price"] . '  </h3>';
                    }
                    $q = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$row["pro_id"]}";
                    $re = mysqli_query($conn, $q);

                    $r = mysqli_fetch_assoc($re);
                    if (isset($r)) {
                        echo '  <div onmouseover="rating(' . $row["pro_id"] . ')" class="product-rating"> 
                                                         ';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= round($r["AVG(rating)"])) {
                                echo '<i class="fa fa-star"></i>';
                            } else {
                                echo ' <i class="fa fa-star-o empty"></i>';
                            }

                        }
                        echo ' </div>';
                    }
                    echo '   <h2 class="product-name"><a href="product_details.php?id=' . $row["pro_id"] . '">' . $row["pro_name"] . '</a></h2>
                                    <div class="product-btns">
                                       
                                        <button type="submit" value="' . $row["pro_id"] . '" class="addtocart primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
                                            to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Single Product  -->
                        
                        ';


                }


            }
            ?>
        </div>
        </div>
        <!-- /row -->
</div></div>
