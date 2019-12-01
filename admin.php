<?php
include "../pdo_db.php";
$pdo = connect();

error_reporting(E_ALL);
ini_set("display_errors", 1);

//browser 구글 차트로 표시하려고 출력
$browser_sql = "SELECT count(browser) as count,browser from visitor_info group by browser";
$browser_stmt = $pdo->prepare($browser_sql);
$browser_stmt->execute();
$browser_arr = $browser_stmt->fetchAll(PDO::FETCH_ASSOC);

//사용자가 사용하는 os
$os_sql = "SELECT count(os) as count,os from visitor_info group by os";
$os_stmt = $pdo->prepare($os_sql);
$os_stmt->execute();
$os_arr = $os_stmt->fetchAll(PDO::FETCH_ASSOC);

//사용자가 접속한 나라
$country_sql = "SELECT count(country) as count,country from visitor_info group by country";
$country_stmt = $pdo->prepare($country_sql);
$country_stmt->execute();
$country_arr = $country_stmt->fetchAll(PDO::FETCH_ASSOC);

echo "\nPDOStatement::errorInfo()";
$arr = $country_stmt->errorInfo();
print_r($arr);
?>
<html>
<head>
    <!--구글차트 pieChart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawBrowserChart);
        google.charts.setOnLoadCallback(drawOsChart);
        google.charts.setOnLoadCallback(drawCountryChart);

        //방문자 사용한 브라우저 종류 나타내는 차트
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

        //방문한 사용자가 쓰는 os 종류 나타내는 차트
        function drawOsChart() {
            var data = google.visualization.arrayToDataTable([
                ['os', 'Count'],
                <?php foreach($os_arr as $key=>$val){?>
                ['<?php echo $val['os']?>', <?php echo $val['count']?>],
                <?php } ?>
            ]);
            var options = {
                title: 'os Count',
                is3D: true
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieOsChart'));
            chart.draw(data, options);
        }

        //방문한 사용자가 접속한 나라를 표시하는 차트
        function drawCountryChart() {
            var data = google.visualization.arrayToDataTable([
                    ['country', 'Count'],
                    <?php foreach($country_arr as $key=>$val){?>
                    ['<?php echo $val['country']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var barchartOptions = {
                title: 'Country Count',
                legend: 'none'
            };

            var barchart = new google.visualization.BarChart(document.getElementById('barCountryChart'));
            barchart.draw(data, barchartOptions);


        }


    </script>
</head>
<body>
<!--브라우저 원형 차트-->
<div id="pieBrowserChart" style="width: 500px; height: 400px;"></div>
<!--os 원형 차트-->
<div id="pieOsChart"  style="width: 500px; height: 400px;"></div>

<!--나라 막대기 차트-->
<div id="barCountryChart" style="width: 500px; height: 400px;"></div>
</body>
</html>