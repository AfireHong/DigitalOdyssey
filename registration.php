<?php
    include 'header.php';
?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">注册</h2>
                    <p>欢迎来到数码奥德赛</p>
                </div>
                <form>
                    <div class="form-group"><label for="name">用户名</label><input class="form-control item" type="text" id="name"></div>
                    <div class="form-group"><label for="email">手机号</label><input class="form-control item" type="tel" id="tel"></div>
                    <div class="form-group"><label for="password">密码</label><input class="form-control item" type="password" id="password"></div>
                    <div class="form-group"><label for="password">再次输入密码</label><input class="form-control item" type="password" id="repassword"></div>
                    <div class="form-group"><label for="email">邮箱</label><input class="form-control item" type="email" id="email"></div>
                    <button class="btn btn-primary btn-block" type="button" id="sub-btn">注册</button>
                    </form>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            $('#sub-btn').click(function () {
                layui.use('layer', function () {
                    var layer = layui.layer;
                    //获取表单值
                    var name = $("#name").val();
					var telephone = $("#tel").val();
                    var password = $("#password").val();
                    var repassword = $("#repassword").val();
                    var email = $("#email").val();
                    
                    if(name == ''){
                        layer.msg('用户名不能为空');
                        return;
                    }
                    if(telephone == ''){
                        layer.msg('手机号不能为空');
                        return;
                    }
                    //手机号验证（大陆和台湾）
                    var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
                    if(!phoneReg.test(telephone)){
                        layer.msg('手机号格式错误！');
                        return;
                    }

                    if(password == ''){
                        layer.msg('密码不能为空');
                        return;
                    }
                    if(password != repassword){
                        layer.msg('两次输入密码不相同');
                        return;
                    }
                    if(email == ''){
                        layer.msg('邮箱不能为空！');e
                        return;
                    }

                    //ajax提交表单
                    $.ajax({
                    method: "post",
                    url: "doregister.php",
                    data: {
                        name: name,
                        tel: telephone,
                        pwd: password,
                        email: email
                    },
                    success:function (result) {
                        console.log(result);
                        // obj = JSON.parse(result);
                        // if(!obj.code){
                        //     layer.msg('手机号或密码错误！');
                        // }else{
                        //     layer.msg('登录成功！',{ shift:-1, time: 1000 },function () {
                        //         document.location.href='index.php';
                        //     });
                            
                        // }
                    },
                    error:function () {
                        alert(msg);
                    }
                })
                })
            })
        });
    </script>
    <?php
        include 'footer.php';
    ?>