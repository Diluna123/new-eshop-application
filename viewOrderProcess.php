<?php
include "connection.php";

$onum = $_GET['onum'];

$rs = Database::search("SELECT * FROM `invoice` JOIN `cutomer_details` ON `invoice`.`cutomer_details_id` = `cutomer_details`.`id` JOIN `ad_book` ON `cutomer_details`.`id` = `ad_book`.`cutomer_details_id` JOIN `pay_method` ON `invoice`.`pay_method_mid` = `pay_method`.`mid` WHERE `invoice`.`order_num` = '" . $onum . "'");

$data = $rs->fetch_assoc();








?>
<div class="offcanvas-header">
    <h4 class="offcanvas-title text-secondary pt-3 ps-3 pe-3 fw-normal" id="offcanvasExampleLabel">Order Number : #<?php echo $onum ?></h4>

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

</div>


<div class="ps-4 pe-4 opacity-50">
    <hr class="">

</div>
<div class="row ps-4 pe-4 ">
    <div>

        <?php
        if ($data["ad_order_s_ad_o_s"] == 1) {
        ?>
            <td><span class="badge bg-info">Processing</span></td>

        <?php

        } else if ($data["ad_order_s_ad_o_s"] == 2) {
        ?>
            <td><span class="badge bg-warning">Shipped</span></td>

        <?php

        } else if ($data["ad_order_s_ad_o_s"] == 3) {
        ?>
            <td><span class="badge bg-success">Completed</span></td>

        <?php

        } else {
        ?>
            <td><span class="badge bg-danger">Canceled</span></td>
        <?php

        }


        ?>
    </div>
</div>

<div class="offcanvas-body">
    <div class="row ps-3 pe-3">
        <div class="col-6">

            <h6 class="text-capitalize">Customer Details</h6>
            <div>
                <p class="text-capitalize text-secondary mb-0 mt-0"><?php echo $data["fname"] . " " . $data["lname"]; ?> </p>
                <p class="text-secondary mb-0 mt-0"> <?php echo $data["email"]; ?> </p>
                <p class="text-secondary"><?php echo $data["mobile"]; ?></p>

            </div>




        </div>


    </div>
    <div class="row ps-3 pe-3 mt-2">
        <div class="col-7">
            <h6 class="text-capitalize">Billing Details</h6>
            <div>
                <p class="text-capitalize text-secondary mb-0 mt-0"> <?php echo $data["address"]; ?></p>
                <p class="text-secondary mb-0 mt-0"> <?php echo $data["city"]; ?> </p>
                <p class="text-secondary">Sri Lanka</p>

            </div>




        </div>
        <div class="col-5 ">
            <h6 class="text-capitalize">Payment Method</h6>
            <div>
                <p class="text-capitalize text-secondary mb-0 mt-0"> <?php echo $data["method"]; ?></p>


            </div>



        </div>

    </div>
    <div class="row mt-3 ps-3 pe-1">
        <h6 class="text-capitalize">Payment Details :</h6>
        <div class="row">
            <div class="col-12">
                <?php
                $rs2 = Database::search("SELECT * FROM `invoice_items`  WHERE `invoice_order_num` = '" . $onum . "'");
                $rsNums = $rs2->num_rows;
                for ($i = 0; $i < $rsNums; $i++) {


                    $data2 = $rs2->fetch_assoc();
                    $rs3 = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data2["products_p_id"] . "'");
                    $data3 = $rs3->fetch_assoc();
                ?>
                    <div class="row">
                        <div class="col-7">

                            <p class="text-capitalize text-secondary mb-0 mt-0">[#<?php echo $data3["p_id"]; ?>] <?php echo $data3["p_title"]; ?> (Rs. <?php echo $data3["price"]; ?> x <?php echo $data2["qty"]; ?>) </p>

                        </div>
                        <div class="col-5 d-flex justify-content-end">
                            <p class="text-capitalize text-secondary mb-0 mt-0">Rs. <?php echo $data2["p_tot"]; ?></p>


                        </div>
                    </div>


                <?php
                }



                ?>
                <div class="col-12">
                    <hr>


                </div>
                <div class="row">

                    <div class="col-7">
                        <p class="text-capitalize text-secondary mb-0 mt-0">Delivary Fees :</p>

                    </div>
                    <div class="col-5 d-flex justify-content-end">

                        <p class="text-capitalize text-secondary mb-0 mt-0"> Rs. 300</p>
                    </div>


                </div>
                <div class="row mt-1 mb-5">

                    <div class="col-7">
                        <p class="text-capitalize text-secondary mb-0 mt-0">Total Amount :</p>

                    </div>
                    <div class="col-5 d-flex justify-content-end">

                        <p class="text-capitalize text-warning mb-0 mt-0"> Rs. <?php echo $data["total"]; ?></p>
                    </div>


                </div>





            </div>
            <?php
            if ($data["ad_order_s_ad_o_s"] ==2) {
            ?>
                <p class="text-secondary text-center mt-4">This Order alrady shipped. Waite for confirmation from cutomer</p>
            <?php
            }else if($data["ad_order_s_ad_o_s"] >2){
                ?>
                <p class="text-success text-center mt-4">Order Successfully Deleverd to Customer</p>
                <?php

            } else {
            ?>
                <div class="col-12 mt-5 d-flex justify-content-between">
                <button class="btn btn-danger rounded-2" onclick="alert('Sure to Cancel this Ordre');">Cancel this order</button>
                    <button class="btn btn-warning rounded-2" onclick="orderShipping('<?php echo $onum; ?>');">Procced to Ship</button>

                </div>

            <?php
            }

            ?>



        </div>

    </div>
</div>