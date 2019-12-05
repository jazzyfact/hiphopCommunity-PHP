<?php
session_start();
?>

<!-- 로그인을 하게 되면 이메일 값이 session에 저장된다
topLogin.php를 include 하면 어느 페이지에서든 로그인 된 화면을 가져다 쓸 수 있다-->

<?php
if(!isset($_SESSION['email']))//로그인한 아이디가 없을 때
{
    ?>
    <div class="login-register-cart-button d-flex align-items-center">
        <!-- Login/Register -->
        <div class="login-register-btn mr-50">
            <p><a href="../php/login.php">Login&nbsp&nbsp</a>
                <a href="../php/register.php">Register</a></p>
        </div>
    </div>


    <?php
}
else
{
    ?>
<!--로그인 성공하면-->
      <a href=""><?=$_SESSION['email']?> 님 환영합니다&nbsp&nbsp</a>
        <a href="../php/logOut.php">LogOut</a></p>

    <?php
}
?>
