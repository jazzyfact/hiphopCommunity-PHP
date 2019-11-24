<?php
$conn = new mysqli("127.0.0.1","hyemi","dltpstmRkdalsgh!!","hiphop");

foreach ($_FILES['images']['name'] as $i => $value){
    $image_name = $_FILES['images']['tmp_name'][$i];
    $folder ="uploads/";
    $image_path = $folder.$_FILES['images']['name'][$i];
    move_uploaded_file($image_name, $image_path);

    $sql = "insert into images (image_path) values (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $image_path);
    $stmt->execute();
}
echo "image Uploads 성공!!";
?>