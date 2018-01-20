<?php
$w = mysqli_connect("localhost", "root", "", "tervecure") or die("Bad DB string");
error_reporting(0);

session_start();
$urlaccess = $_SESSION['urlaccess'];
$categoryname = $_SESSION['categoryname'];
$name = $_SESSION['name'];
$staffid = $_SESSION['staffid'];
?>
<script>

    var winloc = window.location.href;

    setInterval(function () {
        callall();
    }, 5000);

    function callall() {
        callcs();
        callpharm();
        calllab();
        callvs();
    }

    function callvs() {
        var action = "vs";
        $.post("partials/queuecount.php", {action: action}).done(function (vsdata) {
            document.getElementById("vitals").innerHTML = vsdata;
            //_v("vitals").innerHTML = vsdata;
            //vitals
        });
    }

    function callcs() {
        var action = "cs";
        $.post("partials/queuecount.php", {action: action}).done(function (csdata) {
            _v("consultation").innerHTML = csdata;
        });
        if (winloc === "http://localhost/terveCure/consultation.php" || winloc === "localhost/terveCure/consultation.php") {
            _v("csqueuecount").innerHTML = _v("consultation").innerHTML;
        }
    }

    function calllab() {
        var action = "lab";
        $.post("partials/queuecount.php", {action: action}).done(function (lbdata) {
            _v("laboratory").innerHTML = lbdata;
        });
        if (winloc === "localhost/terveCure/investigation.php" || winloc === "http://localhost/terveCure/investigation.php") {
            _v("invqueuecount").innerHTML = _v("laboratory").innerHTML;
        }
    }
    
    function callpharm() {
        var action = "pharmacy";
        $.post("partials/queuecount.php", {action: action}).done(function (phdata) {
            _v("pharmacy").innerHTML = phdata;
            //vitals
            if  (winloc === "http://localhost/terveCure/pharmacy.php" || winloc === "localhost/terveCure/pharmacy.php"){
            _v("pharmacyqueuecount").innerHTML = _v("pharmacy").innerHTML;
        }
        });
    }

    function logoff() {
        $.post("terminate_indexing.php");
        location.reload();
    }
</script>
<div class="col-md-12" style="margin-bottom:0px; border-bottom-style:solid; border-bottom-color:#E1E1E1; border-bottom-width:medium; background-color:#BCBCBC; font-size:12px; padding:3px; text-align:right">
    
    <span class=" minipads">
        <div class="minimotes">
            Vital Signs - 
            <?php
            $t = datenow();
            $r = "select * from triage_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
            $d = mysqli_query($w, $r);
            $g = mysqli_num_rows($d);
            echo "<span id='vitals'>$g</span>";
            ?>
        </div>
    </span>
    <span class="minipads">
        <div class="minimotes">
            Consultation -
            <?php
            $t = datenow();
            $r = "select * from consultation_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
            $d = mysqli_query($w, $r);
            $g = mysqli_num_rows($d);
            echo "<span id='consultation'>$g</span>";
            ?>
        </div>
    </span>
    <span class="minipads">
        <div class="minimotes">
            Laboratory - 
            <?php
            $t = datenow();
            $r = "select * from investigation_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
            $d = mysqli_query($w, $r);
            $g = mysqli_num_rows($d);
            echo "<span id='laboratory'>$g</span>";
            ?>
        </div>
    </span>
    <span class=" minipads">
        <div class="minimotes" >
            Pharmacy -
            <?php
            $t = datenow();
            $r = "select * from pharmacy_queue where checkindate = '$t' and checkoutdate = '0000-00-00'";
            $d = mysqli_query($w, $r);
            $g = mysqli_num_rows($d);
            echo "<span id='pharmacy'>$g</span>";
            ?>
        </div>
    </span>
    <span class=" minipads" data-toggle="modal" data-target='#myModal' onclick='reportProblem()'>
        <div class="minimotes" style="background-color:#E10D6C; color:#fff;">
            Suggestion/Complaint - <i class='fa fa-hand-o-up' style='font-weight:600'></i>
        </div>
    </span>
    <!--
    <span class=" minipads">
        <div class="minimotes">
            Billing -3
        </div>
    </span>
    <span class=" minipads">
        <div class="minimotes">
            Birthdays -3
        </div>
    </span>-->
    <span class=" minipads">
        <div class="user" style="background-color:#525252">
            <?php echo $name ?> - <i class="fa fa-power-off" style="color:red" onclick="logoff()"></i>
        </div>
    </span>
</div>