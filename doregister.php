<?php
    if($_SERVER['HTTP_REFERER'] == ""){
        include 'header.php';
        include '404.php';
        exit;
    }
    include_once 'conn.php';
    
    $responseDate = array("code" => 0, "msg" => "", "uid"=>"");
    //echo json_encode($responseDate);
    $username = $_POST['name'];
    $passwordPre = $_POST['pwd'];
    $password = md5($passwordPre);
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $sql1 = "SELECT * FROM users WHERE username='{$username}' OR tel = '{$tel}' OR email = '{$email}' ";
    $res1 = $mySQLi->query($sql1);
    $num = mysqli_num_rows($res1);
    if($num){
        $responseDate["code"] = 1;
        $responseDate["msg"] = "账户已存在";
        echo json_encode($responseDate);
        exit;
    }else{
        $sql2 = "INSERT INTO users (username, password, tel, email) VALUES ('{$username}', '$password', '{$tel}', '$email')";
        $res2 = $mySQLi->query($sql2);
        if($res2){
            $responseDate["code"] = 2;
            $responseDate["msg"] = "注册成功！";
            echo json_encode($responseDate);
            exit;
        }else{
            $responseDate["code"] = 3;
            $responseDate["msg"] = "注册失败！";
            echo json_encode($responseDate);
            exit;
        }
    }