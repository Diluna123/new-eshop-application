<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black 42 | Sign In</title>
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
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

        .bars {
            width: 21.6px;
            height: 19.2px;
            background: linear-gradient(#0000 calc(1*100%/6), #f8f8f8 0 calc(3*100%/6), #0000 0) left bottom,
                linear-gradient(#0000 calc(2*100%/6), #f8f8f8 0 calc(4*100%/6), #0000 0) center bottom,
                linear-gradient(#0000 calc(3*100%/6), #f8f8f8 0 calc(5*100%/6), #0000 0) right bottom;
            background-size: 7.2px 600%;
            background-repeat: no-repeat;
            animation: bars-j7enxv 1s infinite linear;
        }

        .container3 {
            --uib-size: 25px;
            --uib-color: white;
            --uib-speed: 1s;
            --uib-stroke: 3.5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: var(--uib-size);
            height: calc(var(--uib-size) * 0.9);
        }

        .bar {
            width: var(--uib-stroke);
            height: 100%;
            background-color: var(--uib-color);
            transition: background-color 0.3s ease;
        }

        .bar:nth-child(1) {
            animation: grow var(--uib-speed) ease-in-out calc(var(--uib-speed) * -0.45) infinite;
        }

        .bar:nth-child(2) {
            animation: grow var(--uib-speed) ease-in-out calc(var(--uib-speed) * -0.3) infinite;
        }

        .bar:nth-child(3) {
            animation: grow var(--uib-speed) ease-in-out calc(var(--uib-speed) * -0.15) infinite;
        }

        .bar:nth-child(4) {
            animation: grow var(--uib-speed) ease-in-out infinite;
        }

        @keyframes grow {

            0%,
            100% {
                transform: scaleY(0.3);
            }

            50% {
                transform: scaleY(1);
            }
        }

        @keyframes bars-j7enxv {
            100% {
                background-position: left top, center top, right top;
            }
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

    <div class="container overflow-hidden">
        <div class="row overflow-hidden vh-100 d-flex justify-content-center align-items-center">
            <!-- Sign In Section -->
            <div class="col-10 col-lg-4  signin " id="signin">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Welcome to Our Store</h3>
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

                    <div class="form-checkn  mb-3">
                        <input type="checkbox" class="form-check-input" name="" id="checkbox" <?php if (isset($_COOKIE["email"])) {
                                                                                                    echo ("checked");
                                                                                                } ?>>
                        <label for="checkbox" class="form-check-label">Remember Me</label>
                    </div>

                    <div class="row">
                        <label for="" class="form-label  pointer-event"><a onclick="changForm2();" class="link-warning">Forgot Password</a></label>
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d">


                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-warning mt-3 col-12 " onclick="signIn();">Sign In</button>

                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-outline-warning mt-3 col-12" onclick="changForm();">New User</button>

                        </div>


                    </div>
                </div>


            </div>
            <!-- Sign In Section over -->

            <!-- forgot password Section -->
            <div class="col-10 col-lg-4   forgotPs" id="forgotPs">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Ooops! Are You Forgeted your Password</h3>
                    <p class="form-text text-center">Enter Your Registerd email address to get verfication code for your new password.</p>


                    <label for="" class="form-label">E mail :</label>
                    <input class="form-control border-warning mb-3" type="email" name="" id="fps-email" placeholder="E-mail" onclick="hideAlert();">





                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d-forgotPs">


                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-outline-warning mt-3 col-12 " onclick="changForm2();">Back</button>

                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-warning mt-3 col-12 text-center" onclick=" forgotPs();" id="em-v-nbtn">Send</button>

                        </div>


                    </div>
                    <div class="row mt-4">
                        <div class="loading d-none d-flex justify-content-center" id="loading-ve">
                            <div class="container3">
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                                <div class="bar"></div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
            <!-- forgot password Section over -->

            <!-- forgot password email verfication Section -->
            <div class="col-10 col-lg-4  forgotPsverification" id="forgotPsverification">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Verification</h3>
                    <p class="form-text text-center">Enter verfication you have received on your email</p>


                    <label for="" class="form-label">Verfication Code :</label>
                    <input class="form-control border-warning mb-3" type="text" name="" id="ve-code" placeholder="Verification Code" onclick="hideAlert();">





                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d-verify">


                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-outline-warning mt-3 col-12 " onclick="changForm3();">Back</button>

                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-warning mt-3 col-12" onclick=" verify();">Next</button>

                        </div>


                    </div>
                </div>


            </div>
            <!-- forgot password email verfication Section over -->


            <!-- add new passwords Section -->
            <div class="col-10 col-lg-4  addNewPs" id="addNewPs">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Verification Sucess</h3>
                    <p class="form-text text-center">E mail verfication is sucess now add new Password to your account</p>


                    <label for="" class="form-label">New Password :</label>
                    <input class="form-control border-warning mb-3" type="text" name="" id="newPsw" placeholder="New Password" onclick="hideAlert();">

                    <label for="" class="form-label">Confirm Password :</label>
                    <input class="form-control border-warning mb-3" type="text" name="" id="cnewPsw" placeholder="Confirm Password" onclick="hideAlert();">





                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d-changps">


                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-outline-warning mt-3 col-12 " onclick="changForm4();">Back</button>

                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-warning mt-3 col-12" onclick="changPs();">Finish</button>

                        </div>


                    </div>
                </div>


            </div>
            <!-- add new passwords Section over -->
















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