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
$pdo = connect();

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
    $insert_sql = $pdo->prepare("insert into albums_board (title, name, content) VALUES (:title, :name, :content)");
    $insert_sql->bindValue(':name', $_SESSION['email']);
    $insert_sql->bindValue(':title', $_POST['title']);
    $insert_sql->bindValue(':content', $_POST['content']);
    $insert_sql->execute();


    echo
    "<script>
    window.alert('글이 정상적으로 등록되었습니다!');
    location.href='../php/albums.php';
    //            location.href='error.php';
  
</script>";
}


//php 에러 출력 부분
error_reporting(E_ALL);
ini_set("display_errors", 1);

//mysql 에러 출력구문
//    echo "\nPDOStatement::errorInfo()";
//    $arr = $insert_sql->errorInfo();
//    print_r($arr);


//
//$conn = new mysqli("127.0.0.1", "hyemi", "dltpstmRkdalsgh!!", "hiphop");
//
//foreach ($_FILES['images']['name'] as $i => $value) {
//    $image_name = $_FILES['images']['tmp_name'][$i];
//    $folder = "uploads/";
//    $image_path = $folder . $_FILES['images']['name'][$i];
//    move_uploaded_file($image_name, $image_path);
//
//    $sql = "insert into images (image_path) values (?)";
//    $stmt = $conn->prepare($sql);
//    $stmt->bind_param("s", $image_path);
//    $stmt->execute();
//}
//echo "image Uploads 성공!!";

?>

