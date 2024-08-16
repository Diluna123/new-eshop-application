<?php
include 'connection.php';

$onum = $_GET['onum'];

Database::iud("UPDATE `invoice` SET `ad_order_s_ad_o_s` = '2' WHERE `order_num` = '$onum'");
echo "success";

?>