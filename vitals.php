<!DOCTYPE html>
<?php
include 'partials/connect.php';
include "confirm_indexing.php";
include "sendmail.php";

$staffid = $_SESSION['staffid'];
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
        <script src="javascript/bootstrap.min.js" type="text/javascript"></script>
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
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-stethoscope" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Tri-age</span>
                </li>
                <li class="okk" id='checkinm' onclick="changemenu('#checkinm', '#checkin')">
                    <i class="fa fa-user-md" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Consultation</span>
                </li>
            </ul>
        </div>
        <div class="col-md-11" style="padding:0px">
            <div class="col-md-12" style="height:5px; background-color:#8F4A94; border-bottom-width:medium; border-bottom-style:solid; border-bottom-color:#E1E1E1"></div>
            <?php
            include 'partials/journeymonitor.php';
            ?>
            <!-- Dashboard -->
            <div id="dashboard">
                <div class="col-md-12" style="height:100%; padding:0px; overflow-y:auto" id="filler">
                    <div class='col-md-12' style="background-color:#BFC9E3; margin-bottom:20px; padding:10px; position:relative">
                        <span class="partialsheader">
                            Dashboard
                        </span>
                        <span style="position:absolute; right:10px; top:7px; text-align:center; font-size:25px; min-height:40px; margin-bottom:5px">
                            <span style='background-color:rgba(255,255,255,0.2); margin-right:10px; padding:5px; cursor:pointer' title='Average Wait Time Today'>
                                <span style="font-size:12px; font-weight:600; color:#8F4A94">
                                    AWTT - <img src="images/reading.gif" width='5px'>
                                </span>
                                <span style="display:inline-block" id="wttoday">
                                    0mins <i class="fa fa-thumbs-o-up" style="color:#cc6600"></i>
                                </span>

                            </span>
                            <span title='Your EMR engagement' style='cursor:pointer; '>
                                <i class='fa fa-female' style='color:rgba(255,255,255,1); text-shadow: 2px 2px #525252'></i>
                                <span style='font-size:14px; color:#525252'>
                                    <?php getvspercentusage($staffid) ?>
                                </span>
                            </span>
                        </span>

                    </div>
                    <div class="col-md-8" style="padding:0px">
                        <canvas id="myChart" width="400" height="150"></canvas>
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
                        </script>
                    </div>
                    <?php
                    getusageday($datenow);
                    ?>
                    <div class="col-md-12" style="padding:0px; margin-top:15px">
                        <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">

                            <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                                <div style="font-weight:600; color:#8F4A94; margin-bottom:10px">Staff Engagement Analysis</div>
                                <div style="background-color:#BFC9E3; padding:10px">
                                    <?php
                                    $tablecheck = "triage_vitals";
                                    $qa = mysqli_query($w, "select * from $tablecheck");
                                    $countd = mysqli_num_rows($qa);

                                    $haq = mysqli_query($w, "select distinct(staffid) from $tablecheck");
                                    $staffnames = "";
                                    $recordcount = "";
                                    $usagecount = "";
                                    while ($q = mysqli_fetch_array($haq)) {
                                        $staffid = $q['staffid'];

                                        //calculate number of entries made
                                        $jq = mysqli_query($w, "select * from $tablecheck where staffid='$staffid'");
                                        $recordcount = mysqli_num_rows($jq);
                                        $percentagescore = floor(($recordcount / $countd ) * 100) . "%";

                                        $staffname .= "<div style='margin-bottom:10px; border-bottom-style:dashed; border-bottom-width:thin; border-color:#525252'><span style='font-size:16px'>" . getstaffname($staffid) . "</span> - $recordcount ($percentagescore)</div> ";
                                    }
                                    echo "<div style='text-align:center; font-size:18px; margin-botom:20px'><span style='font-weight:400'>Total vital signs taken $countd </span></div><br> $staffname";

                                    function removelastchar($str) {
                                        $strlength = strlen($str) - 1;
                                        $q = substr($str, 0, $strlength);
                                        return $q;
                                    }

                                    function getfdstaff() {
                                        global $w, $usagecount;
                                        $hqq = mysqli_query($w, "select * from staff where role='4'");
                                        $name = "";
                                        while ($ha = mysqli_fetch_array($hqq)) {
                                            $name .= "'" . $ha['firstname'] . " " . $ha['lastname'] . "',";
                                            $staffid = $ha['staffid'];
                                            $usagecount .= getfdengagement($staffid);
                                        }
                                        pullusage();
                                        echo removelastchar($name);
                                    }

                                    function getfdengagement($staffid) {
                                        global $w;
                                        $usa = "";
                                        $jq = mysqli_query($w, "select * from triage_vitals where staffid='$staffid'");
                                        $usa .= mysqli_num_rows($jq) . ",";
                                        return $usa;
                                    }

                                    //getfdstaff();
                                    function pullusage() {
                                        echo $usagecount;
                                    }
                                    ?>

                                </div>
                                <div style='font-size:11px; text-align:center; color:#8F4A94'>
                                    Staff not on list are either not registered or have not logged any vitals
                                </div>
                                <!--
                                <canvas id="mybChart" width="400" height="150"></canvas>
                                
                                <script>
                                    var ctx = document.getElementById("mybChart").getContext('2d');
                                    new Chart(document.getElementById("mybChart"), {
                                        type: 'horizontalBar',
                                        data: {
                                            labels: [<?php getfdstaff(); ?>],
                                            datasets: [
                                                {
                                                    label: "Check In",
                                                    backgroundColor: ["#3e95cd", "#8e5ea2"],
                                                    data: [80, 45]
                                                }
                                            ]
                                        },
                                        options: {
                                            legend: {display: false},
                                            title: {
                                                display: true,
                                                text: 'EMR engagement'
                                            }
                                        }
                                    });
                                </script>
                                -->
                            </div>
                        </div>
                        <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">

                            <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                                <div style="font-weight:600; color:#8F4A94">Check-In today</div>
                                <table style="margin-top:10px; width:100%; border-radius:4px;">
                                    <tr>
                                        <td style="background-color:#BFC9E3; padding:10px">
                                            <script>
                                                function waittimechecks() {
                                                    var action = "dashboardwaittime";
                                                    $.post("partials/wttracker.php", {action: action}).done(function (data) {
                                                        _v("dashwaittime").innerHTML = data;
                                                    });
                                                }
                                            </script>
                                            <div style="text-align: right">
                                                <i class="fa fa-refresh ptr" onclick="waittimechecks()"></i>
                                            </div>
                                            <table class="table-bordered dashsections">
                                                <tr><td></td><td>Name</td><td>In</td><td>Out</td><td>Time(mins)</td></tr>
                                                <tbody id="dashwaittime">
                                                    <?php
//$qq = mysqli_query($w,"select * from checkinlog where dateadded");
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
                        </div>
                        <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
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
                        </div>
                        <!--
                                                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
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
                        -->
                    </div>
                </div>
                <!-- I cut an item away from here.. if there is an error I will be putting it back -->
            </div>

            <div id="registration" style="display:none">
                <div class="col-md-5" id="triagequeue" style="display: none; position:absolute; min-height:500px; max-height:450px; overflow-y: auto; z-index:400; top:53px; padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px; cursor:pointer" title="Click to close queue pane" onclick="hidetriagequeue();">
                        <span class="partialsheader">
                            Triage Queue
                        </span>
                    </div>
                    <div style="margin-top:5px">
                        <div style="margin-bottom:5px; text-align:center">
                            <span class="bt bts ptr" onclick="pullvsqueue('today')" id="pulltoday">Today</span> - 
                            <span class="bt ptr" onclick="pullvsqueue('legacyrecords')" id="pulllegacyrecords">Legacy queue</span>
                        </div>
                        <table style="width:100%; font-size:12px" class="table table-striped table-bordered">
                            <tr style="background-color:#919191; color:#fff; font-size:11px; font-weight:600"><td></td><td>Hosp ID</td><td>Name</td><td>V.S. Checkin</td><td>Check-in date</td><td></td><td></td></tr>
                            <tbody id="vsqueuet">
                                <?php
                                $t = datenow();
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
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-md-12" style="padding:0px">
                    <div style="padding-bottom:10px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                        <div style="margin:10px" id="traigedetails">

                        </div>
                        <div style="padding-bottom:20px; text-align:center; z-index:50; position:relative">
                            <span class="queuecall" onclick="showtriagequeue()" style="padding-left:10px">
                                <?php
                                $gt = datenow();
                                $t = "select * from triage_queue where checkouttime='00:00:00' and checkindate ='$gt'";
                                $qw = mysqli_query($w, $t);
                                $gs = mysqli_num_rows($qw);
                                echo "<span class='hwt' style='border-radius:50%; padding:3px; font-size:11px' id='triagequeuecount'>$gs</span>";
                                ?> 
                                - Triage Queue .</span>
                            <span id="vitalsignsmenu" style="display:none">
                                <span class="vitalsminimenu" onclick="triagemenu('#vsf', '#vitalsignsform')" id="vsf" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Vital Signs</span>
                                <span class="vitalsminimenu" onclick="triagemenu('#trc', '#triagechart')" id="trc"><i class="fa fa-line-chart"></i></span>
                                <span class="vitalsminimenu" onclick="triagemenu('#trf', '#triagereportsform')" id="trf">Triage Report</span>
                                <span class="vitalsminimenu" onclick="triagemenu('#nr', '#newsreport')" id="nr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Visit History</span>
                            </span>
                        </div>
                        <div id="vitalsignsform" style="padding:10px; display:none;">
                            <div style="padding:5px;">
                                <span class="col-md-4" style="background-color:#cccccc; display:inline-block; text-align:left; padding:8px">
                                    <table>
                                        <form>
                                            <tr><td>Systolic</td><td><input type="number" id="vssystolic" class="v form-control" onchange="computebp(vssystolic.value, vsdiastolic.value)"></td></tr>
                                            <tr><td>Diastolic</td><td><input type="number" id="vsdiastolic" class="v form-control" onchange="computebp(vssystolic.value, vsdiastolic.value)"></td></tr>
                                            <tr><td>Blood pressure (mmHg)</td><td><span class="form-control" id="vsbp"></span></td></tr>
                                            <tr><td>Height (m)</td><td><input type="number" class="v form-control" id="vsheight"  onchange="computebmi(vsheight.value, vsweight.value)"></td></tr>
                                            <tr><td>Weight (kg)</td><td><input type="number" class="v form-control" id="vsweight"  onchange="computebmi(vsheight.value, vsweight.value)"></td></tr>
                                            <tr><td>BMI (Body Mass Index)</td><td><span class="form-control" id="vsbmi"></span><span id="rep"></span></td></tr>
                                            <tr><td>Temperature (<sup>o</sup>C)</td><td><input type="number" id="vstemperature" class="v form-control" onchange="newscalculator('t', this.value)"></td></tr>
                                            <tr><td>Heart rate (bpm)</td><td><input type="number" id="vsheartrate" class="v form-control" onchange="newscalculator('hr', this.value)"></td></tr>
                                            <tr><td>Oxygen saturation</td><td><input type="number" id="vsoxygensat" class="v form-control" onchange="newscalculator('os', this.value)"></td></tr>
                                            <tr><td>Respiration rate</td><td><input type="number" id="vsrespiration" class="v form-control" onchange="newscalculator('rr', this.value)"></td></tr>
                                    </table>
                                    <div style="margin-top:10px; margin-bottom:5px; text-align: center">
                                        <input type="button" value="Save Vitals" class="btn login" onclick="takevitalsigns()">
                                        <input type="button" value="Re-take Vitals" class="btn reset" onclick="resetvitals()">
                                    </div>
                                    </form>
                                </span>
                                <span  class="col-md-8">
                                    <div style="font-size:25px; margin-top:40px; text-align:center">
                                        NEWS SCORE - 
                                        <span id="newsscore" onclick='checkvsvalues(this.innerHTML)'>

                                        </span>

                                    </div>
                                    <center>
                                        <table class="table table-bordered table-responsive" style="max-width:700px; text-align:center">
                                            <tr class="bluishbgnd" style="font-size:16px"><td style="max-width:60px">Physiological Parameters</td><td>3</td><td>2</td><td>1</td><td>0</td><td>1</td><td>2</td><td>3</td></tr>
                                            <tr><td class="bluishbgnd">Respiration Rate</td><td class="lightredish" id="rrneg3"></td><td class="lightorangeish" id="rrneg2"></td><td class="lightgreenish" id="rrneg1"></td><td class="grey" id="rr0"></td><td class="lightgreenish" id="rr1"></td><td class="lightorangeish" id="rr2"></td><td class="lightredish" id="rr3"></td></tr>
                                            <tr><td class="bluishbgnd">Oxygen Saturations</td><td class="redish" id="osneg3"></td><td class="orangeish" id="osneg2"></td><td class="greenish" id="osneg1"></td><td class="lightgrey" id="os0"></td><td class="greenish" id="os1"></td><td class="orangeish" id="os2"></td><td class="redish" id="os3"></td></tr>
                                            <tr><td class="bluishbgnd">Temperature</td><td class="lightredish" id="tneg3"></td><td class="lightorangeish" id="tneg2"></td><td class="lightgreenish" id="tneg1"></td><td class="grey" id="t0"></td><td class="lightgreenish" id="t1"></td><td class="lightorangeish" id="t2"></td><td class="lightredish" id="t3"></td></tr>
                                            <tr><td class="bluishbgnd">Systolic BP</td><td class="redish" id="sbpneg3"></td><td class="orangeish" id="sbpneg2"></td><td class="greenish" id="sbpneg1"></td><td class="lightgrey" id="sbp0"></td><td class="greenish" id="sbp1"></td><td class="orangeish" id="sbp2"></td><td class="redish" id="sbp3"></td></tr>
                                            <tr><td class="bluishbgnd">Heart Rate</td><td class="lightredish" id="hrneg3"></td><td class="lightorangeish" id="hrneg2"></td><td class="lightgreenish" id="hrneg1"></td><td class="grey" id="hr0"></td><td class="lightgreenish" id="hr1"></td><td class="lightorangeish" id="hr2"></td><td class="lightredish" id="hr3"></td></tr>
                                        </table>
                                    </center> 
                                    <div id='vitalsreporttable' style='text-align:center'>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div id="triagechart" style="display:nones; padding:10px">

                        </div>
                        <div id="triagereportsform" style="display:none">
                            <div style="text-align:center">
                                <span style="background-color:#cccccc; min-width:360px; text-align:left;display:inline-block; padding:8px">
                                    <table>
                                        <tr>
                                            <td style="width:160px">Sore throat?</td>
                                            <td>
                                                <select class="form-control" id="trst" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ear discharge?</td><td>
                                                <select class="form-control" id="tred" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Stiff neck?</td><td><select class="form-control" id="trsn" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Bloody diarrhea</td><td><select class="form-control" id="trbd" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Hematuria?</td><td><select class="form-control" id="trh" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Skin rash?</td><td><select class="form-control" id="trsr" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Jaundice?</td><td><select class="form-control" id="trj" onchange="trcheckcore()">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                    </table>
                                    <hr style="margin-top:5px; margin-bottom:5px; border-style:dashed; border-color:#E0E0E0">
                                    <table>
                                        <tr>
                                            <td style="width:160px">High fever?</td>
                                            <td>
                                                <select class="form-control" id="trhf">
                                                    <option>No</option>
                                                    <option>Yes</option>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Headache?</td><td><select class="form-control" id="trha">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Nausea/ vomiting ?</td><td><select class="form-control" id="trv">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Abdominal pain ?</td><td><select class="form-control" id="trap">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Diarrhoea?</td><td><select class="form-control" id="trd">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Loss of appetite?</td><td><select class="form-control" id="trloa">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td>
                                        </tr>
                                        <tr id="docsights"><td>See Doctor?</td><td><select class="form-control" id="trmc">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td>
                                        </tr>
                                    </table>
                                    <div style="margin-top:10px; margin-bottom:5px; text-align: center">
                                        <input type="button" value="Send to Doctor" class="btn login" onclick="triagereportin()">
                                        <input type="reset" value="Mini-Consultation" class="btn reset" id="miniconsultbtn">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div id="newsreport" style="display:none; padding:10px">
                        </div>
                        <div style="margin-top:20px; display:none">
                            <center>
                                <span style="font-size:25px">National Early Warning Score (NEWS)</span>
                                <table class="table table-bordered table-responsive" style="max-width:700px; text-align:center">
                                    <tr class="bluishbgnd" style="font-size:16px"><td style="max-width:60px; font-weight:700">Physiological Parameters</td><td>3</td><td>2</td><td>1</td><td>0</td><td>1</td><td>2</td><td>3</td></tr>
                                    <tr><td class="bluishbgnd">Respiration Rate</td><td class="lightredish"><=8</td><td class="lightorangeish"></td><td class="lightgreenish">9-11</td><td class="grey">12-20</td><td class="lightgreenish"></td><td class="lightorangeish">21-24</td><td class="lightredish">>=25</td></tr>
                                    <tr><td class="bluishbgnd">Oxygen Saturations</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                    <tr><td class="bluishbgnd">Temperature</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                    <tr><td class="bluishbgnd">Systolic BP</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                    <tr><td class="bluishbgnd">Heart Rate</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                </table>
                            </center>
                        </div>                            
                    </div>
                </div>
            </div>
            <div id="checkin" style="display:none">
                <div class="col-md-4" style="padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Mini-Consultation
                        </span>
                    </div>
                    <div style="margin-top:20px">
                        <table style="width:100%; font-size:12px" class="table table-striped table-bordered">
                            <tr style="background-color:#919191; color:#fff"><td></td><td>Hospital ID</td><td>Name</td><td>Wait Time</td><td></td><td></td></tr>
                            <tr><td>1</td><td>4523/D2</td><td>IBRAHIM Adetoun</td><td>12mins</td><td><i class="fa fa-male hmp"></i></td><td class="ptr" style="text-align:center"><span class="reset">Consult</span></td></tr>
                            <tr><td>2</td><td>4523/D2</td><td>ISAAC Omotayo</td><td>8mins</td><td><i class="fa fa-male priv"></i></td><td class="ptr" style="text-align:center"><span class="reset">Consult</span></td></tr>
                            <tr><td>3</td><td>4523/D2</td><td>Kunby Oluwatobi</td><td>2mins</td><td><i class="fa fa-male hmo"></i></td><td class="ptr" style="text-align:center"><span class="reset">Consult</span></td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-8" style="padding:0px">
                    <div style="padding-bottom:50px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                        <div style="margin:10px">
                            <span style="font-size:25px; display:block">Agbede Joseph Kayode</span>
                            <span class="vitalclient">Gender : Female</span>
                            <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
                            <span class="vitalclient">Age : 24yrs</span>
                            <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
                        </div>
                        <div style="padding-bottom:20px; text-align:center">
                            <span class="vitalsminimenu vitalsminimenusel" onclick="miniconsultmenu('#mcminv', '#miniinvestigation')" id="mcminv" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Investigation</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#mcmpr', '#miniprescription')" id="mcmpr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Prescription</span>
                        </div>
                        <div id="miniinvestigation" style="padding:10px">
                            <div class="col-md-4">
                                <span style="font-size:20px">Order the following tests</span>
                                <table class="table table-condensed table-bordered">
                                    <tr><td>1</td><td>Widal</td>
                                        <td>
                                            <select>
                                                <option>Reactive</option>
                                                <option>Non-reactive</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="button" value="Prescribe meds">
                                        </td>
                                    </tr>
                                    <tr><td>2</td><td>RDT</td><td><select>
                                                <option>Reactive</option>
                                                <option>Non-reactive</option>
                                            </select></td>
                                        <td>
                                            <input type="button" value="Prescribe meds">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-8">

                            </div>
                        </div>
                        <div id="miniprescription" style="display:none">
                            <div style="text-align:center">
                                <span style="background-color:#cccccc; min-width:360px; text-align:left;display:inline-block; padding:8px">
                                    <table>
                                        <tr>
                                            <td style="width:160px">Sore throat?</td>
                                            <td>
                                                <select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Ear discharge?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Stiff neck?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Bloody diarrhea</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Hematuria?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Skin rash?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Jaundice?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                    </table>
                                    <hr style="margin-top:5px; margin-bottom:5px; border-style:dashed; border-color:#E0E0E0">
                                    <table>
                                        <tr>
                                            <td style="width:160px">High fever?</td>
                                            <td>
                                                <select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td>Headache?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Nausea/ vomiting ?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Abdominal pain ?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Diarrhoea?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                        <tr><td>Loss of appetite?</td><td><select class="form-control">
                                                    <option>No</option>
                                                    <option>Yes</option>
                                                </select></td></tr>
                                    </table>
                                    <div style="margin-top:10px; margin-bottom:5px; text-align: center">
                                        <input type="button" value="Send to Doctor" class="btn login">
                                        <input type="reset" value="Mini-Consultation" class="btn reset">
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div id="newsreport" style="display:none">
                            <center>
                                <span style="font-size:25px">National Early Warning Score (NEWS)</span>
                                <div>

                                </div>
                                <table class="table table-bordered table-responsive" style="max-width:700px; text-align:center">
                                    <tr class="bluishbgnd" style="font-size:16px"><td style="max-width:60px">Physiological Parameters</td><td>3</td><td>2</td><td>1</td><td>0</td><td>1</td><td>2</td><td>3</td></tr>
                                    <tr><td class="bluishbgnd">Respiration Rate</td><td class="lightredish"><=8</td><td class="lightorangeish"></td><td class="lightgreenish">9-11</td><td class="grey">12-20</td><td class="lightgreenish"></td><td class="lightorangeish">21-24</td><td class="lightredish">>=25</td></tr>
                                    <tr><td class="bluishbgnd">Oxygen Saturations</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                    <tr><td class="bluishbgnd">Temperature</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                    <tr><td class="bluishbgnd">Systolic BP</td><td class="redish">3</td><td class="orangeish">2</td><td class="greenish">1</td><td class="lightgrey">0</td><td class="greenish">1</td><td class="orangeish">2</td><td class="redish">3</td></tr>
                                    <tr><td class="bluishbgnd">Heart Rate</td><td class="lightredish">3</td><td class="lightorangeish">2</td><td class="lightgreenish">1</td><td class="grey">0</td><td class="lightgreenish">1</td><td class="lightorangeish">2</td><td class="lightredish">3</td></tr>
                                </table>
                                <marquee>Low priority</marquee>
                            </center>
                        </div>
                        <div style="margin-top:20px; display:none">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal lodges here -->
        <!-- Modal lodges here -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#525252; color:#cccccc">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id='modReportFDtitle'>Modal Header</h4>
                    </div>
                    <div class="modal-body" id='modReportFDBody' style="background-color:#CCCCCC">
                        <p>Some text in the modal.</p>
                    </div>
                    <!--
                  <div class="modal-footer" style="background-color:#8F4A94">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>-->
                </div>

            </div>
        </div>
    </body>
</html>
<script>
    setInterval(function () {
        pullvsqueue(vsqueuetype);
        waittimechecks();
        pullaveragewaittime();
    }, 5000);
</script>