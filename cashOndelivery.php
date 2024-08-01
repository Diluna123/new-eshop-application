<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chash On delevery</title>
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
    <?php require 'topnav.php'; ?>

    <div class="container">
        <div class="row mt-5">
            <a href="paymentOptions.php" class="text-decoration-none"><i class="fa-solid fa-circle-arrow-left fa-2x text-secondary "></i></a>
        </div>
        <div class="row mt-4">
            <div class="card h-100n mb-5" id="checkoutTotal">
                <div class="content p-3">
                    <?php
                    include 'connection.php';
                    $orderNum = "BL42/"  . "00" . "1";
                    ?>

                    <h4 class="text-light fw-light mb-3">Item Checkout <span class="text-secondary">#<?php echo $_SESSION['orderNum']; ?></span> </h4>
                    <label for="" class="form-label">Address :</label>
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                            <div class="card border-warning">



                                <div class="card-text text-warning">


                                    <?php
                                    $adRs = Database::search("SELECT * FROM `ad_book` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "'");
                                    if ($adRs->num_rows == 0) {
                                    ?>
                                        <div class="p-3 text-center">
                                            <label for="" class="form-label">Add Your Home Address To before Order Products</label>
                                            <a href="user-profile.php" class="btn btn-warning rounded-5 btn-sm">Go Profile</a>

                                        </div>



                                    <?php
                                    } else {
                                        $data = $adRs->fetch_assoc();
                                    ?>
                                        <div class="p-3">
                                            <i class="fas fa-map-marker-alt"></i><br>
                                            <?php echo $data["address"]; ?><br>
                                            <?php echo $data["city"]; ?><br>
                                            <?php echo $data["zip"]; ?>

                                        </div>




                                    <?php



                                    }



                                    ?>


                                </div>


                            </div>

                        </div>

                    </div>
                    <hr>
                    <div>
                        <label for="" class="form-label">Total Amount :</label>
                        <div class="card mb-2">
                            <div class="p-2">
                                <div class="row mb-3">
                                    <div class="col-1 text-secondary"></div>
                                    <div class="col-6 text-secondary">Item name</div>

                                    <div class="col-2 text-secondary d-flex justify-content-center">Qty</div>
                                    <div class="col-3 d-flex justify-content-end text-secondary">Price</div>

                                </div>


                                <?php
                                $inrs = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` = '" . $_SESSION["orderNum"] . "'");
                                $fultot = 0;
                                for ($f = 0; $f < $inrs->num_rows; $f++) {
                                    $cartData2 = $inrs->fetch_assoc();

                                    $productRs2 = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $cartData2["products_p_id"] . "'");
                                    $productData2 = $productRs2->fetch_assoc();

                                ?>
                                    <div class="row ">
                                        <div class="col-1 pb-2">
                                            <div class="card ">

                                                <img src="<?php echo $productData2["p_img"]; ?>" alt="">
                                            </div>


                                        </div>
                                        <div class="col-6 "><span class="text-secondary"><?php echo $f + 1; ?>.</span> <?php echo $productData2["p_title"]; ?></div>

                                        <div class="col-2  d-flex justify-content-center"><?php echo $cartData2["qty"]; ?></div>
                                        <?php

                                        $total = $productData2["price"] * $cartData2["qty"];

                                        $fultot = $fultot + $total;

                                        ?>
                                        <div class="col-3 d-flex justify-content-end ">Rs. <?php echo $total; ?></div>

                                    </div>



                                <?php

                                }

                                ?>




                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row p-2">
                                <div class="col-6 text-secondary">Total Items :</div>
                                <div class="col-6 d-flex justify-content-end"><?php echo $inrs->num_rows; ?> &nbsp;<span class="text-secondary"> items</span> </div>

                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row p-2">
                                <div class="col-6 text-secondary">Delevery Fees :</div>
                                <div class="col-6 d-flex justify-content-end text-secondary">Rs. 300</div>

                            </div>
                        </div>
                        <div class="card border-warning mb-3">
                            <div class="row p-2">
                                <div class="col-6 text-warning">Totel Ammount :</div>
                                <div class="col-6 d-flex justify-content-end text-warning">Rs. <span id="totAmmount"><?php echo $fultot + 300; ?></span> </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="row">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="text-secondary">The products will be delever within 7 days</div>


                                </div>
                                <div class="col-lg-6 mt-md-3 mt-sm-3 mt-3 mt-lg-0 d-flex justify-content-end justify-content-md-center justify-content-sm-center justify-content-lg-end">
                                    <?php

                                    $payrs = Database::search("SELECT * FROM `invoice` WHERE `order_num` = '" . $_SESSION["orderNum"] . "' AND `pay_method_mid` = '1'");
                                    if ($payrs->num_rows == 1) {
                                    ?>
                                        <button class="btn btn-warning rounded-5" onclick="orderConfirm();">confirm Order</button>

                                    <?php

                                    }else{
                                        ?><button class="btn btn-warning rounded-5" onclick="">Countinue Payment</button><?php

                                    }

                                    ?>

                                </div>
                            </div>

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
</body>

</html>