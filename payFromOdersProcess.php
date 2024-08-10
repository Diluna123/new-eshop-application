<?php
session_start();

$onum =$_GET['onum'];
$_SESSION["orderNum"] = $onum;
echo "success";


?>