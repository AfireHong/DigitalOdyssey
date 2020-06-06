<?php
/*
 * @Author: your name
 * @Date: 2020-06-06 16:09:58
 * @LastEditTime: 2020-06-06 16:40:31
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\add_address.php
 */ 
    if ($_SERVER['HTTP_REFERER'] == "") {
        include 'header.php';
        include '404.php';
        exit;
    }
    include_once 'conn.php';
    $responseDate = array("code" => 0, "msg" => "");
    $receiver= $_POST['receiver'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $post = $_POST['post'];
    $uid = $_SESSION['uid'];
    $stmt = $mySQLi->init();
    $sql = 'INSERT INTO address(user_id, address, receiver, tel, post) VALUES (?, ?, ?, ?, ?)';
    $stmt = $mySQLi->prepare($sql);
    $stmt->bind_param('issss', $uid, $address, $receiver, $tel, $post);
    if($stmt->execute()){
        $responseDate['msg'] = '成功';
        echo json_encode($responseDate);
    }else{
        $responseDate['code'] = '-1';
        $responseDate['msg'] = '失败';
        echo json_encode($responseDate);
    }
?>
