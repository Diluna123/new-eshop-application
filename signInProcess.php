<?php
include "connection.php";

$email = $_POST["email"];
$psw = $_POST["password"];


if(empty($email)){

    echo "Please Enter Your Email";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email";
}else if(empty($psw)){
    echo "Please Enter Your Password";

}else if(strlen($psw) < 8){
    echo "Password is too short";
}else{

    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email` = '$email'");
    $num = $rs->num_rows;
    if($num == 0){
        echo "Email Does Not Exists";
    }else{

        $data = $rs->fetch_assoc();
        if($data["psd"] != $psw){
            echo "Password Does Not Match";
        }else{
            echo "success";
        }
    }
       

}














?>