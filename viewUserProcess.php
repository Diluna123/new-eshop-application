<?php
include 'connection.php';

$unum = $_GET['uid'];

$rs = Database::search('SELECT * FROM `cutomer_details`  WHERE `id` = "' . $unum . '"');
$data = $rs->fetch_assoc();




?>
<div class="offcanvas-header">

    <h4 class="offcanvas-title text-secondary pt-3 ps-3 pe-3 fw-normal" id="offcanvasExampleLabel">Customer Id : #<?php echo $unum ?></h4>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="ps-4 pe-4 mt-0 opacity-50">
    <hr class="">

</div>
<div class="offcanvas-body">
    <div class="row ps-4 pe-4 ">
        <div class="col-lg-6 col-md-4 col-12 col-sm-12">
            <div class="card border-0 d-flex justify-content-sm-center justify-content-center justify-content-lg-start">
                <?php
                $prs = Database::search("SELECT * FROM `pr_img` WHERE `cutomer_details_id` = '" . $unum . "'");
                if ($prs->num_rows == 0) {
                ?>
                    <img src="pro_img/pro-sample.png" width="200ppx" height="200px" style="object-fit:cover; border-radius: 50%;" alt="">


                <?php

                } else {
                    $pdata = $prs->fetch_assoc();
                ?>
                    <img class="" src="<?php echo $pdata['img'] ?>" width="200ppx" height="200px" style="object-fit:cover; border-radius: 50%;" alt="">
                <?php
                }

                ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-12 col-sm-12">
            <div class="mb-2">
                <label for="" class="">Status : </label><br>
                <?php
                if ($data["status_s_id"] == 1) {
                ?>
                    <label for="" class="text-secondary"><span class="badge bg-success">Active</span></label>


                <?php

                } else {
                ?>
                    <label for="" class="text-secondary"><span class="badge bg-danger">Inactive</span></label>

                <?php
                }

                ?>

            </div>

            <div class="mb-2">
                <label for="" class="">Name : </label><br>
                <label for="" class="text-secondary"><?php echo $data["fname"]; ?> <?php echo $data["lname"]; ?></label>
            </div>
            <div class="mb-2">
                <label for="" class="">Mobile : </label><br>
                <label for="" class="text-secondary"><?php echo $data["mobile"]; ?></label>
            </div>
            <div class="mb-2">
                <label for="" class="">E-mail : </label><br>
                <label for="" class="text-secondary"><?php echo $data["email"]; ?></label>
            </div>


        </div>
    </div>
    <div class="row ps-4 pe-4 ">
        <?php

        $ars = Database::search("SELECT * FROM `ad_book` JOIN `distric` ON `ad_book`.`distric_d_id` = `distric`.`d_id` JOIN `province` ON `ad_book`.`province_p_id` =`province`.`p_id` WHERE `cutomer_details_id` = '" . $unum . "'");
        if ($ars->num_rows == 0) {
        ?>
            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="" class="">Address : </label><br>
                    <label for="" class="text-secondary">Not Updated</label>
                </div>
                <div class="mb-2">
                    <label for="" class="">City : </label><br>
                    <label for="" class="text-secondary">Not Updated</label>
                </div>

                <div class="mb-2">
                    <label for="" class="">Province : </label><br>
                    <label for="" class="text-secondary">Not Updated</label>
                </div>



            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="" class="">Registerd Date : </label><br>
                    <label for="" class="text-secondary"><?php echo $data["r_date"]; ?></label>
                </div>
                <div class="mb-2">
                    <label for="" class="">Zip Code : </label><br>
                    <label for="" class="text-secondary">Not Updated</label>
                </div>

                <div class="mb-2">
                    <label for="" class="">District : </label><br>
                    <label for="" class="text-secondary">Not Updated</label>
                </div>

            </div>



        <?php


        } else {
            $aData = $ars->fetch_assoc();
        ?>

            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="" class="">Address : </label><br>
                    <label for="" class="text-secondary"><?php echo $aData["address"]; ?></label>
                </div>
                <div class="mb-2">
                    <label for="" class="">City : </label><br>
                    <label for="" class="text-secondary"><?php echo $aData["city"]; ?></label>
                </div>

                <div class="mb-2">
                    <label for="" class="">Province : </label><br>
                    <label for="" class="text-secondary"><?php echo $aData["p_name"]; ?></label>
                </div>



            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="" class="">Registerd Date : </label><br>
                    <label for="" class="text-secondary"><?php echo $data["r_date"]; ?></label>
                </div>
                <div class="mb-2">
                    <label for="" class="">Zip Code : </label><br>
                    <label for="" class="text-secondary"><?php echo $aData["zip"]; ?></label>
                </div>

                <div class="mb-2">
                    <label for="" class="">District : </label><br>
                    <label for="" class="text-secondary"><?php echo $aData["d_name"]; ?></label>
                </div>

            </div>






        <?php
        }

        ?>


    </div>
    <div class="row ps-4 pe-4 mt-5 ">
        <div class="d-flex justify-content-end ">
            <button class="btn btn-warning rounded-4 d-grid" onclick="window.print();">Print Details</button>
        </div>
    </div>

</div>