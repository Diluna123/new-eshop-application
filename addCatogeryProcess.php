<?php
include 'connection.php';
$catName = $_POST["newCat"];

if(empty($catName)){
    echo "Please Enter Catogery Name First";
}else{
    $res = Database::search("SELECT * FROM `catogerys` WHERE `catogery_name` = '$catName'");
    $nums = $res->num_rows;
    if($nums > 0){
        echo "Catogery Already Exists";
    }else{
        Database::iud("INSERT INTO `catogerys` (`catogery_name`) VALUES ('$catName')");
        echo "success";
    }
}












?>