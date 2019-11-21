<?php
include "../../pdo_db.php"; //pdo
//include "../../mysqli_db.php";

$pdo = connect();


$email = $_POST['email'];
// 1. table에서 중복 된 아이디가 있는지 검사하는 sql문
$check_sql = "select email from register_board where email='$email'";
$check_stt = $pdo->prepare($check_sql);
$check_stt->execute();
$check_row = $check_stt->fetch();
if (!$_POST['email']) {
    echo
    "<script>
      window.alert('이메일을 입력하세요.');
      history.back(-1);
    </script>";
}
// 여기닷! sql문을 사용한 곳!

else if ($check_row['email'] == $_POST['email']) {
    echo
    "<script>
      window.alert('중복된 이메일이 존재합니다.');
      location.href='/php/register.php';
    </script>";
} else if (!$_POST['password']) {
    echo
    "<script>
      window.alert('비밀번호를 입력하세요.');
      history.back(-1);
    </script>";
} else if (!$_POST['name']) {
    echo
    "<script>
      window.alert('이름을 입력하세요.');
      history.back(-1);
    </script>";
}

else{
    $member_pass = md5($_POST['password']);
    // 2. 회원가입에 필요한 정보를 모두 입력했는지 확인 한 후, 테이블에 해당 정보를 입력하는 sql문
    $member_sql = $pdo->prepare("insert into register_board(email, password, name) values(:eamil, :password, :name)");
    $member_sql->bindValue(':email', $_POST['email']);
    $member_sql->bindValue(':password', $member_pass);
    $member_sql->bindValue(':name', $_POST['name']);
    $member_sql->execute();

    //mysql 에러 출력구문
    echo "\nPDOStatement::errorInfo()";
    $arr = $member_sql->errorInfo();
    print_r($arr);

    echo
    "<script>
      window.alert('회원가입이 완료되었습니다!');
      location.href='/php/login.php';
    </script>";


}


?>
