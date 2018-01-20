<?php

include 'connect.php';
/*
 */

$action = purifyentry("action");

if ($action === "diagnosisreport") {
    // datefrom:b, dateto:c
    $zerotime = "00:00:00";
    $datefrom = purifyentry("datefrom");
    $dateto = purifyentry("dateto");
    $diagnosisid = purifyentry("diagnosisid");

    $datetimefrom = $datefrom . " " . $zerotime;
    $datetimeto = $dateto . " " . $zerotime;
    //Get diagnosis name;
    $jq = mysqli_query($w, "select diagnosis from mshdiagnosis where diagnosisid='$diagnosisid'");
    $dn = mysqli_fetch_array($jq);
    $diagname = $dn['diagnosis'];

    $hq = "select * from consultation_diagnosis where diagnosisid='$diagnosisid' and dateadded between '$datetimefrom' and '$datetimeto'";
    //echo $hq;
    $hw = mysqli_query($w, $hq);

    $totalrequests = mysqli_num_rows($hw);
    echo "<div style='font-size:25px; text-align:center'>$diagname diagnosis report</div><div style='text-align:center'><span style='font-size:18px'>From</span> $datefrom <span style='font-size:18px'> - </span> $dateto</div><div style='margin-bottom:30px; text-align:center'>Requests: $totalrequests</div>";
    $tabl = "<table class='table table-bordered table-condensed table-striped' style='font-family:verdana; font-size:11px'><tr style='font-weight:600'><td></td><td>Name</td><td>Hospital ID</td><td>Client type</td><td>Gender</td><td>Date visited</td></tr>";
    $count = 1;
    while ($qy = mysqli_fetch_array($hw)) {
        $visitid = $qy['visitid'];
        $dateadded = $qy['dateadded'];
        $name = getnamefromvisitid($visitid);
        $clienttype = getclienttypefromvisitid($visitid);
        $hospitalid = gethospitalidfromvisitid($visitid);
        $gender = getgenderfromvisitid($visitid);
        $tabl .= "<tr style='padding:5px; border-bottom-style:dashed; padding:5px; border-bottom-width:thin; border-bottom-color:#ccc'><td>$count</td><td>$name</td><td>$hospitalid</td><td>$clienttype</td><td>$gender</td><td>$dateadded</td></tr>";
        $count++;
    }
    echo $tabl . "</table>";
}

if ($action === "recrudescence") {
    // datefrom:b, dateto:c
    $datefrom = purifyentry("datefrom");
    $dateto = purifyentry("dateto");


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
            $visitdate  = pullrecrudvisitdates($hospitalid, $datefrom, $dateto);
            //Get visit times
            $count++;
            $displayv .= "<tr><td>$count</td><td>$clientname</td><td>$hospitalid</td><td>$age</td><td>$patienttype</td><td>$visittimes</td><td>$visitdate</td></tr>";
            
        }
    }
    $tod = datenow();
    $display = "<div style=' background-color:#ffffff; padding:10px'><div style='text-align:center; margin-top:15px;'><br><img src='images/mtsinailogo.png' width='200px'><br><br><span style='font-size:20px; font-weight:500'>MUSHIN recrudescence report <br><span style='font-size:16px'>$datefrom <span style='font-size:11px'>to</span> $dateto</span></span>"
            . "<div style='text-align:center'><br><span style='font-size:25px'>$jv</span> total visits - "
            . "<span style='font-size:25px'>$jq</span> unique visits. - "
            . "<span style='font-size:25px'>$count</span> revisits</div></div><br>"
            . "<table class='table table-bordered table-condensed' style='width:100%'><tr style='font-weight:600; background-color:#eee'><td></td><td>Name</td><td>Hospital ID</td><td>Age</td><td>Patient type</td><td>Visit count</td><td>Visit date(s)</td></tr>";
    echo $display . $displayv . "</table><div style='margin-top:20px; font-size:12px; text-align:center'>TerveCure Report generate date - $tod </div></div>";
}

function pullrecrudvisitdates($hospitalid, $datefrom, $dateto){
    GLOBAL $w;
    $dates = "";
    $qv = "select checkindate from checkinlog where hospitalid='$hospitalid' and checkindate between '$datefrom' and '$dateto'";
    $jq = mysqli_query($w,$qv);
    while ($pa = mysqli_fetch_array($jq)){
        $dates .= $pa['checkindate']." - ";
    }
    return $dates;
}