<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="javascript/jquery-1.11.3.js" type="text/javascript"></script>
        <link href="css/terveCure.css" rel="stylesheet" type="text/css"/>
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>

        </style>
    </head>
    <body>
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
                        Patients count (2342)
                    </div>
                    <div style="padding-bottom:50px; margin-top:5px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">

                        <table class="table table-striped">
                            <tbody><tr style="font-weight:500; background-color:rgba(0,0,0,0.2); color:#fff"><td></td><td>Name</td><td>M/Status</td><td>Phone</td><td>Gender</td><td>D.O.B</td><td>Hospital ID</td><td title="Date added">D/A</td><td></td><td></td><td></td><td></td></tr>
                            </tbody><tbody id="namespacehere">
                                <tr style="font-size:12px"><td>1</td><td>JAMES Adebanjo</td><td>Single</td><td>080123662343</td><td>Male</td><td>2017-08-13</td><td>67565</td><td style="font-size:10px">2017-07-27 22:33:39</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 4 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 4 & quot; , & quot; Adebanjo JAMES & quot; , & quot; 080123662343 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS JAMES Adebanjo&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080123662343,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>2</td><td>ADEMOKUN Ibrahim</td><td>Single</td><td>08034203576</td><td>Male</td><td>2015-12-29</td><td>5353</td><td style="font-size:10px">2017-07-12 14:02:01</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 3 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 3 & quot; , & quot; Ibrahim ADEMOKUN & quot; , & quot; 08034203576 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS ADEMOKUN Ibrahim&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(08034203576,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>3</td><td>AGBEDE Kayode</td><td>Single</td><td>080342632778</td><td>Female</td><td>0000-00-00</td><td>6767</td><td style="font-size:10px">2017-07-10 16:30:54</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 1 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 1 & quot; , & quot; Kayode AGBEDE & quot; , & quot; 080342632778 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS AGBEDE Kayode&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080342632778,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>1</td><td>JAMES Adebanjo</td><td>Single</td><td>080123662343</td><td>Male</td><td>2017-08-13</td><td>67565</td><td style="font-size:10px">2017-07-27 22:33:39</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 4 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 4 & quot; , & quot; Adebanjo JAMES & quot; , & quot; 080123662343 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS JAMES Adebanjo&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080123662343,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>2</td><td>ADEMOKUN Ibrahim</td><td>Single</td><td>08034203576</td><td>Male</td><td>2015-12-29</td><td>5353</td><td style="font-size:10px">2017-07-12 14:02:01</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 3 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 3 & quot; , & quot; Ibrahim ADEMOKUN & quot; , & quot; 08034203576 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS ADEMOKUN Ibrahim&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(08034203576,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>3</td><td>AGBEDE Kayode</td><td>Single</td><td>080342632778</td><td>Female</td><td>0000-00-00</td><td>6767</td><td style="font-size:10px">2017-07-10 16:30:54</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 1 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 1 & quot; , & quot; Kayode AGBEDE & quot; , & quot; 080342632778 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS AGBEDE Kayode&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080342632778,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>1</td><td>JAMES Adebanjo</td><td>Single</td><td>080123662343</td><td>Male</td><td>2017-08-13</td><td>67565</td><td style="font-size:10px">2017-07-27 22:33:39</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 4 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 4 & quot; , & quot; Adebanjo JAMES & quot; , & quot; 080123662343 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS JAMES Adebanjo&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080123662343,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>2</td><td>ADEMOKUN Ibrahim</td><td>Single</td><td>08034203576</td><td>Male</td><td>2015-12-29</td><td>5353</td><td style="font-size:10px">2017-07-12 14:02:01</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 3 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 3 & quot; , & quot; Ibrahim ADEMOKUN & quot; , & quot; 08034203576 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS ADEMOKUN Ibrahim&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(08034203576,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
                                <tr style="font-size:12px"><td>3</td><td>AGBEDE Kayode</td><td>Single</td><td>080342632778</td><td>Female</td><td>0000-00-00</td><td>6767</td><td style="font-size:10px">2017-07-10 16:30:54</td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-pencil-square-o ptr green" onclick="updateclient( & quot; 1 & quot; )"></i></td><td><i data-toggle="modal" data-target="#myModal" class="fa fa-times ptr red" onclick="deleteclient( & quot; 1 & quot; , & quot; Kayode AGBEDE & quot; , & quot; 080342632778 & quot; )"></i></td><td></td><td><i class="fa fa-newspaper-o ptr" data-toggle="popover" data-html="true" data-placement="left" data-content="<textarea id=&quot;msgthisclient&quot; onkeyup=&quot;countmsgthisclient()&quot; style=&quot;margin-bottom:5px;&quot; class=&quot;form-control&quot;></textarea><input type=&quot;button&quot; class=&quot;btn btn-warning&quot; value=&quot;SMS AGBEDE Kayode&quot; style=&quot;padding:2px&quot; onclick=&quot;sendthisclient(080342632778,msgthisclient.value)&quot;> <span id=&quot;everycount&quot;></span>" data-original-title="" title=""></i></td></tr>
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
            <div id="checkin" style="display:none">
                <div class="col-md-4" style="display:none;padding:5px; font-weight:500; padding-top:0px; background-color:#E1E1E1">
                    <div style="background-color:#BFC9E3; padding:10px">
                        <span class="partialsheader">
                            Consultation
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
                    <div style="padding-bottom:10px; font-family:raleway; background-color:rgba(255,255,255,0.2); max-height:700px; overflow-y:auto">
                        <div style="margin:10px">
                            <span style="font-size:25px; display:block"><i class="fa fa-refresh recrud fa-spin"></i> Agbede Joseph Kayode</span>
                            <span class="vitalclient">Gender : Female</span>
                            <span class="vitalclient">Payment plan : HMO (Mediplan)</span>
                            <span class="vitalclient">Age : 24yrs</span>
                            <hr style="border-style:dashed; border-color:#bcbcbc; margin-top:5px; margin-bottom:5px">
                        </div>
                        <div style="padding-bottom:5px; text-align:center">
                            <span class="vitalsminimenu vitalsminimenusel" onclick="miniconsultmenu('#doclastvisits', '#doclastvisitsm')" id="doclastvisits" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Last 3 visit summary</span>
                            <span class="vitalsminimenuallergy" onclick="miniconsultmenu('#docvitals', '#docvitalsm')" id="docvitals" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Allergies</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#doccomplaints', '#doccomplaintsm')" id="doccomplaints" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Complaints</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#docpexams', '#docpexamsm')" id="docpexams" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Phy. Examination</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#docinvestigations', '#docinvestigationsm')" id="docinvestigations" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px">Investigation</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#docdiagnosis', '#docdiagnosism')" id="docdiagnosis" style="">Diagnosis</span>
                            <span class="vitalsminimenu" onclick="miniconsultmenu('#docprescription', '#docprescriptionm')" id="docprescription" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px">Prescription</span>

                        </div>
                        <script>
                                    function miniconsultmenu(a, b){
                                    $("#doclastvisitsm").hide();
                                            $("#docvitalsm").hide();
                                            $("#doccomplaintsm").hide();
                                            $("#docpexamsm").hide();
                                            $("#docinvestigationsm").hide();
                                            $("#docdiagnosism").hide();
                                            $("#docprescriptionm").hide();
                                            $(b).show();
                                            $(".vitalsminimenu").removeClass("vitalsminimenusel");
                                            $(a).addClass("vitalsminimenusel");
                                    }
                        </script>
                        <div id="doclastvisitsm" style="padding:10px;">
                            <div class="col-md-12" style="background-color:#ccc; margin-bottom:10px; padding:10px; padding-left:0px;">
                                <div style="text-align:right; font-size:16px;color:#525252; margin-bottom:4px;"><span style="padding-bottom:3px; border-bottom-style:solid; border-bottom-width: thin">24th July 2017</span> &nbsp; <i class="fa fa-print ptr"></i></div>
                                <div class="col-md-8" style="padding-left:0px; margin-bottom:10px; padding-left:10px; border-right-style: dashed; border-color:#E1E1E1; border-right-width:thin">
                                    <div class="sd">
                                        <span class="kk">Complaint(s)</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Constant headaches</span>
                                            <span class="reset">Neck-Pain</span>
                                            <span class="reset">Sweaty palm</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Investigation</span>
                                        <span style="font-size:12px">
                                            <span class="reset">FBS:</span>
                                            <span class="reset">Blood Count</span>
                                            <span class="reset">HVS</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Diagnosis</span>
                                        <span style="font-size:12px">
                                            {
                                            <span class="reset">Essential (primary) hypertension</span>
                                            <span class="reset">Malaria</span>
                                            <span class="reset">Angina pectoris</span>
                                            }
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Prescription</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Paracetamol 50mg</span>
                                            <span class="reset">Abactal 100mg</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-left:10px">
                                    <div style="font-size:16px; font-weight:500; margin-bottom:5px">Vitals</div>
                                    <span class="login br">BP: 150/90</span>
                                    <span class="login br">Temp: 36.7</span>
                                    <span class="login br">Pulse: 80bpm</span>
                                    <span class="login br">Oxygen S.: 80%</span>
                                    <span class="login br">BMI: 5.23</span>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color:#ccc; margin-bottom:10px; padding:10px; padding-left:0px;">
                                <div style="text-align:right; font-size:16px;color:#525252; margin-bottom:4px;"><span style="padding-bottom:3px; border-bottom-style:solid; border-bottom-width: thin">17th July 2017</span> &nbsp; <i class="fa fa-print ptr"></i></div>
                                <div class="col-md-8" style="padding-left:0px; margin-bottom:10px; padding-left:10px; border-right-style: dashed; border-color:#E1E1E1; border-right-width:thin">
                                    <div class="sd">
                                        <span class="kk">Complaint(s)</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Constant headaches</span>
                                            <span class="reset">Neck-Pain</span>
                                            <span class="reset">Sweaty palm</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Investigation</span>
                                        <span style="font-size:12px">
                                            <span class="reset">FBS:</span>
                                            <span class="reset">Blood Count</span>
                                            <span class="reset">HVS</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Diagnosis</span>
                                        <span style="font-size:12px">
                                            {
                                            <span class="reset">Essential (primary) hypertension</span>
                                            <span class="reset">Malaria</span>
                                            <span class="reset">Angina pectoris</span>
                                            }
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Prescription</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Paracetamol 50mg</span>
                                            <span class="reset">Abactal 100mg</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-left:10px">
                                    <div style="font-size:16px; font-weight:500; margin-bottom:5px">Vitals</div>
                                    <span class="login br">BP: 150/90</span>
                                    <span class="login br">Temp: 36.7</span>
                                    <span class="login br">Pulse: 80bpm</span>
                                    <span class="login br">Oxygen S.: 80%</span>
                                    <span class="login br">BMI: 5.23</span>
                                </div>
                            </div>
                            <div class="col-md-12" style="background-color:#ccc; padding:10px; padding-left:0px;">
                                <div style="text-align:right; font-size:16px;color:#525252; margin-bottom:4px;"><span style="padding-bottom:3px; border-bottom-style:solid; border-bottom-width: thin">7th July 2017</span> &nbsp; <i class="fa fa-print ptr"></i></div>
                                <div class="col-md-8" style="padding-left:0px; margin-bottom:10px; padding-left:10px; border-right-style: dashed; border-color:#E1E1E1; border-right-width:thin">
                                    <div class="sd">
                                        <span class="kk">Complaint(s)</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Constant headaches</span>
                                            <span class="reset">Neck-Pain</span>
                                            <span class="reset">Sweaty palm</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Investigation</span>
                                        <span style="font-size:12px">
                                            <span class="reset">FBS:</span>
                                            <span class="reset">Blood Count</span>
                                            <span class="reset">HVS</span>
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Diagnosis</span>
                                        <span style="font-size:12px">
                                            {
                                            <span class="reset">Essential (primary) hypertension</span>
                                            <span class="reset">Malaria</span>
                                            <span class="reset">Angina pectoris</span>
                                            }
                                        </span>
                                    </div>
                                    <div class="sd">
                                        <span class="kk">Prescription</span>
                                        <span style="font-size:12px">
                                            <span class="reset">Paracetamol 50mg</span>
                                            <span class="reset">Abactal 100mg</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-left:10px">
                                    <div style="font-size:16px; font-weight:500; margin-bottom:5px">Vitals</div>
                                    <span class="login br">BP: 150/90</span>
                                    <span class="login br">Temp: 36.7</span>
                                    <span class="login br">Pulse: 80bpm</span>
                                    <span class="login br">Oxygen S.: 80%</span>
                                    <span class="login br">BMI: 5.23</span>
                                </div>
                            </div>
                        </div>
                        <div id="docvitalsm" style="display:none">
                            <div class="col-md-12 docmhead">
                                <span class="dochead"><i class="fa fa-odnoklassniki" style="color:#8F4A94"></i> Allergies</span>
                            </div>
                            <div class="col-md-4" style="padding:0px; padding-left:10px">
                                <label>
                                    New Allergy
                                </label>
                                <input type="text" class="form-control">
                                <input type="button" value="Add allergy" class="btn reset" style="margin-top:5px">
                            </div>
                            <div class="col-md-8" style="margin-bottom:10px; margin-top:20px;padding:10px; padding-left:10px; border-right-style: dashed; border-color:#E1E1E1; border-right-width:thin">
                                <div class="col-md-12" style="background-color: #ccc; padding:10px">
                                    <div style="font-size:18px">
                                        <span class="algy">Chloramphenicol</span>
                                        <span class="algy">Chloroquine</span>
                                        <span class="algy">Peanut Butter</span>
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
                                        <input type="text" class="form-control">
                                        <label>Duration</label>
                                        <input type="text" class="form-control">
                                        <label>History</label>
                                        <textarea class="form-control"></textarea>
                                        <input type="button" value="Register Complaint" class="btn reset" style="margin-top:10px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color:rgba(0,0,0,0.1)">
                                        <tr style="font-weight:600"><td></td><td>Complain</td><td>Duration</td><td>History</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px">
                                        <tr><td>1</td><td>Sleeplessness</td><td>1 day(s)</td><td>Began after fist fighting a mermaid in my dream</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                        <tr><td>2</td><td>Eye pain</td><td>4 day(s)</td><td>This commenced when I began taking anti malaria medication</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="docpexamsm" style="display:none">
                            <div class="col-md-12 docmhead">
                                <span class="dochead"><i class="fa fa-sign-language" style="color:#8F4A94"></i> Physical Examination</span>
                            </div>
                            <div class="col-md-4 cdc">
                                <div class="col-md-12 cdcmini" style="padding:0px">

                                    <div style="margin-top:10px">
                                        <label>Presenting Complaint</label>
                                        <input type="text" class="form-control">
                                        <label>Duration</label>
                                        <input type="text" class="form-control">
                                        <label>History</label>
                                        <textarea class="form-control"></textarea>
                                        <input type="button" value="Register Complaint" class="btn reset" style="margin-top:10px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color:rgba(0,0,0,0.1)">
                                        <tr style="font-weight:600"><td></td><td>Complain</td><td>Duration</td><td>History</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px">
                                        <tr><td>1</td><td>Sleeplessness</td><td>1 day(s)</td><td>Began after fist fighting a mermaid in my dream</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                        <tr><td>2</td><td>Eye pain</td><td>4 day(s)</td><td>This commenced when I began taking anti malaria medication</td><td><i class="fa fa-times red ptr"></i></td></tr>
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
                                        <label>Presenting Complaint</label>
                                        <input type="text" class="form-control">
                                        <label>Duration</label>
                                        <input type="text" class="form-control">
                                        <label>History</label>
                                        <textarea class="form-control"></textarea>
                                        <input type="button" value="Register Complaint" class="btn reset" style="margin-top:10px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color:rgba(0,0,0,0.1)">
                                        <tr style="font-weight:600"><td></td><td>Complain</td><td>Duration</td><td>History</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px">
                                        <tr><td>1</td><td>Sleeplessness</td><td>1 day(s)</td><td>Began after fist fighting a mermaid in my dream</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                        <tr><td>2</td><td>Eye pain</td><td>4 day(s)</td><td>This commenced when I began taking anti malaria medication</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>         
                        <div id="docdiagnosism" style="display:none">
                            <div class="col-md-12 docmhead">
                                <span class="dochead"><i class="fa fa-user-md" style="color:#8F4A94"></i> Diagnosis</span>
                            </div>
                            <div class="col-md-4 cdc">
                                <div class="col-md-12 cdcmini" style="padding:0px">

                                    <div style="margin-top:10px">
                                        <label>Presenting Complaint</label>
                                        <input type="text" class="form-control">
                                        <label>Duration</label>
                                        <input type="text" class="form-control">
                                        <label>History</label>
                                        <textarea class="form-control"></textarea>
                                        <input type="button" value="Register Complaint" class="btn reset" style="margin-top:10px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7" style="margin-top:0px; padding-left:0px; padding-right:0px">
                                <table class="table table-striped table-bordered">
                                    <thead style="background-color:rgba(0,0,0,0.1)">
                                        <tr style="font-weight:600"><td></td><td>Complain</td><td>Duration</td><td>History</td><td></td></tr>
                                    </thead>
                                    <tbody style="font-size:12px">
                                        <tr><td>1</td><td>Sleeplessness</td><td>1 day(s)</td><td>Began after fist fighting a mermaid in my dream</td><td><i class="fa fa-times red ptr"></i></td></tr>
                                        <tr><td>2</td><td>Eye pain</td><td>4 day(s)</td><td>This commenced when I began taking anti malaria medication</td><td><i class="fa fa-times red ptr"></i></td></tr>
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
                                        <select class="form-control">
                                            <option>Anti-Malarials</option>
                                            <option>Anti-Diabetics</option>
                                            <option>Muscular pain</option>
                                        </select>
                                        <div style="background-color:rgba(255,255,255,0.1); max-height:400px; overflow-y: auto; margin-top:10px; padding-top:10px; overflow-x:auto; overflow-y:auto">
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                            <div class="zs">Paracetamol Extra</div>
                                            <div class="zs">ACT Panadols</div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:5px">
                                <div class="col-md-12 cdcmini xcx" style="margin-bottom:10px">
                                    <span style="font-size:12px">(Anti-analgesic)</span>
                                    <div style="font-size:25px">Panadol 50mg</div><span style="font-size:20px;">340</span><span style="font-size:11px">Qty left</span>
                                </div>
                                <div class="col-md-12 cdcmini xcx">
                                    <div style="font-size:25px; margin-bottom:10px">Dosage</div>
                                    
                                    <span style="font-size:14px;">Dose/No of tablets</span>
                                    <input type="number" class="form-control">
                                    <select class="form-control">
                                        <option value="1">OD</option>
                                        <option value="2">BD</option>
                                        <option value="3">TDS</option>
                                        <option value="4">QDS</option>
                                        <option value="1">PRN</option>
                                    </select>
                                    <span style="font-size:14px;">No. of days</span>
                                    <input type="number" class="form-control">
                                    <input type="button" value="Prescribe" class="btn reset" style="margin-top:5px">
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:5px">
                                <table class="table table-condensed table-striped table-bordered">
                                    <tr style="font-weight:500; background-color:#BFC9E3"><td></td><td>Drug</td><td>Dosage</td><td>Qty</td></tr>
                                    <tr><td>1</td><td>Paracetamol Extra (Amodaquine)</td><td>2x5x3</td><td>30</td></tr>
                                    <tr><td>2</td><td>Ampicillin</td><td>2x3x4</td><td>24</td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding-left:5px">
                    <div style="text-align:center; margin-bottom: 10px; margin-top:10px; padding:10px">
                        <span class="vitalsminimenu vitalsminimenusel" onclick="docvitalsmenu('#vitalsr', '#vitalsreading')" id="vitalsr">Vitals Reading</span>
                        <span class="vitalsminimenu" onclick="docvitalsmenu('#redovitalsr', '#redovitals')" id="redovitalsr">Re-take Vitals</span>
                        <span class="vitalsminimenuallergy" onclick="docvitalsmenu('#allergiesr', '#allergiesdisp')" id="allergiesr">Allergies</span>
                    </div>
                    <script>
                                function docvitalsmenu(a, b){
                                $("#vitalsreading").hide();
                                        $("#redovitals").hide();
                                        $("#allergiesdisp").hide();
                                        $(b).show();
                                        $(".vitalsminimenu").removeClass("vitalsminimenusel");
                                        $(a).addClass("vitalsminimenusel");
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
                    <span id="redovitals" style="display:none; text-align:center">
                        <div style="font-size:20px">Re-take vitals</div>
                        <center>
                            <span style="background-color:rgba(255,255,255,0.1); text-align: center; text-align:left; display:inline-block; padding:8px">
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
                        </center>
                    </span>
                    <span id="allergiesdisp" style="display:none">
                        <div style="font-size:20px; text-align:center">Allergies</div>
                        <center>
                        <span style="background-color:#FBBBA2; text-align: center; text-align:left; display:inline-block; padding:8px">
                            
                                <table style="width:350px" class="table-striped">
                                    <thead style="background-color:#96290A; color:white; font-size:16px">
                                        <tr style="font-weight:500"><td></td><td>Allergy</td><td>Registered by</td></tr>
                                    </thead>
                                    <tr><td>1</td><td>Chloramphenicol</td><td>Mrs. Adesuyin</td></tr>
                                    <tr><td>2</td><td>Ampicillin</td><td>Dr. Adedoyin</td></tr>
                                </table>
                        </span>
                            </center>
                    </span>
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
