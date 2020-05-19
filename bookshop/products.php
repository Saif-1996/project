<?php include("admin/includes/connection.php"); ?>
<?php include("includes/header.php");

if (isset($_GET["filter"])) {
    if (isset($_GET["id"])) {
        if ($_GET["filter"] == "DESC" || $_GET["filter"] == "ASC") {
            $queryPage = "SELECT * FROM product WHERE cat_id={$_GET["id"]} ORDER BY pro_price {$_GET["filter"]}";
        } else {
            $queryPage = "SELECT COUNT(*) FROM product WHERE  cat_id={$_GET["id"]} AND pro_status='{$_GET["filter"]}'";
        }
    } else {
        if ($_GET["filter"] == "DESC" || $_GET["filter"] == "ASC") {
            $queryPage = "SELECT COUNT(*) FROM product  ORDER BY pro_price {$_GET["filter"]}";
        } else {
            $queryPage = "SELECT COUNT(*) FROM product WHERE   pro_status='{$_GET["filter"]}'";
        }
    }
} else {
    if (!isset($_GET["id"])) {
        $queryPage = "SELECT COUNT(*) FROM product";

    } else {
        $queryPage = "SELECT COUNT(*) FROM product WHERE cat_id={$_GET["id"]}";
    }
}

?>
<script type="text/javascript">
    $(document).ready(function () {
        $(".anch").click(function () {
            // $.post("pro.php",
            //     {
            //         name: "Donald Duck",
            //         city: "Duckburg"
            //     },
            //     function(data,status){
            //         alert("Data: " + data + "\nStatus: " + status);
            //     });
            //
            // alert($(this).text());
            // alert($("#id").text());

        });
    });
</script>
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Products</li>
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
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">

                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter by </h3>
                        <ul class="list-links">
                            <?php
                            if (!isset($_GET["id"])) {
                                echo '<li><a href="products.php?page=1&filter=ASC">Price from Low to
                                Height</a>
                        </li>
                        <li><a href="products.php?page=1&filter=DESC">Price from Height to
                                Low</a></li>
                        <li><a href="products.php?page=1&filter=soon">Coming Soon</a></li>
                        <li><a href="products.php?page=1&filter=on_sale">On Sale</a></li>
                        <li><a href="products.php?page=1&filter=feature">Feature</a></li>
';

                            } else {
                                echo '<li><a href="products.php?page=1&filter=ASC&id=' . $_GET["id"] . '">Price from Low to
                                Height</a>
                        </li>
                        <li><a href="products.php?page=1&filter=DESC&id=' . $_GET["id"] . '">Price from Height to
                                Low</a></li>
                        <li><a href="products.php?page=1&filter=soon&id=' . $_GET["id"] . '">Coming Soon</a></li>
                        <li><a href="products.php?page=1&filter=on_sale&id=' . $_GET["id"] . '">On Sale</a></li>
                        <li><a href="products.php?page=1&filter=feature&id=' . $_GET["id"] . '">Feature</a></li>
';

                            } ?>

                        </ul>
                    </div>
                    <!-- /aside widget -->

                    <!-- aside widget -->

                    <!-- /aside widget -->

                    <!-- aside widget -->
                    <!--                    <div class="aside">-->
                    <!--                        <h3 class="aside-title">Top Rated Product</h3>-->
                    <!--                --><?php //$qtop="SELECT * FROM cust_rating ORDER BY  DESC " ?>
                    <!-- widget product -->
                    <!--                        <div class="product product-widget">-->
                    <!--                            <div class="product-thumb">-->
                    <!--                                <img src="./img/thumb-product01.jpg" alt="">-->
                    <!--                            </div>-->
                    <!--                            <div class="product-body">-->
                    <!--                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>-->
                    <!--                                <h3 class="product-price">$32.50-->
                    <!--                                    <del class="product-old-price">$45.00</del>-->
                    <!--                                </h3>-->
                    <!--                                <div class="product-rating">-->
                    <!--                                    <i class="fa fa-star"></i>-->
                    <!--                                    <i class="fa fa-star"></i>-->
                    <!--                                    <i class="fa fa-star"></i>-->
                    <!--                                    <i class="fa fa-star"></i>-->
                    <!--                                    <i class="fa fa-star-o empty"></i>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!-- /widget product -->


                    <!--                    </div>-->
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="pull-left">
                            <div class="row-filter">
                                <!--                            <a href="#"><i class="fa fa-th-large"></i></a>-->
                                <a href="#" class="active"><i class="fa fa-bars"></i></a>
                            </div>

                        </div>
                        <div class="pull-right">

                            <!--                        <ul class="store-pages">-->
                            <!--                            <li><span class="text-uppercase">Page:</span></li>-->
                            <!--                            <li class="active">1</li>-->
                            <!--                            <li><a href="#">2</a></li>-->
                            <!--                            <li><a href="#">3</a></li>-->
                            <!--                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>-->
                            <!--                        </ul>-->
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- STORE -->
                    <div id="store">
                        <!-- row -->
                        <div class="row">

                            <?php
                            if (isset($_GET["page"])) {
                                if (isset($_GET["filter"])) {
                                    if (isset($_GET["id"])) {
                                        if ($_GET["filter"] == "DESC" || $_GET["filter"] == "ASC") {
                                            $query = "SELECT * FROM product WHERE cat_id={$_GET["id"]} ORDER BY pro_price {$_GET["filter"]}";
                                        } else {
                                            $query = "SELECT * FROM product WHERE  cat_id={$_GET["id"]} AND pro_status='{$_GET["filter"]}'";
                                        }
                                    } else {
                                        if ($_GET["filter"] == "DESC" || $_GET["filter"] == "ASC") {
                                            $query = "SELECT * FROM product  ORDER BY pro_price {$_GET["filter"]}";
                                        } else {
                                            $query = "SELECT * FROM product WHERE  pro_status='{$_GET["filter"]}'";
                                        }
                                    }
                                } else {
                                    if (!isset($_GET["id"])) {
                                        $query = "SELECT * FROM product";

                                    } else {
                                        $query = "SELECT * FROM product WHERE cat_id={$_GET["id"]}";
                                    }
                                }
                                $result = mysqli_query($conn, $query);
                                $count = 1;
                                $page = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($count <= 9) {
                                        if ($_GET["page"] == $page) {

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
                                    <img width="10" height="320" src="admin/' . $row["pro_image"] . '" alt="">
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
                                            $resultPage = mysqli_query($conn, $queryPage);
                                            $rowPage = mysqli_fetch_assoc($resultPage);
                                            $colPage=$rowPage["COUNT(*)"]/9;
                                            $colPage2=(int)$colPage;
                                            if ($_GET["page"]<=$colPage) {
                                                if ($count == 2 || $count == 3 || $count == 4 || $count == 6 || $count == 8) {
                                                    if ($count == 2) {
                                                        echo '<div class="clearfix visible-sm visible-xs"></div>';
                                                    } elseif ($count == 3) {
                                                        echo '<div class="clearfix visible-md visible-lg"></div>';
                                                    } elseif ($count == 4) {
                                                        echo '<div class="clearfix visible-sm visible-xs"></div>';
                                                    } elseif ($count == 6) {
                                                        echo '<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>';
                                                    } elseif ($count == 8) {
                                                        echo '<div class="clearfix visible-sm visible-xs"></div>';
                                                    }

                                                }
                                            }
                                        }

                                    } else {
                                        $count = 1;
                                        $page++;

                                    }
                                    $count++;
                                }


                            }
                            ?>

                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /STORE -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <!--                    <div class="pull-left">-->
                        <!--                        <div class="row-filter">-->
                        <!--                            <a href="#"><i class="fa fa-th-large"></i></a>-->
                        <!--                            <a href="#" class="active"><i class="fa fa-bars"></i></a>-->
                        <!--                        </div>-->
                        <!--                        <div class="sort-filter">-->
                        <!--                            <span class="text-uppercase">Sort By:</span>-->
                        <!--                            <select class="input">-->
                        <!--                                <option value="0">Position</option>-->
                        <!--                                <option value="0">Price</option>-->
                        <!--                                <option value="0">Rating</option>-->
                        <!--                            </select>-->
                        <!--                            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <div class="pull-right">

                            <?php


                            $result = mysqli_query($conn, $queryPage);
                            $row = mysqli_fetch_assoc($result);
                            if (isset($row["COUNT(*)"])) {
                                $page = $row["COUNT(*)"] / 9;

                                if (is_float($page)) {
                                    $page++;

                                }
                                $page = (int)$page;
                                if ($page > 1) {
                                    echo '<ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>';
                                    if (isset($_GET["id"])) {
                                        echo '       <input type="hidden" id="id" value="' . $_GET["id"] . '">';
                                    }
                                    for ($i = 1; $i <= $page; $i++) {
                                        if (isset($_GET["filter"])) {
                                            if (!isset($_GET["id"])) {
                                                echo '<li><a href="products.php?filter=' . $_GET["filter"] . '&page=' . $i . '">' . $i . '</a></li>';

                                            } else {
                                                echo '<li><a href="products.php?filter=' . $_GET["filter"] . '&id=' . $_GET["id"] . '&page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        } else {
                                            if (!isset($_GET["id"])) {
                                                echo '<li><a href="products.php?page=' . $i . '">' . $i . '</a></li>';

                                            } else {
                                                echo '<li><a href="products.php?id=' . $_GET["id"] . '&page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }
                                    }
                                }
                                echo ' <!--<li class="active">1</li>-->
                           <!--  <li><a href="#"><i class="fa fa-caret-right"></i></a></li>-->
                        </ul>';

                            }
                            ?>

                        </div>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</div>
<!-- /section -->
<?php include("includes/footer.php"); ?>
