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

//요일별 방문자 수

$dayofweek_sql = "SELECT count(dayofweek) as count,dayofweek from visitor_info group by dayofweek";
$dayofweek_stmt = $pdo->prepare($dayofweek_sql);
$dayofweek_stmt->execute();
$dayofweek_arr = $dayofweek_stmt->fetchAll(PDO::FETCH_ASSOC);

//총 방문자수

$total_sql = "SELECT count(*)from visitor_info ";
$total_stmt = $pdo->prepare($total_sql);
$total_stmt->execute();
$total_arr = $total_stmt->fetchAll(PDO::FETCH_ASSOC);
echo print_r($total_arr);;

//지도 차트
//$geo_sql = "SELECT count(dayofweek) as count,dayofweek from visitor_info group by dayofweek";
//$dayofweek_stmt = $pdo->prepare($dayofweek_sql);
//$dayofweek_stmt->execute();
//$dayofweek_arr = $dayofweek_stmt->fetchAll(PDO::FETCH_ASSOC);





//echo "\nPDOStatement::errorInfo()";
//$arr = $country_stmt->errorInfo();
//print_r($arr);
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
        google.charts.setOnLoadCallback(drawDateTimeChart);
        google.charts.setOnLoadCallback(drawVisiterTotalChart);


        //방문자 사용한 브라우저 종류 나타내는 차트
        function drawBrowserChart() {
            var data = google.visualization.arrayToDataTable([
                ['browser', 'Count'],
                <?php foreach($browser_arr as $key=>$val){?>
                ['<?php echo $val['browser']?>', <?php echo $val['count']?>],
                <?php } ?>
            ]);
            var options = {
                title: '접속한 브라우저',
                legend: { position: 'bottom' },
                series: {
                    0: { color: '#a561bd' },
                    1: { color: '#c784de' },
                    2: { color: '#f1ca3a' },
                    3: { color: '#2980b9' },
                    4: { color: '#e67e22' }
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('pieBrowserChart'));
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
                series: {
                    0: { color: '#a561bd' },
                    1: { color: '#c784de' },
                    2: { color: '#f1ca3a' },
                    3: { color: '#2980b9' },
                    4: { color: '#e67e22' }
                }
            };

            var barchart = new google.visualization.GeoChart(document.getElementById('geoCountryChart'));
            barchart.draw(data, barchartOptions);

            var barchart = new google.visualization.PieChart(document.getElementById('barCountryChart'));
            barchart.draw(data, barchartOptions);

        }


        //방문한 사용자가 요일을 표시하는 차트
        function drawDateTimeChart() {
            var data = google.visualization.arrayToDataTable([
                    ['dayofweek', 'Count'],
                    <?php foreach($dayofweek_arr as $key=>$val){?>
                    ['<?php echo $val['dayofweek']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var barchartOptions = {
                title: 'date Count',
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var barchart = new google.visualization.ColumnChart(document.getElementById('barDateTimeChart'));
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
<!--나라 막대기 차트-->
<div id="geoCountryChart" style="width: 500px; height: 400px;"></div>



<!--날짜 시간별 차트-->
<div id="barDateTimeChart" style="width: 500px; height: 400px;"></div>

<!--총 방문자 차트-->
<div id="total" style="width: 500px; height: 400px;"></div>


</body>
</html>