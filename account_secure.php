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
        <section class="clean-block clean-form dark">
            <div class="container" id="b-con1">
                <div class="block-heading">
                    <h2 class="text-info">账户安全</h2>
                </div>
<<<<<<< HEAD
                <div class="block-content">
                    <h3 class="text-info">密码更改</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="old-passw">旧密码</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Old password" aria-label="Old-password" aria-describedby="old-passw" id="oldPass">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="new-passw">新密码</span>
                        </div>
                        <input type="password" class="form-control" placeholder="New password" aria-label="New-password" aria-describedby="new-passw" id="newPass">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="confirm-passw">再次确认密码</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirm password" aria-label="Confirm-passw" aria-describedby="confirm-passw" id="confirmPass">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="密码最低长度8个字符，应至少包含一个大写字母，一个小写字母和一个数字">
                            密码强度要求
                        </button>&nbsp
                        <button type="button" class="btn btn-danger" id="change_passw">更改密码</button>
                    </div>
                    <h3 class="text-info">验证方式</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">绑定手机号</span>
                        </div>
                        <span class="form-control" id="Phone_num"></span>
                        
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">绑定邮箱</span>
                        </div>
                        <span class="form-control" id="email_num"></span>
                    </div>
                </div>
=======
                    <form>
                            <h3 class="text-info">密码更改</h3>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="old-passw">旧密码</span>
                                </div>
                                <input type="password" class="form-control" placeholder="Old password" aria-label="Old-password" aria-describedby="old-passw" id="oldPass">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="new-passw">新密码</span>
                                </div>
                                <input type="password" class="form-control" placeholder="New password" aria-label="New-password" aria-describedby="new-passw" id="newPass">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="confirm-passw">再次确认密码</span>
                                </div>
                                <input type="password" class="form-control" placeholder="Confirm password" aria-label="Confirm-passw" aria-describedby="confirm-passw" id="confirmPass">
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="密码最低长度8个字符，应至少包含一个大写字母，一个小写字母和一个数字">
                                    密码强度要求
                                </button>&nbsp
                                <button type="button" class="btn btn-danger" id="change_passw">更改密码</button>
                            </div>
                            <h3 class="text-info">验证方式</h3>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">绑定手机号</span>
                                </div>
                                <span class="form-control" id="Phone_num"></span>
                            </div>
                            <div class="center-btn">
                                    <button type="button" class="btn btn-primary" id="change_phone">更改绑定</button>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">绑定邮箱</span>
                                </div>
                                <span class="form-control" id="email_num"></span>
                            </div>
                            <div class="center-btn">
                                    <button type="button" class="btn btn-primary" id="change_email">更改绑定</button>
                            </div>
                    </form>
>>>>>>> develop
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
                            $('#Phone_num').html(formatPhone(data.userdata.tel));
                            $('#email_num').html(data.userdata.email);
                        }else{
                            $('#b-con1').slideUp();
                            alert("无此用户！");
                        }
                    }
                });
            }
        );
        $('#change_passw').click(
            function () {
                var OldPass = $('#oldPass').val();
                var newPass = $('#newPass').val();
                var confirmPass = $('#confirmPass').val();
                layui.use('layer', function () {
                    var layer = layui.layer;
                    if(newPass!=confirmPass){
                        layer.msg("两次密码输入不一致！");
                        return;
                    }
                    var passwordReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                    if(!passwordReg.test(newPass)){
                        layer.msg("请按要求设置符合安全强度的密码！");
                        return;
                    }
                    if(OldPass == newPass){
                        layer.msg("新密码与旧密码不能相同！");
                        return;
                    }
                    $.ajax({
                    method: "POST",
                    url: "acc_secure.php",
                    data: {
                        OldPass:OldPass,
                        newPass:newPass
                    },
                    dataType: "json",
                    success:function (data) {
                        if(data['status']== 'err'){
                            layer.msg("密码错误！");
                        }else if(data['status']== 'ok'){
                            layer.msg('密码已更改，请重新登陆！',{ shift:-1, time: 1000 },function () {
                                document.location.href='loginout.php';
                            });
                        }
                    },error:function (){
                        alert("出现错误");
                    }
                    });
                });
                
            }
        );

        //手机号处理
        function formatPhone(phone) {
            return phone.replace(/(\d{3})\d{4}(\d{4})/, "$1****$2");
        }
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>                                   
<?php
    include 'footer.php';
?>
