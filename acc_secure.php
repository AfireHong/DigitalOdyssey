<?php
    include_once 'conn.php';
    $passPre = $_POST['newPass'];
    $password = md5($passPre);

    $passold = $_POST['OldPass'];
    $oldPass = md5($passold);
    $data = array();


    $sql1 = "SELECT * FROM users WHERE user_id = '{$_SESSION['uid']}' AND password = '{$oldPass}' ";
    $res1 = $mySQLi->query($sql1);
    if(mysqli_num_rows($res1)){
        data['status'] = 'ok';
        $sql2 = "UPDATE users SET password='{$password}' WHERE user_id = '{$_SESSION['uid']}' ";
        $res2 = $mySQLi->query($sql2);
        echo json_encode($data);
        exit;
    }else{
        data['status'] = 'err';
        echo json_encode($data);
        exit;
    }
?>