<?php session_start();
include("admin/includes/connection.php");
if (isset($_POST['id'])) {
    if (isset($_POST["remove"])) {
        foreach ($_SESSION["product"]  as $key => $value){
            if ($_POST["id"]==$value){
                unset($_SESSION["product"][$key]);
                break;
            }
        }

        unset($_POST["remove"]);
    } else {
        $_SESSION['product'][] = $_POST['id'];
        if (isset($_POST["qty"]) || $_POST["qty"] > 1) {
            for ($i = 1; $i < $_POST["qty"]; $i++) {
                $_SESSION['product'][] = $_POST['id'];

            }
        }# code...
    }

// echo("<pre>");
// print_r($_SESSION['product']);

}



$count = 0;
$proCart = array();
if (isset($_SESSION['product'])) {
    $product = array_count_values($_SESSION["product"]);
    foreach ($product as  $proid =>$key) {
        $query = "select * from product where pro_id=$proid";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $proCart[] = $row;
            if ($row["pro_status"] == "on_sale") {
                $oprice = $row["pro_price"]*$product[$row["pro_id"]] * 0.20;
                $nprice = $row["pro_price"] *$product[$row["pro_id"]]- $oprice;
                $count += $nprice;
            } else {
                $count += $row['pro_price']*$product[$row["pro_id"]];
            }
        }
        // echo("<pre>");
        // print_r($proCart);die();
    }

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>E-SHOP</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        function buy() {
            window.location.href = "buy.php";
        }
        function remove(id){
            $.post("cart.php",
                {
                    id: id,
                    remove: "remove"

                },
                function (data) {
                    $("#cart").html(data);
                });
        }
        $(document).ready(function () {
            $(".search-input").keydown(function () {
                $(".category-nav").addClass("show-on-click");
                $.post("search.php",
                    {
                        name:$(this).val(),


                    },
                    function (data) {
                        $("#main").html(data);
                    });

            });

            $(".addtocart").click(function () {
                var cart = $(this).val();
                var qty = 1;
                if ($(".proqty").val() !== "1" && $(".proqty").val() !== 'undefined' ) {
                    qty = $(".proqty").val();
                    // alert(qty);
                }
                $.post("cart.php",
                    {
                        id: cart,
                        qty: qty,

                    },
                    function (data) {
                        $("#cart").html(data);
                    });

            });
            // $(".del").click(function () {
            // var id=$(this).val();
            //     $.post("cart.php",
            //         {
            //             id: id,
            //             remove: "remove"
            //
            //         },
            //         function (data) {
            //             $("#cart").html(data);
            //         });
            // });
// $(".del").hover(function () {
// alert($(this).val());
// });
// $(".cat").click(function () {
//     document.cookie = "page=1";
//
// // });
//             $(".product-rating").hover(function () {
//               alert($(this :first-child).val());
//             });

        });
    </script>

</head>

<body>
<!-- HEADER -->
<header>
    <!-- top Header -->

    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="#">
                        <img src="./img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="Enter your keyword">
                                                <select class="input search-categories">
                                                    <option value="0">All Categories</option>

                                                </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="sign_up.php" class="text-uppercase">Login</a> / <a href="sign_up.php"
                                                                                    class="text-uppercase">Join</a>
                        <ul class="custom-menu">
<!--                            <li><a href=""><i class="fa fa-user-o"></i> My Account</a></li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>-->
<!--                            <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>-->
                            <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                            <li><a href="customer.php?logout=out"><i class="fa fa-unlock-alt"></i> Logout</a></li>
                            <li><a href="sign_up.php"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li id="cart" class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty"><?php if (isset($_SESSION["product"])) {
                                        echo count($_SESSION["product"]);
                                    } else {
                                        echo 0;
                                    }
                                    ?></span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                            <span><?php echo $count; ?>  $</span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    <?php foreach ($proCart as $key) {
                                        # code...
                                        ?>
                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="admin/<?php echo $key["pro_image"] ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <?php
                                                if ($key["pro_status"] == "on_sale") {
                                                    $dis = $key["pro_price"] *$product[$key["pro_id"]]* .20;
                                                    $price = $key["pro_price"]*$product[$key["pro_id"]] - $dis;
                                                    echo '<h3 class="product-price">$' . $price . '
                                        <del class="product-old-price">$' . $key["pro_price"] *$product[$key["pro_id"]]. '</del> <span class="qty">x'.$product[$key["pro_id"]].'</span> </h3>';
                                                } else {
                                                    echo '<h3 class="product-price">$'; echo $key["pro_price"] * $product[$key["pro_id"]];  echo '  <span class="qty">x'.$product[$key["pro_id"]].'</span> </h3>';
                                                }
                                                ?>

                                                <h2 class="product-name"><a
                                                            href="product_details.php?id=<?php echo $key["pro_id"]; ?>"><?php echo $key["pro_name"]; ?></a>
                                                </h2>
                                            </div>
                                            <button onclick="remove(<?php echo $key["pro_id"]?>)"  class="del cancel-btn"><i class="fa fa-trash"></i></button>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="shopping-cart-btns">
                                    <button class="main-btn">View Cart</button>
                                    <a href="checkout.php" class="primary-btn">Checkout <i
                                                class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav
               <?php if ($_SERVER["SCRIPT_NAME"] != "/bookshop/index.php") {
                echo "show-on-click";
            } ?>">
                <span class="category-header">Categories <i class="fa fa-list"></i></span>
                <ul class="category-list">

                    <?php
                    $query = "SELECT * FROM cat";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li><a class="cat" href="products.php?id=' . $row["cat_id"] . '&page=1">' . $row["cat_name"] . '</a></li>';

                    }
                    ?>
                </ul>
            </div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php?page=1">Shop</a></li>
<!--                    <li><a href="#">Sales</a></li>-->
                    <!--                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown"-->
                    <!--                                                             aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>-->
                    <!--                        <ul class="custom-menu">-->
                    <!--                            <li><a href="index.html">Home</a></li>-->
                    <!--                            <li><a href="products.html">Products</a></li>-->
                    <!--                            <li><a href="product-page.html">Product Details</a></li>-->
                    <!--                            <li><a href="checkout.html">Checkout</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->
