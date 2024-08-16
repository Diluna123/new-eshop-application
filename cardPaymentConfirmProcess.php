<?php
include "connection.php";
session_start();

$rs = Database::search("SELECT * FROM `invoice_items`  WHERE `invoice_order_num` = '" . $_SESSION["orderNum"] . "'");

for ($i = 0; $i < $rs->num_rows; $i++) {
    $data = $rs->fetch_assoc();
    $rs2 = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $data["products_p_id"] . "'");
    $data2 = $rs2->fetch_assoc();
    if($data["qty"] > $data2["qty"]){

    }else{
        Database::iud("UPDATE `products` SET `qty` = `qty` - '" . $data["qty"] . "' WHERE `p_id` = '" . $data["products_p_id"] . "'");
    }

}

Database::iud("UPDATE `invoice` SET `order_status_id` = '2' WHERE `order_num` = '" . $_SESSION["orderNum"] . "'");



Database::iud("DELETE FROM `cart` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `cart_s` = '1'");
echo "success";










?>