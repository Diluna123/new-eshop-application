<?php

session_start();
include "connection.php";

$tot = $_POST['tot'];
$orderNum = $_POST['oNum'];

$datet = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$datet-> setTimezone($tz);
$date = $datet -> format('Y-m-d H:i:s');
$tot = intval($tot) + 300;
if(isset($_SESSION["orderNum"])){
    unset($_SESSION["orderNum"]);
    $_SESSION["orderNum"] = $orderNum;
}else{
    $_SESSION["orderNum"] = $orderNum;
}

$_SESSION["orderNum"] = $orderNum;

$cartP = Database::search("SELECT * FROM `cart` WHERE `cutomer_details_id` = '" . $_SESSION["user"]["id"] . "' AND `cart_s` = '1'");
Database::iud("INSERT INTO `invoice` (`order_num`, `date`, `total`, `shipping_fees`, `cutomer_details_id` ,`order_status_id`, `pay_method_mid`) VALUES ('$orderNum', '$date', '$tot', '300', '".$_SESSION["user"]["id"]."', '1', '1')");
for ($x = 0; $x < $cartP->num_rows; $x++) {
    $cartData = $cartP->fetch_assoc();
    $productRs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $cartData["products_p_id"] . "'");
    $productData = $productRs->fetch_assoc();
    $total = $productData["price"] * $cartData["cart_qty"];

    Database::iud("INSERT INTO `invoice_items` (`qty`, `p_tot`, `invoice_order_num`, `products_p_id`) VALUES ('" . $cartData["cart_qty"] . "', '" . $total . "', '$orderNum' ,'" . $cartData["products_p_id"] . "')");


    
    


}
echo("success");
?>