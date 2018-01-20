<?php

include 'connect.php';
$action = purifyentry("action");

if ($action === "vs") {
    $t = datenow();
    $r = "select * from triage_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
    $d = mysqli_query($w, $r);
    $vs = mysqli_num_rows($d);
    echo "$vs";
}

if ($action === "cs") {
    $t = datenow();
    $r = "select * from consultation_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
    $d = mysqli_query($w, $r);
    $cs = mysqli_num_rows($d);
    echo "$cs";
}

if ($action === "lab") {
    $t = datenow();
    $r = "select * from investigation_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
    $d = mysqli_query($w, $r);
    $lb = mysqli_num_rows($d);
    echo "$lb";
}

if ($action === "pharmacy") {
    $t = datenow();
    $r = "select * from pharmacy_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
    $d = mysqli_query($w, $r);
    $ps = mysqli_num_rows($d);
    echo "$ps";
}

if ($action === "billing") {
    $t = datenow();
    $r = "select * from billing_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
    $d = mysqli_query($w, $r);
    $g = mysqli_num_rows($d);
    echo "$g";
}