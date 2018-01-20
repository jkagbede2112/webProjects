<?php

include 'connect.php';

$action = purifyentry("action");

if ($action === "saveDRGcat") {
    $categoryname = purifyentry("drgcat");
    $h = "insert into pharmacy_drugcategory (drugcategory) value ('$categoryname')";
    $qx = mysqli_query($w, $h);
    if ($qx) {
        echo "Category saved";
    } else {
        echo "Category not saved";
    }
}

function checkcodevalidity() {
    global $w;
    $datex = date("Y-m-d");
    $kq = "select * from pharmacy_restockcode where codegeneratedate='$datex' and status ='1'";
    $kqa = mysqli_query($w, $kq);
    if (mysqli_num_rows($kqa) > 0) {
        return 1;
    } else {
        return 0;
    }
}

if ($action === "activaterestock") {
    $code = purifyentry("code");
    $datex = date("Y-m-d");
    //check if code exists and date on it is today.
    $o = mysqli_query($w, "select * from pharmacy_restockcode where drcode ='$code'");
    if (mysqli_num_rows($o) < 1) {
        echo "Code is not valid";
        return;
    }
    $ak = mysqli_fetch_array($o);
    $codestatus = $ak['status'];
    $generatedate = $ak['codegeneratedate'];
    if ($generatedate !== $datex) {
        echo "Code expired. Request new code";
        return;
    }
    if ($codestatus === "1") {
        echo "This code is already active";
    }
    if ($codestatus === "0") {
        $q = "update pharmacy_restockcode set status='1' where drcode ='$code' and dateadded like '%$datex%'";
//echo $q;
        $kq = mysqli_query($w, $q);
        if ($kq) {
            echo "1";
        } else {
            echo "0";
        }
    }
}

function getrestockcode() {
    global $w;
    $tod = date('Y-m-d');
    $wq = "select * from pharmacy_restockcode where codegeneratedate = '$tod'";
    $ja = mysqli_query($w, $wq);
    $co = mysqli_fetch_array($ja);
    $pulldate = $co['drcode'];
    return $pulldate;
}

if ($action === "restockdrugs") {
    //Check if there is a valid code to authorize restock
    $hh = checkcodevalidity();
    if ($hh === 0) {
        echo "Get authorization code first";
        return;
    }
    $authoritycode = getrestockcode();
    //Get details for update and process restock.
    //drugid:c, qtytoadd:a
    $drugid = purifyentry("drugid");
    $qty = purifyentry("qtytoadd");

    $today = datenow();
    //Get current drugcount
    $drgcount = getdrugcount($drugid);
    $newdrug = $qty + $drgcount;

    //Check if drug already has been restocked
    $gn = "select * from restockrecord where drugid='$drugid' and restockdate='$today'";
    $hqz = mysqli_query($w, $gn);
    if (mysqli_num_rows($hqz) > 0) {
        $drgct = getdrugcount($drugid);
        echo "<span style='color:red; font-weight:500'>Restock previously made ( $drgct )</span>";
        return;
    }

    //Update new drug count
    $gqa = "update pharmacy_drugs set stockcount = '$newdrug' where pharma_drugsid='$drugid'";
    $hqx = mysqli_query($w, $gqa);

    echo $newdrug;

    //Log stock entry intro separate table.
    $d = "insert into restockrecord (drugid, prevqty, qtyadded, currqty, restockcode, restockdate) value ('$drugid','$drgcount','$qty','$newdrug','$authoritycode','$today')";
    $hq = mysqli_query($w, $d);
}

function checkcodegenerate() {
    global $w;
    $thismonth = date("m") . "-" . date("Y");
    $datex = date("Y-m-d");
    //Check if already generated today
    $ha = "select * from pharmacy_restockcode where dateadded like '%$datex%'";
    $ju = mysqli_query($w, $ha);
    if (mysqli_num_rows($ju) > 0) {
        return "gt";
    } else {
        //Check if generate this month
        if (mysqli_num_rows($ju) === 4) {
            return "mga";
        }
    }
}

if ($action === "genCode") {
    //Check if code generated already
    $h = checkcodegenerate();
    if ($h === "gt") {
        echo "<div style='color:red; font-weight:500; text-align:center'>Daily code generation quota reached</div>";
        return;
    }
    if ($h === "mga") {
        echo "<div style='color:red; font-weight:500; text-align:center'>Monthly code generation reached</div>";
        return;
    }
    //Check if maximum number of codes are already generated
    //Generate code
    $chr = chr(rand(97, 119));
    $rnd = rand(2000, 9999);
    $cq = "MSHI" . $rnd . date("m") . $chr;
    //Save generated code
    $datex = date("Y-m-d");
    $gq = "insert into pharmacy_restockcode (codegeneratedate, drcode) values ('$datex','$cq')";
    $qak = mysqli_query($w, $gq);
    if ($qak) {
        echo "Code sent to Central Admin. Call for code in 10minutes";
        //sendmail to central admin officer in-charge of requisition and 
        $message = "<div>A re-stock code has been generated for restock of drugs items at Mt. Sinai Hospital, Isolo. The code is <br><br><span>$cq</span><br><br>Relay this code to the </div>";
    } else {
        echo "Could not generate code";
    }
}

if ($action === "pullthisdrugusage") {
    $drugid = purifyentry("drugid");
    $drugname = getdrugname($drugid);
    $qa = "select * from consultation_prescription where drugid='$drugid' and qtydispensed>0 order by dateadded desc limit 20";
    $wq = mysqli_query($w, $qa);
    $hq = "";
    $count = 1;
    $private = 0;
    $hmo = 0;
    $company = 0;
    $nhis = 0;
    while ($jq = mysqli_fetch_array($wq)) {
        $visitid = $jq['visitid'];
        $qtyrqst = $jq['qtyrequested'];
        $dosage = $jq['dosage'];
        $qtyleft = $jq['qtyleft'];
        $dateadded = $jq['dateadded'];
        $clientname = getnamefromvisitid($visitid);
        $clienttype = getclienttypefromvisitid($visitid);
        if ($clienttype === "Private") {
            $private++;
        }
        if ($clienttype === "HMO") {
            $hmo++;
        }
        if ($clienttype === "NHIS") {
            $nhis++;
        }
        if ($clienttype === "Company") {
            $company++;
        }
        $hq .= "<tr><td>$count</td><td>$clientname</td><td>$clienttype</td><td>$dosage</td><td>$qtyleft</td><td>$dateadded</td></tr>";
        $count++;
    }
    echo "<div style='font-weight:600; text-align:center; margin-bottom:10px'>Drug requests for $drugname</div><div style='text-align:center; font-size:12px; color:#8F4A94; font-weight:500'>Private - $private, HMO - $hmo, Company - $company, NHIS - $nhis</div><table class='table table-bordered table-condensed table-striped' style='width:100%'><tr style='font-weight:400; background-color:#B6B6B6; color:#fff'><td></td><td>Name</td><td>Type</td><td>Dosage</td><td>Qty left</td><td></td></tr><tbody style='font-size:11px; font-family:verdana'>" . $hq . "</tbody></table>";
}

if ($action === "computesummary") {
    //drugname: drugid, datefrom: from, dateto: to
    $drugid = purifyentry("drugname");
    $datefrom = purifyentry("datefrom");
    $dateto = purifyentry("dateto");
    $period = "<span style='font-size:10px'>$datefrom to $dateto</span>";

    if ($drugid === "All") {
        $a = "select * from pharmacy_drugmovement where movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        $private = 0;
        $company = 0;
        $HMO = 0;
        $NHIS = 0;
        $all = 0;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            //Get patient type
            $clienttype = getclienttypefromvisitid($visitid);
            $drugprice = getdrugpriceunitprice($drugid, $clienttype);
            $qty = $h['qtymoved'];
            $price = $qty * $drugprice;
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            if ($clienttype === "HMO") {
                $HMO += $price;
                $all += $price;
            }
            if ($clienttype === "NHIS") {
                $NHIS += $price;
                $all += $price;
            }
            if ($clienttype === "Private") {
                $private += $price;
                $all += $price;
            }
            if ($clienttype === "Company") {
                $company += $price;
                $all += $price;
            }
        }
        $proc = number_format($all, 2);
        echo "<span style='font-family:verdana; font-size:12px'><div style='font-size:20px; text-align:center'>NGN $proc ($period) </div>- NGN $private - Private <br>- NGN $company - Company <br>- NGN $NHIS - NHIS <br>- NGN $HMO - HMO</span>";
    } else {
        $a = "select * from pharmacy_drugmovement where drugid='$drugid' and movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        $private = 0;
        $company = 0;
        $HMO = 0;
        $NHIS = 0;
        $all = 0;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            //Get patient type
            $clienttype = getclienttypefromvisitid($visitid);
            $drugprice = getdrugpriceunitprice($drugid, $clienttype);
            $qty = $h['qtymoved'];
            $price = $qty * $drugprice;
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            if ($clienttype === "HMO") {
                $HMO += $price;
                $all += $price;
            }
            if ($clienttype === "NHIS") {
                $NHIS += $price;
                $all += $price;
            }
            if ($clienttype === "Private") {
                $private += $price;
                $all += $price;
            }
            if ($clienttype === "Company") {
                $company += $price;
                $all += $price;
            }
        }
        $proc = number_format($all, 2);
        echo "<span style='font-family:verdana; font-size:12px'><div style='font-size:20px; text-align:center'>NGN $proc ($period) </div>- NGN $private - Private <br>- NGN $company - Company <br>- NGN $NHIS - NHIS <br>- NGN $HMO - HMO</span>";
    }
}

if ($action === "pulldrugsusageturnover") {
    //drugname: drugname, datefrom: datefrom, dateto: dateto
    $drugname = purifyentry("drugname");
    $datefrom = purifyentry("datefrom") . " 00:00:00";
    $dateto = purifyentry("dateto") . " 00:00:00";

    if ($drugname === "All") {
        $a = "select * from pharmacy_drugmovement where movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            //Get patient type
            $clienttype = getclienttypefromvisitid($visitid);
            $drugprice = getdrugpriceunitprice($drugid, $clienttype);
            $qty = $h['qtymoved'];
            $price = $qty * $drugprice;
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            echo "<tr><td>$count</td><td>$drugname</td><td>$clienttype</td><td>₦ $drugprice</td><td> $qty</td><td>₦ $price</td><td>$hospid</td><td>$visitdate</td></tr>";
            $count++;
        }
    } else {
        $a = "select * from pharmacy_drugmovement where drugid='$drugname' and movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            //Get patient type
            $clienttype = getclienttypefromvisitid($visitid);
            $drugprice = getdrugpriceunitprice($drugid, $clienttype);
            $qty = $h['qtymoved'];
            $price = $qty * $drugprice;
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            echo "<tr><td>$count</td><td>$drugname</td><td>$clienttype</td><td>₦ $drugprice</td><td> $qty</td><td>₦ $price</td><td>$hospid</td><td>$visitdate</td></tr>";
            $count++;
        }
    }
}

if ($action === "pulldrugsusage") {
    //drugname: drugname, datefrom: datefrom, dateto: dateto
    $drugname = purifyentry("drugname");
    $datefrom = purifyentry("datefrom") . " 00:00:00";
    $dateto = purifyentry("dateto") . " 00:00:00";

    if ($drugname === "All") {
        $a = "select * from pharmacy_drugmovement where movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            $qty = $h['qtymoved'];
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            echo "<tr><td>$count</td><td>$drugname</td><td>$patientname</td><td>$hospid</td><td>$visitdate</td><td>$qty</td><td>$left</td></tr>";
            $count++;
        }
    } else {
        $a = "select * from pharmacy_drugmovement where drugid='$drugname' and movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
        //echo $a;
        $qk = mysqli_query($w, $a);
        if (mysqli_num_rows($qk) < 1) {
            echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
            return;
        }
        $count = 1;
        while ($h = mysqli_fetch_array($qk)) {
            $drugid = $h['drugid'];
            $visitid = $h['visitid'];
            $qty = $h['qtymoved'];
            $left = $h['qtyleft'];
            $drugname = getdrugname($drugid);
            $patientname = getnamefromvisitid($visitid);
            $hospid = gethospitalidfromvisitid($visitid);
            $visitdate = getvisitdatefromvisitid($visitid);
            echo "<tr><td>$count</td><td>$drugname</td><td>$patientname</td><td>$hospid</td><td>$visitdate</td><td>$qty</td><td>$left</td></tr>";
            $count++;
        }
    }
}
/*
  if ($action === "pulldrugsusageturnover") {
  //drugname: drugname, datefrom: datefrom, dateto: dateto
  $drugname = purifyentry("drugname");
  $datefrom = purifyentry("datefrom") . " 00:00:00";
  $dateto = purifyentry("dateto") . " 00:00:00";

  if ($drugname === "All") {
  $a = "select * from pharmacy_drugmovement where movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
  //echo $a;
  $qk = mysqli_query($w, $a);
  if (mysqli_num_rows($qk) < 1) {
  echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
  return;
  }
  $count = 1;
  while ($h = mysqli_fetch_array($qk)) {
  $drugid = $h['drugid'];
  $visitid = $h['visitid'];
  $qty = $h['qtymoved'];
  $left = $h['qtyleft'];
  $drugname = getdrugname($drugid);
  $patientname = getnamefromvisitid($visitid);
  $hospid = gethospitalidfromvisitid($visitid);
  $visitdate = getvisitdatefromvisitid($visitid);
  echo "<tr><td>$count</td><td>$drugname</td><td>$patientname</td><td>$hospid</td><td>$visitdate</td><td>$qty</td><td>$left</td></tr>";
  $count++;
  }
  } else {
  $a = "select * from pharmacy_drugmovement where drugid='$drugname' and movementtype='dispense' and dateadded between '$datefrom' and '$dateto'";
  //echo $a;
  $qk = mysqli_query($w, $a);
  if (mysqli_num_rows($qk) < 1) {
  echo "<tr><td colspan='7' style='text-align:center'>No record found</td></tr>";
  return;
  }
  $count = 1;
  while ($h = mysqli_fetch_array($qk)) {
  $drugid = $h['drugid'];
  $visitid = $h['visitid'];
  $qty = $h['qtymoved'];
  $left = $h['qtyleft'];
  $drugname = getdrugname($drugid);
  $patientname = getnamefromvisitid($visitid);
  $hospid = gethospitalidfromvisitid($visitid);
  $visitdate = getvisitdatefromvisitid($visitid);
  echo "<tr><td>$count</td><td>$drugname</td><td>$patientname</td><td>$hospid</td><td>$visitdate</td><td>$qty</td><td>$left</td></tr>";
  $count++;
  }
  }
  }
 */
if ($action === "savedrug") {
    //action: action, category: category, brandname: brandname, genname: genname, privateprice: privateprice, corpprice: corpprice, stockcount: stockcount, reorderlevel: reorderlevel
    $category = purifyentry("category");
    $brandname = purifyentry("brandname");
    $genericname = purifyentry("genname");
    $privprice = purifyentry("privateprice");
    $corpprice = purifyentry("corpprice");
    $stockcount = purifyentry("stockcount");
    $reorderlevel = purifyentry("reorderlevel");

    $g = "insert into pharmacy_drugs (brandname, genericname, drugcategoryid, stockcount, reorderlevel, private, corporate) values ('$brandname','$genericname', '$category', '$stockcount','$reorderlevel','$privprice','$corpprice')";
    echo $g;
    $t = mysqli_query($w, $g);
    if ($t) {
        echo "Saved";
    } else {
        echo "Not saved";
    }
}

if ($action === "pulldrugs") {
    $v = "select * from pharmacy_drugs order by brandname asc";
    $q = mysqli_query($w, $v);
    $count = 1;
    while ($d = mysqli_fetch_array($q)) {
        $id = $d['pharma_drugsid'];
        $drugname = $d['genericname'];
        $stockcount = $d['stockcount'];
        $reorderlevel = $d['reorderlevel'];
        $private = $d['private'];
        $corporate = $d['corporate'];
        echo "<tr><td>$count</td><td>$drugname</td><td>$stockcount</td><td>$reorderlevel</td><td>&#8358; " . $private . "</td><td>&#8358; " . $corporate . "</td><td style='text-align:center'><span style='font-size:11px'>Delete</span> - <span style='font-size:11px'>Update</span></td></tr>";
        $count++;
    }
}

//drugsincat

if ($action === "drugsincat") {
    $catid = purifyentry("catid");
    $v = "select * from pharmacy_drugs where drugcategoryid='$catid' order by brandname asc";
    $q = mysqli_query($w, $v);
    $count = 1;
    while ($d = mysqli_fetch_array($q)) {
        $id = $d['pharma_drugsid'];
        $drugname = $d['genericname'];
        echo "<div  class=\"zs\" onclick='selectdrug($id)'>$count ). $drugname</div>";
        $count++;
    }
}

if ($action === "pullprescribeddrugs") {
    //drugid:drugid,
    $drugid = purifyentry("drugid");
    $r = "select * from pharmacy_drugs where pharma_drugsid = '$drugid'";
    $qv = mysqli_query($w, $r);
    $sfd = mysqli_fetch_array($qv);

    $brandname = $sfd['brandname'];
    $genericname = $sfd['genericname'];
    $stockcount = $sfd['stockcount'];

    echo "<div style='font-weight:500; font-size:25px'>$genericname</div><div><span style='font-size:25px' id='drgqtylft'>$stockcount</span><span style='font-size:12px'> left</span><span id='drgidi' style='display:none'>$drugid</span></div>";
    //Get price for 
}

//makedrugrequest
if ($action === "makedrugrequest") {
    //usage:usage, drugid:drugid, drugcount:rqdrugs
    $drugid = purifyentry("drugid");
    $usage = purifyentry("usage");
    $totalrqst = purifyentry("drugcount");
    $visitid = purifyentry("visitid");

    //visitid: visitid, usage: usage, drugid: drugid, drugcount: rqdrugs

    $t = "insert into consultation_prescription (visitid, drugid, qtyrequested, dosage) values ('$visitid','$drugid','$totalrqst','$usage')";
    $sg = mysqli_query($w, $t);
    if ($sg) {
        echo "Added";
    } else {
        $gc = "update consultation_prescription set qtyrequested='$totalrqst', dosage ='$usage' where visitid='$visitid' and drugid='$drugid'";
        $mv = mysqli_query($w, $gc);
        if ($mv) {
            echo "Medication updated made";
        } else {
            echo "Medication updated not made";
        }
    }
    //Get price for 
}

if ($action === "getallprescribedph") {
    $visitid = purifyentry("visitid");
    $dh = "select * from consultation_prescription where visitid='$visitid'";
    $ah = mysqli_query($w, $dh);
    $count = 1;
    if (mysqli_num_rows($ah) < 1) {
        echo "<tr><td colspan='4' style='text-align:center; font-size:12px; color:red'>No prescribed medication</td></tr>";
    }
    while ($sh = mysqli_fetch_array($ah)) {
        $drugid = $sh['drugid'];
        $qtyrequested = $sh['qtyrequested'];
        $dosage = $sh['dosage'];
        //Get drug name.
        $gb = mysqli_query($w, "select brandname, genericname from pharmacy_drugs where pharma_drugsid='$drugid'");
        $hs = mysqli_fetch_array($gb);
        $drugname = $hs['genericname'];
        echo "<tr><td>$count</td><td>$drugname</td><td>$dosage</td><td>$qtyrequested</td><td><span class='reset' style='font-size:10px; cursor:pointer; border-radius:4px' onclick='dispensedrug(\"$prescriptionid\",\"rep$count\")'>dispense</span></td></tr>";
        $count++;
    }
}

if ($action === "getallprescribed") {
    $visitid = purifyentry("visitid");
    $dh = "select * from consultation_prescription where visitid='$visitid'";
    $ah = mysqli_query($w, $dh);
    $count = 1;
    if (mysqli_num_rows($ah) < 1) {
        echo "<tr><td colspan='4' style='text-align:center; font-size:12px; color:red'>No prescribed medication</td></tr>";
    }
    while ($sh = mysqli_fetch_array($ah)) {
        $drugid = $sh['drugid'];
        $qtyrequested = $sh['qtyrequested'];
        $dosage = $sh['dosage'];
        //Get drug name.
        $gb = mysqli_query($w, "select brandname, genericname from pharmacy_drugs where pharma_drugsid='$drugid'");
        $hs = mysqli_fetch_array($gb);
        $drugname = $hs['genericname'];
        echo "<tr><td>$count</td><td>$drugname</td><td>$dosage</td><td>$qtyrequested</td><td><span class='reset' style='font-size:10px; cursor:pointer; border-radius:4px' onclick='removeprescription(\"$drugid\")'>remove</span></td></tr>";
        $count++;
    }
}

if ($action === "sendtopharmacyqueue") {
    $visitid = purifyentry("visitid");
    $timenow = timenow();
    $datenow = datenow();

    //Check that there is a working diagnosis, and prescription before sending forth
    $sq = "select * from consultation_diagnosis where visitid ='$visitid'";
    $gq = mysqli_query($w, $sq);

    if (mysqli_fetch_array($gq) < 1) {
        echo "Make diagnosis first.";
        return;
    }

    //Send to pharmacy
    $g = "insert into pharmacy_queue (visitid, checkintime, checkindate) values ('$visitid','$timenow','$datenow')";
    //echo $g;
    $sh = mysqli_query($w, $g);

    if ($sh) {
        echo "Sent to pharmacy";
    } else {
        echo "Did not send patient at this time.";
    }
}
//endconsultation
if ($action === "endconsultation") {
    $visitid = purifyentry("visitid");
    $timenow = timenow();
    $datenow = datenow();
    /*
      //Check if client has already checked out.
      $hd = "select checkouttime, checkoutdate from consultation_queue where visitid ='$visitid'";
      $sdf = mysqli_query($w, $hd);
      $sgx = mysqli_fetch_array($sdf);
      $checkouttime = $sgx['checkouttime'];
      $checkoutdate = $sgx['checkoutdate'];
     */

    $usb = "update consultation_queue set checkouttime='$timenow', checkoutdate='$datenow' where visitid='$visitid'";
    $is = mysqli_query($w, $usb);
    if ($is) {
        echo "Patient checked out";
    } else {
        echo "Patient not checked out";
    }
    /*
      if ($checkouttime === "00:00:00") {
      //Check that there is a working diagnosis, and prescription before sending forth

      } else {
      //Check that there is a working diagnosis, and prescription before sending forth
      $usb = "update consultation_queue set checkouttime='$timenow' and checkoutdate='$datenow' where visitid='$visitid'";
      $is = mysqli_query($w, $usb);
      if ($is) {
      echo "Patient checked out";
      } else {
      echo "Patient not checked out";
      }
      }
     */
}

if ($action === "pullprescription") {
    $visitid = purifyentry("visitid");
    $patname = getnamefromvisitid($visitid);
    $hsa = "select consultation_prescription.qtyrequested, consultation_prescription.consult_prescribeid, consultation_prescription.dosage, pharmacy_drugs.brandname, pharmacy_drugs.stockcount, pharmacy_drugs.reorderlevel, pharmacy_drugs.genericname, pharmacy_drugs.drugcategoryid from consultation_prescription inner join pharmacy_drugs on consultation_prescription.drugid = pharmacy_drugs.pharma_drugsid where consultation_prescription.visitid ='$visitid'";
    $ga = mysqli_query($w, $hsa);
    $count = 1;
    $tab = "<div style='font-size:25px'>Prescribed drugs<br><span style='font-size:12px'>Prescribed by - Dr. (Mrs.) Olubowale</span></div><table class='table table-condensed table-striped table-bordered'><tr style='font-weight:600'><td></td><td>Drug name</td><td>Dosage</td><td colspan='5'>Quantity</td></tr>";
    $count = 1;
    $printversion = "";
    while ($vd = mysqli_fetch_array($ga)) {
        $prescriptionid = $vd['consult_prescribeid'];
        $drugname = $vd['genericname'];
        $qty = $vd['qtyrequested'];
        $dosage = $vd['dosage'];
        $stockcount = $vd['stockcount'];
        $reorderlevel = $vd['reorderlevel'];
        if ($stockcount < $reorderlevel) {
            $level = "<span style='color:red; font-size:11px'>Running low<span>";
        } else {
            $level = "<span style='color:green; font-size:11px'>Ok<span>";
        }
        $tab .= "<tr><td id='id$count'>$count</td><td id='drgnm$count'>$drugname</td><td>$dosage</td><td>$qty</td><td style='width:30px'><span class='reset ptr' style='padding:2px; border-radius:4px; font-size:11px' title='dispense drug' onclick='dispensedrug(\"$prescriptionid\",\"rep$count\")'><i class='fa fa-check' style='color:#fff'></i></span></td><td style='width:30px'><span class='login ptr' style='padding:4px; border-radius:4px; font-size:10px' title='Cannot dispense this drug/quantity'><i class='fa fa-refresh' style='color:#fff'></i></span></td><td id='rep$count' style='font-size:11px; font-color:green'></td><td id='irep$count' style='color:red'>$level</td></tr>";
        $printversion .= "<tr><td>$count</td><td>$drugname</td><td>$dosage</td></tr>";
        $count++;
    }

    $tab .="</table><div style='text-align:center' id='prescrptnmsg'><span class='btn reset' onclick='printDiv(\"printdrug\")'><i class='fa fa-print'></i> Print prescription</span> <span class='btn reset' onclick='enddispensary(\"$visitid\")'>End encounter</span></div>"
            . "<div id='printdrug' style='display:none'>"
            . "<img src='images/mtsinailogo.png' width='150px' style='margin-bottom:10px'>"
            . "<div style='font-size:11px; font-weight:600px; margin-top:5px; margin-bottom:10px;'>Dear $patname, <br><br> Your prescription from Mt. Sinai Hospitals, Mushin</div>"
            . "<table class='table-condensed table-striped table-bordered' style='font-size:11px; width:300px'>"
            . "<tr style='font-weight:600'><td></td><td>Drug</td><td>Dose</td></tr>"
            . "$printversion"
            . "</table>"
            . "<div style='font-size:11px; font-weight:600px; margin-top:10px;'>Have a nice day<br><span style='font-weight:10px'>Print Date :" . date('d-m-Y') . "</span></div>"
            . "</div>";
    echo $tab;
}

if ($action === "dispensedrug") {
    $pdrugid = purifyentry("drugid");
    $visitid = purifyentry("visitid");
    //pull information needed
    $q = mysqli_query($w, "select * from consultation_prescription where consult_prescribeid='$pdrugid'");
    $d = mysqli_fetch_array($q);
    $qtyrq = $d['qtyrequested'];
    $drugid = $d['drugid'];
    $qtydispensed = $d['qtydispensed'];
    if ($qtydispensed > 0) {
        echo "Drug already dispensed";
    } else {
        //pull drug dets
        $vg = "select stockcount from pharmacy_drugs where pharma_drugsid='$drugid'";
        $ha = mysqli_query($w, $vg);
        $aq = mysqli_fetch_array($ha);
        $stCount = $aq['stockcount'];

        if ($qtyrq <= $stCount) {
            //Do the maths.
            $qtyleft = $stCount - $qtyrq;
            //Log record of removal.
            $ga = "update consultation_prescription set qtydispensed='$qtyrq', qtyleft='$qtyleft' where consult_prescribeid='$pdrugid'";
            //echo $ga;
            $at = mysqli_query($w, $ga);
            if ($at) {
                echo "Dispensed..";
                //Log in to drugsmovement register
                $movementtype = "Dispense";
                $tq = mysqli_query($w, "insert into pharmacy_drugmovement (drugid, visitid, movementtype, qtymoved, qtyleft) values ('$drugid','$visitid','$movementtype','$qtyrq','$qtyleft')");
                //update drug stock count
                $ja = "update pharmacy_drugs set stockcount = '$qtyleft' where pharma_drugsid='$drugid'";
                $ahq = mysqli_query($w, $ja);
                if ($ahq) {
                    echo " .. (Qty lft - $qtyleft)";
                } else {
                    echo " .. Not updated stock count.";
                }
            }
        } else {
            echo "Cannot dispense";
        }
    }
}

if ($action === "enddispensary") {
    $visitid = purifyentry("visitid");
    $timenow = timenow();
    $datenow = datenow();

    $ua = "update pharmacy_queue set checkoutdate='$datenow', checkouttime='$timenow' where visitid='$visitid'";
    $ha = mysqli_query($w, $ua);
    if ($ha) {
        echo "Thanks for checking";
    } else {
        echo "Check out not successful";
    }
}