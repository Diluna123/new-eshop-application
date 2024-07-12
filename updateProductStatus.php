<?php
include 'connection.php';

$pid = $_GET['pid'];

$rs = Database::search("SELECT `status_s_id` FROM `products` WHERE `p_id` = '$pid'");
$data = $rs->fetch_assoc();
$status = $data['status_s_id'];
if ($status == 1) {
    Database::iud("UPDATE `products` SET `status_s_id` = '2' WHERE `p_id` = '$pid' ");
    echo "success";
}else{
    Database::iud("UPDATE `products` SET `status_s_id` = '1' WHERE `p_id` = '$pid' ");
    echo "success";

}






?>