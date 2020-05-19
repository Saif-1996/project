<?php
include("includes/header.php");


//include("admin/includes/connection.php");

if (isset($_SESSION["product"])) {
    $day = date("Y/m/d");
    $qty=count($_SESSION["product"]);
    $query = "INSERT INTO list_order (order_date,cust_id,total_price,status,qty) 
VALUES ('$day',{$_SESSION["cust"]},$count,'cash',$qty)";
    mysqli_query($conn, $query);
    $query = "SELECT * FROM list_order ORDER BY order_id DESC ";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["order_id"];
        break;
    }
    $pro = array_count_values($_SESSION["product"]);
    foreach ($pro as $key => $val) {
        $qu = "insert into order_pr (order_id,pro_id,qty)
        values ($id,$key,$val)";
        mysqli_query($conn, $qu);
    }

    unset($_SESSION["product"]);
} else {
//    header("Location:checkout.php");
}
?>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">


                <div class="col-md-12">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <?php $query = "SELECT * FROM list_order ORDER BY order_id DESC";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <h4 class="title">order ID:<?php echo $row["order_id"]; ?></h4>
<!--                                <h4 class="title">--><?php //echo $row["order_date"]; ?><!--</h4>-->

                            <?php break; } ?>
                        </div>


                    </div>


                </div>


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

<?php include("includes/footer.php");
