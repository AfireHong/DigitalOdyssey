<?php
/*
 * @Author: your name
 * @Date: 2020-06-06 19:42:10
 * @LastEditTime: 2020-06-06 20:21:40
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\deal_orders.php
 */ 
    include_once 'conn.php';
    $data = array();
    $order = time().mt_rand();
    $user_id = $_SESSION['uid'];
    $add_id = $_POST['add_id'];
    foreach ($_SESSION['shop'] as $cart) {
        $sql = "INSERT INTO 
        orders(orders_id, orders_price, goods_id, goods_count, user_id, add_id) 
        VALUES(
            '{$order}', 
            '{$cart['max_price']}',
            '{$cart['goods_id']}',
            '{$cart['num']}',
            '{$user_id}',
            '{$add_id}'
        )";
        $mySQLi->query($sql);
    }
    unset($_SESSION['shop']);
    echo json_encode(array('code'=>'0','msg'=>'订单提交成功！','od_id'=> $order));
?>
