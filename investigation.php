<!DOCTYPE html>
<?php
$staffid = "4";
include 'partials/connect.php';
//include "confirm_indexing.php";
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
                    <span style="font-size:12px">Investigation</span>
                </li>
                <li class="okk" id='registrationm' onclick="changemenu('#registrationm', '#registration')">
                    <i class="fa fa-refresh" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Recrudescence</span>
                </li>
                <script>
                            function changemenu(a, b){
                            $("#dashboard").hide();
                                    $("#registration").hide();
                                    $("#checkin").hide();
                                    $("#setting").hide();
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
            <div id="dashboard" style="display:nones">
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Dashboard
                        </span>
                    </div>
                    <div style="margin-top:5px; padding:5px; font-family:raleway; background-color:#D4D4D4">
                        <div style="font-weight:600; color:#8F4A94">Check-In today</div>
                        <table style="margin-top:10px; width:100%; border-radius:4px;">
                            <tr>
                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-clock-o" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        4
                                    </span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <tr><td></td><td>Hospital ID</td><td>In</td><td>Out</td><td>Time(mins)</td></tr>
                                        <tr><td>1</td><td>4234/4</td><td>1:20pm</td><td>1:35</td><td>15mins  &nbsp;<i class="fa fa-male" style="color:#ff3333"></i></td></tr>
                                        <tr class="hwt"><td>2</td><td>54234/3W</td><td>3:10pm</td><td>4:25pm</td><td>75mins    &nbsp;<i class="fa fa-male" style="color:#16726D"></i></td></tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                        <marquee>Display graph somewhere here.</marquee>
                    </div>
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <div style="font-weight:600; color:#8F4A94">Recrudescence</div>
                        <table style="margin-top:10px; width:100%">
                            <tr>
                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-wheelchair-alt" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        4
                                    </span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <tr><td>Adebanji Omotola</td><td>41432/3D</td><td><i class="fa fa-male"></i></td><td><i class="fa fa-gg" title="View diagnosis (last 3 visits)"></i></td></tr>
                                        <tr><td>Ibrahim Adebanjo</td><td>41432/3D</td><td><i class="fa fa-male"></i></td><td><i class="fa fa-gg" title="View diagnosis (last 3 visits)"></i></td></tr>
                                        <tr><td>Innocent Adetoun</td><td>41432/3D</td><td><i class="fa fa-male"></i></td><td><i class="fa fa-gg" title="View diagnosis (last 3 visits)"></i></td></tr>
                                        <tr><td>James Bond</td><td>41432/3D</td><td><i class="fa fa-male"></i></td><td><i class="fa fa-gg" title="View diagnosis (last 3 visits)"></i></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="margin-top:5px; padding:5px; background-color:#D4D4D4">
                        <span style="font-weight:600; color:#8F4A94">Birthdays</span>
                        <table style="margin-top:10px; width:100%">
                            <tr>

                                <td style="text-align:center; background-color:rgba(255,255,255,0.2); padding:10px; width:100px">
                                    <i class="fa fa-birthday-cake" style="font-size:50px; color:#919191"></i><br>
                                    <span style="font-size:30px">
                                        12
                                        <i class="fa fa-comments" style="font-size:12px; color:#8F4A94" data-toggle="popover" data-html='true' data-content='<textarea id="msgeveryone" onkeyup="countmsgeveryone()" style="margin-bottom:5px;" class="form-control"></textarea><input type="button" class="btn btn-warning" value="Send everyone SMS" style="padding:2px" onclick="sendeverysms()"> <span id="everycount"></span>'></i></span>
                                </td>
                                <td style="background-color:#BFC9E3; padding:10px">
                                    <table class="table-bordered dashsections">
                                        <tr><td>1</td><td>Mr. Aderibigbe Ibrahim</td><td></td><td>08034235257</td></tr>;

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <script>
                        //This function pulls clients in each group
                        function pullgroup(a) {
                        alert(a);
                        }

                        function sendmessagegender(a) {
                        var smsmalegroup = document.getElementById("smsmalegroup").value;
                                //alert(smsmalegroup);
                                //alert(a);
                                $.post("partials/sendsmsgender.php", {gender: a, message: smsmalegroup}).done(function (data) {
                        if (data === "1") {
                        alert("No clients in category");
                        } else {
                        //alert(data);
                        window.open(data, '_blank');
                        }
                        });
                        }
                        function sendmessagegenderf(a) {
                        var smsfemalegroup = document.getElementById("smsfemalegroup").value;
                                //alert(smsmalegroup);
                                //alert(a);
                                $.post("partials/sendsmsgender.php", {gender: a, message: smsfemalegroup}).done(function (data) {
                        if (data === "1") {
                        alert("No clients in category");
                        } else {
                        //alert(data);
                        window.open(data, '_blank');
                        }
                        });
                        }
                        function countmsgeveryone() {
                        var c = document.getElementById("msgeveryone").value;
                                document.getElementById("everycount").innerHTML = c.length;
                                //alert(c.length);
                        }

                        function sendeverysms() {
                        var c = document.getElementById("msgeveryone").value;
                                $.post("partials/smseverybody.php", {message: c}).done(function (data) {
                        alert(data);
                        });
                        }

                    </script>

                </div>
                <div class="col-md-8" style="height:100%; padding:5px; overflow-y:auto" id="filler">
                    <div style="background-color:rgba(255,255,255,0.2); padding:10px; font-size:25px; min-height:40px; margin-bottom:5px">
                        <span style="display:inline-block; max-width:400px; font-size:12px">
                            This is is here details will be placed of selected client in walk-throughs
                        </span>
                        <span style="display:inline-block">
                            <i class="fa fa-blind purple"></i>
                            <i class="fa fa-ellipsis-h qw purple"></i>
                            <i class="fa fa fa-stethoscope purple"></i>
                            <i class="fa fa-ellipsis-h qw purple"></i>
                            <i class="fa fa fa-user-md wth"></i>
                            <i class="fa fa-ellipsis-h qw"></i>
                            <i class="fa fa-blind"></i>
                            <i class="fa fa-ellipsis-h qw"></i>
                            <i class="fa fa-blind"></i>
                        </span>
                    </div>
                    <div style="background-color:rgba(255,255,255,0.2); padding:10px; text-align:center; height:40px; margin-bottom:0px">
                        Patient count (2342)
                    </div>
                    <div style="padding-bottom:50px; margin-top:5px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">

                        <table class="table table-striped">
                            <tbody><tr style="font-weight:500; background-color:rgba(0,0,0,0.2); color:#fff"><td></td><td>Name</td><td>M/Status</td><td>Phone</td><td>Gender</td><td>D.O.B</td><td>Hospital ID</td><td title="Date added">D/A</td><td></td><td></td><td></td><td></td></tr>
                            </tbody><tbody id="namespacehere">
                                <tr style="font-size:12px"><td>1</td><td>JAMES Adebanjo</td><td>Single</td><td>080123662343</td><td>Male</td><td>2017-08-13</td><td>67565</td><td style="font-size:10px">2017-07-27 22:33:39</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 4 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 4 & quot; , & quot; Adebanjo JAMES & quot; , & quot; 080123662343 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS JAMES Adebanjo&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080123662343,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>2</td><td>ADEMOKUN Ibrahim</td><td>Single</td><td>08034203576</td><td>Male</td><td>2015-12-29</td><td>5353</td><td style="font-size:10px">2017-07-12 14:02:01</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 3 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 3 & quot; , & quot; Ibrahim ADEMOKUN & quot; , & quot; 08034203576 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS ADEMOKUN Ibrahim&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(08034203576,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="registration" style="display:none">
                <div class="col-md-4" style="padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Triage
                        </span>
                    </div>
                    <div style="margin-top:20px">
                        <table style="width:100%; font-size:12px" class="table table-striped table-bordered">
                            <tr style="background-color:#919191; color:#fff"><td></td><td>Hospital ID</td><td>Name</td><td>Wait Time</td><td></td><td></td></tr>
                            <tr><td>1</td><td>4523/D2</td><td>IBRAHIM Adetoun</td><td>12mins</td><td><i class="fa fa-male hmp"></i></td><td class="ptr" style="text-align:center"><span class="reset">Begin triage</span></td></tr>
                            <tr><td>2</td><td>4523/D2</td><td>ISAAC Omotayo</td><td>8mins</td><td><i class="fa fa-male priv"></i></td><td class="ptr" style="text-align:center"><span class="reset">Begin triage</span></td></tr>
                            <tr><td>3</td><td>4523/D2</td><td>Kunby Oluwatobi</td><td>2mins</td><td><i class="fa fa-male hmo"></i></td><td class="ptr" style="text-align:center"><span class="reset">Begin triage</span></td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-8" style="padding:0px; position:relative">
                    <div style="padding-bottom:50px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                        <div style="margin:10px">

                            <span style="font-size:25px; display:block"><i class="fa fa-refresh recrud"></i> Agbede Joseph Kayode</span>
                            <span class="vitalclient">Gender : Female</span>
                            <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
                            <span class="vitalclient">Age : 24yrs</span>
                            <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
                        </div>
                        <div style="padding-bottom:20px; text-align:center">
                            <span class="vitalsminimenu vitalsminimenusel" onclick="triagemenu('#vsf', '#vitalsignsform')" id="vsf" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Vital Signs</span>
                            <span class="vitalsminimenu" onclick="triagemenu('#trf', '#triagereportsform')" id="trf">Triage Report</span>
                            <span class="vitalsminimenu" onclick="triagemenu('#nr', '#newsreport')" id="nr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">NEWS</span>
                        </div>
                        <script>
                                    function triagemenu(a, b){
                                    $("#vitalsignsform").hide();
                                            $("#triagereportsform").hide();
                                            $("#newsreport").hide();
                                            $(b).show();
                                            $(".vitalsminimenu").removeClass("vitalsminimenusel");
                                            $(a).addClass("vitalsminimenusel");
                                    }
                        </script>
                        <div id="vitalsignsform" style="padding:10px">
                            <div style="padding:5px; text-align: center">
                                <span style="background-color:#cccccc; text-align:left; display:inline-block; padding:8px">
                                    <table>
                                        <tr><td>Systolic</td><td><input type="number" value="150" class="v form-control"></td></tr>
                                        <tr><td>Diastolic</td><td><input type="number" value="110" class="v form-control"></td></tr>
                                        <tr><td>Blood pressure (mmHg)</td><td><span class="hwt form-control">150/110</span></td></tr>
                                        <tr><td>Height (cm)</td><td><input type="number" value="3.4" class="v form-control"></td></tr>
                                        <tr><td>Weight (kg)</td><td><input type="number" value="96" class="v form-control"></td></tr>
                                        <tr><td>BMI (Body Mass Index)</td><td><span class="hwt form-control">5.34</span></td></tr>
                                        <tr><td>Temperature (<sup>o</sup>C)</td><td><input value="39.6" type="number" class="v form-control"></td></tr>
                                        <tr><td>Heart rate (bpm)</td><td><input type="number" value="76" class="v form-control"></td></tr>
                                        <tr><td>Oxygen saturation</td><td><input type="number" value="1" class="v form-control"></td></tr>
                                        <tr><td>Respiration rate</td><td><input type="number" value="9" class="v form-control"></td></tr>
                                    </table>
                                    <div style="margin-top:10px; margin-bottom:5px; text-align: center">
                                        <input type="button" value="Save Vitals" class="btn login">
                                        <input type="reset" value="Re-take Vitals" class="btn reset">
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
            <script>
                function hideconsultationqueue(){
                $("#consultationqueue").hide(100);
                }
                function showconsultationqueue(){
                $("#consultationqueue").show(100);
                }
            </script>
            <div id="checkin" style="display:none">
                <div class="col-md-5" id="consultationqueue" style="display:nones; z-index:10; top:55px; padding:5px; position:absolute; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px" onclick="hideconsultationqueue()">
                        <span class="partialsheader">
                            Investigation Queue
                        </span>
                    </div>
                    <div style="margin-top:5px; text-align:center">
                        <span class="bt bts ptr" onclick="pulllabqueue('today')" id="pulltoday">Today</span> - 
                        <span class="bt ptr" onclick="pulllabqueue('legacyrecords')" id="pulllegacyrecords">Legacy queue</span>
                    </div>
                    <div style="margin-top:5px">
                        <table class="table table-condensed table-bordered">
                            <tr style="background-color:#919191; color:#fff; font-size:11px; font-weight:600"><td></td><td>Hosp ID</td><td>Name</td><td>C. Checkin</td><td>Check-in date</td><td></td><td>Reqsting Dr.</td><td></td></tr>
                            <tbody id="labqueuet">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="consultationpane" style="display:none">
                    <div class="col-md-8" style="padding:0px">
                        <div style="padding-bottom:10px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
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
                                        $t = "select * from investigation_queue where checkouttime='00:00:00' and checkindate ='$gt'";
                                        $qw = mysqli_query($w, $t);
                                        $gs = mysqli_num_rows($qw);
                                        echo "<span style='border-radius:20%; padding:2px; font-size:11px' id='invqueuecount'>$gs</span> ";
                                        ?> 
                                    </span> 
                                    Investigation Queue</span>
                                <span class="vitalsminimenu" onclick="invmenu('#docinvestigations', '#docinvestigationsm')" id="docinvestigations" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Investigation</span>
                                <span class="vitalsminimenuallergy" onclick="invmenu('#docvitals', '#docvitalsm')" id="docvitals" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Allergies</span>

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
                                            <span class="algy">Chloramphenicol</span>
                                            <span class="algy">Chloroquine</span>
                                            <span class="algy">Peanut Butter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="docinvestigationsm" style="display:none">
                                <div class="col-md-12 docmhead">
                                    <span class="dochead"><i class="fa fa-filter" style="color:#8F4A94"></i> Ordered Investigations</span>
                                </div>
                                <div class="col-md-8" style="padding-right:0px">
                                    <div class="col-md-12 cdcmini" style="padding:0px">

                                        <div style="margin-top:0px">
                                            <div id="orderedtests">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-top:0px; padding-left:0px; padding-right:5px">
                                    <div id="rezinputhere" style="background-color:#BFC9E3; min-height:50px; padding:5px; margin-bottom:5px">
                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left:5px">
                        <div style="text-align:center; margin-bottom: 10px; margin-top:10px; padding:10px">
                            <span class="vitalsminimenu vitalsminimenusel" style="border-top-left-radius: 5px; margin-right:3px; border-bottom-left-radius: 5px" onclick="docvitalsmenu('#vitalsr', '#vitalsreading')" id="vitalsr">Vitals Reading</span>
                            <span class="vitalsminimenuallergy" onclick="docvitalsmenu('#allergiesr', '#allergiesdisp')" id="allergiesr" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Allergies</span>
                            <span class='vitalsminimenuallergy' onclick='finishinvestigation(visitidgt.innerHTML)'>
                                Concluded; send to Dr.
                            </span>
                        </div>
                        <script>
                                    function finishinvestigation(a){
                                    var visitid = a;
                                    var action = "finishinvestigation";
                                    $.post("partials/investigationreq.php",{visitid:visitid, action:action}).done(function(data){
                                        alert(data);
                                    });
                                    }
                        </script>
                        <span id="vitalsreading" style="margin-top:20px;  width:400px; height:200px; background-color:rgba(0,0,0,0.1)">
                            <table class="table table-bordered table-striped table-condensed" style="max-width: 500px">
                                <tr><td>Systolic</td><td>140</td><td rowspan="2"> BP : 140/90</td></tr>
                                <tr><td>Diastolic</td><td>90</td></tr>
                                <tr><td>Height</td><td>140</td><td rowspan="2">BMI 3.54</td></tr>
                                <tr><td>Weight</td><td>140</td></tr>
                                <tr><td>Temperature</td><td>140</td></tr>
                                <tr><td>Heart Rate</td><td>140</td></tr>
                                <tr><td>Oxygen Saturation</td><td>140</td></tr>
                                <tr><td>Respiration rate</td><td>140</td></tr>
                            </table>
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
                        <span id="allergiesdisp" style="display:none">
                            <div style="font-size:20px; text-align:center">Allergies</div>
                            <center>
                                <span style="background-color:rgba(255,255,255,0.1); text-align: center; text-align:left; display:inline-block; padding:8px">
                                    <table style="width:350px" class="table-striped" style='max-width:350px; box-shadow: 1px 1px 1px #888888'>
                                        <thead style="background-color:#96290A; color:white; font-size:16px">
                                            <tr style="font-weight:500"><td></td><td>Allergy</td><td>Registered by</td></tr>
                                        </thead>
                                        <tbody id='allergyitemised'>
                                        </tbody>

                                    </table>
                                </span>
                            </center>
                        </span>
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
    setInterval(function () {
    pulllabqueue(csqueuetype);
    }, 5000);
</script>