
<?php
session_start();
include "../../pdo_db.php";
include "../php/topLogin.php";
$pdo = connect();
if(!isset($_SESSION['email']))
{
    echo
    "<script>
      window.alert('로그인 후 이용해주세요.');
      location.href='../php/login.php';
    </script>";
}
else if(!$_POST['title'])
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
    // 1. 게시판 글을 입력하는 sql문
    $insert_sql = "insert into free_talk(name, title, content)";
    $insert_sql .= "values(:name, :title, :content)";
    $insert_stt=$pdo->prepare($insert_sql);
    $insert_stt->execute(
        array(
            ':name'=>$_SESSION['email'],
            ':title'=>$_POST['title'],
            ':content'=>$_POST['content']
        )
    );
//    echo
//    "<script>
//      window.alert('글이 정상적으로 등록되었습니다!');
//      location.href='../php/freeTalk.php';
//    </script>";
}
?>
