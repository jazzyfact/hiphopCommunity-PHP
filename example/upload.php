<?php
$output = '';
if(is_array($_FILES))
{
    foreach($_FILES['images']['name'] as $name => $value)
    {
        $file_name = explode(".", $_FILES['images']['name'][$name]);
        $allowed_extension = array("jpg", "jpeg", "png", "gif");
        if(in_array($file_name[1], $allowed_extension))
        {
            $new_name = rand() . '.'. $file_name[1];
            $sourcePath = $_FILES["images"]["tmp_name"][$name];
            $targetPath = "uploads/".$new_name;
            move_uploaded_file($sourcePath, $targetPath);
        }
    }
    $images = glob("uploads/*.*");
    foreach($images as $image)
    {
        $output .= '<div class="col-md-2" align="center" ><img src="' . $image .'" width="180px" height="180px" style="border:1px solid #ccc;" /></div>';
    }
    echo $output;
}
?>