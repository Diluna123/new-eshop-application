<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: black;
        }
    </style>



</head>

<body>
    <?php
    include 'connection.php';
    require 'topnav.php';

    if (isset($_SESSION['user'])) {

    ?>
        <div class="container">
            <div class="row mt-5 mb-3">

                <label for="" class="form-label text-light"><a href="index.php" class="link-warning text-decoration-none">Home </a>/ My Orders</label>

            </div>
            <div class="row">
                <h3 class="text-light fw-light">My Orders</h3>
            </div>
            <ul class="nav nav-tabs mt-5 " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-warning active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">To Pay</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-warning " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">To Ship</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-warning " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Dileverd</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-warning " id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">To Review</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mt-3">
                        <div class="col-12">
                            <?php

                            $rs = Database::search("SELECT * FROM `invoice` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `order_status_id` = '1' ORDER BY `date` DESC");

                            if ($rs->num_rows == 0) {
                            ?>
                                <h4 class="text-center text-secondary mt-4 ">You have no Products to Pay</h4>

                                <?php



                            } else {
                                for ($x = 0; $x < $rs->num_rows; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>

                                    <a class="" data-bs-toggle="collapse" href="#collapseExample<?php echo $x ?>" role="button" aria-expanded="false" aria-controls="">
                                        <div class="card mb-1">

                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4">
                                                        <label for="" class="text-secondary">Order Number :</label>
                                                    </div>
                                                    <div class="col-4"> <label for="" class="text-secondary">Date :</label></div>
                                                    <div class="col-4"> <label for="" class="text-secondary">Price:</label></div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4">
                                                        <label for="" class="text-secondary">#<span class="text-warning"><?php echo $data["order_num"] ?></span> </label>
                                                    </div>
                                                    <div class="col-4"> <label for="" class="text-warning"><?php echo $data["date"] ?></label></div>
                                                    <div class="col-4"> <label for="" class="text-warning">Rs. <?php echo $data["total"] ?></label></div>
                                                </div>

                                            </div>

                                        </div>
                                    </a>
                                    <div class="collapse mb-1" id="collapseExample<?php echo $x ?>">
                                        <div class="card card-body">
                                            <div class="row">
                                                <?php

                                                $inPr = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` = '" . $data["order_num"] . "'");

                                                for ($y = 0; $y < $inPr->num_rows; $y++) {
                                                    $data2 = $inPr->fetch_assoc();
                                                    $prs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data2["products_p_id"] . "'");
                                                    $productD = $prs->fetch_assoc();

                                                ?>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="card" onclick="singleProductView(<?php echo $productD['p_id'] ?>);">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <div class="card">
                                                                            <img src="<?php echo $productD['p_img']; ?>" alt="">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-10">
                                                                        <h5 class="card-title"><?php echo $productD["p_title"] ?></h5>
                                                                        <p class="text-secondary card-text">Quantity : <?php echo $data2["qty"] ?></p>
                                                                        <p class="card-text text-warning">Rs. <?php echo $data2["p_tot"] ?></p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php
                                                }


                                                ?>


                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">

                                                    <button class="btn btn-warning rounded-4" onclick="payFromOders('<?php echo $data['order_num'] ?>')"">Pay</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        <?php



                                }
                            }

                        ?>


                    </div>

                </div>


            </div>
            <div class=" tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <?php

                                                                $rs = Database::search("SELECT * FROM `invoice` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `order_status_id` = '2' ORDER BY `date` DESC");

                                                                if ($rs->num_rows == 0) {
                                                                ?>
                                                                    <h4 class="text-center text-secondary mt-4 ">You have no Products to Ship</h4>

                                                                    <?php



                                                                } else {
                                                                    for ($x = 0; $x < $rs->num_rows; $x++) {
                                                                        $data = $rs->fetch_assoc();
                                                                    ?>

                                                                        <a class="" data-bs-toggle="collapse" href="#collapseExample<?php echo $x ?>" role="button" aria-expanded="false" aria-controls="">
                                                                            <div class="card mb-1">

                                                                                <div class="card-body">
                                                                                    <div class="row d-flex align-items-center">
                                                                                        <div class="col-4">
                                                                                            <label for="" class="text-secondary">Order Number :</label>
                                                                                        </div>
                                                                                        <div class="col-4"> <label for="" class="text-secondary">Date :</label></div>
                                                                                        <div class="col-4"> <label for="" class="text-secondary">Price:</label></div>

                                                                                    </div>
                                                                                    <div class="row d-flex align-items-center">
                                                                                        <div class="col-4">
                                                                                            <label for="" class="text-secondary">#<span class="text-warning"><?php echo $data["order_num"] ?></span> </label>
                                                                                        </div>
                                                                                        <div class="col-4"> <label for="" class="text-warning"><?php echo $data["date"] ?></label></div>
                                                                                        <div class="col-4"> <label for="" class="text-warning">Rs. <?php echo $data["total"] ?></label></div>

                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </a>
                                                                        <div class="collapse mb-1" id="collapseExample<?php echo $x ?>">
                                                                            <div class="card card-body">
                                                                                <div class="row">
                                                                                    <?php

                                                                                    $inPr = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` = '" . $data["order_num"] . "'");

                                                                                    for ($y = 0; $y < $inPr->num_rows; $y++) {
                                                                                        $data2 = $inPr->fetch_assoc();
                                                                                        $prs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data2["products_p_id"] . "'");
                                                                                        $productD = $prs->fetch_assoc();

                                                                                    ?>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="card" onclick="singleProductView(<?php echo $productD['p_id'] ?>);">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-2">
                                                                                                            <div class="card">
                                                                                                                <img src="<?php echo $productD['p_img']; ?>" alt="">
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <h5 class="card-title"><?php echo $productD["p_title"] ?></h5>
                                                                                                            <p class="text-secondary card-text">Quantity : <?php echo $data2["qty"] ?></p>
                                                                                                            <p class="card-text text-warning">Rs. <?php echo $data2["p_tot"] ?></p>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    <?php
                                                                                    }


                                                                                    ?>


                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-2 d-flex align-items-center">
                                                                                        <?php
                                                                                         if($data["ad_order_s_ad_o_s"] == 1){
                                                                                            ?>
                                                                                            <h5 class="text-warning fw-lighter"><i>Processing</i></h5>

                                                                                            <?php

                                                                                         }else if($data["ad_order_s_ad_o_s"] == 2){
                                                                                            ?>
                                                                                            <h5 class="text-warning fw-lighter"><i>Shiped</i></h5>
                                                                                            
                                                                                            <?php

                                                                                         }else if($data["ad_order_s_ad_o_s"] == 3){
                                                                                            ?>
                                                                                            <h5 class="text-warning fw-lighter"><i>Completed</i></h5>
                                                                                            <?php
                                                                                             
                                                                                         }else{

                                                                                         }
                                                                                        
                                                                                        
                                                                                        ?>
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-10 d-flex justify-content-end">

                                                                                        <button class="btn btn-warning rounded-4" onclick="viewFromOrders('<?php echo $data['order_num'] ?>')">View</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                <?php



                                                                    }
                                                                }

                                                                ?>


                                                            </div>

                                                        </div>
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <?php

                                                            $rs = Database::search("SELECT * FROM `invoice` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND (`order_status_id` = '3' OR `order_status_id`='4') ORDER BY `date` DESC");

                                                            if ($rs->num_rows == 0) {
                                                            ?>
                                                                <h4 class="text-center text-secondary mt-4 ">No products you had been received</h4>

                                                                <?php



                                                            } else {
                                                                for ($x = 0; $x < $rs->num_rows; $x++) {
                                                                    $data = $rs->fetch_assoc();
                                                                ?>

                                                                    <a class="" data-bs-toggle="collapse" href="#collapseExample<?php echo $x ?>" role="button" aria-expanded="false" aria-controls="">
                                                                        <div class="card mb-1">

                                                                            <div class="card-body">
                                                                                <div class="row d-flex align-items-center">
                                                                                    <div class="col-4">
                                                                                        <label for="" class="text-secondary">Order Number :</label>
                                                                                    </div>
                                                                                    <div class="col-4"> <label for="" class="text-secondary">Date :</label></div>
                                                                                    <div class="col-4"> <label for="" class="text-secondary">Price:</label></div>
                                                                                </div>
                                                                                <div class="row d-flex align-items-center">
                                                                                    <div class="col-4">
                                                                                        <label for="" class="text-secondary">#<span class="text-warning"><?php echo $data["order_num"] ?></span> </label>
                                                                                    </div>
                                                                                    <div class="col-4"> <label for="" class="text-warning"><?php echo $data["date"] ?></label></div>
                                                                                    <div class="col-4"> <label for="" class="text-warning">Rs. <?php echo $data["total"] ?></label></div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </a>
                                                                    <div class="collapse mb-1" id="collapseExample<?php echo $x ?>">
                                                                        <div class="card card-body">
                                                                            <div class="row">
                                                                                <?php

                                                                                $inPr = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` = '" . $data["order_num"] . "'");

                                                                                for ($y = 0; $y < $inPr->num_rows; $y++) {
                                                                                    $data2 = $inPr->fetch_assoc();
                                                                                    $prs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data2["products_p_id"] . "'");
                                                                                    $productD = $prs->fetch_assoc();

                                                                                ?>
                                                                                    <div class="col-lg-6 mb-2">
                                                                                        <div class="card" onclick="singleProductView(<?php echo $productD['p_id'] ?>);">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-2">
                                                                                                        <div class="card">
                                                                                                            <img src="<?php echo $productD['p_img']; ?>" alt="">
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="col-10">
                                                                                                        <h5 class="card-title"><?php echo $productD["p_title"] ?></h5>
                                                                                                        <p class="text-secondary card-text">Quantity : <?php echo $data2["qty"] ?></p>


                                                                                                        <p class="card-text text-warning">Rs. <?php echo $data2["p_tot"] ?></p>






                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                <?php
                                                                                }


                                                                                ?>


                                                                            </div>
                                                                            <div class=" row">
                                                                                <div class="col-12 d-flex justify-content-end">
                                                                                    <button class="btn btn-warning rounded-4" onclick="viewFromOrders('<?php echo $data['order_num'] ?>')">View</button>


                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                            <?php



                                                                }
                                                            }

                                                            ?>


                                                        </div>

                                                    </div>



                                                </div>
                                                <div class=" tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <?php

                                                            $rs = Database::search("SELECT * FROM `invoice` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `order_status_id` = '3'  ORDER BY `date` DESC");

                                                            if ($rs->num_rows == 0) {
                                                            ?>
                                                                <h4 class="text-center text-secondary mt-4 ">You have no Products to Review</h4>

                                                                <?php



                                                            } else {
                                                                for ($x = 0; $x < $rs->num_rows; $x++) {
                                                                    $data = $rs->fetch_assoc();
                                                                ?>

                                                                    <a class="" data-bs-toggle="collapse" href="#collapseExample<?php echo $x ?>" role="button" aria-expanded="false" aria-controls="">
                                                                        <div class="card mb-1">

                                                                            <div class="card-body">
                                                                                <div class="row d-flex align-items-center">
                                                                                    <div class="col-4">
                                                                                        <label for="" class="text-secondary">Order Number :</label>
                                                                                    </div>
                                                                                    <div class="col-4"> <label for="" class="text-secondary">Date :</label></div>
                                                                                    <div class="col-4"> <label for="" class="text-secondary">Price:</label></div>
                                                                                </div>
                                                                                <div class="row d-flex align-items-center">
                                                                                    <div class="col-4">
                                                                                        <label for="" class="text-secondary">#<span class="text-warning"><?php echo $data["order_num"] ?></span> </label>
                                                                                    </div>
                                                                                    <div class="col-4"> <label for="" class="text-warning"><?php echo $data["date"] ?></label></div>
                                                                                    <div class="col-4"> <label for="" class="text-warning">Rs. <?php echo $data["total"] ?></label></div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </a>
                                                                    <div class="collapse mb-1" id="collapseExample<?php echo $x ?>">
                                                                        <div class="card card-body">
                                                                            <div class="row">
                                                                                <?php

                                                                                $inPr = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` = '" . $data["order_num"] . "' AND `rivew_status_rs_id` ='1'");
                                                                                $innum = $inPr->num_rows;
                                                                                if ($innum > 0) {
                                                                                    for ($y = 0; $y < $inPr->num_rows; $y++) {
                                                                                        $data2 = $inPr->fetch_assoc();
                                                                                        $prs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data2["products_p_id"] . "'");
                                                                                        $productD = $prs->fetch_assoc();
                                                                                ?>
                                                                                        <div class="col-lg-6 mb-2">
                                                                                            <div class="card">
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-2">
                                                                                                            <div class="card" onclick="singleProductView(<?php echo $productD['p_id'] ?>);">
                                                                                                                <img src="<?php echo $productD['p_img']; ?>" alt="">
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <div class="col-10">
                                                                                                            <h5 class="card-title"><?php echo $productD["p_title"] ?></h5>
                                                                                                            <p class="text-secondary card-text">Quantity : <?php echo $data2["qty"] ?></p>
                                                                                                            <div class="row">
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                                                                                    <p class="card-text text-warning">Rs. <?php echo $data2["p_tot"] ?></p>
                                                                                                                </div>
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end">
                                                                                                                    <button class="btn btn-warning rounded-4" onclick="productReview('<?php echo $data2['products_p_id'] ?>','<?php echo $data['order_num'] ?>')"">Review</button>

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

                                                                                    Database::iud("UPDATE `invoice` SET `order_status_id` = '4' WHERE `order_num` = '" . $data["order_num"] . "'");
                                                                                }


                                                                                        ?>


                                                                                                                </div>
                                                                                                                <div class=" row">
                                                                                                                        <div class="col-12 d-flex justify-content-end">


                                                                                                                        </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>


                                                                                                <?php



                                                                                            }
                                                                                        }

                                                                                                ?>


                                                                                                    </div>

                                                                                                </div>






                                                                                            </div>
                                                                                        </div>


                                                                            </div>









                                                                            <script src="js/script.js"></script>
                                                                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                                                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
                                                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




                                                                        <?php

                                                                    } else {
                                                                        ?>
                                                                            <script>
                                                                                window.location = "signin.php";
                                                                            </script>
                                                                        <?php
                                                                    }
                                                                        ?>

</body>

</html>