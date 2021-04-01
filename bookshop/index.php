<?php include("includes/header.php"); ?>
<?php include("admin/includes/connection.php");

?>
    <script type="text/javascript">

        $(document).ready(function () {


            $(".shop").click(function () {
                window.location.href = "products.php?page=1&filter=on_sale";

            });


        });
    </script>

    <div id="main"> <!-- HOME -->
        <div id="home">
            <!-- container -->
            <div class="container">
                <!-- home wrap -->
                <div class="home-wrap">
                    <!-- home slick -->
                    <div id="home-slick">
                        <!-- banner -->
                        <div class="banner banner-1">
                            <img src="img/bann.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 class="primary-color">Beacon of knowledge</h1>
                                <h3 class="white-color font-weak">Large Collection of Books</h3>
                                <!--                            <button class="primary-btn">Shop Now</button>-->
                            </div>
                        </div>
                        <!-- /banner -->

                        <!-- banner -->
                        <div class="banner banner-1">
                            <img src="./img/bann3.jpg" alt="">
                            <div class="banner-caption">
                                <h1 class="primary-color">Reading is part of our life<br>
                                    <span class="white-color font-weak"></span></h1>
                                <!--                            <button class="primary-btn">Shop Now</button>-->
                            </div>
                        </div>
                        <!-- /banner -->

                        <!-- banner -->
                        <div class="banner banner-1">
                            <img src="./img/banner03.jpg" alt="">
                            <div class="banner-caption">
                                <h1 class="white-color">New Books <span>Collection</span></h1>
                                <!--                            <button class="primary-btn">Shop Now</button>-->
                            </div>
                        </div>
                        <!-- /banner -->
                    </div>
                    <!-- /home slick -->
                </div>
                <!-- /home wrap -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOME -->

        <!-- section -->

        <!-- /section -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">On Sale Product</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-1 custom-dots"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /section-title -->

                    <!-- banner -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="banner banner-2">
                            <img src="./img/ex2.jpg" alt="">
                            <div class="banner-caption">
                                <!--                            <h2 class="white-color">NEW<br>Offer</h2>-->
                                <!--                            <button class="primary-btn">Shop Now</button>-->
                            </div>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- Product Slick -->
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <div class="row">
                            <div id="product-slick-1" class="product-slick">
                                <!-- Product Single -->
                                <?php
                                $query = "SELECT * FROM product WHERE pro_status='on_sale'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $discount = $row["pro_price"] * 0.20;
                                    $new_price = $row["pro_price"] - $discount;
                                    echo '   <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>Sale</span>
                                    <span class="sale">-20%</span>
                                </div>

                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img height="350" src="admin/' . $row["pro_image"] . '" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$' . $new_price . ' <del class="product-old-price">$' . $row["pro_price"] . '</del></h3>
                         ';
//                        Rating
//
                                    $q = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$row["pro_id"]}";
                                    $re = mysqli_query($conn, $q);

                                    $r = mysqli_fetch_assoc($re);
                                    if (isset($r)) {
                                        echo '  <div class="product-rating">  ';
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= round($r["AVG(rating)"])) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo ' <i class="fa fa-star-o empty"></i>';
                                            }

                                        }
                                        echo ' </div>';
                                    }
                                    echo '
                                <h2 class="product-name"><a href="product_details.php?id=' . $row["pro_id"] . '">' . $row["pro_name"] . '</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button  value="' . $row["pro_id"] . '" class="addtocart primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->';


                                } ?>


                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Coming Soon</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-2 custom-dots">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section title -->

                    <!-- Product Single -->
                    <!--                <div class="col-md-3 col-sm-6 col-xs-6">-->
                    <!--                    <div class="product product-single product-hot">-->
                    <!--                        <div class="product-thumb">-->
                    <!--                            <div class="product-label">-->
                    <!--                                <span class="sale">-20%</span>-->
                    <!--                            </div>-->
                    <!--                            <ul class="product-countdown">-->
                    <!--                                <li><span>00 H</span></li>-->
                    <!--                                <li><span>00 M</span></li>-->
                    <!--                                <li><span>00 S</span></li>-->
                    <!--                            </ul>-->
                    <!--                            <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>-->
                    <!--                            <img src="./img/soon.png" alt="">-->
                    <!--                        </div>-->
                    <!--                        <div class="product-body">-->
                    <!--                            <h3 class="product-price">$32.50-->
                    <!--                                <del class="product-old-price">$45.00</del>-->
                    <!--                            </h3>-->
                    <!--                            <div class="product-rating">-->
                    <!--                                <i class="fa fa-star"></i>-->
                    <!--                                <i class="fa fa-star"></i>-->
                    <!--                                <i class="fa fa-star"></i>-->
                    <!--                                <i class="fa fa-star"></i>-->
                    <!--                                <i class="fa fa-star-o empty"></i>-->
                    <!--                            </div>-->
                    <!--                            <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>-->
                    <!--                            <div class="product-btns">-->
                    <!--                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>-->
                    <!--                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>-->
                    <!--                                <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart-->
                    <!--                                </button>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!-- /Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="banner banner-2">
                            <img height="350" src="./img/soon.png" alt="">
                            <div class="banner-caption">
                                <!--                            <h2 class="white-color">NEW<br>Offer</h2>-->
                                <!--                            <button class="primary-btn">Shop Now</button>-->
                            </div>
                        </div>
                    </div>


                    <!-- Product Slick -->
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <div class="row">
                            <div id="product-slick-2" class="product-slick">
                                <?php
                                $query = "SELECT * FROM product WHERE pro_status='soon'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="product product-single">
                                <div class="product-thumb">
                                
                                   <!-- <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view
                                    </button>-->
                                    <img height="350" src="admin/' . $row["pro_image"] . '" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">$' . $row["pro_price"] . '</h3>';
                                    $q = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$row["pro_id"]}";
                                    $re = mysqli_query($conn, $q);

                                    $r = mysqli_fetch_assoc($re);
                                    if (isset($r)) {
                                        echo '  <div class="product-rating">  ';
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= round($r["AVG(rating)"])) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo ' <i class="fa fa-star-o empty"></i>';
                                            }

                                        }
                                        echo ' </div>';
                                    }
                                    echo '
                                    <h2 class="product-name"><a href="product_details.php?id=' . $row["pro_id"] . '">' . $row["pro_name"] . '</a></h2>
                                    <div class="product-btns">
                                 
                                        <button value="' . $row["pro_id"] . '" class="addtocart primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
                                            to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>';

                                }
                                ?>
                                <!-- Product Single -->

                                <!-- /Product Single -->


                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        <div class="section section-grey">
            <!-- container -->
            <div class="container">
                <!--             row-->
                <div class="row">
                    <!--                 banner-->
                    <div class="col-md-8">
                        <div class="banner banner-1">
                            <img src="./img/banner13.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 class="primary-color">HOT DEAL<br><span
                                            class="white-color font-weak"> 20% OFF</span></h1>
                                <button class="shop primary-btn">Shop Now</button>
                            </div>
                        </div>
                    </div>
                    <!--                 /banner-->

                    <!--                 banner-->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="products.php?page=1;filter=DESC">
                            <img src="./img/new.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW BOOKS</h2>
                            </div>
                        </a>
                    </div>
                    <!--                 /banner-->

                    <!--                 banner-->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="./img/banner12.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!--                 /banner-->
                </div>
                <!--             /row-->
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
                            <h2 class="title">Latest Products</h2>
                        </div>
                    </div>
                    <!-- section title -->
                    <?php $query = "SELECT * FROM product ORDER BY pro_id DESC";
                    $result = mysqli_query($conn, $query);
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($count >= 4) {break;}
                            ?>

                            <!-- Product Single -->
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view
                                        </button>
                                        <img height="320" src="admin/<?php echo $row["pro_image"]; ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <?php if ($row["pro_status"] == "on_sale") {
                                            $dis = $row["pro_price"] * .20;
                                            $price = $row["pro_price"] - $dis;
                                            echo '<h3 class="product-price">$' . $price . '
                                            <del class="product-old-price">$' . $row["pro_price"] . '</del>  </h3>';
                                        } else {
                                            echo '<h3 class="product-price">$' . $row["pro_price"] . '  </h3>';
                                        } ?>
                                        <div class="product-rating">
                                            <?php
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


                                            ?>
                                        </div>
                                        <h2 class="product-name"><a
                                                    href="product_details.php?id=<?php echo $row["pro_id"] ?>"><?php echo $row["pro_name"]; ?></a>
                                        </h2>
                                        <div class="product-btns">

                                            <button value="<?php echo $row["pro_id"]?>" class="addtocart primary-btn add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>
                                                Add to
                                                Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                        <?php
                        $count++;
                    } ?>

                    <!-- /row -->


                    <!-- /container -->
                </div>
            </div>
            <!-- /section -->
<?php include("includes/footer.php");