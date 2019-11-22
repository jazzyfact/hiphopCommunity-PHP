<?php
include "../include/header.html";
include "../../pdo_db.php";
$pdo = connect();


error_reporting(E_ALL);
ini_set("display_errors", 1);

$idx = $_GET['idx'];
// 1. 게시글을 삭제하기 위한 sql문
$del_sql = "delete from free_talk where idx='$idx'";
$del_stt = $pdo->prepare($del_sql);
$del_stt->execute();


echo
"<script>
    window.alert('글이 정상적으로 삭제되었습니다!');
    location.href='../php/freeTalk.php';
  </script>";


//mysql 에러 출력구문
echo "\nPDOStatement::errorInfo()";
$arr = $del_stt->errorInfo();
print_r($arr);

error_reporting(E_ALL);
ini_set("display_errors", 1);


?>
