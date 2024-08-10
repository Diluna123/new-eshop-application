<?php
session_start();

include 'connection.php';
$id = $_SESSION['user']['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mobile = $_POST['mobile'];
$address = $_POST['adress'];
$province = $_POST['prov'];
$distric = $_POST['distric'];
$city = $_POST['city'];
$zip = $_POST['zip'];

if (empty($fname)) {
    echo "Please enter first name";
} else  if (empty($lname)) {
    echo "Please enter last name";
} else  if (empty($mobile)) {
    echo "Please enter mobile number";
} else if (strlen($mobile) != 10) {
    echo ("Your mobile must contain 10 characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("Your mobile number is not valid.");
} else if (empty($address)) {
    Database::iud("UPDATE `cutomer_details` SET `fname` = '$fname',`lname` = '$lname',`mobile` = '$mobile' WHERE `id` = '$id'");
    if (sizeof($_FILES) == 1) {

        $image = $_FILES["edImg"];
        $image_extension = $image["type"];

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        if (in_array($image_extension, $allowed_image_extensions)) {
            $new_img_extension;

            if ($image_extension == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($image_extension == "image/png") {
                $new_img_extension = ".png";
            } else if ($image_extension == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $file_name = "pro_img//" . $fname . "_" . uniqid() . $new_img_extension;
            move_uploaded_file($image["tmp_name"], $file_name);

            $profile_img_rs = Database::search("SELECT * FROM `pr_img` WHERE `cutomer_details_id`='" . $id . "'");

            if ($profile_img_rs->num_rows == 1) {


                Database::iud("UPDATE `pr_img` SET `img`='" . $file_name . "' WHERE `cutomer_details_id`='" . $id . "'");
                echo "success";
            } else {

                Database::iud("INSERT INTO `pr_img`(`cutomer_details_id`,`img`) VALUES ('" . $id . "','" . $file_name . "')");
                echo "success";
            }
        }
    } else if (sizeof($_FILES) == 0) {

        echo ("success");
    } else {
        echo ("You must select only 01 profile image.");
    }
   
} else {
    $rs = Database::search("SELECT * FROM `ad_book` WHERE `cutomer_details_id` = '$id'");
    if ($rs->num_rows > 0) {
        Database::iud("UPDATE `cutomer_details` SET `fname` = '$fname',`lname` = '$lname',`mobile` = '$mobile' WHERE `id` = '$id'");


        Database::iud("UPDATE `ad_book` SET `address` = '$address',`city` = '$city',`zip` = '$zip',`province_p_id` = '$province',`distric_d_id` = '$distric' WHERE `cutomer_details_id` = '$id'");
    } else {
        Database::iud("INSERT INTO `ad_book` (`cutomer_details_id`,`address`,`city`,`zip`,`province_p_id`,`distric_d_id`) VALUES ('$id','$address','$city','$zip','$province','$distric')");
    }
    if (sizeof($_FILES) == 1) {

        $image = $_FILES["edImg"];
        $image_extension = $image["type"];

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        if (in_array($image_extension, $allowed_image_extensions)) {
            $new_img_extension;

            if ($image_extension == "image/jpeg") {
                $new_img_extension = ".jpeg";
            } else if ($image_extension == "image/png") {
                $new_img_extension = ".png";
            } else if ($image_extension == "image/svg+xml") {
                $new_img_extension = ".svg";
            }

            $file_name = "pro_img//" . $fname . "_" . uniqid() . $new_img_extension;
            move_uploaded_file($image["tmp_name"], $file_name);

            $profile_img_rs = Database::search("SELECT * FROM `pr_img` WHERE `cutomer_details_id`='" . $id . "'");

            if ($profile_img_rs->num_rows == 1) {


                Database::iud("UPDATE `pr_img` SET `img`='" . $file_name . "' WHERE `cutomer_details_id`='" . $id . "'");
                echo "success";
            } else {

                Database::iud("INSERT INTO `pr_img`(`cutomer_details_id`,`img`) VALUES ('" . $id . "','" . $file_name . "')");
                echo "success";
            }
        }
    } else if (sizeof($_FILES) == 0) {

        echo ("success");
    } else {
        echo ("You must select only 01 profile image.");
    }
}
