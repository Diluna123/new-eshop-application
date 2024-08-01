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

        .main-sec {
            height: 100vh;
            width: 100%;
            display: flex;

            justify-content: center;
            align-items: center;
            flex-direction: column;


        }

        .btn-1 {
            border-radius: 30px 0 0 30px;
        }

        .btn-2 {
            border-radius: 0 30px 30px 0;
        }
    </style>
</head>

<body>
    <?php
    include "connection.php";
    require 'topnav.php';
    ?>
    <div class="container">
        <div class="row mt-5">
            <label for="" class="form-label text-light"><a href="index.php" class="link-warning text-decoration-none">Home </a>/ My Cart</label>
        </div>
    </div>
    <?php
    $cartRs = Database::search("SELECT * FROM `cart` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "'");
    if ($cartRs->num_rows > 0) {
    ?>
        <div class="container">

            <div class="row mt-5">
                <h3 class="text-light">My Cart</h3>

            </div>
            <div class="row mt-3">
                <div class="col-lg-8 ">
                    <div id="cartItems">
                        <?php
                        for ($e = 0; $e < $cartRs->num_rows; $e++) {
                            $cartData = $cartRs->fetch_assoc();
                            $productRs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $cartData["products_p_id"] . "'");
                            $productData = $productRs->fetch_assoc();
                        ?>
                            <div class="card mb-1 d-grid" style="max-width: 100%; ">
                                <div class="col-12">
                                    <input type="checkbox" id="itemCheck<?php echo $e;?>"<?php if($cartData["cart_s"] == 1){echo "checked";}?> onclick="updateCartStatus(<?php echo $cartData['idcart']; ?>, <?php echo $e; ?>)"  class="form-check-input position-absolute mt-2 ms-2  ">
                                    <div class="row g-0">

                                        <div class="col-md-3 col-lg-4 col-sm-12 col-12 p-4">


                                            <div class="card">
                                                <img src="<?php echo $productData["p_img"]; ?>" class=" rounded-start" height="180px" style="object-fit: contain;" alt="...">

                                            </div>

                                        </div>
                                        <div class="col-md-9 col-lg-8 col-sm-12 col-12">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <h5 class="card-title"><?php echo $productData["p_title"]; ?></h5>

                                                    </div>
                                                    <div class="col-3 d-flex justify-content-end">
                                                        <i class="fas fa-trash text-danger" style="cursor: pointer;" onclick="deleteCart(<?php echo $cartData['idcart']; ?>)"></i>
                                                    </div>
                                                </div>

                                                <p class="card-text"><?php echo $productData["p_dis"]; ?></p>
                                                <?php
                                                if ($productData["qty"] <= 5) {
                                                ?>
                                                    <p class="card-text text-danger">Only( <?php echo $productData["qty"]; ?> ) items In Our Stock</p>

                                                <?php
                                                }
                                                ?>

                                                <div class="row mb-3 col-lg-4 col-md-4 col-sm-5 col-5">
                                                    <label for="" class="form-label">Qty :</label>
                                                    <div class="input-group col-lg-5">
                                                        <button class="btn btn-sm btn-secondary btn-1 " onclick="decrement(<?php echo $e; ?>);"><i class="fas fa-minus"></i></button>

                                                        <input type="text" class="form-control form-control-sm text-center  " disabled id="qtyInput<?php echo $e; ?>" value="<?php echo $cartData["cart_qty"]; ?>">
                                                        <button class="btn btn-sm btn-secondary btn-2" onclick="increment(<?php echo $e; ?>,<?php echo $productData['qty']; ?>);"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="card-text text-warning">Rs. <?php echo $productData["price"]; ?></p>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <button class="btn btn-sm btn-warning rounded-4" onclick="updateQty(<?php echo $cartData['idcart']; ?>, <?php echo $e; ?>);">Checkout</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        <?php


                        }



                        ?>

                    </div>
                </div>
                <div class="col-lg-4  h-50">
                    <div class="card h-100n mb-5" id="checkoutTotal">
                        <div class="content p-3">
                            <?php
                            $orderNum = uniqid() ;
                            ?>

                            <h4 class="text-light fw-light mb-3">Item Checkout <span class="text-secondary">#<?php echo $orderNum;?></span> </h4>
                            <label for="" class="form-label">Address :</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                                    <div class="card border-warning">



                                        <div class="card-text text-warning">
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                                                <i class="fas fa-pen text-warning "></i>
                                                <span class="visually-hidden">unread messages</span>
                                            </span>

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
                                                    <?php echo $data["address"]; ?>
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
                                            <div class="col-6 text-secondary">Item name</div>
                                            <div class="col-2 text-secondary d-flex justify-content-center">Qty</div>
                                            <div class="col-4 d-flex justify-content-end text-secondary">Price</div>

                                        </div>


                                        <?php
                                        $cartRs2 = Database::search("SELECT * FROM `cart` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `cart_s` = '1'");
                                        $fultot = 0;
                                        for ($f = 0; $f < $cartRs2->num_rows; $f++) {
                                            $cartData2 = $cartRs2->fetch_assoc();

                                            $productRs2 = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $cartData2["products_p_id"] . "'");
                                            $productData2 = $productRs2->fetch_assoc();

                                        ?>
                                            <div class="row ">
                                                <div class="col-6 "><span class="text-secondary"><?php echo $f + 1; ?>.</span> <?php echo $productData2["p_title"]; ?></div>
                                                <div class="col-2 d-flex justify-content-center"><?php echo $cartData2["cart_qty"]; ?></div>
                                                <?php

                                                $total = $productData2["price"] * $cartData2["cart_qty"];

                                                $fultot = $fultot + $total;

                                                ?>
                                                <div class="col-4 d-flex justify-content-end ">Rs. <?php echo $total; ?></div>

                                            </div>



                                        <?php

                                        }

                                        ?>




                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="row p-2">
                                        <div class="col-6 text-secondary">Total Items :</div>
                                        <div class="col-6 d-flex justify-content-end"><?php echo $cartRs2->num_rows; ?> &nbsp;<span class="text-secondary"> items</span> </div>

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
                                    <div class="col-12  d-flex justify-content-end">
                                        <button class="btn btn-warning rounded-5" onclick="payNow('<?php echo $orderNum;?>', <?php echo $fultot; ?> );">Pay Now </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>



                </div>




            <?php

        } else {
            ?>
                <div class="main-sec">
                    <h1 class="text-secondary" style="font-size: 100px;"><i class="fas fa-cart-shopping"></i></h1>
                    <h1 class="text-secondary text-center mb-3">No Product have in your Cart</h1>
                    <a href="index.php"><button class="btn btn-warning rounded-4">Continue Shopping</button></a>

                </div>


            <?php


        }




            ?>












            <script src="js/script.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>