<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body{
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="container text-light">
        <div class="row vh-100 justify-content-center align-items-center">

            <div class="col-10 col-lg-4  signin " id="signin">
                <div class="row text-center">
                    <div class="col-12 mb-5  ">

                        <img src="logo2.png" class="" alt="" width="150px" height="auto">
                    </div>


                </div>

                <div class="col-lg-12 ">
                    <h3 class="text-center mb-4 mt-3">Admin Login</h3>
                    <p class="form-text text-center text-secondary">Enter Your Registerd Admin Email Address to get Verfication code and login to your admin dashboard</p>
                    


                    <label for="" class="form-label">Admin mail :</label>
                    <input class="form-control border-warning mb-3" type="email" name="" id="l-email" value="" placeholder="Admin mail" onclick="hideAlert();">

                    <!-- <label for="" class="form-label">Password :</label>
                    <input class="form-control border-warning mb-3" type="password" name="" id="l-psw" value="" placeholder="Password" onclick="hideAlert();">

                    <div class="form-checkn  mb-3">
                        <input type="checkbox" class="form-check-input" name="" id="checkbox" >
                        <label for="checkbox" class="form-check-label">Remember Me</label>
                    </div> -->

                    <!-- <div class="row">
                        <label for="" class="form-label  pointer-event"><a onclick="changForm2();" class="link-warning">Forgot Password</a></label>
                    </div> -->

                    <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="alert-d">


                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-warning mt-3 col-12 " onclick="">Log in </button>

                        </div>
                        

                    </div>
                </div>


            </div>

        </div>

    </div>










    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>