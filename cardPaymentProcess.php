<?php
session_start();
include "connection.php";

if (isset($_SESSION["user"])) {

    $id = $_GET["idd"];
    $qty = $_GET["qty"];
    $uid = $_SESSION["user"]["id"];
    $umail = $_SESSION["user"]["email"];

    $array;

    $order_id = $_SESSION["orderNum"];
    // $productsRs = Database::search("SELECT * FROM `invoice` JOIN `invoice_items` ON `invoice`.`order_num` = `invoice_items`.`invoice_order_num` JOIN `products` ON `invoice_items`.`products_p_id` = `products`.`p_id` WHERE `invoice`.`cutomer_details_id` = '".$uid."' AND `invoice`.`order_num` ='".$order_id."'");
    $product_rs = Database::search("SELECT * FROM `products` WHERE `p_id`='" . $id . "'");
    $product_data = $product_rs->fetch_assoc();
    // $pnums =$productsRs->num_rows ;
    // for($e = 0; $e < $pnunm; $e++){

    //     $productsData = $productsRs->fetch_assoc();

    // }
    if ($product_data["qty"] < $qty) {
        echo ("0");

    } else {
        $city_rs = Database::search("SELECT * FROM `ad_book` JOIN `distric` ON `ad_book`.`distric_d_id` = `distric`.`d_id`  WHERE `ad_book`.`cutomer_details_id`='" . $uid . "'");
        $city_num = $city_rs->num_rows;

        if ($city_num == 1) {


            $city_data = $city_rs->fetch_assoc();

            $city_id = $city_data["city"];
            $address = $city_data["address"];



            $district_id = $city_data["distric_d_id"];
            $delivery = "300";


            $item = $product_data["p_title"];
            $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;

            $fname = $_SESSION["user"]["fname"];
            $lname = $_SESSION["user"]["lname"];
            $mobile = $_SESSION["user"]["mobile"];
            $uaddress = $address;
            $city = $city_data["city"];

            $merchant_id = "1224618";
            $merchant_secret = "MjEyMzM0ODEyMTQyMTM1ODgyODYyNTczMDE1MDI1ODM4OTE3NTA4";
            $currency = "LKR";

            $hash = strtoupper(
                md5(
                    $merchant_id .
                        $order_id .
                        number_format($amount, 2, '.', '') .
                        $currency .
                        strtoupper(md5($merchant_secret))
                )
            );

            $array["id"] = $order_id;
            $array["item"] = $item;
            $array["amount"] = $amount;
            $array["fname"] = $fname;
            $array["lname"] = $lname;
            $array["mobile"] = $mobile;
            $array["address"] = $uaddress;
            $array["city"] = $city;
            $array["umail"] = $umail;
            $array["mid"] = $merchant_id;
            $array["msecret"] = $merchant_secret;
            $array["currency"] = $currency;
            $array["hash"] = $hash;

            echo json_encode($array);
        } else {
            echo ("2");
        }
    }
} else {
    echo ("1");
}
