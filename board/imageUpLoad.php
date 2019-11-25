<?php
// 업로드 될 디렉토리 (권한 777)
$uploads_dir = 'upload';
// 한 번에 업로드할 수 있는 이미지 최대 수
$imgMaxN = 10;
// 허용할 이미지 하나의 최대 크기(MB)
$imgMaxSize = 20;


if( !isset($_FILES['imgfile']['error']) ) {
    echo json_encode( array(
        'status' => 'error',
        'message' => '파일이 첨부되지 않았습니다.'
    ));
    exit;
}

for($i=0; $i < count($_FILES['imgfile']['name']) ; $i++){
    $error = $_FILES['imgfile']['error'][$i];
    if( $error != UPLOAD_ERR_OK ) {
        switch( $error ) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $message = "파일이 너무 큽니다. ($error)";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "파일이 첨부되지 않았습니다. ($error)";
                break;
            default:
                $message = "파일이 제대로 업로드되지 않았습니다. ($error)";
        }
        echo json_encode( array(
            'status' => 'error',
            'message' => $message
        ));
        exit;
    }
}

if( count($_FILES['imgfile']['name']) > $imgMaxN ){
    echo json_encode( array(
        'status' => 'error',
        'message' => '이미지는 한번에 최대 '.$imgMaxN.'개까지 업로드할 수 있습니다.'
    ));
    exit;
}

$allowed_ext = array('jpg','jpeg','png','gif');

for($i=0; $i < count($_FILES['imgfile']['name']) ; $i++){
    $name = $_FILES['imgfile']['name'][$i];
    $ext = strtolower(substr(strrchr($name, '.'), 1));

    // 확장자 확인
    if( !in_array($ext, $allowed_ext) ) {
        echo json_encode( array(
            'status' => 'error',
            'message' => '허용되지 않는 확장자입니다.'
        ));
        exit;
    }

    // 파일 사이즈 검사
    if( $_FILES['imgfile']['size'][$i] > $imgMaxSize*1024*1024 ){
        echo json_encode( array(
            'status' => 'error',
            'message' => '이미지 하나의 최대 크기는 '.$imgMaxSize.'MB입니다.'
        ));
        exit;
    }

    // 변환될 파일명
    $crypto[$i] = date("YmdHis",time())."_".md5($name).".".$ext;
}

//이미지인지 체크(확장자만 이미지일 수 있어서)
for($i=0; $i < count($_FILES['imgfile']['name']) ; $i++){
    $pathNname[$i] = $uploads_dir."/".$crypto[$i];
    move_uploaded_file( $_FILES['imgfile']['tmp_name'][$i], $pathNname[$i]);
    $info = getimagesize($pathNname[$i]);
    $width[$i] = $info[0];
    if(!($width[$i] > 0)){
        echo json_encode( array(
            'status' => 'error',
            'message' => '업로드에 실패했습니다.'
        ));
        exit;
    }
}

echo json_encode( array(
    'status' => 'OK',
    'name' => $_FILES['imgfile']['name'],
    'crypto' => $crypto,
    //'ext' => $ext,
    //'type' => $_FILES['imgfile']['type'],
    //'size' => $_FILES['imgfile']['size'],
    //'pathNname' => $pathNname,
    //'width' => $width
));
?>
