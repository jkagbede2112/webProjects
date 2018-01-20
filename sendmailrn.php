<?php

include 'partials/connect.php';
include 'sendmail.php';

sendsundayreport();
$weekday = date("D");
//Check if there is already a mail sent today

$today = datenow();
$mailtype = "weeklyreport";
$q = mysqli_query($w, "select * from maillog where senddate='$today' and mailtype='$mailtype'");
if (mysqli_num_rows($q) > 0) {
    
} else {
    if ($weekday === "Sun"){
        sendsundayreport();
        //insert into maillog after sending mail
        $jq = mysqli_query($w,"insert into maillog (senddate, mailtype) values ('$today','$mailtype')");
    }
    //update maillog after sending mail
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

