<?php
include "connection.php";
session_start();


$method = $_GET['method'];

Database::iud("UPDATE `invoice` SET `pay_method_mid` = '$method' WHERE `order_num` = '" . $_SESSION["orderNum"]. "'");
echo "success";








?>