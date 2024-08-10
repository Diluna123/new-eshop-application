<?php
include 'connection.php';
$pid = $_GET["pid"];
$onum = $_GET["onum"];

$ors = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
$data = $ors->fetch_assoc();




?>






<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: black;
        }

        .pro-c {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <?php

    require 'topnav.php';

    if (isset($_SESSION["user"])) {
    ?>
        <div class="container">
            <div class="row mt-5 mb-3">

                <label for="" class="form-label text-light"><a href="index.php" class="link-warning text-decoration-none">Home </a>/ Product Review</label>
            </div>
            <div class="row">
                <h3 class="text-light fw-light">Product Review</h3>
            </div>

            <div class="row mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                                <div class="card">

                                    <img src="<?php echo $data["p_img"] ?>" class="p-2" alt="">


                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-8 col-8">
                                <div class="card-title">
                                    <h4><?php echo $data["p_title"] ?></h4>
                                </div>
                                <div class="card-text text-secondary col-lg-6 col-md-8 col-sm-12 col-12"><?php echo $data["p_dis"] ?></div>
                                <div class="mt-3">
                                    <h4 class="text-warning">Rs. <?php echo $data["price"] ?>.00</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <h3 class="text-light fw-light">Customer Reviews</h3>
            </div>
            <div class="row mt-2">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $rrs = Database::search("SELECT * FROM `reviews` WHERE `products_p_id` = '$pid' AND `cutomer_details_id` ='" . $_SESSION['user']['id'] . "'");

                        if ($rrs->num_rows == 0) {

                            echo "No Reviews yet";
                        } else {

                            for ($i = 0; $i < $rrs->num_rows; $i++) {
                                $rdata = $rrs->fetch_assoc();
                        ?>
                                <div class="card mb-2" id="rcard">
                                    <div class="card-body">


                                        <div class="pro-c">
                                            <?php
                                            $rs = Database::search("SELECT * FROM `pr_img` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "'");
                                            if ($rs->num_rows == 0) {
                                            ?>
                                                <img src="pro_img/pro-sample.png" width="30px" height="30px" alt="" style="object-fit: cover; border-radius: 50%;">

                                            <?php

                                            } else {
                                                $data = $rs->fetch_assoc();
                                            ?>


                                                <img src="<?php echo $data["img"]; ?>" width="30px" height="30px" alt="" style="object-fit: cover; border-radius: 50%;">
                                            <?php
                                            }




                                            ?>
                                        </div>


                                        <div class="crad-text">
                                            <h5 class="text-warning fw-light"><?php echo $_SESSION["user"]["fname"] ?> ******</h5>
                                        </div>
                                        <div class="card-text text-secondary"><?php echo $rdata['comment'] ?></div>
                                    </div>
                                </div>










                        <?php
                            }
                        }


                        ?>


                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <?php
                $pprs = Database::search("SELECT * FROM `invoice_items` WHERE `invoice_order_num` ='$onum' AND`products_p_id` = '$pid' AND `rivew_status_rs_id` = '1'");

                if ($pprs->num_rows == 0) {
                    ?>
                    <div class="row mb-5">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn rounded-4 btn-warning" onclick="window.location.href = 'myOrders.php'">Back to Orders</button>
                        </div>
                    </div>
                    
                    <?php
                } else {
                ?>
                    <div class="card" id="comment-card">
                        <div class="card-body">
                            <textarea name="" id="review" class="form-control" placeholder="Your Review" rows="5"></textarea>
                            <div class="row mt-2">
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-warning"><i class="fa-regular fa-paper-plane" onclick="addReview(<?php echo $pid ?>, '<?php echo $onum ?>');"></i></button>

                                </div>
                            </div>

                        </div>
                    </div>



                <?php
                }


                ?>

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

</body>

</html>