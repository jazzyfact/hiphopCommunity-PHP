<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Always Hiphop</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

</head>


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
<div class="login-register-cart-button d-flex align-items-center">
    <!-- Login/Register -->
    <div class="login-register-btn mr-50">
    <p>    <a href=""><?=$_SESSION['email']?> 님 환영합니다&nbsp&nbsp</a>
        <a href="../php/logOut.php">LogOut</a></p>
    </div>
</div>/

    <?php
}
?>

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="../js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="../js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="../js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="../js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="../js/active.js"></script>
</body>

</html>