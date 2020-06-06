<?php
/*
 * @Author: Afirehong 彭迈宏
 * @Date: 2020-05-12 16:48:37
 * @LastEditTime: 2020-05-31 11:46:55
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\deal_cart.php
 */ 
    include 'conn.php';
    $method = $_GET['deal'];
    $gd_id = $_GET['gd_id'];
    switch ($method) {
        case 'add':
            $sql = "SELECT goods.goods_id,goods.goods_name, goods.max_price, goods.description, goods.stock, img.img_url FROM goods,img WHERE goods.goods_id = '{$gd_id}' AND img.goods_id = '{$gd_id}'";
            $res = $mySQLi->query($sql);
            $_SESSION['shop'][$gd_id] = mysqli_fetch_assoc($res);
            if($_SESSION['shop'][$gd_id]['num']==NULL){
                $_SESSION['shop'][$gd_id]['num'] = 1;
                echo json_encode(array('code' => 0, 'msg' => '添加成功'));
            }else{
                $_SESSION['shop'][$gd_id]['num']++;
                echo json_encode(array('code' => 1, 'msg' => '已存在该商品，自动加一'));
            }
            break;
        case 'del':
            unset($_SESSION['shop'][$gd_id]);
            break;
        case 'delAll':
            unset($_SESSION['shop']);
            break;
        case 'upadateNum':
            $num = $_GET['num'];
            $sql = "SELECT stock FROM goods WHERE goods_id = '{$gd_id}'";
            $res = $mySQLi->query($sql);
            $res = mysqli_fetch_assoc($res);
            if($num > $res['stock']){
                echo json_encode(array('code' => -1, 'msg' => '库存不足'));
            }else{
                $_SESSION['shop'][$gd_id]['num']= $num;
                echo json_encode(array('code' => 0, 'msg' => '更新成功'));
            }
        default:
            # TO DO 数量处理
            break;
    }
