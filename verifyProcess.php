<?php
include "connection.php";

$umail = $_POST['usermail'];
$vcode = $_POST['vCode'];


if (empty($vcode)) {
    echo "Please Enter Verification Code";
} else {
    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email`='$umail' AND `v_code` = '$vcode'");
    $num = $rs->num_rows;
    if ($num == 0) {
        echo "Invalid Verification Code";
    } else {
        echo "success";
    }
}







?>