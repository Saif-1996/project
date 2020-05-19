<?php session_start();
include("admin/includes/connection.php");
if (isset($_POST['id'])) {
    if (isset($_POST["remove"])) {
        foreach ($_SESSION["product"] as $key => $value) {
            if ($_POST["id"] == $value) {
                unset($_SESSION["product"][$key]);
                break;
            }
        }

        unset($_POST["remove"]);
    } else {
        $_SESSION['product'][] = $_POST['id'];
        if (isset($_POST["qty"]) && $_POST["qty"] > 1) {
            for ($i = 1; $i < $_POST["qty"]; $i++) {
                $_SESSION['product'][] = $_POST['id'];
                unset($_POST["qty"]);
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

    foreach ($product as $proid => $key) {
        $query = "select * from product where pro_id=$proid";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $proCart[] = $row;
            if ($row["pro_status"] == "on_sale") {
                $oprice = $row["pro_price"] * $product[$row["pro_id"]] * 0.20;
                $nprice = $row["pro_price"] * $product[$row["pro_id"]] - $oprice;
                $count += $nprice;
            } else {
                $count += $row['pro_price'] * $product[$row["pro_id"]];
            }
        }
        // echo("<pre>");
        // print_r($proCart);die();
    }

}
?>


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
                            $dis = $key["pro_price"] * $product[$key["pro_id"]] * .20;
                            $price = $key["pro_price"] * $product[$key["pro_id"]] - $dis;
                            echo '<h3 class="product-price">$' . $price . '
                                        <del class="product-old-price">$' . $key["pro_price"] * $product[$key["pro_id"]] . '</del> <span class="qty">x' . $product[$key["pro_id"]] . '</span> </h3>';
                        } else {
                            echo '<h3 class="product-price">$';
                            echo $key["pro_price"] * $product[$key["pro_id"]];
                            echo '  <span class="qty">x' . $product[$key["pro_id"]] . '</span> </h3>';
                        }
                        ?>

                        <h2 class="product-name"><a
                                    href="product_details.php?id=<?php echo $key["pro_id"]; ?>"><?php echo $key["pro_name"]; ?></a>
                        </h2>
                    </div>
                    <button onclick="remove(<?php echo $key["pro_id"] ?>)" class="del cancel-btn"><i
                                class="fa fa-trash"></i></button>
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


