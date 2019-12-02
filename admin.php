<?php
/*내 홈페이지에 접속한 사용자들을 분석해서 보여주는 페이지
1.총 방문자 수
2.요일 별 방문자 수
3.날짜 별 방문자 수
4.접속한 브라우저
5.사용한 os
6.접속한 나라*/

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
$total_arr = $total_stmt->fetch();
$total_list = $total_arr['count(*)'];//총 게시글의 수

//주 방문자 수
$visit_date_sql = "SELECT count(visit_date) as count,visit_date from visitor_info group by visit_date";
$visit_date_stmt = $pdo->prepare($visit_date_sql);
$visit_date_stmt->execute();
$day_arr = $visit_date_stmt->fetchAll(PDO::FETCH_ASSOC);

//검색엔진
$referer_sql = "SELECT count(referer) as count,referer from visitor_info group by referer";
$referer_stmt = $pdo->prepare($referer_sql);
$referer_stmt->execute();
$referer_arr = $referer_stmt->fetchAll(PDO::FETCH_ASSOC);






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
        google.charts.setOnLoadCallback(drawDayChart); //요일별 방문자
        google.charts.setOnLoadCallback(drawVisitDateChart);//날짜별 방문자
        google.charts.setOnLoadCallback(drawBrowserChart);//사용하는 브라우저
        google.charts.setOnLoadCallback(drawOsChart);//사용하는 os
        google.charts.setOnLoadCallback(drawCountryChart);//접속한 나라
        google.charts.setOnLoadCallback(drawRefererChart);//이전에 접속한 사이트

        //요일별 방문자 접속 차트
        function drawDayChart() {
            var data = google.visualization.arrayToDataTable([
                    ['dayofweek', 'Count'],
                    <?php foreach($dayofweek_arr as $key=>$val){?>
                    ['<?php echo $val['dayofweek']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var Options = {
                title: '요일별 방문 자 수',
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };

            var daychart = new google.visualization.ColumnChart(document.getElementById('barDateTimeChart'));
            daychart.draw(data, Options);


        }

        //주 방문자 접속 차트
        function drawVisitDateChart() {
            var data = google.visualization.arrayToDataTable([
                    ['visit_date', 'Count'],
                    <?php foreach($day_arr as $key=>$val){?>
                    ['<?php echo $val['visit_date']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var Options = {
                title: '날짜별 방문 자 수',
                curveType: 'function',
                legend: { position: 'bottom' }

            };

            var daychart = new google.visualization.LineChart(document.getElementById('weekVisitorChart'));
            daychart.draw(data, Options);


        }



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
                title: '사용하는 OS',
                pieHole: 0.4,
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieOsChart'));
            chart.draw(data, options);
        }

        //방문한 사용자가 접속한 나라를 표시하는 차트
        function drawCountryChart() {
            var data = google.visualization.arrayToDataTable([
                    ['country','Count'],
                    <?php foreach($country_arr as $key=>$val){?>
                    ['<?php echo $val['country']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var chartOptions = {
                title: '접속한 나라',

                // series: {
                //     0: { color: '#a561bd' },
                //     1: { color: '#c784de' },
                //     2: { color: '#f1ca3a' },
                //     3: { color: '#2980b9' },
                //     4: { color: '#e67e22' }
                // }
            };

            var geochart = new google.visualization.GeoChart(document.getElementById('geoCountryChart'));
            geochart.draw(data, chartOptions);

            var donutChart = new google.visualization.PieChart(document.getElementById('donutCountryChart'));
            donutChart.draw(data, chartOptions);

        }


        //이전에 접속한 사이트
        function drawRefererChart() {
            var data = google.visualization.arrayToDataTable([
                    ['referer', 'Count'],
                    <?php foreach($referer_arr as $key=>$val){?>
                    ['<?php echo $val['referer']?>', <?php echo $val['count']?>],
                    <?php } ?>
                ]
            );
            var Options = {
                title: '검색 사이트 경로',

            };

            var daychart = new google.visualization.PieChart(document.getElementById('refererChart'));
            daychart.draw(data, Options);


        }

    </script>
</head>
<body>


<p align="center">총 방문자 수 :<?php echo $total_list;?></p>
<!--검색엔진 차트-->
<div id="refererChart" style="width: 1000px; height: 500px;"></div>
<!--요일별 방문자  차트-->
<div id="barDateTimeChart" style="width: 500px; height: 400px;"></div>
<!--날짜별 방문자 차트-->
<div id="weekVisitorChart" style="width: 1500px; height: 500px;"></div>
<!--접속한 브라우저 pie 원형 차트-->
<div id="pieBrowserChart" style="width: 700px; height: 400px;"></div>
<!--사용하는 os 도넛 차트-->
<div id="pieOsChart"  style="width: 800px; height: 500px;"></div>
<!--접속한 나라  pie 차트-->
<div id="donutCountryChart" style="width: 800px; height: 500px;"></div>
<!--접속한 나라 지도 geo 차트-->
<div id="geoCountryChart" style="width: 800px; height: 500px;"></div>

</body>
</html>