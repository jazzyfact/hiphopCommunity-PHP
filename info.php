<?php


include "../pdo_db.php";
$pdo = connect();

//############################################################
//# START : 접속기록을 남긴다
//############################################################

function getBrowserInfo()
{
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


$user_agent = $_SERVER["HTTP_USER_AGENT"];
$browser = getBrowserInfo();
$os = getOsInfo();

$arrDay = array('일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일');
$date = date('w'); //0 ~ 6 숫자 반환
$referer = $_SERVER['HTTP_REFERER'];
$page_url = $_SERVER["PHP_SELF"];
$dayofweek = $arrDay[$date];
$visit_date = date("Y") . date("m") . date("d");
//$static_user_ip = getenv('REMOTE_ADDR');
$user_ip = $_SERVER['REMOTE_ADDR'];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$user_ip));
$country = $query['country'];
$regionName = $query['regionName'];
$city = $query['city'];
$lat = $query['lat'];
$lon = $query['lon'];
$timezone = $query['timezone'];


// https 접속일 경우만 기록한다. http 접속은 webalizer 에 기록된다
if (isSecure()) {
//$STATISTICS_QUERY = "INSERT INTO browser_info ( user_agent, browser, os, year, month, day, page_url, dayofweek, access_time, user_ip, enroll_date, signdate ) VALUES ( '$user_agent', '$browser', '$os', '$static_year', '$static_month', '$static_day', '$static_page_url', '$static_dayofweek', '$static_access_time', '$static_user_ip', '$static_enroll_date', '$static_signdate' ) ";
//
//$result = mysqli_query($connect,$STATISTICS_QUERY);


    $insert_sql = $pdo->prepare("insert into  visitor_info ( user_agent, browser, os, page_url,referer, dayofweek, visit_date,country, regionName,city, lat, lon , timezone ) VALUES ( '$user_agent', '$browser', '$os',  '$page_url', '$referer', '$dayofweek', '$visit_date','$country','$regionName' ,'$city' , '$lat' , '$lon' , '$timezone')");
    $insert_sql->bindValue(':user_agent', $user_agent);
    $insert_sql->bindValue(':browser', $browser);
    $insert_sql->bindValue(':os', $os);
    $insert_sql->bindValue(':page_url', $page_url);
    $insert_sql->bindValue(':referer', $referer);
    $insert_sql->bindValue(':dayofweek', $dayofweek);
    $insert_sql->bindValue(':visit_date', $visit_date);
//    $insert_sql->bindValue(':user_ip', $user_ip);
    $insert_sql->bindValue(':country', $country);
    $insert_sql->bindValue(':regionName', $regionName);
    $insert_sql->bindValue(':city', $city);
    $insert_sql->bindValue(':lat', $lat);
    $insert_sql->bindValue(':lon', $lon);
    $insert_sql->bindValue(':timezone', $timezone);
     $insert_sql->execute();



//mysql 에러 출력구문
//    echo "\nPDOStatement::errorInfo()";
//    $arr = $STATISTICS_QUERY->errorInfo();
//    print_r($arr);
}
//############################################################
//# END : 접속기록을 남긴다
//############################################################

?>


