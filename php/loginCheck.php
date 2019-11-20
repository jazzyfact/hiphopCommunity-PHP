
<?php
include "../../pdo_db.php"; //pdo
include "/php/topLogin.php";

$pdo = connect();
$email = $_POST['email'];
$password = md5($_POST['password']);

// 1. table에 있는 아이디와 패스워드가 맞는지 확인하는 sql문
$login_sql = "select * from register_board where email = '$email' and password = '$password'";
$login_stt=$pdo->prepare($login_sql);
$login_stt->execute();
//여기닷!!
$login_row=$login_stt->rowCount();

if(!$_POST['email'])
{
    echo
    "<script>
      window.alert('이메일을 입력하세요.');
      history.back(-1);
    </script>";
}
else if(!$_POST['password'])
{
    echo
    "<script>
      window.alert('비밀번호를 입력하세요.');
      history.back(-1);
    </script>";
}
else
{
    if(!$login_row)
    {
        echo
        "<script>
        window.alert('비밀번호 또는 비밀번호가 일치하지 않습니다.');
        history.back(-1);
      </script>";
    }
    else
    {
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$password;
        echo "<script>location.href='../index.html';</script>";
    }
}
?>
