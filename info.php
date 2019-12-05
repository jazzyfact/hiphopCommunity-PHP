<?php


include "../pdo_db.php";
$pdo = connect();


//# START : 접속기록을 남긴다
//브라우저 정보, Explorer, Firefox, Chrome, Safari, Opera, Netscape, Other
function getBrowserInfo()
{
    //사용자의 웹 접속 환경 정보를 담고있는 php 전역변수
    $userAgent = $_SERVER["HTTP_USER_AGENT"];
    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browser = 'Internet Explorer';
    } else if (preg_match('/Firefox/i', $userAgent)) {
        $browser = 'Mozilla Firefox';
    } else if (preg_match('/Chrome/i', $userAgent)) {
        $browser = 'Google Chrome';
    } else if (preg_match('/Safari/i', $userAgent)) {
        $browser = 'Apple Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browser = 'Netscape';
    } else {
        $browser = "Other";
    }

    return $browser;
}

//사용자가 사용하는 os 출력
//linux, mac, windows, Other
function getOsInfo()
{
    $userAgent = $_SERVER["HTTP_USER_AGENT"];

    if (preg_match('/linux/i', $userAgent)) {
        $os = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        $os = 'mac';
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        $os = 'windows';
    } else {
        $os = 'Other';
    }

    return $os;
}

// https 접속일 경우 1을 반환한다
function isSecure()
{
    return
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
}


$user_agent = $_SERVER["HTTP_USER_AGENT"]; //사용자의 웹 접속 환경 정보 담고 있는 php 전역변수
$browser = getBrowserInfo(); //사용자가 접속한 브라우저 정보
$os = getOsInfo();// 사용자가 사용한 os
$arrDay = array('일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일');// 요일
$date = date('w'); //0 ~ 6 숫자 반환
$referer = $_SERVER['HTTP_REFERER']; //사용자가 어떻게 접속 했는지 알 수 있는 변수,
$page_url = $_SERVER["PHP_SELF"]; //사용하는 페이지 주소
$dayofweek = $arrDay[$date]; //요일
$visit_date = date("Y") . date("m") . date("d"); //날짜
//$static_user_ip = getenv('REMOTE_ADDR');
$user_ip = $_SERVER['REMOTE_ADDR']; //접속한 사용자의 ip 정보를 가지고있음
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$user_ip)); //사용자의 ip를 가지고 ip-api를 것을 이용해 나라, 지역이름,도시,위도,경도,시간을 받아 올 수 있음
$country = $query['country']; //나라
$regionName = $query['regionName']; //지역이름
$city = $query['city']; //도시
$lat = $query['lat'];//위도
$lon = $query['lon'];//경도
$timezone = $query['timezone'];//서버시간대


// https 접속일 경우만 기록한다.
if (isSecure()) {

    $insert_sql = $pdo->prepare("insert into  visitor_info ( user_agent, browser, os, page_url,referer, dayofweek, visit_date,country, regionName,city, lat, lon , timezone ) VALUES ( '$user_agent', '$browser', '$os',  '$page_url', '$referer', '$dayofweek', '$visit_date','$country','$regionName' ,'$city' , '$lat' , '$lon' , '$timezone')");
    $insert_sql->bindValue(':user_agent', $user_agent); //사용자 웹 접속 환경 변수
    $insert_sql->bindValue(':browser', $browser); //브라우저
    $insert_sql->bindValue(':os', $os);  //접속한 os
    $insert_sql->bindValue(':page_url', $page_url); //현재 접속한 페이지
    $insert_sql->bindValue(':referer', $referer);//이전에 접속한 사이트
    $insert_sql->bindValue(':dayofweek', $dayofweek); //요일
    $insert_sql->bindValue(':visit_date', $visit_date);//날짜
//    $insert_sql->bindValue(':user_ip', $user_ip);
    $insert_sql->bindValue(':country', $country);//나라
    $insert_sql->bindValue(':regionName', $regionName);//지역
    $insert_sql->bindValue(':city', $city);//도시
    $insert_sql->bindValue(':lat', $lat);//위도
    $insert_sql->bindValue(':lon', $lon);//경도
    $insert_sql->bindValue(':timezone', $timezone);//서버시간대
     $insert_sql->execute();
     
//mysql 에러 출력구문
//    echo "\nPDOStatement::errorInfo()";
//    $arr = $STATISTICS_QUERY->errorInfo();
//    print_r($arr);
}

?>


