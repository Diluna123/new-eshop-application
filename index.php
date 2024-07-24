<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<?php
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
                                    <li><a class="dropdown-item" href="#">Watchlist</a></li>
                                    <li><a class="dropdown-item" href="#">My Cart</a></li>
                                    <li><a class="dropdown-item" href="#">My Orders</a></li>
                                    <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                                    <li onclick="signOut();"><a class="dropdown-item" class="link-warning" href="#" >Sign out</a></li>
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
    <section class="herosec container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade mt-5 col-12">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://i0.wp.com/grupnexus.com/wp-content/uploads/2020/03/eshop-slider-cat.jpg?fit=1920%2C768&ssl=1" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://hkairportshop.com/media/wysiwyg/Kiehls/Carousel-banner/3a1_Homepage_Carousel-Banner_pc_EN_3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://hkairportshop.com/media/wysiwyg/clinique/en/CL22_TTDO_Duo_Lab_HKIA_BTQ_CarouselRotatingBanner_Desktop_1920x768px_EN.jpg" class="d-block w-100" alt="...">
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
        <section class="new-collection vh-100 mb-5">
            <div class="row mb-5">
                <h2 class="mt-5">New Collection</h2>
                <div class="under-line-m"></div>
            </div>
            <div class="row p-4">
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
            </div>





        </section>

        <section class="item-section vh-100 mt-5">
            <h1 class="text-light">Recomended Items</h1>



        </section>




    </div>


    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>