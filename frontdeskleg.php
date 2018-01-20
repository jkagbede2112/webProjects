<!DOCTYPE html>
<?php
include "partials/connect.php";
include "sendmail.php";
include "confirm_indexing.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="javascript/tervescript.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="css/terveCure.css" rel="stylesheet" type="text/css"/>
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/chart.js" type="text/javascript"></script>
        <style>

        </style>
    </head>
    <body>
        <div id="notifier" style="position:absolute; display:none; width:100%; position:fixed; z-index:500;">
            <center>
                <span id="popUpcu">
                    <div id="messagehere" style="margin-bottom:10px; margin-top:8px">Do we continue in sin and have grace abound?</div>
                    <span id="buttonshere"></span>
                </span>
            </center>
        </div>
        <div class="col-md-1 menuitems">
            <img src="images/nurse.png" style="width:160px; z-index:111; position:absolute; bottom:0px; left:-25px">
            <div style="background-color:#8F4A94; height:20px">

            </div>
            <div style="min-height:40px; background-color:#9A9A9A; padding:15px; margin-bottom:10px">
                <img src="images/tervecure.png" width="100%" class='hidden-sm hidden-xs'> 
            </div>
            <ul class="nav-sidebar" style='margin-top:10px;font-family:raleway; padding-left:0px; padding-top:30px; list-style:none'>
                <li class="okk okks" id='dashboardm' onclick="changemenu('#dashboardm', '#dashboard')">
                    <i class="fa fa-th" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Dashboard</span>
                </li>
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-wpforms" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Registration</span>
                </li>
                <li class="okk" id='checkinm' onclick="changemenu('#checkinm', '#checkin')">
                    <i class="fa fa-clock-o" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Check-In</span>
                </li>
                <li class="okk" id='settingm' onclick="changemenu('#settingm', '#setting')">
                    <i class="fa fa-money" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Billing</span>
                </li>
                <!--
                <li class="okk" id='settingm' onclick="changemenu('#settingm', '#setting')">
                    <i class="fa fa-cogs" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Setting</span>
                </li>-->
                <script>
                    function changemenu(a, b) {
                        $("#dashboard").hide();
                        $("#registration").hide();
                        $("#checkin").hide();
                        $("#setting").hide();
                        $(".okk").removeClass("okks");
                        $(a).addClass("okks");
                        $(b).show();
                    }

                    function _v(e) {
                        return document.getElementById(e);
                    }
                </script>
            </ul>
        </div>
        <div class="col-md-11" style="padding:0px">
            <div class="col-md-12" style="height:5px; background-color:#8F4A94; border-bottom-width:medium; border-bottom-style:solid; border-bottom-color:#E1E1E1"></div>
            <!-- Dashboard -->
            <?php
            include 'partials/journeymonitor.php';
            ?>
            <div id="dashboard" style="display:nones">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Dashboard
                        </span>
                    </div>
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <span style="font-weight:600; color:#8F4A94">Wait Time Report today</span>
                        <table style="margin-top:10px; width:100%">
                            <tr>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <?php //getusageday($datenow); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                        <div style="font-weight:600; color:#8F4A94">Check-In today</div>
                        <table style="margin-top:10px; width:100%; border-radius:4px;">
                            <tr>
                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-clock-o" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        <?php
                                        $tday = datenow();
                                        $rw = "select * from checkinlog where dateadded like '%$tday%'";
                                        $qq = mysqli_query($w, $rw);
                                        $ct = mysqli_num_rows($qq);
                                        echo $ct;
                                        ?>
                                    </span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <div style="text-align: right">
                                        <i class="fa fa-refresh ptr" onclick="waittimechecks()"></i>
                                    </div>
                                    <table class="table-bordered dashsections">
                                        <tr><td></td><td>Name</td><td>In</td><td>Out</td><td>Time(mins)</td></tr>
                                        <tbody id="dashwaittime">
                                            <?php
                                            $count = 1;
                                            while ($zd = mysqli_fetch_array($qq)) {
                                                $hospitalid = $zd['hospitalid'];
                                                $checkintime = $zd['checkintime'];
                                                $checkout = $zd['checkouttime'];

                                                //Check paymentcategory
                                                $wer = "select patienttype from patient_register where hospitalid='$hospitalid'";
                                                $aq = mysqli_query($w, $wer);
                                                $bq = mysqli_fetch_array($aq);
                                                $ptype = $bq['patienttype'];

                                                if ($checkout === "00:00:00") {
                                                    $checkout = "-";
                                                    $timenownowhr = date("H") - 1;
                                                    $timenownowminsec = date("i:s");
                                                    $timenownow = $timenownowhr . ":" . $timenownowminsec;
                                                    $date1 = strtotime($timenownow);
                                                    $date2 = strtotime($checkintime);
                                                    $timediff = $date1 - $date2;
                                                    $waittime = ($timediff / (60) - 1) . " m";
                                                } else {
                                                    $date1 = strtotime($checkout);
                                                    $date2 = strtotime($checkintime);
                                                    $waittime = ($date1 - $date2) / 60;
                                                    //$timediff = $date1 - $date2;
                                                    //$waittime = floor($timediff / (60)) . " mins";
                                                }
                                                $checkintime = substr($checkintime, 0, 5);
                                                $checkout = substr($checkout, 0, 5);
                                                $gt = colorman($ptype);
                                                if ($waittime > 59 && $waittime < 120) {
                                                    //echo $waittime / 60;
                                                    $waittime = floor($waittime / 60) . "h " . $waittime % 60 . "m";
                                                    echo "<tr><td>$count</td><td>$hospitalid</td><td>$checkintime</td><td>$checkout</td><td style='font-size:11px'>$gt $waittime </td></tr>";
                                                }
                                                if ($waittime >= 120) {
                                                    //echo $waittime / 60;
                                                    $waittime = floor($waittime / 60) . "h " . $waittime % 60 . "m";
                                                    echo "<tr class='hwt'><td>$count</td><td>$hospitalid</td><td>$checkintime</td><td>$checkout</td><td style='font-size:11px'>$gt $waittime </td></tr>";
                                                }
                                                ++$count;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <div style="font-weight:600; color:#8F4A94">Clients</div>
                        <table style="margin-top:10px; width:100%">
                            <tr>
                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-stethoscope" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        <?php
                                        $gtv = "select * from billingcategory order by name asc";
                                        $ps = mysqli_query($w, $gtv);
                                        $qwq = mysqli_num_rows($ps);
                                        //echo $qwq;

                                        $jdf = "select * from patient_register";
                                        $hq = mysqli_query($w, $jdf);
                                        $jqs = mysqli_num_rows($hq);
                                        echo $jqs;
                                        ?>
                                    </span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <?php
                                        while ($laf = mysqli_fetch_array($ps)) {
                                            $categoryid = $laf['categoryid'];
                                            $categoryname = $laf['name'];
                                            //Get number per payment category
                                            $tm = getrowcount("patient_register", "patienttype", "$categoryid");

                                            echo "<tr><td width='100px'>$categoryname</td><td>$tm</td><td></td></tr>";
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <span style="font-weight:600; color:#8F4A94">Registrations today</span>
                        <table style="margin-top:10px; width:100%">
                            <tr>

                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-list-alt" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        <?php
                                        $dated = datenow();
                                        $ha = "select * from patient_register where dateadded like '%$dated%'";
                                        $gq = mysqli_query($w, $ha);
                                        echo mysqli_num_rows($gq);
                                        ?>
                                        <i class="fa fa-comments" style="font-size:12px; color:#8F4A94"></i></span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <?php
                                        $counter = 1;
                                        while ($sdc = mysqli_fetch_array($gq)) {
                                            $name = strtoupper($sdc['lastname']) . " " . $sdc['firstname'];
                                            $hospid = $sdc['hospitalid'];
                                            echo "<tr><td>$counter</td><td>$name</td><td>$hospid</td></tr>";
                                            $counter++;
                                        }
                                        ?>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-8" style="height:100%; padding:5px; overflow-y:auto" id="filler">

                    <div class="col-md-12" style="background-color:rgba(255,255,255,0.2); text-align:center; padding:10px; font-size:25px; min-height:40px; margin-bottom:5px">
                        <span style="font-size:12px; font-weight:600; color:#8F4A94">
                            AWTT - <img src="images/reading.gif" width="5px">
                        </span>
                        <span style="display:inline-block" id="wttoday">
                            15mins <i class="fa fa-thumbs-o-up" style="color:#cc6600"></i>
                        </span>
                    </div>
                    <div class="col-md-12">
                        <canvas id="myChart" width="350" height="150"></canvas>

                    </div>
                    <div class="col-md-12">
                        <?php
                        getusageday($datenow);
                        ?>
                    </div>
                    <!--
                                        <div class="col-md-12" style="background-color:rgba(255,255,255,0.2); padding:10px; text-align:center; height:40px; margin-bottom:0px">
                                            Patient count
                    <?php
                    $wq = "select * from patient_register";
                    $wqw = mysqli_query($w, $wq);
                    $re = mysqli_num_rows($wqw);
                    echo $re;
                    ?>
                                        </div>
                                        
                                        <div class="col-md-12" style="padding-bottom:50px; margin-top:5px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                                            <table class="table table-striped table-bordered" style="width:100%; font-family:verdana">
                                                <tbody id="namespacehere">
                                                    <tr style="font-weight:500; background-color:rgba(0,0,0,0.2); color:#fff; font-weight:500"><td></td><td>Name</td><td>Hosp ID</td><td>Gender</td><td>DOB</td><td>Category</td><td>Marital S.</td><td>Phone</td><td>D/A</td></tr>
                    <?php
                    $za = "select * from patient_register order by dateadded desc LIMIT 5 ";
                    $xz = mysqli_query($w, $za);
                    $count = 1;
                    if (mysqli_num_rows($xz) < 1) {
                        echo "<tr><td colspan='7' style='text-align:center'>No record to show</td></tr>";
                    } else {
                        while ($az = mysqli_fetch_array($xz)) {
                            $name = strtoupper($az['lastname']) . " " . $az['firstname'];
                            $hospitalid = strtoupper($az['hospitalid']);
                            $gender = $az['gender'];
                            $dob = $az['dateofbirth'];
                            $ms = $az['maritalstatus'];
                            $patienttype = $az['patienttype'];
                            $phonenumber = $az['phonenumber'];
                            $da = $az['dateadded'];
                            //Get patient type name
                            $pattype = getpatienttype($patienttype);
                            echo "<tr style='font-size:11px;'><td height='25'>$count</td><td>$name</td><td>$hospitalid</td><td>$gender</td><td>$dob</td><td>$pattype</td><td style='font-size:9px'>$ms</td><td>$phonenumber</td><td style='font-size:9px'>$da</td></tr>";
                            $count++;
                        }
                    }

                    function getpatienttype($a) {
                        global $w;
                        $qd = "select name from billingcategory where categoryid='$a'";
                        $mt = mysqli_query($w, $qd);
                        $oq = mysqli_fetch_array($mt);
                        $name = $oq['name'];
                        return $name;
                    }
                    ?>
                                                </tbody>
                                            </table>
                                        </div>-->
                </div>
            </div>
            <div id="registration" style="display:none">
                <div class="col-md-4" style="padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Registration
                        </span>
                    </div>
                    <div style="text-align:center; margin-top:10px;">
                        <span class="sel selected" id="dmg" onclick="clientreg('#demographic', '#dmg')">Registration</span>
                        <span class="sel" id="npk" onclick="clientreg('#nok', '#npk')">Next Of Kin</span>
                        <span class="sel" id="pplan" onclick="clientreg('#payplan', '#pplan')">Payment plan</span>
                    </div>
                    <div class="signup" id="demographic">
                        <form>
                            <label class="imp">
                                Hospital ID
                            </label>
                            <input type="text" class="form-control" id="clhospitalid">
                            <label class="imp">
                                First Name
                            </label>
                            <input type="text" class="form-control" id="clfirstname">
                            <label class="imp">
                                Last Name
                            </label>
                            <input type="text" class="form-control" id="cllastname">
                            <label class="imp">
                                Date of birth
                            </label>
                            <input type="date" class="form-control" id="cldateofbirth">
                            <label class="imp">
                                Marital Status
                            </label>
                            <select class="form-control"  id="clmaritalstatus">
                                <option>Single</option>
                                <option>Married</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                            <label class="imp">
                                Gender
                            </label>
                            <select class="form-control"  id="clgender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <label class="imp">
                                Phone Number
                            </label>
                            <input type="number" class="form-control" id="clphonenumber">
                            <label>
                                Email address
                            </label>
                            <input type="email" class="form-control" id="clemailaddress">
                            <label class="imp">
                                Occupation
                            </label>
                            <input type="email" class="form-control" id="cloccupation">
                            <input type="reset" class="btn btn-primary" value="Reset demographic" style="margin-top:5px">
                        </form>
                    </div>  
                    <div class="signup" id="nok" style="display:none">
                        <form>
                            <label class="imp">
                                Name
                            </label>
                            <input type="text" class="form-control" id="clnokname">
                            <label class="imp">
                                Address
                            </label>
                            <input type="text" class="form-control" id="clnokaddress">
                            <label class="imp">
                                Phone number
                            </label>
                            <input type="text" class="form-control" id="clnokphone">
                            <label class="imp">
                                Relationship
                            </label>
                            <select class="form-control" id="clnokrelationship">
                                <option>Brother</option>
                                <option>Sister</option>
                                <option>Father</option>
                                <option>Mother</option>
                                <option>Uncle</option>
                                <option>Aunty</option>
                                <option>Spouse</option>
                                <option>Son</option>
                                <option>Daughter</option>
                            </select>
                            <input type="reset" class="btn btn-primary" value="Reset NOK" style="margin-top:5px">
                        </form>
                    </div>
                    <div class="signup" id="payplan" style="display:none">
                        <form>
                            <label class="imp">
                                Client Category
                            </label>
                            <select class="form-control" id="clpaycategory" onchange="pullpayname(this.value)">
                                <?php
                                $we = "select * from billingcategory order by name asc";
                                $cz = mysqli_query($w, $we);
                                echo "<option>--Select--</option>";
                                while ($vx = mysqli_fetch_array($cz)) {
                                    $name = $vx['name'];
                                    $categoryid = $vx['categoryid'];
                                    echo "<option value='$categoryid'>$name</option>";
                                }
                                ?>
                            </select>
                            <label class="imp">
                                Client name
                            </label>
                            <select class="form-control" id="clpayname" onchange="pullpayplan(this.value)">
                                <option>--Select--</option>
                            </select>
                            <label class="imp">
                                Plan
                            </label>
                            <select class="form-control" id="clpayplan">
                                <option>--Select--</option>
                            </select>
                            <label class="imp">
                                Registration type
                            </label>
                            <select class="form-control" id="clregtype">
                                <?php
                                $ga = "select * from billinggroups where name like '%registration%' order by name asc";
                                $qg = mysqli_query($w, $ga);
                                while ($qa = mysqli_fetch_array($qg)) {
                                    $regname = $qa['name'];
                                    $regnameid = $qa['billingclientid'];
                                    echo "<option value='$regnameid'>$regname</option>";
                                }
                                ?>
                            </select>
                            <div style="text-align:center; font-size:16px; margin-top:20px; margin-bottom:10px">
                                <input class="btn login" type="button" value="Save client" onclick="addc()">
                                <input class="btn reset" type="button" value="Reset">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8" style="padding:0px;">
                    <div style="padding-bottom:50px; margin-top:5px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <tbody id="namespacehere">
                                <tr style="font-weight:500; background-color:rgba(0,0,0,0.2); color:#fff; font-weight:600; font-size:11px">
                                    <td></td><td>Name</td><td>Hospital ID</td><td>Gender</td><td>DOB</td><td>Age</td><td>Marital Status</td><td>Phone number</td><td>D/A</td>
                                </tr>
                                <?php
                                $za = "select * from patient_register LIMIT 50";
                                $xz = mysqli_query($w, $za);
                                $count = 1;
                                if (mysqli_num_rows($xz) < 1) {
                                    echo "<tr><td colspan='7' style='text-align:center'>No record to show</td></tr>";
                                } else {
                                    while ($az = mysqli_fetch_array($xz)) {
                                        $name = strtoupper($az['lastname']) . " " . $az['firstname'];
                                        $hospitalid = strtoupper($az['hospitalid']);
                                        $gender = $az['gender'];
                                        $dob = $az['dateofbirth'];
                                        $age = computeage($dob);
                                        //$age = "24";
                                        $ms = $az['maritalstatus'];
                                        $phonenumber = $az['phonenumber'];
                                        $da = $az['dateadded'];
                                        echo "<tr style='font-size:13px;'><td height='25'>$count</td><td>$name</td><td>$hospitalid</td><td>$gender</td><td>$dob</td><td>$age</td><td>$ms</td><td>$phonenumber</td><td>$da</td></tr>";
                                        $count++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="checkin" style="display:none">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Check-In
                        </span>
                    </div>
                    <div style="padding-bottom:8px; text-align:center; margin-top:10px">
                        <span class="vitalsminimenu vitalsminimenusel" onclick="triagemenu('#vsf', '#vitalsignsform')" id="vsf" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">New Check-In</span>
                        <span class="vitalsminimenu" onclick="triagemenu('#nr', '#newsreport')" id="nr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Appointment Check-In</span>
                    </div>
                    <div id="vitalsignsform">
                        <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                            <div style="font-weight:600; color:#8F4A94">Clients</div>
                            <table style="margin-top:10px; width:100%">
                                <tr>
                                    <td style="background-color:#BFC9E3; padding:10px">
                                        <table class="table-bordered dashsections">
                                            <tr><td>Search Criteria</td></tr>
                                            <tr>
                                                <td>
                                                    <select class="form-control" style="width:100%" id="searchfield">
                                                        <option value="hospitalid">Hospital ID</option>
                                                        <option value="firstname">First name</option>
                                                        <option value="lastname">Last name</option>
                                                        <option value="phonenumber">Phone number</option>
                                                        <option value="emailaddress">Email address</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr><td>Search Value</td></tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" id="searchvalue">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center; padding:10px">
                                                    <input type="button" value="Search" class="btn login" onclick="searchpatient(searchfield.value, searchvalue.value)">
                                                    <input type="reset" value="Reset" class="btn reset">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                            <table class="table table-bordered table-striped" style="margin-top:10px; font-size:12px; width:100%">
                                <thead>
                                    <tr style="background-color: #919191; color:#fff">
                                        <td>Patient Name</td><td>Hospital ID</td><td>Gender</td><td>Phone</td>
                                    </tr>
                                </thead>
                                <tbody id="searchResult">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="newsreport" style="display:none">
                        <div style="margin-top:0px; padding:5px; position:relative; background-color:#D4D4D4">
                            <i class="fa fa-address-book-o" style="font-size:44px; color:#E1E1E1"></i>
                            <span style="font-size:20px; margin-left:10px">Appointments</span>
                            <table class="table table-bordered table-striped" style="padding:2px;margin-top:10px; font-size:12px; width:100%">
                                <tr style="background-color: #919191; color:#E1E1E1">
                                    <td>Patient Name</td><td>Hospital ID</td><td>Appointment date</td><td>Physician</td>
                                </tr>
                                <tr class="ptr thov">
                                    <td>AGBEDE Kayode</td><td>234/12A</td><td>1:25pm</td><td>3:12pm</td>
                                </tr>
                            </table>
                            <script>

                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: [<?php pulldaysfromtoday(); ?>],
                                        datasets: [{
                                                label: 'Average Wait Time',
                                                data: [<?php pullwtfromtoday(); ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true
                                                    }
                                                }]
                                        }
                                    }
                                });

                                function clientreg(a, b) {
                                    $("#demographic").hide();
                                    $("#nok").hide();
                                    $("#payplan").hide();
                                    $(a).show();
                                    $(".sel").removeClass("selected");
                                    $(b).addClass("selected");
                                }

                                function triagemenu(a, b) {
                                    $("#vitalsignsform").hide();
                                    $("#newsreport").hide();
                                    $(b).show();
                                    $(".vitalsminimenu").removeClass("vitalsminimenusel");
                                    $(a).addClass("vitalsminimenusel");
                                }
                                
                                setInterval(function () {
                                    getcurrentTime();
                                    waittimechecks();
                                    pullaveragewaittime();
                                }, 1000);

                                function requestdelete(a) {
                                    alert(a);
                                }
                                
                                function waittimechecks() {
                                    var action = "dashboardwaittime";
                                    $.post("partials/wttracker.php", {action: action}).done(function (data) {
                                        _v("dashwaittime").innerHTML = data;
                                    });
                                }

                                setInterval(function () {
                                    waittimecheck();
                                }, 60000);

                                function getcurrentTime() {
                                    //alert(Date.now());
                                    todaysDate = new Date;
                                    thisHour = todaysDate.getHours();
                                    thisMinute = todaysDate.getMinutes();
                                    thisSecond = todaysDate.getSeconds();
                                    if (thisSecond < 10) {
                                        thisSecond = "0" + thisSecond;
                                    }

                                    if (thisMinute < 10) {
                                        thisMinute = "0" + thisMinute;
                                    }

                                    if (thisHour < 10) {
                                        thisHour = "0" + thisHour;
                                    }

                                    document.getElementById("livetimehere").innerHTML = thisHour + ":" + thisMinute + ":" + thisSecond;
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 briefstyle" id="brief" style="height:100% !important">
                    <div style="padding:5px; background-color:#D4D4D4"  id="checkindets">

                    </div>

                    <div style="margin-top:5px; padding:5px; position:relative; background-color:#BCBCBC">
                        <div style="padding:10px; text-align:center;">
                            <span id="livetimehere">

                            </span>
                        </div>
                        <div style='text-align:right'><span style='cursor:pointer; font-size:12px' onclick='waittimecheck()'>Refresh wait time table</span></div>
                        <table class="table table-bordered table-striped" style="padding:2px;margin-top:10px; font-size:12px; width:100%">
                            <tr style="background-color: #919191; color:#fff">
                                <td></td><td>Patient Name</td><td>Hospital ID</td><td>VisitID</td><td>Check-In</td><td>Out</td><td>Wait Time</td><td></td><td>Check-out</td>
                            </tr>
                            <tbody id="waittimetable">

                            </tbody>
                        </table>
                        <script>
                            setInterval(function () {
                                getcurrentTime();
                            }, 1000);
                            function getcurrentTime() {
                                //alert(Date.now());
                                todaysDate = new Date;
                                thisHour = todaysDate.getHours();
                                thisMinute = todaysDate.getMinutes();
                                thisSecond = todaysDate.getSeconds();
                                if (thisSecond < 10) {
                                    thisSecond = "0" + thisSecond;
                                }

                                if (thisMinute < 10) {
                                    thisMinute = "0" + thisMinute;
                                }

                                if (thisHour < 10) {
                                    thisHour = "0" + thisHour;
                                }

                                document.getElementById("livetimehere").innerHTML = thisHour + ":" + thisMinute + ":" + thisSecond;
                            }
                        </script>
                    </div>
                </div>
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">

                </div>
            </div>
        </div>
        <div id="setting" style="display:none">
            <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                <div style="background-color:#BFC9E3; padding:10px">
                    <span class="partialsheader">
                        Billing
                    </span>
                </div>
                <div style='text-align:center; padding:5px'>
                    <span class='blg sel selected' onclick="billng('today')" id="blngtdy">Today</span> - 
                    <span class='blg sel' onclick="billng('legacy')" id="blnglgy">Legacy bill</span>
                </div>
                <script>
                    function billng(a) {
                        $(".blg").removeClass("selected");
                        $("#clientbillngtday").hide();
                        $("#clientbillnglgcy").hide();

                        if (a === "today") {
                            $("#clientbillngtday").show();
                            $("#blngtdy").addClass("selected");
                        }

                        if (a === "legacy") {
                            $("#clientbillnglgcy").show();
                            $("#blnglgy").addClass("selected");
                        }
                    }
                </script>
                <div id="clientbillngtday">
                    <table class="table table-bordered table-striped" style="margin-top:10px; font-size:12px; width:100%">
                        <thead>
                            <tr style="background-color: #919191; color:#fff">
                                <td></td><td>Patient Name</td><td>Hospital ID</td><td>Gender</td><td>Phone</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tod = datenow();
                            $q = "select checkinlog.hospitalid, checkinlog.visitid, checkinlog.checkintime, checkinlog.checkouttime,"
                                    . " patient_register.firstname, "
                                    . "patient_register.lastname, patient_register.gender, patient_register.phonenumber from checkinlog inner join patient_register on "
                                    . "checkinlog.hospitalid = patient_register.hospitalid where checkinlog.checkindate='$tod'";
                            $as = mysqli_query($w, $q);
                            $count = 1;
                            while ($xx = mysqli_fetch_array($as)) {
                                $patientname = strtoupper($xx['lastname']) . " " . $xx['firstname'];
                                $gender = $xx['gender'];
                                $hospitalid = $xx['hospitalid'];
                                $checkintime = $xx['checkintime'];
                                $visitid = $xx['visitid'];
                                $phonenumber = $xx['phonenumber'];
                                $checkout = $xx['checkouttime'];

                                $timenownow = timenow();
                                $date1 = strtotime($timenownow);
                                $date2 = strtotime($checkintime);
                                $timediff = $date1 - $date2;
                                $wtd = floor($timediff / (60));

                                $checkout = "-";
                                echo "<tr class='wt' onclick='pullextrabilldetails(\"$visitid\")' style='cursor:pointer'><td>$count</td><td>$patientname</td><td>$hospitalid</td><td>$gender</td><td>$phonenumber</td></tr>";

                                $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="clientbillnglgcy" style="display:none">
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <div style="font-weight:600; color:#8F4A94">Client billing</div>
                        <table style="margin-top:10px; width:100%">
                            <tr>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <tr><td>Search Criteria</td></tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" style="width:100%" id="searchbillfield">
                                                    <option value="hospitalid">Hospital ID</option>
                                                    <option value="firstname">First name</option>
                                                    <option value="lastname">Last name</option>
                                                    <option value="phonenumber">Phone number</option>
                                                    <option value="emailaddress">Email address</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Search Value</td></tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" id="searchbillvalue">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:center; padding:10px">
                                                <input type="button" value="Search" class="btn login" onclick="searchbillpatient(searchbillfield.value, searchbillvalue.value)">
                                                <input type="reset" value="Reset" class="btn reset">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <table class="table table-bordered table-striped" style="margin-top:10px; font-size:12px; width:100%">
                            <thead>
                                <tr style="background-color: #919191; color:#fff">
                                    <td>Patient Name</td><td>Hospital ID</td><td>Gender</td><td>Phone</td>
                                </tr>
                            </thead>
                            <tbody id="searchbillResult">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7 briefstyle" id="brief" style="height:100% !important">
                <div style="padding:5px; background-color:#D4D4D4"  id="checkbilldets">

                </div>
                <div style="margin-top:5px; padding:5px; position:relative; background-color:#BCBCBC">
                    <div style="padding:10px; text-align:center;">
                    </div>
                    <div style='text-align:right'><span style='cursor:pointer; font-size:12px'></span></div>
                    <div id="billingtable">
                        <table class="table table-bordered" style="padding:2px;margin-top:10px; font-size:12px; width:100%">
                            <thead>
                                <tr style="background-color: #919191; color:#fff">
                                    <td></td><td>Patient Name</td><td>Payment plan</td><td>Bill item</td><td>Quantity</td><td>Unit amount</td><td>Amount</td><td>Date</td><td></td>
                                </tr>
                            </thead>
                            <tbody style="height:200px; overflow-y:auto">
                                <?php
                                $date = datenow();
                                $qv = "select * from billinglog where paymentstatus='0' order by dateadded desc limit 10";
                                $hq = mysqli_query($w, $qv);
                                $count = 1;
                                while ($ha = mysqli_fetch_array($hq)) {
                                    $id = $ha['visitid'];
                                    $plan = $ha['clienttype'];
                                    $item = $ha['item'];
                                    $subitem = $ha['subitem'];
                                    $qty = $ha['quantity'];
                                    $unitamt = $ha['unitamount'];
                                    $amount = $ha['totalamount'];
                                    $paystat = $ha['paymentstatus'];
                                    $date = $ha['dateadded'];
                                    if ($paystat === "0") {
                                        echo "<tr><td>$count</td><td>$id</td><td>$plan</td><td>$item</td><td>$qty</td><td>$unitamt</td><td>$amount</td><td>$date</td><td><span style='padding:2px' class='btn reset'>Pay</span></td></tr>";
                                    } else {
                                        echo "<tr><td>$count</td><td>$id</td><td>$plan</td><td>$item</td><td>$qty</td><td>$unitamt</td><td>$amount</td><td>$date</td><td>Paid</td></tr>";
                                    }
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal lodges here -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modaltitle"></h4>
                    </div>
                    <div class="modal-body" id="modalbody" style="background-color: #BFC9E3; color:#000 !important; max-height:400px; overflow-y:scroll">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer" id="modalactionbutton">

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
