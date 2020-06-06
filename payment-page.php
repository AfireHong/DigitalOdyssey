<?php
include 'conn.php';
if (empty($_SESSION['uid'])) {
    header('location:login.php');
    exit;
} else {
    include 'header.php';
}
if (empty($_SESSION['shop'])) {
    header('location:index.php');
    exit;
}
$sql = "SELECT * FROM address WHERE user_id ='{$_SESSION['uid']}'";
$result = $mySQLi->query($sql);
$address = $result->fetch_all(MYSQLI_ASSOC);
?>
<main class="page payment-page">
    <section class="clean-block payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">支付订单</h2>
                <p>请确认您的订单信息</p>
            </div>
            <form>
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['shop'] as $cart) :
                        $total += $cart['max_price'] * $cart['num']; ?>
                        <div class="item"><span class="price"><?php echo '￥' . $cart['max_price'] . 'X' . $cart['num']; ?></span>
                            <p class="item-name"><?php echo $cart['goods_name']; ?></p>
                            <p class="item-description"><?php echo $cart['description']; ?></p>
                        </div>
                    <?php endforeach;
                    ?>
                    <div class="total"><span>Total</span><span class="price"><?php echo '￥' . $total; ?></span></div>
                </div>
                <div class="card-details">
                    <h3 class="title">我的地址</h3>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <select class="form-control form-control-lg" id="adds">
                                <?php
                                foreach ($address as $dz) :
                                ?>
                                    <option value="<?php echo $dz['add_id']; ?>"><?php echo $dz['address']; ?></option>

                                <?php endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group"><button class="btn btn-success btn-block" type="button" id="add-address">添加地址</button></div>
                            <div class="form-group"><button class="btn btn-primary btn-block" type="button" id="pay">支付订单</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<div id="add-address-box" style="display:none">

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">收件人*</label>
            <input type="text" class="form-control" id="add_receiver">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">详细地址*</label>
            <input type="text" class="form-control" id="add_address">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">电话*</label>
            <input type="text" class="form-control" id="tel">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">邮编*</label>
            <input type="text" class="form-control" id="post">
        </div>
        <button type="button" class="btn btn-primary" id="sub_address">确定</button>
    </form>
</div>
<div id="paybox" style="display: none;width: 350px;text-align:center">
    <p>支付接口还没做，先这样凑合。。</p>
    <img src="assets/img/wechatpay.png" style="width: 140px;height: auto;display: inline-block;">
    <img src="assets/img/alipay.png" style="width: 140px;height: auto;display: inline-block;">
</div>
<script>
    $(document).ready(function() {
        layui.use('layer', function() {
            $('#pay').click(function name(params) {
                var add_id = $("#adds").val();
                //console.log(add_id);

                var index = layer.open({
                    title: "支付订单",
                    type: 1,
                    area: ['350px', '300px'],
                    content: $('#paybox'),
                    btn: ['我已支付', '我再看看'],
                    yes: function() {
                        $.ajax({
                            type: "POST",
                            url: "deal_orders.php",
                            data: {
                                add_id: add_id
                            },
                            success: function(res) {
                                res = JSON.parse(res);
                                if (res.code == 0) {
                                    layer.open({
                                        title: '下单成功！',
                                        content: '您的订单号是' + res.od_id
                                    })
                                    layer.close(index);
                                }
                            }
                        })
                    }
                });
            })
            $("#add-address").click(function() {
                var index = layer.open({
                    title: "添加地址",
                    type: 1,
                    area: ['350px', '510px'],
                    content: $('#add-address-box')
                });
                $("#sub_address").click(function() {
                    var receiver = $('#add_receiver').val();
                    var address = $('#add_address').val();
                    var tel = $('#tel').val();
                    var post = $('#post').val();
                    if (receiver == '' || address == '' || tel == '' || post == '') {
                        layer.msg('必填项不能为空');
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "add_address.php",
                        data: {
                            receiver: receiver,
                            address: address,
                            tel: tel,
                            post: post
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data.code === 0) {
                                layer.msg('添加成功！', {
                                    shift: -1,
                                    time: 1000
                                }, function() {
                                    layer.close(index);
                                    location.reload();
                                })
                            }

                        }
                    })
                })
            })
        })
    })
</script>
<?php include 'footer.php'; ?>