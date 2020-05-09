<?php
    require_once('conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Digital Odyssey</title>
    <link rel="shortcut icon" type="image/jpg" href="assets/img/favicon.jpg" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css"> -->
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" /> -->
    <link href="assets/css/PriStyle.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script> -->
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://www.layuicdn.com/layui/layui.js"></script>
    
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar nav-shadow">
        <div class="container"><a class="navbar-brand logo" href="#"><img src="assets/img/logo_trans.png" width="45px"/> Digital
                Odyssey</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto nav-tabs">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">主页</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="catalog-page.php">产品目录</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shopping-cart.php">购物车</a></li>
                    <?php
                        if(empty($_SESSION['uid'])){
                    ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">登录</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">注册</a></li>
                    <?php
                        }else{
                    ?>
                    <li class="nav-item pa-Item dropdown" role="presentation"><a class="nav-link dropdown-toggle" data-toggle="dropdown">个人中心</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item"><a href="center.php" class="dropdown-item-text">主页</a></li>
                                <li class="dropdown-item"><a href="profile_edit.php" class="dropdown-item-text">资料编辑</a></li>
                                <li class="dropdown-item"><a href="account_secure.php" class="dropdown-item-text">账户安全</a></li>
                                <li class="dropdown-item"><a href="loginout.php" class="dropdown-item-text">登出</a></li>
                            </ul>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>