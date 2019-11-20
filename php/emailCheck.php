<?php
include "../db.php";
if($_POST['email'] != NULL){
    $id_check = mq("select * from register_board where email='{$_POST['email']}'");
    $id_check = $id_check->fetch_array();

    if($id_check >= 1){
        echo "존재하는 아이디입니다.";
    } else {
        echo "존재하지 않는 아이디입니다.";
    }
} ?>
