<?php
session_start();
include "../include/email.php";

include '../../pdo_db.php';

//앨범 게시판
//php/albums.php 앨범게시판 목록
//board/albumsWrite.html 앨범게시판 게시글 작성
//board/albumsInsert.php 게시글 작성 한 내용 받아서 db에 저장
//board/albumsRead.php 게시글 작성 읽는 곳
//board/albumsModify.php 게시글 작성 수정
//board/albumsUpdate.php Modify에서 보낸 값들을 받아서 수정한 내용을 db에 저장
//board/albumsDelete.php 게시글 삭제


$pdo = connect();
// 페이징에 필요한 변수 11개
// $_GET['page'], $list_size, $page_size, $first
// $total_list, $total_page, $row
// $start_page, $end_page, $back, $next
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$list_size = 5;
$page_size = 5;
$first = ($_GET['page'] * $list_size) - $list_size;
// 1. 리스트에 출력하기 위한 sql문
$list_sql = "select * from albums_board order by idx desc limit $first, $list_size";
$list_stt = $pdo->prepare($list_sql);
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

<?php include "../include/header.html";?>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../image/freeimage.jpg);">
    <div class="bradcumbContent">

  
        <h2>Albums</h2>

        <button type="button"  class="btn oneMusic-btn mt-5" onclick="location.href='../board/albumsWrite.html'">글쓰기</button>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Album Catagory Area Start ##### -->

<section class="album-catagory section-padding-100-0">

    <div class="container">
        <div class="row">

<!--            <div class="col-12">-->
<!--                <div class="browse-by-catagories catagory-menu d-flex flex-wrap align-items-center mb-70">-->
<!--                    <a href="#" data-filter="*">Browse All</a>-->
<!--                    <a href="#" data-filter=".a" class="active">A</a>-->
<!--                    <a href="#" data-filter=".b">B</a>-->
<!--                    <a href="#" data-filter=".c">C</a>-->
<!--                    <a href="#" data-filter=".d">D</a>-->
<!--                    <a href="#" data-filter=".e">E</a>-->
<!--                    <a href="#" data-filter=".f">F</a>-->
<!--                    <a href="#" data-filter=".g">G</a>-->
<!--                    <a href="#" data-filter=".h">H</a>-->
<!--                    <a href="#" data-filter=".i">I</a>-->
<!--                    <a href="#" data-filter=".j">J</a>-->
<!--                    <a href="#" data-filter=".k">K</a>-->
<!--                    <a href="#" data-filter=".l">L</a>-->
<!--                    <a href="#" data-filter=".m">M</a>-->
<!--                    <a href="#" data-filter=".n">N</a>-->
<!--                    <a href="#" data-filter=".o">O</a>-->
<!--                    <a href="#" data-filter=".p">P</a>-->
<!--                    <a href="#" data-filter=".q">Q</a>-->
<!--                    <a href="#" data-filter=".r">R</a>-->
<!--                    <a href="#" data-filter=".s">S</a>-->
<!--                    <a href="#" data-filter=".t">T</a>-->
<!--                    <a href="#" data-filter=".u">U</a>-->
<!--                    <a href="#" data-filter=".v">V</a>-->
<!--                    <a href="#" data-filter=".w">W</a>-->
<!--                    <a href="#" data-filter=".x">X</a>-->
<!--                    <a href="#" data-filter=".y">Y</a>-->
<!--                    <a href="#" data-filter=".z">Z</a>-->
<!--                    <a href="#" data-filter=".number">0-9</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="row oneMusic-albums">-->

            <!-- Single Album -->
            <!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">-->
            <!--                <div class="single-album">-->
            <!--                    <img src="../img/bg-img/a1.jpg" alt="">-->
            <!--                    <div class="album-info">-->
            <!--                        <a href="#">-->
            <!--                            <h5>The Cure</h5>-->
            <!--                        </a>-->
            <!--                        <p>Second Song</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--db에서 꺼낸 값들을 여기서 보여줌
            게시글 번호, 내용, 날짜 , 제목
            앨범게시판이라서 내용을 먼저 보여줌
            아직 썸네일은 적용안함-->
            <?php

            while ($list_row = $list_stt->fetch()) {
                ?>
                <!-- Single Album -->

                <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                    <div class="single-album">


                        <a href='../board/albumsRead.php?idx=<?= $list_row['idx'] ?>'><?= $list_row['idx'] ?>
                        <?= $list_row['content'] ?>
                            <br>
                        <div class="album-info">

                            <?= $list_row['date'] ?><br>
                            <?= $list_row['title'] ?><br><br>
                           <?echo "작성자 :"?><?= $list_row['name'] ?>
                        </div>

                    </div>
                </div>

                <?php
            }

            //페이징
            echo "</table>";
            // 2. 총 페이지를 구하기 위한 sql문
            $total_sql = "select count(*) from albums_board";
            $total_stt = $pdo->prepare($total_sql);
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
        </div>
        </div>

</section>





            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a1.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>The Cure</h5>-->
<!--                        </a>-->
<!--                        <p>Second Song</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item s e q">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a2.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Sam Smith</h5>-->
<!--                        </a>-->
<!--                        <p>Underground</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item w f r">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a3.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Will I am</h5>-->
<!--                        </a>-->
<!--                        <p>First</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t g u">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a4.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>The Cure</h5>-->
<!--                        </a>-->
<!--                        <p>Second Song</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item d h v">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a5.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>DJ SMITH</h5>-->
<!--                        </a>-->
<!--                        <p>The Album</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t i x">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a6.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>The Ustopable</h5>-->
<!--                        </a>-->
<!--                        <p>Unplugged</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item b j y">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a7.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Beyonce</h5>-->
<!--                        </a>-->
<!--                        <p>Songs</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item a k z">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a8.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Aam Smith</h5>-->
<!--                        </a>-->
<!--                        <p>Underground</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item w l number">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a9.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Will I am</h5>-->
<!--                        </a>-->
<!--                        <p>First</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item d m">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a10.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>DJ SMITH</h5>-->
<!--                        </a>-->
<!--                        <p>The Album</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t n">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a11.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>The Ustopable</h5>-->
<!--                        </a>-->
<!--                        <p>Unplugged</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album -->
<!--            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item b o">-->
<!--                <div class="single-album">-->
<!--                    <img src="../img/bg-img/a12.jpg" alt="">-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Beyonce</h5>-->
<!--                        </a>-->
<!--                        <p>Songs</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

</div>
</div>
</section>
<!-- ##### Album Catagory Area End ##### -->

<!-- ##### Buy Now Area Start ##### -->
<!--<div class="oneMusic-buy-now-area mb-100">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
            <!-- Single Album Area -->
<!--            <div class="col-12 col-sm-6 col-md-3">-->
<!--                <div class="single-album-area">-->
<!--                    <div class="album-thumb">-->
<!--                        <img src="../img/bg-img/b1.jpg" alt="">-->
                        <!-- Album Price -->
<!--                        <div class="album-price">-->
<!--                            <p>$0.90</p>-->
<!--                        </div>-->
                        <!-- Play Icon -->
<!--                        <div class="play-icon">-->
<!--                            <a href="../index.php" class="video--play--btn"><span class="icon-play-button"></span></a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Garage Band</h5>-->
<!--                        </a>-->
<!--                        <p>Radio Station</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album Area -->
<!--            <div class="col-12 col-sm-6 col-md-3">-->
<!--                <div class="single-album-area">-->
<!--                    <div class="album-thumb">-->
<!--                        <img src="../img/bg-img/b2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Noises</h5>-->
<!--                        </a>-->
<!--                        <p>Buble Gum</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album Area -->
<!--            <div class="col-12 col-sm-6 col-md-3">-->
<!--                <div class="single-album-area">-->
<!--                    <div class="album-thumb">-->
<!--                        <img src="../img/bg-img/b3.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Jess Parker</h5>-->
<!--                        </a>-->
<!--                        <p>The Album</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
            <!-- Single Album Area -->
<!--            <div class="col-12 col-sm-6 col-md-3">-->
<!--                <div class="single-album-area">-->
<!--                    <div class="album-thumb">-->
<!--                        <img src="../img/bg-img/b4.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="album-info">-->
<!--                        <a href="#">-->
<!--                            <h5>Noises</h5>-->
<!--                        </a>-->
<!--                        <p>Buble Gum</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <div class="load-more-btn text-center">-->
<!---->
<!--                    <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>-->
<!---->
<!---->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- ##### Buy Now Area End ##### -->

<!-- ##### Add Area Start ##### -->

<!-- ##### Add Area End ##### -->

<!-- ##### Song Area End ##### -->

<!-- ##### Contact Area Start ##### -->

<!-- ##### Contact Area End ##### -->

<!-- ##### Footer Area Start ##### -->

<?php include '../include/footer.html'; ?>
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