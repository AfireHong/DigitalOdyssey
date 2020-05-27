var form, $, areaData;
layui.config({
    base: "../../js/"
}).extend({
    "address": "address"
})
layui.use(['form', 'layer', 'upload', 'laydate', "address"], function () {
    form = layui.form;
    $ = layui.jquery;
    var layer = parent.layer === undefined ? layui.layer : top.layer,
        upload = layui.upload,
        laydate = layui.laydate,
        address = layui.address;

    //动态获取分类下拉框
    $.post('goodAPI.php?op=getCate', function (res) {
        $('#cateList').empty();
        $('#cateList').append("<option value=''>请选择</option>");
        res = JSON.parse(res);
        for (var k in res.data) {
            $('#cateList').append("<option value='" + res.data[k].cate_id + "'>" + res.data[k].cate_name +
                "</option>");
        }
        form.render();
    })
})