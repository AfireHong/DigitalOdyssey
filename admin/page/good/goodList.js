layui.use(['form', 'layer', 'table', 'laytpl'], function () {
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;
    //加载数据表格
    var tableIns = table.render({
        elem: '#goodList',
        url: 'goodApi.php?op=getGood',
        cellMinWidth: 80,
        page: true,
        height: "full-100",
        limits: [20, 40, 80, 120],
        limit: 20,
        id: "goodListTable",
        cols: [
            [{
                    type: "checkbox",
                    fixed: "left",

                },
                {
                    field: 'img_url',
                    title: '图片',
                    align: "center",
                    width: 100,
                    templet: function (d) {
                        return "<img src='../../../assets/img/goods_img/" + d.img_url + "' style='width:25px;height:25px'>"
                    }
                },
                {
                    field: 'goods_id',
                    title: '商品ID',
                    align: "center",
                    width: 100
                },
                {
                    field: 'goods_name',
                    title: '商品名',
                    align: 'center',
                    width: 200
                },
                {
                    field: 'cate_id',
                    title: '分类ID',
                    align: 'center',
                    width: 100
                },
                {
                    field: 'brand',
                    title: '品牌',
                    align: 'center',
                    width: 100
                },
                {
                    field: 'stock',
                    title: '库存',
                    align: 'center',
                    width: 80
                },
                {
                    field: 'max_price',
                    title: '最大价格',
                    align: 'center',
                    width: 100
                },
                {
                    field: 'min_price',
                    title: '最低价格',
                    align: 'center',
                    width: 100
                },
                {
                    field: 'description',
                    title: '描述',
                    align: 'center',
                    width: 200
                },
                {
                    field: 'is_hot',
                    title: '热门',
                    align: 'center',
                    width: 130,
                    templet: '#switchTpl1',
                    width: 90,
                    align: 'center'
                },
                {
                    field: 'is_rec',
                    title: '推荐',
                    align: 'center',
                    width: 130,
                    templet: '#switchTpl2',
                    width: 90,
                    align: 'center'
                },
                {
                    field: 'is_up',
                    title: '是否上架',
                    align: 'center',
                    width: 130,
                    templet: '#switchTpl3',
                    width: 90,
                    align: 'center'
                },
                {
                    title: '操作',
                    minWidth: 175,
                    templet: '#goodListBar',
                    fixed: "right",
                    align: "center"
                }
            ]
        ]
    });
    //删除商品
    table.on('tool(goodList)', function (obj) {
        var layEvent = obj.event,
            data = obj.data;

        if (layEvent === 'edit') { //编辑
            addUser(data);
        } else if (layEvent === 'del') { //删除
            layer.confirm('确定删除此商品？' + data.goods_name, {
                icon: 3,
                title: '提示信息'
            }, function (index) {
                $.get("userAPI.php?op=delGood", {
                    tel: data.tel
                }, function (data) {
                    //console.log(data);
                    if (!data.code) {
                        layer.msg('删除成功！');
                    } else {
                        layer.msg('删除失败！');
                    }
                    tableIns.reload();
                    layer.close(index);
                })
            });
        }
    });

    function addGood(edit) {
        var index = layui.layer.open({
            title: "添加商品",
            type: 2,
            content: "addGood.html",
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
                setTimeout(function () {
                    layui.layer.tips('点击此处返回商品列表', '.layui-layer-setwin .layui-layer-close', {
                        tips: 3
                    });
                }, 500)
            }
        })
        layui.layer.full(index);
        window.sessionStorage.setItem("index", index);
        //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
        $(window).on("resize", function () {
            layui.layer.full(window.sessionStorage.getItem("index"));
        })
    }
    $(".addNews_btn").click(function () {
        addGood();
    });

    $(".Cate_btn").click(function () {
        var index = layui.layer.open({
            title: "添加分类",
            area: ['600px', '450px'],
            type: 2,
            content: "cateList.html"
        });
    });
    form.on('switch(is_hot)', function (obj) {
        var status = obj.elem.checked == false ? 1 : 0;
        var type = $(this).attr('name');
        //console.log(obj.value, status, type)
        $.getJSON('goodAPI.php?op=updateStatus&good_id=' + obj.value + '&status=' + status + '&type=' + type, function (json) {
            //console.log(json);
            if (json.code != 0) {
                layer.open({
                    title: '提示',
                    icon: 7,
                    content: json.msg
                });
                obj.elem.checked = !obj.elem.checked;
                form.render('checkbox');
            } else {
                if (obj.elem.checked == 1) {
                    layer.msg('已开启热门', {
                        time: 1000
                    });
                } else {
                    layer.msg('已关闭热门', {
                        time: 1000
                    });
                }
            }

        })
    })
    form.on('switch(is_rec)', function (obj) {
        var status = obj.elem.checked == false ? 1 : 0;
        var type = $(this).attr('name');
        console.log(obj.value, status, type)
        $.getJSON('goodAPI.php?op=updateStatus&user_id=' + obj.value + '&status=' + status + '&type=' + type, function (json) {
            //console.log(json);
            if (json.code != 0) {
                layer.open({
                    title: '提示',
                    icon: 7,
                    content: json.msg
                });
                obj.elem.checked = !obj.elem.checked;
                form.render('checkbox');
            } else {
                if (obj.elem.checked == 1) {
                    layer.msg('已开启推荐', {
                        time: 1000
                    });
                } else {
                    layer.msg('已关闭推荐', {
                        time: 1000
                    });
                }
            }
        })
    })
    form.on('switch(is_up)', function (obj) {
        var status = obj.elem.checked == false ? 1 : 0;
        var type = $(this).attr('name');
        console.log(obj.value, status, type)
        $.getJSON('goodAPI.php?op=updateStatus&user_id=' + obj.value + '&status=' + status + '&type=' + type, function (json) {
            //console.log(json);
            if (json.code != 0) {
                layer.open({
                    title: '提示',
                    icon: 7,
                    content: json.msg
                });
                obj.elem.checked = !obj.elem.checked;
                form.render('checkbox');
            } else {
                if (obj.elem.checked == 1) {
                    layer.msg('商品已上架', {
                        time: 1000
                    });
                } else {
                    layer.msg('商品已下架', {
                        time: 1000
                    });
                }
            }

        })
    })
});