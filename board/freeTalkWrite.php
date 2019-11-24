<?php
include "../include/header.html";
include "../../pdo_db.php";



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

    <!---->
    <link rel="stylesheet" href="../css/write.css">

    <!-- 부트스트랩 -->
    <!--    <link href="../css/bootstrap.min.css" rel="stylesheet">-->
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!--버튼css-->
    <!--            <link rel="stylesheet" type="text/css" href="../css/button.css"/>-->

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




                <form action="../php/freeTalkInsert.php" method="post">
                    <div>
                        <input type="text" id="utitle" name="title" size="70" rows="1" cols="90" placeholder="제목"
                               maxlength="100"/>
                    </div>
                    <br>
                    <tr>

                        <td><textarea name="content" rows="20" cols="90" placeholder="내용"></textarea></td>
                    </tr>
                    </table>
                    <br>
                    <br>
                    <!-- 버튼 적용 -->
                    <input type="submit" value="글쓰기" class="btn oneMusic-btn mt-5" style="text-align: center">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="button" value="뒤로가기" onclick="history.back(-1)" class="btn oneMusic-btn mt-5" >
                    <!--                    <div class="bt_se">-->
                    <!--&lt;!&ndash;                        <input type="submit" value="글쓰기" class="btn-gradient blue mini">&ndash;&gt;-->
                    <!--&lt;!&ndash;                        <input type="button" value="뒤로가기" onclick="history.back(-1)" class="btn-gradient blue mini">&ndash;&gt;-->

                    <!--                    </div>-->
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