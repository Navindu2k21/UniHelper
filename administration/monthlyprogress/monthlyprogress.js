function search() {
    var year = document.getElementById("year").value;
    var month = document.getElementById("month").value;

    $.ajax({
        url: "monthlyprogressdb.php",
        type: "GET",
        data: { year: year, month: month },
        success: function(data) {
            var chartData = [];
            
            // Parse the XML response
            $(data).find('data').each(function() {
                var label = $(this).attr('label');
                var value = parseInt($(this).attr('value'), 10);
                
                chartData.push({ label: label, y: value });
            });

            // Render the chart with the parsed XML data
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Montly Progress"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column",
                    indexLabel: "{y}",
                    yValueFormatString: "#0",
                    showInLegend: false,
                    dataPoints: chartData
                }]
            });
            chart.render();
        },
        error: function() {
            console.error("Error fetching XML data.");
        }
    });
}
