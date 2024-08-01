<?php
include 'connection.php';
session_start();

$pid = $_GET["pid"];

$rs = Database::search("SELECT * FROM `watchlist` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `products_p_id` = '$pid'");
if ($rs->num_rows == 0) {
    Database::iud("INSERT INTO `watchlist`(`cutomer_details_id`, `products_p_id`) VALUES ('" . $_SESSION["user"]["id"] . "', '$pid')");
    echo "success";
}else{
    echo"product allready added in watchlist";
}


?>