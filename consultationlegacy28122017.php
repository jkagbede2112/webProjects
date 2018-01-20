<!DOCTYPE html>
<?php
include 'partials/connect.php';
include "confirm_indexing.php";
include "sendmail.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/jquery-1.11.3.js" type="text/javascript"></script>
        <link href="css/terveCure.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/tervescript.js" type="text/javascript"></script>
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
                <img src="images/tervecure.png" width="100%"> 
            </div>
            <ul class="nav-sidebar" style='margin-top:10px;font-family:raleway; padding-left:0px; padding-top:30px; list-style:none'>
                <li class="okk okks" id='dashboardm' onclick="changemenu('#dashboardm', '#dashboard')">
                    <i class="fa fa-th" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Dashboard</span>
                </li>
                <li class="okk" id='checkinm' onclick="changemenu('#checkinm', '#checkin')">
                    <i class="fa fa-user-md" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Consultation</span>
                </li>
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-refresh" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Recrudescence</span>
                </li>
                <li class="okk" id="reportings" onclick="changemenu('#reportings', '#reporting')">
                    <i class="fa fa-refresh" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Reports</span>
                </li>
            </ul>
        </div>
        <div class="col-md-11" style="padding:0px">
            <div class="col-md-12" style="height:5px; background-color:#8F4A94; border-bottom-width:medium; border-bottom-style:solid; border-bottom-color:#E1E1E1"></div>
            <?php
            include 'partials/journeymonitor.php';
            ?>
            <!-- Dashboard -->
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
                            AWTT - 
                        </span>
                        <span style="display:inline-block" id="wttoday">
                            15mins <i class="fa fa-thumbs-o-up" style="color:#cc6600"></i>
                        </span>
                    </div>
                    <div class="col-md-12">
                        <canvas id="myChart" width="400" height="150"></canvas>

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
                <div class="col-md-8" style="padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Recrudescence
                        </span>
                    </div>
                    <div style="margin-top:20px">
                        <div style="text-align:right">Recrudescence</div>
                        <!--
                        <label>Hospital ID (Leave this blank for general return rate)</label>
                        <input type="text" class="form-control">-->
                        <div id="" style="margin-bottom:10px">
                            <div class="col-md-6" style="padding:0px">
                                <label>From</label>
                                <input type="date" class="form-control" id="rrFromq">
                            </div>
                            <div class="col-md-6" style="padding:0px;">
                                <label>To</label>
                                <input type="date" class="form-control" id="rrToq">
                            </div>
                            <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%" onclick="findrrq(rrFromq.value, rrToq.value)"></div>
                        <div id="recruddets">
                            <table style="width:100%; font-size:12px" class="table table-striped table-condensed table-bordered table-bordered">
                                <tr style='font-weight:600; font-size:15px'><td></td><td>Name</td><td>last visit</td><td>Weeks apart</td><td></td><td></td></tr>

                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-4" style="padding:0px; position:relative">
                    <div style="padding-bottom:50px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; min-height:500px; overflow-y:auto">
                        <div style="margin:10px">

                            <span style="font-size:25px; display:block">Agbede Joseph Kayode</span>
                            <span class="vitalclient">Gender : Female</span>
                            <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
                            <span class="vitalclient">Age : 24yrs</span>
                            <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
                        </div>                       
                    </div>
                </div>
            </div>
            <div id="checkin" style="display:none">
                <div class="col-md-5" id="consultationqueue" style="display:nones; z-index:10; top:55px; padding:5px; position:absolute; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px" onclick="hideconsultationqueue()">
                        <span class="partialsheader">
                            Queue
                        </span>
                    </div>
                    <div style="margin-top:5px; text-align:center">
                        <span class="bt bts ptr" onclick="pullcsqueue('today')" id="pulltoday">Today</span> - 
                        <span class="bt ptr" onclick="pullcsqueue('legacyrecords')" id="pulllegacyrecords">Legacy queue</span>
                    </div>
                    <div style="margin-top:5px">
                        <table class="table table-condensed table-bordered">
                            <tr style="background-color:#919191; color:#fff; font-size:11px; font-weight:600"><td></td><td>Hosp ID</td><td>Name</td><td>V.S. Checkin</td><td>Check-in date</td><td></td><td></td></tr>
                            <tbody id="csqueuet">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="consultationpane" style="display:none">
                    <div class="col-md-8" style="padding:0px">
                        <div style="padding-bottom:10px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:800px; overflow-y:auto">
                            <div style="margin:10px" id="consultinfo">
                                <span style="font-size:25px; display:block"><i class="fa fa-refresh recrud fa-spin" title="Returning client < 2wks"></i> Agbede Joseph Kayode</span>
                                <span class="vitalclient">Gender : Female</span>
                                <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
                                <span class="vitalclient">Age : 24yrs</span>
                                <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
                            </div>
                            <div style="padding-bottom:5px; text-align:right; margin-right:10px; position:relative">
                                <span class="queuecall" onclick="showconsultationqueue()" style="padding-left:10px">

                                    <span class="hwt" style="border-radius:50%; padding:1px">
                                        <?php
                                        $gt = datenow();
                                        $t = "select * from consultation_queue where checkouttime='00:00:00' and checkindate ='$gt'";
                                        $qw = mysqli_query($w, $t);
                                        $gs = mysqli_num_rows($qw);
                                        echo "<span style='border-radius:20%; padding:2px; font-size:11px' id='csqueuecount'>$gs</span> ";
                                        ?> 
                                    </span> 
                                    Queue</span>
                                <span class="vitalsminimenu vitalsminimenusel" onclick="consultmenu('#doclastvisits', '#doclastvisitsm')" id="doclastvisits" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Last 3 visits</span>
                                <span class="vitalsminimenuallergy" onclick="consultmenu('#docvitals', '#docvitalsm')" id="docvitals" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Allergies</span>
                                <span class="vitalsminimenu" onclick="consultmenu('#doccomplaints', '#doccomplaintsm')" id="doccomplaints" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Complaints</span>
                                <span class="vitalsminimenu" onclick="consultmenu('#docpexams', '#docpexamsm')" id="docpexams" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Phy. Exam</span>
                                <span class="vitalsminimenu" onclick="consultmenu('#docinvestigations', '#docinvestigationsm')" id="docinvestigations" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Investigation</span>
                                <span class="vitalsminimenu" onclick="consultmenu('#docdiagnosis', '#docdiagnosism')" id="docdiagnosis" style="">Diagnosis</span>
                                <span class="vitalsminimenu" onclick="consultmenu('#docprescription', '#docprescriptionm')" id="docprescription" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Prescription</span>
                            </div>
                            <div id="doclastvisitsm" style="padding:10px;">

                            </div>
                            <div id="docvitalsm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-odnoklassniki" style="color:#8F4A94"></i> Allergies</span>
                                </div>
                                <div class="col-md-4" style="padding:0px; padding-left:10px">
                                    <label>
                                        New Allergy
                                    </label>
                                    <input type="text" class="form-control" id='allergyinput'>
                                    <input type="button" value="Add allergy" class="btn reset" onclick='registerallergy(allergyinput.value, hospid.innerHTML)' style="margin-top:5px">
                                </div>
                                <div class="col-md-8" style="margin-bottom:10px; margin-top:20px;padding:10px; padding-left:10px; border-right-style: dashed; border-color:#E1E1E1; border-right-width:thin">
                                    <div class="col-md-12" style="background-color: #ccc; padding:10px">
                                        <div style="font-size:18px" id='allknownallergies'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="doccomplaintsm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-wpforms" style="color:#8F4A94"></i> Complaints</span>
                                </div>
                                <div class="col-md-4 cdc">
                                    <div class="col-md-12 cdcmini" style="padding:0px">

                                        <div style="margin-top:10px">
                                            <label>Presenting Complaint</label>
                                            <input type="text" class="form-control" id='consultcomplaint'>
                                            <label>Duration</label>
                                            <select class="form-control" id='consultduration'>
                                                <option>1-2 days</option>
                                                <option>3-5 days</option>
                                                <option>> 5 days</option>
                                            </select>
                                            <label>History</label>
                                            <textarea class="form-control" id='consulthistory'></textarea>
                                            <input type="button" value="Register Complaint" onclick="addcomplaint(consultcomplaint.value, consultduration.value, consulthistory.value)" class="btn reset" style="margin-top:10px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                    <table class="table table-striped table-bordered table-condensed" style="position:relative">
                                        <span style="position:absolute; font-size:12px; cursor:pointer; right:10px; top:-20px" onclick="getcomplain()">Refresh list</span>
                                        <thead style="background-color:rgba(0,0,0,0.1)">
                                            <tr style="font-weight:600"><td></td><td>Complain</td><td>Duration</td><td>History</td><td></td></tr>
                                        </thead>
                                        <tbody style="font-size:12px" id="consultationcomplain">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="docpexamsm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-sign-language" style="color:#8F4A94"></i> Physical Examination</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 cdcmini" style="padding:0px">

                                        <div style="margin-top:10px;">
                                            <label>Examination type</label>
                                            <select class="form-control" onchange="showexamtype(this.value)">
                                                <option>--Select type--</option>
                                                <option>General Examination</option>
                                                <option>Systemic Examination</option>
                                            </select>
                                            <div id="genexamination" style="display:none; padding:5px; margin-top:10px; background-color:rgba(255,255,255,0.2)">
                                                <div style="font-weight:500; ">General Examination</div>
                                                <label>Febrile ?</label>
                                                <select class="form-control" id="gefebrile">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <label>Cyanosed ?</label>
                                                <select class="form-control" id="gecyanosed">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <label>Jaundiced ?</label>
                                                <select class="form-control" id="gejaundiced">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <label>Hydrated ?</label>
                                                <select class="form-control" id="gehydrated">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <label>Pedal Oedema ?</label>
                                                <select class="form-control" id="geoedema">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <input type="button" value="Save report" class="btn reset" style="margin-top:10px; width:100%" onclick="savege()">
                                            </div>
                                            <div id="sysexamination" style="display:none; padding:5px; background-color:rgba(255,255,255,0.2); margin-top:10px">
                                                <div style="margin-bottom:5px; font-weight:500">Systemic Examination</div>
                                                <select class="form-control" id="seexamid">
                                                    <?php
                                                    $tq = "select * from consultation_pexaminationlist order by examcategory asc";
                                                    $bg = mysqli_query($w, $tq);
                                                    while ($gt = mysqli_fetch_array($bg)) {
                                                        $examcategory = $gt['examcategory'];
                                                        $examid = $gt['pexamination_listid'];
                                                        echo "<option value='$examid'>$examcategory</option>";
                                                    }
                                                    ?>
                                                </select>

                                                <textarea placeholder="Observation" id="seobservation" style="resize: none" class="form-control"></textarea>
                                                <input type="button" class="btn btn-success" onclick="savesystemicexam();" value="Save Observation" style="margin-top:5px; width:100%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                    <div style="font-weight:500; font-size:12px; text-align:right; color:#8F4A94; padding-right:10px; cursor:pointer" onclick="loadge()">Refresh tables</div>
                                    <table class="table table-striped table-bordered">
                                        <thead style="background-color:rgba(0,0,0,0.1)">
                                            <tr style="font-weight:600"><td colspan="2">General Examination</td></tr>
                                        </thead>
                                        <tbody style="font-size:13px" id="gepourout">

                                        </tbody>
                                    </table>
                                    <table class="table table-striped table-bordered">
                                        <thead style="background-color:rgba(0,0,0,0.1)">
                                            <tr style="font-weight:600"><td colspan="2">Systemic Examination</td><td>Report</td><td></td></tr>
                                        </thead>
                                        <tbody style="font-size:12px" id="sepourout">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="docinvestigationsm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-filter" style="color:#8F4A94"></i> Investigations</span>
                                </div>
                                <div class="col-md-4 cdc">
                                    <div class="col-md-12 cdcmini" style="padding:0px">

                                        <div style="margin-top:10px">
                                            <label>Investigation</label>
                                            <select class="form-control" size="10" style="overflow-y: auto" id="invorderin">
                                                <?php
                                                $wr = "select * from investigation_name order by name asc";
                                                $q = mysqli_query($w, $wr);
                                                while ($x = mysqli_fetch_array($q)) {
                                                    $invid = $x['investigation_nameid'];
                                                    $invname = $x['name'];
                                                    echo "<option style='padding:2px' value='$invid'>$invname</option>";
                                                }
                                                ?>
                                            </select>
                                            <input type="button" value="Add Investigation" onclick="orderinv(invorderin.value)" class="btn reset" style="margin-top:10px; width:100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                    <table class="table table-striped table-bordered" style="position:relative">
                                        <span style="position:absolute; right:10px; top:-20px; font-size:11px; cursor:pointer" onclick="loadinvs()">Refresh investigation table</span>
                                        <thead style="background-color:rgba(0,0,0,0.1)">
                                            <tr style="font-weight:600"><td></td><td>Investigations Ordered</td><td>Time Ordered</td><td></td><td></td></tr>
                                        </thead>
                                        <tbody style="font-size:12px" id="orderedinvs">

                                        </tbody>
                                    </table>
                                    <div style="text-align:right">
                                        <input type="button" class="btn login" value="Order Investigation" onclick="sendtolab(visitidgt.innerHTML)" style="margin-right: 10px">
                                    </div>
                                </div>
                            </div>         
                            <div id="docdiagnosism" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-user-md" style="color:#8F4A94"></i> Diagnosis (ICD-10)</span>
                                </div>
                                <div class="col-md-4 cdc">
                                    <div class="col-md-12 cdcmini" style="padding:0px">

                                        <div style="margin-top:10px">
                                            <!--
                                            <label>Diagnosis Super-Category</label>
                                            <select class="form-control">
                                            <?php
                                            $r = "select * from diagnosis_supercode2 order by diagnosis_l3 asc";
                                            $cg = mysqli_query($w, $r);
                                            while ($qgt = mysqli_fetch_array($cg)) {
                                                $id = $qgt['supercodeid'];
                                                $topleveldiagnosis = $qgt['diagnosis_l3'];
                                                echo "<option value='$id'>$topleveldiagnosis</option>";
                                            }
                                            ?>
                                            </select>
                                            <label>Diagnosis Category</label>
                                            <select class="form-control">
                                            <?php
                                            $r = "select * from diagnosis_supercode order by diagnosis_l2 asc";
                                            $cg = mysqli_query($w, $r);
                                            while ($qgt = mysqli_fetch_array($cg)) {
                                                $id = $qgt['id'];
                                                $highleveldiagnosis = $qgt['diagnosis_l2'];
                                                echo "<option value='$id'>$highleveldiagnosis</option>";
                                            }
                                            ?>
                                            </select>
                                            -->
                                            <label>Diagnosis</label>
                                            <select class="form-control" id="diagname">
                                                <?php
                                                $r = "select * from mshdiagnosis order by diagnosis asc";
                                                $cg = mysqli_query($w, $r);
                                                while ($qgt = mysqli_fetch_array($cg)) {
                                                    $id = $qgt['diagnosisid'];
                                                    $highleveldiagnosis = $qgt['diagnosis'];
                                                    echo "<option value='$id'>$highleveldiagnosis</option>";
                                                }
                                                ?>
                                            </select>
                                            <label>Additional information</label>
                                            <textarea class="form-control" id="diagaddinfo"></textarea>
                                            <input type="button" value="Register Complaint" class="btn reset" style="margin-top:10px" onclick="regdiagnosis(diagname.value, diagaddinfo.value)">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                    <div style='text-align:right; padding-right:10px'><span onclick="pulldiagnosis(visitidgt.innerHTML)" style="font-size:11px; cursor:pointer"><i class="fa fa-refresh fa-spin"></i> Refresh diagnosis table</span></div>
                                    <table class="table table-striped table-bordered">
                                        <thead style="background-color:rgba(0,0,0,0.1)">
                                            <tr style="font-weight:600"><td></td><td>Diagnosis</td><td>Additional Information</td><td></td><td></td></tr>
                                        </thead>
                                        <tbody style="font-size:12px" id="docdiag">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="docprescriptionm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-adjust" style="color:#8F4A94"></i> Prescription</span>
                                </div>
                                <div class="col-md-4" style="padding:5px">
                                    <div class="col-md-12 cdcmini xcx">
                                        <div style="margin-top:10px">
                                            <label>Drug category</label>
                                            <select class="form-control" onchange="pulldrugsincat(this.value)">
                                                <option>--Select--</option>
                                                <?php
                                                $y = "select * from pharmacy_drugcategory order by drugcategory asc";
                                                $qb = mysqli_query($w, $y);
                                                while ($vs = mysqli_fetch_array($qb)) {
                                                    $drgcat = $vs['drugcategory'];
                                                    $id = $vs['pharmacy_drugcategoryid'];
                                                    echo "<option value='$id'>$drgcat</option>";
                                                }
                                                ?>
                                            </select>

                                            <label>Drug name</label>
                                            <input type="text" class="form-control">
                                            <div style="background-color:rgba(255,255,255,0.1); max-height:200px; overflow-y: auto; margin-top:10px; padding-top:10px; overflow-x:auto; overflow-y:auto" id="classeddrug">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding:5px">
                                    <div class="col-md-5 cdcmini xcx" style="margin-bottom:5px; height:146px; border-right-style:dashed; border-right-color:#BBBBBB; border-right-width:thin" id="pulleddrgdets">
                                        <span style="font-size:12px"><img src="images/selectdrug.gif"></span>
                                        <div style="font-size:25px"></div><span style="font-size:20px;"></span><span style="font-size:11px"><span id="drgidi"></span></span>
                                    </div>
                                    <div class="col-md-7 cdcmini xcx">
                                        <div style="font-size:25px; margin-bottom:10px">Dosage</div>
                                        <span class="col-md-4" style="padding:0px">
                                            <span style="font-size:14px;">Dose</span>
                                            <input type="number" class="form-control" id="drgdose" onchange="calcdrgs()">
                                        </span>
                                        <span class="col-md-4" style="padding:0px">
                                            <span style="font-size:14px;">.</span>
                                            <select class="form-control" id="drgusage" onchange="calcdrgs()">
                                                <option value="1">OD</option>
                                                <option value="2">BD</option>
                                                <option value="3">TDS</option>
                                                <option value="4">QDS</option>
                                                <option value="1">PRN</option>
                                            </select>
                                        </span>
                                        <span class="col-md-4" style="padding:0px">
                                            <span style="font-size:14px;">No. of days</span>
                                            <input type="number" class="form-control" id="drgdays" onchange="calcdrgs()">
                                        </span>
                                        <input type="button" value="Prescribe" class="btn reset" style="margin-top:5px; width:100%" onclick="prescribedrg()">
                                        <span id="calceddrugs" style="display:none"></span>
                                        <span id="calcedduse" style="display:none"></span>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding:5px">
                                    <div style="text-align: right">
                                        <span style="cursor:pointer; font-size:11px" onclick="pullreqsts()"><i class="fa fa-refresh fa-spin"></i> Refresh prescription list</span>
                                    </div>
                                    <table class="table table-condensed table-striped table-bordered">
                                        <tr style="font-weight:500; background-color:#BFC9E3"><td></td><td>Drug</td><td>Dosage</td><td colspan="2">Qty</td></tr>
                                        <tbody id="rqstddrg">
                                            <tr><td colspan="4">No drugs requested</td></tr>
                                        </tbody>
                                    </table>
                                    <span class="btn btn-success" onclick="sendtopharmacy()"><i class="fa fa-hospital-o"></i> Send to Pharmacy</span>
                                    <span class="btn btn-success" onclick="endconsultation()"><i class="fa fa-opencart"></i> End consultation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left:5px">
                        <div style="text-align:center; margin-bottom: 10px; margin-top:10px; padding:10px">
                            <span class="vitalsminimenu vitalsminimenusel" onclick="docvitalsmenu('#vitalsr', '#vitalsreading')" id="vitalsr">Vitals Reading</span>
                            <span class="vitalsminimenu" onclick="docvitalsmenu('#redovitalsr', '#redovitals')" id="redovitalsr">Bill</span>
                            <span class="vitalsminimenuallergy" onclick="docvitalsmenu('#allergiesr', '#allergiesdisp')" id="allergiesr">Allergies</span>
                        </div>

                        <span id="vitalsreading" style="margin-top:20px;  width:400px; height:200px; background-color:rgba(0,0,0,0.1)">

                            <div>
                                <center>
                                    <span style="font-size:25px">National Early Warning Score (NEWS)</span>
                                    <table class="table table-bordered table-responsive" style="max-width:700px; text-align:center">
                                        <tr class="bluishbgnd" style="font-size:16px"><td style="max-width:60px">Physiological Parameters</td><td>3</td><td>2</td><td>1</td><td>0</td><td>1</td><td>2</td><td>3</td></tr>
                                        <tr><td class="bluishbgnd">Respiration Rate</td><td class="lightredish"><=8</td><td class="lightorangeish"></td><td class="lightgreenish">9-11</td><td class="grey">12-20</td><td class="lightgreenish"></td><td class="lightorangeish">21-24</td><td class="lightredish">>=25</td></tr>
                                        <tr><td class="bluishbgnd">Oxygen Saturations</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                        <tr><td class="bluishbgnd">Temperature</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                        <tr><td class="bluishbgnd">Systolic BP</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                        <tr><td class="bluishbgnd">Heart Rate</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                    </table>
                                </center>
                            </div>
                        </span>
                        <div id="redovitals" style="display:none; text-align:center;">
                            <center>
                                <span class='col-md-12' style="background-color:rgba(255,255,255,0.1); text-align: center; text-align:left; padding:8px">
                                    <table class='table-bordered' style='width:100%'>
                                        <tr><td colspan='4' style='font-weight:600; text-align:center'>Bill</td></tr>

                                        <tbody id='consultbilling'>
                                        </tbody>
                                    </table>
                                </span>
                            </center>
                        </div>
                        <span id="allergiesdisp" style="display:none">
                            <div style="font-size:20px; text-align:center">Allergies</div>
                            <center>
                                <span style="background-color:rgba(255,255,255,0.1); text-align: center; text-align:left; display:block; padding:8px">
                                    <table style="width:100%" class="table-striped table-bordered" style='max-width:350px; box-shadow: 1px 1px 1px #888888'>
                                        <thead style="font-size:14px">
                                            <tr style="font-weight:500; color:red"><td></td><td>Allergy</td><td>Registered by</td></tr>
                                        </thead>
                                        <tbody id='allergyitemised' style="color:red">
                                        </tbody>

                                    </table>
                                </span>
                            </center>
                        </span>
                    </div>
                </div>
            </div>
            <div id="reporting" style="display:none">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Reports
                        </span>
                    </div>
                    <div style="padding-bottom:8px; text-align:center; margin-top:10px">
                        <span class="vitalsminimenu vitalsminimenusel" onclick="triagemenuq('#vsfq', '#demographicq')" id="vsfq" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">All reports</span>
                        <span class="vitalsminimenu" onclick="triagemenuq('#nrq', '#newsreportq')" id="nrq" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Visit summary</span>
                    </div>
                    <div class="signup" id="demographicq">
                        <div style="margin-bottom:5px; font-size:20px">
                            Report type
                        </div>
                        <select class="form-control" size="5" style="font-size:16px" onclick='reportquerytype(this.value)'>
                            <option value='medcondition'>Medical Condition</option>
                            <option value='recrureport'>Recrudescence</option>
                            <option value='referralreport'>Medical</option>
                            <option value='diagnosisreport'>Diagnosis</option>
                            <option value='referralreport'>Referral</option>
                            <option value='prescriptionreport'>Prescription</option>
                        </select>

                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none" id="medconditions">
                            <div class="col-md-12" id="medconditionsd" style="border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Medical Condition</div>
                                <label>Diagnosis</label>
                                <select class="form-control" id="rptdiagnosisid">
                                    <option>--Select--</option>
                                    <option>All</option>
                                    <?php
                                    $qcx = "select * from mshdiagnosis order by diagnosis asc";
                                    $nh = mysqli_query($w, $qcx);
                                    while ($kq = mysqli_fetch_array($nh)) {
                                        $diagnosisid = $kq['diagnosisid'];
                                        $diagnosis = $kq['diagnosis'];
                                        echo "<option value='$diagnosisid'>$diagnosis</option>";
                                    }
                                    ?>
                                </select>
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control" id="rptdiagfromdate">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control" id="rptdiagtodate">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%" onclick="searchreports(rptdiagnosisid.value, rptdiagfromdate.value, rptdiagtodate.value)">
                            </div>
                        </div>

                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none" id="recrureports">
                            <div class="col-md-12" id="medcondition" style="padding:20px; border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Recrudescence</div>
                                <!--
                                <label>Hospital ID (Leave this blank for general return rate)</label>
                                <input type="text" class="form-control">-->
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control" id="rrFrom">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control" id="rrTo">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%" onclick="findrr(rrFrom.value, rrTo.value)">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none;" id="referralreports">
                            <div class="col-md-12" id="medcondition" style="padding:20px; border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Referral</div>
                                <label>Hospital ID</label>
                                <input type="text" class="form-control">
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none;" id="diagnosisreports">
                            <div class="col-md-12" id="medconditionsd" style="border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Diagnosis</div>
                                <label>Condition</label>
                                <select class="form-control">
                                    <option>--Select--</option>
                                    <?php
                                    $gq = "select * from mshdiagnosis order by diagnosis asc";
                                    $ha = mysqli_query($w, $gq);
                                    while ($had = mysqli_fetch_array($ha)) {
                                        $diagnosisid = $had['diagnosisid'];
                                        $diagnosis = $had['diagnosis'];
                                        echo "<option value='$diagnosisid'>$diagnosis</option>";
                                    }
                                    ?>
                                </select>
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none;" id="referralreports">
                            <div class="col-md-12" id="medcondition" style="padding:20px; border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Referral</div>
                                <label>Hospital ID</label>
                                <input type="text" class="form-control">
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding:0px; margin-top:10px; display:none;" id="prescriptionreports">
                            <div class="col-md-12" id="medcondition" style="padding:20px; border-style:solid; background-color:#D4D4D4; border-color:#EAEAEA; border-width:thin; border-radius:4px">
                                <div style="text-align:right">Referral</div>
                                <label>Hospital ID</label>
                                <input type="text" class="form-control">
                                <div class="col-md-6" style="padding:0px">
                                    <label>From</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <label>To</label>
                                    <input type="date" class="form-control">
                                </div>
                                <input type="button" class="btn reset" value="Pull report" style="margin-top:10px; width:100%">
                            </div>
                        </div>
                    </div>  
                    <div class='col-md-12' id="newsreportq" style="display:none; padding:0px">
                        <div style="background-color:#D4D4D4">
                            <span style="font-size:20px; margin-left:10px">Visit summary </span>
                            <div style="background-color:rgba(255,255,255,0.2); padding:10px">
                                <form>
                                    <label>Hospital ID</label>
                                    <input type="text" class="form-control" placeholder="Hospital ID" id="vshi" maxlength="15">
                                    <label>Visit date</label>
                                    <input type="date" class="form-control" id="vsvd">
                                    <input type="button" value="Search visits" class="btn reset" style="margin-top:5px" onclick="pullsummaryvisits()">
                                    <input type="reset" value="Reset" class="btn reset" style="margin-top:5px">
                                </form>
                            </div>
                            <div style="background-color:rgba(255,255,255,0.2); padding:10px; margin-top:10px; max-height:600px; overflow-y:auto" id="vsservervomit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 briefstyle" id="brief" style="height:100% !important; padding-left:0px">
                    <div id="recrudreport" style="display:none">
                        <div style="padding:5px; background-color:#D4D4D4"  id="checkindets"></div>
                        <div style="margin-top:5px; padding:5px; position:relative; background-color:#D4D4D4">
                            <div style="margin-bottom: 5px; text-align:right">
                                <span onclick="printDiv('printarea')" title="Print visit summary" style="cursor:pointer; border-radius:2px; font-size:12px; background-color:#1784D0; color:#fff; padding:2px">Print summary - <i class="fa fa-print"></i></span>
                            </div>
                            <div style="background-color:#fff; min-height:900px; padding:20px" id="printarea">
                                <img src="images/mtsinailogo.png" width="200px">
                                <div style="margin-top:20px">
                                    <?php
                                    $gendate = date('jS F, Y');
                                    echo "" . $gendate;
                                    ?>
                                </div>
                                <div style="font-size:30px; font-weight:500; text-align:center" id='summName'></div>
                                <div style="text-align:center; margin-bottom:20px">Visit summary</div>
                                <div style="margin-top:10px" id='patientsummaryth'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="otherreport">
                        <div style="padding:5px; background-color:#D4D4D4"  id="checkindets"></div>
                        <div style="margin-top:5px; padding:5px; background-color:rgba(255,255,255,9)" id="adminreportss">
                            This is where other reports reside
                        </div>
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
    </body>
</html>

<script>
    function changemenu(a, b) {
        $("#dashboard").hide();
        $("#registration").hide();
        $("#checkin").hide();
        $("#reporting").hide();
        $(".okk").removeClass("okks");
        $(a).addClass("okks");
        $(b).show();
    }

    function waittimechecks() {
        var action = "dashboardwaittime";
        $.post("partials/wttracker.php", {action: action}).done(function (data) {
            _v("dashwaittime").innerHTML = data;
        });
    }

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

    function findrrq(a, b) {
        // alert(a + " " + b);
        var action = "recrudescence";
        $.post("partials/adminreport.php", {action: action, datefrom: a, dateto: b}).done(function (data) {
            //alert(data);
            _v("recruddets").innerHTML = data;
        });
        //recrud();
    }

    function hideconsultationqueue() {
        $("#consultationqueue").hide(100);
    }
    function showconsultationqueue() {
        $("#consultationqueue").show(100);
    }

    function showexamtype(a) {

        $("#genexamination").hide();
        $("#sysexamination").hide();
        if (a === "General Examination") {
            $("#genexamination").show();
        }
        if (a === "Systemic Examination") {
            $("#sysexamination").show();
        }
    }

    function savege() {
        var febrile = _v("gefebrile").value;
        var cyanosed = _v("gecyanosed").value;
        var jaundiced = _v("gejaundiced").value;
        var hydrated = _v("gehydrated").value;
        var oedema = _v("geoedema").value;
        var action = "savege";
        var visitid = _v("visitidgt").innerHTML;
        $.post("partials/consulting.php", {action: action, visitid: visitid, febrile: febrile, cyanosed: cyanosed, jaundiced: jaundiced, hydrated: hydrated, oedema}).done(function (data) {
            notifier(data, 3000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
        });
        loadge();
    }

    function savesystemicexam() {
        var action = "savese";
        var examid = _v("seexamid").value;
        var visitid = _v("visitidgt").innerHTML;
        var observation = _v("seobservation").value;
        if (observation.length < 1) {
            notifier("Observation note cannot be empty", 5000);
            var audio = new Audio('chime/bad.mp3');
            audio.play();
            return;
        }
        $.post("partials/consulting.php", {action: action, examid: examid, visitid: visitid, observation: observation}).done(function (data) {
            notifier(data, 3000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
        });
        loadge();
    }

    function regdiagnosis(a, b) {
        var diagnosisid = a;
        var addinfo = b;
        var action = "regdiagnosis";
        var visitid = _v("visitidgt").innerHTML;
        $.post("partials/consulting.php", {action: action, diagnosisid: diagnosisid, addinfo: addinfo, visitid: visitid}).done(function (data) {
            notifier(data, 3000);
            var audio = new Audio('chime/saved.mp3');
            audio.play();
        });
        pulldiagnosis(visitid);
    }

    function pulldiagnosis(a) {
        var visitid = a;
        var action = "pulldiagnosis";
        $.post("partials/consulting.php", {visitid: visitid, action: action}).done(function (data) {
            _v("docdiag").innerHTML = data;
            //_v("docdiag").innerHTML = "This is";
        });
    }

    function docvitalsmenu(a, b) {
        $("#vitalsreading").hide();
        $("#redovitals").hide();
        $("#allergiesdisp").hide();
        $(b).show();
        $(".vitalsminimenu").removeClass("vitalsminimenusel");
        $(a).addClass("vitalsminimenusel");
        if (b === "#redovitals") {
            var visitid = _v("visitidgt").innerHTML;
            getbillfordoc(visitid);
        }
    }

    function getbillfordoc(a) {
        var action = "getbillfordoc";
        $.post("partials/billingprocessor.php", {visitid: a, action: action}).done(function (data) {
            _v("consultbilling").innerHTML = data;
            ;
        })
    }

    function triagemenuq(a, b) {
        $("#demographicq").hide();
        $("#newsreportq").hide();
        $(b).show();
        $(".vitalsminimenu").removeClass("vitalsminimenusel");
        $(a).addClass("vitalsminimenusel");

        if (a === "#vsfq") {
            $("#recrudreport").hide();
            $("#otherreport").show();
        }
        if (a === "#nrq") {
            $("#recrudreport").show();
            $("#otherreport").hide();
        }
    }

    function reportquerytype(a) {
        var gt = "#" + a + "s";
        $("#medconditions").hide();
        $("#recrureports").hide();
        $("#referralreports").hide();
        $("#diagnosisreports").hide();
        $("#referralreports").hide();
        $("#prescriptionreports").hide();

        $(gt).show();
    }

    function searchreports(a, b, c) {
        //alert(a + " " + b + " " + c);
        if (a === "--Select--") {
            alert("Select a diagnosis option");
            return;
        }
        if (b.length < 1 || c.length < 1) {
            alert("Select a TO and FROM date");
            return;
        }
        var action = "diagnosisreport";
        $.post("partials/adminreport.php", {action: action, diagnosisid: a, datefrom: b, dateto: c}).done(function (data) {
            _v("adminreportss").innerHTML = data;
        });
    }

    function findrr(a, b) {
        alert(a + " " + b);
        var action = "recrudescence";
        $.post("partials/adminreport.php", {action: action, datefrom: a, dateto: b}).done(function (data) {
            alert(data);
        });
        recrud();
    }

    function pullsummary(a) {
        _v("summName").innerHTML = _v("summNamesel").innerHTML;
        var visitid = a;
        action = "pullsummary";
        $.post("partials/adminmodule.php", {visitid: visitid, action: action}).done(function (data) {
            _v("patientsummaryth").innerHTML = data;
        });
    }

    function pullsummaryvisits() {
        var hospid = _v("vshi").value;
        var visitdate = _v("vsvd").value;

        if (hospid.length < 3) {
            alert("Hospital ID is required field");
            return;
        }

        $.post("partials/adminmodule.php", {hospitalid: hospid, action: "summaryvisits"}).done(function (data) {
            _v("vsservervomit").innerHTML = data;
        });
    }

    function requestdelete(a) {
        alert(a);
    }

    $("#printsummary").click(function () {
        $("#printarea").print();
    });

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    setInterval(function () {
        pullcsqueue(csqueuetype);
        waittimechecks();
        loadinvs();
    }, 10000);
</script>