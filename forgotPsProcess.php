<?php

use PHPMailer\PHPMailer\PHPMailer;

include "connection.php";
include "email_send/Exception.php";
include "email_send/SMTP.php";
include "PHPMailer.php";
$email = $_POST['email'];

if (empty($email)) {
    echo "Please Enter Your Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email";
} else {
    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `email` = '$email'");
    $num = $rs->num_rows;
    if ($num == 0) {
        echo "Email Does Not Exist";
    } else {

        // verification code genarate and send to mail section

        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $codeLength = 12;
        $code = '';

        for ($i = 0; $i < $codeLength; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }
        Database::iud("UPDATE `cutomer_details` SET `v_code` ='" . $code . "' WHERE `email` ='" . $email . "'");

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dilunasithija111@gmail.com';
        $mail->Password = 'zuutgguqzhyaylpj';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('dilunasithija111@gmail.com', 'Reset Password');
        $mail->addReplyTo('dilunasithija111@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Black 42 Email Verification';
        $bodyContent = '
        <body style="font-family: "Roboto", sans-serif; background-color: #ffffff; padding: 20px; color: #000000;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #000000; border: 1px solid #dddddd; border-radius: 5px; padding: 20px; color: #ffffff;">
        <h2 style="color: #FFC700; text-align: center;">Black 42 Password Reset Verification</h2>
        <p>Hello,</p>
        <p>We received a request to reset your password. Use the verification code below to reset it:</p>
        <div style="text-align: center; margin: 20px 0;">
            <span style="display: inline-block; background-color: #FFC700; color: #000000; padding: 10px 20px; font-size: 18px; font-weight: bold; border-radius: 5px;">' . $code . ' </span>
        </div>
        <p>If you did not request a password reset, please ignore this email.</p>
        <p>Thank you,</p>
        <p>The Black 42 Team</p>
    </div>
</body>

        
       ';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ('verfication code sending failed');
        } else {
            echo ('success');
        }
    }
}
