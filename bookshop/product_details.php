<?php include("admin/includes/connection.php");
include("includes/header.php");
$query = "SELECT * FROM product WHERE pro_id={$_GET['id']}";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>
    <script type="text/javascript">
        var rating = 5;
       function prat(id) {
           var rating = $("input[name='rating']:checked").val();
            var rev = $("#rev").val();
            // alert(rev);
            // alert(rating);
           // alert(id);
            $.post("rating.php",
                {
                    rating: rating,
                    pro_id:id,
                    rev: rev
                },
                function (data) {
                // alert(id+" "+rev+" "+rating);
                    $(".prating").html(data);


                });
           $.post("rating.php",
               {

                   pro_id:id,
                   show:"show"

               },
               function (data) {

                   $(".pro_rating").html(data);
               });

        }
        $(document).ready(function () {


            $(".log").click(function () {
                window.location.href = "sign_up.php";

            });


        });
    </script>

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php?page=1&id=<?php echo $row["cat_id"] ?>">Products</a></li>
                <li><a href="#">Product Details</a></li>

            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->
<div id="main">
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-thumb">
                                <img height="350" src="admin/<?php echo $row["pro_image"] ?>" alt="">
                            </div>
                            <!--                            <div class="product-view">-->
                            <!--                                <img src="./img/main-product02.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                            <div class="product-view">-->
                            <!--                                <img src="./img/main-product03.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                            <div class="product-view">-->
                            <!--                                <img src="./img/main-product04.jpg" alt="">-->
                            <!--                            </div>-->
                        </div>
                        <!--                        <div id="product-view">-->
                        <!--                            <div class="product-view">-->
                        <!--                                <img src="./img/thumb-product01.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="product-view">-->
                        <!--                                <img src="./img/thumb-product02.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="product-view">-->
                        <!--                                <img src="./img/thumb-product03.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                            <div class="product-view">-->
                        <!--                                <img src="./img/thumb-product04.jpg" alt="">-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <input type="hidden" id="hide" value="<?php echo $row["pro_id"]; ?>">

                            <?php if ($row["pro_status"] == "on_sale") {

                                echo ' 
 <div class="product-label">

                                <span class="sale">-20%</span>
                            </div>';

                            } ?>

                            <h2 class="product-name"><?php echo $row["pro_name"] ?></h2>
                            <?php
                            if ($row["pro_status"] == "on_sale") {
                                $dis = $row["pro_price"] * 0.20;
                                $price = $row["pro_price"] - $dis;
                                echo ' <h3 class="product-price">$' . $price . ' <del class="product-old-price">$' . $row["pro_price"] . '</del></h3>';
                            } else {
                                echo ' <h3 class="product-price">$' . $row["pro_price"] . ' </h3>';

                            }
                            ?>

                            <div>
                                <div class="pro_rating">
                                <div class="product-rating">
                                    <?php
                                    $q3 = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$_GET["id"]}";
                                    $done = mysqli_query($conn, $q3);
                                    $rating = mysqli_fetch_assoc($done);

                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= round($rating["AVG(rating)"])) {
                                            echo '<i class="fa fa-star"></i>';
                                        } else {
                                            echo '<i class="fa fa-star-o empty"></i>';
                                        }
                                    }


                                    ?>


                                </div>
                                <a href="#tab2"><?php  $q3 = "SELECT COUNT(*) FROM cust_rating WHERE pro_id={$_GET["id"]}";
                                    $done = mysqli_query($conn, $q3);
                                    $rating = mysqli_fetch_assoc($done);
                                    echo $rating["COUNT(*)"];?> Review(s) / Add Review</a></div>
                            </div>
                            <p><strong>Availability:</strong> In Stock</p>
                            <p><strong>Author:</strong><?php echo $row["author"]; ?></p>
                            <p><strong>Pages:</strong><?php echo $row["page"]; ?></p>

                            <div class="product-options">


                            </div>

                            <div class="product-btns">
                                <div class="qty-input">
                                    <span class="text-uppercase">QTY: </span>
                                    <input min="1" class="proqty input" type="number">
                                </div>
                                <button type="submit" value="<?php echo $_GET["id"]; ?>" class="addtocart primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
                                to Cart
                                </button>
                                <!--                                <div class="pull-right">-->
                                <!--                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>-->
                                <!--                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>-->
                                <!--                                    <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Details </a></li>
                                <!--                                <li><a data-toggle="tab" href="#tab1">Details</a></li>-->
                                <li><a data-toggle="tab" href="#tab2">Reviews</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p><?php echo $row["pro_desc"]; ?>.</p>
                                </div>
                                <?php
                                if (isset($_SESSION["cust"])) {


                                    echo '<div id="tab2" class="tab-pane fade in">

                                    <div class="row">
                                        <div class="col-md-6"><div class="prating product-reviews">';
                                    $q2 = "SELECT * FROM cust_rating INNER JOIN customer ON cust_rating.cust_id=customer.cust_id";
                                    $ac = mysqli_query($conn, $q2);
                                    while ($col = mysqli_fetch_assoc($ac)) {
                                        if ($col["pro_id"] == $_GET["id"]) {
                                            echo '  <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><i class="fa fa-user-o"></i> ' . $col["cust_name"] . '</div>
                                                        <!-- <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>-->
                                                        <div class="review-rating pull-right">';
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $col["rating"]) {
                                                    echo '   <i class="fa fa-star"></i>';
                                                } else {
                                                    echo ' <i class="fa fa-star-o empty"></i>';
                                                }
                                            }
                                            echo '
                                                
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>' . $col["rev"] . '</p>
                                                    </div>
                                             
                                                   </div>
                                                ';

                                        }
                                    }

                                    echo '  
<ul class="reviews-pages">
                                                    <li class="active">1</li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-uppercase">Write Your Review</h4>
                                            <p>Your email address will not be published.</p>
                                            <form class="review-form">

                                                <div class="form-group">
                                                    <textarea class="input" id="rev"  placeholder="Your review"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-rating">
                                                        <strong class="text-uppercase">Your Rating: </strong>
                                                        <div class="stars">
                                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            	<input type="button" onclick="prat(' . $_GET["id"] . ')" class="primary-btn" value="submit">

                                            </form>
                                        </div>
                                    </div>



                                </div>';
                                } else {

                                    echo '<div id="tab2" class="tab-pane fade in">

                                   <input type="submit" value="Log IN" class="log primary-btn"></input>



                                </div>';
                                }
                                ?>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Picked For You</h2>
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Single -->
                <?php
                $qu = "SELECT * FROM product WHERE cat_id={$row["cat_id"]}";
                $relat = mysqli_query($conn, $qu);
//           only 4 books
                $i = 1;
                while ($related = mysqli_fetch_assoc($relat)) {
                    if ($related["pro_id"] != $_GET["id"]) {
                        echo '<div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <img src="admin/' . $related["pro_image"] . '" alt="">
                        </div>
                        <div class="product-body">';
                        if ($related["pro_status"] == "on_sale") {
                            $dis = $related["pro_price"] * .20;
                            $price = $related["pro_price"] - $dis;
                            echo '<h3 class="product-price">$' . $price . '
                                        <del class="product-old-price">$' . $related["pro_price"] . '</del>  </h3>';
                        } else {
                            echo '<h3 class="product-price">$' . $related["pro_price"] . '  </h3>';
                        }
                        echo '   <div class="product-rating">';
                        $q = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$related["pro_id"]}";
                        $r = mysqli_query($conn, $q);
                        $re = mysqli_fetch_assoc($r);
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= round($re["AVG(rating)"])) {
                                echo '<i class="fa fa-star"></i>';
                            } else {
                                echo '   <i class="fa fa-star-o empty"></i>';
                            }
                        }


                        echo '</div>
                            <h2 class="product-name"><a href="product_details.php?id='.$related["pro_id"].'">' . $related["pro_name"] . '</a></h2>
                            <div class="product-btns">
                             
                                        <button type="submit" value="' . $related["pro_id"] . '" class="addtocart primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
                                            to Cart
                                        </button>
                            </div>
                        </div>
                    </div>
                </div>';
                        $i++;
                        if ($i < 4) {
                            break;
                        }

                    }
                }
                ?>

                <!-- /Product Single -->


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
</div>
<?php include("includes/footer.php") ?>