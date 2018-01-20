$(document).ready(function () {
    $.ajax({
        url: "http://localhost/terveCure/chartjsonpull.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var dateadded = [];
            var systolic = [];
            var diastolic = [];

            for (var i in data) {
                dateadded.push("dateadded " + data[i].dateadded);
                systolic.push(data[i].systolic);
                diastolic.push(data[i].diastolic);
            }

            var chartdata = {
                labels: systolic,
                datasets: [
                    {
                        label: 'Systolic value',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: systolic
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
});