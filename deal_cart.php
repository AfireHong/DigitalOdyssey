<?php
    include 'conn.php';
    $method = $_GET['deal'];
    $gd_id = $_GET['gd_id'];
    switch ($method) {
        case 'add':
            $sql = "SELECT goods.goods_id,goods.goods_name, goods.max_price, goods.description, img.img_url FROM goods,img WHERE goods.goods_id = '{$gd_id}' AND img.goods_id = '{$gd_id}'";
            $res = $mySQLi->query($sql);
            $_SESSION['shop'][$gd_id] = mysqli_fetch_assoc($res);
            break;
        case 'del':
            unset($_SESSION['shop'][$gd_id]);
            break;
        case 'delAll':
            unset($_SESSION['shop']);
            break;
        default:
            # code...
            break;
    }
    
?>