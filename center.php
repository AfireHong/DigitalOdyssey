<?php
    include 'header.php';
    $sql_rec = "SELECT g.goods_id, g.goods_name, g.max_price, i.img_url FROM goods g, img i WHERE g.goods_id=i.goods_id AND g.is_rec='1' AND g.is_up='1' LIMIT 6";
    $rec_res = $mySQLi->query($sql_rec);
    if(!array_key_exists('uid',$_SESSION)){
        include '404.php';
        exit;
    }
?>
    <main class="page">
        <section class="clean-block">
            <div class="container" >
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
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        我的物流
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionItem">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Morbi leo risus</li>
                                        <li class="list-group-item">Porta ac consectetur ac</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
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
                                if(!empty($rec_res)):
                                    while ($val = mysqli_fetch_array($rec_res)):
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
                                                echo '￥'.$val['max_price'];
                                            ?>
                                    </p>
                                </div>
                            </div>
                                
                        </div>
                        <?php endwhile;?>
                        <?php endif;?>
                </div>
                        <div class="card-footer text-muted">
                            <a href="index.php" class="btn btn-primary">查看更多</a>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
    </main>
    <script>
        $(document).ready(
            function () {
                $.ajax({
                    type: "POST",
                    url: "center_fetch.php",
                    dataType: "json",
                    success: function (data) {
                        if(data.status == 'ok'){
                            //若该用户已被封禁
                            if(data.userdata.status == 1){
                                $('#isBanned').html("<br>(该账户因违规封禁中！内容不可见)");
                                $('#cont1').css(
                                    {
                                        '-webkit-filter':'grayscale(100%)',
                                        '-moz-filter':'grayscale(100%)',
                                        '-ms-filter': 'grayscale(100%)',
                                        '-o-filter': 'grayscale(100%)',
                                        //ie兼容
                                        'filter':
                                        'progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)',
                                        //ie6等低版本不启用
                                        '_filter':'none'
                                    }
                                );
                                $('#cont1').slideUp();
                            }
                            //显示用户名
                            $('#user-name').html(data.userdata.username);
                            //显示性别
                            if(data.userdata.sex == 0){
                                $('#sex').html('性别保密');
                            }else if(data.userdata.sex == 1){
                                $('#sex').html('男');
                            }else if(data.userdata.sex == 2){
                                $('#sex').html('女');
                            }else{
                                $('#sex').html('NULL');
                            } 
                        }else{
                            $('#b-content1').slideUp();
                            alert("无此用户！");
                        }
                    }
                });
            }
        );
        var date = new Date();
        document.getElementById('time-day').innerHTML = date.getDate();
        if( date.getDay() == 1){
            document.getElementById('time-week').innerHTML = "星期一";
        }else if(date.getDay() == 2){
            document.getElementById('time-week').innerHTML = "星期二";
        }else if(date.getDay() == 3){
            document.getElementById('time-week').innerHTML = "星期三";
        }else if(date.getDay() == 4){
            document.getElementById('time-week').innerHTML = "星期四";
        }else if(date.getDay() == 5){
            document.getElementById('time-week').innerHTML = "星期五";
        }else if(date.getDay() == 6){
            document.getElementById('time-week').innerHTML = "星期六";
        }else{
            document.getElementById('time-week').innerHTML = "星期日";
        }
        document.getElementById("time-date").innerHTML = date.getFullYear()+ ","+date.getMonth();
    </script>
<?php
    include 'footer.php';
?>