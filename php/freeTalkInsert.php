<!---->
<?php
//session_start();
//include "../../pdo_db.php";
//include "../php/topLogin.php";
//
//
//?>

<?php

include "../../pdo_db.php";
include "../php/topLogin.php";
$pdo =connect();
if (!isset($_SESSION['email'])) {
echo "
<script>
    window.alert('로그인 후 이용해주세요');
    location.href='../php/login.php';
</script>";
} else if (!$_POST['title']) {
echo
"<script>
    window.alert('제목을 입력하세요.');
    history.back(-1);
</script>";
} else if (!$_POST['content']) {
echo
"<script>
    window.alert('내용을 입력하세요.');
    history.back(-1);
</script>";
} else {
// 게시판 글을 입력하는 문
$insert_sql = $pdo->prepare("insert into free_talk (title, name, content) VALUES (:title, :name, :content)");
$insert_sql->bindValue(':name', $_SESSION['email']);
$insert_sql->bindValue(':title', $_POST['title']);
$insert_sql->bindValue(':content', $_POST['content']);
$insert_sql->execute();

//mysql 에러 출력구문
//    echo "\nPDOStatement::errorInfo()";
//    $arr = $insert_sql->errorInfo();
//    print_r($arr);
echo
"<script>
    window.alert('글이 정상적으로 등록되었습니다!');

    //            location.href='error.php';


    location.href='../php/freeTalk.php';
</script>";
}


//php 에러 출력 부분
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

