<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Option</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: black;
        }

        .card:hover {
            transition: .1s;
            opacity: 0.8;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include 'topnav.php'; ?>

    <div class="container">
        <div class="row mt-5 mb-5">
            <h3 class="text-light fw-light">Select Payment Option</h3>

        </div>
        <div class="row mb-3">
            <a onclick="updatePaymentMethod(1);" class="text-decoration-none" ">
                <div class=" card p-2">
                <div class="row">
                    <div class="col-lg-2 ">
                        <div class="card mb-sm-2 mb-lg-0 mb-md-3 mb-3 ">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-truck text-warning fa-3x"></i>

                            </div>
                        </div>
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <h4 class="text-light fw-light ">Cash On Delevery</h4>
                    </div>
                    <div class="col-2 d-flex justify-content-end justify-content-md-end align-items-center">
                        <div class="">
                            <i class="fa-solid fa-chevron-right text-secondary fa-2x pe-2"></i>

                        </div>
                    </div>
                </div>
        </div>
        </a>
    </div>
    <div class="row">
        <a onclick="updatePaymentMethod(2);">
            <div class="card p-2">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card mb-sm-2 mb-lg-0 mb-md-3 mb-3">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <i class="fa-regular fa-credit-card text-warning fw-light fa-3x"></i>

                            </div>
                        </div>
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <h4 class="text-light fw-light ">Cradit Card/ Debit Card</h4>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-items-center">
                        <div class="">
                            <i class="fa-solid fa-chevron-right text-secondary fa-2x pe-2"></i>

                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    </div>










    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>