<?php
include "connection.php";

$newPs = $_POST["nPs"];
$cnewPs = $_POST["cnPs"];
$email = $_POST["email"];


if (empty($newPs) || empty($cnewPs)) {
    echo "Please Enter New Password";
} else if ($newPs != $cnewPs) {
    echo "Password Does Not Match";
} else {
    Database::iud("UPDATE `cutomer_details` SET `psd` ='" . $newPs . "' WHERE `email` ='" . $email . "'");
    echo "success";

}





?>