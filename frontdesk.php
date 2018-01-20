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
        <div class='hidden-lg hidden-md' style='height:35px; text-align:center; margin-top:10px'>
            <span class='sel' style='font-size:30px; padding:10px' onclick="changemenu('#dashboardm', '#dashboard')">Dashboard</span>
            <span class='sel' style='font-size:30px; padding:10px' onclick="changemenu('#registrationm', '#registration')">Registration</span>
            <span class='sel' style='font-size:30px; padding:10px' onclick="changemenu('#checkinm', '#checkin')">Check-In</span>
            <span class='sel' style='font-size:30px; padding:10px' onclick="changemenu('#settingm', '#setting')">Billing</span>
        </div>
        <div class="col-md-1 hidden-sm hidden-xs menuitems">
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
                    $('#myModal').modal();
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
                                    <?php getfdpercentusage($staffid) ?>
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
                                    $qa = mysqli_query($w, "select * from checkinlog");
                                    $countd = mysqli_num_rows($qa);

                                    $haq = mysqli_query($w, "select distinct(staffid) from checkinlog");
                                    $staffnames = "";
                                    $recordcount = "";
                                    $usagecount = "";
                                    while ($q = mysqli_fetch_array($haq)) {
                                        $staffid = $q['staffid'];

                                        //calculate number of entries made
                                        $jq = mysqli_query($w, "select * from checkinlog where staffid='$staffid'");
                                        $recordcount = mysqli_num_rows($jq);
                                        $percentagescore = floor(($recordcount / $countd ) * 100) . "%";

                                        $staffname .= "<div style='margin-bottom:10px; border-bottom-style:dashed; border-bottom-width:thin; border-color:#525252'><span style='font-size:16px'>" . getstaffname($staffid) . "</span> - $recordcount ($percentagescore)</div> ";
                                    }
                                    echo "<div style='text-align:center; font-size:18px; margin-botom:20px'><span style='font-weight:600'>Total check-ins $countd </span></div><br> $staffname";

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
                <script>
                    function clientreg(a, b) {
                        $("#demographic").hide();
                        $("#nok").hide();
                        $("#payplan").hide();
                        $(a).show();
                        $(".sel").removeClass("selected");
                        $(b).addClass("selected");
                    }
                </script>
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
            <div class="col-md-7" style="padding:0px;">
                <div style="padding-bottom:50px; margin-top:5px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                    <div style="background-color:rgba(255,255,255,0.2); padding:5px; text-align:center">
                        <input type="text" class="form-control" placeholder='Hospital ID' id='hospidtosearch' style='display:inline; max-width:250px'>
                        <input type="button" value="Search Patient" class="btn btn-primary" onclick='searchrec(hospidtosearch.value)'>
                        <script>
                            function searchrec(a) {
                                if (a.length < 3) {
                                    alert("Invalid hospital ID");
                                    return;
                                }
                                var action = "searchpatrec";
                                $.post("partials/patientregister.php", {action: action, hospid: a}).done(function (data) {
                                    _v("namespacehere").innerHTML = data;
                                });
                            }
                        </script>
                    </div>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <tr style="font-weight:500; background-color:rgba(0,0,0,0.2); color:#fff; font-weight:600; font-size:11px">
                            <td></td><td>Name</td><td>Hospital ID</td><td>Gender</td><td>DOB</td><td>Age</td><td>M. Status</td><td>Phone number</td><td>D/A</td><td></td>
                        </tr>
                        <tbody id="namespacehere">
                            <?php
                            $za = "select * from patient_register order by dateadded desc LIMIT 50";
                            $xz = mysqli_query($w, $za);
                            $count = 1;
                            if (mysqli_num_rows($xz) < 1) {
                                echo "<tr><td colspan='7' style='text-align:center'>No record to show</td></tr>";
                            } else {
                                while ($az = mysqli_fetch_array($xz)) {
                                    $patientid = $az['patientid'];
                                    $name = strtoupper($az['lastname']) . " " . $az['firstname'];
                                    $hospitalid = strtoupper($az['hospitalid']);
                                    $gender = $az['gender'];
                                    $dob = $az['dateofbirth'];
                                    $age = computeage($dob);
                                    //$age = "24";
                                    $ms = $az['maritalstatus'];
                                    $phonenumber = $az['phonenumber'];
                                    $da = $az['dateadded'];
                                    echo "<tr style='font-size:11px;'><td height='25'>$count</td><td>$name</td><td>$hospitalid</td><td>$gender</td><td>$dob</td><td>$age</td><td>$ms</td><td>$phonenumber</td><td>$da</td><td><i class='fa fa-recycle ptr' title='update info' data-target='#myModal' data-toggle='modal' onclick='updateInfo(\"$patientid\")'></i></td></tr>";
                                    $count++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function updateclient(clientid) {
                var hospid = _v("udhospid").value;
                var firstname = _v("udfirstname").value;
                var lastname = _v("udlastname").value;
                var dob = _v("uddob").value;
                var gender = _v("udgender").value;
                var phonenumber = _v("udphonenumber").value;
                if (hospid.length < 1 || firstname.length < 1 || lastname.length < 1 || dob.length < 1 || gender.length < 1 || phonenumber.length < 1) {
                    alert("One or more require fields not entered correctly");
                    return;
                }
                var action = "updateclient";
                $.post("partials/patientregister.php", {hospid: hospid, fn: firstname, ln: lastname, dob: dob, gender: gender, pn: phonenumber, action: action, clientid: clientid}).done(function (data) {
                    alert(data);
                });
            }

            function updateInfo(patientid) {
                var ld = "<label>Hospital ID</label><input type='text' id='udhospid' class='form-control'><label>First Name</label><input type='text' id='udfirstname' class='form-control'><label>Last Name</label><input type='text' id='udlastname' class='form-control'><label>Date of Birth</label><input type='date' id='uddob' class='form-control'><label>Gender</label><select id='udgender' class='form-control'><option>Male</option><option>Female</option></select><label>Phone number</label><input type='text' id='udphonenumber' class='form-control' style='margin-bottom:10px'><input type='button' class='btn btn-warning' value='Save update' style='margin-bottom:10px' onclick='updateclient(" + patientid + ")'>";
                _v("modReportFDBody").innerHTML = ld;
                _v("modReportFDtitle").innerHTML = "Update record";
                //Get records from database
                var action = "pulldetforupdate";
                $.post("partials/adminmodule.php", {action: action, patientid: patientid}).done(function (data) {
                    //alert(data);
                    var content = data;
                    var div = document.createElement("div");
                    div.innerHTML = content;
                    var fname = div.getElementsByTagName('a')[0];
                    var sname = div.getElementsByTagName('b')[0];
                    var sclass = div.getElementsByTagName('c')[0];
                    var address = div.getElementsByTagName('d')[0];
                    var email = div.getElementsByTagName('e')[0];
                    var studentid = div.getElementsByTagName('f')[0];
                    document.getElementById("udhospid").value = fname.innerText;
                    document.getElementById("udfirstname").value = sname.innerText;
                    document.getElementById("udlastname").value = sclass.innerText;
                    document.getElementById("uddob").value = address.innerText;
                    document.getElementById("udgender").value = email.innerText;
                    document.getElementById("udphonenumber").value = studentid.innerText;
                });
            }
        </script>

        <div id="checkin" style="display:none">
            <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                <div style="background-color:#BFC9E3; padding:10px">
                    <span class="partialsheader">
                        Check-In
                    </span>
                </div>
                <script>
                    function triagemenu(a, b) {
                        $("#vitalsignsform").hide();
                        $("#newsreport").hide();
                        $(b).show();
                        $(".vitalsminimenu").removeClass("vitalsminimenusel");
                        $(a).addClass("vitalsminimenusel");
                    }
                </script>
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
                            setInterval(function () {
                                getcurrentTime();
                                waittimechecks();
                                pullaveragewaittime();
                            }, 1000);

                            function requestdelete(a) {
                                alert(a);
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
            <div class="col-md-7 briefstyle" id="brief" style="height:100% !important">
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
</div>
</body>
</html>
