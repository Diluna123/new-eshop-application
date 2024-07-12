<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black 42</title>
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
    <section class="hero-section bg">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">B<span class="text-warning">L</span>ACK<span class="text-warning"> 4</span>2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row vh-100 hero-section align-items-center ">
                <div class="col-12 text-center">
                    <h1 class="text-white">Black 42</h1>
                    <h2 class="text-white">e are thrilled to have you here at Black 42, your premier destination for all things costumes. Whether you're gearing up for a themed party, preparing for a special event, or simply looking to add some fun and creativity to your wardrobe, you've come to the right place!</h2>
                    <div>
                        <button class="btn rounded-4 btn-warning mt-4 col-lg-2">Explore</button>
                    </div>
                </div>
            </div>


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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>