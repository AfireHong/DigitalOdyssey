<?php
    include 'header.php';
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
                <div class="block-content">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">主页</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">编辑资料</a>
                                <a class="nav-link" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address" role="tab" aria-controls="v-pills-address" aria-selected="false">地址管理</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">账户安全</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="card-deck">
                                        <div class="card" style="width: 18rem; text-align:center" >
                                            <img src="assets/img/avatars/default_avatar.jpg" class="card-img-top" alt="avatar">
                                            <div class="card-body">
                                                <h3 class="card-title"><span id="user-name"></span></h3>
                                                <p class="card-text"><span id="sex"></span></p>
                                                <a href="shopping-cart.php" class="btn btn-primary">我的购物车</a>
                                            </div>
                                        </div>
                                        <div class="card w-50">
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
                                        <div class="card" style="text-align:center">
                                            <h5 class="card-header">我的日历</h5>
                                            <div class="card-body">
                                                <h2 class="card-title" id="time-day"></h2>
                                                <br>
                                                <p class="card-text" id="time-week"></p>
                                                <br>
                                                <h4 class="card-title" id="time-date"></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="accordion" id="accordionItem">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    我的物流
                                                </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionItem">
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
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <label for="">
                                    用户名
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-usern">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="basic-username" placeholder="用户名" aria-label="Username" aria-describedby="basic-usern">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="SelectSex">性别</label>
                                        </div>
                                        <select class="custom-select" id="SelectSex">
                                            <option value="0" id="sexOpt0">保密</option>
                                            <option value="1" id="sexOpt1">男</option>
                                            <option value="2" id="sexOpt2">女</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">
                                    <button type="button" class="btn btn-primary btn-lg btn-block" id="addAddress">+添加新的收货地址</button>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-group">
                    <div class="card text-center">
                        <div class="card-header">
                        猜你喜欢
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <?php for($i=1;$i<=6;$i++){?>

                                <div class="col-md-6 col-lg-4 item ">
                                    <div class="product-show-container">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="assets/img/scenery/image2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-show-info">
                                            <a href="">
                                                <p>华硕(ASUS) 天选 15.6英寸游戏笔记本电脑</p>
                                                <p>新锐龙 7nm 8核 R7-4800H 8G 512GSSD GTX1650Ti 4G 144Hz</p>
                                            </a>
                                        </div>
                                        <div class="product-price">
                                            <p>￥6099</p>
                                        </div>
                                    </div>
                    <!-- 这个链接传参到商品介绍页，参数是商品id，在新窗口打开 ，脚本开头从数据库读取该模块数据数组 -->
                    <!-- <a class="lightbox" href="product-page.php?<?php/*这里是商品id*/?>">
                    <img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg" />
                    <div class="product-show ">
                    <p>华硕</p>
                    </div>
                    </a> -->
        
                                </div>
                            <?php } ?>
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