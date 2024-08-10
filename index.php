<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<?php
include 'connection.php';
session_start();


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black 42</title>
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/kute.js@2.2.4/dist/kute.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300..700;1,300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Licorice&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jura:wght@300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap');

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-link {
            font-size: 15px;
        }

        body {
            background-color: #1C1C1C;
        }



        .hero-section p {
            font-size: 18px;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-family: 'Nobile';
            letter-spacing: 5px;
            font-weight: 200;
        }

        .hero-section h2 {
            font-size: 1rem;
            font-family: 'Licorice';
        }

        .new-collection h2 {
            font-size: 3rem;
            font-family: 'Licorice';
            color: white;

        }

        .under-line-m {
            width: 100px;
            height: 1px;
            background-color: #FFC700;
        }

        .bg {
            background-image: linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, 0.5)), url("img/bg.jpg");
            background-position: center;
            background-size: cover;
        }

        .b-h {
            height: 30rem;
            border-radius: 20px;

        }

        .shoe-h3 {
            font-family: 'Jura';
        }

        .offer-tag {
            font-size: 4rem;
            font-family: 'Darker Grotesque';
        }

        .car-body {
            background-color: transparent;
            backdrop-filter: blur(5px);

            position: absolute;
            transform: translate(-10px, 00px);

            width: 97%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: end;
            opacity: 0;
            transition: .3s;
            border-radius: 20px;
        }

        .card:hover .car-body {
            transform: translate(-10px, -50px);


            opacity: 1;
        }

        .card:hover {
            transition: .3s;
            box-shadow:
                1.2px 0.6px 2.2px rgba(0, 0, 0, 0.02),
                2.9px 1.4px 5.3px rgba(0, 0, 0, 0.028),
                5.4px 2.6px 10px rgba(0, 0, 0, 0.035),
                9.6px 4.7px 17.9px rgba(0, 0, 0, 0.042),
                18px 8.8px 33.4px rgba(0, 0, 0, 0.05),
                43px 21px 80px rgba(0, 0, 0, 0.07);
        }

        .card:hover img {
            transition: ease-out .3s;

        }

        .addH {
            font-size: 20px;
            transition: .3s;
            cursor: pointer;
        }

        .addH:hover {
            color: #e0144e;
        }

        .addH:checked {
            color: #e0144e;

        }

        @media (min-width: 768px) {
            .hero-section h1 {
                font-size: 4rem;
            }

            .offer-tag {
                font-size: 4rem;
            }


            .hero-section h2 {
                font-size: 1rem;
            }
        }

        @media (min-width: 1200px) {
            .hero-section h1 {
                font-size: 8rem;
            }

            .offer-tag {
                font-size: 5rem;
            }

            .hero-section h2 {
                font-size: 2rem;
            }
        }

        .product-card {
            border: none;
            transition: box-shadow .3s;
            border-radius: 10px;
        }

        .product-card:hover {
            box-shadow: 1.2px 0.6px 2.2px rgba(0, 0, 0, 0.02), 2.9px 1.4px 5.3px rgba(0, 0, 0, 0.028), 5.4px 2.6px 10px rgba(0, 0, 0, 0.035), 9.6px 4.7px 17.9px rgba(0, 0, 0, 0.042), 18px 8.8px 33.4px rgba(0, 0, 0, 0.05), 43px 21px 80px rgba(0, 0, 0, 0.07);
        }

        .product-card img {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            transition: transform .3s;

        }

        .product-card:hover img {

            transform: scale(1.05);
        }

        .product-card .card-body {
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            opacity: 0;
            transition: opacity .3s;
            position: absolute;
            bottom: 0;
            top: 0;
            width: 100%;
            padding: 20px;
            text-align: center;
            color: white;


        }




        .product-card:hover .card-body {
            opacity: 1;
        }




        .product-card .card-title {
            font-family: 'Jura', sans-serif;
        }

        .product-card .card-text {
            font-family: 'Darker Grotesque', sans-serif;
        }

        .product-card .price {
            font-size: 1.5rem;
            color: #FFC700;
        }

        .product-card .btn-warning {
            border-radius: 20px;
        }

        .slick-dots li button:before {
            color: #FFC700;
            /* Dot color */
        }

        .slick-dots li.slick-active button:before {
            opacity: 1;
            color: #FFD700;
            /* Active dot color */
        }

        .slick-slide {
            padding: 10px;
        }

        .btn1 {
            border-radius: 30px 0 0 30px;
        }

        .btn2 {
            border-radius: 0 30px 30px 0;
        }

        /* Add more styles as needed */
    </style>
</head>

<body>

    <!-- nav bar over -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">B<span class="text-warning">L</span>ACK<span class="text-warning"> 4</span>2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php

                    if (isset($_SESSION["user"])) {
                        $data = $_SESSION["user"];
                    ?>
                        <li class="nav-item dropdown">
                            <h5><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome ! <span class="text-warning"> <?php echo $data["fname"];
                                                                            ?></span>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="user-profile.php">My Profile</a></li>
                                    <li><a class="dropdown-item" href="watchList.php">Watchlist</a></li>
                                    <li><a class="dropdown-item" href="cart.php">My Cart</a></li>
                                    <li><a class="dropdown-item" href="myOrders.php">My Orders</a></li>
                                    <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                                    <li onclick="signOut();"><a class="dropdown-item" class="link-warning" href="#">Sign out</a></li>
                                </ul>
                            </h5>
                        </li>




                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Login or Register</a>
                        </li>


                    <?php



                    }


                    ?>


                </ul>
            </div>
        </div>
    </nav>
    <!-- <div class="container-fluid d-flex float-start">
        <div class="card mt-2  col-md-12 col-lg-2 col-sm-12 col-12">
            <div class="card-header">
                Advanced Search
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="searchCategory" class="form-label">Category</label>
                        <select class="form-select" id="searchCategory">
                            <option selected>Choose...</option>
                            <option value="1">Category 1</option>
                            <option value="2">Category 2</option>
                            <option value="3">Category 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="searchPriceRange" class="form-label">Price Range</label>
                        <input type="range" class="form-range" id="searchPriceRange">
                    </div>
                    <div class="mb-3">
                        <label for="searchRating" class="form-label">Rating</label>
                        <select class="form-select" id="searchRating">
                            <option selected>Choose...</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <section class="herosec container">


        <div id="carouselExampleFade" class="carousel slide carousel-fade mt-2 mb-5" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active" >
                    <img src="img/slid2.jpg" height="550px" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/slid1.png" class="d-block w-100 " height="550px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/slid3.jpg" class="d-block w-100 " height="550px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/slid4.jpg" class="d-block w-100 " height="550px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>



    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8 col-sm-12 d-flex mt-1">
                <div class="input-group   ">

                    <input type="text" class="form-control form-control-sm" id="search" placeholder="Search Products">
                    <a href="#items"><button class="btn btn-sm btn-warning" onclick="searchProductsIndex();"><i class="fa-solid fa-magnifying-glass"></i></button></a>
                </div>
            </div>
        </div>
        <section class="new-collection vh-95 mb-5">
            <div class="row mb-5">
                <h2 class="mt-5">New Collection</h2>
                <div class="under-line-m"></div>
            </div>


            <div class="card p-3 h-100" style="  background-color: #404040; border-radius: 10px;">

                <div class="carousel" id="productCarousel">
                    <?php
                    $newRs = Database::search("SELECT * FROM `products` WHERE `status_s_id` = '1' ORDER BY `p_id` DESC LIMIT 5");

                    for ($i = 0; $i < 5; $i++) {
                        $newData = $newRs->fetch_assoc();
                    ?>
                        <div class="col">
                            <div class="card product-card" onclick="singleProductView(<?php echo $newData['p_id'] ?>);">
                                <img src="<?php echo $newData["p_img"]; ?>" class="card-img-top" alt="Product Image">
                                <div class="body2 card-body">
                                    <h5 class="card-title mt-2 mb-4"><?php echo $newData["p_title"]; ?></h5>
                                    <p class=" mt-0"><span class="badge bg-secondary">New</span></p>
                                    <p class="price mt-0">Rs. <?php echo $newData["price"]; ?></p>
                                    <a class="btn btn-warning mt-0" onclick="addToCart(<?php echo $newData['p_id']; ?>)">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>



            <!-- <div class="row p-4">
                <div class="b-h col-lg-4 me-5 bg-secondary">

                </div>
                <div class="b-h col-lg-7 bg-warning mt-lg-0 mt-md-2 mt-2 mt-sm-2">
                    <div class="row">
                        <div class="col-5 d-flex justify-content-center align-content-center">
                            <img src="img/shoe1.png" class="mt-5" width="auto" height="400px" alt="">

                        </div>
                        <div class="col-7 mt-5 ">
                            <h3 class="shoe-h3 mb-5">Men' s Shoe <br>Collection.</h3>
                            <h1 class="mt-5 offer-tag">-40% OFF</h1>

                            <div class="mt-5">
                                <button class="btn rounded-4 btn-dark mt-4">Discover Now</button>
                            </div>
                        </div>



                    </div>




                </div>

            </div> -->






        </section>
        <section class="items" id="items">
            <div class="mt-5 mb-5">

                <div class="row row-cols-1 row-cols-md-4 g-4" id="searchResult">
                    <?php
                    $prs = Database::search("SELECT * FROM `products` WHERE `status_s_id` = '1'");
                    if ($prs->num_rows > 0) {
                        for ($i = 0; $i < $prs->num_rows; $i++) {

                            $pro = $prs->fetch_assoc();
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
                                            <a class="btn btn-warning">Add to Watchlist</a>


                                        <?php


                                        } else if ($qty <= 5) {
                                        ?>
                                            <p class="card-text"><?php echo $pro["p_dis"] ?></p>

                                            <span class=" text-danger ">Only (<?php echo $qty ?>) items left</span>
                                            <h3 class="card-text text-warning">Rs. <?php echo $pro["price"] ?></h3>
                                            <a class="btn btn-warning" onclick="addToCart(<?php echo $pro['p_id']; ?>)">Add to Cart</a>
                                        <?php

                                        } else {
                                        ?>
                                            <p class="card-text"><?php echo $pro["p_dis"] ?></p>
                                            <h3 class="card-text text-warning">Rs. <?php echo $pro["price"] ?></h3>
                                            <a class="btn btn-warning" onclick="addToCart(<?php echo $pro['p_id']; ?>)">Add to Cart</a>



                                        <?php
                                        }


                                        ?>





                                    </div>










                                </div>
                            </div>











                    <?php
                        }
                    } else {
                    }


                    ?>




                </div>


            </div>

        </section>







    </div>
    <!-- add cart modal begin -->
    <div class="modal fade" tabindex="-1" id="cartModal">
        <div class="modal-dialog modal-dialog-centered" id="cartcontent">

        </div>
    </div>
    <!-- add cart modal end -->

    <div>
        <?php require 'footer.php'; ?>
    </div>




    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#productCarousel').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                draggable: true,
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>