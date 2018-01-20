<?php

include 'connect.php';
$staffid = "4"; //Retrieve staffID from sessional variable

$action = purifyentry("action");

function checkreturnee($hospid) {
    global $w;
    $qa = "select * from checkinlog where hospitalid='$hospid' order by checkindate desc";
    $q = mysqli_query($w, $qa);
    $da = mysqli_fetch_array($q);
    $lastcheckdate = $da['checkindate'];
$disp = "";
    //Todays date
    $todaysdate = datenow();
    //Get difference

    $date1 = strtotime($todaysdate);
    $prevd = strtotime($lastcheckdate);

    //pregnant
    $diff = $date1 - $prevd;
    $datediff = floor($diff / (7 * 24 * 60 * 60)) + 1;

    if ($datediff <= 2) {
        $disp = "<i class='fa fa-refresh recrud'><span style='position:absolute; font-size:11px; top:-13px; right:-30px; font-family:raleway'><span style='display:inline-block; width:90px'>< 2wks Returnee</span></span></i>";
    }

//Log this return rate
    $qw = "insert into returnrate (hospid, earlyvisitdate, visitdate, weeksapart)"
            . "values ('$hospid','$lastcheckdate','$todaysdate','$datediff')";
    $cq = mysqli_query($w, $qw);

    return $disp;
}

if ($action === "pulldetsforconsultation") {

    $visitid = purifyentry("visitid");
    session_start();
    $_SESSION['triage_visitid'] = $visitid;
    $staffid = $_SESSION['staffid'];

    //update visitid with staffid
    $qb = "update consultation_queue set doctorid='$staffid' where visitid='$visitid'";
    $qcte = mysqli_query($w, $qb);
    if ($qcte) {
    } else {
        echo "Doctor ID not saved against this consultation";
    }

    $tq = "select checkinlog.hospitalid from checkinlog inner join consultation_queue on checkinlog.visitid = consultation_queue.visitid where consultation_queue.visitid ='$visitid'";

    $xg = mysqli_query($w, $tq);
    if ($xg) {
        $ht = mysqli_fetch_array($xg);
        $hospitalid = $ht['hospitalid'];

        //Check if patients is returning less than 2weeks.
        $difference = checkreturnee($hospitalid);

        $g = "select firstname,lastname,gender,hospitalid, patienttype, dateofbirth from patient_register where hospitalid = '$hospitalid'";
        $pq = mysqli_query($w, $g);
        if ($pq) {
            $asg = mysqli_fetch_array($pq);
            $name = strtoupper($asg["lastname"]) . " " . $asg["firstname"];
            $gender = $asg['gender'];
            $patienttype = $asg['patienttype'];
            $hospitalid = $asg['hospitalid'];
            $dateofbirth = $asg['dateofbirth'];

            //Check if it is a return in less than two weeks
            echo "<span style='font-size:25px; display:block'>$name $difference</span>"
            . "<span class='vitalclient'>Gender : $gender</span>"
            . "<span class='vitalclient'>Payment plan : " . colormanq($patienttype) . "</span>"
            . "<span class='vitalclient'>Age : " . computeage($dateofbirth) . "</span>"
            . "<span class='vitalclient' title='Date Of Birth'>DOB : " . $dateofbirth . "</span>"
            . "<span class='vitalclient ptr' title='Next Of Kin info.'>N.O.K</span>"
            . "<span class='vitalclient ptr' title='Hospital ID' id='hospid'>$hospitalid</span>"
            . "<span class='vitalclient ptr' title='Hospital ID' id='visitidgt'>$visitid</span>"
            . "<hr style='border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px'>";
        } else {
            echo "Bad inner query";
        }
    }
}

if ($action === "pulldets") {
    $visitid = purifyentry("visitid");
    $tq = "select checkinlog.hospitalid from checkinlog inner join consultation_queue on checkinlog.visitid = consultation_queue.visitid where consultation_queue.visitid ='$visitid'";

    $xg = mysqli_query($w, $tq);
    if ($xg) {
        $ht = mysqli_fetch_array($xg);
        $hospitalid = $ht['hospitalid'];

        //Check if patients is returning less than 2weeks.
        //$difference = checkreturnee($hospitalid);

        $g = "select firstname,lastname,gender,hospitalid, patienttype, dateofbirth from patient_register where hospitalid = '$hospitalid'";
        $pq = mysqli_query($w, $g);
        if ($pq) {
            $asg = mysqli_fetch_array($pq);
            $name = strtoupper($asg["lastname"]) . " " . $asg["firstname"];
            $gender = $asg['gender'];
            $patienttype = $asg['patienttype'];
            $hospitalid = $asg['hospitalid'];
            $dateofbirth = $asg['dateofbirth'];

            //Check if it is a return in less than two weeks

            session_start();
            $_SESSION['triage_visitid'] = $visitid;
            echo "<span style='font-size:25px; display:block'>$name</span>"
            . "<span class='vitalclient'>Gender : $gender</span>"
            . "<span class='vitalclient'>Payment plan : " . colormanq($patienttype) . "</span>"
            . "<span class='vitalclient'>Age : " . computeage($dateofbirth) . "</span>"
            . "<span class='vitalclient' title='Date Of Birth'>DOB : " . $dateofbirth . "</span>"
            . "<span class='vitalclient ptr' title='Next Of Kin info.'>N.O.K</span>"
            . "<span class='vitalclient ptr' title='Hospital ID' id='hospid'>$hospitalid</span>"
            . "<span class='vitalclient ptr' title='Hospital ID' id='visitidgt'>$visitid</span>"
            . "<hr style='border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px'>";
        } else {
            echo "Bad inner query";
        }
    }
}

if ($action === "pullvisits") {
    $datde = datenow();
    $hospitalid = purifyentry("hospitalid");
//Check checkinlog for all visitids associated with this hospitalID.. Pull three most recent
    if (strlen($hospitalid) < 1) {
        echo "<div class='col-md-12 vsumph'>"
        . "<div class = 'vsumphdatel'>"
        . "<i class = 'fa fa-print ptr'></i></div>"
        . "<div style='text-align:center; font-size:25px'>No visit history.</div>"
        . "</div>";
        return;
    }
    $t = "select visitid,checkindate from checkinlog where hospitalid = '$hospitalid' order by checkindate desc LIMIT 5";
    $q = mysqli_query($w, $t);
    $visitcount = mysqli_num_rows($q);
    if ($visitcount < 2) {
        echo "<div class='col-md-12 vsumph'>"
        . "<div class = 'vsumphdatel'>"
        . "<i class = 'fa fa-print ptr'></i></div>"
        . "<div style='text-align:center; font-size:25px'>No visit history.</div>"
        . "</div>";
    } else {
        while ($y = mysqli_fetch_array($q)) {
            //Get visitid;
            $visitid = $y['visitid'];
            $cidate = $y['checkindate'];
            //Get all complaints associated with visitid
            $rz = "select complaint, history from consultation_complaints where visitid='$visitid'";
            $hs = mysqli_query($w, $rz);
            $complaint = "";
            while ($ab = mysqli_fetch_array($hs)) {
                $compl = $ab['complaint'];
                $hist = $ab['history'];
                $complaint .= " <span class='reset' title='$hist'>$compl</span>";
            }

            //Get all investigations associated with visitid
            $bq = "select investigation_order.investigationid, investigation_order.result, investigation_name.name from investigation_order inner join investigation_name on investigation_order.investigationid= investigation_name.investigation_nameid where investigation_order.visitid='$visitid'";
            $hs = mysqli_query($w, $bq);
            $investigation = "";
            while ($ab = mysqli_fetch_array($hs)) {
                $invname = $ab['name'];
                $result = $ab['result'];
                $investigation .= " <span class='reset' title='$result'>$invname</span>";
            }
            //
            //Get all Diagnosis associated with visitid
            $bq = "select consultation_diagnosis.diagnosisid, mshdiagnosis.diagnosis from consultation_diagnosis inner join mshdiagnosis on consultation_diagnosis.diagnosisid= mshdiagnosis.diagnosisid where consultation_diagnosis.visitid='$visitid'";
            $qjd = mysqli_query($w, $bq);
            $diagnosis = "";
            while ($kq = mysqli_fetch_array($qjd)) {
                $diagn = $kq['diagnosis'];
                $diagnosis .= " <span class='reset'>$diagn</span>";
            }
            //Get all Prescriptions associated with visitid
            $bq = "select consultation_prescription.drugid, consultation_prescription.dosage, pharmacy_drugs.brandname, pharmacy_drugs.genericname from consultation_prescription inner join pharmacy_drugs on consultation_prescription.drugid= pharmacy_drugs.pharma_drugsid where consultation_prescription.visitid='$visitid'";
            $qjd = mysqli_query($w, $bq);
            $prescription = "";
            while ($kq = mysqli_fetch_array($qjd)) {
                $drugname = $kq['brandname'] . " " . $kq['genericname'];
                $dosage = $kq['dosage'];
                $prescription .= " <span class='reset' title='$dosage'>$drugname</span>";
            }
            //Get Vital signs reading associated with visitid
            $bq = "select * from triage_vitals where visitid='$visitid'";
            $qjd = mysqli_query($w, $bq);
            $vitals = "";
            $vitalreadingthere = mysqli_num_rows($qjd);
            $kq = mysqli_fetch_array($qjd);
            $bp = "BP: " . $kq['systolic'] . "/" . $kq['diastolic'];
            $temp = "Temp: " . $kq['temperature'];
            $pulse = "Pulse: " . $kq['heartrate'];
            $os = "Oxygen S: " . $kq['oxygensaturation'];
            $vitals .= " <span class='login br'>$bp</span><span class='login br'>$temp</span><span class='login br'>$pulse</span><span class='login br'>$os</span><span class='login br'>$bp</span>";
            if ($vitalreadingthere > 0) {
                echo "<div class='col-md-12 vsumph'><div class='vsumphdatel'><span class='vsumphdate'>$cidate</span></div><div class='col-md-8 vsumphbody'><span class='kk'>Complaint(s)</span><span style='font-size:12px'>$complaint</span><div class='sd'><span class='kk'>Investigations</span><span style='font-size:12px'>$investigation</span></div><div class='sd'><span class='kk'>Diagnosis</span><span style='font-size:12px'>$diagnosis</span></div><div class='sd'><span class='kk'>Prescription</span><span style='font-size:12px'>$prescription</span></div><div class='sd'></div></div><div class='col-md-4'><div class='vsvitals'>Vital signs</div>$vitals</div></div>";
            }
        }
    }
}

if ($action === "pullvitals") {
    $visitid = purifyentry("visitid");
    //Get vitals reading from triage_vitals
    $tx = "select * from triage_vitals where visitid = '$visitid'";
    $tq = mysqli_query($w, $tx);
    $qa = mysqli_fetch_array($tq);
    $systolic = $qa['systolic'];
    $diastolic = $qa['diastolic'];
    $height = $qa['height'] ."m";
    $weight = $qa['weight'] ."kg";
    $temperature = $qa['temperature']."<sup>o</sup>C";
    $heartrate = $qa['heartrate'];
    $oxygensat = $qa['oxygensaturation'];
    $respirationrate = $qa['respirationrate'];
    $staffid = $qa['staffid'];
    $staffname = "Nurse ".getstaffname($staffid);

    echo "<div style='text-align:center'><div><b>Taken by -</b> $staffname</div><center>"
    . "<table class='table table-bordered table-condensed table-striped' style='max-width:350px; box-shadow: 1px 1px 1px #888888'>"
    . "<tr><td>Systolic</td><td>$systolic</td></tr>"
    . "<tr><td>Diastolic</td><td>$diastolic</td></tr>"
    . "<tr><td>Height</td><td>$height</td></tr>"
    . "<tr><td>Weight</td><td>$weight</td></tr>"
    . "<tr><td>Temperature</td><td>$temperature</td></tr>"
    . "<tr><td>Heart rate</td><td>$heartrate</td></tr>"
    . "<tr><td>Oxygen Saturation</td><td>$oxygensat</td></tr>"
    . "<tr><td>Respiration Rate</td><td>$respirationrate</td></tr>"
    . "</table></center></div>";
}

if ($action === "registerallergy") {
    $hospitalid = purifyentry("hospitalid");
    //Get vitals reading from triage_vitals
//action:action, hospitalid:a, allergy:b
    $allergy = purifyentry("allergy");
    $p = "insert into patient_allergy (patientid, allergy, registrarid) values ('$hospitalid','$allergy','$staffid')";
    $my = mysqli_query($w, $p);
    if ($my) {
        echo "saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "pullallergiesitemised") {
    $hospitalid = purifyentry("hospid");
    //Get vitals reading from triage_vitals
//action:action, hospitalid:a, allergy:b
    $allergy = mysqli_query($w, "select * from patient_allergy where patientid ='$hospitalid'");
    $tab = "<table class='table table-condensed table-striped'>";
    $count = 1;
    while ($qs = mysqli_fetch_array($allergy)) {
        $allergyname = $qs['allergy'];
        $staff = $qs['registrarid'];
        $tab .= "<tr><td>$count</td><td>$allergyname</td><td>$staff</td></tr>";
        $count++;
    }
    echo $tab . "</table>";
}

if ($action === "pullallergieslist") {
    $hospitalid = purifyentry("hospid");
    //Get vitals reading from triage_vitals
//action:action, hospitalid:a, allergy:b
    $allergy = mysqli_query($w, "select * from patient_allergy where patientid ='$hospitalid'");
    while ($qs = mysqli_fetch_array($allergy)) {
        $allergyname = $qs['allergy'];
        echo "<span class='algy'>$allergyname</span>";
    }
}

if ($action === "addcomplaint") {
    //visitid: visitid, action:action, complaint: complaint, duration: duration, history: history
    $visitid = purifyentry("visitid");
    $complaint = purifyentry("complaint");
    $duration = purifyentry("duration");
    $history = purifyentry("history");

    $v = mysqli_query($w, "insert into consultation_complaints (visitid, complaint, duration, history) values"
            . " ('$visitid','$complaint','$duration','$history')");
    if ($v) {
        echo "Complain logged";
    } else {
        $hsq = "update consultation_complaints set complaint='$complaint', duration='$duration', history='$history' where visitid='$visitid'";
        $qwx = mysqli_query($w, $hsq);
        if ($qwx) {
            echo "Complain log updated";
        } else {
            echo "Complain not saved";
        }
    }
}

if ($action === "loadcomplains") {
    //visitid: visitid, action:action, complaint: complaint, duration: duration, history: history
    $visitid = purifyentry("visitid");
    $q = "select * from consultation_complaints where visitid ='$visitid'";
    $v = mysqli_query($w, $q);
    if (mysqli_num_rows($v) < 1) {
        echo "<tr><td colspan='6' style='text-align:center'>No complaint noted</td></tr>";
    } else {
        if ($v) {
            $count = 1;
            while ($vg = mysqli_fetch_array($v)) {
                $complain = $vg['complaint'];
                $duration = $vg['duration'];
                $history = $vg['history'];
                $complainid = $vg['consultation_complaintsid'];
                echo "<tr><td>$count</td><td>$complain</td><td>$duration</td><td>$history</td><td><i class='fa fa-times ptr red' onclick='deletecomplain(\"$complainid\",\"$complain\")' title='Delete complain'></i></td></tr>";
                $count++;
            }
        } else {
            echo "Not saved";
        }
    }
}

if ($action === "removecomplain") {
    //visitid: visitid, action:action, complaint: complaint, duration: duration, history: history
    $complainid = purifyentry("complainid");
    $q = "delete from consultation_complaints where consultation_complaintsid ='$complainid'";
    $v = mysqli_query($w, $q);
    if ($v) {
        echo "Deleted";
    } else {
        echo "Not deleted now. Try again later";
    }
}

if ($action === "orderinvestigation") {
    //visitid:visitid, invid:a
    $ordertime = timenow();
    $visitid = purifyentry("visitid");
    $invid = purifyentry("invid");
    $q = "insert into investigation_order (investigationid, ordertime, visitid) values ('$invid','$ordertime','$visitid')";
    $v = mysqli_query($w, $q);
    if ($v) {
        echo "Ordered";
    } else {
        echo "Not ordered. Investigation may have been previously requested on this visit";
    }
}
//
if ($action === "loadinvestigations") {
    //visitid:visitid, invid:a
    $visitid = purifyentry("visitid");
    $q = "select investigation_order.investigationid, investigation_order.investigation_orderid, investigation_order.ordertime, investigation_order.result,investigation_name.unit, "
            . "investigation_name.name from investigation_order inner join investigation_name on investigation_order.investigationid"
            . "=investigation_name.investigation_nameid where investigation_order.visitid='$visitid'";
    $v = mysqli_query($w, $q);
    if (mysqli_num_rows($v) < 1) {
        echo "<tr><td colspan='5' style='text-align:center'>Lab requests not made yet</td></tr>";
    }
    $count = 1;
    while ($d = mysqli_fetch_array($v)) {
        $invname = $d['name'];
        $ordertime = $d['ordertime'];
        $result = $d['result'];
        $unit = $d['unit'];
        $orderid = $d['investigation_orderid'];

        if (strlen($result) < 1) {
            echo "<tr><td>$count</td><td>$invname</td><td>$ordertime</td><td><i class='fa fa-times'></i></td><td>Not ready</td></tr>";
        } else {
            echo "<tr><td>$count</td><td>$invname</td><td>$ordertime</td><td><i class='fa fa-check'></i></td><td style='font-family:verdana'>$result $unit</td></tr>";
        }
        $count++;
    }
}

if ($action === "savege") {
    $visitid = purifyentry("visitid");
    $febrile = purifyentry("febrile");
    $cyanosed = purifyentry("cyanosed");
    $jaundiced = purifyentry("jaundiced");
    $hydrated = purifyentry("hydrated");
    $oedema = purifyentry("oedema");

    $examtype = "General Examination";
    $gereport = "<b>Febrile</b> - $febrile, <b>Cyanosed</b> - $cyanosed, <b>Jaundiced</b> - $jaundiced, <b>Hydrated</b> - $hydrated, <b>Oedema</b> - $oedema";

    $gr = "insert into consultation_gexamination (visitid, examinationresult) values ('$visitid','$gereport')";
    $ht = mysqli_query($w, $gr);
    if ($ht) {
        echo "General examination saved";
    } else {
        $gr = "update consultation_gexamination set examinationresult = '$gereport' where visitid ='$visitid'";
        $sgd = mysqli_query($w, $gr);
        if ($sgd) {
            echo "General examination updated";
        } else {
            echo "Not saved/updated";
        }
    }
    //action:action, febrile:febrile, cyanosed:cyanosed, jaundiced:jaundiced, hydrated:hydrated, oedema
}

//savese
//action:action, examid:examid, visitid:visitid
if ($action === "savese") {
    $examid = purifyentry("examid");
    $visitid = purifyentry("visitid");
    $observation = purifyentry("observation");
    //Systemic examination save
    $gq = "insert into consultation_sexamination (visitid, examinationcategory, observation) values "
            . "('$visitid','$examid','$observation')";
    //echo $gq;
    $mys = mysqli_query($w, $gq);
    if ($mys) {
        echo "Systemic examination saved";
    } else {
        $asdf = "update consultation_sexamination set observation = '$observation' where visitid ='$visitid' and examinationcategory ='$examid'";
        $asc = mysqli_query($w, $asdf);
        if ($asc) {
            echo "Systemic examination updated";
        } else {
            echo "Not saved nor updated.";
        }
    }
}

//loadge
if ($action === "loadge") {
    $visitid = purifyentry("visitid");

    $g = "select * from consultation_gexamination where visitid ='$visitid'";
    $ap = mysqli_query($w, $g);
    $aks = mysqli_fetch_array($ap);
    $examresult = $aks['examinationresult'];
    $id = $aks['id'];
    echo "<tr><td>$examresult</td><td></td></tr>";
//action:action, febrile:febrile, cyanosed:cyanosed, jaundiced:jaundiced, hydrated:hydrated, oedema
}

//loadse
if ($action === "loadse") {
    $visitid = purifyentry("visitid");

    $g = "select * from consultation_sexamination where visitid ='$visitid'";
    $ap = mysqli_query($w, $g);
    $count = 1;
    while ($aks = mysqli_fetch_array($ap)) {
        $observation = $aks['observation'];
        $id = $aks['consultation_pexaminationid'];
        $category = $aks['examinationcategory'];
        $aidg = "select * from consultation_pexaminationlist where pexamination_listid = '$category'";
        $aps = mysqli_query($w, $aidg);
        $gaa = mysqli_fetch_array($aps);
        $categoryname = $gaa['examcategory'];
        echo "<tr style='font-size:13px'><td>$count</td><td>$categoryname</td><td colspan='2'>$observation</td></tr>";
        $count++;
    }
//action:action, febrile:febrile, cyanosed:cyanosed, jaundiced:jaundiced, hydrated:hydrated, oedema
}

if ($action === "regdiagnosis") {

    $diagnosis = purifyentry("diagnosisid");
    $addinfo = purifyentry("addinfo");
    $visitid = purifyentry("visitid");

    $a = "insert into consultation_diagnosis (visitid, diagnosisid, comment) values ('$visitid','$diagnosis','$addinfo')";
    $qa = mysqli_query($w, $a);
    if ($qa) {
        echo "Diagnosis saved";
    } else {
        //update
        $bg = "update consultation_diagnosis set comment='$addinfo' where visitid='$visitid' and diagnosisid='$diagnosis'";
        $hq = mysqli_query($w, $bg);
        if ($hq) {
            echo "Updated";
        }
    }
}

if ($action === "pulldiagnosis") {
    $visitid = purifyentry("visitid");
    $fw = "select * from consultation_diagnosis where visitid='$visitid'";
    $hq = mysqli_query($w, $fw);
    while ($qg = mysqli_fetch_array($hq)) {
        $diagnosisid = $qg['diagnosisid'];
        $comment = $qg['comment'];
        //get diagnosis names
        $hs = "select * from mshdiagnosis where diagnosisid='$diagnosisid'";
        $va = mysqli_query($w, $hs);
        $pq = mysqli_fetch_array($va);
        $diagnosis = $pq['diagnosis'];
        echo "<tr><td></td><td>$diagnosis</td><td>$comment</td><td><i class='fa fa-times red'></i></td><td></td></tr>";
    }
}

if ($action === "savediagnosis") {
    //icdcode:a, icddiagnosis:b,
    $icdcode = purifyentry("icdcode");
    $icddiagnosis = purifyentry("icddiagnosis");

    $ha = "insert into mshdiagnosis (diagnosis, icdcode) values ('$icddiagnosis','$icdcode')";
    $qd = mysqli_query($w, $ha);
    if ($qd) {
        echo "Diagnosis saved";
    } else {
        echo "Diagnosis not saved. Check that is was not previously saved";
    }
}

if ($action === "pullicddiagnosis") {
    $v = "select * from mshdiagnosis order by diagnosis asc";
    $q = mysqli_query($w, $v);
    $count = 1;
    if (mysqli_num_rows($q) < 1) {
        echo "<tr><td colspan='5' style='text-align:center; color:red'>There are no diagnosis records to show</td></tr>";
    }
    while ($d = mysqli_fetch_array($q)) {
        $id = $d['diagnosisid'];
        $icdcode = $d['icdcode'];
        $diagnosis = $d['diagnosis'];

        echo "<tr><td>$count</td><td>$icdcode</td><td>$diagnosis</td><td><i class='fa fa-newspaper-o ptr' title='update diagnosis'></i></td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deletediag(\"$id\")'></i></td></tr>";
        $count++;
    }
}

if ($action === "medicationhistory") {
    $hospitalid = purifyentry("hospitalid");
    //Pull all visitids
    $has = mysqli_query($w, "select visitid from checkinlog where hospitalid='$hospitalid'");
    while ($s = mysqli_fetch_array($has)) {
        $visitid = $s['visitid'];
        //get prescription
        $hua = mysqli_query($w, "select * from consultation_prescription where qtydispensed > 0");
        $ha = mysqli_fetch_array($hua);
        $drugid = $ha['drugid'];
        $dosage = $ha['dosage'];
        //get drug name
        $drugname = getdrugname($drugid);
        echo "<div style='margin-bottom:10px; background-color:rgba(0,0,0,0.1); padding:10px'>$drugname $dosage-(dosage)</div>";
    }
    //get all dispensed drugs in visitid groups.
}