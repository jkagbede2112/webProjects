<?php
//subject:a, message:b
include 'connect.php';
include '../sendmail.php';
session_start();
$staffid = $_SESSION['staffid'];

$action = purifyentry("action");

if ($action === "mailissues"){
	$subject = "TerveCure COMPLAINT - ".purifyentry("subject");
	$staffname =  getstaffname($staffid) ;
$message = "Reported by ".$staffname ."<br><br>".purifyentry("message");

//Send message
$recipient = "kayode@thepurplesource.com";
    sendmail($recipient, $subject, $message);
}
