<?php
include 'connection.php';

$onum = $_GET["onum"];

Database::iud("UPDATE `invoice` SET `order_status_id` = '3', `ad_order_s_ad_o_s` = '3' WHERE `order_num` = '" . $onum . "'");

echo "success";




?>