<?php

include 'connect.php';

$hospitalid = purifyentry("hospid");

echo "<canvas id='myChart' width='400' height='170'></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['15th Oct 2017', '20th Oct 2017', '24th Oct 2017', '27th Oct 2017', '29th Oct 2017'],
            datasets: [{
                    label: 'Systolic',
                    data: [128, 145, 114, 142, 152, 182],
                    backgroundColor: [
                        'rgba(21, 42, 63, 0.2)'
                    ],
                    borderColor: [
                        'rgba(21,42,63,1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Diastolic',
                    data: [84, 94, 85, 89, 85, 92],
                    backgroundColor: [
                        'rgba(143, 74, 148, 0.2)'
                    ],
                    borderColor: [
                        'rgba(143,74,148,1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Heart Rate',
                    data: [65, 90, 85, 70, 90, 42],
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
</script>";