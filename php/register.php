<?php
//상단 게시판 목록

//오류출력
error_reporting(E_ALL);
ini_set("display_errors", 1);

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

<body>

<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<?php include "../include/header.html"; ?>

<!-- ##### Header Area End ##### -->




<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Create account</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->



<!-- ##### Login Area Start ##### -->
<section class="login-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="login-content">
                    <h3>Create account</h3>
                    <!-- Login Form -->
                    <div class="login-form">
<!--                        <form action="signup-form" action="includes/sign_ok.php" method="post">-->
                        <form action="registerCheck.php" method="post">
                                <div class="form-group">
                                    <label for="inputEmail">Email address</label>
<!--                                    <input type="text" name="email" class="form-control"  placeholder="Enter E-mail">-->

                                    <input type="text" name="email" class="form-control"  placeholder="Enter E-mail">
                                    <!--                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter E-mail">-->
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Enter Name">
                                    <!--                                <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter Name">-->
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputEmail1">Email address</label>-->
<!--                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">-->
<!--                                <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="exampleInputPassword1">Password</label>-->
<!--                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
<!--                            </div>-->
                            <button type="submit" class="btn oneMusic-btn mt-30">Create account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Login Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="#"><img src ="../image/esens_emogi.png" width="30px" height="30px" alt="">Esens FanSite</a>
                <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Albums</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

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