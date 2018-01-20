<?php

include 'connect.php';

$action = purifyentry("action");
$queuetype = purifyentry("queuetype");

if ($action === "vitalsqueue") {
    $t = datenow();
    if ($queuetype === "today") {

        $mmg = "select triage_queue.visitid, triage_queue.checkintime,triage_queue.checkindate, checkinlog.hospitalid "
                . "from triage_queue INNER JOIN checkinlog ON triage_queue.visitid = checkinlog.visitid where triage_queue.checkouttime='00:00:00' and triage_queue.checkindate='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='starttriage(\"$visitid\")'>BeginTriage</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    } else {
        $mmg = "select triage_queue.visitid, triage_queue.checkintime,triage_queue.checkindate, checkinlog.hospitalid "
                . "from triage_queue INNER JOIN checkinlog ON triage_queue.visitid = checkinlog.visitid where triage_queue.checkouttime='00:00:00' and triage_queue.checkindate!='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='starttriage(\"$visitid\")'>BeginTriage</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
}
//consultationqueue

if ($action === "consultationqueue") {
    $t = datenow();
    if ($queuetype === "today") {
        $mmg = "select consultation_queue.visitid, consultation_queue.checkintime,consultation_queue.checkindate, checkinlog.hospitalid "
                . "from consultation_queue INNER JOIN checkinlog ON consultation_queue.visitid = checkinlog.visitid where consultation_queue.checkouttime='00:00:00' and consultation_queue.checkindate='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='startconsultation(\"$visitid\")'>Consult</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    } else {
        $mmg = "select consultation_queue.visitid, consultation_queue.checkintime,consultation_queue.checkindate, checkinlog.hospitalid "
                . "from consultation_queue INNER JOIN checkinlog ON consultation_queue.visitid = checkinlog.visitid where consultation_queue.checkouttime='00:00:00' and consultation_queue.checkindate!='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='startconsultation(\"$visitid\")'>Consult</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
}
//investigationqueue

if ($action === "investigationqueue") {
    $t = datenow();
    if ($queuetype === "today") {
        $mmg = "select investigation_queue.visitid, investigation_queue.checkintime,investigation_queue.reqStaffID,investigation_queue.checkindate, checkinlog.hospitalid "
                . "from investigation_queue INNER JOIN checkinlog ON investigation_queue.visitid = checkinlog.visitid where investigation_queue.checkouttime='00:00:00' and investigation_queue.checkindate='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $reqStaffID = $gq['reqStaffID'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];

                //Get Staff Name from staff register
                $ta = mysqli_query($w, "select  firstname, lastname from staff where staffid ='$reqStaffID'");
                $wq = mysqli_fetch_array($ta);
                $staffname = $wq['lastname'] . " " . $wq['firstname'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td>$staffname</td><td class='ptr' style='text-align:center'><span class='reset' onclick='startconsultation(\"$visitid\")'>Attend</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    } else {
        $mmg = "select investigation_queue.visitid, investigation_queue.checkintime,investigation_queue.reqStaffID,investigation_queue.checkindate, checkinlog.hospitalid "
                . "from investigation_queue INNER JOIN checkinlog ON investigation_queue.visitid = checkinlog.visitid where investigation_queue.checkouttime='00:00:00' and investigation_queue.checkindate!='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $reqStaffID = $gq['reqStaffID'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];

                //Get Staff Name from staff register
                $ta = mysqli_query($w, "select  firstname, lastname from staff where staffid ='$reqStaffID'");
                $wq = mysqli_fetch_array($ta);
                $staffname = $wq['lastname'] . " " . $wq['firstname'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td>$staffname</td><td class='ptr' style='text-align:center'><span class='reset' onclick='startconsultation(\"$visitid\")'>Attend</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
}
//Pharmacy queue
if ($action === "pharmaqueue") {
    $t = datenow();
    if ($queuetype === "today") {
        $mmg = "select pharmacy_queue.visitid, pharmacy_queue.checkintime,pharmacy_queue.checkindate, checkinlog.hospitalid "
                . "from pharmacy_queue INNER JOIN checkinlog ON pharmacy_queue.visitid = checkinlog.visitid where pharmacy_queue.checkouttime='00:00:00' and pharmacy_queue.checkindate='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='selectpharmapatient(\"$visitid\")'>Select Patient</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
    if ($queuetype === "legacyrecords") {
        $mmg = "select pharmacy_queue.visitid, pharmacy_queue.checkintime,pharmacy_queue.checkindate, checkinlog.hospitalid "
                . "from pharmacy_queue INNER JOIN checkinlog ON pharmacy_queue.visitid = checkinlog.visitid where pharmacy_queue.checkouttime='00:00:00' and pharmacy_queue.checkindate!='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='selectpharmapatient(\"$visitid\")'>Select Patient</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
    if ($queuetype === "checkinrecords") {
        $t = datenow();
        $mmg = "select triage_queue.visitid, triage_queue.checkintime,triage_queue.checkindate, checkinlog.hospitalid "
                . "from triage_queue INNER JOIN checkinlog ON triage_queue.visitid = checkinlog.visitid where triage_queue.checkindate='$t'";
        $tw = mysqli_query($w, $mmg);
        if ($tw) {
            $count = 1;
            while ($gq = mysqli_fetch_array($tw)) {
                $visitid = $gq['visitid'];
                $checkintime = $gq['checkintime'];
                $checkindate = $gq['checkindate'];
                $hospitalid = $gq['hospitalid'];
                //Getting patient Name from patient_registers table
                $mv = "select patient_register.firstname, patient_register.lastname, patient_register.patienttype, billingcategory.name from patient_register "
                        . "inner join billingcategory on patient_register.patienttype = billingcategory.categoryid where "
                        . "patient_register.hospitalid='$hospitalid'";
                $pq = mysqli_query($w, $mv);
                $xt = mysqli_fetch_array($pq);
                $name = strtoupper($xt['lastname']) . " " . $xt['firstname'];
                $paycategory = $xt['name'];
                $pattype = $xt['patienttype'];
                $xxd = colorman($pattype);
                echo "<tr style='font-size:11px'><td>$count</td><td>$hospitalid</td><td>$name</td><td>$checkintime</td><td>$checkindate</td><td>$xxd $paycategory</td><td class='ptr' style='text-align:center'><span class='reset' onclick='prescribedrugs(\"$visitid\")'>Prescribe</span></td></tr>";
                $count++;
            }
        } else {
            echo "Bad trail";
        }
    }
}