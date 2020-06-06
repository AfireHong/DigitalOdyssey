<?php
/*
 * @Author: your name
 * @Date: 2020-05-06 15:24:22
 * @LastEditTime: 2020-06-06 23:03:52
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\center_fetch.php
 */ 
    // if(!array_key_exists('uid', $_SESSION)){
    //     include 'header.php';
    //     include '404.php';
    //     exit;
    // }
    include_once 'conn.php';
    $op = $_GET['op'];
    $data = array();
    switch ($op) {
        case 'getUserinfo':
                $sql = "SELECT * FROM users WHERE user_id ='{$_SESSION['uid']}' ";
                $result = $mySQLi->query($sql);
                if (mysqli_num_rows($result)) {
                    $list = mysqli_fetch_array($result);
                    $data['status'] = 'ok';
                    $data['userdata'] = $list;
                } else {
                    $data['status'] = 'err';
                    $data['userdata'] = '';
                }
                echo json_encode($data);
            break;
        case 'getAdress':
                $sql ="SELECT * FROM address WHERE user_id ='{$_SESSION['uid']}'";
                $result = $mySQLi->query($sql);
                if($result){
                    $list = $result->fetch_all(MYSQLI_ASSOC);
                    $data['code'] = 0;
                    $data['msg'] = '成功！';
                    $data['data'] = $list;
                    echo json_encode($data);
                }else {
                    $data['code'] = -1;
                    $data['msg'] = '获取失败';
                    echo json_encode($data);
                }
            break;
        case 'getOrders':
            $sql = "SELECT * FROM orders WHERE user_id ='{$_SESSION['uid']}' GROUP BY orders_id";
            $result = $mySQLi->query($sql);
            if ($result) {
                $list = $result->fetch_all(MYSQLI_ASSOC);
                $data['code'] = 0;
                $data['msg'] = '成功！';
                $data['data'] = $list;
                echo json_encode($data);
            } else {
                $data['code'] = -1;
                $data['msg'] = '获取失败';
                echo json_encode($data);
            }
        break;
        default:
            # code...
            break;
    }
    
    
?>