<?php

include "connect.php";
session_start();
$staffid = $_SESSION['staffid'];
//lm:lm, dob:dob, ms:ms, g:g, pn:pn, 
//ea:ea, o:o, hid:hid, nokn:nokn, noka:noka, nokp:nokp,pc:pc, pnn:pnn, plan:plan

$error = 0;

$action = purifyentry("action");

if ($action === "updateclient"){
    //hospid: hospid, fn: firstname, ln: lastname, dob: dob, gender: gender, pn: phonenumber
    $hospid = purifyentry("hospid");
    $fn = purifyentry("fn");
    $ln = purifyentry("ln");
    $dob = purifyentry("dob");
    $gender = purifyentry("gender");
    $pn = purifyentry("pn");
    $clientid = purifyentry("clientid");
    
    $o = "update patient_register set hospitalid='$hospid', firstname='$fn', lastname='$ln', gender='$gender', dateofbirth='$dob', phonenumber='$pn' where patientid='$clientid'";
    
   $gt =  mysqli_query($w, $o);
    if ($gt){
        echo "Update made";
        //Keep a record of this in log.
        $ka = "insert into clientrecupdate (hospidupdated, staffid) values ('$hospid','$staffid')";
        $ja = mysqli_query($w,$ka);
    }else{
        echo "Update not made";
    }
}

if ($action === "searchpatrec"){
    $hospid = purifyentry("hospid");
    $ja = "select * from patient_register where hospitalid like '%$hospid%'";
    $ka = mysqli_query($w,$ja);
    $count = 1;
    if (mysqli_num_rows($ka)<1){
        echo "<tr><td style='text-align:center; font-size:11px' colspan='10'>No records found</td></tr>";
        return;
    }
    while($lx = mysqli_fetch_array($ka)){
        $patientid = $lx['patientid'];
        $name = strtoupper($lx['lastname']) . " " . $lx['firstname'];
        $hospid = $lx['hospitalid'];
        $gender = $lx['gender'];
        $dob = $lx['dateofbirth'];
        $age = computeagefromhospid($hospid);
        $mstatus = $lx['maritalstatus'];
        $phonenumber = $lx['phonenumber'];
        $dateadded = $lx['dateadded'];
        $count++;
        echo "<tr style='font-size:11px;'><td height='25'>$count</td><td>$name</td><td>$hospid</td><td>$gender</td><td>$dob</td><td>$age</td><td>$mstatus</td><td>$phonenumber</td><td>$dateadded</td><td><i class='fa fa-recycle ptr' title='update info' data-target='#myModal' data-toggle='modal' onclick='updateInfo(\"$patientid\")'></i></td></tr>";
    }
}

if ($action === "checkout") {
    $visitid = purifyentry("visitid");
    $timenow = timenow();
    $datenow = datenow();
    $ag = "update checkinlog set checkouttime='$timenow', checkoutdate='$datenow' where visitid='$visitid'";
    $q = mysqli_query($w, $ag);
    if ($q) {
        echo "Checked out.";
    } else {
        echo "Not checked out";
    }
}

if ($action === "add") {
    $lastname = purifyentry("lm");
    $firstname = purifyentry("fn");
    $maritalstatus = purifyentry("ms");
    $dob = purifyentry("dob");
    $gender = purifyentry("g");
    $pn = purifyentry("pn");
    $ea = purifyentry("ea");
    $occupation = purifyentry("o");
    $hid = purifyentry("hid");
    $nokn = purifyentry("nokn");
    $noka = purifyentry("noka");
    $nokp = purifyentry("nokp");
    $plan = purifyentry("plan");
    $pc = purifyentry("pc");
    $nokr = purifyentry("nokr");

    if (strlen($lastname) < 1) {
        echo "Last name is required, ";
        $error++;
    }
    if (strlen($firstname) < 1) {
        echo "First name is required, ";
    }
    if (strlen($dob) < 1) {
        echo "Date Of Birth is required, ";
    }
    if (strlen($gender) < 1) {
        echo "Gender is required, ";
    }
    if (strlen($dob) < 1) {
        echo "Date Of Birth is required, ";
    }

    if ($error > 0) {
        return;
    } else {
        //Save to database
        $t = "insert into patient_register (hospitalid, maritalstatus, firstname, othername, lastname, gender, address, phonenumber, emailaddress, dateofbirth, occupation, patienttype, paymentplan, nokname, nokaddress, nokphonenumber, nokrelationship, staffid) values"
                . " ('$hid','$maritalstatus','$firstname','','$lastname','$gender','','$pn','$ea','$dob','$occupation','$pc','','$nokn','$noka','$nokp','$nokr','$staffid')";
        $sd = mysqli_query($w, $t);
        if ($sd) {
            echo "Saved";
        } else {
            echo "Not saved";
        }
    }
}

if ($action === "search") {
    $fieldname = purifyentry("fieldname");
    $fieldvalue = purifyentry("value");

    $tr = "select * from patient_register where $fieldname like '%$fieldvalue%' limit 10";
    $hf = mysqli_query($w, $tr);
    if (mysqli_num_rows($hf) < 1) {
        echo "<tr><td colspan='4' style='text-align:center'>Search returned nothing</td></tr>";
    }
    while ($xs = mysqli_fetch_array($hf)) {
        $patientname = strtoupper($xs['lastname']) . " " . $xs['firstname'];
        $hospitalid = $xs['hospitalid'];
        $gender = $xs['gender'];
        $phone = $xs['phonenumber'];

        echo "<tr class='ptr thov' onclick='pullextradetails(\"$hospitalid\")'><td>$patientname</td><td>$hospitalid</td><td>$gender</td><td>$phone</td></tr>";
    }
}

if ($action === "checkin") {
    $hospitalid = purifyentry("hospitalid");

    //Generate unique visit ID - A concatenate of date, hour(time) and hospitalid
    $datetime = date("jmy");
    $visitid = $datetime . "$" . $hospitalid;
    //echo $datetime;
    $date = datenow();
    $time = timenow();

    $c = "insert into checkinlog (hospitalid, visitid, checkintime, checkindate, staffid) values ('$hospitalid','$visitid','$time','$date','$staffid')";
    $ew = mysqli_query($w, $c);
    if ($ew) {
        echo "<span style='font-size:16px; color:blue'>Checked-In</span>";
        //Send now to vitals
        $c = "insert into triage_queue (visitid, checkintime, checkindate) values ('$visitid','$time','$date')";
        $ew = mysqli_query($w, $c);
        echo "<span>---> Proceed to Vitals.</span>";
    } else {
        echo "<span style='font-size:16px; color:red'>Not Checked-In <span style='font-size:12px'> ( may have checked in earlier today)</span></span>";
    }
}

if ($action === "pullfulldets") {
    $hospitalid = purifyentry("hospitalid");

    $tr = "select * from patient_register where hospitalid = '$hospitalid'";
    $hf = mysqli_query($w, $tr);
    if (mysqli_num_rows($hf) < 1) {
        echo "<tr><td colspan='2' style='text-align:center'>Search returned nothing</td></tr>";
    }
    $xs = mysqli_fetch_array($hf);
    $patientname = strtoupper($xs['lastname']) . " " . $xs['firstname'];
    $address = $xs['address'];
    $patienttype = $xs['patienttype'];
    $patientplan = $xs['paymentplan'];
    $hospitalid = $xs['hospitalid'];
    $gender = $xs['gender'];
    $phone = $xs['phonenumber'];

    //Get payment category
    $ga = "select * from billingcategory where categoryid='$patienttype'";
    $xg = mysqli_query($w, $ga);
    $zg = mysqli_fetch_array($xg);
    $categoryname = $zg['name'];

    echo "<div style='text-align:right; margin-bottom:5px'>Appointment</div>"
    . "<table class='table-bordered ptr thov' style='width:100%; margin-bottom:10px; font-size:13px'>"
    . "<tr><td class='bold'>Name</td><td>$patientname</td></tr>"
    . "<tr><td class='bold'>Phone</td><td>$phone</td></tr>"
    . "<tr><td class='bold'>Address</td><td>$address</td></tr>"
    . "<tr><td class='bold'>Gender</td><td>$gender</td></tr>"
    . "<tr><td class='bold'>Pay plan</td><td>$categoryname</td></tr>"
    . "</table>"
    . "<input type='button' value='Check-In' class='btn reset' onclick='checkin(\"$hospitalid\")'> <span id='serverdump'></span>";
}