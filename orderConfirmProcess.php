<?php

include "connection.php";
session_start();
$datet = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$datet-> setTimezone($tz);
$date = $datet -> format('Y-m-d H:i:s');

Database::iud("UPDATE `invoice` SET `order_status_id` = '2', `date` = '$date' WHERE `order_num` = '" . $_SESSION["orderNum"] . "'");
echo "success";




?>