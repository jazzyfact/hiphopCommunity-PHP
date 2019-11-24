<?php
include "../include/header.html";
include "../../pdo_db.php";
$pdo = connect();


// 1. 리스트에서 클릭한 정보를 상세하게 불러오는 sql문
$read_sql = "select * from free_talk where idx = {$_GET['idx']}";
$read_stt = $pdo->prepare($read_sql);
$read_stt->execute();
$read_row = $read_stt->fetch();



//에러
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

    <!--    <style>-->
    <!---->
    <!--        #mydata {-->
    <!--            text-align: center;-->
    <!--            font-family: 'Do Hyeon', sans-serif;-->
    <!--            font-size: 20px;-->
    <!--        }-->
    <!--    </style>-->

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


<!-- ##### Header Area End ##### -->


<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../image/freeimage.jpg);">
    <div class="bradcumbContent">

        <h2>FreeTalk</h2>

    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9" style="margin-left: 300px ">


                <!--여기서 작성-->

                <div class="11" style="text-align: justify-all">



                    <?= $read_row['title'] ?>
                    <div class="date" style="text-align: center">
                        <?= $read_row['date'] ?></div>
                </div>


                <div id="bo_line"></div>
                <br>
                글쓴이: <?= $read_row['name'] ?><br>
                <?= $read_row['content'] ?><br><br>

                <img src="../uploads/<?= $read_row['image'] ?>"><br><br>
<!--                파일명:    --><?//= $read_row['image'] ?><!--"-->

                <br>
                <?php
                if (!isset($_SESSION['email'])) {
                    $now_id = 'guest';
                } else {
                    $now_id = $_SESSION['email'];
                }

                // 2. 리스트 테이블에서 이전과 다음으로 넘어가기 위해 num를 순서대로 출력하는 sql문
                $back_sql = "select * from free_talk where idx < {$_GET['idx']} order by idx desc";
                $back_stt = $pdo->prepare($back_sql);
                $back_stt->execute();
                $back_row = $back_stt->fetch();

                // 이전 버튼
                if (isset($back_row['idx'])) {
                    echo "<a href='$_SERVER[PHP_SELF]?idx={$back_row['idx']}'>[◀ 이전]</a>"; // 변수를 괄호 안에 넣어야한다!
                } else {
                    echo "[◀ 이전]";
                }
                $next_sql = "select * from free_talk where idx > {$_GET['idx']}";
                $next_stt = $pdo->prepare($next_sql);
                $next_stt->execute();
                $next_row = $next_stt->fetch();

                // 다음 버튼
                if (isset($next_row['idx'])) {
                    echo "<a href='$_SERVER[PHP_SELF]?idx={$next_row['idx']}'>[다음 ▶]</a>";
                } else {
                    echo "[다음 ▶]";
                }
                echo "<br><br>";

                // 3. 레벨을 검사하여 관리자인지 아닌지 확인한 후 수정과 삭제 출력 여부를 결정하는 sql문
                $level_sql = "select level from register_board where email = '$now_id'";
                $level_stt = $pdo->prepare($level_sql);
                $level_stt->execute();
                $level_row = $level_stt->fetch();
                // 로그인이 되어있지 않을 때는 level을 2로 지정
                if (!isset($level_row['level'])) {
                    $level_row['level'] = 2;
                }
                // 작성자와 로그인된 사용자가 같을 때, 또는 관리자일 때
                if ($read_row['name'] == $now_id || $level_row['level'] == 0) {
                    echo "<a href='../board/freeTalkModify.php?idx={$_GET['idx']}'> <input type=\"submit\" value=\"Modify\" class=\"btn oneMusic-btn-custom mt-5\" style=\"text-align: center\"></a>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <a href='../board/freeTalkDelete.php?idx={$_GET['idx']}'><input type=\"submit\" value=\"Delete\" class=\"btn oneMusic-btn-custom mt-5\" style=\"text-align: center\">
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>";
                }
                echo "<a href='../php/freeTalk.php'><input type=\"submit\" value=\"List\" class=\"btn oneMusic-btn-custom mt-5\" style=\"text-align: center\"></a>";
                ?>


                <br><br>
                <?php
                //include "comment.php";// 댓글 파일 include 한 것!


                // 4. 조회수를 늘리는 sql문
                $view_sql = "update free_talk set hit=hit+1 where idx = {$_GET['idx']}";
                $view_stt = $pdo->prepare($view_sql);
                $view_stt->execute();
                ?>
                </center>





            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->


<!-- ##### Footer Area Start ##### -->

<?php
include "../include/footer.html";
?>

<!-- ##### Footer Area Start ##### -->


<!--<script>-->
<!--    $('#mydata').dataTable();-->
<!--</script>-->


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