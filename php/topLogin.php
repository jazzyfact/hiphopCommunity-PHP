<?php
session_start();
if(!isset($_SESSION['email']))//로그인한 아이디가 없을 때
{
    ?>
    <p><a href="../php/login.php">Login&nbsp&nbsp</a>
        <a href="../php/register.php">Register</a></p>
    <?php
}
else
{
    ?>
    <p><?=$_SESSION['email']?> 님 환영합니다&nbsp&nbsp</a>
        <a href="logout.php">LogOut</a></p>
    <?php
}
?>
