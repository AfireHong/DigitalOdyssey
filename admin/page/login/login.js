layui.use(['form','layer','jquery'],function(){
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer
        $ = layui.jquery;

    $(".loginBody .seraph").click(function(){
        layer.msg("这只是做个样式，至于功能，你见过哪个后台能这样登录的？还是老老实实的找管理员去注册吧",{
            time:5000
        });
    })

    //登录
    form.on("submit(login)",function(data){
            //alert($('#admin').val());
            $.post('login.php',{
                admin: $('#admin').val(),
                password: $('#password').val()
            },function(res) {
                res=JSON.parse(res);
                if(res.code==0){
                    layer.msg('登录成功！', {
                        shift: -1,
                        time: 1000
                    }, function () {
                        document.location.href = '../../index.php';
                    });
                }else{
                    layer.msg('用户名或密码错误');
                }
                
            })
            //window.location.href = "/layuicms2.0";
        return false;
    })

    //表单输入效果
    $(".loginBody .input-item").click(function(e){
        e.stopPropagation();
        $(this).addClass("layui-input-focus").find(".layui-input").focus();
    })
    $(".loginBody .layui-form-item .layui-input").focus(function(){
        $(this).parent().addClass("layui-input-focus");
    })
    $(".loginBody .layui-form-item .layui-input").blur(function(){
        $(this).parent().removeClass("layui-input-focus");
        if($(this).val() != ''){
            $(this).parent().addClass("layui-input-active");
        }else{
            $(this).parent().removeClass("layui-input-active");
        }
    })
})