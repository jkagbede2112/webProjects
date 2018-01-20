<?php

$currency = "Naira";
$location = "<span title='Mt. Sinai Hospital Isolo'>MSHI</span>";
$w = mysqli_connect("localhost", "root", "", "tervecure") or die("Bad DB string");

function purifyentry($a) {
    $q = trim($_POST[$a]);
    return $q;
}

function gettopfivedrugs($monthyear) {
//Get year and month
    $yearmonth = date('Y-m');
//echo $yearmonth;
    $hq = mysqli_query($w, "select drugid, count(*) as c from consultation_prescription GROUP BY drugid order by c desc limit 5");
    $tab = "<table class='table table-bordered table-condensed' style='font-size:11px; margin-bottom:0px; padding-bottom:0px'>";
    $count = 1;
    while ($ct = mysqli_fetch_array($hq)) {
        $rc = $ct['c'];
        $drugid = $ct['drugid'];
        $drugname = getdrugname($drugid);
        $tab .= "<tr><td>$count</td><td>$drugname</td><td>$rc</td></tr>";
        $count++;
    }
    echo $tab . "</table>";
}

function getvisitdatefromvisitid($visitid) {
    global $w;
    $th = mysqli_query($w, "select checkindate from checkinlog where visitid='$visitid'");
    $h = mysqli_fetch_array($th);
    $visitdate = $h['checkindate'];
    return $visitdate;
}

function getregcount() {
    global $w;
    //Get company
    $qa = mysqli_query($w, "select * from patient_register where patienttype='3'");
    $wq = mysqli_num_rows($qa);

    //Get NHIS
    $qaq = mysqli_query($w, "select * from patient_register where patienttype='2'");
    $wqq = mysqli_num_rows($qaq);

    //Get private
    $qaa = mysqli_query($w, "select * from patient_register where patienttype='1'");
    $wqa = mysqli_num_rows($qaa);

    //Get HMO
    $qaz = mysqli_query($w, "select * from patient_register where patienttype='4'");
    $wqz = mysqli_num_rows($qaz);

    echo "$wq, $wqz, $wqq, $wqa";
}

function getfdpercentusage($staffid) {
    GLOBAL $w;
    $jq = mysqli_query($w, "select * from checkinlog");
    //Get all records
    $num = mysqli_num_rows($jq);
    //Get user entred records
    $hq = mysqli_query($w, "select * from checkinlog where staffid='$staffid'");
    $hum = mysqli_num_rows($hq);
    //Calculate percentage usage
    $percentage = floor(($hum / $num) * 100) . "%";
    echo $percentage;
}

function getvspercentusage($staffid) {
    GLOBAL $w;
    $jq = mysqli_query($w, "select * from triage_vitals");
    //Get all records
    $num = mysqli_num_rows($jq);
    //Get user entred records
    $hq = mysqli_query($w, "select * from triage_vitals where staffid='$staffid'");
    $hum = mysqli_num_rows($hq);
    //Calculate percentage usage
    $percentage = floor(($hum / $num) * 100) . "%";
    echo $percentage;
}

function getstaffdept($staffid){
    GLOBAL $w;
    $hq = mysqli_query($w, "select role from staff where staffid='$staffid'");
    $n = mysqli_fetch_array($hq);
    $staffdept = $n['role'];
    return $staffdept;
}

function getstaffname($staffid) {
    GLOBAL $w;
    $hq = mysqli_query($w, "select firstname, lastname from staff where staffid='$staffid'");
    $n = mysqli_fetch_array($hq);
    $staffname = $n['firstname']. " " . $n['lastname'];
    return $staffname;
}

function getstaffnamefromdate($rdate) {
    global $w;
    $ha = mysqli_query($w, "select staffid from checkinlog where checkindate='$rdate'");
    $nameid = mysqli_fetch_array($ha);
    $staffid = $nameid['staffid'];
    $getstaffname = getstaffname($staffid);
    return $getstaffname;
}

function getnamefromvisitid($visitid) {
    GLOBAL $w;
    $sh = "select hospitalid from checkinlog where visitid = '$visitid'";
    $qh = mysqli_query($w, $sh);
    $hq = mysqli_fetch_array($qh);
    $hospitalid = $hq['hospitalid'];

    $qj = mysqli_query($w, "select firstname, lastname from patient_register where hospitalid='$hospitalid'");
    $kq = mysqli_fetch_array($qj);
    $name = $kq['lastname'] . " " . $kq['firstname'];
    return $name;
}

function getclienttypefromvisitid($visitid) {
    GLOBAL $w;
    $sh = "select hospitalid from checkinlog where visitid = '$visitid'";
    $qh = mysqli_query($w, $sh);
    $hq = mysqli_fetch_array($qh);
    $hospitalid = $hq['hospitalid'];

    $qj = mysqli_query($w, "select patienttype from patient_register where hospitalid='$hospitalid'");
    $kq = mysqli_fetch_array($qj);
    $patienttype = $kq['patienttype'];
    $pt = "select * from billingcategory where categoryid='$patienttype'";

    $mys = mysqli_query($w, $pt);
    $payc = mysqli_fetch_array($mys);
    return $payc['name'];
}

function getclienttypefromhospid($hosp) {
    GLOBAL $w;

    $qj = mysqli_query($w, "select patienttype from patient_register where hospitalid='$hosp'");
    $kq = mysqli_fetch_array($qj);
    $patienttype = $kq['patienttype'];
    $pt = "select * from billingcategory where categoryid='$patienttype'";

    $mys = mysqli_query($w, $pt);
    $payc = mysqli_fetch_array($mys);
    return $payc['name'];
}

function gethospitalidfromvisitid($visitid) {
    GLOBAL $w;
    $sh = "select hospitalid from checkinlog where visitid = '$visitid'";
    $qh = mysqli_query($w, $sh);
    $hq = mysqli_fetch_array($qh);
    $hospitalid = $hq['hospitalid'];

    return $hospitalid;
}

function getgenderfromvisitid($visitid) {
    GLOBAL $w;
    $hospitalid = gethospitalidfromvisitid($visitid);
    $qj = mysqli_query($w, "select gender from patient_register where hospitalid='$hospitalid'");
    $kq = mysqli_fetch_array($qj);
    $gender = $kq['gender'];
    return $gender;
}

function getdrugpriceunitprice($drugid, $clienttype) {
    global $w;
    $jq = "select * from pharmacy_drugs where pharma_drugsid='$drugid'";
    $ja = mysqli_query($w, $jq);
    $k = mysqli_fetch_array($ja);
    $privateprice = $k['private'];
    $corpprice = $k['corporate'];
    if ($clienttype === "Private") {
        return $privateprice;
    }
    if ($clienttype === "Company") {
        return $corpprice;
    }
    if ($clienttype === "HMO") {
        return 0;
    }
    if ($clienttype === "NHIS") {
        return 0;
    }
}

function getdrugcount($drugid) {
    GLOBAL $w;
    $qj = mysqli_query($w, "select * from pharmacy_drugs where pharma_drugsid='$drugid'");
    $kq = mysqli_fetch_array($qj);
    $count = $kq['stockcount'];
    return $count;
}

function getnamefromhospitalid($hospitalid) {
    GLOBAL $w;
    $qj = mysqli_query($w, "select firstname, lastname from patient_register where hospitalid='$hospitalid'");
    $kq = mysqli_fetch_array($qj);
    $name = $kq['lastname'] . " " . $kq['firstname'];
    return $name;
}

function getdrugname($drugid) {
    GLOBAL $w;
    $ah = mysqli_query($w, "select * from pharmacy_drugs where pharma_drugsid='$drugid'");
    $av = mysqli_fetch_array($ah);
    $brandname = $av['brandname'];
    $genericname = $av['genericname'];

    return $genericname;
}

function colormanq($paycat) {
    GLOBAL $w;
    $pt = "select * from billingcategory where categoryid='$paycat'";

    $mys = mysqli_query($w, $pt);
    $payc = mysqli_fetch_array($mys);
    $payca = $payc['name'];
    return $payca;
}

function timenow() {
    $timeh = date('H');
    $timems = date('i:s');
    $tim = $timeh . ":" . $timems;
    return $tim;
}

function datenow() {
    return date('Y-m-d');
}

function computeage($dateofbirth) {
    $date1 = strtotime(date("Y-m-d"));
    $givenbirthdate = strtotime($dateofbirth);
    //pregnant
    $diff = $date1 - $givenbirthdate;
    $age = floor((($diff / (7 * 24 * 60 * 60)) + 1) / 48) - 1;
    $agereport = $age . "yr(s)";
    if ($age < 1) {
        $age = floor((($diff / (7 * 24 * 60 * 60)) + 1) / 4) - 1;
        $agereport = $age . "mnth(s)";
    }
    return $agereport;
}

function computeagefromhospid($hospid) {
    global $w;
    $q = mysqli_query($w, "select dateofbirth from patient_register where hospitalid='$hospid'");
    $aw = mysqli_fetch_array($q);
    $dob = $aw['dateofbirth'];
    $age = computeage($dob);
    return $age;
}

function colorman($paycat) {
    GLOBAL $w;
    $pt = "select * from billingcategory where categoryid='$paycat'";

    $mys = mysqli_query($w, $pt);
    $payc = mysqli_fetch_array($mys);
    $payca = $payc['name'];
    if ($payca === "HMO") {
        return "<i class='fa fa-male' style='color:#ff3333'></i>";
    } else if ($paycat === "NHIS") {
        return "<i class='fa fa-male' style='color:#ff3333'></i>";
    } else if ($paycat === "Private") {
        return "<i class='fa fa-male' style='color:#ff3333'></i>";
    } else if ($paycat === "Corporate") {
        return "<i class='fa fa-male' style='color:#ff3333'></i>";
    }
}

function getrowcount($tablename, $singlecat, $singlecatvalue) {
    GLOBAL $w;
    $qw = "select * from $tablename where $singlecat='$singlecatvalue'";
//return $qw;    
    $upe = mysqli_query($w, $qw);
    return mysqli_num_rows($upe);
}
