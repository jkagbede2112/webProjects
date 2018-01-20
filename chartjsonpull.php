<?php

include 'partials/connect.php';

$q = "select visitid from checkinlog where hospitalid='035/01'";
$d = mysqli_query($w, $q);
while ($g = mysqli_fetch_array($d)) {
    $visitid = $g['visitid'];
    //Get triage vitals
    $th = "select systolic, diastolic, dateadded from triage_vitals where visitid='$visitid'";
    $gt = mysqli_query($w, $th);

    $data = array();
    foreach ($gt as $row) {
        $data[] = $row;
    }

    print json_encode($data);
}