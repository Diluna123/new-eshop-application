<?php
include "connection.php";

$search = $_GET["search"];


$pr = Database::search("SELECT * FROM `products` WHERE `p_title` LIKE '%" . $search . "%' AND `status_s_id` = '1'");
$pnums = $pr->num_rows;
if ($pnums > 0) {

    for ($x = 0; $x < $pnums; $x++) {

        $pro = $pr->fetch_assoc();




?>

        <div class="col">
            <div class="card product-card text-center " onclick="singleProductView(<?php echo $pro['p_id'] ?>);">
                <div>


                    <img src="<?php echo $pro['p_img'] ?>" class="card-img-top " style="object-fit: cover;" alt="...">

                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title"><?php echo $pro["p_title"] ?></h5>

                        </div>
                        <!-- <div class="col-3 d-flex justify-content-end">
                                                <i class="fas fa-heart addH" id="addH" onclick="addToWishlist('<?php echo $pro['p_id'] ?>')"></i>

                                            </div> -->
                    </div>
                    <?php

                    $qty = $pro["qty"];
                    if ($qty <= 0) {
                    ?>
                        <p class="card-text"><?php echo $pro["p_dis"] ?></p>

                        <span class="badge text-bg-danger ">Out of Stock</span>
                        <h3 class="card-text text-warning">Rs. <?php echo $pro["price"] ?></h3>
                        <a href="#" class="btn btn-warning">Add to Watchlist</a>


                    <?php


                    } else if ($qty <= 5) {
                    ?>
                        <p class="card-text"><?php echo $pro["p_dis"] ?></p>

                        <span class=" text-danger ">Only (<?php echo $qty ?>) items left</span>
                        <h3 class="card-text text-warning">Rs. <?php echo $pro["price"] ?></h3>
                        <a  class="btn btn-warning" onclick="addToCart(<?php echo $pro['p_id']; ?>)">Add to Cart</a>
                    <?php

                    } else {
                    ?>
                        <p class="card-text"><?php echo $pro["p_dis"] ?></p>
                        <h3 class="card-text text-warning">Rs. <?php echo $pro["price"] ?></h3>
                        <a  class="btn btn-warning" onclick="addToCart(<?php echo $pro['p_id']; ?>)">Add to Cart</a>



                    <?php
                    }


                    ?>





                </div>










            </div>
        </div>




    <?php

    }
} else {
    ?>
    <div class="row col-lg-12 d-flex justify-content-center">
        <div class="con mt-5">

            <h1 class="text-center text-secondary"><i class="fas fa-ban"></i></h1>
            <h3 class="text-center text-secondary">"<?php echo $search ?>"</h3>
            <h2 class="text-secondary text-center">Sorry ! Products Not Found !</h2>
        </div>
    </div>


<?php

}



?>