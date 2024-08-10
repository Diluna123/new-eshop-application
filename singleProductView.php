<?php

include('connection.php');


$pid = $_GET["pid"];


$productRs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $pid . "'");
$productData = $productRs->fetch_assoc();






?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        body {
            background-color: black;
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
    <?php include 'topnav.php'; ?>


    <div class="container" id="">
        
        <div class="row mt-5">
            <div class="col-lg-12">
            <i class="fa-regular fa-circle-left fa-2x" onclick="window.history.back();"></i>


            </div>
            <div class="col-lg-5 mt-5">
                <div class="card rounded-1">

                    <img src="<?php echo $productData["p_img"]; ?>" class="rounded-1" alt="">


                </div>
            </div>
            <div class="col-lg-7 mt-5">
                <h3 class="text-light fw-light"><?php echo $productData["p_title"]; ?></h3>
                <p class="card-text text-secondary mb-4"><?php echo $productData["p_dis"]; ?></p>
                <h2 class="text-warning fw-lighter mb-4">Rs. <?php echo $productData["price"]; ?>.00</h2>
                <label for="" class="form-label text-secondary">Qty :</label>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="input-group col-lg-5">
                            <button class="btn btn-sm btn-secondary btn-1 rounded-5 me-2" onclick="minus();"><i class="fas fa-minus"></i></button>

                            <input type="text" class="form-control form-control-sm text-center border-0 rounded-5" id="cartInputQty" disabled id="qtyInput" value="1">
                            <button class="btn btn-sm btn-secondary btn-2 rounded-5 ms-2" onclick="plus(<?php echo $productData['qty']; ?>);"><i class="fas fa-plus"></i></button>
                        </div>

                    </div>
                </div>

                <label for="" class="form-label text-secondary">Shipping :</label>
                <div class="text-secondary mb-4">
                    <div class="row">
                        <div class="col-12">

                            We are committed to delivering your order promptly and efficiently. Please review our shipping details below:
                            <ul>
                                <li><b>Shipping Cost: </b>Rs. 300 for island-wide delivery.</li>
                                <li><b>Delivery Time:</b> Our standard delivery time is within 7 to 10 days for all island-wide shipments.</li>
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 d-grid mb-md-2 mb-lg-0 mb-sm-2 mb-2">

                        <button class="btn  btn-warning rounded-4" onclick="addToCartmain('<?php echo $pid; ?>')">Add To Cart</button>

                    </div>
                    <div class="col-lg-6 d-grid">

                        <button class="btn btn-outline-warning rounded-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" onclick="buyNow(<?php echo $pid; ?>);">Buy Now</button>

                    </div>
                </div>



            </div>

        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <h3 class="text-light fw-light">Product Reviews</h3>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                        <div class="card mt-1">
                            <div class="card-body">
                                <?php
                                $rrs = Database::search("SELECT * FROM `reviews`  JOIN `cutomer_details` ON `reviews`.`cutomer_details_id` = `cutomer_details`.`id` WHERE `reviews`.`products_p_id` = '" . $pid . "'");
                                $rc = $rrs->num_rows;

                                if ($rc == 0) {

                                    echo "No reviews yet";
                                } else {

                                    for ($i = 0; $i < $rc; $i++) {
                                        $rdata = $rrs->fetch_assoc();
                                ?>
                                        <div class="card p-2 mb-2">

                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="card border-0">
                                                        <img src="pro_img/pro-sample.png" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <h5 class="text-warning"><?php echo $rdata["fname"]; ?> ****</h5>
                                                    <p class="text-secondary"><?php echo $rdata["comment"]; ?></p>
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>

                </div>


            </div>
            <div class="col-lg-6">
                <h3 class="text-light fw-light">Questions about this Product</h3>
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>
        <!-- add cart modal begin -->
        <div class="modal fade" tabindex="-1" id="cartModal">
            <div class="modal-dialog modal-dialog-centered" id="cartcontent">

            </div>
        </div>
        <!-- add cart modal end -->

        <!-- offcanvs buy now -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Buy Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="buyNowContent">




            </div>
        </div>
    </div>






    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>