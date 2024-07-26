<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'connection.php';

if (isset($_SESSION["user"])) {
    $udata = $_SESSION["user"];
    $crs = Database::search("SELECT * FROM `cutomer_details` WHERE `id` = '" . $udata["id"] . "'");
    $crdata = $crs->fetch_assoc();
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Black 42 | User Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body {
                background-color: black;
            }

            .img-pr {
                width: 150px;
                height: 150px;


                border-radius: 100%;
                z-index: -1;


            }

            .wr-img {
                width: 150px;
                height: 150px;

            }

            .ed-wrap {
                width: 140px;
                height: 195px;
                font-size: 20px;

                z-index: 2;
            }
            .signOutTop{
                transition: .3s;

            }
            .signOutTop:hover{
                color:#ffae00 ;
            }
        </style>
    </head>

    <body>

        <nav class="navbar fixed-top navbar-expand navbar-expand-lg navbar-expand-md navbar-expand-sm bg-body-tertiary " style="height: 35px" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-text text-decoration-none"><span class="text-warning">Hi <?php echo $udata["fname"]?></span> | <span class="signOutTop"  style="cursor: pointer; " onclick="signOut();">Sign out</span>  | Help & Contacts</a>

                <div class="collapse d-flex" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown">
                            <h5><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                    <i class="fas fa-bars "></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Watchlist</a></li>
                                    <li><a class="dropdown-item" href="#">My Cart</a></li>
                                    <li><a class="dropdown-item" href="#">My Orders</a></li>
                                    <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                                </ul>
                            </h5>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <div class="container">
            <?php



            ?>


            <div class="row mt-4">
                <div class="row mt-3">
                    <label for="" class="form-label text-light"><a href="index.php" class="link-warning">Home </a>/ My Profile</label>
                </div>
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="wr-img mb-5">
                        <div class="img-pr mt-5 position-absolute">
                            <?php
                            $rs_pic = Database::search("SELECT * FROM `pr_img` WHERE `cutomer_details_id` = '" . $udata["id"] . "'");
                            if ($rs_pic->num_rows > 0) {

                                $pic = $rs_pic->fetch_assoc();
                            ?>
                                <img src="<?php echo $pic["img"] ?> " width="150px" height="150px" alt="" style="border-radius: 50%; object-fit: cover;" id="proimg">

                            <?php

                            } else {
                            ?>
                                <img src="pro_img/pro-sample.png" width="150px" height="150px" alt="" style="border-radius: 50%; object-fit: cover;" id="proimg">


                            <?php
                            }


                            ?>


                        </div>
                        <div class="text-light ed-wrap d-flex align-items-end justify-content-end">
                            <input type="file" class="d-none" accept="image/png, image/jpeg" id="ed-img">
                            <label for="ed-img" class="btn btn-sm btn-warning rounded-5" onclick="priviewImg();"><i class="fas fa-pen "></i></label>

                        </div>

                    </div>


                </div>
                <div class="col-lg-8 text-light d-flex flex-column justify-content-center">
                    <h1 class="mt-1 text-warning pro-hadding">My Profile</h1>

                    <div class="col-lg-9">
                        <div class="row mt-5">
                            <div class="mb-3 col-lg-6">
                                <label for="" class="form-label text-warning">First Name :</label>
                                <input type="text" class="form-control form-control-sm" id="fname_p" value="<?php echo $crdata["fname"] ?>">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="" class="form-label text-warning">Last Name :</label>
                                <input type="text" class="form-control form-control-sm" id="lname_p" value="<?php echo $crdata["lname"] ?>">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-warning">Mobile :</label>
                            <input type="text" class="form-control form-control-sm" id="mobile_p" value="<?php echo $crdata["mobile"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-warning">Password :</label>
                            <input type="password" class="form-control form-control-sm" value="<?php echo $udata["psd"] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-warning">E-mail :</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $udata["email"] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label text-warning">Registerd Date :</label>
                            <input type="text" class="form-control form-control-sm" value="<?php echo $udata["r_date"] ?>" disabled>
                        </div>
                        <?php
                        $rss = Database::search("SELECT * FROM `ad_book` WHERE `cutomer_details_id` = '$udata[id]'");
                        if ($rss->num_rows > 0) {
                            $adData = $rss->fetch_assoc();
                            $provinceOptions = "";
                            $districOptions = "";

                            $ad = Database::search("SELECT * FROM `ad_book` WHERE `cutomer_details_id` = '" . $udata["id"] . "'");
                            $addata = $ad->fetch_assoc();



                            $prs = Database::search("SELECT * FROM `province`");
                            while ($pdata = $prs->fetch_assoc()) {
                                // Check if the current occupation matches the team member's occupation
                                $selected = ($addata["province_p_id"] == $pdata["p_id"]) ? 'selected' : '';
                                $provinceOptions .= "<option value='{$pdata["p_id"]}' {$selected}>{$pdata["p_name"]}</option>";
                            }

                            $drs = Database::search("SELECT * FROM `distric`");
                            while ($ddata = $drs->fetch_assoc()) {
                                // Check if the current occupation matches the team member's occupation
                                $selected = ($addata["distric_d_id"] == $ddata["d_id"]) ? 'selected' : '';
                                $districOptions .= "<option value='{$ddata["d_id"]}' {$selected}>{$ddata["d_name"]}</option>";
                            }
                        ?>
                            <div class="mb-3">
                                <label for="" class="form-label text-warning">Address :</label>
                                <input type="text" class="form-control form-control-sm" id="address" value="<?php echo $adData["address"] ?>">

                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">Province :</label>
                                        <select class="form-control form-control-sm" name="" id="province">
                                            <?php echo $provinceOptions ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">Distric :</label>
                                        <select class="form-control form-control-sm" name="" id="distric">
                                            <?php echo $districOptions ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">City :</label>
                                        <input type="text" class="form-control form-control-sm" id="city" value="<?php echo $adData["city"] ?>">

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">Zip Code :</label>
                                        <input type="text" class="form-control form-control-sm" id="zip" value="<?php echo $adData["zip"] ?>">

                                    </div>

                                </div>
                            </div>






                        <?php


                        } else {
                        ?>
                            <div class="mb-3">
                                <label for="" class="form-label text-warning">Address :</label>
                                <input type="text" class="form-control form-control-sm" id="address">

                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">Province :</label>
                                        <select class="form-control form-control-sm" name="" id="province">
                                            <option value="00">Select</option>
                                            <?php
                                            $pr = Database::search("SELECT * FROM `province`");
                                            for ($x = 0; $x < $pr->num_rows; $x++) {
                                                $prData = $pr->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $prData["p_id"] ?>"><?php echo $prData["p_name"] ?></option>
                                            <?php

                                            }



                                            ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">District :</label>
                                        <select class="form-control form-control-sm" name="" id="distric">
                                            <option value="00">select</option>
                                            <?php
                                            $dr = Database::search("SELECT * FROM `distric`");
                                            for ($x = 0; $x < $dr->num_rows; $x++) {
                                                $drData = $dr->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $drData["d_id"] ?>"><?php echo $drData["d_name"] ?></option>
                                            <?php

                                            }



                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">City :</label>
                                        <input type="text" class="form-control form-control-sm" id="city">

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="" class="form-label text-warning">Zip Code :</label>
                                        <input type="text" class="form-control form-control-sm" id="zip">

                                    </div>

                                </div>
                            </div>








                        <?php






                        }


                        ?>


                        <div class="mb-5 d-grid">
                            <button class="btn btn-warning " onclick="updateUserProfile(<?php echo $udata['id'] ?>);">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

















        <script src="js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>







<?php




} else {
    header("location: index.php");
}

?>



</html>