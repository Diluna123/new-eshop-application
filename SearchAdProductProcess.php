<?php
include "connection.php";

$cid = $_GET["cid"];

if ($cid == 00) {
?>
    <div class="row row-cols-1 row-cols-md-6 g-4">


        <?php

        $resP = Database::search("SELECT * FROM `products` JOIN `catogerys` ON `products`.`catogerys_cat_id` = `catogerys`.`cat_id` JOIN `brand` ON `products`.`brand_br_id` = `brand`. `br_id` ORDER BY `products`.`p_id` ASC ");
        $numP = $resP->num_rows;
        if ($numP > 0) {

            for ($x = 0; $x < $numP; $x++) {
                $pData = $resP->fetch_assoc();

        ?>
                <div class="col ">
                    <div class="card   my-p-c ">
                        <img src="<?php echo $pData["p_img"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $pData["p_title"]; ?> (<?php echo $pData["brand_name"]; ?>)</h6>
                            <h6 class="card-text">Qty <?php echo $pData["qty"]; ?> Left</h6>
                            <p class="card-text">Rs.<?php echo $pData["price"]; ?></p>





                        </div>
                        <div class=" position-absolute d-flex justify-content-center align-items-end w-100 h-100 ">
                            <div class=" w-100 btn-wrap">
                                <div class="btn-cl">
                                    <div class="row col-12 ">
                                        <?php
                                        if ($pData["status_s_id"] == 1) {
                                        ?>
                                            <div class="col-10 d-grid">
                                                <button class="btn btn-sm btn-outline-danger  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Inactive</button>
                                            </div>

                                        <?php


                                        } else {

                                        ?>
                                            <div class="col-10 d-grid">

                                                <button class="btn btn-sm btn-outline-success  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Active</button>
                                            </div>


                                        <?php
                                        }



                                        ?>




                                        <div class="col-2 d-grid ">

                                            <button class="btn  btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOffers" aria-controls="offcanvasOffers" onclick="privewProduct(<?php echo $pData['p_id']; ?>);"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>



                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 d-grid">

                                            <button class="btn btn-sm btn-outline-warning" onclick='openUpdateProductModal(<?php echo $pData["p_id"]; ?>);'>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            <?php


            }
        } else {
            ?>
            <div class="row col-12 mt-5">
                <div class="text-danger">
                    <h6>No Products in this Catogery</h6>
                </div>
            </div>





        <?php




        }




        ?>







    </div>




<?php


















} else {
?>
    <div class="row row-cols-1 row-cols-md-6 g-4">


        <?php

        $resP = Database::search("SELECT * FROM `products` JOIN `catogerys` ON `products`.`catogerys_cat_id` = `catogerys`.`cat_id` JOIN `brand` ON `products`.`brand_br_id` = `brand`. `br_id` WHERE `products`.`catogerys_cat_id` = '$cid' ORDER BY `products`.`p_id` ASC ");
        $numP = $resP->num_rows;
        if ($numP > 0) {

            for ($x = 0; $x < $numP; $x++) {
                $pData = $resP->fetch_assoc();

        ?>
                <div class="col ">
                    <div class="card   my-p-c ">
                        <img src="<?php echo $pData["p_img"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $pData["p_title"]; ?> (<?php echo $pData["brand_name"]; ?>)</h6>
                            <h6 class="card-text">Qty <?php echo $pData["qty"]; ?> Left</h6>
                            <p class="card-text">Rs.<?php echo $pData["price"]; ?></p>





                        </div>
                        <div class=" position-absolute d-flex justify-content-center align-items-end w-100 h-100 ">
                            <div class=" w-100 btn-wrap">
                                <div class="btn-cl">
                                    <div class="row col-12 ">
                                        <?php
                                        if ($pData["status_s_id"] == 1) {
                                        ?>
                                            <div class="col-10 d-grid">
                                                <button class="btn btn-sm btn-outline-danger  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Inactive</button>
                                            </div>

                                        <?php


                                        } else {

                                        ?>
                                            <div class="col-10 d-grid">

                                                <button class="btn btn-sm btn-outline-success  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Active</button>
                                            </div>


                                        <?php
                                        }



                                        ?>




                                        <div class="col-2 d-grid ">

                                            <button class="btn  btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOffers" aria-controls="offcanvasOffers" onclick="privewProduct(<?php echo $pData['p_id']; ?>);"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>



                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 d-grid">

                                            <button class="btn btn-sm btn-outline-warning" onclick='openUpdateProductModal(<?php echo $pData["p_id"]; ?>);'>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            <?php


            }
        } else {
            ?>
            <div class="row col-12 mt-5">
                <div class="text-danger">
                    <h6>No Products in this Catogery</h6>
                </div>
            </div>





        <?php




        }




        ?>







    </div>



























<?php


























}




?>