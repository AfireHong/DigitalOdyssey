<?php
    if($_SERVER['HTTP_REFERER'] == ""){
        include 'header.php';
        include '404.php';
        exit;
    }
    include_once 'conn.php';

    $data = array();
    $sql = "SELECT * FROM users WHERE user_id ='{$_SESSION['uid']}' ";
    $result = $mySQLi->query($sql);
    if(mysqli_num_rows($result)){
        $list = mysqli_fetch_array($result);
        $data['status'] = 'ok';
        $data['userdata'] = $list;
    } else{
        $data['status'] = 'err';
        $data['userdata'] = '';
    }
    echo json_encode($data);
?>