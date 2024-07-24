<?php
include "connection.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$passC = $_POST['passC'];



if(empty($fname)){
    echo "Please Enter Your First Name";
}else if(strlen($fname)> 20){
    echo "Your First Name is too long";
}else if(empty($lname)){
    echo "Please Enter Your Last Name";
}else if(strlen($lname)> 20){
    echo "Your Last Name is too long";
}else if(empty($mobile)){
    echo "Please Enter Your Mobile Number";
}else if(strlen($mobile)> 10){
    echo "Your Mobile Number is too long";
}else if(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)){
    echo "Invalid Mobile Number";

}else if(empty($email)){
    echo "Please Enter Your Email";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email";
}else if(empty($password1)){
    echo "Please Enter Your Password";
}else if(empty($passC)){
    echo "Please Confirm Your Password";
}else if(strlen($password1) < 8){
    echo "Password is too short";

}else if($password1 != $passC){
    echo "Password Does Not Match";
}else{


    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email` = '$email'");
    $num = $rs->num_rows;
    if($num > 0){
        echo "Email Already Exists";
    }else{
        $datet = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $datet-> setTimezone($tz);
        $date = $datet -> format('Y-m-d H:i:s');

        Database::iud("INSERT INTO `cutomer_details`(`fname`, `lname`, `mobile`, `email`,`r_date`, `psd`,`user_type_id`,`status_s_id`) VALUES ('$fname', '$lname', '$mobile', '$email','$date', '$passC','2','1')");
        echo "success";



}



}












?>