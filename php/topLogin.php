<?
session_start();
if(!isset($_SESSION['email']))
{
    ?>
   <p> <a href="php/login.php">Login&nbsp&nbsp</a>
    <a href="php/register.php" > Register</a></p>
    <?php
}
else
{
    ?>
    <p><?=$_SESSION['email']?>님</a>
        <a href="logout.php">로그아웃</a></p>
    <?php
}
?>
<!--  id="loginBtn"      id="SignUpBtn"          -->
