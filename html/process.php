<?php

session_start(); 

include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

$securimage = new Securimage();

if( $securimage->check($_POST['captcha_code']) == false ) {
	echo "The security code entered was incorrect.";
	//exit;
}
//if(isset($_POST['name'], $_POST['company'], $_POST['email'], $_POST['tel'], $_POST['cf_field_5'])){
elseif( isset($_POST['name'], $_POST['company'], $_POST['email'], $_POST['tel'], $_POST['cf_field_5']) ){
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $message = $_POST['cf_field_5'];

    $to = 'gctmurray@gmail.com';
    $subject = "[WEBSITE CONTACT]";
    $body = "A new contact form entry has been received from gilesmurray.com. Details are as follows.\r\n\r\n";
    $body .= "Name: ".$name."\r\n";
    $body .= "Company: ".$company."\r\n";
    $body .= "Email: ".$email."\r\n";
    $body .= "Phone: ".$tel."\r\n";
    $body .= "Message: ".$message."\r\n";
    if( mail($to, $subject, $body, 'From: no-reply@gilesmurray.com') )
        echo 'sent';
    else
        echo 'There was an error with your submission. Please try again.';
        //echo 'error';
}
else die("You cannot directly access this page");
?>
