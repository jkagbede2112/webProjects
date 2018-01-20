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
        <script src="javascript/tervescript.js" type="text/javascript"></script>
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">-->
        <link href="css/terveCure.css" rel="stylesheet" type="text/css"/>
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/chart.js" type="text/javascript"></script>
        <script src="javascript/bootstrap.min.js" type="text/javascript"></script>
        <style>
            .form-control{
                padding:0px;
                height:30px;
                border-radius: 0px;
            }
        </style>
    </head>
    <body>
        <div class="col-md-1 menuitems">
            <img src="images/nurse.png" style="width:160px; z-index:111; position:absolute; bottom:0px; left:-25px">
            <div style="background-color:#8F4A94; height:20px">

            </div>
            <div style="min-height:40px; background-color:#9A9A9A; padding:15px; margin-bottom:10px">
                <span onclick='loadhomeUrl()' style='cursor:pointer'><img src="images/tervecure.png" width="100%"> </span>
            </div>
            <ul class="nav-sidebar" style='margin-top:10px;font-family:raleway; padding-left:0px; padding-top:30px; list-style:none'>
                <li class="okk okks" id='dashboardm' onclick="changemenu('#dashboardm', '#dashboard')">
                    <i class="fa fa-th" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Dashboard</span>
                </li>
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-stethoscope" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Dispensary</span>
                </li>
                <li class="okk" id='checkinm' onclick="changemenu('#checkinm', '#checkin')">
                    <i class="fa fa-user-md" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Inventory mgt</span>
                </li>
            </ul>
        </div>
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
        <div class="col-md-11" style="padding:0px">
            <div class="col-md-12" style="height:5px; background-color:#8F4A94; border-bottom-width:medium; border-bottom-style:solid; border-bottom-color:#E1E1E1"></div>
            <?php
            include 'partials/journeymonitor.php';
            ?>
            <!-- Dashboard -->
            <div id="dashboard" style="display:nones">
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
                <div class="col-md-8" style="height:100%; padding:5px; overflow-y:auto" id="filler">
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
                </div>
            </div>

            <div id="registration" style="display:none">
                <div class="col-md-5" id="triagequeue" style="display: none; position:absolute; min-height:500px; max-height:450px; overflow-y: auto; z-index:400; top:53px; padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px; cursor:pointer" title="Click to close queue pane" onclick="hidetriagequeue();">
                        <span class="partialsheader">
                            Pharmacy Queue
                        </span>
                    </div>
                    <div style="margin-top:5px">
                        <div style="margin-bottom:5px; text-align:center">
                            <span class="bt bts ptr" onclick="pullpharmaqueue('today')" id="pulltoday">Today</span> - 
                            <span class="bt ptr" onclick="pullpharmaqueue('legacyrecords')" id="pulllegacyrecords">Legacy queue</span> - 
                            <span class="bt ptr" onclick="pullpharmaqueue('checkinrecords')" id="pullcheckinrecords">Check-In queue</span>
                        </div>
                        <table style="width:100%; font-size:12px" class="table table-striped table-bordered">
                            <tr style="background-color:#919191; color:#fff; font-size:11px; font-weight:600"><td></td><td>Hosp ID</td><td>Name</td><td>In time</td><td>In date</td><td></td><td></td></tr>
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
                                echo "<span class='hwt' style='border-radius:50%; padding:3px; font-size:11px' id='pharmacyqueuecount'>$gs</span>";
                                ?> 
                                - Pharmacy Queue .</span>
                            <span id="navmenuitems" style="display:none">
                                <span class="vitalsminimenu vitalsminimenusel" onclick="triagemenu('#vsf', '#vitalsignsform')" id="vsf" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Prescription</span>
                                <span class="vitalsminimenuallergy" onclick="triagemenu('#allergiesr', '#allergiesdisp')" id="allergiesr">Allergies</span>
                                <span class="vitalsminimenu" onclick="triagemenu('#trf', '#triagereportsform')" id="trf">Medication history</span>
                                <span class="vitalsminimenu" onclick="triagemenu('#nr', '#newsreport')" id="nr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Visit History</span>
                            </span>
                        </div>
                        <div id="vitalsignsform" class="col-md-7" style="padding:10px;">
                        </div>
                        <div id="allergiesdisp" style="display:none; padding:10px">
                            Allergies is usually here
                        </div>
                        <div id="triagereportsform" style="display:none">
                            Pharmacy something will be here 3
                        </div>
                        <div id="newsreport" style="display:none; padding:10px">
                            Pharmacy something will be here 4
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
            <div id="checkin" style="display:none; background-color:rgba(255,255,255,0.2); overflow-y:auto; padding:10px">
                <?php
                $gw = "select * from pharmacy_drugs order by brandname asc";
                $gasd = mysqli_query($w, $gw);
                $count = 1;
                $bg = "<div style='font-size:25px; margin-bottom:10px; margin-top:10px'>Inventory manager</div><div style='text-align:right; margin-top:10px; margin-bottom:10px'><span id='navmenuitems'>
                                <span class='vitalsminimenu vitalsminimenusel' onclick='inventorymenu(\"#vsfs\", \"#vitalsignsforms\")' id='vsfs' style='border-top-left-radius: 5px; border-bottom-left-radius: 5px'>Drugs</span>
                                <span class='vitalsminimenu' onclick='inventorymenu(\"#allergiesrs\", \"#allergiesdisps\")' id='allergiesrs'>Dispense log</span>
                                <span class='vitalsminimenu' onclick='inventorymenu(\"#turnoversrs\", \"#turnoverdisps\")' id='turnoversrs'>Turn-Over</span>
                                <span class='vitalsminimenu' onclick='inventorymenu(\"#nrs\", \"#newsreports\")' id='nrs' style='border-top-right-radius: 5px; border-bottom-right-radius: 5px'>RE-stock log</span>
                            </span></div><div id='vitalsignsforms'><table class='table table-bordered table-striped' style='margin-top:20px; font-size:11px'><tr style='background-color:#ccc; font-weight:600; font-size:15px'><td></td><td>Drug name</td><td>Stock</td><td>Order level</td><td>Priv tarrif</td><td>Corp tarrif</td><td></td></tr>";
                while ($av = mysqli_fetch_array($gasd)) {
                    $drugid = $av['pharma_drugsid'];
                    $drugname = $av['genericname'];
                    $stockcount = $av['stockcount'];
                    $reorderlevel = $av['reorderlevel'];
                    $dateadded = $av['dateadded'];
                    $private = $av['private'];
                    $corporate = $av['corporate'];
                    $bg .= "<tr><td>$count</td><td>$drugname</td><td>$stockcount</td><td>$reorderlevel</td><td>$private</td><td>$corporate</td><td><span style='font-weight:600; cursor:pointer' data-toggle='modal' data-target='#myModal' onclick='pullmovement($drugid)'>Movement</span></td></tr>";
                    $count++;
                }
                echo $bg . "</table></div>";
                ?>
                <div id='turnoverdisps'>
                    <div class='col-md-8' style='padding:0px'>

                        <div style='padding:0px; font-size:16px; color:#8F4A94; margin-bottom:5px'>Turn Over Log</div>
                        <div class='col-md-12'  style='background-color:rgba(23,132,208,0.2); padding:0px; height:164px; border-width: thin; border-color:#1784d0; border-style:dashed; border-right:none'>
                            <div class='col-md-6' style='padding-top:10px; padding-top:0px'>
                                <span style='font-size:14px; font-weight:600'>Top 5 requested drugs</span>
                                <div style='background-color:rgba(255,255,255,0.2); border-radius: 2px; padding:5px'>
                                    <div id='alltopfive' style='display:nones'>
                                        <?php
//Get year and month
                                        $yearmonth = date('Y-m');
//echo $yearmonth;
                                        $hq = mysqli_query($w, "select drugid, count(*) as c from consultation_prescription GROUP BY drugid order by c desc limit 5");
                                        $tab = "<table class='table-bordered table-condensed' style='font-size:11px; width:100%; margin-bottom:0px; padding-bottom:0px'>";
                                        $count = 1;
                                        while ($ct = mysqli_fetch_array($hq)) {
                                            $rc = $ct['c'];
                                            $drugid = $ct['drugid'];
                                            $drugname = getdrugname($drugid);
                                            $tab .= "<tr><td>$count</td><td>$drugname</td><td>$rc</td></tr>";
                                            $count++;
                                        }
                                        echo $tab . "</table>"
                                        ?>
                                    </div>
                                    <div id='thismonthtopfive' style='display:none'>
                                        <?php
//Get year and month
                                        $yearmonth = date('Y-m');
//echo $yearmonth;
                                        $hq = mysqli_query($w, "select drugid, count(*) as c from consultation_prescription where dateadded like '%$yearmonth%' GROUP BY drugid order by c desc limit 5");
                                        if (mysqli_num_rows($hq) < 1) {
                                            echo "<table><tr><td colspan='4'>No drugs</td></tr></table>";
                                        }
                                        $tab = "<table class='table-bordered table-condensed' style='font-size:11px; width:100%; margin-bottom:0px; padding-bottom:0px'>";
                                        $count = 1;
                                        while ($ct = mysqli_fetch_array($hq)) {
                                            $rc = $ct['c'];
                                            $drugid = $ct['drugid'];
                                            $drugname = getdrugname($drugid);
                                            $tab .= "<tr><td>$count</td><td>$drugname</td><td>$rc</td></tr>";
                                            $count++;
                                        }
                                        echo $tab . "</table>"
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class='col-md-6' style='padding-top:15px; padding-left:0px; padding-left:0px'>
                                <span style='font-size:14px; font-weight:600'>Turn-Over Analysis</span>
                                <div style='background-color:rgba(255,255,255,0.2); border-radius: 2px; padding:5px' id="topdrugs">
                                    <div style="font-size:12px; text-align:center">Select drug and date range to see analysis</div>
                                </div>
                            </div>
                            <!-- Get total visits fo pharmacy  -->

                            <!-- Top 5 dispensed drugs -->
                        </div>
                    </div>
                    <div class='col-md-4' style='padding:0px'>
                        <div class='col-md-12' style='padding:0px; font-size:16px; color:#8F4A94; margin-bottom:5px'>.</div>
                        <div class='col-md-12' style='background-color:rgba(0,0,0,0.1); margin-bottom:5px; padding:10px; padding-top:0px; height:164px; border-width: thin; border-color:rgba(0,0,0,0.4); border-style:dashed; border-left:none'>
                            <div class='col-md-12' style='padding:0px'>
                                <label>Drug name</label>
                                <select class='form-control' id='dldrugname'>
                                    <?php
                                    $qhv = mysqli_query($w, "select * from pharmacy_drugs order by genericname asc");
                                    echo "<option>All</option>";
                                    while ($hq = mysqli_fetch_array($qhv)) {
                                        $drugid = $hq['pharma_drugsid'];
                                        $drugname = $hq['genericname'];
                                        echo "<option value='$drugid'>$drugname</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-6' style='padding:0px'>
                                <label>From</label>
                                <input type='date' class='form-control' id='dldrugfrom'>
                            </div>
                            <div class='col-md-6' style='padding:0px'>
                                <label>To</label>
                                <input type='date' class='form-control' id='dldrugto'>
                            </div>
                            <input type='button' value='Pull dispense log...' onclick='pulldl()' class='btn btn-success vitalsminimenu' style='margin-top:5px; margin-bottom:5px; width:100%'>
                        </div>
                    </div> 
                    <script>
                        function pulldl() {
                            var drugname = _v("dldrugname").value;
                            var datefrom = _v("dldrugfrom").value;
                            var dateto = _v("dldrugto").value;

                            var action = "pulldrugsusageturnover";
                            if (drugname.length < 1 || datefrom.length < 1 || dateto.length < 1) {
                                alert("All fields need to be filled in");
                                return;
                            }
                            $.post("partials/pharmacy.php", {action: action, drugname: drugname, datefrom: datefrom, dateto: dateto}).done(function (data) {
                                _v("drugsmovementtab").innerHTML = data;
                            });
                            computeaggregate(drugname, datefrom, dateto);
                        }
                        
                        function computeaggregate(drugid, from, to) {
                            var action = "computesummary";
                            $.post("partials/pharmacy.php", {action: action, drugname: drugid, datefrom: from, dateto: to}).done(function (data) {
                                _v("topdrugs").innerHTML = data;
                            });
                        }
                    </script>
                    <div style="text-align:right; cursor:pointer">Print</div>
                    <table class='table table-condensed table-bordered table-striped'>
                        <thead style='background-color:rgba(0,0,0,0.2); font-weight:500'><tr><td></td><td>Drug</td><td>Patient Type</td><td>Unit price</td><td>Qty</td><td>Turn-Over</td><td>Hospital ID</td><td>Visit date</td></tr></thead>
                        <tbody style='font-size:11px' id='drugsmovementtab'>
                        </tbody>
                    </table>
                </div>
                <div id='allergiesdisps'>
                    <div class='col-md-8' style='padding:0px'>

                        <div style='padding:0px; font-size:16px; color:#8F4A94; margin-bottom:5px'>Dispense Log</div>
                        <div class='col-md-12'  style='background-color:rgba(23,132,208,0.2); padding:0px; height:164px; border-width: thin; border-color:#1784d0; border-style:dashed; border-right:none'>
                            <div class='col-md-3' style='text-align:center; padding-top:0px'>   <!--get total number of drugs dispensed this month-->
                                <?php
//Get year and month
                                $yearmonth = date('Y-m');
//echo $yearmonth;
                                $hq = mysqli_query($w, "select count(*) as c from pharmacy_queue");
                                $count = mysqli_fetch_array($hq);
                                $rcxx = $count['c'];
                                echo "<div style='font-size:100px; text-align:center; margin-top:40px; line-height:34px; font-family:raleway; font-weight:200'>$rcxx<br><span style='font-size:14px; font-weight:400'>Patients</span></div>";
                                ?>
                            </div>
                            <div class='col-md-3' style='text-align:center; padding-top:0px'>   <!--get total number of drugs dispensed this month-->
                                <?php
                                //Get month.
                                $previousmonth = date('Y-m', strtotime('-1 months'));
                                $hqd = mysqli_query($w, "select count(*) as c from pharmacy_queue where dateadded like '%$previousmonth%'");
                                $countfd = mysqli_fetch_array($hqd);
                                $rcd = $countfd['c'];

//Get current month
                                $yearmonthd = date('Y-m');
//echo $yearmonth;
                                $hqq = mysqli_query($w, "select count(*) as c from pharmacy_queue where dateadded like '%$yearmonthd%'");
                                $counft = mysqli_fetch_array($hqq);
                                $rcq = $counft['c'];
                                $percentiledispthismonth = floor(($rcq / $rcxx) * 100) . "%";

                                if ($rcd > $rcq) {
                                    $caret = "<i class='fa fa-caret-down' style='color:red; font-size:12px; line-height:30px'></i>";
                                } else {
                                    $caret = "<i class='fa fa-caret-up' style='color:green; font-size:12px; line-height:30px'></i>";
                                }

                                echo "<div style='font-size:60px; font-family:raleway; position:relative; margin-top:25px; line-height:40px; font-weight:300'>$caret<span style='margin-left:5px;'>$rcq</span><span style='font-size:14px'>($percentiledispthismonth)tm</span></div>";
                                echo "<hr style='margin-bottom:5px; margin-top:0px; border-style:dashed; border-color:rgba(255,255,255,0.4); padding:0px'>";
                                echo "<div style='font-size:60px; position:relative; line-height:40px; font-family:raleway; font-weight:200'>$rcd<span style='bottom:-5px; font-size:14px'>lm</span></div>";
                                ?>
                            </div>

                            <div class='col-md-6' style='padding-top:10px; padding-top:0px'>
                                <span style='font-size:14px; font-weight:600'>Top 5 requested drugs</span>
                                <div style='background-color:rgba(255,255,255,0.2); border-radius: 2px; padding:5px'>
                                    <div id='alltopfive' style='display:nones'>
                                        <?php
//Get year and month
                                        $yearmonth = date('Y-m');
//echo $yearmonth;
                                        $hq = mysqli_query($w, "select drugid, count(*) as c from consultation_prescription GROUP BY drugid order by c desc limit 5");
                                        $tab = "<table class='table-bordered table-condensed' style='font-size:11px; width:100%; margin-bottom:0px; padding-bottom:0px'>";
                                        $count = 1;
                                        while ($ct = mysqli_fetch_array($hq)) {
                                            $rc = $ct['c'];
                                            $drugid = $ct['drugid'];
                                            $drugname = getdrugname($drugid);
                                            $tab .= "<tr><td>$count</td><td>$drugname</td><td>$rc</td></tr>";
                                            $count++;
                                        }
                                        echo $tab . "</table>"
                                        ?>
                                    </div>
                                    <div id='thismonthtopfive' style='display:none'>
                                        <?php
//Get year and month
                                        $yearmonth = date('Y-m');
//echo $yearmonth;
                                        $hq = mysqli_query($w, "select drugid, count(*) as c from consultation_prescription where dateadded like '%$yearmonth%' GROUP BY drugid order by c desc limit 5");
                                        if (mysqli_num_rows($hq) < 1) {
                                            echo "<table><tr><td colspan='4'>No drugs</td></tr></table>";
                                        }
                                        $tab = "<table class='table-bordered table-condensed' style='font-size:11px; width:100%; margin-bottom:0px; padding-bottom:0px'>";
                                        $count = 1;
                                        while ($ct = mysqli_fetch_array($hq)) {
                                            $rc = $ct['c'];
                                            $drugid = $ct['drugid'];
                                            $drugname = getdrugname($drugid);
                                            $tab .= "<tr><td>$count</td><td>$drugname</td><td>$rc</td></tr>";
                                            $count++;
                                        }
                                        echo $tab . "</table>"
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Get total visits fo pharmacy  -->

                            <!-- Top 5 dispensed drugs -->
                        </div>
                    </div>
                    <div class='col-md-4' style='padding:0px'>
                        <div class='col-md-12' style='padding:0px; font-size:16px; color:#8F4A94; margin-bottom:5px'>Dispense Log</div>
                        <div class='col-md-12' style='background-color:rgba(0,0,0,0.1); margin-bottom:5px; padding:10px; padding-top:0px; height:164px; border-width: thin; border-color:rgba(0,0,0,0.4); border-style:dashed; border-left:none'>
                            <div class='col-md-12' style='padding:0px'>
                                <label>Drug name</label>
                                <select class='form-control' id='dldrugname'>
                                    <?php
                                    $qhv = mysqli_query($w, "select * from pharmacy_drugs order by genericname asc");
                                    echo "<option>All</option>";
                                    while ($hq = mysqli_fetch_array($qhv)) {
                                        $drugid = $hq['pharma_drugsid'];
                                        $drugname = $hq['genericname'];
                                        echo "<option value='$drugid'>$drugname</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class='col-md-6' style='padding:0px'>
                                <label>From</label>
                                <input type='date' class='form-control' id='dldrugfrom'>
                            </div>
                            <div class='col-md-6' style='padding:0px'>
                                <label>To</label>
                                <input type='date' class='form-control' id='dldrugto'>
                            </div>
                            <input type='button' value='Pull dispense log' onclick='pulldlp()' class='btn btn-success vitalsminimenu' style='margin-top:5px; margin-bottom:5px; width:100%'>
                        </div>
                    </div> 
                    <script>
                        function pulldlp() {
                            var drugname = _v("dldrugname").value;
                            var datefrom = _v("dldrugfrom").value;
                            var dateto = _v("dldrugto").value;

                            var action = "pulldrugsusage";
                            if (drugname.length < 1 || datefrom.length < 1 || dateto.length < 1) {
                                alert("All fields need to be filled in");
                                return;
                            }
                            $.post("partials/pharmacy.php", {action: action, drugname: drugname, datefrom: datefrom, dateto: dateto}).done(function (data) {
                                _v("drugsmovementtabp").innerHTML = data;
                            });
                        }
                    </script>
                    <div style="text-align:right; cursor:pointer">Print</div>
                    <table class='table table-condensed table-bordered table-striped'>
                        <thead style='background-color:rgba(0,0,0,0.2); font-weight:500'><tr><td></td><td>Drug</td><td>Patient Name</td><td>Hosp ID</td><td>Visit date</td><td>Qty</td><td>Left</td></tr></thead>
                        <tbody style='font-size:11px' id='drugsmovementtabp'>
                            <?php
                            $qg = mysqli_query($w, "select * from pharmacy_drugmovement where movementtype='Dispense' order by dateadded desc limit 20");
                            $count = 1;
                            while ($hy = mysqli_fetch_array($qg)) {
                                $drugid = $hy['drugid'];
                                $visitid = $hy['visitid'];
                                $qtymoved = $hy['qtymoved'];
                                $qtyleft = $hy['qtyleft'];
                                $drugname = getdrugname($drugid);
                                $patname = getnamefromvisitid($visitid);
                                $hospitalid = gethospitalidfromvisitid($visitid);
                                echo "<tr><td>$count</td><td>$drugname</td><td>$patname</td><td>$hospitalid</td><td>$visitid</td><td>$qtymoved</td><td>$qtyleft</td></tr>";
                                $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id='newsreports'>
                    <div class='col-md-12' style='padding:0px; font-size:20px; color:#8F4A94'>Restock</div>
                    <div class='col-md-12' style='padding:10px; margin-bottom:10px; background-color:rgba(255,255,255,0.2)'>
                        <div class="col-md-4" style="padding:0px">
                            Re-stock History
                            <table class="table-condensed table-striped table-bordered" style="width:100%" border-color="#ff0000">
                                <tr style='background-color:rgba(0,0,0,0.2); font-weight:500'><td></td><td>Date</td><td>Restock Code</td><td>Items Restocked</td></tr>
                                <tbody style='font-size:12px'>
                                    <?php
                                    $q = "select * from pharmacy_restockcode where status='1'";
                                    $k = mysqli_query($w, $q);
                                    $count = 1;
                                    while ($x = mysqli_fetch_array($k)) {
                                        $code = $x['drcode'];
                                        $dategen = $x['codegeneratedate'];
                                        //Get record count per code
                                        $kk = mysqli_query($w, "select count(*) as rec from restockrecord where restockcode='$code'");
                                        $mk = mysqli_fetch_array($kk);
                                        $countt = $mk['rec'];
                                        echo "<tr><td>$count</td><td>$dategen</td><td>$code</td><td>$countt</td></tr>";
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-8" style="padding-right:0px">
                            <div class="col-md-12">
                                .
                            </div>
                            <div class="col-md-5" style="background-color:rgba(0,0,0,0.1); padding:10px">
                                <div style="font-size:11px; padding-bottom:5px">
                                    To do a restock, click button below to generate code.
                                </div>
                                <input type="button" value="Generate Re-Stock Code" class="btn btn-warning" style="width:100%" onclick='generaterCode()'>
                                <div style="font-size:12px; padding-top:5px" id='codeServerResponse'>
                                </div>
                            </div>
                            <div class="col-md-7" style="padding-left:0px; padding:10px; background-color:rgba(255,255,255,0.4)">

                                Code
                                <input type="text" class="form-control" id="restockcode" style="margin-bottom:5px;">
                                <input type="button" class="btn btn-success" value="Activate restock code" onclick="activaterestock(restockcode.value)" style="width:100%">
                            </div>
                            <div class="col-md-12" style="background-color:rgba(255,255,255,0.2); padding:10px; margin-top:10px">
                                <div id='restockcodestatus' style='text-align:right; margin-bottom: 5px'>
                                    <span>
                                        <?php
                                        $datex = date("Y-m-d");
                                        $j = "select * from pharmacy_restockcode where codegeneratedate='$datex' and status='1'";
                                        $qa = mysqli_query($w, $j);
                                        $gt = mysqli_fetch_array($qa);
                                        $code = $gt['drcode'];
                                        if (mysqli_num_rows($qa) > 0) {
                                            echo "<span style='padding:5px; background-color:#009966; color:#fff; cursor:pointer; border-radius: 4px' title='$code'>Code active</span>";
                                        } else {
                                            echo "<span style='padding:5px; background-color:#E10D6C; color:#fff; cursor:pointer; border-radius: 4px' title='No code'>Code In-active</span>";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div style='font-size:11px; text-align:right'>
                                    <span class='ptr drgMenu drgMenuSel' onclick="seldrgMenu('#drgoptru', '#drgMenuRO')" id='drgMenuRO'>Running out</span> | 
                                    <span class='ptr drgMenu' onclick="seldrgMenu('#drgoptod', '#drgMenuOD')" id='drgMenuOD'>Other drugs</span>
                                </div>
                                <div id='drgoptru'>
                                    <div style="margin-bottom:5px; font-size:24px; font-weight:400">Items running out.</div>
                                    <table class="table table-bordered table-condensed table-striped" style="font-size:12px">
                                        <tr style="font-weight:600; background-color:#ccc"><td></td><td>Drug</td><td>Qty</td><td title="Re-Order Level">ROL</td><td>Restock</td><td>New stock</td></tr>
                                        <?php
                                        $qjx = "select * from pharmacy_drugs where stockcount <= reorderlevel";
                                        $qk = mysqli_query($w, $qjx);
                                        $count = 1;
                                        while ($ha = mysqli_fetch_array($qk)) {
                                            $drgid = $ha['pharma_drugsid'];
                                            $dgname = $ha['genericname'];
                                            $stockcount = $ha['stockcount'];
                                            $rol = $ha['reorderlevel'];
                                            echo "<tr><td>$count</td><td>$dgname</td><td>$stockcount</td><td>$rol</td><td>Qty <input type='text' maxlength='4' size='5' id='rQty$count'><i class='fa fa-check btn-success' title='Re-Stock' style='padding:4px; cursor:pointer' onclick='rstkQty(rQty$count.value, \"servRsp$count\",\"$drgid\")'></i></td><td id='servRsp$count'></td></tr>";
                                            $count++;
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div id='drgoptod' hidden>
                                    <div style="margin-bottom:5px; font-size:24px; font-weight:200">Other drugs</div>
                                    <table class="table table-bordered table-condensed table-striped" style="font-size:12px">
                                        <tr style="font-weight:600"><td>Drug</td><td>Qty</td><td title="Re-Order Level">ROL</td><td>Restock</td><td>Restocked Qty</td><td>New stock</td></tr>
                                        <tbody style='max-height:300px; overflow-y: auto'>
                                            <?php
                                            $qjx = "select * from pharmacy_drugs where stockcount > reorderlevel";
                                            $qk = mysqli_query($w, $qjx);
                                            $count = 1;
                                            while ($ha = mysqli_fetch_array($qk)) {
                                                $drgid = $ha['pharma_drugsid'];
                                                $dgname = $ha['genericname'];
                                                $stockcount = $ha['stockcount'];
                                                $rol = $ha['reorderlevel'];
                                                echo "<tr><td>$count</td><td>$dgname</td><td>$stockcount</td><td>$rol</td><td>Qty <input type='text' maxlength='4' size='5' id='rodQty$count'><i class='fa fa-check btn-success' title='Re-Stock' style='padding:4px; cursor:pointer' onclick='rstkQty(rodQty$count.value, \"servodRsp$count\",\"$drgid\")'></i></td><td id='servodRsp$count'></td></tr>";
                                                $count++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        pullpharmaqueue(vsqueuetype);
        waittimechecks();
        pullaveragewaittime();
    }, 5000);

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>