<?php
    include_once 'conn.php';
    $tel = $_POST['tel'];
    $pwd = $_POST['pwd'];
    //echo $pwd;
    $responseDate = array("code" => 0, "msg" => "", "uid"=>"");
    $sql = "SELECT * FROM users where tel='{$tel}' AND password='{$pwd}'";
    $reslut = $mySQLi->query($sql);
    if(mysqli_num_rows($reslut)){
        $responseDate['code'] = 1;
        $responseDate['msg'] = '登录成功';
        $list = mysqli_fetch_array($reslut);
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