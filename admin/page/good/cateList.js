layui.use(['form', 'layer', 'table', 'laytpl'], function () {
    var form = layui.form,
        //layer = parent.layer === undefined ? layui.layer : top.layer,
        $ = layui.jquery,
        laytpl = layui.laytpl,
        table = layui.table;

    var tableIns = table.render({
        elem: '#cateList',
        url: 'goodApi.php?op=getCate',
        cellMinWidth: 80,
        page: true,
        height: "full-125",
        limits: [20, 40, 80, 120],
        limit: 20,
        id: "cateList",
        cal: [
            [{
                    field: 'cate_id',
                    title: '分类ID',
                    align: 'center',
                    width: 200
                },
                {
                    field: 'cate_name',
                    title: '分类名',
                    align: 'center',
                    width: 200
                }
            ]
        ]
    });
})