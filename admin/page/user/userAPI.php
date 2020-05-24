<?php
    include '../../../conn.php';
    if(!$_SESSION['admin']){
        die(json_encode(array('code' => -1, 'msg' => '无权限')));
    }
    $option = $_GET['op'];
    switch ($option) {
        case 'getUser':
            $responseData = array("code" => 0, "msg" => "", "count" => 0, "data" => "");
            if (!$_SESSION['admin']) {
                header('location:../../index.php');
            }
            $sqlCount = "SELECT * FROM users";
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
            
            $sql = "SELECT * FROM users LIMIT {$page},{$limit}";
            $res = $mySQLi->query($sql);
            $res_arr = $res->fetch_all(MYSQLI_ASSOC);
            $responseData["data"] = $res_arr;
            echo json_encode($responseData);
            break;
        case 'addUser':
            $responseData = array('code' => '0', 'msg' => '');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $tel = $_POST['tel'];
            $status = $_POST['status'];
            $sql = 'REPLACE INTO users(username, password, tel, email, status) VALUES (?, ?, ?, ?, ?)';
            $stmt = $mySQLi->init();
            $stmt = $mySQLi->prepare($sql);
            $stmt->bind_param('ssssi', $username, $password, $tel, $email, $status);
            if($stmt->execute()){
                echo json_encode($responseData);
            }else{
                $responseData['code'] = -1;
                $responseData['msg'] = '失败';
                echo json_encode($responseData);
            }
            break;
        case 'updateStatus':
            $user_id = $_GET['user_id'];
            $status = $_GET['status'];
            $responseData = array('code' => '0', 'msg' => '');
            $sql = 'UPDATE users SET status = ? WHERE user_id = ?';
            $stmt = $mySQLi->init();
            //echo var_dump($status);
            if($status){
                $statusCode = 0;
                $stmt = $mySQLi->prepare($sql);
                $stmt->bind_param('is', $statusCode,$user_id);
                if($stmt->execute()){
                    echo json_encode($responseData);
                }else{
                    $responseData['code'] = -1;
                    $responseData['msg'] = '失败';
                    echo json_encode($responseData);
                }
            }else{
                $statusCode = 1;
                $stmt = $mySQLi->prepare($sql);
                $stmt->bind_param('is', $statusCode, $user_id);
                if ($stmt->execute()) {
                    echo json_encode($responseData);
                } else {
                    $responseData['code'] = -1;
                    $responseData['msg'] = '失败';
                    echo json_encode($responseData);
                }
            }
            break;
        case 'delUser':
            $responseData = array('code' => '0', 'msg' => '');
            $tel = $_GET['tel'];
            $sql = "DELETE FROM users WHERE tel = ?";
            $stmt = $mySQLi->init();
            $stmt = $mySQLi->prepare($sql);
            $stmt->bind_param('s', $tel);
            if ($stmt->execute()) {
                echo json_encode($responseData);
            } else {
                $responseData['code'] = -1;
                $responseData['msg'] = '删除失败';
                echo json_encode($responseData);
            }
            break;
        default:
            # code...
            break;
    }
