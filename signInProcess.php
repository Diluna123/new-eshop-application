<?php
session_start();
include "connection.php";

$email = $_POST["email"];
$psw = $_POST["password"];
$checkRes = $_POST["cResults"];


if(empty($email)){

    echo "Please Enter Your Email";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email";
}else if(empty($psw)){
    echo "Please Enter Your Password";

}else if(strlen($psw) < 8){
    echo "Password is too short";
}else{

    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email` = '$email'  ");
    $num = $rs->num_rows;
    if($num == 0){
        echo "Email Does Not Exists Please Create An Account or Check Your Email";
    }else{

        $data = $rs->fetch_assoc();
        if($data["psd"] != $psw){
            echo "Password Does Not Match";
        }else if($data['status_s_id']== 2){
            echo "ACCOUNT DEACTIVATED PLEASE CONTACT ADMINISTRATOR";

        }
        else{
            $_SESSION["user"] = $data;
           
            if($checkRes == "true"){
               
                setcookie("email",$email,time()+(60*60*24*365));
                setcookie("password",$psw,time()+(60*60*24*365));
    
            }else{
                setcookie("email","",-1);
                setcookie("password","",-1);
    
            }
            echo "success";
        }
    }
       

}














?>