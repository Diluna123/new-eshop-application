<?php

include "connection.php";
$email = $_POST['email'];

if(empty($email)){
    echo "Please Enter Your Email";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email";
}else{
    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email` = '$email'");
    $num = $rs->num_rows;
    if($num == 0){
        echo "Email Does Not Exist";
    }else{
        echo "success";
    }
}







?>