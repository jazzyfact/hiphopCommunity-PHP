<?php
$conn = new mysqli("","","","");

foreach ($_FILES['images']['name'] as $i => $value){
    $image_name = $_FILES['images']['tmp_name'][$i];
    $folder ="uploads/";
    $image_path = $folder.$_FILES['images']['name'][$i];
    move_uploaded_file($image_name, $image_path);

    $_POST['title'];

    $sql = "insert into images (image_path, title) values (?, '$_POST[title]')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $image_path);
    $stmt->bind_param("$_POST[title]", $_POST['title']);
    $stmt->execute();
}
echo "image Uploads 성공!!";
echo $_POST['title'];
?>