<?php
    include 'header.php';
    if(!empty($_SESSION['uid'])){
        include '404.php';
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
                    <div class="g-recaptcha" data-sitekey="6LcRcvUUAAAAAMqrbyUHtRl3TYcpYnA1XX-qzJd-"></div>
                    <button class="btn btn-primary btn-block" id="sub-btn" type="button">登录</button>
                </form>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            $('#sub-btn').click(function () {
                layui.use('layer', function () {
                    var notRobot = 0;
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

                    $.when(
                        $.ajax({
                        type: "POST",
                        url: "recaptcha.php",
                        data: "&g-recaptcha-response=" + grecaptcha.getResponse(),
                        success: function (data) {
                            if(data == 'ok'){
                                notRobot = 1;
                            }else if(data == 'error'){
                                notRobot = -1;
                            }else if(data == 'not verify'){
                                notRobot = 0;
                            }
                        },error:function () {
                            alert("error!");
                        }
                    })

                    ).done(function () {
                        if(notRobot == 1){
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
                                        grecaptcha.reset();
                                    }else{
                                        layer.msg('登录成功！',{ shift:-1, time: 1000 },function () {
                                            document.location.href='index.php';
                                        });
                                        
                                    }
                                },
                                error:function () {
                                    alert(msg);
                                }
                                });
                                return;
                    }else if(notRobot == 0){    
                        layer.msg("请先进行人机验证！");
                        return;
                    }else if(notRobot == -1){
                        layer.msg("人机验证未通过！");
                        return;
                    }
                    });
                
                })
            })
        });
        $(function(){
            function rescaleCaptcha(){
                var width = $('.g-recaptcha').parent().width();
                var scale;
                if (width < 302) {
                    scale = width / 302;
                } else{
                    scale = 1.0; 
                }
                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
            }
            rescaleCaptcha();
            $( window ).resize(function() { rescaleCaptcha(); });
        });
    </script>
    <script src='https://www.recaptcha.net/recaptcha/api.js?hl=zh-CN'></script>
<?php
    include 'footer.php';
?>