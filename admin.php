<!DOCTYPE html>
<?php
include 'partials/connect.php';
include 'sendmail.php';
include "confirm_indexing.php";
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
                <li class="okk" id='checkinm' onclick="changemenu('#checkinm', '#checkin')">
                    <i class="fa fa-sitemap" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Module Mgt</span>
                </li>
                <li class="okk" id='usermgtm' onclick="changemenu('#usermgtm', '#usermgt')">
                    <i class="fa fa-users" style="font-size:25px"></i><br>
                    <span style="font-size:12px">User Mgt</span>
                </li>
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-newspaper-o" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Reports</span>
                </li>
                <li class="okk" id='reminderm' onclick="changemenu('#reminderm', '#reminder')">
                    <i class="fa fa-bullhorn" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Announcement</span>
                </li>
                <script>
                    function changemenu(a, b) {
                        $("#dashboard").hide();
                        $("#registration").hide();
                        $("#reminder").hide();
                        $("#checkin").hide();
                        $("#usermgt").hide();
                        $(".okk").removeClass("okks");
                        $(a).addClass("okks");
                        $(b).show();
                    }
                </script>
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
                                <!--<span style='font-size:14px; color:#525252'>
                                <?php getfdpercentusage($staffid) ?>
                                </span>-->
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
                        <div class="col-md-2 briefstyle" id="brief" style="height:100% !important">
                            <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                                <div style="font-weight:600; color:#8F4A94; margin-bottom:10px">Return Rate</div>
                                <div style="background-color:#BFC9E3; padding:10px">

                                    <?php
                                    echo "<div style='text-align:center'><span style='color:#515151; font-size:11px; padding:5px; border-radius:4px;'>$todaydate2weeksoff to $todaydate</span></div>";
                                    $qa = mysqli_query($w, "select * from checkinlog where dateadded between '$todaydate2weeksoff' and '$todaydate'");
                                    $countd = mysqli_num_rows($qa);

                                    $qb = "select distinct(hospitalid) from checkinlog where checkindate between '$todaydate2weeksoff' and '$todaydate'";
                                    $q = mysqli_query($w, $qb);
                                    $jq = mysqli_num_rows($q);
                                    $distinctvisits = $jq;
                                    $count = 0;
                                    $returnvisits = 0;
                                    $displayv = "";
                                    $visitdate = "";

                                    while ($hqa = mysqli_fetch_array($q)) {
                                        $hospitalid = $hqa['hospitalid'];
                                        //Get number of times client visited
                                        $hqh = mysqli_query($w, "select * from checkinlog where hospitalid='$hospitalid' and checkindate between '$todaydate2weeksoff' and '$todaydate'");
                                        $mq = mysqli_fetch_array($hqh);
                                        //getclienttypefromvisitid
                                        $visitid = $mq['visitid'];
                                        $patienttype = getclienttypefromvisitid($visitid);
                                        $visittimes = mysqli_num_rows($hqh);
                                        if ($visittimes > 1) {
                                            //Get visit times
                                            $count++;
                                        }
                                    }
                                    $tod = datenow();
                                    $fg = round((($count / $countd) * 100), 2) . "%";
                                    $display = "<div style='padding:0px'><div style='text-align:center'><span style='font-size:20px; font-weight:500; line-height:60'></span>"
                                            . "<div style='text-align:left'><span style='font-size:25px'>$countd</span> total visits "
                                            . "<br><span style='font-size:25px'>$jq</span> unique visits."
                                            . "<br><span style='font-size:25px'>$count</span> revisits</div></div><br>";
                                    echo "<div style='text-align:center'><span style='background-color:#515151; display:inline-block; color:#cccccc; padding:2px; border-radius:4px'>rr <span style='font-size:30px'>$fg</span></span>" . $display . "</div>"
                                    . "</div>";

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
                                        $jq = mysqli_query($w, "select * from checkinlog where staffid='$staffid'");
                                        $usa .= mysqli_num_rows($jq) . ",";
                                        return $usa;
                                    }

                                    //getfdstaff();
                                    function pullusage() {
                                        echo $usagecount;
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 briefstyle" id="brief" style="height:100% !important">
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
                                <canvas id="myChartd" width="400" height="120"></canvas>
                                <script>
                                    var ctx = document.getElementById("myChartd").getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'horizontalBar',
                                        data: {
                                            labels: ["Company", "HMO", "NHIS", "Private"],
                                            datasets: [{
                                                    label: 'Patient count',
                                                    data: [<?php getregcount(); ?>],
                                                    backgroundColor: [
                                                        '#7A7A7A',
                                                        '#7A7A7A',
                                                        '#7A7A7A',
                                                        '#7A7A7A'
                                                    ],
                                                    borderColor: [
                                                        '#525252',
                                                        '#525252',
                                                        '#525252',
                                                        '#525252'
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
                        </div>
                        <div class="col-md-3 briefstyle" id="brief" style="height:100% !important">
                            <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                                <div style="font-weight:600; color:#8F4A94">Announcements</div>
                                <?php
                                $today = date('Y-m-d');
                                $qj = "select * from announcements where publishstatus='2' and '$today' between startdate and enddate";
                                $jq = mysqli_query($w, $qj);
                                $num = mysqli_num_rows($jq);
                                echo $num;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- I cut an item away from here.. if there is an error I will be putting it back -->
            </div>
            <div id="reminder" style="display:none">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Announcement Management
                        </span>
                    </div>
                    <div class="signup" id="demographicq">
                        <label>Message</label>
                        <textarea class="form-control" noresizes id="annMessage"></textarea>
                        <label>Target department</label>
                        <select class="form-control" id="annTarget">
                            <option>All</option>
                            <?php
                            $j = mysqli_query($w, "select * from staff_category order by categoryname asc");
                            while ($jqx = mysqli_fetch_array($j)) {
                                $id = $jqx['staff_categoryid'];
                                $name = $jqx['categoryname'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                        <label>Start date</label>
                        <input type="date" class="form-control" id="annStart">
                        <label>End date</label>
                        <input type="date" class="form-control" id="annEnd">
                        <label>Publish status</label>
                        <select class="form-control" id="annPublish">
                            <option value="1">Save</option>
                            <option value="2">Save and publish</option>
                        </select>
                        <script>
                            function execAnn() {
                                var msg = document.getElementById("annMessage").value;
                                var dept = document.getElementById("annTarget").value;
                                var start = document.getElementById("annStart").value;
                                var end = document.getElementById("annEnd").value;
                                var pubstatus = document.getElementById("annPublish").value;
                                var action = "saveann";
                                $.post("partials/adminmodule.php", {action: action, msg: msg, dept: dept, start: start, end: end, stat: pubstatus}).done(function (data) {
                                    alert(data);
                                });
                            }
                        </script>
                        <input type="button" class="btn btn-success" value="Make announcement" onclick="execAnn()" style="margin-top:5px"><input type="button" class="btn btn-warning" value="Reset input" onclick="execAnn()" style="margin-top:5px; margin-left:5px">
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
                        <script>
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
                                // alert(a + " " + b);
                                var action = "recrudescence";
                                $.post("partials/adminreport.php", {action: action, datefrom: a, dateto: b}).done(function (data) {
                                    //alert(data);
                                    _v("adminreportss").innerHTML = data;
                                });
                                //recrud();
                            }
                        </script>
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
                            <script>
                                function pullsummary(a) {
                                    _v("summName").innerHTML = _v("summNamesel").innerHTML;
                                    var visitid = a;
                                    action = "pullsummary";
                                    $.post("partials/adminmodule.php", {visitid: visitid, action: action}).done(function (data) {
                                        _v("patientsummaryth").innerHTML = data;
                                    });
                                }
                            </script>
                            <div style="background-color:rgba(255,255,255,0.2); padding:10px; margin-top:10px; max-height:600px; overflow-y:auto" id="vsservervomit">
                            </div>
                            <script>

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


                            </script>
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
                            <script>
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
                            </script>
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
                        <div style="padding:5px; background-color:#D4D4D4; text-align:center; font-size:20px; font-weight:500"  id="checkindets">
                            <span>Your announcements</span>
                        </div>
                        <div style="margin-top:5px; padding:5px; background-color:rgba(255,255,255,0.9); margin-bottom:10px" id="annreports">
                            <?php

                            function getdeptname($id) {
                                global $w;
                                $kq = mysqli_query($w, "select * from staff_category where staff_categoryid='$id'");
                                $n = mysqli_fetch_array($kq);
                                return $n['categoryname'];
                            }

                            $k = mysqli_query($w, "select * from announcements where author='$staffid' order by dateadded desc");
                            $count = 1;
                            while ($l = mysqli_fetch_array($k)) {
                                $annid = $l['annid'];
                                $message = $l['message'];
                                $dept = $l['targetdept'];
                                $start = $l['startdate'];
                                $end = $l['enddate'];
                                $pub = $l['publishstatus'];
                                if ($pub === "2") {
                                    $publish = "Published";
                                    $inPublish = "Unpublish";
                                    $bgcolor = "; background-color:#515151; color:#fff";
                                    $bdc = "#515151;";
                                    $pubstat = "0";
                                } else {
                                    $publish = "Unpublished";
                                    $inPublish = "Publish";
                                    $bgcolor = "; background-color:#930947; color:#fff";
                                    $bdc = "#930947";
                                    $pubstat = "1";
                                }

                                if ($dept !== "All") {
                                    $dept = getdeptname($dept);
                                }

                                echo "<div class='col-md-12' style='padding:0px; margin-top:10px;'>"
                                . "<div class='col-md-2' style='display:inline-block$bgcolor; padding:15px; text-align:center; font-size:12px; font-weight:500'>$publish</div>"
                                . "<div class='col-md-10' style='display:inline-block; border-left-color:$bdc; border-left-style:solid; border-width:thin; background-color:rgba(255,255,255,0.6); position:relative; padding:10px'><div style='text-align:left; color:#8F4A94'><span id='mess$count'>$message</span><hr style='border-style:dashed; border-color:#cccccc; margin-top:10px; padding:0px; margin-bottom:10px'><div style='text-align:left; font-size:11px'><span style='position:absolute; right:5px; bottom:0px'> $start - $end < $dept > <span style='cursor:pointer; color:#8F4A94; font-weight:600' data-target='#myModal' data-toggle='modal' onclick='publ(\"$pubstat\",\"$annid\",\"mess$count\")'>$inPublish</span> <!--| <span style='cursor:pointer; color:red' data-target='#myModal' data-toggle='modal'>Delete</span>--></span></div></div></div></div>";
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                    <script>
                        function publ(pubinstr, annid, message) {
                            _v("modaltitle").innerHTML = "Update announcement";
                            var message = _v(message).innerHTML;
                            if (pubinstr === "1") {
                                _v("modalbody").innerHTML = message;
                                _v("modalactionbutton").innerHTML = "<div style='text-align:center'><span class='btn btn-warning' onclick='publish(\"1\",\"" + annid + "\")'>Publish Announcement</span></div>";
                            } else {
                                _v("modalbody").innerHTML = message;
                                _v("modalactionbutton").innerHTML = "<div style='text-align:center'><span class='btn btn-warning' onclick='publish(\"0\",\"" + annid + "\")'>Unpublish Announcement</span></div>";
                            }
                        }

                        function publish(a, b) {
                        var action="annsetting";
                            $.post("partials/adminmodule.php",{action:action, pubstat:a, annid:b}).done(function(data){
                                alert(data);
                            });
                        }
                    </script>
                </div>
            </div>
            <div id="registration" style="display:none">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Reports
                        </span>
                    </div>
                    <script>
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
                    </script>
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
                        <script>
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
                        </script>
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
                        <script>
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
                                // alert(a + " " + b);
                                var action = "recrudescence";
                                $.post("partials/adminreport.php", {action: action, datefrom: a, dateto: b}).done(function (data) {
                                    //alert(data);
                                    _v("adminreportss").innerHTML = data;
                                });
                                //recrud();
                            }
                        </script>
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
                            <script>
                                function pullsummary(a) {
                                    _v("summName").innerHTML = _v("summNamesel").innerHTML;
                                    var visitid = a;
                                    action = "pullsummary";
                                    $.post("partials/adminmodule.php", {visitid: visitid, action: action}).done(function (data) {
                                        _v("patientsummaryth").innerHTML = data;
                                    });
                                }
                            </script>
                            <div style="background-color:rgba(255,255,255,0.2); padding:10px; margin-top:10px; max-height:600px; overflow-y:auto" id="vsservervomit">
                            </div>
                            <script>

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


                            </script>
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
                            <script>
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
                            </script>
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
                        <script>
                            $("#printrrstuff").click(function () {
                                $("#printarea").print();
                            });
                        </script>
                        <div style="padding:5px; background-color:#D4D4D4"  id="checkindets">
                            <span id="printrrstuff">Print</span>
                        </div>
                        <div style="margin-top:5px; padding:5px; background-color:rgba(255,255,255,9)" id="adminreportss">

                        </div>
                    </div>

                </div>
            </div>
            <div id="usermgt" style="display:none">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            User Management
                        </span>
                    </div>
                    <script>
                        function triagemenu(a, b) {
                            $("#demographic").hide();
                            $("#newsreport").hide();
                            $(b).show();
                            $(".vitalsminimenu").removeClass("vitalsminimenusel");
                            $(a).addClass("vitalsminimenusel");
                        }

                    </script>
                    <div style="padding-bottom:8px; text-align:center; margin-top:10px">
                        <span class="vitalsminimenu vitalsminimenusel" onclick="triagemenu('#vsf', '#demographic')" id="vsf" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">New registration</span>
                        <span class="vitalsminimenu" onclick="triagemenu('#nr', '#newsreport')" id="nr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Update Details</span>
                    </div>
                    <div class="signup" id="demographic">
                        <label class="imp">
                            First Name
                        </label>
                        <input type="text" class="form-control" id="nrfirstname">
                        <label class="imp">
                            Last Name
                        </label>
                        <input type="text" class="form-control" id="nrlastname">
                        <label class="imp">
                            Date of birth
                        </label>
                        <input type="date" class="form-control" id="nrdateofbirth">
                        <label class="imp">
                            Marital Status
                        </label>
                        <select class="form-control"  id="nrmaritalstatus">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                        </select>
                        <label class="imp">
                            Gender
                        </label>
                        <select class="form-control"  id="nrgender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <label class="imp">
                            Phone Number
                        </label>
                        <input type="number" class="form-control" id="nrphonenumber">
                        <label class="imp">
                            Role
                        </label>
                        <select class="form-control" id="nrrole">
                            <?php
                            $t = "select * from staff_category order by categoryname asc";
                            $h = mysqli_query($w, $t);
                            while ($g = mysqli_fetch_array($h)) {
                                $catname = $g['categoryname'];
                                $staffcat = $g['staff_categoryid'];
                                echo "<option value='$staffcat'>$catname</option>";
                            }
                            ?>
                        </select>
                        <div style="background-color:#BFC9E3; border-style:solid; border-width:thin; border-color:rgba(0,0,0,0.2); border-radius:4px; padding:5px; margin-top:5px">
                            <label class="imp">
                                Username
                            </label>
                            <input type="text" class="form-control" id="nrusername">
                            <label class="imp">
                                Password
                            </label>
                            <input type="password" class="form-control" id="nrpassword">
                        </div>
                        <div style="margin-top:10px">
                            <input type="button" value="Add Staff" class="btn reset" onclick="addstaff()">
                            <input type="reset" value="Reset form" class="btn login">
                        </div>
                    </div>  

                    <div id="newsreport" style="display:none">
                        <div style="margin-top:0px; padding:5px; position:relative; background-color:#D4D4D4">
                            <i class="fa fa-address-book-o" style="font-size:44px; color:#E1E1E1"></i>
                            <span style="font-size:20px; margin-left:10px">Update </span>
                            <table class="table table-bordered table-striped" style="padding:2px;margin-top:10px; font-size:12px; width:100%">
                                <tr style="background-color: #919191; color:#E1E1E1; font-weight:500">
                                    <td>Staff Name</td><td>Role</td><td>Date added</td><td></td>
                                </tr>
                                <tr class="ptr thov">
                                    <?php
                                    $bg = "select staff.firstname, staff.lastname, staff.dateadded, staff.dateofbirth, staff.phonenumber, staff.maritalstatus, staff.gender, staff.username, staff.password, "
                                            . "staff.role, staff_category.categoryname from staff inner join staff_category on staff.role = staff_category.staff_categoryid order by staff.lastname asc";
                                    $b = mysqli_query($w, $bg);
                                    if (!$b) {
                                        echo "Bad query";
                                    }
                                    if (mysqli_num_rows($b) < 1) {
                                        echo "<tr style='background-color:rgba(0,0,0,0.1)'><td colspan='8' style='text-align:center; color:#fff'>No staff</td></tr>";
                                    }
                                    $count = 1;
                                    while ($xd = mysqli_fetch_array($b)) {
                                        $name = strtoupper($xd['lastname']) . " " . $xd['firstname'];
                                        $dob = $xd['dateofbirth'];
                                        $gender = $xd['gender'];
                                        $phonenumber = $xd['phonenumber'];
                                        $username = $xd['username'];
                                        $role = $xd['categoryname'];
                                        $dateadded = $xd['dateadded'];
                                        echo "<tr><td>$name</td><td>$role</td><td>$dateadded</td><td><i class='fa fa-reply-all green ptr'></i></td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </tr>
                            </table>
                            <script>

                                function requestdelete(a) {
                                    alert(a);
                                }


                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 briefstyle" id="brief" style="height:100% !important">
                    <div style="padding:5px; background-color:#D4D4D4"  id="checkindets">

                    </div>

                    <div style="margin-top:5px; padding:5px; position:relative; background-color:#BCBCBC">
                        <div>
                            <span style="cursor:pointer; padding:3px; border-color:rgba(255,255,255,0.3); border-style:solid; border-width:thin; background-color:rgba(255,255,255,0.2)" onclick="loadstaff()">Refresh table</span>
                        </div>
                        <table class="table table-bordered table-striped" style="padding:2px;margin-top:10px; font-size:12px; width:100%">
                            <tr style="background-color: #BFC9E3; font-weight:600">
                                <td></td><td>Staff Name</td><td>Gender</td><td>Phone number</td><td>Username</td><td>Role</td><td colspan="3">DOB</td>
                            </tr>
                            <tbody id="stafftable">
                                <?php
                                $bg = "select staff.firstname, staff.lastname, staff.dateofbirth, staff.phonenumber, staff.maritalstatus, staff.gender, staff.username, staff.password, "
                                        . "staff.role, staff_category.categoryname from staff inner join staff_category on staff.role = staff_category.staff_categoryid order by staff.lastname asc";
                                $b = mysqli_query($w, $bg);
                                if (!$b) {
                                    echo "Bad query";
                                }
                                if (mysqli_num_rows($b) < 1) {
                                    echo "<tr style='background-color:rgba(0,0,0,0.1)'><td colspan='8' style='text-align:center; color:#fff'>No staff</td></tr>";
                                }
                                $count = 1;
                                while ($xd = mysqli_fetch_array($b)) {
                                    $name = strtoupper($xd['lastname']) . " " . $xd['firstname'];
                                    $dob = $xd['dateofbirth'];
                                    $gender = $xd['gender'];
                                    $phonenumber = $xd['phonenumber'];
                                    $username = $xd['username'];
                                    $role = $xd['categoryname'];
                                    echo "<tr><td>$count</td><td>$name</td><td>$gender</td><td>$phonenumber</td><td>$username</td><td>$role</td><td>$dob</td><td><i class='fa fa-times red ptr'></i></td><td><i class='fa fa-reply-all green ptr' title='update information'></i></td></tr>";
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="checkin" style="display:none">
                <div class="col-md-3" style="padding-top:20px">
                    <div style="font-size:30px; color:#8F4A94; margin-bottom:20px">Modules</div>
                    <!--
                    <div class="module" onclick="tmodule('front_desk')">
                        <i class="fa fa-users" style="font-size:20px"></i>
                        <span>Front Desk</span>
                    </div>
                    <span class="module" onclick="tmodule('triage')">
                        <i class="fa fa-stethoscope" style="font-size:20px"></i>
                        <span>Triage</span>
                    </span>
                    <span class="module" onclick="tmodule('consultation')">
                        <i class="fa fa-user-md" style="font-size:20px"></i>
                        <span>Consultation</span>
                    </span>-->
                    <span class="module" onclick="tmodule('pharmacy')">
                        <i class="fa fa-eercast" style="font-size:20px"></i>
                        <span>Pharmacy</span>
                    </span>
                    <span class="module" onclick="tmodule('investigation')">
                        <i class="fa fa-flask" style="font-size:20px"></i>
                        <span>Laboratory</span>
                    </span>
                    <span class="module" onclick="tmodule('billing')">
                        <i class="fa fa-money" style="font-size:20px"></i>
                        <span>Billing</span>
                    </span>
                </div>
                <script>
                    function tmodule(a) {
                        _v("selmodule").innerHTML = a;
                        $("#front_desk").hide();
                        $("#briage").hide();
                        $("#consultation").hide();
                        $("#pharmacy").hide();
                        $("#investigation").hide();
                        $("#billing").hide();
                        var fd = "#" + a;
                        $(fd).show();
                    }
                </script>
                <div class="col-md-9" style="background-color:rgba(0,0,0,0.1); min-height:500px">
                    <div id="selmodule"></div>
                    <!-- Investigation module -->
                    <div id="investigation">
                        <span class="horlist" onclick="checksub('inv')" id="inv">Investigations</span>
                        <span class="horlist" onclick="checksub('invcat')" id="invcat">BI_Investigation</span>
                        <span class="horlist" onclick="checksub('invddoption')" id="invddoption">DD_options</span>
                        <hr style="border-color:rgba(255,255,255,0.2); border-style:dashed; margin-top:0px">
                        <script>
                            function checksub(a) {
                                var s = "#" + a + "s";
                                $("#invcats").hide();
                                $("#invs").hide();
                                $("#invddoptions").hide();

                                $(s).show();
                            }

                            function saveinv() {
                                //invname.value, privprice.value, corpprice.value, invcate.value, labunit.value
                                var invname = _v("invname").value;
                                var privprice = _v("privprice").value;
                                var corpprice = _v("corpprice").value;
                                var invcate = _v("invcate").value;
                                var labunit = _v("labunit").value;
                                alert(invname);
                                if (invname.length < 1) {
                                    alert("Investigation and rate needs to be added");
                                    return;
                                }
                                var lbresult = _v("lbresult").value;
                                var ubresult = _v("upresult").value;
                                var resulttype = _v("rslttype").value;
                                var invcate = _v("invcate").value;
                                var action = "saveinvestigation";

                                $.post("partials/adminmodule.php", {action: action, investigation: invname, invcat: invcate, private: privprice, corporate: corpprice, labunit: labunit, lbresult: lbresult, ubresult: ubresult, resulttype: resulttype, invcate: invcate}).done(function (data) {
                                    alert(data);
                                });
                                getadmininv();
                            }

                            function getadmininv() {
                                var action = "pullinvestigation";
                                $.post("partials/adminmodule.php", {action: action}).done(function (data) {
                                    _v("admininvestigations").innerHTML = data;
                                });
                            }

                            function hideshowboundary() {
                                if (document.getElementById("addluboundary").checked) {
                                    $("#lubdisplay").show();
                                } else {
                                    $("#lubdisplay").hide();
                                    _v("lbresult").value = "";
                                    _v("upresult").value = "";
                                }
                            }

                            function saveoption(a, b) {
                                var action = "saveoption";
                                $.post("partials/investigationreq.php", {action: action, invid: a, invopt: b}).done(function (data) {
                                    alert(data);
                                });
                            }

                            function savebinv(a, b) {
                                var binvcat = a;
                                var binv = b;
                                var action = "saveBI";
                                $.post("partials/investigationreq.php", {action: action, binvcat: binvcat, binv: binv}).done(function (data) {
                                    alert(data);
                                });
                            }
                        </script>
                        <div id="invcats" style="display:none">
                            <div class="col-md-12">
                                Bundled Investigation Options
                            </div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">

                                <label>Category</label>
                                <select class="form-control" id="binvcat">
                                    <?php
                                    $tqa = "select * from investigation_name where investigation_cat = 'BI'";
                                    $xw = mysqli_query($w, $tqa);
                                    while ($xwq = mysqli_fetch_array($xw)) {
                                        $investid = $xwq['investigation_nameid'];
                                        $name = $xwq['name'];
                                        echo "<option value='$investid'>$name</option>";
                                    }
                                    ?>
                                </select>
                                <label>Investigation name</label>
                                <select class="form-control" id="binv" size="15">
                                    <?php
                                    $tqa = "select * from investigation_name where investigation_cat != 'BI' order by name asc";
                                    $xw = mysqli_query($w, $tqa);
                                    while ($xwq = mysqli_fetch_array($xw)) {
                                        $investid = $xwq['investigation_nameid'];
                                        $name = $xwq['name'];
                                        echo "<option value='$investid'>$name</option>";
                                    }
                                    ?>
                                </select>
                                <input type="button" value="Save to bundle" class="btn btn-success" style="margin-top:10px; width:100%" onclick="savebinv(binvcat.value, binv.value)">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Investigation bundle</td><td colspan="2">Investigation(s)</td></tr>
                                    <tbody id="admininvestigations">
                                        <?php
                                        $v = "select * from investigation_bi";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        if (mysqli_num_rows($q) < 1) {
                                            echo "<tr><td colspan='5' style='text-align:center; color:red'>There are no records to show</td></tr>";
                                        }
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['investigation_BI'];
                                            $investigationbi = $d['investigationbi_id'];
                                            $investigationsai = $d['investigationsai_id'];

                                            $gq = mysqli_query($w, "select name from investigation_name where investigation_nameid = '$investigationbi'");
                                            $tq = mysqli_fetch_array($gq);
                                            $biname = $tq['name'];

                                            $gb = mysqli_query($w, "select name from investigation_name where investigation_nameid = '$investigationsai'");
                                            $tb = mysqli_fetch_array($gb);
                                            $sainame = $tb['name'];

                                            echo "<tr><td>$count</td><td>$biname</td><td> $sainame</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deletebi(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                        <div id="invs">
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>Investigation name</label>
                                <input type="text" id="invname" class="form-control">
                                <label>Category</label>
                                <select class="form-control" id="invcate">
                                    <option value="SAI">Stand-Alone</option>
                                    <option value="BI">Bundled</option>
                                </select>
                                <label>Private price (<?php echo $currency ?>)</label>
                                <input type="number" id="privprice" class="form-control">
                                <label>Corporate price (<?php echo $currency ?>)</label>
                                <input type="number" id="corpprice" class="form-control" style="margin-bottom:6px">
                                <input type="checkbox" id="addluboundary" onclick="hideshowboundary()"> <span>Lower/Upper boundary</span>
                                <div id="lubdisplay" style="display:none">
                                    <label>Result lower boundary</label>
                                    <input type="number" id="lbresult" class="form-control">
                                    <label>Result upper boundary</label>
                                    <input type="number" id="upresult" class="form-control">
                                </div>
                                <label>Result type</label>
                                <select class="form-control" id="rslttype">
                                    <option>Free text</option>
                                    <option>Optioned</option>
                                </select>
                                <label>Unit</label>
                                <input type="text" id="labunit" class="form-control" placeholder="mmol/l">
                                <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="saveinv()">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Investigation</td><td>Private</td><td colspan="2">Corporate</td></tr>
                                    <tbody id="admininvestigations">
                                        <?php
                                        $v = "select * from investigation_name order by name asc";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['investigation_nameid'];
                                            $name = $d['name'];
                                            $private = $d['private'];
                                            $corporate = $d['corporate'];
                                            echo "<tr><td>$count</td><td>$name</td><td>&#8358; " . $private . "</td><td>&#8358; " . $corporate . "</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deleteinvestigation(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                        <div id="invddoptions" style="display:none">
                            <div>
                                Bundled Option
                            </div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>Investigation</label>
                                <select class="form-control" id="BOInv">
                                    <?php
                                    $gz = "select * from investigation_name where rslttype='Optioned'";
                                    $mt = mysqli_query($w, $gz);
                                    while ($zq = mysqli_fetch_array($mt)) {
                                        $id = $zq['investigation_nameid'];
                                        $name = $zq['name'];
                                        echo "<option value='$id'>$name</option>";
                                    }
                                    ?>
                                </select>
                                <label>Result Option</label>
                                <input type="text" class="form-control" id="BORO">
                                <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="saveoption(BOInv.value, BORO.value)">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Investigation</td><td colspan="2">Option</td></tr>
                                    <tbody id="admininvestigations">
                                        <?php
                                        $v = "select investigation_name.investigation_nameid, investigation_name.name, investigation_dd.ddvalue from investigation_dd inner join investigation_name on investigation_dd.investigationid = investigation_name.investigation_nameid";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['investigation_nameid'];
                                            $name = $d['name'];
                                            $option = $d['ddvalue'];
                                            echo "<tr><td>$count</td><td>$name</td><td style='text-align:center'>$option </td><td><i class='fa fa-times red ptr' onclick='deleteinvestigation(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!-- Pharmacy module -->
                    <div id="pharmacy">

                        <span class="horlist" onclick="checksubdrg('drgcat')" id="inv">Drug categories</span>
                        <span class="horlist" onclick="checksubdrg('drgdrug')" id="invcat">Drugs</span>
                        <span class="horlist" onclick="checksubdrg('drgrate')" id="invddoption">HMO/Corporate rates</span>
                        <hr style="border-color:rgba(255,255,255,0.2); border-style:dashed; margin-top:0px">
                        <script>
                            function checksubdrg(a) {
                                var s = "#" + a + "s";
                                $("#drgcats").hide();
                                $("#drgdrugs").hide();
                                $("#drgrates").hide();
                                $("#diagcats").hide();

                                $(s).show();
                            }

                            function saveinv() {
                                //invname.value, privprice.value, corpprice.value, invcate.value, labunit.value
                                var invname = _v("invname").value;
                                var privprice = _v("privprice").value;
                                var corpprice = _v("corpprice").value;
                                var invcate = _v("invcate").value;
                                var labunit = _v("labunit").value;
                                alert(invname);
                                if (invname.length < 1) {
                                    alert("Investigation and rate needs to be added");
                                    return;
                                }
                                var lbresult = _v("lbresult").value;
                                var ubresult = _v("upresult").value;
                                var resulttype = _v("rslttype").value;
                                var invcate = _v("invcate").value;
                                var action = "saveinvestigation";

                                $.post("partials/adminmodule.php", {action: action, investigation: invname, invcat: invcate, private: privprice, corporate: corpprice, labunit: labunit, lbresult: lbresult, ubresult: ubresult, resulttype: resulttype, invcate: invcate}).done(function (data) {
                                    alert(data);
                                });
                                getadmininv();
                            }

                            function getadmininv() {
                                var action = "pullinvestigation";
                                $.post("partials/adminmodule.php", {action: action}).done(function (data) {
                                    _v("admininvestigations").innerHTML = data;
                                });
                            }

                            function hideshowboundary() {
                                if (document.getElementById("addluboundary").checked) {
                                    $("#lubdisplay").show();
                                } else {
                                    $("#lubdisplay").hide();
                                    _v("lbresult").value = "";
                                    _v("upresult").value = "";
                                }
                            }

                            function saveoption(a, b) {
                                var action = "saveoption";
                                $.post("partials/investigationreq.php", {action: action, invid: a, invopt: b}).done(function (data) {
                                    alert(data);
                                });
                            }

                            function savedrugcat(a) {
                                var drgcat = a;
                                var action = "saveDRGcat";
                                $.post("partials/pharmacy.php", {action: action, drgcat: drgcat}).done(function (data) {
                                    alert(data);
                                });
                            }
                        </script>
                        <div id="drgcats" style="display:none">
                            <div class="col-md-12">
                                Drug categories here
                            </div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">

                                <label>Category</label>
                                <input type="text" id="drgcat" class="form-control" placeholder="e.g Anti-Malarial">

                                <input type="button" value="Save drug category" class="btn btn-success" style="margin-top:10px; width:100%" onclick="savedrugcat(drgcat.value)">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Drug category</td><td>Drug count</td><td></td></tr>
                                    <tbody id="drugcategorieslist">
                                        <?php
                                        $v = "select * from pharmacy_drugcategory";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        if (mysqli_num_rows($q) < 1) {
                                            echo "<tr><td colspan='5' style='text-align:center; color:red'>There are no records to show</td></tr>";
                                        }
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['pharmacy_drugcategoryid'];
                                            $drugcategory = $d['drugcategory'];

                                            echo "<tr><td>$count</td><td>$drugcategory</td><td>23</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deletedrgi(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>

                        <div id="drgdrugs">
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>Category</label>
                                <select class="form-control" id="pcat">
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
                                <form>
                                    <label>Brand name</label>
                                    <input type="text" id="pbname" class="form-control">
                                    <label>Generic name</label>
                                    <input type="text" id="pgname" class="form-control">
                                    <label>Private price (<?php echo $currency ?>)</label>
                                    <input type="number" id="pprivprice" class="form-control">
                                    <label>Corporate price (<?php echo $currency ?>)</label>
                                    <input type="number" id="pcorpprice" class="form-control" style="margin-bottom:6px">
                                    <label>Stock count</label>
                                    <input type="number" id="pcount" class="form-control" style="margin-bottom:6px">
                                    <label>Re-Order level</label>
                                    <input type="number" id="prlevel" class="form-control">
                                    <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="savedrug()"><input type="reset" value="Reset" class="btn login" style="margin-top:10px">
                                </form>
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <div style="text-align:right"><span style="cursor:pointer" onclick="pulldrugs()">Refresh table</span></div>
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Drug</td><td>Stock level</td><td>Re-order level</td><td>Private</td><td>Corporate</td><td></td></tr>
                                    <tbody id="drugsdisplay">
                                        <?php
                                        $v = "select * from pharmacy_drugs order by brandname asc";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['pharma_drugsid'];
                                            $drugname = $d['brandname'] . " " . $d['genericname'];
                                            $stockcount = $d['stockcount'];
                                            $reorderlevel = $d['reorderlevel'];
                                            $private = $d['private'];
                                            $corporate = $d['corporate'];
                                            echo "<tr><td>$count</td><td>$drugname</td><td>$stockcount</td><td>$reorderlevel</td><td>&#8358; " . $private . "</td><td>&#8358; " . $corporate . "</td><td style='text-align:center'><span style='font-size:11px'>Delete</span> - <span style='font-size:11px'>Update</span></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>

                        <div id="drgrates" style="display:none">
                            <div>
                                Drug HMO/Corporate rates
                            </div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>Investigation</label>
                                <select class="form-control" id="BOInv">
                                    <?php
                                    $gz = "select * from investigation_name where rslttype='Optioned'";
                                    $mt = mysqli_query($w, $gz);
                                    while ($zq = mysqli_fetch_array($mt)) {
                                        $id = $zq['investigation_nameid'];
                                        $name = $zq['name'];
                                        echo "<option value='$id'>$name</option>";
                                    }
                                    ?>
                                </select>
                                <label>Result Option</label>
                                <input type="text" class="form-control" id="BOROs">
                                <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="saveoption(BOInv.value, BOROs.value)">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Investigation</td><td colspan="2">Option</td></tr>
                                    <tbody id="admininvestigations">
                                        <?php
                                        $v = "select investigation_name.investigation_nameid, investigation_name.name, investigation_dd.ddvalue from investigation_dd inner join investigation_name on investigation_dd.investigationid = investigation_name.investigation_nameid";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['investigation_nameid'];
                                            $name = $d['name'];
                                            $option = $d['ddvalue'];
                                            echo "<tr><td>$count</td><td>$name</td><td style='text-align:center'>$option </td><td><i class='fa fa-times red ptr' onclick='deleteinvestigation(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                    </div>
                    <!-- Billing module -->
                    <div id="billing">
                        <span class="horlist" onclick="checksubs('#clientcat')" id="clc">Client category</span>
                        <span class="horlist" onclick="checksubs('#client')" id="cl">Client</span>
                        <span class="horlist" onclick="checksubs('#clientplan')" id="clp">Client plan</span>
                        <span class="horlist" onclick="checksubs('#servicecharge')" id="sac">Service and Charge</span>
                        <hr style="border-color:rgba(255,255,255,0.2); border-style:dashed; margin-top:0px">
                        <script>
                            function checksubs(a) {
                                $("#clientcat").hide();
                                $("#client").hide();
                                $("#clientplan").hide();
                                $("#servicecharge").hide();

                                $(a).show();
                            }

                            function savebillcategory(a, b) {
                                var catname = a;
                                var catdesc = b;

                                $.post("").done();
                            }

                            function saveclient(a, b) {
                                var clienttype = a;
                                var clientname = b;
                                var action = "saveclient";
                                $.post("partials/clientbilling.php", {action: action, clienttype: clienttype, clientname: clientname}).done(function (data) {
                                    alert(data);
                                });
                            }

                        </script>
                        <div id="clientcat" style="display:none">
                            <div style="font-size:25px">Client Categories</div>
                            <div id="invs">
                                <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                    <label>Category name</label>
                                    <input type="text" id="billcatname" class="form-control">
                                    <label>Description</label>
                                    <input type="text" id="billcatdesc" class="form-control">
                                    <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="savebillcategory(billcatname.value, billcatdesc.value)">
                                </span>
                                <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                    <table class="table table-condensed table-striped table-bordered">
                                        <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Client</td><td>Description</td><td colspan="2">Date added</td></tr>
                                        <tbody id="admininvestigations">
                                            <?php
                                            $v = "select * from billingcategory order by name asc";
                                            $q = mysqli_query($w, $v);
                                            $count = 1;
                                            while ($d = mysqli_fetch_array($q)) {
                                                $id = $d['categoryid'];
                                                $name = $d['name'];
                                                $description = $d['description'];
                                                $dateadded = $d['dateadded'];
                                                echo "<tr><td>$count</td><td>$name</td><td>$description</td><td>$dateadded</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deleteclient(\"$id\")'></i></td></tr>";
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                        <div id="client" style="display:none">
                            <div style="font-size:25px">Client</div>
                            <div id="invs">
                                <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                    <label>Client type</label>
                                    <select class='form-control' id='clienttype'>
                                        <?php
                                        $qc = "select * from billingcategory order by name asc";
                                        $qw = mysqli_query($w, $qc);
                                        while ($hq = mysqli_fetch_array($qw)) {
                                            $catid = $hq['categoryid'];
                                            $catname = $hq['name'];
                                            echo "<option value='$catid'>$catname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Client name</label>
                                    <input type="text" id="clientname" class="form-control">
                                    <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="saveclient(clienttype.value, clientname.value)">
                                </span>
                                <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                    <table class="table table-condensed table-striped table-bordered">
                                        <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Client category</td><td>client name</td><td colspan="2">Date added</td></tr>
                                        <tbody id="admininvestigations">
                                            <?php
                                            $v = "select * from billingclient order by billgroupid asc";
                                            $q = mysqli_query($w, $v);
                                            $count = 1;
                                            while ($d = mysqli_fetch_array($q)) {
                                                $id = $d['billingclientid'];
                                                $clientgroup = $d['billgroupid'];
                                                $clientname = $d['billclient'];
                                                $dateadded = $d['dateadded'];
                                                //Get the category name
                                                $qh = mysqli_query($w, "select name from billingcategory where categoryid='$clientgroup'");
                                                $abq = mysqli_fetch_array($qh);
                                                $clientcatname = $abq['name'];
                                                echo "<tr><td>$count</td><td>$clientcatname</td><td>$clientname</td><td>$dateadded</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deleteclient(\"$id\")'></i></td></tr>";
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                        <div id="clientplan" style="display:none">
                            <div style="font-size:25px">Client Plan</div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>Client type</label>
                                <select class='form-control' id='clienttypem' onchange='pullbillclient(this.value)'>
                                    <option>--Select type--</option>
                                    <?php
                                    $qc = "select * from billingcategory order by name asc";
                                    $qw = mysqli_query($w, $qc);
                                    while ($hq = mysqli_fetch_array($qw)) {
                                        $catid = $hq['categoryid'];
                                        $catname = $hq['name'];
                                        echo "<option value='$catid'>$catname</option>";
                                    }
                                    ?>
                                </select>
                                <label>Client</label>
                                <select class='form-control' id='clientm'>
                                </select>
                                <label>Plan</label>
                                <input type="text" id="clientplanm" class="form-control">
                                <input type="button" value="Save" class="btn btn-success" style="margin-top:10px" onclick="saveclientplan(clienttypem.value, clientm.value, clientplanm.value)">
                            </span>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>Client</td><td>Plan</td><td colspan="2">Date added</td></tr>
                                    <tbody id="admininvestigations">
                                        <?php
                                        $v = "select * from billingplan order by clientnameid asc";
                                        $q = mysqli_query($w, $v);
                                        $count = 1;
                                        while ($d = mysqli_fetch_array($q)) {
                                            $id = $d['planid'];
                                            $planname = $d['clientplan'];
                                            $clientnameid = $d['clientnameid'];
                                            $dateadded = $d['dateadded'];
                                            //Get the category name
                                            $qh = mysqli_query($w, "select billclient from billingclient where billingclientid='$clientnameid'");
                                            $abq = mysqli_fetch_array($qh);
                                            $clientcatname = $abq['billclient'];
                                            echo "<tr><td>$count</td><td>$clientcatname</td><td>$planname</td><td>$dateadded</td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deleteclient(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>
                        <div id="servicecharge" style="display:none">
                            <div style="font-size:25px">Service Charge</div>
                            <div style="margin-bottom:5px; text-align:right">
                                <span class="scoption">Private</span>
                                <span class="scoption">Corporate</span>
                                <span class="scoption">HMO</span>
                            </div>
                            <div>
                                <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                    <label>Client type</label>
                                    <select class='form-control' id='scclienttype' onchange='pullscclient(this.value)'>
                                        <option>--Select type--</option>
                                        <?php
                                        $qc = "select * from billingcategory order by name asc";
                                        $qw = mysqli_query($w, $qc);
                                        while ($hq = mysqli_fetch_array($qw)) {
                                            $catid = $hq['categoryid'];
                                            $catname = $hq['name'];
                                            echo "<option value='$catid'>$catname</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Client</label>
                                    <select class='form-control' id='scclient' onchange='pullscplan(this.value)'>
                                    </select>
                                    <label>Plan</label>
                                    <select class='form-control' id='scclientplan'>

                                    </select>
                                    <script>

                                    </script>
                                    <label>service</label>
                                    <select class='form-control' id='scservice' onchange="pullinputtype()">
                                        <option>--Select type--</option>
                                        <?php
                                        $qc = "select * from billinggroups order by name asc";
                                        $qw = mysqli_query($w, $qc);
                                        while ($hq = mysqli_fetch_array($qw)) {
                                            $catid = $hq['billingclientid'];
                                            $catname = $hq['name'];
                                            echo "<option value='$catid'>$catname</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="button" value="Add bill" class="btn btn-success" style="margin-top:10px" onclick="addbill()">
                                </span>
                                <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                    <div id="servicedets">
                                        <div>
                                            <input type="text" class="form-control" style="margin-bottom:5px">
                                            <input type="button" class="btn reset" value="Set">
                                        </div> 
                                    </div>

                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Consultation module -->
                    <div id="consultation">
                        <span class="horlist" onclick="checksubdrg('diagcat')" id="inv">Diagnosis</span>
                        <hr style="border-color:rgba(255,255,255,0.2); border-style:dashed; margin-top:0px">

                        <div id="diagcats" style="display:nones">
                            <div style='text-align:right; padding-right:10px;'><span style='cursor:pointer' onclick='pullicddiagnosis()'>Refresh diagnosis table</span></div>
                            <span class="col-md-3" style="display:block; background-color:rgba(0,0,0,0.1); padding:10px">
                                <label>ICD-10 code</label>
                                <input type="text" id="icddiagcode" class="form-control" placeholder="e.g B52.9">
                                <label>Diagnosis name</label>
                                <input type="text" id="icddiagname" class="form-control" placeholder="e.g Maternal malaria during pregnancy">
                                <input type="button" value="Save diagnosis" class="btn btn-success" style="margin-top:10px; width:100%" onclick="saveicddiag(icddiagcode.value, icddiagname.value)">
                            </span>
                            <script>
                                function pullicddiagnosis() {
                                    var action = "pullicddiagnosis";
                                    $.post("partials/consulting.php", {action: action}).done(function (data) {
                                        _v("diagnosislist").innerHTML = data;
                                    });
                                }

                                function saveicddiag(a, b) {
                                    alert(a + " - " + b);
                                    if (b.length < 2) {
                                        alert("We need to have a diagnosis name");
                                        return;
                                    }
                                    $.post("partials/consulting.php", {icdcode: a, icddiagnosis: b, action: "savediagnosis"}).done(function (data) {
                                        alert(data);
                                    });
                                    pullicddiagnosis();
                                }
                            </script>
                            <span class="col-md-9" style="display:block; background-color:rgba(255,255,255,0.1); padding:10px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="background-color:#8F4A94; color:#fff; font-weight:600"><td></td><td>ICD 10 Code</td><td>Diagnosis</td><td></td><td></td></tr>
                                    <tbody id="diagnosislist">
                                        <?php
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
                                            echo "<tr><td>$count</td><td>$icdcode</td><td>$diagnosis</td><td><i class='fa fa-newspaper-o ptr'></i></td><td style='text-align:center'><i class='fa fa-times red ptr' onclick='deletediag(\"$id\")'></i></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function () {
            var d = getannouncement();
        });

        function getannouncement() {
            var action = "getannouncements";
            $.post("partials/adminmodule.php", {action: action}).done(function (data) {
                if (data.length > 1) {
                    _v("modaltitle").innerHTML = "Announcements";
                    _v("modalbody").innerHTML = data;
                    $('#myModal').modal();
                }
            });
        }
    </script>
</html>