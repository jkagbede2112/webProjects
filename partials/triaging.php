<?php

include 'connect.php';
error_reporting(0);
session_start();
$staffid = $_SESSION['staffid'];

$action = purifyentry("action");

if ($action === "triagereport") {
    $visitid = purifyentry("visitid");

    //Check if vitals made already
    $qa = "select * from triage_vitals where visitid ='$visitid'";
    $ibh = mysqli_query($w, $qa);
    if (mysqli_num_rows($ibh) < 1) {
        echo "Vital signs need to be entered first";
        return;
    }

    //action:"triagereport",st:st, ed:ed, sn:sn, bd:bd, h:h, sr:sr, j:j, hf:hf, ha:ha, v:v, ap:ap, d:d, loa:loa, mc:mc

    $st = purifyentry("st");
    $ed = purifyentry("ed");
    $sn = purifyentry("sn");
    $bd = purifyentry("bd");
    $h = purifyentry("h");
    $sr = purifyentry("sr");
    $j = purifyentry("j");
    $hf = purifyentry("hf");
    $ha = purifyentry("ha");
    $v = purifyentry("v");
    $ap = purifyentry("ap");
    $d = purifyentry("d");
    $loa = purifyentry("loa");
    $mc = purifyentry("mc");
    $we = "insert into triage_report (visitid, sorethroat, eardischarge, stiffneck, bloodydiarrhea, hematuria, skinrash, jaundice, highfever, headache, nauseavomiting, abdominalpain, diarrhea, lossofappetite) values "
            . "('$visitid','$st','$ed','$sn','$bd','$h','$sr','$j','$hf','$ha','$v','$ap','$d','$loa')";

    $mq = mysqli_query($w, $we);
    if ($mq) {
        if (isset($mc)) {
            if ($mc === "Yes") {
                $timm = timenow();
                $daten = datenow();
                $tq = "insert into consultation_queue (visitid, checkintime, checkindate) value ('$visitid','$timm','$daten')";
                $wxf = mysqli_query($w, $tq);
                if ($wxf) {
                    echo "Patient should proceed doctors consultation";
                    //Compute consultation fee
                    //Update vitals queue with out date and time..
                    $timenow = timenow();
                    $datenow = datenow();
                    $gqc = "update triage_queue set checkouttime ='$timm', checkoutdate ='$daten' where visitid='$visitid'";
                    $vaf = mysqli_query($w, $gqc);
                } else {
                    echo "Patient already sent to consultation";
                }
                //echo "Report saved. Proceed to Doctor's consultation.";  
            }
            if ($mc === "No") {
                echo "Report saved. Nurses consult begins shortly.";
            }
        } else {
            echo "Report saved. Patient should proceed to Doctor's consultation.";
        }
    } else {
        echo "Triage report may already have been saved.";
    }
}

if ($action === "notevitals") {
    //Get client information first from live session.
    //sys: systolic, dias: diastolic, h: height, w: weight, 
    //t: temperature, hr: heartrate, or: oxygenrate, rr: respirationrate
    $visitid = purifyentry("visitid");
    $sys = purifyentry("sys");
    $dias = purifyentry("dias");
    $height = purifyentry("h");
    $weight = purifyentry("w");
    $temperature = purifyentry("t");
    $heartrate = purifyentry("hr");
    $oxygenrate = purifyentry("or");
    $respirationrate = purifyentry("rr");
    $qz = "insert into triage_vitals (visitid, systolic, diastolic, height, weight, temperature, heartrate, oxygensaturation, respirationrate, staffid)"
            . "values ('$visitid','$sys','$dias','$height','$weight','$temperature','$heartrate','$oxygenrate','$respirationrate','$staffid')";
    $ye = mysqli_query($w, $qz);
    if ($ye) {
        echo "Vitals saved";
    } else {
        $avw = mysqli_query($w, "update triage_vitals set systolic='$sys', diastolic='$dias', height='$height', weight='$weight', temperature='$temperature', oxygensaturation='$oxygenrate', respirationrate='$respirationrate' where visitid='$visitid'");
        if ($avw) {
            echo "Vitals updated";
        } else {
            echo ". Not updated";
        }
    }
}

if ($action === "sendASAP") {
    $visitid = purifyentry("visitid");
    $sys = purifyentry("sys");
    $dias = purifyentry("dias");
    $height = purifyentry("h");
    $weight = purifyentry("w");
    $temperature = purifyentry("t");
    $heartrate = purifyentry("hr");
    $oxygenrate = purifyentry("or");
    $respirationrate = purifyentry("rr");
    $qz = "insert into triage_vitals (visitid, systolic, diastolic, height, weight, temperature, heartrate, oxygensaturation, respirationrate, staffid)"
            . "values ('$visitid','$sys','$dias','$height','$weight','$temperature','$heartrate','$oxygenrate','$respirationrate','$staffid')";
    $ye = mysqli_query($w, $qz);
    if ($ye) {
        echo "Vitals saved. ";
    } else {
        $avw = mysqli_query($w, "update triage_vitals set systolic='$sys', diastolic='$dias', height='$height', weight='$weight', temperature='$temperature', oxygensaturation='$oxygenrate', respirationrate='$respirationrate' where visitid='$visitid'");
        if ($avw) {
            echo "Vitals updated. ";
        } else {
            echo ". Not updated";
        }
    }
    $timm = timenow();
    $daten = datenow();
    $tq = "insert into consultation_queue (visitid, checkintime, checkindate) value ('$visitid','$timm','$daten')";
    $wxf = mysqli_query($w, $tq);
    if ($wxf) {
        echo " Patient should proceed to Doctor's consultation.";
    } else {
        echo " Patient may already be with consultation";
    }
}

if ($action === "begintriage") {
    $visitid = purifyentry("visitid");
    $tq = "select checkinlog.hospitalid, checkinlog.visitid from checkinlog inner join triage_queue on checkinlog.visitid = triage_queue.visitid where triage_queue.visitid ='$visitid'";

    $xg = mysqli_query($w, $tq);
    if ($xg) {
        //echo "Good query";
        $ht = mysqli_fetch_array($xg);
        $hospitalid = $ht['hospitalid'];
        $visitid = $ht['visitid'];
        $g = "select firstname,lastname,gender, patienttype, dateofbirth from patient_register where hospitalid = '$hospitalid'";
        $pq = mysqli_query($w, $g);
        if ($pq) {
            $asg = mysqli_fetch_array($pq);
            $name = strtoupper($asg["lastname"]) . " " . $asg["firstname"];
            $gender = $asg['gender'];
            $patienttype = $asg['patienttype'];
            $dateofbirth = $asg['dateofbirth'];
            session_start();
            $_SESSION['triage_visitid'] = $visitid;
            echo "<span style='font-size:25px; display:block'>$name</span>"
            . "<span class='vitalclient'>Gender : $gender</span>"
            . "<span class='vitalclient'>Payment plan : " . colormanq($patienttype) . "</span>"
            . "<span class='vitalclient'>Age : " . computeage($dateofbirth) . "</span>"
            . "<span class='vitalclient' title='Date Of Birth'>DOB : " . $dateofbirth . "</span>"
            . "<span class='vitalclient ptr' title='Next Of Kin info.'>N.O.K</span>"
            . "<span class='vitalclient ptr' title='Hospital ID' id='hospid'>$hospitalid</span>"
            . "<span class='vitalclient ptr' title='Visit ID' id='visitidgt'>$visitid</span>"
            . "<hr style='border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px'>";

            /*
             * <span style="font-size:25px; display:block">Agbede Joseph Kayode</span>
              <span class="vitalclient">Gender : Female</span>
              <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
              <span class="vitalclient">Age : 24yrs</span>
              <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
             */
        } else {
            echo "Bad inner query";
        }
    } else {
        echo "Bad query";
    }
}

//Trace patients information from visitID
/*
$tq = "select patient_register.firstname,patient_register.lastname, patient_register.gender"
        . "patient_register.patienttype, patient_register.dateofbirth, checkinlog.hospitalid from patient_register"
        . "inner join checkinlog on patient_register.hospitalid = checkinlog.hospitalid inner join triage_queue on triage_queue.visitid"
        . "= checkinlog.visitid where triage_queue.visitid = '$visitid'";
*/
