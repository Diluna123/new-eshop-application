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
    include "connection.php";
    session_start();

    if (isset($_SESSION["user"])) {
    ?>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <div class="card col-lg-6 col-md-8 col-sm-12 col-12 border-black">
                    <div class="card-body">
                        <div class="row  text-center mb-3">
                            <i class="fa-regular fa-circle-check fa-3x mb-3 mt-5 text-success"></i>
                            <div class="row ">
                                <div class="col-12 d-flex justify-content-center">

                                    <img src="logo2.png" alt="" width="150px" height="auto">
                                </div>
                            </div>
                            <h3 class="text-center text-warning">Thank You For Your Order</h3>
                        </div>

                        <h5 class="card-title text-light fw-light mb-4">Order Number : <?php echo $_SESSION["orderNum"]; ?></h5>

                        <h6 class="text-secondary mb-2">Items</h6>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row text-secondary">
                                    <div class="col-6">Products</div>
                                    <div class="col-3 d-flex justify-content-center">Qty</div>
                                    <div class="col-3 d-flex justify-content-end">Price</div>
                                </div>
                                <?php

                                $rs = Database::search("SELECT * FROM `invoice_items` JOIN `invoice` ON `invoice_items`.`invoice_order_num` = `invoice`.`order_num` WHERE `invoice_items`.`invoice_order_num` = '" . $_SESSION["orderNum"] . "'");

                                $n = $rs->num_rows;

                                for ($i = 0; $i < $n; $i++) {
                                    $data = $rs->fetch_assoc();
                                    $prs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data['products_p_id'] . "'");
                                    $prData = $prs->fetch_assoc();
                                ?>
                                    <div class="row">
                                        <div class="col-6"><?php echo $i + 1; ?>. <?php echo $prData["p_title"] ?></div>
                                        <div class="col-3 d-flex justify-content-center"><?php echo $data["qty"] ?></div>
                                        <div class="col-3 d-flex justify-content-end">Rs. <?php echo $data["p_tot"] ?></div>
                                    </div>


                                <?php
                                }


                                ?>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row text-secondary">
                                    <div class="col-6">
                                        Delevery Fees
                                    </div>
                                    <div class="col-6 text-secondary d-flex justify-content-end">
                                        Rs. 300
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card  border-warning mb-4">
                            <div class="card-body text-warning">
                                <div class="row ">
                                    <div class="col-6">
                                        Total
                                    </div>
                                    <div class="col-6  d-flex justify-content-end">
                                        Rs. <?php echo $data["total"]; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-warning rounded-4" onclick="window.location.href = 'index.php'">Continue Shopping</button>
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





    <?php


    } else {

    ?>
        <script>
            window.location.href = "signin.php";
        </script>
    <?php
    }

    ?>
    <div class="container">

</body>

</html>