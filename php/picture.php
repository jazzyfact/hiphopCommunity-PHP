<?php
/*지금은 안쓰는 페이지
사진게시판
인피니티 페이징 하던 곳 템플릿 js 문제 때문에 페이징이 제대로 안됨.
그래서 이 페이지는 쓰지 않음
*/
include "../../scroll_data.php";



//오류출력
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
<!--    <meta name="description" content="">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Hi Esens</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <!---->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../image/freeimage.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Picture</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Events Area Start ##### -->
<!--<section class="events-area section-padding-100">-->
<!--    <div class="container">-->
<!--        <div class="row">-->




<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 results">

        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    var start = 0;
    var limit = 2;
    var reachedMax = false;

    $(window).scroll(function () {
        if ($(window).scrollTop() === $(document).height() - $(window).height())
            getData();
    });

    $(document).ready(function () {
        getData();
    });

    function getData() {
        if (reachedMax)
            return;

        $.ajax({
            url: '../scroll_data.php',
            method: 'POST',
            dataType: 'text',
            data: {
                getData: 1,
                start: start,
                limit: limit
            },
            success: function(response) {
                if (response === "reachedMax")
                    reachedMax = true;
                else {
                    start += limit;
                    $(".results").append(response);
                }
            }
        });
    }
</script>







            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e1.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Dj Night Party</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">VIP Sala</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e2.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>The Mission</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Gold Arena</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e3.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Planet ibiza</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Space Ibiza</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e4.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Dj Night Party</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">VIP Sala</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e5.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>The Mission</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Gold Arena</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e6.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Planet ibiza</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Space Ibiza</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e7.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Dj Night Party</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">VIP Sala</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e8.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>The Mission</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Gold Arena</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!-- Single Event Area -->
<!--            <div class="col-12 col-md-6 col-lg-4">-->
<!--                <div class="single-event-area mb-30">-->
<!--                    <div class="event-thumbnail">-->
<!--                        <img src="../img/bg-img/e9.jpg" alt="">-->
<!--                    </div>-->
<!--                    <div class="event-text">-->
<!--                        <h4>Planet ibiza</h4>-->
<!--                        <div class="event-meta-data">-->
<!--                            <a href="#" class="event-place">Space Ibiza</a>-->
<!--                            <a href="#" class="event-date">June 15, 2018</a>-->
<!--                        </div>-->
<!--                        <a href="#" class="btn see-more-btn">See Event</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->

<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <div class="load-more-btn text-center mt-70">-->
<!--                    <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- ##### Events Area End ##### -->




<!-- ##### Footer Area Start ##### -->
<?php include "../include/footer.html"; ?>
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