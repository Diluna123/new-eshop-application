<?php
include 'connection.php';


$brand = $_POST['newBrandName'];

if (empty($brand)) {
    echo "Please Enter Brand Name";
} else {

    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '$brand'");
    $num = $rs->num_rows;
    if ($num > 0) {
        echo "Brand Already Exists";
    } else {
        Database::iud("INSERT INTO `brand`(`brand_name`) VALUES ('$brand')");
        echo "success";
    }



}





?>