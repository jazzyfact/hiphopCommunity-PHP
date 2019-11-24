<?php

$db_host='127.0.0.1';
$db_user='hyemi';
$db_pass='dltpstmRkdalsgh!!';
$db_name='hiphop';

try {
    $db_conn= new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo $e->getMessage();
}

?>