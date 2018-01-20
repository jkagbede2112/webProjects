<?php

include 'connect.php';

$action = purifyentry("action");

if ($action === "pulltoday") {
    $tod = datenow();
    $q = "select checkinlog.hospitalid, checkinlog.visitid, checkinlog.checkintime, checkinlog.checkouttime,"
            . " patient_register.firstname, "
            . "patient_register.lastname from checkinlog inner join patient_register on "
            . "checkinlog.hospitalid = patient_register.hospitalid where checkinlog.checkindate='$tod'";
    $as = mysqli_query($w, $q);
    $count = 1;
    if (mysqli_num_rows($as) < 1) {
        echo "<tr class='wt'><td colspan='9' style='text-align:center;'>No body checked in</td></tr>";
    }
    while ($xx = mysqli_fetch_array($as)) {
        $patientname = strtoupper($xx['lastname']) . " " . $xx['firstname'];
        $hospitalid = $xx['hospitalid'];
        $checkintime = $xx['checkintime'];
        $visitid = $xx['visitid'];
        $checkout = $xx['checkouttime'];


        if ($checkout === "00:00:00") {
            $timenownow = timenow();
            $date1 = strtotime($timenownow);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $wtd = floor($timediff / (60));
            $waittime = $wtd . "min(s)";
            if ($wtd > 59) {
                $waittime = floor($wtd / 60) . "hr(s) " . $wtd % 60 . "min(s)";
            }
            $checkout = "-";
            echo "<tr class='wt inprog'><td>$count</td><td>$patientname</td><td>$hospitalid</td><td>$visitid</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td><td><i class='fa fa-times red' onclick='requestdelete(\"$visitid\")'></i></td><td style='text-align:center'><span class='vitalsminimenusel' style='font-size:12px; padding:5px; color:#ccc; cursor:pointer' onclick='checkout(\"$visitid\")'><i class='fa fa-street-view'></i> Check Out</span></td></tr>";
        } else {
            $date1 = strtotime($checkout);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $waittime = floor($timediff / (60)) . "min(s)";

            if ($waittime > 59) {
                $waittime = floor($waittime / 60) - 1 . "hr(s) " . $waittime % 60 . "min(s)";
            }
            echo "<tr class='wt inprog'><td>$count</td><td>$patientname</td><td>$hospitalid</td><td>$visitid</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td><td><i class='fa fa-times red' onclick='requestdelete(\"$visitid\")'></i></td><td style='text-align:center'><span style='color:blue'><i>Checked out</i></span></td></tr>";
        }
        $count++;
    }
}

if ($action === "dashboardwaittimereport") {
    $tod = purifyentry("rDate");
    $q = "select checkinlog.hospitalid, checkinlog.visitid, checkinlog.checkintime, checkinlog.checkouttime,"
            . " patient_register.firstname, "
            . "patient_register.lastname from checkinlog inner join patient_register on "
            . "checkinlog.hospitalid = patient_register.hospitalid where checkinlog.checkindate='$tod'";
    $as = mysqli_query($w, $q);
    $count = 1;
    
    //Get staffname for the day
    $getstaffname = getstaffnamefromdate($tod);

    $preparedstatement = "<center style='font-size:18px'><span style='font-size:13px'>On duty</span> - <span style='font-size:25px'>$getstaffname</span></center><br><table class='table table-striped table-bordered table-condensed'><tr style='font-weight:500; background-color:#8F4A94; color:#fff'><td></td><td>Name</td><td>Time In</td><td>Time-Out</td><td>Wait Time</td></tr><tbody style='height:100px; overflow-y:auto'>";
    if (mysqli_num_rows($as) < 1) {
        $preparedstatement .= "<tr><td style='text-align:center; background-color:#fff' colspan='5'>No check-In today</td></tr>";
    }
    while ($xx = mysqli_fetch_array($as)) {
        $patientname = strtoupper($xx['lastname']) . " " . $xx['firstname'];
        $hospitalid = $xx['hospitalid'];
        $checkintime = $xx['checkintime'];
        $visitid = $xx['visitid'];
        $checkout = $xx['checkouttime'];

        if ($checkout === "00:00:00") {
            $timenownow = timenow();
            $date1 = strtotime($timenownow);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $wtd = floor($timediff / (60));
            $waittime = $wtd . "min(s)";
            $checkout = "-";
            if ($wtd > 59) {
                //High Wait Time
                $waittime = floor($wtd / 60) . "hr(s) " . $wtd % 60 . "min(s)";
                $preparedstatement .= "<tr class='wt hwt' style='font-size:12px'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            } else {
                $preparedstatement .= "<tr class='wt inprog' style='font-size:12px'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            }
        } else {
            $date1 = strtotime($checkout);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $waittime = floor($timediff / (60)) . "min(s)";

            if ($waittime > 59) {
                //High Wait Time
                $waittime = floor($waittime / 60) . "hr(s) " . $waittime % 60 . "min(s)";
                $preparedstatement .= "<tr class='wt hwtfinished' style='font-size:12px'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            } else {
                //gwtfinished
                $preparedstatement .= "<tr class='wt gwtfinished' style='font-size:12px'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            }
        }
        $count++;
        
    }
    echo $preparedstatement . "</tbody></table>";
}

if ($action === "dashboardwaittime") {
    $tod = datenow();
    $q = "select checkinlog.hospitalid, checkinlog.visitid, checkinlog.checkintime, checkinlog.checkouttime,"
            . " patient_register.firstname, "
            . "patient_register.lastname from checkinlog inner join patient_register on "
            . "checkinlog.hospitalid = patient_register.hospitalid where checkinlog.checkindate='$tod'";
    $as = mysqli_query($w, $q);
    $count = 1;
    if (mysqli_num_rows($as) < 1) {
        echo "<tr><td style='text-align:center; background-color:#fff' colspan='5'>No check-In today</td></tr>";
    }
    while ($xx = mysqli_fetch_array($as)) {
        $patientname = strtoupper($xx['lastname']) . " " . $xx['firstname'];
        $hospitalid = $xx['hospitalid'];
        $checkintime = $xx['checkintime'];
        $visitid = $xx['visitid'];
        $checkout = $xx['checkouttime'];

        if ($checkout === "00:00:00") {
            $timenownow = timenow();
            $date1 = strtotime($timenownow);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $wtd = floor($timediff / (60));
            $waittime = $wtd . "min(s)";
            $checkout = "-";
            if ($wtd > 59) {
                //High Wait Time
                $waittime = floor($wtd / 60) . "hr(s) " . $wtd % 60 . "min(s)";
                echo "<tr class='wt hwt'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            } else {
                echo "<tr class='wt inprog'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            }
        } else {
            $date1 = strtotime($checkout);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            $waittime = floor($timediff / (60)) . "min(s)";

            if ($waittime > 59) {
                //High Wait Time
                $waittime = floor($waittime / 60) . "hr(s) " . $waittime % 60 . "min(s)";
                echo "<tr class='wt hwtfinished'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            } else {
                //gwtfinished
                echo "<tr class='wt gwtfinished'><td>$count</td><td>$patientname</td><td>$checkintime</td><td>$checkout</td><td>$waittime</td></tr>";
            }
        }
        $count++;
    }
}

if ($action === "averagewaittime") {
    $tod = datenow();
    $q = "select checkintime, checkouttime from checkinlog where checkindate='$tod'";

    $as = mysqli_query($w, $q);
    $patientcount = mysqli_num_rows($as);
    $count = 1;
    $timeinminutes = 0;
    $awt = "";
    $wtd = 0;
    while ($xx = mysqli_fetch_array($as)) {
        $checkintime = $xx['checkintime'];
        $checkout = $xx['checkouttime'];

        if ($checkout === "00:00:00") {
            $timenownow = timenow();
            $date1 = strtotime($timenownow);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;
            if ($timediff === 0) {
                $wtd = 0;
            } else {
                $wtd = floor($timediff / (60));
            }
            $timeinminutes += $wtd;
        } else {
            $date1 = strtotime($checkout);
            $date2 = strtotime($checkintime);
            $timediff = $date1 - $date2;

            if ($timediff === 0) {
                $wtd = 0;
            } else {
                $wtd = floor($timediff / (60));
            }
            $timeinminutes += $wtd;
        }
    }
    if ($wtd > 59) {
        $timeinminutes = $timeinminutes / $patientcount;
        $awt = floor($timeinminutes / 60) . "hr(s) " . $timeinminutes % 60 . "min(s)";
    } else {
        if ($timeinminutes === 0) {
            $awt = floor($timeinminutes) . "Min(s)";
        } else {
            $timeinminutes = $timeinminutes / $patientcount;
            $awt = floor($timeinminutes) . "Min(s)";
        }
    }
    if ($wtd > 59) {
        echo "$awt <i class='fa fa-thumbs-o-down' style='color:#cc3333'></i>";
    }
    if ($wtd > 29 && $wtd < 60) {
        echo "$awt <i class='fa fa-thumbs-o-up' style='color:#cc6600'></i>";
    }
    if ($wtd < 30) {
        echo "$awt <i class='fa fa-thumbs-o-up' style='color:#009999'></i>";
    }
}
