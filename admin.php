<?php
include "../pdo_db.php";
$pdo = connect();

$pdo = connect();
$browser_sql="SELECT count(browser) as count,browser from visitor_info group by browser";
$browser_stmt=$pdo->prepare($browser_sql);
$browser_stmt->execute();
$browser_arr=$browser_stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawBrowserChart);
        google.charts.setOnLoadCallback(drawOsChart);
        function drawBrowserChart() {
            var data = google.visualization.arrayToDataTable([
                ['browser', 'Count'],
                <?php foreach($browser_arr as $key=>$val){?>
                ['<?php echo $val['browser']?>', <?php echo $val['count']?>],
                <?php } ?>
            ]);
            var options = {
                title: 'browser Count',
                is3D: true
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieBrowserChart'));
            chart.draw(data, options);
        }



    </script>
</head>
<body>
<div id="pieBrowserChart" style="width: 500px; height: 400px;"></div>

</body>
</html>