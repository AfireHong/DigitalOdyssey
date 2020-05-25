layui.use(['form', 'layer', 'table', 'laytpl'], function () {
    var form = layui.form,
        layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;
    //加载数据表格
    var tableIns = table.render({
        elem: '#cateList',
        url: 'goodApi.php?op=getCate',
        cellMinWidth: 80,
        page: true,
        height: "full-125",
        limits: [20, 40, 80, 120],
        limit: 20,
        id: "goodListTable",
        cols: [
            [{
                    type: "checkbox",
                    fixed: "left",

                },
                {
                    field: 'cate_id',
                    title: '分类ID',
                    align: "center",
                    width: 100
                },
                {
                    field: 'cate_name',
                    title: '分类名',
                    align: "center",
                    width: 200
                },
                {
                    title: '操作',
                    Width: 150,
                    templet: '#cateListBar',
                    fixed: "right",
                    align: "center"
                }
            ]
        ]
    });
    $(".addCate_btn").click(function () {
        layer.prompt({
            title: '请输入分类名'
        },function (val, index) {
            layer.confirm('确定添加分类：‘'+val+'’?', function () {
                //do something
                $.post('goodAPI.php?op=addCate', {
                    cateName: val
                }, function (res) {
                    res = JSON.parse(res);
                    if (res.code == 0) {
                        layer.msg('添加成功!');
                    } else {
                        layer.msg('添加失败!');
                    }
                })
                layer.close(index);
            });
        });
    });
});