<?php
include "include/header.html";


//오류출력
error_reporting(E_ALL);
ini_set("display_errors", 1);


//echo $_REQUEST['email']. '     ' .$_REQUEST['name'] . ' 님 환영합니다';


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
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

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
                    <a href="../index.php" class="nav-brand"><img src ="../image/esens_emogi.png" width="30px" height="30px" alt="">Esens FanSite</a>

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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="php/profile.php">Profile</a></li>
                                <li><a href="php/albums.php">Albums</a></li>
                                <li><a href="php/picture.php">Picture</a></li>
                                <li><a href="php/freetalk.php">FreeTalk</a></li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">

                                    <a href="php/login.php" id="loginBtn">Login&nbsp&nbsp</a>
                                    <a href="php/register.php" id="SignUpBtn"> Register</a>
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


    <!-- ##### Hero Area Start ##### -->
    <!-- ##### 메인 페이지에서 슬라이드 사진 넘어가는 거 ##### -->
    <!-- ##### 첫번째 사진 ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(image/esens_profile.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">2019.07.22</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">이방인 <span>이방인</span></h2>
                                <form name="newUri" method="get" action="">
                                    <a data-animation="fadeInUp" data-delay="500ms"  onclick="return SubmitForm(this.form)" class="btn oneMusic-btn mt-50">Listen to Music <i class="fa fa-angle-double-right"></i></a>
<!--                                    <a data-animation="fadeInUp" data-delay="500ms" input type="button" value="캡쳐하기" onclick="return SubmitForm(this.form)" class="btn oneMusic-btn mt-50">Listen to Music <i class="fa fa-angle-double-right"></i></a>-->
                                </form>
                                <script>
                                    function SubmitForm(){
                                        var objPopup = window.open('https://music.bugs.co.kr/album/20266998?wl_ref=list_ab_03','myWindow','resizable=yes, top=0, left=100, width=1000, height=1000, scrollbars=no');
                                        document.newCapture.target="myWindow";      // 타켓
                                        document.newCapture.action="https://music.bugs.co.kr/album/20266998?wl_ref=list_ab_03";       // 수행할 경로
                                        if ( objPopup == null)                                  // 팝업이 뜨는지 확인
                                            alert('차단된 팝업창을 허용해 주세요');
                                        else{
                                            $("#SubmitForm").submit();
                                            objPopup.focus();
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ##### 두번째 사진, 콘서트 사진으로 함 ##### -->
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(image/concert.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">2019.12.28 ~ 29</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Strange No More <span>Strange No More</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="http://ticket.yes24.com/Pages/Perf/Detail/Detail.aspx?IdPerf=35487" class="btn oneMusic-btn mt-50">LIVE IN CONCERT<i class="fa fa-angle-double-right"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Albums</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>Single Album, Original Album List<br><br>
                            무료 공개 곡은 SoundCloud에서 들을 수 있다</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        <div class="single-album">
<!--                            <img src="image/backintime.jpg"  onclick="window.open('/php/popup.php', 'new', 'width=800, height=600, left=0, top=100, scrollbars=yes');" style="cursor:pointer">-->
                            <img src="image/backintime.jpg" class="click_img">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Back In Time</h5>
                                </a>
                                <p>2014.09.30 싱글</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="image/imgood.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>I'm Good</h5>
                                </a>
                                <p>2014.03.27 싱글</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="image/anecdote.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Anecdote</h5>
                                </a>
                                <p>2015.08.27 정규</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="image/mtla.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>MTLA</h5>
                                </a>
                                <p>2018.11.13 싱글</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="image/그xx아들같이.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>그XX아들같이</h5>
                                </a>
                                <p>2019.07.04 싱글</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="image/이방인.PNG" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>이방인</h5>
                                </a>
                                <p>2019.07.22 정규</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->


    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url("img/bg-img/bg-4.jpg");">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="image/esens_profile.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>한정판</p>
                            <h2>이방인</h2>
                        </div>
                        <p>DON`T WALK BEHIND ME; I MAY NOT LEAD <br>
                            DON`T WALK IN FRONT OF ME; I MAY NOT FOLLOW<br>
                            JUST WALK BESIDE ME AND BE MY FRIEND</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>11. RADAR (FEAT. 김심야) </p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->





    <!-- ##### Contact Area End ##### -->

<!--footer-->
<?php
include "include/footer.html";
?>



<!---->
<!--<script>-->
<!---->
<!--    function acyncMovePage("https://www.melon.com/album/detail.htm?albumId=10309465"){-->
<!--        // ajax option-->
<!--        var ajaxOption = {-->
<!--            url : "https://www.melon.com/album/detail.htm?albumId=10309465",-->
<!--            async : true,-->
<!--            type : "GET",-->
<!--            dataType : "html",-->
<!--            cache : false-->
<!--        };-->
<!---->
<!--        $.ajax(ajaxOption).done(function(data){-->
<!--            // Contents 영역 삭제-->
<!--            $('#bodyContents').children().remove();-->
<!--            // Contents 영역 교체-->
<!--            $('#bodyContents').html(data);-->
<!--        });-->
<!--    }-->
<!---->
<!--</script>-->



    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

<!--<script type="text/javascript">-->
<!--    var img = document.getElementsByClassName('click_img');-->
<!--    for (var x = 0; x < img.length; x++) {-->
<!--        type : "GET";-->
<!--        img.item(x).onclick=function() {window.open(this.src)};-->
<!--    }-->
<!--</script>-->
<!---->





</body>

</html>