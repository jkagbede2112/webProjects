<?php

include "connect.php";
session_start();
//$staffid = $_SESSION['staffid'];
$staffid = "4";

$action = purifyentry("action");

if ($action === "orderinvestigation") {
    $datde = datenow();
    $timde = timenow();
    $visitid = purifyentry("visitid");

    $tq = "insert into investigation_queue (visitid, checkintime, checkindate, reqStaffID) values "
            . "('$visitid','$timde','$datde','$staffid')";
    $dt = mysqli_query($w, $tq);
    if ($dt) {
        echo "yes";
    } else {
        echo "no";
    }
}
//pullorder
if ($action === "pullorder") {
    $visitid = purifyentry("visitid");
    $tq = "select * from investigation_order where visitid = '$visitid'";
    $dt = mysqli_query($w, $tq);
    if ($dt) {
        $wdw = "<table class='table table-bordered table-condensed'><tr style='font-weight:600; background-color:#1784D0; color:#fff'><td></td><td>Investigation</td><td>Time Ordered</td><td>Result</td><td></td></tr>";
        $count = 1;
        while ($gqa = mysqli_fetch_array($dt)) {
            $invid = $gqa['investigationid'];
            $invordertime = $gqa['dateadded'];
            $invordresult = $gqa['result'];
            $invorderid = $gqa['investigation_orderid'];
            //Get investigation name.
            $zp = mysqli_query($w, "select name,unit from investigation_name where investigation_nameid ='$invid'");
            $qzx = mysqli_fetch_array($zp);
            $invname = $qzx['name'];
            $invunit = $qzx['unit'];
            $wdw .= "<tr style='background-color:rgba(0,0,0,0.1); font-weight:500'><td>$count</td><td id='oi$count'>$invname<span id='invid$count' style='display:none'>$invid</span></td><td>$invordertime</td><td>$invordresult <span style='font-size:11px'>$invunit</span></td><td><input type='button' class='reset' value='Result' onclick='resulthere(\"$invorderid\",\"oi$count\",\"invid$count\")'></td></tr>";
            $count++;
        }
        echo $wdw . "</table>";
    } else {
        echo "no";
    }
}

if ($action === "saveBI") {
    $binvcat = purifyentry("binvcat");
    $binv = purifyentry("binv");
    $gt = "insert into investigation_bi (investigationbi_id, investigationsai_id) value ('$binvcat','$binv')";
    $cf = mysqli_query($w, $gt);
    if ($cf) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "saveoption") {
    $invid = purifyentry("invid");
    $invopt = purifyentry("invopt");
    $gt = "insert into investigation_dd (investigationid, ddvalue) value ('$invid','$invopt')";
    $cf = mysqli_query($w, $gt);
    if ($cf) {
        echo "Option saved";
    } else {
        echo "Option not saved";
    }
}

if ($action === "getoiforrez") {
    $invid = $_POST['invid'];
    $labid = $_POST['labid'];

    //Get investigation name from labid and investigation type
    $gt = "select name, rslttype, unit from investigation_name where investigation_nameid ='$labid'";

    $tg = mysqli_query($w, $gt);
    $i = mysqli_fetch_array($tg);
    $name = $i['name'];
    $unit = $i['unit'];
    $rslttype = $i['rslttype'];
    if ($rslttype === "Optioned") {
        //Pull the options from investigation_dd table
        $vf = "select ddvalue from investigation_dd where investigationid='$labid'";
        $qw = mysqli_query($w, $vf);
        $option = "";
        while ($qx = mysqli_fetch_array($qw)) {
            $optio = $qx['ddvalue'];
            $option .= "<option>$optio</option>";
        }
        $tf = "<select class='form-control' id='oirez'>$option</select>";
        //echo $tf;
        echo "<div style=\"font-size:30px\">$name <span id='orIn' style='display:none'>$invid</span></div><hr style='border-style:dashed' style='margin:2px !important'><div style=\"font-size:12px\"></div><div>Result$tf<input type=\"button\" style=\"width:100%; margin-top:5px; color:#ccc\" class=\"btn vitalsminimenusel\" value=\"Register result\" onclick=\"reginvrez(oirez.value,orIn.innerHTML)\"></div>";
    } else {
        echo "<div style='font-size:30px'>$name <span id='orIn' style='display:none'>$invid</span></div><hr style='border-style:dashed' style='margin:2px !important'>"
        . "<div style='font-size:12px'></div><div>Result<input type='text' id='oirez' class='form-control' placeholder='$name in $unit'><input type='button' style='width:100%; margin-top:5px; color:#ccc' class='btn vitalsminimenusel' value='Register result' onclick='reginvrez(oirez.value,orIn.innerHTML)'></div>";
    }
}

//
if ($action === "logresult") {
//action:action, result:result, rezid:reqid
    $result = $_POST['result'];
    $rezid = $_POST['rezid'];

    //Check if patient is logged out already
    $qk = "";

    $rq = "update investigation_order set result='$result' where investigation_orderid='$rezid'";
    $gt = mysqli_query($w, "$rq");
    if ($gt) {
        echo "Result saved";
    } else {
        echo "result not saved";
    }
}

if ($action === "finishinvestigation") {
    $datenow = datenow();
    $timenow = timenow();
    $visitid = purifyentry("visitid");

    $q = "update investigation_queue set checkouttime='$timenow', checkoutdate='$datenow' where visitid='$visitid'";
    //echo $q;
    $ha = mysqli_query($w, $q);
    if ($ha) {
        echo "Patient checked out";
    } else {
        echo "Patient not checked out";
    }
}