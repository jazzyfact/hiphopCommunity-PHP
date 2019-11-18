<?php
include "../../pdo_db.php";
$dbo = connect();
// 페이징에 필요한 변수 11개
// $_GET['page'], $list_size, $page_size, $first
// $total_list, $total_page, $row
// $start_page, $end_page, $back, $next
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$list_size = 10;
$page_size = 10;
$first = ($_GET['page'] * $list_size) - $list_size;
// 1. 리스트에 출력하기 위한 sql문
$list_sql = "select * from free_talk order by idx desc limit $first, $list_size";
$list_stt = $dbo->prepare($list_sql);
$list_stt->execute();


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
    <title>Hi Esens</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- 부트스트랩 -->
<!--    <link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!--버튼css-->
<!--        <link rel="stylesheet" type="text/css" href="../css/button.css"/>-->
    <style>

        #mydata {
            text-align: center;
            font-family: 'Do Hyeon', sans-serif;
            font-size: 20px;
        }
    </style>
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
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="../index.php" class="nav-brand"><img src="../image/esens_emogi.png" width="30px"
                                                                  height="30px" alt="">Esens FanSite</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="albums.php">Albums</a></li>
                                <li><a href="picture.php">Picture</a></li>
                                <li><a href="freetalk.php">FreeTalk</a></li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <a href="login.php" id="loginBtn">Login&nbsp&nbsp</a>
                                    <a href="register.php" id="SignUpBtn"> Register</a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->


<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../image/freeimage.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>FreeTalk</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">

                <!--부트스트랩 테이블 씀, 테이블 너비가 130% 비율로 꽉 차게 함-->
                <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 130%">

                    <tr>
                        <th width="70">번호</th>
                        <th width=50%>제목</th>
                        <th width="100">글쓴이</th>
                        <th width="120">작성일</th>
                        <th width="100">조회수</th>
                    </tr>
                    <br><br>
                    <a href="../board/freeTalkWrite.php"">
                    <button type="button" class="btn oneMusic-btn mt-50">글쓰기</button>
                    <br><br>

                    <?php
                    while ($list_row = $list_stt->fetch()) {
                        ?>
                        <tr>
                            <td><a href='read.php?num=<?= $list_row['idx'] ?>'><?= $list_row['idx'] ?></a></td>
                            <td><a href='read.php?num=<?= $list_row['idx'] ?>'><?= $list_row['title'] ?></a></td>
                            <td><?= $list_row['name'] ?></td>
                            <td><?= $list_row['date'] ?></td>
                            <td><?= $list_row['hit'] ?></td>
                        </tr>
                        <?php
                    }
                    echo "</table>";
                    // 2. 총 페이지를 구하기 위한 sql문
                    $total_sql = "select count(*) from free_talk";
                    $total_stt = $dbo->prepare($total_sql);
                    $total_stt->execute();
                    $total_row = $total_stt->fetch();
                    $total_list = $total_row['count(*)'];
                    $total_page = ceil($total_list / $list_size);
                    $row = ceil($_GET['page'] / $page_size);
                    $start_page = (($row - 1) * $page_size) + 1;
                    if ($start_page <= 0) {
                        $start_page = 1;
                    }
                    $end_page = ($start_page + $page_size) - 1;
                    if ($total_page < $end_page) {
                        $end_page = $total_page;
                    }
                    if ($_GET['page'] != 1) // 페이징 버튼은 $_GET['page'] 기준으로!
                    {
                        $back = $_GET['page'] - $page_size;
                        if ($back <= 0) // echo로 버튼을 찍기 전에 꼭 제한사항을 둘 것!
                        {
                            $back = 1;
                        }
                        echo "<a href='$_SERVER[PHP_SELF]?page=$back'>◀</a>";
                    }
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($_GET['page'] != $i) // !==가 아니라 !=이다!
                        {
                            echo "<a href='$_SERVER[PHP_SELF]?page=$i'>";
                        }
                        echo " [$i] ";
                        if ($_GET['page'] != $i) {
                            echo "</a>";
                        }
                    }
                    if ($_GET['page'] != $total_page) {
                        $next = $_GET['page'] + $page_size;
                        if ($total_page < $next) {
                            $next = $total_page;
                        }
                        echo "<a href='$_SERVER[PHP_SELF]?page=$next'>▶</a>";
                    }
                    ?>

                    </center>


                    <!-- Pagination -->
<!--                    <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">-->
<!--                        <nav>-->
<!--                            <ul class="pagination">-->
<!---->
<!--                                <li class="page-item active"><a class="page-link" href="#">01</a></li>-->
<!--                                <li class="page-item active"><a class="page-link" href="#">02</a></li>-->
<!--                                <li class="page-item active"><a class="page-link" href="#">03</a></li>-->
<!--                            </ul>-->
<!--                        </nav>-->
<!--                    </div>-->
                    <!--페이징 끝-->
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->


<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="../index.php" class="nav-brand"><img src="../image/esens_emogi.png" width="30px" height="30px"
                                                              alt="">Esens FanSite</a>
                <p class="copywrite-text"><a href="#">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="albums.php">Albums</a></li>
                        <li><a href="picture.php">Picture</a></li>
                        <li><a href="freetalk.php">FreeTalk</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->


<script>
    $('#mydata').dataTable();
</script>


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