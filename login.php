<?php
    include 'header.php';
    if(!empty($_SESSION['uid'])){
        exit;
    }
?>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">登录</h2>
                </div>
                <form>
                    <div class="form-group"><label for="email">手机号</label><input class="form-control item" type="tel" id="tel"></div>
                    <div class="form-group"><label for="password">密码</label><input class="form-control" type="password" id="password"></div>
                    <div class="form-group">
                    <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">记住我</label></div></div>
                    <button class="btn btn-primary btn-block" id="sub-btn" type="button">登录</button>
                </form>
                    
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            $('#sub-btn').click(function () {
                layui.use('layer', function () {
                    var layer = layui.layer;
					var telephone = $("#tel").val();
                    var password = $("#password").val();
                    if(telephone == ''){
                        layer.msg('手机号不能为空');
                        return;
                    }
                    if(password == ''){
                        layer.msg('密码不能为空');
                        return;
                    }
                    $.ajax({
                    method: "post",
                    url: "dologin.php",
                    data: {
                        tel: $('#tel').val(),
                        pwd: $('#password').val()
                    },
                    success:function (result) {
                        console.log(result);
                        obj = JSON.parse(result);
                        if(!obj.code){
                            layer.msg('手机号或密码错误！');
                        }else{
                            layer.msg('登录成功！',{ shift:-1, time: 1000 },function () {
                                document.location.href='index.php';
                            });
                            
                        }
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