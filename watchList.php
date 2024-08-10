<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<?php include 'connection.php';


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Watchlist</title>
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

        .product-sec {
            height: 100vh;
            width: 100%;
            display: flex;

        }
    </style>
</head>

<body>
    <?php require 'topnav.php';

    if (isset($_SESSION["user"])) {

    ?>
        <div class="container">
            <div class="row mt-5">
                <label for="" class="form-label text-light"><a href="index.php" class="link-warning text-decoration-none">Home </a>/ Watchlist</label>
            </div>
        </div>

        <?php

        $rs = Database::search("SELECT * FROM `watchlist` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "'");

        if ($rs->num_rows > 0) {

        ?>
            <section class="product-sec">
                <div class="container">
                    <div class="mt-3">
                        <div class="row row-cols-1 row-cols-md-5 g-4">
                            <?php
                            for ($i = 0; $i < $rs->num_rows; $i++) {
                                $data = $rs->fetch_assoc();

                                $product = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data["products_p_id"] . "'");
                                $productData = $product->fetch_assoc();
                            ?>
                                <div class="col">
                                    <div class="card">
                                        <img src="<?php echo $productData["p_img"] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $productData["p_title"] ?></h5>
                                            <p class="card-text"><?php echo $productData["p_dis"] ?></p>
                                            <h3>Rs.<?php echo $productData["price"] ?>/=</h3>
                                            <div class="row ps-2 pe-2">

                                                <button class="btn btn-sm btn-outline-danger rounded-4">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            <?php

                            }

                            ?>


                        </div>
                    </div>




                </div>



            </section>




        <?php



        } else {
        ?>
            <section class="main-sec">
                <h1 class="text-secondary" style="font-size: 100px;"><i class="fas fa-cart-shopping"></i></h1>
                <h1 class="text-secondary text-center mb-3">No Product have in your Watchlist</h1>
                <a href="index.php"><button class="btn btn-warning rounded-4">Continue Shopping</button></a>

            </section>










        <?php
        }





        ?>














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
            window.location = "index.php";
        </script>
    <?php
    }






    ?>

</body>

</html>