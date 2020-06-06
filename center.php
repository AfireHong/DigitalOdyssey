<?php
include 'header.php';
if (!array_key_exists('uid', $_SESSION)) {
    include 'login.php';
    exit;
}
$sql_rec = "SELECT g.goods_id, g.goods_name, g.max_price, i.img_url FROM goods g, img i WHERE g.goods_id=i.goods_id AND g.is_rec='1' AND g.is_up='1' LIMIT 6";
$rec_res = $mySQLi->query($sql_rec);
?>
<main class="page">
    <section class="clean-block">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">个人中心<span id="isBanned"></span></h2>
            </div>
            <div class="block-content" id="b-content1">
                <div class="row" id="cont1">
                    <div class="col-xl-3 mb-4">
                        <div class="card">
                            <img src="assets/img/avatars/default_avatar.jpg" class="card-img-top" alt="avatar">
                            <div class="card-body" align="center">
                                <h5 class="card-title" id="user-name"></h5>
                                <p class="card-text" id="sex"></p>
                                <a href="shopping-cart.php" class="btn btn-primary">我的购物车</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 mb-4">
                        <div class="card">
                            <div class="card-body" style="text-align:center">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        待付款
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">待发货</a>
                                    <a href="#" class="list-group-item list-group-item-action">待收货</a>
                                    <a href="#" class="list-group-item list-group-item-action">待评价</a>
                                    <a href="#" class="list-group-item list-group-item-action">退款</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-4">
                        <div class="card" style="text-align:center">
                            <h5 class="card-header">我的日历</h5>
                            <br>
                            <div class="card-body">
                                <h2 class="card-title" id="time-day"></h2>
                                <br>
                                <p class="card-text" id="time-week"></p>
                                <br>
                                <h4 class="card-title" id="time-date"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionItem">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    我的地址
                                </button>
                                <button class="btn btn-success" type="button" id="add-address">添加地址</button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionItem">
                            <div class="card-body">
                                <ul class="list-group" id="address-list">
                                    <li class="list-group-item">暂无</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="orderItem">
                    <div class="card">
                        <div class="card-header" id="headingTne">
                            <h2 class="mb-0">
                                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    我的订单
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTne" data-parent="#orderItem">
                            <div class="card-body">
                                <ul class="list-group" id="orders-list">
                                    <li class="list-group-item">暂无</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block">
        <div class="container">
            <div class="card-group">
                <div class="card text-center">
                    <div class="card-header">
                        猜你喜欢
                    </div>
                    <div class="row">
                        <?php
                        //循环输出商品信息 
                        if (!empty($rec_res)) :
                            while ($val = mysqli_fetch_array($rec_res)) :
                        ?>

                                <div class="col-md-6 col-lg-4 item ">
                                    <div class="product-show-container">
                                        <div class="product-img">
                                            <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                                <img src="assets/img/goods_img/<?php echo $val['img_url']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="product-show-info">
                                            <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                                <p>
                                                    <?php
                                                    echo $val['goods_name'];
                                                    ?>
                                                </p>
                                            </a>
                                        </div>
                                        <div class="product-price">
                                            <p>
                                                <?php
                                                echo '￥' . $val['max_price'];
                                                ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="index.php" class="btn btn-primary">查看更多</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div id="add-address-box" style="display:none">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">收件人</label>
            <input type="text" class="form-control" id="add_receiver">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">详细地址</label>
            <input type="text" class="form-control" id="add_address">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">电话</label>
            <input type="text" class="form-control" id="tel">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">邮编</label>
            <input type="text" class="form-control" id="post">
        </div>
        <button type="button" class="btn btn-primary" id="sub_address">确定</button>
    </form>
</div>
<script>
    function getAddress() {
        $.ajax({
            type: "POST",
            url: "center_fetch.php?op=getAdress",
            success: function(data) {
                data = JSON.parse(data);
                if (data.code == 0) {
                    var addressInfo = data.data;
                    $("#address-list").html('<li class="list-group-item">暂无</li>');
                    //console.log(addressInfo.length);
                    var str = '';
                    if (addressInfo.length == 0) {
                        $("#address-list").html('<li class="list-group-item">暂无，快去添加地址吧！</li>');
                    } else {
                        for (var i = 0; i < addressInfo.length; i++) {
                            str += '<li class="list-group-item">收件人：' + addressInfo[i].receiver +
                                ' | 收件地址：' + addressInfo[i].address +
                                ' | 手机号：' + addressInfo[i].tel +
                                ' | 邮编：' + addressInfo[i].post + '<button class="btn btn-danger btn-sm del-address" >删除地址</button></li>';
                        }
                        $("#address-list").html(str);
                    }

                }
            }
        })
    }

    function getorders() {
        $.ajax({
            type: "POST",
            url: "center_fetch.php?op=getOrders",
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                if (data.code == 0) {
                    var orderInfo = data.data;
                    $("#orders-list").html('<li class="list-group-item">暂无</li>');
                    //console.log(addressInfo.length);
                    var str = '';
                    if (orderInfo.length == 0) {
                        $("#orders-list").html('<li class="list-group-item">暂无，快去添加地址吧！</li>');
                    } else {
                        for (var i = 0; i < orderInfo.length; i++) {
                            str += '<li class="list-group-item">' + orderInfo[i].orders_id + '..................等待开发</li>';
                        }
                        $("#orders-list").html(str);
                    }

                }
            }
        })
    }
    $(document).ready(
        function() {
            $.ajax({
                type: "POST",
                url: "center_fetch.php?op=getUserinfo",
                dataType: "json",
                success: function(data) {
                    if (data.status == 'ok') {
                        //若该用户已被封禁
                        if (data.userdata.status == 0) {
                            $('#isBanned').html("<br>(该账户因违规封禁中！内容不可见)");
                            $('#cont1').css({
                                '-webkit-filter': 'grayscale(100%)',
                                '-moz-filter': 'grayscale(100%)',
                                '-ms-filter': 'grayscale(100%)',
                                '-o-filter': 'grayscale(100%)',
                                //ie兼容
                                'filter': 'progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)',
                                //ie6等低版本不启用
                                '_filter': 'none'
                            });
                            $('#cont1').slideUp();
                        }
                        //显示用户名
                        $('#user-name').html(data.userdata.username);
                        //显示性别
                        if (data.userdata.sex == 0) {
                            $('#sex').html('性别保密');
                        } else if (data.userdata.sex == 1) {
                            $('#sex').html('男');
                        } else if (data.userdata.sex == 2) {
                            $('#sex').html('女');
                        } else {
                            $('#sex').html('NULL');
                        }
                        // getAddress();
                    } else {
                        $('#b-content1').slideUp();
                        alert("无此用户！");
                    }
                }
            });
            getAddress();
            getorders();
            layui.use(['form', 'layer'], function() {
                $("#add-address").click(function() {
                    var index = layer.open({
                        title: "添加地址",
                        type: 1,
                        area: ['350px', '510px'],
                        content: $('#add-address-box')
                    })
                    $("#sub_address").click(function() {
                        var receiver = $('#add_receiver').val();
                        var address = $('#add_address').val();
                        var tel = $('#tel').val();
                        var post = $('#post').val();
                        $.ajax({
                            type: "POST",
                            url: "add_address.php",
                            data: {
                                receiver: receiver,
                                address: address,
                                tel: tel,
                                post: post
                            },
                            success: function(data) {
                                data = JSON.parse(data);
                                if (data.code === 0) {
                                    layer.msg('添加成功！', {
                                        shift: -1,
                                        time: 1000
                                    }, function() {
                                        layer.close(index);
                                        getAddress();
                                    })
                                }

                            }
                        })
                    })
                })
            })
        }
    );
    var date = new Date();
    document.getElementById('time-day').innerHTML = date.getDate();
    if (date.getDay() == 1) {
        document.getElementById('time-week').innerHTML = "星期一";
    } else if (date.getDay() == 2) {
        document.getElementById('time-week').innerHTML = "星期二";
    } else if (date.getDay() == 3) {
        document.getElementById('time-week').innerHTML = "星期三";
    } else if (date.getDay() == 4) {
        document.getElementById('time-week').innerHTML = "星期四";
    } else if (date.getDay() == 5) {
        document.getElementById('time-week').innerHTML = "星期五";
    } else if (date.getDay() == 6) {
        document.getElementById('time-week').innerHTML = "星期六";
    } else {
        document.getElementById('time-week').innerHTML = "星期日";
    }
    document.getElementById("time-date").innerHTML = date.getFullYear() + "," + date.getMonth();
</script>
<?php
include 'footer.php';
?>