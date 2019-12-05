<!--게시글 수정하는 곳-->

<?php
include "../include/header.html";
include "../../pdo_db.php";


$pdo = connect();



$idx = $_GET['idx'];

// 수정을 위해서 전에 작성했던 글의 정보를 불러옴
$edit_sql = "select * from albums_board where idx = '$idx'";
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
    <title>Always Hiphop</title>


    <!--ck에디터4.7.1-->
    <script src="../js/jquery-1.7.2.min.js"  type="text/javascript"></script>
    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <!---->
    <link rel="stylesheet" href="../css/write.css">

    <!-- 부트스트랩 -->
    <!--    <link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">

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



<!-- ##### Breadcumb Area Start ##### -->
<!--상단 배경화면-->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../image/freeimage.jpg);">
    <div class="bradcumbContent">

        <h2>Albums Modify</h2>

    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<!---게시판 폼-->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9"  style="margin-left: 100px ">

<!--                <div class="11" style="text-align: justify-all">-->
                    <form action="../board/albumsUpdate.php?idx=<?= $_GET['idx'] ?>" method="post"  enctype="multipart/form-data" id="image_upload">

                            <input type="text" id="utitle" name="title"  size="70" rows="1" cols="90" maxlength="100"  value="<?= $edit_row['title'] ?>"/>
                            <textarea id="content" name="content"><?= $edit_row['content'] ?></textarea>
                        <input type="submit" value="작성" class="btn oneMusic-btn mt-5" style="text-align: center">
                        </form>
                        <!--이미지업로드는 imageUpLoad.php 로 감-->
                        <form id="img_upload_form" action="imageUpLoad.php" enctype="multipart/form-data" method="post" style="display:none;">
                            <input type='file' id="img_file" multiple="multiple" name='imgfile[]' accept="image/*">
                        </form>

                        <div id="ajaxImageModal" style="display:none;">
                            <div id="light" style="display: table;position: absolute;top:25%;left:25%;width:50%;height:50%; text-align:center; background-color:transparent; z-index:1002;overflow: auto;">
                                <div style="display: table-cell; vertical-align: middle;">
                                    <img src="../js/ckeditor/plugins/ajaximage/loading.gif" style="user-select: none; -ms-user-select: none;">
                                </div>
                            </div>
                        </div>

                    <br>
                    <br>

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


    <!--ck에디터-->
    <script src="../js/jquery.form.min.js" type="text/javascript"></script>
    <script src="../js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="../js/ckeditor/adapters/jquery.js" type="text/javascript"></script>
    <script>

        $('#content').ckeditor();
        //객체 생성
        var ajaxImage = {};
        // ckeditor textarea id
        ajaxImage["id"] = "content";
        // 업로드 될 디렉토리
        ajaxImage["uploadDir"] = "../uploads";
        // 한 번에 업로드할 수 있는 이미지 최대 수
        ajaxImage["imgMaxN"] = 10;
        // 허용할 이미지 하나의 최대 크기(MB)
        ajaxImage["imgMaxSize"] = 20;

    </script>




    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
<!--    <script src="../js/jquery/jquery-2.2.4.min.js"></script>-->
    <!-- Popper js -->
    <script src="../js/bootstrap/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js" type="text/javascript"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
</body>


</html>