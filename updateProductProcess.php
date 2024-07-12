<?php
include "connection.php";

$pid = $_POST["pId"];
$pTitle = $_POST["pTitle"];
$pCat = $_POST["pCat"];
$pBrand = $_POST["pBrand"];
$pDesc = $_POST["pDesc"];
$pQty = $_POST["pQty"];
$pPrice = $_POST["pPrice"];
$dCost = $_POST["dCost"];

$allowed = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

if (isset($pid)) {
    if (empty($pTitle)) {
        echo "Please Enter Product Title";
    } else if (empty($pCat)) {
        echo "Please Select Product Category";
    } else if ($pCat == "00") {
        echo "Please Select Product Category";
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
        try {
            if (isset($_FILES["pi"])) {
                $pImg = $_FILES["pi"];
                $file_type = $pImg["type"];
                $new_img_type = "";

                if (in_array($file_type, $allowed)) {
                    if ($file_type == "image/jpg") {
                        $new_img_type = ".jpg";
                    } else if ($file_type == "image/jpeg") {
                        $new_img_type = ".jpeg";
                    } else if ($file_type == "image/png") {
                        $new_img_type = ".png";
                    } else if ($file_type == "image/svg+xml") {
                        $new_img_type = ".svg";
                    }

                    $new_name = "img//" . uniqid() . $new_img_type;
                    move_uploaded_file($pImg["tmp_name"], $new_name);

                    $resU = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
                    $numsp = $resU->num_rows;
                    if ($numsp > 0) {
                        Database::iud("UPDATE `products` SET `p_title` = '$pTitle', `catogerys_cat_id` = '$pCat', `brand_br_id` = '$pBrand', `p_dis` = '$pDesc', `qty` = '$pQty', `price` = '$pPrice', `d_fees` = '$dCost', `p_img` ='$new_name' WHERE `p_id` = '$pid'");
                        echo "success";
                    } else {
                        echo "Product Does not exist";
                    }
                }
            } else {
                $resU = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
                $numsp = $resU->num_rows;
                if ($numsp > 0) {
                    Database::iud("UPDATE `products` SET `p_title` = '$pTitle', `catogerys_cat_id` = '$pCat', `brand_br_id` = '$pBrand', `p_dis` = '$pDesc', `qty` = '$pQty', `price` = '$pPrice', `d_fees` = '$dCost' WHERE `p_id` = '$pid'");
                    echo "success";
                } else {
                    echo "Product Does not exist";
                }
            }
        } catch (Exception $ex) {
            echo "An error occurred: " . $ex->getMessage();
        }
    }
} else {
    echo "Product Does not exist";
}
