<?php
    if($_SERVER['HTTP_REFERER'] == ""){
        include 'header.php';
        include '404.php';
        exit;
    }
    session_start();
    $mySQLi = new MySQLi('localhost','root','pmh123','onlineshopping');
    //判断数据库是否连接
    if($mySQLi -> connect_errno){

        die('连接错误' . $mySQLi -> connect_error);

    }
    //设置字符集
    $mySQLi -> set_charset('utf8');