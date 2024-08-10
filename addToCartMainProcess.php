<?php

include "connection.php";
session_start();
$pid = $_POST["pid"];
$qty = $_POST["qty"];

if (isset($_SESSION["user"])) {
    $rs = Database::search("SELECT * FROM `cart` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `products_p_id` = '$pid'");
    if ($rs->num_rows > 0) {



        Database::iud("UPDATE `cart` SET `cart_qty` = '" . $qty . "' WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `products_p_id` = '$pid'");
        echo "success";
    } else {
        Database::iud("INSERT INTO `cart`(`cutomer_details_id`, `products_p_id`, `cart_qty`,`cart_s`) VALUES ('" . $_SESSION["user"]["id"] . "', '$pid', '$qty','0')");
        echo "success";
    }
} else {
    echo "Plese Login First";
}
