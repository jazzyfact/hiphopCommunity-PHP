<?php
include "../include/header.html";
include "../../pdo_db.php";


$pdo = connect();



$idx = $_GET['idx'];

// 수정을 위해서 전에 작성했던 글의 정보를 불러옴
$edit_sql = "select * from free_talk where idx = '$idx'";
$edit_stt = $pdo->prepare($edit_sql);
$edit_stt->execute();
$edit_row = $edit_stt->fetch();

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
            <div class="col-12 col-lg-9"  style="margin-left: 300px ">


                <div class="11" style="text-align: justify-all">
                <form action="../board/freeTalkUpdate.php?idx=<?= $_GET['idx'] ?>" method="post"  enctype="multipart/form-data" id="image_upload">
                    <!--        <form action="/page/board/update.php-->
                    <?php //echo edit_row['idx']; ?><!--" method="post">-->
                    <table>
                        <tr>
                            <td></td>
                            <td><input type="text" name="title" value="<?= $edit_row['title'] ?>"> </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><textarea  name="content" rows="8" cols="80"><?= $edit_row['content'] ?></textarea></td>
                        </tr>
                        <br><br>

                    </table>
                    <img src="../uploads/<?= $edit_row['image'] ?>" style="width: 500px; height: 500px; text-align: left"><br><br>
                    <input type="file" name="image" class="form-control" required="" accept="*/image" style="width: 500px;">

                    <br>

                    <input type="submit" value="Modify" class="btn oneMusic-btn-custom mt-5" style="text-align: center">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="button" value="Back" class="btn oneMusic-btn-custom mt-5"   style="text-align: center"  onclick="history.back(-1) ">

                </form>

















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