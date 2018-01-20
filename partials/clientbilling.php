<?php

include 'connect.php';

$action = purifyentry("action");

if ($action === "pullpayname") {
    //catvalue: catvalue
    $categoryvalue = purifyentry("catvalue");
    $hs = "select * from billingclient where billgroupid='$categoryvalue'";
    $gq = mysqli_query($w, $hs);
    echo "<option>--Select--</option>";
    while ($bq = mysqli_fetch_array($gq)) {
        $billclientid = $bq['billingclientid'];
        $billclient = $bq['billclient'];
        echo "<option value='$billclientid'>$billclient</option>";
    }
}

if ($action === "pullpayplan") {
    $paynameid = purifyentry("paynameid");
    $hs = "select * from billingplan where clientnameid='$paynameid'";
    $gq = mysqli_query($w, $hs);
    echo "<option>--Select--</option>";
    while ($bq = mysqli_fetch_array($gq)) {
        $billplanid = $bq['planid'];
        $clientplan = $bq['clientplan'];
        echo "<option value='$billplanid'>$clientplan</option>";
    }
}

if ($action === "saveclient") {
    $clienttype = purifyentry("clienttype");
    $clientname = purifyentry("clientname");
    //clienttype:clienttype, clientname:clientname
    $fc = "insert into billingclient (billgroupid, billclient) values ('$clienttype','$clientname')";
    $qz = mysqli_query($w, $fc);
    if ($qz) {
        echo "$clientname saved";
    } else {
        echo "$clientname not saved";
    }
}

if ($action === "pullclients") {
    $categoryid = purifyentry("categoryid");
    $a = "select * from billingclient where billgroupid='$categoryid'";
    $hq = mysqli_query($w, $a);
    echo "<option>--Select--</option>";
    while ($kq = mysqli_fetch_array($hq)) {
        $billclient = $kq['billclient'];
        $clientid = $kq['billingclientid'];
        echo "<option value='$clientid'>$billclient</option>";
    }
}

if ($action === "saveclientplan") {
    //clientnameid: clientnameid, clientplan: clientplan
    $clientnameid = purifyentry("clientnameid");
    $clientplan = purifyentry("clientplan");

    $gqs = "insert into billingplan (clientplan, clientnameid) values ('$clientplan','$clientnameid')";
    $as = mysqli_query($w, $gqs);
    //echo $as;
    if ($as) {
        echo "Plan saved";
    } else {
        echo "Plan not saved";
    }
}