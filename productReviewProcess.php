<?php
include 'connection.php';
session_start();

$pid = $_POST['pid'];
$onum = $_POST['onum'];
$review = $_POST['comment'];

if(empty($review)){

    echo "Please Enter Your Review before submitting";
}else{

    Database::iud("INSERT INTO `reviews`(`comment`,`cutomer_details_id`,`products_p_id`) VALUES ('$review','" . $_SESSION["user"]["id"] . "','$pid')");
    Database::iud("UPDATE `invoice_items` SET `rivew_status_rs_id` = '2' WHERE `invoice_order_num` = '$onum' AND `products_p_id` = '$pid'");
    echo "success";
}

?>