<?php

include 'connect.php';
include '../sendmail.php';
$todaydate = datenow();
$todaydate1off = date('Y-m-d', (strtotime('-1 day', strtotime($todaydate))));

//getall details from yesterday
$ka = "select * from checkinlog where checkindate='$todaydate1off'";
$ma = mysqli_query($w, $ka);
$tab = "Hello, please find below visit report for $todaydate1off<br><br><span style='background-color:#EEEEEE; font-family:verdana; display:inline-block; width:600px; padding:10px'><table style='width:100%;'><tr style='font-size:14px;background-color:#cccccc'><td></td><td>Patient Name</td><td>Type</td><td>Phone number</td><td>Visit Date</td></tr>";
$count = 1;
while ($aq = mysqli_fetch_array($ma)) {
    $hospitalid = $aq['hospitalid'];
    $visitid = $aq['visitid'];
    $phone = getclientphone($hospitalid);
    $patientname = getnamefromvisitid($visitid);
    $clienttype = getclienttypefromvisitid($visitid);
    $visitdate = getvisitdatefromvisitid($visitid);
    $tab .= "<tr style='background-color:#fff; font-size:13px'><td>$count</td><td>$patientname</td><td>$clienttype</td><td>$phone</td><td>$visitdate</td></tr>";
    $count++;
}
$tab .= "</table></span> Thanks.. Sent by terveCure EMR on $todaydate";
$recipient = "kayode@thepurplesource.com";
$subject = "Mushin Daily report for $todaydate1off";

//First check if mail already sent
$jsv= mysqli_query($w,"select * from maillog where mailtype='DailyReport' and senddate='$todaydate'");
if (mysqli_num_rows($jsv)> 0){
    //echo "Mail sent already";
    return;
}

$c = sendmail($recipient, $subject, $tab);
if ($c === "Message saved"){
    //insert into maillog
    $kka = mysqli_query($w,"insert into maillog (senddate, mailtype) values ('$todaydate','DailyReport')");
}

function getclientphone($hospid) {
    global $w;
    $za = "select phonenumber from patient_register where hospitalid='$hospid'";
    $x = mysqli_query($w, $za);
    $qa = mysqli_fetch_array($x);
    $phone = $qa['phonenumber'];

    return $phone;
}
