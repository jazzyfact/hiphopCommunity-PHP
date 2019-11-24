<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>업로드</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="bg-dark">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light">
            <h3 class="text-center  ">멀티 이미지 업로드</h3>
<!--            <form action="test2.php" method="post" >-->
<!--                <input type="text" id="utitle" name="title" size="70" rows="1" cols="90" placeholder="제목"-->
<!--                       maxlength="100"/>-->
<!--            </form>-->

            <form action="view.php" method="post" enctype="multipart/form-data" id="image_upload">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="text" id="utitle" name="title" size="70" rows="1" cols="90" placeholder="제목"
                               maxlength="100"/>
                        <input type="file" name="images[]" class="custom-file-input" id="image" multiple>
                        <label for="image" class="custom-file-label">업로드 할 파일을 선택하세요</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info btn-block" value="Upload">
                </div>
                <h5 class="text-center text-success" id="result">Hello</h5>
            </form>

        </div>
    </div>

<!--<div class="row justify-content-center">-->
<!--    <div class="col-lg-10">-->
<!--        <div class="row p-2" id="image_preview">-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
       $("#image").on('change', function () {
           var filename = $(this).val();
           $(".custom-file-label").html(filename);
       });
       $("#image_upload").submit(function (e) {
          e.preventDefault();
          $.ajax({
              url:"test2.php",
              method:'post',
              processData: false,
              contentType:false,
              cache:false,
              data: new FormData(this),
              success:function (response) {
                  $("#result").html(response);
                  load_images();
              }
          });
       });

       load_images();
       //이미지 로드
        function  load_images() {
            $.ajax({
                url: 'load.php',
                method: 'get',
                success: function (data) {
                    $("#image_preview").html(data);
                }
            });
        }

    });
</script>
</body>
</html>
