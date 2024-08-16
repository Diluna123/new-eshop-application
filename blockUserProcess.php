<?php
 include "connection.php";

 $pidc= $_GET["uid"];
 $rs = Database::search('SELECT * FROM `cutomer_details` WHERE `id` = "'.$pidc.'"');
 $data = $rs->fetch_assoc();
 if($data["status_s_id"] == 1){
    Database::iud('UPDATE `cutomer_details` SET `status_s_id` = "2" WHERE `id` = "'.$pidc.'"');
    echo "success";
 }else if($data["status_s_id"] == 2){
    Database::iud('UPDATE `cutomer_details` SET `status_s_id` = "1" WHERE `id` = "'.$pidc.'"');
    echo "success";
 }

 
 




?>