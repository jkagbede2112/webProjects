<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/fa/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <script src="JS/jquery-1.11.3.js" type="text/javascript"></script>
        <script src="JS/bootstrap.min.js" type="text/javascript"></script>
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>
            body{
                font-family:raleway;
            }
            .groupsearch{
                text-align: right; 
                border-top-style:dashed; 
                border-top-color:#8F4A94; 
                padding-top:5px; 
                margin-top:5px; 
                border-top-width:thin
            }

            .green{
                color:#16726D;
            }

            .red{
                color:#fff;
                padding:1px;
                background-color:#ff0000;
                border-radius:2px;
            }
            .okk{ 
                padding:10px;
                color:#ccc;
                cursor:pointer;
                transition: 0.5s;
                border-bottom-style: dashed;
                border-bottom-width: thin;
                border-bottom-color:#919191;
            }

            .partialsheader{
                font-size:20px; 
                color:#525252;
                font-weight:400;
            }

            .partialstitle{
                margin-bottom:10px; 
                color:#1883ba; 
                font-size:25px; 
                font-weight:300;
            }

            .knobctrl{
                font-size:20px;
                color:#398439;
                text-align: right;
            }

            .ptr{
                cursor:pointer;
            }

            .okk:hover{ 
                background-color:#CC9ECF;
                color:#000;
                cursor:pointer;
                transition: 0.5s;
                box-shadow: 0px 0px 1px #73DBB9;
            }

            .okks{
                background-color:#8F4A94;
                color:#fff;
                cursor:pointer;
                transition: 0.5s;
                box-shadow: 0px 0px 1px #73DBB9;
            }

            body{
                background-color:#ccc;
            }
            .x{
                display:inline-block; 
                text-align:center;
                margin-bottom:20px;
                cursor:pointer;
            }
            .dashcount{
                font-size:50px; 
                background-color:rgba(0,0,0,0.1); 
                border-radius:4px; 
                display:inline-block; 
                width:100%;
                padding:10px;
                font-family:raleway;
                transition:.5s;
                margin-top:5px;
                border-style:solid;
                border-width:thin;
                border-color:#DDDDDD;
            }

            .dashcount:hover{
                background-color:#BFC9E3;
                transition:.5s;
            }

            .dashlabels{
                font-size:20px;
                font-family:raleway;
                color:#8F4A94;
            }

            .addvehicle{
                width:100%;
                border-color:#EFE2EF;
                border-width:thin;
                border-style:solid;
                padding-left:10px;
                padding:4px;
            }

            .addvehicles{
                font-weight:400;
                margin-top:10px;
            }

            .dashsections{
                width:100%; 
                font-family:verdana; 
                font-size:12px;

            }
            td{
                padding:1px;
                padding-left:5px;
            }
            .briefstyle{
                background-color:#E1E1E1; 
                font-family: raleway; 
                padding:5px;
                padding-top:0px;
            }
            label{
                margin-top:5px;
                font-weight:500;
            }
            .selected{
                background-color:#CC9ECF; 
                padding:5px; 
                color:#fff;
                cursor:pointer;
            }
            .sel{
                cursor:pointer;
            }
            .sel:hover{
                color:#8F4A94;
                transition: 0.25s;
            }
            .ptr{
                font-size:12px;
            }
            html, body{
                height:100%;
            }

            .menuitems{
                padding:0px; 
                position:relative; 
                border-right-style: solid; 
                border-right-width:thin; 
                border-right-color: #8F4A94; 
                text-align:center;
                background-color:rgba(0,0,0,0.6); 
                height:100%
            }
        </style>
    </head>
    <body>
        <div class="col-md-1 menuitems">
            <img src="images/nurse.png" style="width:160px; position:absolute; bottom:0px; left:-25px">
            <div style="background-color:#8F4A94; height:20px">

            </div>
            <div style="min-height:40px; background-color:#9A9A9A; padding:15px; margin-bottom:10px">
                <img src="images/tervecure.png" width="100%"> 
            </div>
            <ul class="nav-sidebar" style='margin-top:10px;font-family:raleway; padding-left:0px; padding-top:30px; list-style:none'>
                <li class="okk okks" id='Dashboard' onclick="changemenu('#Dashboard', 1, 'dashboard.php')">
                    <i class="fa fa-th" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Dashboard</span>
                </li>
                <li class="okk" id='clientm' onclick="changemenu('#clientm', 2, 'client.php')">
                    <i class="fa fa-wpforms" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Registration</span>
                </li>
                <li class="okk" id='ancm' onclick="changemenu('#ancm', 2, 'anc.php')">
                    <i class="fa fa-clock-o" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Check-In</span>
                </li>
                <li class="okk" id='feedbackm' onclick="changemenu('#feedbackm', 3, 'feedback.php')">
                    <i class="fa fa-cogs" style="font-size:25px"></i><br>
                    <span style="font-size:12px">Setting</span>
                </li>
            </ul>
        </div>
        <div class="col-md-11" style="padding:0px">
            <div class="col-md-12" style="height:5px; background-color:#8F4A94; border-bottom-width:medium; border-bottom-style:solid; border-bottom-color:#E1E1E1"></div>
            <!-- Registration -->
            <div>
                <div class="col-md-4 briefstyle" id="brief" style="height:100% !important">
                    <table class=" table-condensed table-striped table-bordered">
                        <tr>
                            <td>HMO (12)</td><td>32214</td>
                        </tr>
                        <tr>
                            <td>Private</td><td>324</td>
                        </tr>
                        <tr>
                            <td>Kewalrams</td><td>214</td>
                        </tr>
                        <tr>
                            <td>NHIS</td><td>314</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8" style="height:100%; overflow-y:auto" id="filler">

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
