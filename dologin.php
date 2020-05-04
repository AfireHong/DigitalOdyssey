<?php
    include_once 'conn.php';
    $tel = $_POST['tel'];
    $pwdPre = $_POST['pwd'];
    $pwd = md5($pwdPre);
    //echo $pwd;
    $responseDate = array("code" => 0, "msg" => "", "uid"=>"");
    $sql = "SELECT * FROM users where tel='{$tel}' AND password='{$pwd}'";
    $result = $mySQLi->query($sql);
    if(mysqli_num_rows($result)){
        $responseDate['code'] = 1;
        $responseDate['msg'] = '登录成功';
        $list = mysqli_fetch_array($result);
        $responseDate['uid'] = $list['user_id'];
        $_SESSION['uid'] = $list['user_id'];
        echo json_encode($responseDate);
        exit;
    }
    else{
        $responseDate['code'] = 0;
        $responseDate['msg'] = '手机号或密码错误！';
        echo json_encode($responseDate);
        exit;
    }
?>