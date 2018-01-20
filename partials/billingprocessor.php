<?php

include "connect.php";

$action = purifyentry("action");
$staffid = "4";

function lodgebill($request, $clienttype, $staffid, $visitid, $item, $subitem, $qty, $unitamount) {
    if ($request === "enquire") {
        //Return bill for display
    } else {
        $amount = $qty * $unitamount;
        $hq = "insert into billinglog (visitid, clienttype,item, subitem, staffid, unitamount, amount, paymentstatus) values ('$visitid','$plantype','$item','$subitem','$staffid','$unitamount','$amount','0')";
        return $hq;
    }
}

if ($action === "registration") {
    // hid: hid, pc: pc, plan: plan, clregtype: clregtype
    $visitid = purifyentry("hid"); //This field for visitid or hospitalid. In this case, we do not have visit id yet.. since client has not been checked in.
    $paymentclient = purifyentry("pc"); //HMO/NHIS/Private etc
    //Get payclient name. Not ID.
    $qp = "select * from billingcategory where categoryid='$paymentclient'";
    $og = mysqli_query($w, $qp);
    $hqa = mysqli_fetch_array($og);
    $paymentclientname = $hqa['name'];

    $payplan = purifyentry("plan"); // Mediplan, Hygeia, Private, Kewalrams etc
    $jq = "select billclient from billingclient where billingclientid='$payplan'";
    $byed = mysqli_query($w, $jq);
    $hqy = mysqli_fetch_array($byed);
    $clientname = $hqy['billclient'];
    $payclientname = $paymentclientname . " ($clientname) ";

    $clregtype = purifyentry("clregtype"); // Individual/family registration etc
    $qhs = mysqli_query($w, "select name from billinggroups where billingclientid='$clregtype'");
    $ghst = mysqli_fetch_array($qhs);
    $billname = $ghst['name'];
    //Pull name;
    $ahsd = mysqli_query($w, "select * from billingcategory where categoryid='$paymentclient'");
    $hdg = mysqli_fetch_array($ahsd);
    $clienttype = $hdg['name'];
    if ($clienttype === "Private") {
        $q = mysqli_query($w, "select private from billinggroups where billingclientid ='$clregtype'");
        $g = mysqli_fetch_array($q);
        $unitamount = $g['private'];
    }
    if ($clienttype === "Company") {
        $q = mysqli_query($w, "select corporate from billinggroups where billingclientid ='$clregtype'");
        $g = mysqli_fetch_array($q);
        $unitamount = $g['corporate'];
    }
    if ($clienttype === "HMO") {
        $unitamount = 0;
    }
    $action = "registerclient";
    $qty = 1;
    $subitem = "";
    //visitid, clienttype,item, subitem, staffid, amount, paymentstatus
    //lodgebill($request, $plantype, $staffid, $visitid, $item, $subitem, $qty, $unitamount)
    //$qgcs = lodgebill("savebill", $payclientname, $staffid, $visitid, $billname, $subitem, $qty, $unitamount);
    $amount = $qty * $unitamount;
    $qgcs = "insert into billinglog (visitid, clienttype,item, subitem, staffid, unitamount, totalamount, paymentstatus) values ('$visitid','$payclientname','$billname','$subitem','$staffid','$unitamount','$amount','0')";
    echo $qgcs;
    $qz = mysqli_query($w, $qgcs);
    if ($qz) {
        
    } else {
        echo "Bill not made";
    }
}

if ($action === "nursesconsultation") {
    
}

if ($action === "nursesinvestigation") {
    
}

if ($action === "consultation") {
    $clregtype = 4;
    //Get vital information for the records..
    //plancategory e.g Private/HMO/NHIS/Corporate
    //client e.g Hygeia(HMO), Private(private), NHIS
    //clientplan e.g Hygeia silver, Hygeia gold etc
    //visitid:visitid
    $visitid = purifyentry("visitid"); //This field for visitid or hospitalid. In this case, we do not have visit id yet.. since client has not been checked in.
    $hospid = purifyentry("hospid");
    //Get hospitalid, paymenttype(HMO/NHIS/Private/Corporate), PaymentPlan, consultation fees

    $paymenttype = getclienttype($hospid);
    $payclientname = $paymenttype . " (" . getpaymentclient($hospid) . ")";
    $qhs = mysqli_query($w, "select name from billinggroups where billingclientid='$clregtype'");
    $ghst = mysqli_fetch_array($qhs);
    $billname = "consultationfee";
    //Pull name;
    if ($paymenttype === "Private") {
        $q = mysqli_query($w, "select private from billinggroups where billingclientid ='$clregtype'");
        $g = mysqli_fetch_array($q);
        $unitamount = $g['private'];
    }
    if ($paymenttype === "Company") {
        $q = mysqli_query($w, "select corporate from billinggroups where billingclientid ='$clregtype'");
        $g = mysqli_fetch_array($q);
        $unitamount = $g['corporate'];
    }
    if ($paymenttype === "HMO") {
        $unitamount = 0;
    }
    $qty = 1;
    $subitem = "";
    //visitid, clienttype,item, subitem, staffid, amount, paymentstatus
    //lodgebill($request, $plantype, $staffid, $visitid, $item, $subitem, $qty, $unitamount)
    //$qgcs = lodgebill("savebill", $payclientname, $staffid, $visitid, $billname, $subitem, $qty, $unitamount);
    $amount = $qty * $unitamount;
    $qgcs = "insert into billinglog (visitid, clienttype,item, subitem, quantity, staffid, unitamount, totalamount, paymentstatus) values ('$visitid','$payclientname','$billname','$subitem','$qty','$staffid','$unitamount','$amount','0')";
    $qz = mysqli_query($w, $qgcs);
    if ($qz) {
        echo "Bill logged";
    } else {
        echo "Bill not made";
    }
}

if ($action === "labinvestigation") {
    //action: action, visitid: visitid, hospid: hospid,itemid:itemid, qty:qty
    $visitid = purifyentry("visitid");
    $hospid = purifyentry("hospid");
    $invid = purifyentry("itemid");
    $paymenttype = getclienttype($hospid);
    $clientplan = getpaymentclient($hospid);

    $q = mysqli_query($w, "select name, private, corporate from investigation_name where investigation_nameid ='$invid'");
    $g = mysqli_fetch_array($q);
    $unitamount = 0;
    if ($paymenttype === "Private") {
        $unitamount = $g['private'];
    }
    if ($paymenttype === "Company") {
        $unitamount = $g['corporate'];
    }
    if ($paymenttype === "HMO") {
        $unitamount = 0;
    }
    $qty = 1;
    $subitem = $g['name'];
    $billname = "labs ($subitem)";
    $payclientname = $paymenttype . "( $clientplan )";
    //visitid, clienttype,item, subitem, staffid, amount, paymentstatus
    //lodgebill($request, $plantype, $staffid, $visitid, $item, $subitem, $qty, $unitamount)
    //$qgcs = lodgebill("savebill", $payclientname, $staffid, $visitid, $billname, $subitem, $qty, $unitamount);
    $amount = $qty * $unitamount;
    $qgcs = "insert into billinglog (visitid, clienttype,item, subitem, quantity, staffid, unitamount, totalamount, paymentstatus) values ('$visitid','$payclientname','$billname','$subitem','$qty','$staffid','$unitamount','$amount','0')";
    $qz = mysqli_query($w, $qgcs);
    if ($qz) {
        //echo "Bill logged";
    } else {
        echo "Bill for service is $unitamount. It is not logged";
    }
}

if ($action === "pharmacyprescription") {
    //hospid, visitid, drugid, rqdrugs
    $visitid = purifyentry("visitid");
    $hospid = purifyentry("hospid");
    $drugid = purifyentry("itemid");
    $rqdrugs = purifyentry("rqdrugs");

    $paymenttype = getclienttype($hospid);
    $clientplan = getpaymentclient($hospid);

    $q = mysqli_query($w, "select brandname, genericname, private, corporate from pharmacy_drugs where pharma_drugsid ='$drugid'");
    $g = mysqli_fetch_array($q);
    $unitamount = "0";
    if ($paymenttype === "Private") {
        $unitamount = $g['private'];
    }
    if ($paymenttype === "Company") {
        $unitamount = $g['corporate'];
    }
    if ($paymenttype === "HMO") {
        $unitamount = 0;
    }
    if ($paymenttype === "NHIS") {
        $unitamount = 0;
    }
    $qty = $rqdrugs;
    $subitem = $g['brandname'] . " " . $g['genericname'];
    $billname = "Pharmacy ($subitem)";
    $payclientname = $paymenttype . "( $clientplan )";
    //visitid, clienttype,item, subitem, staffid, amount, paymentstatus
    //lodgebill($request, $plantype, $staffid, $visitid, $item, $subitem, $qty, $unitamount)
    //$qgcs = lodgebill("savebill", $payclientname, $staffid, $visitid, $billname, $subitem, $qty, $unitamount);
    $amount = $qty * $unitamount;
    $qgcs = "insert into billinglog (visitid, clienttype,item, subitem, quantity, staffid, unitamount, totalamount, paymentstatus) values ('$visitid','$payclientname','$billname','$subitem','$qty','$staffid','$unitamount','$amount','0')";
    $qz = mysqli_query($w, $qgcs);
    if ($qz) {
        //echo "Bill logged";
    } else {
        //echo "Bill for service is $unitamount. It is not logged";
        $hqa = "update billinglog set quantity='$qty', totalamount='$amount' where visitid='$visitid' and item='$billname'";
        $qa = mysqli_query($w, $hqa);
        if ($qa) {
            echo "Update made to prescription and bill updated.";
        }
    }
}

if ($action === "Accomodation") {
    
}

if ($action === "NursesCare") {
    
}

if ($action === "Surgery") {
    
}

if ($action === "ProfessionalFees") {
    
}

if ($action === "DelayANC") {
    
}

//Accomodation, NursesCare, Surgery, ProfessionalFees, DelayANC

function getclienttype($hospid) {
    GLOBAL $w;
    $aq = "select patienttype from patient_register where hospitalid='$hospid'";

    $qh = mysqli_query($w, $aq);
    $hqc = mysqli_fetch_array($qh);
    $paytype = $hqc['patienttype'];

    //
    $nw = "select name from billingcategory where categoryid='$paytype'";
    $sdc = mysqli_query($w, $nw);
    $jq = mysqli_fetch_array($sdc);
    $clienttype = $jq['name'];
    return $clienttype;
}

function getpaymentclient($hospid) {
    GLOBAL $w;
    $aq = "select paymentplan from patient_register where hospitalid='$hospid'";
    $qh = mysqli_query($w, $aq);
    $hqc = mysqli_fetch_array($qh);
    $paytype = $hqc['paymentplan'];

    //
    $nw = "select billclient from billingclient where billingclientid='$paytype'";
    $sdc = mysqli_query($w, $nw);
    $jq = mysqli_fetch_array($sdc);
    $clientname = $jq['billclient'];
    return $clientname;
}

if ($action === "search") {
    $fieldname = purifyentry("fieldname");
    $fieldvalue = purifyentry("value");

    $tr = "select * from patient_register where $fieldname like '%$fieldvalue%' limit 10";
    $hf = mysqli_query($w, $tr);
    if (mysqli_num_rows($hf) < 1) {
        echo "<tr><td colspan='4' style='text-align:center'>Search returned nothing</td></tr>";
    }
    while ($xs = mysqli_fetch_array($hf)) {
        $patientname = strtoupper($xs['lastname']) . " " . $xs['firstname'];
        $hospitalid = $xs['hospitalid'];
        $gender = $xs['gender'];
        $phone = $xs['phonenumber'];

        echo "<tr class='ptr thov' onclick='pullextrabilldetails(\"$hospitalid\")'><td>$patientname</td><td>$hospitalid</td><td>$gender</td><td>$phone</td></tr>";
    }
}

if ($action === "pullbilldets") {
    //hospitalid
    //error_reporting(0);
    $hospid = purifyentry("hospitalid");
    $asd = "select distinct visitid from billinglog where visitid like '%$hospid%'";
    $hw = mysqli_query($w, $asd);

    if (mysqli_num_rows($hw) < 1) {
        echo "<div class='norecords' style='text-align:center'>No bill records found</div>";
        return;
    }
    while ($qg = mysqli_fetch_array($hw)) {
        $visitid = $qg['visitid'];
        $datee = convertvisitidtod($visitid);
        echo "<span class='visitbills' onclick='pullbillfor(\"$visitid\")'>$datee</span>";
    }
}

if ($action === "getbillfordoc") {
    $visitid = purifyentry("visitid");
    $asd = "select * from billinglog where visitid = '$visitid'";
    $hw = mysqli_query($w, $asd);
    if (mysqli_num_rows($hw) < 1) {
        echo "<tr><td colspan='6'>No bill record</td></tr>";
        return;
    }
    $count = 1;
    $bill = 0;
    $paydets = "";
    $paysheet = "<table class='table table-condensed table-bordered table-striped'><tr style='font-weight:500; font-size:16px'><td></td><td>Bill item</td><td>Amount</td><td></td></tr>";
    while ($qg = mysqli_fetch_array($hw)) {
        $clienttype = $qg['clienttype'];
        $item = $qg['item'];
        $subitem = $qg['subitem'];
        $qty = $qg['quantity'];
        $unitamount = $qg['unitamount'];
        $totalamt = $qg['totalamount'];
        $bill += $totalamt;
        $dateadded = $qg['dateadded'];
        $patientname = getnamefromvisitid($visitid);
        $paysheet .= "<tr><td>$count</td><td>$item</td><td style='font-weight:bold'>&#8358; $bill</td></tr>";
        $count++;
    }
    $paymentmade = getamtpaid($visitid);
    $paymentleft = $bill - $paymentmade;
    echo $paysheet . "</table>";
}

if ($action === "billspread") {
    //hospitalid
    //error_reporting(0);
    $visitid = purifyentry("hospitalid");

    $asd = "select * from billinglog where visitid = '$visitid'";
    $hw = mysqli_query($w, $asd);
    if (mysqli_num_rows($hw) < 1) {
        echo "<tr><td colspan='6'>No bill record</td></tr>";
        return;
    }
    $count = 1;
    $bill = 0;
    $paydets = "";
    $paysheet = "<table class='table table-condensed table-bordered table-striped'><tr style='font-weight:500; font-size:16px'><td></td><td>Bill item</td><td>Quantity</td><td>Unit amount</td><td>Amount</td><td>Date/time</td><td></td></tr>";
    while ($qg = mysqli_fetch_array($hw)) {
        $clienttype = $qg['clienttype'];
        $item = $qg['item'];
        $subitem = $qg['subitem'];
        $qty = $qg['quantity'];
        $unitamount = $qg['unitamount'];
        $totalamt = $qg['totalamount'];
        $bill += $totalamt;
        $dateadded = $qg['dateadded'];
        $patientname = getnamefromvisitid($visitid);
        $paysheet .= "<tr><td>$count</td><td>$item</td><td>$qty</td><td>&#8358; $unitamount</td><td>&#8358; $totalamt</td><td>$dateadded</td><td style='font-weight:bold'>&#8358; $bill</td></tr>";
        $count++;
    }
    $paymentmade = getamtpaid($visitid);
    $paymentleft = $bill - $paymentmade;
    echo "<div style='margin-bottom:10px'><span style='font-size:25px'>$patientname</span><br><span style='font-size:18px'>$clienttype</span><br><span>$dateadded</span><br><span id='innervisitid' style='display:none'>$visitid</span></div>" . $paysheet . "</table><div style='text-align:center; font-size:20px'>Bill - &#8358;<span id='amtpayable'>$bill</span></div><div style='text-align:center; font-size:25px'>Payable - &#8358;<span id='amtlefttopay'>$paymentleft</span></div>"
    . "<div style='margin-top:10px'><div style='text-align:center'><hr style='border-style:dashed; margin-bottom:5px; border-color:#ccc'><span class='paythings' onclick='changepaymenu(\"makepayment\")'>Make payment</span><span class='paythings' onclick='changepaymenu(\"paymenttimeline\")'>Payment timeline</span><hr style='border-style:dashed; margin-top:5px; border-color:#ccc'></div><div id='makepayments'>"
    . "<div><marquee>Payments should only be made in a maximum installment of two (2). Encourage patient to clear up bill on first payment</marquee></div>"
    . "<div style='text-align:center'><span style='display:inline-block; width:300px'><label style='font-weight:500'>Amount </label><input type='number' class='form-control' style='margin-bottom:5px; max-width:100%' id='billamounttopay'><input type='button' class='btn btn-success' value='Log payment' style='width:100%' onclick='makepayments(innervisitid.innerHTML,billamounttopay.value,amtlefttopay.innerHTML)'></span></div>"
    . "</div>"
    . "<div id='paymenttimelines'>"
    . ""
    . "</div>"
    . "</div>";
}

function convertvisitidtod($visitid) {
    error_reporting(0);
    $hs = explode("$", $visitid);
    $firststring = $hs[0];

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
    $day = "";
    $selmonth = "";
    $selyear = "";
    if (strlen($firststring) === 5) {
        $day = substr($firststring, 0, 1);
        $selmonth = substr($firststring, 1, 2);
        $selyear = substr($firststring, 3, 2);
    }

    if (strlen($firststring) === 6) {
        $day = substr($firststring, 0, 2);
        $selmonth = substr($firststring, 3, 2);
        $selyear = substr($firststring, 4, 2);
    }

    $datetoret = $day . " " . $month[$selmonth - 1] . " " . $selyear;
    if (strlen($visitid) <= 5) {
        $datetoret = "Registration";
    }
    return $datetoret;
}

function getamtpaid($visitid) {
    global $w;
    $qa = mysqli_query($w, "select paymentmade from paymenttimeline where visitid='$visitid'");
    $amountpaid = 0;
    while ($h = mysqli_fetch_array($qa)) {
        $amountpaid += $h['paymentmade'];
    }
    return $amountpaid;
}

if ($action === "savepayment") {
    //visitid:visitid, amounttopay:amounttopay, amountpaying:amountpaying
    $amounttopay = purifyentry("amounttopay");
    $visitid = purifyentry("visitid");
    $amountpaying = purifyentry("amountpaying");
    $amountleft = $amounttopay - $amountpaying;
    $q = "insert into paymenttimeline (visitid, payable, paymentmade, amountleft) values "
            . "('$visitid','$amounttopay','$amountpaying','$amountleft')";
    $asx = mysqli_query($w, $q);
    if ($asx) {
        echo "Payment made";
    } else {
        echo "Payment earlier logged";
    }
}

if ($action === "pullpayment") {
    $visitid = purifyentry("visitid");
    $ag = mysqli_query($w, "select * from paymenttimeline where visitid='$visitid'");
    $count = 1;
    $tabili = "<span style='padding:10px; background-color:rgba(255,255,255,0.2); display:inline-block'><table class='table table-condensed table-bordered table-striped' style='width:500px'><tr style='font-weight:600'><td></td><td>Payment made</td><td>Payment left</td><td>Date logged</td></tr>";
    while ($gq = mysqli_fetch_array($ag)) {
        $paymentmade = $gq['paymentmade'];
        $amountleft = $gq['amountleft'];
        $dateadded = $gq['dateadded'];
        $tabili .="<tr><td>$count</td><td>&#8358; $paymentmade</td><td>&#8358; -</td><td>$dateadded</td></tr>";
        $count++;
    }
    echo $tabili . "</table></span>";
}