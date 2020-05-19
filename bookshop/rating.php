<?php session_start(); ?>
<?php
include("admin/includes/connection.php");
if (isset($_POST["show"])) {
    echo '  <div class="product-rating">';

    $q3 = "SELECT AVG(rating) FROM cust_rating WHERE pro_id={$_POST["pro_id"]}";
    $done = mysqli_query($conn, $q3);
    $rating = mysqli_fetch_assoc($done);

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= round($rating["AVG(rating)"])) {
            echo '<i class="fa fa-star"></i>';
        } else {
            echo '<i class="fa fa-star-o empty"></i>';
        }
    }


    echo '  </div>
                                <a href="#tab2">';
    $q3 = "SELECT COUNT(*) FROM cust_rating WHERE pro_id={$_POST["pro_id"]}";
    $done = mysqli_query($conn, $q3);
    $rating = mysqli_fetch_assoc($done);
    echo $rating["COUNT(*)"];
    echo 'Review(s) / Add Review</a></div>';

    unset($_POST["show"]);
} else {
    $pro_id = $_POST["pro_id"];
    $rev = $_POST["rev"];
    $rating = $_POST["rating"];
    $query = "SELECT * FROM cust_rating WHERE pro_id=$pro_id  AND cust_id={$_SESSION["cust"]}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (isset($row["pro_id"]) && $row["pro_id"] !=0) {
        
        $query = "UPDATE cust_rating SET
  rating= $rating,
  rev='$rev' 
  WHERE pro_id=$pro_id AND cust_id={$_SESSION["cust"]}";
        mysqli_query($conn, $query);
    } else {
        $query = "insert into cust_rating (cust_id,pro_id,rating,rev)
            values ({$_SESSION["cust"]},$pro_id,$rating,'$rev')";

        mysqli_query($conn, $query);


    }

    $q2 = "SELECT * FROM cust_rating  INNER JOIN customer ON cust_rating.cust_id=customer.cust_id";
    $ac = mysqli_query($conn, $q2);
    while ($col = mysqli_fetch_assoc($ac)) {
        if ($col["pro_id"] == $_POST["pro_id"]) {
            echo ' 
                                                <div class="single-review">
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
                                             

                                                ';

        }
    }
    echo '<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											';
}
