<?php

//include 'partials/connect.php';
$todaydate = datenow();
$todaydate1off = date('Y-m-d', (strtotime('-1 day', strtotime($todaydate))));
$todaydate2off = date('Y-m-d', (strtotime('-2 day', strtotime($todaydate))));
$todaydate3off = date('Y-m-d', (strtotime('-3 day', strtotime($todaydate))));
$todaydate4off = date('Y-m-d', (strtotime('-4 day', strtotime($todaydate))));
$todaydate5off = date('Y-m-d', (strtotime('-5 day', strtotime($todaydate))));
$todaydate6off = date('Y-m-d', (strtotime('-6 day', strtotime($todaydate))));
$todaydate7off = date('Y-m-d', (strtotime('-7 day', strtotime($todaydate))));
$todaydate8off = date('Y-m-d', (strtotime('-8 day', strtotime($todaydate))));
$todaydate9off = date('Y-m-d', (strtotime('-9 day', strtotime($todaydate))));
$todaydate10off = date('Y-m-d', (strtotime('-10 day', strtotime($todaydate))));

$days7ago = date('Y-m-d', (strtotime('-7 day', strtotime($todaydate))));
$todaydate2weeksoff = date('Y-m-d', (strtotime('-14 day', strtotime($todaydate))));


function pullrecrudvisitdates($hospitalid, $datefrom, $dateto) {
    GLOBAL $w;
    $dates = "";
    $qv = "select checkindate from checkinlog where hospitalid='$hospitalid' and checkindate between '$datefrom' and '$dateto'";
    $jq = mysqli_query($w, $qv);
    while ($pa = mysqli_fetch_array($jq)) {
        $dates .= $pa['checkindate'] . " - ";
    }
    return $dates;
}

function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function getdrugsbill($dateto, $datefrom) {
    global $w;

    //echo "$datefrom to $dateto <br><br>";
    $a = "select * from pharmacy_drugmovement where movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
    //echo $a;
    $qk = mysqli_query($w, $a);
    if (mysqli_num_rows($qk) < 1) {
        return "<div>No records found</div>";
    }
    $count = 1;
    $private = 0;
    $company = 0;
    $HMO = 0;
    $NHIS = 0;
    $all = 0;
    while ($h = mysqli_fetch_array($qk)) {
        $drugid = $h['drugid'];
        $visitid = $h['visitid'];
        //Get patient type
        $clienttype = getclienttypefromvisitid($visitid);
        $drugprice = getdrugpriceunitprice($drugid, $clienttype);
        $qty = $h['qtymoved'];
        $price = $qty * $drugprice;
        $left = $h['qtyleft'];
        $drugname = getdrugname($drugid);
        $patientname = getnamefromvisitid($visitid);
        $hospid = gethospitalidfromvisitid($visitid);
        $visitdate = getvisitdatefromvisitid($visitid);
        if ($clienttype === "HMO") {
            $HMO += $price;
            $all += $price;
        }
        if ($clienttype === "NHIS") {
            $NHIS += $price;
            $all += $price;
        }
        if ($clienttype === "Private") {
            $private += $price;
            $all += $price;
        }
        if ($clienttype === "Company") {
            $company += $price;
            $all += $price;
        }
    }
    $proc = number_format($all, 2);
    return "<div style='font-family:verdana; padding:10px; background-color:#eeeeee; margin-top:5px; margin-bottom:5px; font-size:12px'><span style='font-size:16px; font-weight:500; color:#8D4992'>Dispensary report between $datefrom and $dateto</span> ( Private and corporate clients only )<div style='font-size:20px; text-align:center'>Total amount - NGN $proc </div>- NGN $private - Private <br>- NGN $company - Company <br>- NGN $NHIS - NHIS <br>- NGN $HMO - HMO</div>";
}

function getrecrudescenceemail($startdate, $enddate) {
    GLOBAL $w;
    $datefrom = $startdate;
    $dateto = $enddate;

    $qc = mysqli_query($w, "select hospitalid from checkinlog where checkindate between '$datefrom' and '$dateto'");
    $jv = mysqli_num_rows($qc);

    $qb = "select distinct(hospitalid) from checkinlog where checkindate between '$datefrom' and '$dateto'";
    $q = mysqli_query($w, $qb);
    $jq = mysqli_num_rows($q);
    $distinctvisits = $jq;
    $count = 0;
    $returnvisits = 0;
    $displayv = "";
    $visitdate = "";
    $hospitalid = "";
    while ($hqa = mysqli_fetch_array($q)) {
        $hospitalid = $hqa['hospitalid'];

        //Get number of times client visited
        $hqh = mysqli_query($w, "select * from checkinlog where hospitalid='$hospitalid' and checkindate between '$datefrom' and '$dateto'");
        $mq = mysqli_fetch_array($hqh);
        //getclienttypefromvisitid
        $visitid = $mq['visitid'];
        $patienttype = getclienttypefromvisitid($visitid);
        $visittimes = mysqli_num_rows($hqh);
        if ($visittimes > 1) {
            $clientname = getnamefromhospitalid($hospitalid);
            $age = computeagefromhospid($hospitalid);
            $visitdate = pullrecrudvisitdates($hospitalid, $datefrom, $dateto);
            //Get visit times
            $count++;
            if (($count % 2) > 0) {
                $displayv .= "<tr style='background-color:rgba(255,255,255,0.4); height:20px'><td>$count</td><td>$clientname</td><td>$hospitalid</td><td>$age</td><td>$patienttype</td><td>$visittimes</td><td>$visitdate</td></tr>";
            } else {
                $displayv .= "<tr style='background-color:rgba(0,0,0,0.1); height:20px'><td>$count</td><td>$clientname</td><td>$hospitalid</td><td>$age</td><td>$patienttype</td><td>$visittimes</td><td>$visitdate</td></tr>";
            }
        }
    }
    $tod = datenow();
    $display = "<div style=' background-color:#eeeeee; padding:10px; font-family:raleway; margin-bottom:5px;'><div><br><span style='font-size:16px; font-weight:500; color:#8D4992'>MUSHIN recrudescence report (<span style='font-size:16px'>$datefrom <span style='font-size:11px'>to</span> $dateto</span>)</span>"
            . "<div><span style='font-size:25px'>$jv</span> total visits - "
            . "<span style='font-size:25px'>$jq</span> unique visits. - "
            . "<span style='font-size:25px'>$count</span> revisits</div></div><br>"
            . "<table class='table table-bordered table-condensed' border='0' style='width:100%; font-size:13px; font-family:raleway'><tr style='font-weight:400; color:#fff; background-color:rgba(0,0,0,0.3); height:20px'><td></td><td>Name</td><td>Hospital ID</td><td>Age</td><td>Patient type</td><td>Visit count</td><td>Visit date(s)</td></tr>";
    return $display . $displayv . "</table></div>";
}

function getlabtests($date){
    global $w;
    $formdate = date("Y-d-m", strtotime($date) );
    $h = mysqli_query($w,"select * from investigation_order where dateadded like '%$formdate%'");
    $num = mysqli_num_rows($h);
    return $num;
}

function computecashcollectionlab($datefrom, $dateto){
    global $w;
    $datevalues = date_range($todaydate7off, $todaydate);
}

function computecashcollectionconsultation($datefrom, $dateto){
    global $w;
    $datevalues = date_range($todaydate7off, $todaydate);
    
}

function getlabutilization() {
    GLOBAL $w, $todaydate, $todaydate7off, $todaydate2weeksoff;
    $todaysdate = datenow();
    $datevalues = date_range($todaydate7off, $todaydate);

    $qj = mysqli_query($w, "select * from investigation_queue where checkindate between '$todaydate7off' and '$todaysdate'");
    $qx = mysqli_num_rows($qj);

    $qr = mysqli_query($w, "select * from investigation_order where dateadded between '$todaydate7off' and '$todaysdate'");
    $qq = mysqli_num_rows($qr);
    
    $lab1 = getlabtests($datevalues[0]);
    $lab2 = getlabtests($datevalues[1]);
    $lab3 = getlabtests($datevalues[2]);
    $lab4 = getlabtests($datevalues[3]);
    $lab5 = getlabtests($datevalues[4]);
    $lab6 = getlabtests($datevalues[5]);
    $lab7 = getlabtests($datevalues[6]);

    return "<div style='padding:10px; background-color:#e6e6e6; margin-bottom:5px; margin-top:5px'>"
            . "<div style='font-size:16px; font-weight:500; color:#8D4992; margin-bottom:10px'>Lab utilization report ( $todaydate7off to $todaysdate )</div>$qx unique investigation requests <br> $qq lab tests ordered<br><table style='margin-top:5px; font-size:13px; width:100%' border='1'>"
            . "<tr style='text-align:center'><td>$datevalues[0]</td><td>$datevalues[1]</td><td>$datevalues[2]</td><td>$datevalues[3]</td><td>$datevalues[4]</td><td>$datevalues[6]</td><td>$datevalues[7]</td></tr>"
            . "<tr style='text-align:center'><td>$lab1</td><td>$lab2</td><td>$lab3</td><td>$lab4</td><td>$lab5</td><td>$lab6</td><td>$lab7</td></tr>"
            . "</table>"
            . "</div>";
}

function sendsundayreport() {
    $todaysdate = datenow();
    GLOBAL $todaydate7off, $todaydate2weeksoff, $days7ago;
    //echo $todaydate7off;
    $messagetosend = "<span style='font-family:verdana; font-size:12px'>Hello,<br><br>Here is a TerveCure report for the past week and a recrudescence report from 2 weeks ago.<br><br>";
    //Get visit history
    $messagetosend .= getvisits($todaysdate, $days7ago);
    //Get drugspurchase
    $messagetosend .= getdrugsbill($todaysdate, $todaydate7off);
    //Laboratory reports
    $messagetosend .= getlabutilization();
    //Add recrudescence report to message
    $messagetosend .= getrecrudescenceemail($todaydate2weeksoff, $todaysdate);
    //Append weekly usage report
    $messagetosend .= "<div style='padding:10px; background-color:#eee; margin-bottom:5px'><span style='font-size:16px; font-weight:500; color:#8D4992'>EMR Usage and Wait Time report</span><br>" . getweeklyusage($todaysdate) . "<div style='margin-bottom:20px'></div></div>";
    //Append all registrations to the email message
    $messagetosend .= "<div>" . getregistrations($todaysdate, $days7ago) . "</div></span>";
    $messagetosend .= "TerveCure Report generate date - $todaysdate";
    echo $messagetosend;
    $recipient = "kayode@thepurplesource.com";
    $subject = "TerveCure Weekly reports";
    //sendmail($recipient, $subject, $messagetosend);
}

function getvisits($today, $offdate) {
    global $w;
    $date = date_create($today);
    $dateoff = date_create($offdate);
    $todaydatetime = date_format($date, "Y/m/d H:i:s");
    $datetimeoff7days = date_format($dateoff, "Y/m/d H:i:s");
    //echo $datetimeoff7days . " is 7 day off date";
    $query = "select * from checkinlog where dateadded between '$datetimeoff7days' and '$todaydatetime'";
    //echo $query;
    $qj = mysqli_query($w, $query);
    //Patient count
    $pcount = mysqli_num_rows($qj);
    //Get hospid from checkinlog
    $private = 0;
    $NHIS = 0;
    $Company = 0;
    $HMO = 0;
    while ($qx = mysqli_fetch_array($qj)) {
        $hospid = $qx['hospitalid'];
        //get patienttype
        $ptype = getclienttypefromhospid($hospid);
        if ($ptype === "Private") {
            $private++;
        }
        if ($ptype === "NHIS") {
            $NHIS++;
        }
        if ($ptype === "Company") {
            $Company++;
        }
        if ($ptype === "HMO") {
            $HMO++;
        }
    }

    $registrationstable = "<div style='background-color:#eeeeee; padding:10px; font-family:raleway; margin-bottom:5px;'><div style='font-size:16px; font-weight:500; margin-bottom:20px; color:#8D4992'>$pcount visits ($offdate to $today)</div>";
    //Get the types of patients we have
    $registrationstable .= "$private - Private , $Company - Company, $HMO - HMO, $NHIS - NHIS";

    return $registrationstable . "</div>";
}

function getregistrations($today, $offdate) {
    global $w;
    $date = date_create($today);
    $dateoff = date_create($offdate);
    $todaydatetime = date_format($date, "Y/m/d H:i:s");
    $datetimeoff7days = date_format($dateoff, "Y/m/d H:i:s");
    //echo $datetimeoff7days . " is 7 day off date";
    $count = 0;
    $query = "select * from patient_register where dateadded between '$datetimeoff7days' and '$todaydatetime'";
    //echo $query;
    $qj = mysqli_query($w, $query);
    //Patient count
    $pcount = mysqli_num_rows($qj);

    $registrationstable = "<div style=' background-color:#eeeeee; padding:10px; font-family:raleway; margin-bottom:5px;'><div style='font-size:16px; font-weight:500; margin-bottom:20px; color:#8D4992'>$pcount Registrations ($offdate to $today)</div>";
    //Get the types of patients we have
    $report = "";
    $qza = mysqli_query($w, "select * from billingcategory");
    while ($qaq = mysqli_fetch_array($qza)) {
        $catid = $qaq['categoryid'];
        $catname = $qaq['name'];

        $queryq = mysqli_query($w, "select * from patient_register where patienttype='$catid' and dateadded between '$datetimeoff7days' and '$todaydatetime'");
        $qb = mysqli_num_rows($queryq);
        $registrationstable .= "<span style='margin-right:5px; background-color:#fff; padding:5px; font-size:14px'>" . $catname . " - " . $qb . "</span>";
    }
    return $registrationstable . "</div>";
}

function getweeklyusage($useday) {
    error_reporting(0);
    GLOBAL $todaydate, $todaydate1off, $todaydate2off, $todaydate3off, $todaydate4off, $todaydate5off, $todaydate6off, $todaydate7off;
    $usetoday = getcase($todaydate);
    $todaydate1off = getcase($todaydate1off);
    $todaydate2off = getcase($todaydate2off);
    $todaydate3off = getcase($todaydate3off);
    $todaydate4off = getcase($todaydate4off);
    $todaydate5off = getcase($todaydate5off);
    $todaydate6off = getcase($todaydate6off);
    $todaydate7off = getcase($todaydate7off);

    return "<hr><div style='padding:5px; font-weight:600; border-style:dashed; border-width:thin; border-color:#858585; font-size:13px'>FD-Front desk, VS - Vital Signs, CS - Consultation, PH - Pharmacy, Lab - Laboratory</div><table class='table-striped' border='0' style='font-family:raleway; font-size:13px; margin-top:10px; width:100%'><tr style='font-weight:400; background-color:rgba(0,0,0,0.3); height:25px;'><td>Date</td><td>Usage report</td><td>Average Wait time</td><td></td></tr>$usetoday $todaydate1off $todaydate2off $todaydate3off $todaydate4off $todaydate5off $todaydate6off $todaydate7off</table>";
}

//echo "$todaydate1off $todaydate2off $todaydate3off $todaydate4off $todaydate5off";
//getusageday($todaydate5off)
function getcase($checkindate) {
    GLOBAL $w, $todaydate;
    $usereport = "";
    $awt = "";
//getdata from fd
    $hq = mysqli_query($w, "select * from checkinlog where dateadded like '%$checkindate%'");
    $fdusecount = mysqli_num_rows($hq);
    $usereport .= "FD:$fdusecount, ";
//Get data from vitals
    $hq = mysqli_query($w, "select * from triage_queue where checkindate='$checkindate' and checkouttime <> '0000-00-00'");
    $usecount = mysqli_num_rows($hq);
    $usereport .= "VS:$usecount, ";
    //Get data from consultation
    $hq = mysqli_query($w, "select * from consultation_queue where checkindate='$checkindate' and checkouttime <> '0000-00-00'");
    $usecount = mysqli_num_rows($hq);
    $usereport .= "CS:$usecount, ";
    //Get data from laboratory
    $hq = mysqli_query($w, "select * from investigation_queue where checkindate='$checkindate' and checkouttime <> '0000-00-00'");
    $usecount = mysqli_num_rows($hq);
    $usereport .= "Lab:$usecount, ";
    //Get data from pharmacy
    $hq = mysqli_query($w, "select * from pharmacy_queue where checkindate='$checkindate' and checkouttime <> '0000-00-00'");
    $usecount = mysqli_num_rows($hq);
    $usereport .= "PH:$usecount";

    //Getstaffonduty
    $staffonduty = getstaffnamefromdate($checkindate);

    //wt computation
    $q = "select visitid, checkintime, checkindate, checkouttime from checkinlog where checkindate='$checkindate'";
    $as = mysqli_query($w, $q);
    $count = 1;
    $timeinminutes = 0;

    $wtd = 0;
    while ($xx = mysqli_fetch_array($as)) {
        $checkintime = $xx['checkintime'];
        $checkouttime = $xx['checkouttime'];
        $checkindate = $xx['checkindate'];
        $visitid = $xx['visitid'];

        if ($checkouttime === "00:00:00" && $checkindate != $todaydate) {
            $qb = "update checkinlog set checkouttime='23:00:00', checkoutdate='$checkindate' where visitid='$visitid'";
            $qj = mysqli_query($w, $qb);
            $checkouttime = "23:00:00";
        } {
            $date1 = strtotime($checkouttime);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $wtd = floor($timediff / (60));
            $timeinminutes += $wtd;
        }
    }
    $averagetime = $timeinminutes / $fdusecount;
    $awt = floor($averagetime / 60) . "hr(s) " . $averagetime % 60 . "min(s)";

    $preparedreport = "<tr title='$staffonduty' style='height:20px'><td>$checkindate</td><td>$usereport</td><td>$awt</td><td data-toggle='modal' data-target='#myModal' style='cursor:pointer; color:#8F4A94; font-size:12px; font-weight:600;' onclick='getreportformodal(\"cir\",\"$checkindate\")'>Review</td></tr>";
    return $preparedreport;
}

function getrecrudescence($startdate, $enddate) {
    GLOBAL $w;
    $datefrom = $startdate;
    $dateto = $enddate;

    $qc = mysqli_query($w, "select hospitalid from checkinlog where checkindate between '$datefrom' and '$dateto'");
    $jv = mysqli_num_rows($qc);

    $qb = "select distinct(hospitalid) from checkinlog where checkindate between '$datefrom' and '$dateto'";
    $q = mysqli_query($w, $qb);
    $jq = mysqli_num_rows($q);
    $distinctvisits = $jq;
    $count = 0;
    $returnvisits = 0;
    $displayv = "";
    $visitdate = "";

    while ($hqa = mysqli_fetch_array($q)) {
        $hospitalid = $hqa['hospitalid'];

        //Get number of times client visited
        $hqh = mysqli_query($w, "select * from checkinlog where hospitalid='$hospitalid' and checkindate between '$datefrom' and '$dateto'");
        $mq = mysqli_fetch_array($hqh);
        //getclienttypefromvisitid
        $visitid = $mq['visitid'];
        $patienttype = getclienttypefromvisitid($visitid);
        $visittimes = mysqli_num_rows($hqh);
        if ($visittimes > 1) {
            $clientname = getnamefromhospitalid($hospitalid);
            $age = computeagefromhospid($hospitalid);
            //$visitdate = pullrecrudvisitdates($hospitalid, $datefrom, $dateto);
            //Get visit times
            $count++;
            $displayv .= "<tr><td>$count</td><td>$clientname</td><td>$hospitalid</td><td>$age</td><td>$patienttype</td><td>$visittimes</td><td>$visitdate</td></tr>";
        }
    }
    $tod = datenow();
    $display = "<div style=' background-color:#ffffff; padding:10px'><div style='text-align:center; margin-top:15px;'><br><br><span style='font-size:20px; font-weight:500'>MUSHIN recrudescence report <br><span style='font-size:16px'>$datefrom <span style='font-size:11px'>to</span> $dateto</span></span>"
            . "<div style='text-align:center'><br><span style='font-size:25px'>$jv</span> total visits - "
            . "<span style='font-size:25px'>$jq</span> unique visits. - "
            . "<span style='font-size:25px'>$count</span> revisits</div></div><br>"
            . "<table class='table table-bordered table-condensed' style='width:100%'><tr style='font-weight:600; background-color:#eee'><td></td><td>Name</td><td>Hospital ID</td><td>Age</td><td>Patient type</td><td>Visit count</td><td>Visit date(s)</td></tr>";
    return $display . $displayv . "</table><div style='margin-top:20px; font-size:12px; text-align:center'>TerveCure Report generate date - $tod </div></div>";
}

function computewtmins($checkindate) {
    GLOBAL $todaydate, $w;
    $q = "select visitid, checkintime, checkindate, checkouttime from checkinlog where checkindate='$checkindate'";
    //echo $q;
    $as = mysqli_query($w, $q);
    $patientcount = mysqli_num_rows($as);
    //echo $patientcount. "-";
    $timeinminutes = 0;

    $wtd = 0;
    while ($xx = mysqli_fetch_array($as)) {
        $checkintime = $xx['checkintime'];
        $checkouttime = $xx['checkouttime'];
        $checkindate = $xx['checkindate'];
        $visitid = $xx['visitid'];

        if ($checkouttime === "00:00:00" && $checkindate != $todaydate) {
            $qb = "update checkinlog set checkouttime='23:00:00', checkoutdate='$checkindate' where visitid='$visitid'";
            mysqli_query($w, $qb);
            $checkouttime = "23:00:00";
        }
        $date1 = strtotime($checkouttime);
        $date2 = strtotime($checkintime);
        $timediff = $date1 - $date2;
        $wtd = floor($timediff / (60));
        $timeinminutes = $timeinminutes + $wtd;
    }
    $avtime = floor($timeinminutes / $patientcount);
    return $avtime;
}

function pulldaysfromtoday() {
    GLOBAL $todaydate1off, $todaydate2off, $todaydate3off, $todaydate4off, $todaydate5off, $todaydate6off, $todaydate7off, $todaydate8off, $todaydate9off, $todaydate10off;
    echo "\"$todaydate10off\", \"$todaydate9off\", \"$todaydate8off\", \"$todaydate7off\", \"$todaydate6off\",\"$todaydate5off\", \"$todaydate4off\", \"$todaydate3off\", \"$todaydate2off\", \"$todaydate1off\"";
}

function pullwtfromtoday() {
    GLOBAL $todaydate1off, $todaydate2off, $todaydate3off, $todaydate4off, $todaydate5off, $todaydate6off, $todaydate7off, $todaydate8off, $todaydate9off, $todaydate10off;
    $datem1 = computewtmins($todaydate1off);
    $datem2 = computewtmins($todaydate2off);
    $datem3 = computewtmins($todaydate3off);
    $datem4 = computewtmins($todaydate4off);
    $datem5 = computewtmins($todaydate5off);
    $datem6 = computewtmins($todaydate6off);
    $datem7 = computewtmins($todaydate7off);
    $datem8 = computewtmins($todaydate8off);
    $datem9 = computewtmins($todaydate9off);
    $datem10 = computewtmins($todaydate10off);

    echo "$datem10, $datem9, $datem8, $datem7, $datem6, $datem5, $datem4, $datem3, $datem2, $datem1";
}

function getusageday($useday) {
    error_reporting(0);
    GLOBAL $todaydate1off, $todaydate2off, $todaydate3off, $todaydate4off, $todaydate5off;
    $usetoday = getcase($todaydate);
    $todaydate1off = getcase($todaydate1off);
    $todaydate2off = getcase($todaydate2off);
    $todaydate3off = getcase($todaydate3off);
    $todaydate4off = getcase($todaydate4off);
    $todaydate5off = getcase($todaydate5off);

    echo "<div class='col-md-4' style='padding:0px'><div style='padding:5px; font-weight:600; border-style:dashed; border-width:thin; border-color:#858585; font-size:12px'>FD-Front desk, VS - Vital Signs, CS - Consultation, PH - Pharmacy, Lab - Lab</div><table class='table table-striped' cell-spacing='0' style='font-family:raleway; margin-top:10px; width:100%; font-size:11px'><tr style='font-weight:400; background-color:rgba(0,0,0,0.2)'><td>Date</td><td>Usage report</td><td title='Average Wait Time'>AWT</td><td></td></tr>$usetoday $todaydate1off $todaydate2off $todaydate3off $todaydate4off $todaydate5off</table></div>";
}

function calculateterveusage() {
    
}

function calculateAWTweekly() {
    
}

function computereturnrateweekly() {
    
}

function calcaultereturnratemonthly() {
    
}

function sendmail($recipient, $subject, $message) {
    error_reporting(0);
    $from = "jkagbede@gmail.com";
    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $mailer = mail($recipient, $subject, $message, $headers);

    if ($mailer) {
        return "Message saved";
    } else {
        return "Message not saved";
    }
}
