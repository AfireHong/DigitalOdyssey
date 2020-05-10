<?php
    include_once 'conn.php';

    //更新用户资料信息
    $username = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $sql1 = "UPDATE users SET username ='{$username}' WHERE user_id = '{$_SESSION['uid']}' ";
    $sql2 = "UPDATE users SET sex ='{$sex}' WHERE user_id = '{$_SESSION['uid']}' ";
    $sql3 = "UPDATE users SET age ='{$age}' WHERE user_id = '{$_SESSION['uid']}' ";
    $res1 = $mySQLi->query($sql1);
    $res2 = $mySQLi->query($sql2);
    $res3 = $mySQLi->query($sql3);
?>
