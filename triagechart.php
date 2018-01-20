
<?php
include 'partials/connect.php';
$hospid = $_GET['hospid'];
$hq = mysqli_query($w, "select visitid, checkindate from checkinlog where hospitalid='$hospid' limit 10");
$checkindates = "";
$sys = "";
$dias = "";
$hr = "";
$os = "";
$resprate = "";
while ($q = mysqli_fetch_array($hq)) {
    $visitid = $q['visitid'];
    $checkindate = $q['checkindate'];
    $checkindates .= "'" . $checkindate . "',";
    //Getsystolic value of visitid;
    $sys .= getvitalsinfo('systolic', $visitid) . ",";
    $dias .= getvitalsinfo('diastolic', $visitid) . ",";
    $hr .= getvitalsinfo('heartrate', $visitid) . ",";
    $os .= getvitalsinfo('oxygensaturation', $visitid) . ",";
    $resprate .= getvitalsinfo('respirationrate', $visitid) . ",";
}

function getvitalsinfo($columnname, $visitid) {
    GLOBAL $w;
    $wq = mysqli_query($w, "select $columnname from triage_vitals where visitid='$visitid'");
    $hq = mysqli_fetch_array($wq);
    $rez = $hq[$columnname];
    return $rez;
}

$checkindatelength = strlen($checkindates) -1;
$checkindatesn = substr($checkindates,0, $checkindatelength);

$syslength = strlen($sys)-1;
$sysval = substr($sys, 0, $syslength);

$diaslength = strlen($dias)-1;
$diasval = substr($dias, 0, $diaslength);

$hrlength = strlen($hr)-1;
$hrval = substr($hr, 0, $hrlength);

$resplength = strlen($resprate) - 1;
$respirate = substr($resprate, 0, $resplength);

?>
<canvas id='myChartvitals' width='400' height='120'></canvas>
<script>
    var ctx = document.getElementById('myChartvitals').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $checkindatesn; ?>],
            datasets: [{
                    label: 'Systolic',
                    data: [<?php echo $sysval; ?>],
                    backgroundColor: [
                        'rgba(21, 42, 63, 0.2)'
                    ],
                    borderColor: [
                        'rgba(21,42,63,1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Diastolic',
                    data: [<?php echo $diasval; ?>],
                    backgroundColor: [
                        'rgba(143, 74, 148, 0.2)'
                    ],
                    borderColor: [
                        'rgba(143,74,148,1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Heart Rate',
                    data: [<?php echo $hrval; ?>],
                    backgroundColor: [
                        'rgba(145, 174, 148, 0.2)'
                    ],
                    borderColor: [
                        'rgba(145,174,148,1)'
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