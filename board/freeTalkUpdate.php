<?php
include "../include/header.html";
include "../../pdo_db.php";
$pdo = connect();


error_reporting(E_ALL);
ini_set("display_errors", 1);


if(!$_POST['title'])
{
    echo
    "<script>
      window.alert('제목을 입력하세요.');
      history.back(-1);
    </script>";
}
else if(!$_POST['content'])
{
    echo
    "<script>
      window.alert('내용을 입력하세요.');
      history.back(-1);
    </script>";
}
else
{


    $images=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $imageSize=$_FILES['image']['size'];

    $upload_dir='../uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $image=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$image);

    // 글을 수정
    $update_sql = "update free_talk set title=:title, content=:content, image=:image where idx={$_GET['idx']}";
    $update_stt=$pdo->prepare($update_sql);
    $update_stt->execute(
        array(
            ':title'=>$_POST['title'],
            ':content'=>$_POST['content'],
            ':image'=>$image
        )
    );

    //mysql 에러 출력
    echo "\nPDOStatement::errorInfo()";
    $arr = $update_stt->errorInfo();
    print_r($arr);

    echo
    "<script>
      window.alert('글을 정상적으로 수정하였습니다!');
      location.href='../php/freeTalk.php?idx={$_GET['idx']}';
    </script>";
}
?>
