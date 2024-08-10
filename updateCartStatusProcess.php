<?php
include "connection.php";

$status = $_POST["check"];
$cid = $_POST["cartId"];

if($status == 'true'){
    $status = 1;
}else{
    $status = 0;
}
Database::iud("UPDATE `cart` SET `cart_s` = '$status' WHERE `idcart` = '$cid'");
echo "success";



?>