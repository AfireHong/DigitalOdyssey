<?php
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
            break;
        case 'delGood':
            break;
        case 'getCate':
            $responseData = array("code" => 0, "msg" => "", "count" => 0, "data" => "");
            $sql = 'SELECT * FROM cate';
            $res = $mySQLi->query($sql);
            $res_arr = $res->fetch_all(MYSQLI_ASSOC);
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
        default:
            # code...
            break;
    }
?>