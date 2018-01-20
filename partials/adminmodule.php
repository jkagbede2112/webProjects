<?php

include 'connect.php';
session_start();
$staffid = $_SESSION['staffid'];
$action = purifyentry("action");

if ($action === "annsetting"){
    //pubstat:a, annid:b
    $annid = purifyentry("annid");
    $pubstat = purifyentry("pubstat");
    $la = mysqli_query($w,"update announcements set publishstatus='$pubstat' where annid='$annid'");
    if ($la){
        echo "Announcement setting updated";
    }else{
        echo "Could not update announcement setting";
    }
}

if ($action === "pulldetforupdate"){
    $patientid = purifyentry("patientid");
    $hq = "select * from patient_register where patientid='$patientid'";
    $kq = mysqli_query($w,$hq);
    $ka = mysqli_fetch_array($kq);
    $fn = $ka['firstname'];
    $ln = $ka['lastname'];
    $dob = $ka['dateofbirth'];
    $gender = $ka['gender'];
    $pn = $ka['phonenumber'];
    $hospid = $ka['hospitalid'];
    echo "<a>$hospid</a><b>$fn</b><c>$ln</c><d>$dob</d><e>$gender</e><f>$pn</f>";
}

if ($action === "getannouncements"){
    //msg: msg, dept: dept, start: start, end: end, stat: pubstatus
    $staffdept = getstaffdept($staffid);
    $today = date('Y-m-d');
    $qj = "select * from announcements where (targetdept='$staffdept' or targetdept='All') and publishstatus='2' and '$today' between startdate and enddate";
    $jq = mysqli_query($w, $qj);
    $rez = "";
    while ($jz = mysqli_fetch_array($jq)){
        $message = $jz['message'];
        $startdate = $jz['startdate'];
        $enddate = $jz['enddate'];
        $author = $jz['author'];
        $staffname = getstaffname($author);
        
        $rez .= "<div style='padding:5px; background-color:rgba(255,255,255,0.4); font-size:13px; border-radius:4px; margin-bottom:5px;'><div style='margin-bottom:10px;'></div>$message<div style='margin-top:5px; border-top-style:dashed; text-align:right; color:#8F4A94; border-top-width:thin; border-color:#cccccc; padding-top:5px; margin-top:5px'>$staffname</div></div>";
    }
    echo $rez;
}

if ($action === "saveann"){
    //msg: msg, dept: dept, start: start, end: end, stat: pubstatus
    $message = purifyentry("msg");
    $dept = purifyentry("dept");
    $start = purifyentry("start");
    $end = purifyentry("end");
    $pub = purifyentry("stat");
    
    $qj = "insert into announcements (message, targetdept, startdate, enddate, publishstatus, author) values ('$message','$dept','$start','$end','$pub','$staffid')";
    $jq = mysqli_query($w, $qj);
    if ($jq){
        echo "Announcement logged";
    }else{
        echo "Announcement not logged";
    }
}

if ($action === "saveinvestigation") {
    //action: action, investigation: a, private: b, corporate: c
    //lbresult:lbresult, ubresult:ubresult, resulttype:resulttype, invcate:invcate
    $investigation = purifyentry("investigation");
    $privateprice = purifyentry("private");
    $corporateprice = purifyentry("corporate");
    $invcat = purifyentry("invcat");
    $labunit = purifyentry("labunit");
    $lowboundary = purifyentry("lbresult");
    $upboundary = purifyentry("ubresult");
    $resulttype = purifyentry("resulttype"); //Freetext or drop down
    $invcategory = purifyentry("invcate"); //Stand-Alone and bundled

    $r = "insert into investigation_name (name, private, corporate, investigation_cat, rsltlowerb, rsltupperb, additionalinfo, rslttype, unit) values ('$investigation','$privateprice','$corporateprice','$invcat','$lowboundary','$upboundary','','$resulttype','$labunit')";
    $tg = mysqli_query($w, $r);
    if ($tg) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "pullinvestigation") {
    $v = "select * from investigation_name order by name asc";
    $q = mysqli_query($w, $v);
    $count = 1;
    while ($d = mysqli_fetch_array($q)) {
        $id = $d['investigation_nameid'];
        $name = $d['name'];
        $private = $d['private'];
        $corporate = $d['corporate'];
        echo "<tr><td>$count</td><td>$name</td><td>&#8358; " . $private . "</td><td>&#8358; " . $corporate . "</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deleteinvestigation(\"$id\")'></i></td></tr>";
        $count++;
    }
}

if ($action === "summaryvisits") {
    $hospitalid = purifyentry("hospitalid");
    //pull all logged visits
    $qga = "select * from checkinlog where hospitalid='$hospitalid'";
    $ah = mysqli_query($w, $qga);
    if (mysqli_num_rows($ah) > 0) {
        //Pull name and paymentplan
        $tq = "select * from patient_register where hospitalid='$hospitalid'";
        $bfq = mysqli_query($w, $tq);
        $bq = mysqli_fetch_array($bfq);
        $name = $bq['lastname'] . " " . $bq['firstname'];
        $patienttype = $bq['patienttype']; // HMO, Corporate, or private
        $paymentplan = $bq['paymentplan'];
        //Pullpayment plan
        $ba = mysqli_query($w, "select name from billingcategory where categoryid='$patienttype'");
        $baq = mysqli_fetch_array($ba);
        $plantype = $baq['name'];
        echo "<span style='font-size:25px' id='summNamesel'><span>$name</span> <span style='font-size:12px'>($plantype)</span></span>";
        //
        while ($cvb = mysqli_fetch_array($ah)) {
            $dateadded = $cvb['dateadded'];
            $visitid = $cvb['visitid'];
            echo "<div style='background-color:rgba(255,255,255,0.2); margin-bottom:5px; padding:10px; font-family:verdana; font-size:12px; cursor:pointer' onclick='pullsummary(\"$visitid\")' title='Get visit summary'>"
            . "<span style='background-color:#525252;padding:4px; font-size:11px; color:#ccc; border-radius:4px;'>Check-In date</span> - $dateadded"
            . "</div>";
        }
    } else {
        
    }
}

if ($action === "pullsummary") {
    $visitid = purifyentry("visitid");
    //Get checkin details
    $adv = mysqli_query($w, "select * from checkinlog where visitid='$visitid'");
    $ag = mysqli_fetch_array($adv);
    $visitdate = $ag['dateadded'];
    $checkin = $ag['checkintime'];
    $checkout = $ag['checkouttime'];
    
    //Get Dr. name;
    $pg = mysqli_query($w,"select * from consultation_queue where visitid ='$visitid'");
    $hq = mysqli_fetch_array($pg);
    
    $staff = $hq['doctorid'];
    $drname = "Dr. ". getstaffname($staff);

    $demographic = "<table class='table table-striped table-condensed table-bordered' style='margin-bottom:20px;'>"
            . "<tr><td style='width:150px'>Visit Date</td><td>$visitdate</td></tr>"
            . "<tr><td>Dr. attending</td><td>$drname</td></tr>"
            . "<tr><td>Check-In</td><td>$checkin</td></tr>"
            . "<tr><td>Check-Out</td><td>$checkout</td></tr>"
            . "</table>";

    //Pull Vitals, Complaints, Examination, Investigation, Diagnosis and prescription into bordered table
    //Get vitals first
    $ahv = mysqli_query($w, "select * from triage_vitals where visitid='$visitid'");
    $mt = mysqli_fetch_array($ahv);
    $bp = $mt['systolic'] . "/" . $mt['diastolic'];
    $temperature = $mt['temperature'];
    $heartrate = $mt['heartrate'];
    $oxygensat = $mt['oxygensaturation'];
    $respirationrate = $mt['respirationrate'];
    $vitals = "<table class='table table-bordered' style='margin-bottom:80px'><tr><td class='ttp'><div class='sumTitle'>Vital signs</div><ul>";
    $vitals .= "<li>Blood pressure - $bp (mmHg)</li>";
    $vitals .= "<li>Temperature - $temperature</li>";
    $vitals .= "<li>Heart rate - $heartrate</li>";
    $vitals .="<li>Oxygen saturation - $oxygensat</li>";
    $vitals .="<li>Respiration rate - $respirationrate</li>";
    $vitals .= "</td>";

    //Get Complaints
    $ahv = mysqli_query($w, "select * from consultation_complaints where visitid='$visitid'");
    $complaints = "<td class='ttp'><div class='sumTitle'>Complaints</div><ul>";
    while ($mt = mysqli_fetch_array($ahv)) {
        $complaint = $mt['complaint'];
        $duration = $mt['duration'];
        $history = $mt['history'];
        $complaints .= "<li>$complaint ($duration)</li>";
    }
    $complaints .="</td>";
    //Pull Vitals, Complaints, Examination, Investigation, Diagnosis and prescription into bordered table
    //Get investigation
    $ahv = mysqli_query($w, "select * from investigation_order where visitid='$visitid'");
    $investigation = "<td class='ttp'><div class='sumTitle'>Investigation</div><ul>";
    while ($mt = mysqli_fetch_array($ahv)) {
        $investigationid = $mt['investigationid'];
        $result = $mt['result'];
        //get investigationname;
        $sdcw = mysqli_query($w, "select name, unit from investigation_name where investigation_nameid ='$investigationid'");
        $ahf = mysqli_fetch_array($sdcw);
        $invname = $ahf['name'];
        $unit = $ahf['unit'];
        $investigation .= "<li>$invname ($result $unit)</li>";
    }
    $investigation .= "</td></tr>";

    //Get diagnosis
    $ahv = mysqli_query($w, "select * from consultation_diagnosis where visitid='$visitid'");
    $diagnosis = "<td class='ttp'><div class='sumTitle'>Diagnosis</div><ul>";
    while ($mt = mysqli_fetch_array($ahv)) {
        $diagnosisid = $mt['diagnosisid'];
        $comment = $mt['comment'];
        //get diagnosis name;
        $sdcw = mysqli_query($w, "select diagnosis from mshdiagnosis where diagnosisid ='$diagnosisid'");
        $ahf = mysqli_fetch_array($sdcw);
        $diagnosisname = $ahf['diagnosis'];
        $diagnosis .= "<li>$diagnosisname ($comment)</li>";
    }
    $diagnosis .= "</td>";

    //Get precription
    $ahv = mysqli_query($w, "select * from consultation_prescription where visitid='$visitid'");
    $prescription = "<td class='ttp' colspan='2'><div class='sumTitle'>Prescription</div><ul>";
    while ($mt = mysqli_fetch_array($ahv)) {
        $drugid = $mt['drugid'];
        $dosage = $mt['dosage'];
        //get diagnosis name;
        $sdcw = mysqli_query($w, "select brandname, genericname from pharmacy_drugs where pharma_drugsid ='$drugid'");
        $ahf = mysqli_fetch_array($sdcw);
        $drugname = $ahf['genericname'];
        $prescription .= "<li>$drugname ($dosage)</li>";
    }
    $prescription .= "</td></tr></table>";
    
    $signature = "<span style='display:inline-block; text-align:center'>---------------------------------<br>Signature</span>";

    echo $demographic . $vitals . $complaints . $investigation . $diagnosis . $prescription . $signature;
}

if ($action === "addstaff") {
//fname:fname, lname:lname, dob:dob, ms:ms, gender:gender, phone:phone, role:role, username:username, password:password
    $fname = purifyentry("fname");
    $lname = purifyentry("lname");
    $dob = purifyentry("dob");
    $ms = purifyentry("ms");
    $gender = purifyentry("gender");
    $phone = purifyentry("phone");
    $role = purifyentry("role");
    $username = purifyentry("username");
    $password = purifyentry("password");
    $tq = "insert into staff (firstname, lastname, dateofbirth, maritalstatus, gender, username, password, role, phonenumber) values "
            . "('$fname','$lname','$dob','$ms','$gender','$username','$password','$role','$phone')";
    $tz = mysqli_query($w, $tq);
    if ($tz) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "loadstaff") {
    $bg = "select staff.firstname, staff.lastname, staff.dateofbirth, staff.phonenumber, staff.maritalstatus, staff.gender, staff.username, staff.password, "
            . "staff.role, staff_category.categoryname from staff inner join staff_category on staff.role = staff_category.staff_categoryid order by staff.lastname asc";
    $b = mysqli_query($w, $bg);
    if (!$b) {
        echo "Bad query";
    }
    if (mysqli_num_rows($b) < 1) {
        echo "<tr style='background-color:rgba(0,0,0,0.1)'><td colspan='8' style='text-align:center; color:#fff'>No staff</td></tr>";
    }
    $count = 1;
    while ($xd = mysqli_fetch_array($b)) {
        $name = strtoupper($xd['lastname']) . " " . $xd['firstname'];
        $dob = $xd['dateofbirth'];
        $gender = $xd['gender'];
        $phonenumber = $xd['phonenumber'];
        $username = $xd['username'];
        $role = $xd['categoryname'];
        echo "<tr><td>$count</td><td>$name</td><td>$gender</td><td>$phonenumber</td><td>$username</td><td>$role</td><td>$dob</td><td><i class='fa fa-times red ptr'></i></td><td><i class='fa fa-reply-all green ptr' title='Update information'></i></td></tr>";
        $count++;
    }
}