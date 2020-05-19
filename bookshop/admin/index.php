<?php include('includes/header.php'); ?>
<!--**********************************
    Content body start
***********************************-->
<div id="main">
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Products Sold</h3>
                            <div class="d-inline-block">
                                <?php
                                $day = date("Y/m/d");
                                $query = "SELECT COUNT(*) FROM order_pr ";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <h2 class="text-white"><?php echo $row["COUNT(*)"];?></h2>
                                <!--                                    <p class="text-white mb-0">Jan - March 2019</p>-->
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Net Profit</h3>
                            <div class="d-inline-block">
                                <?php $query = "SELECT SUM(total_price) FROM list_order";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <h2 class="text-white">$ <?php echo $row["SUM(total_price)"] ?></h2>
                                <p class="text-white mb-0"><?php echo $day;?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Customers</h3>
                            <div class="d-inline-block">
                                <?php $query = "SELECT COUNT(*) FROM customer";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <h2 class="text-white"><?php echo $row["COUNT(*)"];?></h2>
                                <p class="text-white mb-0"><?php echo $day;?></p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
<!--                <div class="col-lg-3 col-sm-6">-->
<!--                    <div class="card gradient-4">-->
<!--                        <div class="card-body">-->
<!--                            <h3 class="card-title text-white">Customer Satisfaction</h3>-->
<!--                            <div class="d-inline-block">-->
<!--                                <h2 class="text-white">99%</h2>-->
<!--                                <p class="text-white mb-0">Jan - March 2019</p>-->
<!--                            </div>-->
<!--                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>


        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

</div>
<?php include('includes/footer.php'); ?>
         