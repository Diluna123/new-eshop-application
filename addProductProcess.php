<?php
include "connection.php";


$pTitle = $_POST["pTitle"];
$pCat = $_POST["pCat"];
$pBrand = $_POST["pBrand"];
$pDesc = $_POST["pDesc"];
$pQty = $_POST["pQty"];
$pPrice = $_POST["pPrice"];
$dCost = $_POST["dCost"];



$allowed = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

if (empty($pTitle)) {
    echo "Please Enter Product Title";
} else if (empty($pCat)) {
    echo "Please Select Product Catogery";
} else if ($pCat == "00") {
    echo "Please Select Product Catogery";
} else if (empty($pBrand)) {
    echo "Please Select Product Brand";
} else if ($pBrand == "00") {
    echo "Please Select Product Brand";
} else if (empty($pDesc)) {
    echo "Please Enter Product Description";
} else if (empty($pQty)) {
    echo "Please Enter Product Quantity";
} else if (empty($pPrice)) {
    echo "Please Enter Product Price";
} else if (empty($dCost)) {
    echo "Please Enter Product Delivery Cost";
} else if ($pQty < 0) {
    echo "Please Enter Valid Product Quantity";
} else if ($pPrice < 0) {
    echo "Please Enter Valid Product Price";
} else {
    $pImg = $_FILES["pi"];
    if (isset($pImg)) {
        $file_type = $pImg["type"];
        $new_img_type;
    
        if (in_array($file_type, $allowed)) {
    
            if ($file_type == "image/jpg") {
                $new_img_type = ".jpg";
            } else if ($file_type == "image/jpeg") {
                $new_img_type = ".jpeg";
            } else if ($file_type = "image/png") {
                $new_img_type = ".png";
            } else if ($file_type = "image/svg+xml") {
                $new_img_type = ".svg";
            }
    
            $new_name = "img//" . uniqid() . $new_img_type;
            move_uploaded_file($pImg["tmp_name"], $new_name);
            $resU = Database::search("SELECT * FROM `products` WHERE `p_title` = '$pTitle' && `catogerys_cat_id` = '$pCat' && `brand_br_id` = '$pBrand' && `p_dis` = '$pDesc' && `d_fees` = '$dCost' && `price` = '$pPrice'  ");
            $numsp = $resU->num_rows;
            if ($numsp > 0) {
                $dataU = $resU->fetch_assoc();
                Database::iud("UPDATE `products` SET `qty` = `qty` + '$pQty' WHERE `p_id` = '" . $dataU["p_id"] . "'");
                echo "success";
            } else {
                Database::iud("INSERT INTO `products`( `brand_br_id`, `catogerys_cat_id`,`p_title`, `qty`, `p_dis`, `d_fees`, `price`, `p_img`,`status_s_id`) VALUES ( '$pBrand', '$pCat','$pTitle', '$pQty', '$pDesc', '$dCost', '$pPrice', '$new_name','1')");
                echo "success";
            }
        }
    } else {
    
        echo "Please Select Product Image";
    }
}
