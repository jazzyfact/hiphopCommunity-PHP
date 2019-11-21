<?php
include "../include/header.html";
include "../../pdo_db.php";


$dbo = connect();
// 페이징에 필요한 변수 11개
// 페이지 값이 없다면 1이되도록 지정
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$list_size = 5;//게시글 목록 개수
$page_size = 3;//게시글 밑에있는 페이징번호
$first = ($_GET['page'] * $list_size) - $list_size;//게시글의 리스트 수 첫번째 순서 = 페이지 순번*게시글의 수 - 게시글의 수
// 1. 리스트에 출력하기 위한 sql문
// 게시글 번호 첫번째부터 게시글의 수까지 거꾸로 출력
$list_sql = "select * from free_talk order by idx desc limit $first, $list_size";
$list_stt = $dbo->prepare($list_sql);
$list_stt->execute();

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
            <div class="col-12 col-lg-9">

                <!--부트스트랩 테이블 씀, 테이블 너비가 130% 비율로 꽉 차게 함-->
                <table class="table table-striped table-bordered table-hover" id="mydata" style="width: 130%">
                    <a href="../html/freeTalkWrite.html"">
                    <button type="button" class="btn oneMusic-btn mt-5">글쓰기</button></a>
                    <tr>
                        <th width="70">번호</th>
                        <th width=50%>제목</th>
                        <th width="100">글쓴이</th>
                        <th width="120">작성일</th>
                        <th width="100">조회수</th>
                    </tr>
                    <br><br>
<!--                    <a href="../html/freeTalkWrite.html"">-->
<!--                    <button type="button" class="btn oneMusic-btn mt-50">글쓰기</button>-->

                    <br><br>

                    <?php
                    while ($list_row = $list_stt->fetch()) {
                        ?>
                        <tbody>
                        <tr>
                            <td><a href='read.php?num=<?= $list_row['idx'] ?>'><?= $list_row['idx'] ?></a></td>
                            <td><a href='read.php?num=<?= $list_row['idx'] ?>'><?= $list_row['title'] ?></a></td>
                            <td><?= $list_row['name'] ?></td>
                            <td><?= $list_row['date'] ?></td>
                            <td><?= $list_row['hit'] ?></td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    echo "</table>";
                    // 2. 총 페이지를 구하기 위한 sql문
                    $total_sql = "select count(*) from free_talk"; //sql문을 total_sql에 저장
                    $total_stt = $dbo->prepare($total_sql);//total_sql변수에 배열로 total_stt저장
                    $total_stt->execute();//실행
                    $total_row = $total_stt->fetch();//결과를 목록 배열로 반환
                    $total_list = $total_row['count(*)'];//총 게시글의 수
                    $total_page = ceil($total_list / $list_size);
                    $row = ceil($_GET['page'] / $page_size);//현재 자신이 위치한 블럭의 수
                    $start_page = (($row - 1) * $page_size) + 1;//블럭에서 가장 첫번째 페이지
                   //페이지가 마이너스 되는 경우가 있어서 초기값을 1로 줌
                    if ($start_page <= 0) {
                        $start_page = 1;
                    }
                    //마지막 페이지가 총 페이지를 넘으면 안되기때문에 막음
                    $end_page = ($start_page + $page_size) - 1;//가장마지막페이지
                    if ($total_page < $end_page) {//총 페이지의 수
                        $end_page = $total_page;
                    }
                    if ($_GET['page'] != 1) // 페이징 버튼은 $_GET['page'] 기준으로!
                    {
                        $back = $_GET['page'] - $page_size;//뒤로가기
                        if ($back <= 0) // echo로 버튼을 찍기 전에 꼭 제한사항을 둘 것!
                        {
                            $back = 1;
                        }
                        //페이지 출력 부분
                        //페이지 넘길 때 마다 uri창에 해당 페이지 번호가 출력
                        echo "<a href='$_SERVER[PHP_SELF]?page=$back'>◀</a>";
                    }
                    //페이징 번호 버튼 출력
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

<!--                    </center>-->


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
                </table>
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