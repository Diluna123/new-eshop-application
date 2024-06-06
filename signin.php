<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black 42 | Sign In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Teachers:ital,wght@0,400..800;1,400..800&display=swap');

        * {
            font-family: 'Teachers';
        }

        body {
            overflow: hidden;
        }

        h3 {
            font-family: 'Teachers';
        }

        .container2 {
            --uib-size: 40px;
            --uib-color: #FFC700;
            --uib-speed: 1.3s;
            --uib-dot-size: 25%;
            position: relative;
            display: inline-block;
            height: var(--uib-size);
            width: var(--uib-size);
            animation: spin var(--uib-speed) infinite linear;
        }

        .dot {
            position: absolute;
            left: calc(50% - var(--uib-dot-size) / 2);
            height: 100%;
            width: var(--uib-dot-size);
        }

        .dot:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 0%;
            width: 100%;
            padding-bottom: 100%;
            background-color: var(--uib-color);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .dot:nth-child(1) {
            transform: rotate(120deg);
        }

        .dot:nth-child(1)::after {
            animation: wobble var(--uib-speed) infinite ease-in-out;
        }

        .dot:nth-child(2) {
            transform: rotate(-120deg);
        }

        .dot:nth-child(2)::after {
            animation: wobble var(--uib-speed) infinite ease-in-out;
        }

        .dot:nth-child(3)::after {
            animation: wobble var(--uib-speed) infinite ease-in-out;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes wobble {

            0%,
            100% {
                transform: translateY(0%);
            }

            50% {
                transform: translateY(65%);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <!-- Sign In Section -->
            <div class="col-10 col-lg-4 signin" id="signin">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Sign In</h3>
                    <?php

                    $email = "";
                    $pw = "";

                    if (isset($_COOKIE["email"])) {
                        $email = $_COOKIE["email"];
                    }
                    if (isset($_COOKIE["password"])) {
                        $pw = $_COOKIE["password"];
                    }


                    ?>


                    <label for="" class="form-label">E mail :</label>
                    <input class="form-control border-warning mb-3" type="email" name="" id="l-email" value="<?php echo $email; ?>" placeholder="E-mail" onclick="hideAlert();">

                    <label for="" class="form-label">Password :</label>
                    <input class="form-control border-warning mb-3" type="password" name="" id="l-psw" value="<?php echo $pw; ?>" placeholder="Password" onclick="hideAlert();">

                    <div class="form-checkn  mb-4">
                        <input type="checkbox" class="form-check-input" name="" id="checkbox" <?php if(isset($_COOKIE["email"])) {echo("checked");}?>>
                        <label for="checkbox" class="form-check-label">Remember Me</label>
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d">
                        
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-warning mt-3 col-12 " onclick="signIn();">Sign In</button>

                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-outline-warning mt-3 col-12" onclick="changForm();">Sign Up</button>

                        </div>


                    </div>
                </div>


            </div>
            <!-- Sign In Section over -->

            <!-- Sign Up Section -->

            <div class="col-10 col-lg-4 signup " id="signup">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">New to Our Shop</h3>

                    <div class="form-signup" id="form-signup">
                        <div class="loading text-center d-none" id="loading">
                            <div class="container2">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>

                        </div>
                        <div class="inner-form" id="inner-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="" class="form-label">First Name :</label>
                                    <input type="text" class="form-control border-warning mb-3" name="" id="fname" placeholder="First Name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="form-label">Last Name :</label>
                                    <input type="text" class="form-control border-warning mb-3" name="" id="lname" placeholder="Last Name">
                                </div>
                            </div>
                            <label for="" class="form-label">Mobile :</label>
                            <input type="text" class="form-control border-warning mb-3" name="" id="mobile" placeholder="Mobile">


                            <label for="" class="form-label">E mail :</label>
                            <input class="form-control border-warning mb-3" type="email" name="" id="mail" placeholder="E-mail">

                            <label for="" class="form-label">Password :</label>
                            <input class="form-control border-warning mb-3" type="password" name="" id="psd1" placeholder="Password">

                            <label for="" class="form-label">Confirm Password :</label>
                            <input class="form-control border-warning mb-3" type="password" name="" id="psd2" placeholder="Confirm Password">

                            <div class="form-check  mb-4">
                                <input type="checkbox" class="form-check-input" name="" id="checkbox2" onclick="enebleBtn();">
                                <label for="checkbox2" class="form-check-label">I agree to <a href="#" class=" link-warning">term & Conditons</a></label>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-warning mt-3 col-12 disabled  " id="signupBtn" onclick="signup();">Sign Up</button>

                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-outline-warning mt-3 col-12" onclick="changForm();">Sign In</button>

                                </div>


                            </div>


                        </div>


                    </div>


                </div>


            </div>
            <!-- Sign Up Section Over -->




        </div>


    </div>

    <script src="js/script.js"></script>
</body>

</html>