<?php
include "connection.php";
session_start();



$cartId = $_GET['cartId'];

$rs = Database::iud("DELETE FROM `cart` WHERE `idcart` = '" . $cartId . "'");
echo "success";




?>