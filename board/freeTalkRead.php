<?php
include "../include/header.html";
include "../../pdo_db.php";
//include "../../mysqli_db.php";
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
    <style>
        .reply { margin: 32px 0; background-color: #d8f3ff; }
        .reply .reply-component { padding: 8px 24px 48px 24px; }
        .reply .reply-component .reply-form .reply-info { display:flex; justify-content: flex-start; align-items : center; padding: 8px 0; font-size: 12px; }
        .reply .reply-component .reply-form .reply-info .rcol { margin-right: 16px; }
        .reply .reply-component .reply-form .reply-info .inline { display: inline-block; }
        .reply .reply-component .reply-form .reply-info .inline i {font-size: 23px; }
        .reply .reply-component .reply-form .reply-info .reply-control { width: 130px; position: relative; }
        .reply .reply-component .reply-form .reply-info .reply-control input { width: 100%; padding: 3px 5px; border: 0; outline: 0; background-color: #d8f3ff }
        .reply .reply-component .reply-form .reply-info .reply-control:after { content: ""; position: absolute; left: 0; bottom: -2px; height: 1px; width: 100%; background: #000; }
        .reply .reply-component .reply-form textarea { resize: none; height: 75px; }


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





                <!--- 댓글 입력 폼 -->
                <div class="dap_ins">
                    <input type="hidden" name="bno" class="bno" value="<?php echo $bno; ?>">
                 

                    <div style="margin-top:10px; ">
                        <textarea name="content" class="reply_content" id="re_content" ></textarea>
                        <button id="rep_bt" class="re_bt">댓글</button>
                    </div>
                </div>
            </div><!--- 댓글 불러오기 끝 -->
            <div id="foot_box"></div>







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

<script type="text/javascript" src="../js/common.js"></script>

<!--댓글-->
<!--    <script type="text/javascript">-->
<!--        $(document).ready(function () {-->
<!--            // $("#image").on('change', function () {-->
<!--            //     var filename = $(this).val();-->
<!--            //     $(".custom-file-label").html(filename);-->
<!--            // });-->
<!--            $("#comment_write").submit(function (e) {-->
<!--                e.preventDefault();-->
<!--                $.ajax({-->
<!--                    url: "free_comment_insert.php",-->
<!--                    method: 'post',-->
<!--                    processData: false,-->
<!--                    contentType: false,-->
<!--                    cache: false,-->
<!--                    data: new FormData(this),-->
<!--                    success: function (response) {-->
<!--                        $("#result").html(response);-->
<!--                        // load_images();-->
<!---->
<!--                        window.alert('댓글이 정상적으로 등록되었습니다!');-->
<!--                        location.href = 'freeTalkRead.php';-->
<!--                    }-->
<!--                });-->
<!--            });-->
<!--        });-->
<!--</script>-->


<!--댓글-->
<script>
    $(document).ready(function () {

        // get_replyServer(); 나중에 댓글리스트를 비동기로 가져올 작업을 하는 함수

        $("#reply-form").on("submit", function (e) {
            e.preventDefault();

            var me = $(this);  // form 자신
            var data = {
                contents : me[0].contents.value, // 내용
                reply : me[0].reply.value, // 본문번호 == $uid == DB::reply
            }

            var requestData = {
                url : "replyDo.php",
                method : "POST",
                data : data
            }

            replyServer(requestData);
        })
    });
  </script>

<script>
    function replyServer (param) {

        if (typeof param != "object") {
            console.error("Parameter type only Object !!");
            return false;
        }

        $.ajax({
            url : param.url,
            method : param.method,
            data : param.data,
            beforeSend : function () {
                $("#reply-btn").attr("disabled", true);
            },
            success : function (data) {
                // 서버에서 응답한 데이터가 매개변수인 data 로 넘어온다.
                $("#reply-btn").attr("disabled", false);
            },
            error : function (err) {
                console.log(err)
            }
        });
    }



</script>

</body>


</html>

<?php
//// 댓글들을 출력
//$comment_sql = "select * from free_talk_reply where free_number = {$_GET['idx']}";
//$comment_stt=$pdo->prepare($comment_sql);
//$comment_stt->execute();
//// $_SESSION['id']를 존재 유무에 따른 정보 정리
//if(!isset($_SESSION['email']))
//{
//    $id = 'guest';
//}
//else
//{
//    $id=$_SESSION['email'];
//}
//// 삭제와 수정의 권한
//$level_sql = "select * from register_board where email = '$email'";
//$level_stt=$pdo->prepare($level_sql);
//$level_stt->execute();
//$level_row=$level_stt->fetch();
//if(!isset($level_row['level']))
//{
//    $level_row['level']=2;
//}
//while($comment_row=$comment_stt->fetch())
//{
//    echo "<table>
//      <tr>
//        <td>글쓴이</td>
//        <td>{$comment_row['name']}</td>
//      </tr>
//      <tr>
//        <td>내용</td>
//        <td>{$comment_row['content']}</td>
//      </tr>
//      <tr>
//        <td>날짜</td>
//        <td>{$comment_row['date']}</td>
//      </tr>";
//    if($id==$comment_row['name'] || $level_row['level']==0)
//    {
//        echo "<tr>
//                <td><a href='screen_comment_edit.php?idx={$_GET['idx']}&no={$comment_row['idx']}&content={$comment_row['content']}'>수정</a></td>
//                <td><a href='screen_comment_del.php?idx={$_GET['idx']}&no={$comment_row['idx']}'>삭제</a></td>
//              </tr>";
//    }
//    echo "</table>";
//}
//?>