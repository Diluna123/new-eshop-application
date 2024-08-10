<?php

include "connection.php";
session_start();

$pid = $_POST['pid'];
$onum = $_POST['onum'];
$qty = $_POST['qty'];

if (isset($_SESSION["orderNum"])) {
    unset($_SESSION["orderNum"]);
    $_SESSION["orderNum"] = $onum;
} else {
    $_SESSION["orderNum"] = $onum;
}

$datet = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$datet->setTimezone($tz);
$date = $datet->format('Y-m-d H:i:s');

$rs = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
$data = $rs->fetch_assoc();
$tot = $data['price'] * $qty;
$ftot = $tot + 300;

Database::iud("INSERT INTO `invoice` (`order_num`, `date`, `total`, `shipping_fees`, `cutomer_details_id` ,`order_status_id`, `pay_method_mid`) VALUES ('$onum', '$date', '$ftot', '300', '" . $_SESSION["user"]["id"] . "', '1', '1')");
Database::iud("INSERT INTO `invoice_items` (`qty`, `p_tot`, `invoice_order_num`, `products_p_id`, `rivew_status_rs_id`) VALUES ('" . $qty . "', '" . $tot . "', '$onum' ,'" . $pid . "', '1')");
echo("success");



?>