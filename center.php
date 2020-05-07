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
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">个人中心<span id="isBanned"></span></h2>
                </div>
                <div class="card-group">
                    <div class="card text-center">
                        <div class="card-header">
                        猜你喜欢
                        </div>
                        <div class="card-body">
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
                            if(data.userdata.status == 0){
                                $('#isBanned').html("<br>(该账户因违规封禁中！内容不可见)");
                                $('.container').css(
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
                                $('.tab-content').slideUp();
                            }
                            //显示用户名
                            $('#user-name').html(data.userdata.username);
                            $('#basic-username').attr('placeholder',data.userdata.username);
                            //显示性别
                            if(data.userdata.sex == 0){
                                $('#sex').html('性别保密');
                                $('#sexOpt0').attr('selected','selected');
                            }else if(data.userdata.sex == 1){
                                $('#sex').html('男');
                                $('#sexOpt1').attr('selected','selected');
                            }else if(data.userdata.sex == 2){
                                $('#sex').html('女');
                                $('#sexOpt2').attr('selected','selected');
                            }else{
                                $('#sex').html('NULL');
                            }

                            
                        }else{
                            $('.block-content').slideUp();
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