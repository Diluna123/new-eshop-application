<?php
include "connection.php";

$cartId = $_POST["cartid"];
$qty = $_POST["qty"];


Database::iud("UPDATE `cart` SET `cart_qty` = '$qty' WHERE `idcart` = '$cartId'");
echo "success";             



?>