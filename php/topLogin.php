<?php
session_start();
?>



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

      <a href=""><?=$_SESSION['email']?> 님 환영합니다&nbsp&nbsp</a>
        <a href="../php/logOut.php">LogOut</a></p>

    <?php
}
?>
