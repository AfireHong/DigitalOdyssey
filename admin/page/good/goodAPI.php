<?php
/*
 *                        _oo0oo_
 *                       o8888888o
 *                       88" . "88
 *                       (| -_- |)
 *                       0\  =  /0
 *                     ___/`---'\___
 *                   .' \\|     |// '.
 *                  / \\|||  :  |||// \
 *                 / _||||| -:- |||||- \
 *                |   | \\\  - /// |   |
 *                | \_|  ''\---/''  |_/ |
 *                \  .-\__  '-'  ___/-. /
 *              ___'. .'  /--.--\  `. .'___
 *           ."" '<  `.___\_<|>_/___.' >' "".
 *          | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *          \  \ `_.   \_ __\ /__ _/   .-` /  /
 *      =====`-.____`.___ \_____/___.-`___.-'=====
 *                        `=---='
 * 
 * 
 *      ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * 
 *            佛祖保佑       永不宕机     永无BUG
 */
/*
 * @Author: Afirehong
 * @Date: 2020-05-24 12:05:56
 * @LastEditTime: 2020-05-26 21:29:03
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\admin\page\good\goodAPI.php
 */ 
    include '../../../conn.php';
    if (!$_SESSION['admin']) {
        die(json_encode(array('code' => -1, 'msg' => '无权限')));
    }
    $option = $_GET['op'];
    switch ($option) {
        case 'getGood':
            $responseData = array("code" => 0, "msg" => "", "count" => 0, "data" => "");
            $sqlCount = "SELECT * 
                        FROM goods,img 
                        WHERE goods.goods_id=img.goods_id";
            $resCount = $mySQLi->query($sqlCount);
            //$resCount = $resCount->fetch_all();
            $responseData["count"] = $resCount->num_rows;
            if ($_GET['limit']) {
                $limit = $_GET['limit'];
            } else {
                $limit = 20;
            }
            if ($_GET['page']) {
                $page = ($_GET['page'] - 1) * $limit;
            } else {
                $page = 0;
            }

            $sql = "SELECT * FROM goods,img WHERE goods.goods_id=img.goods_id LIMIT {$page},{$limit}";
            $res = $mySQLi->query($sql);
            $res_arr = $res->fetch_all(MYSQLI_ASSOC);
            $responseData["data"] = $res_arr;
            echo json_encode($responseData);
            break;
        case 'delGood':
            //TO DO
            break;
        case 'getCate':
            $responseData = array("code" => 0, "msg" => "", "count" => 0, "data" => "");
            $sql = 'SELECT * FROM cate';
            $res = $mySQLi->query($sql);
            $res_arr = $res->fetch_all(MYSQLI_ASSOC);
            $responseData["count"] = $res->num_rows;
            $responseData["data"] = $res_arr;
            echo json_encode($responseData);
            break;
        case 'addCate':
            $cateName = $_POST['cateName'];
            $responseData = array('code' => '0', 'msg' => '');
            $sql = 'INSERT INTO cate(cate_name) VALUES (?)';
            $stmt = $mySQLi->init();
            $stmt = $mySQLi->prepare($sql);
            $stmt->bind_param('s',$cateName);
            if($stmt->execute()){
                echo json_encode($responseData);
            }else{
                $responseData['code'] = -1;
                $responseData['msg'] = '添加失败';
                echo json_encode($responseData);
            }
            break;
        case 'updateStatus':
            $good_id = $_GET['good_id'];
            $status = $_GET['status'];
            $type = $_GET['type'];
            $responseData = array('code' => '0', 'msg' => '');
            if(switchStatus($mySQLi, $type, $status, $good_id)){
                echo json_encode($responseData);
            } else {
                $responseData['code'] = -1;
                $responseData['msg'] = '失败';
                echo json_encode($responseData);
            }
        default:
            # code...
            break;
    }
/**
 * @description: 切换商品三种状态，
 * @param {$object}  $mysqliObject 数据库连接对象
 * @param {$string}  good_id    商品id
 * @param {$string}  type   类型  is_hot，is_rec，is_up
 * @param {$bool}  status   状态
 * @return: bool
 */
    function switchStatus($mysqliObject,$type, $status, $good_id){
        $sql = 'UPDATE goods SET '. $type .' = ? WHERE goods_id = ?';
        $stmt = $mysqliObject->init();
        if ($status) {
            $statusCode = 0;
            $stmt = $mysqliObject->prepare($sql);
            $stmt->bind_param('is', $statusCode, $good_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $statusCode = 1;
            $stmt = $mysqliObject->prepare($sql);
            $stmt->bind_param('is', $statusCode, $good_id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>