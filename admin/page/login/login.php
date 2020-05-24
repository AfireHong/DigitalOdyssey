<?php
    include '../../../conn.php';
    $admin = $_POST['admin'];
    $password = $_POST['password'];
    $responseData = array('code'=>'0','msg'=>'');
    $sql = "SELECT * FROM admin WHERE admin='{$admin}' AND password='{$password}'";
    $result = $mySQLi->query($sql);
    if(mysqli_num_rows($result)){
        $_SESSION['admin'] = $admin;
        echo json_encode($responseData);
    }else{
        $responseData['msg']='用户名或密码错误';
        $responseData['code']='1';
        echo json_encode($responseData);
    }
?>