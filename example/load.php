<?php
$conn = new mysqli("", "", "", "");

$sql = "select * from images order by  idx desc ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data = '';
while ($row = $result->fetch_assoc()) {
    $data .= '<div class="col-lg-4"> 
<div class="card-group">
<div class="card mb-3">
<a href="'.$row['image_path'].'">
<img src="'.$row['image_path'].'" class="card-img-top" height="150">

</a>

</div>
</div></div>';
}
echo $data;

?>
