<?php
/*회원 가입 체크 페이지
register.php에서 보낸 값들을 체크하고 저장*/
include "../../pdo_db.php"; //pdo
$pdo = connect();



$email = $_POST['email'];
// 1. 아이디 중복 검사
$check_sql = "select email from register_board where email='$email'";
$check_stt = $pdo->prepare($check_sql);
$check_stt->execute();
$check_row = $check_stt->fetch();

//예외처리
if (!$_POST['email']) {
    echo
    "<script>
      window.alert('이메일을 입력하세요.');
      history.back(-1);
    </script>";
}

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
    //회원가입 시작, 비밀번호 암호화
    $member_pass = md5($_POST['password']);
    // 2. 회원가입에 필요한 정보를 모두 입력했는지 확인 한 후, 테이블에 해당 정보를 입력하는 sql문
    $member_sql = $pdo->prepare("insert into register_board(email, password, name) values(:email, :password, :name)");
    $member_sql->bindValue(':email', $_POST['email']);
    $member_sql->bindValue(':password', $member_pass);
    $member_sql->bindValue(':name', $_POST['name']);
    $member_sql->execute();

    //mysql 에러 출력구문
//    echo "\nPDOStatement::errorInfo()";
//    $arr = $member_sql->errorInfo();
//    print_r($arr);

    //회원가입 성공 후 띄워주는 메세지
    echo
    "<script>
      window.alert('회원가입이 완료되었습니다!');
      location.href='/php/login.php';
    </script>";


}


?>
