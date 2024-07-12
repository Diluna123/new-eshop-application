<?php

include "connection.php";

$cName = $_POST["newColour"];

if(empty($cName)){
    echo "Please Enter Colour Name";
}else{
    $res= Database::search("SELECT * FROM `colour` WHERE `colour_name` = '$cName'");
    $res_num = $res->num_rows;
    if($res_num > 0){
        echo "Colour Already Exists";

    }else{

        Database::iud("INSERT INTO `colour` (`colour_name`) VALUES ('$cName')");
        echo "success";
    }

}







?>