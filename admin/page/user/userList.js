layui.use(['form', 'layer', 'table', 'laytpl'], function () {
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;

    //用户列表
    var tableIns = table.render({
        elem: '#userList',
        url: 'userApi.php?op=getUser',
        cellMinWidth: 80,
        page: true,
        height: "full-125",
        limits: [20, 40, 80, 120],
        limit: 20,
        id: "userListTable",
        cols: [
            [   {
                    type: "checkbox",
                    fixed: "left",
                    
                },
                {
                    field: 'img_url',
                    title: '图片',
                    align: "center",
                    width: 100
                },
                {
                    field: 'user_id',
                    title: '用户ID',
                    align: "center",
                    width: 100
                },
                {
                    field: 'username',
                    title: '用户名',
                    align: 'center',
                    width: 140
                },
                {
                    field: 'tel',
                    title: '手机号',
                    align: 'center',
                    width: 190
                },
                {
                    field: 'password',
                    title: '密码',
                    align: 'center',
                    width: 190
                },

                {
                    field: 'email',
                    title: '邮箱',
                    align: 'center',
                    width: 190,
                    templet: function (d) {
                        return '<a class="layui-blue" href="mailto:' + d.email + '">' + d.email + '</a>';
                    }
                },
                {
                    field: 'status',
                    title: '状态',
                    align: 'center',
                    width: 130,
                    templet: '#switchTpl', width: 90, align: 'center'
                },
                {
                    field: 'last_login',
                    title: '上次登录',
                    align: 'center',
                    minWidth: 150
                },
                {
                    title: '操作',
                    minWidth: 175,
                    templet: '#userListBar',
                    fixed: "right",
                    align: "center"
                }
            ]
        ]
    });

    //搜索【此功能需要后台配合，所以暂时没有动态效果演示】
    $(".search_btn").on("click", function () {
        if ($(".searchVal").val() != '') {
            table.reload("newsListTable", {
                page: {
                    curr: 1 //重新从第 1 页开始
                },
                where: {
                    key: $(".searchVal").val() //搜索的关键字
                }
            })
        } else {
            layer.msg("请输入搜索的内容");
        }
    });

    //添加用户
    function addUser(edit) {
        var index = layui.layer.open({
            title: "添加/修改用户",
            type: 2,
            area: ['350px', '450px'],
            content: "userAdd.html",
            success: function (layero, index) {
                var body = layui.layer.getChildFrame('body', index);
                if (edit) {
                    body.find(".user_id").val(edit.user_id);
                    body.find(".username").val(edit.username); //登录名
                    body.find(".email").val(edit.email); //邮箱
                    body.find(".tel").val(edit.tel);
                    body.find(".status").val(edit.status); //用户状态
                    form.render();
                }
                // setTimeout(function () {
                //     layui.layer.tips('点击此处返回用户列表', '.layui-layer-setwin .layui-layer-close', {
                //         tips: 3
                //     });
                // }, 500)
            }
        })
        // layui.layer.full(index);
        // window.sessionStorage.setItem("index", index);
        // //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
        // $(window).on("resize", function () {
        //     layui.layer.full(window.sessionStorage.getItem("index"));
        // })
    }
    $(".addNews_btn").click(function () {
        addUser();
    })

    //批量删除
    $(".delAll_btn").click(function () {
        var checkStatus = table.checkStatus('userListTable'),
            data = checkStatus.data,
            newsId = [];
        if (data.length > 0) {
            for (var i in data) {
                newsId.push(data[i].newsId);
            }
            layer.confirm('确定删除选中的用户？', {
                icon: 3,
                title: '提示信息'
            }, function (index) {
                // $.get("删除接口",{
                //     newsId : newsId  //将需要删除的newsId作为参数传入
                // },function(data){
                tableIns.reload();
                layer.close(index);
                // })
            })
        } else {
            layer.msg("请选择需要删除的用户");
        }
    })

    //列表操作
    table.on('tool(userList)', function (obj) {
        var layEvent = obj.event,
            data = obj.data;

        if (layEvent === 'edit') { //编辑
            addUser(data);
        } else if (layEvent === 'del') { //删除
            layer.confirm('确定删除此用户？'+data.tel, {
                icon: 3,
                title: '提示信息'
            }, function (index) {
                $.get("userAPI.php?op=delUser",{
                     tel : data.tel  
                 },function(data){
                    //console.log(data);
                    if(!data.code){
                        layer.msg('删除成功！');
                    }else{
                        layer.msg('删除失败！');
                    }
                    tableIns.reload();
                    layer.close(index);
                })
            });
        }
    });
    form.on('switch(status)', function (obj) {
        status = obj.elem.checked==false?1:0;
        $.getJSON('userAPI.php?op=updateStatus&user_id=' + obj.value + '&status=' + status, function (json) {
            //console.log(json);
            if(json.code != 0){
                layer.open({
                    title: '提示',
                    icon: 7,
                    content: json.msg
                });
                obj.elem.checked = !obj.elem.checked;
                form.render('checkbox');
            }else{
                if (obj.elem.checked == 1) {
                    layer.msg('已启用', {
                        time: 1000
                    });
                } else {
                    layer.msg('已禁用', {
                        time: 1000
                    });
                }
            }
            
        })
    })
})