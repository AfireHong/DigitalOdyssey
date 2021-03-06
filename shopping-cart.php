<?php
include 'header.php';
?>
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">购物车</h2>
                <p>快去挑选你喜欢的商品吧！</p>
            </div>
            <div class="content">
                <div class="row no-gutters">
                    <div class="col-md-12 col-lg-9">
                        <div class="items">
                            <div class="product">
                                <?php
                                $total = 0;
                                if (empty($_SESSION['shop'])) {
                                    echo "购物车还没有商品哦！";
                                } else {
                                    foreach ($_SESSION['shop'] as $cart) :
                                        $total += $cart['max_price'] * $cart['num'];
                                ?>
                                        <div class="row justify-content-center align-items-center product-box">
                                            <div class="col-md-3">
                                                <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/goods_img/<?php echo $cart['img_url']; ?>"></div>
                                            </div>
                                            <div class="col-md-4 product-info sc-pro-name"><a href="#"><?php echo $cart['goods_name']; ?></a>
                                                <div class="product-specs">
                                                    <div><span class="value"><?php echo $cart['description']; ?></span></div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-2 quantity">
                                                <label class="d-none d-md-block" for="quantity">Quantity</label>
                                                <input type="number" id="number" class="form-control quantity-input" value="<?php echo $cart['num']; ?>" min="1" good-id="<?php echo $cart['goods_id']; ?>" good-price="<?php echo $cart['max_price']; ?>">
                                            </div>
                                            <div class="col-6 col-md-2 price"><span>￥<?php echo $cart['max_price']; ?></span></div>
                                            <div class="c0l-6 col-md-1 btn-del"><button type="button" class="btn btn-danger del-btn" gd_id="<?php echo $cart['goods_id']; ?>">删除</button></div>
                                        </div>
                                <?php
                                    endforeach;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="summary">
                            <h3>概览</h3>
                            <h4><span class="text">总金额</span><span class="price" id="total-price">￥<?php echo $total; ?></span></h4>
                            <h4><span class="text">折扣</span><span class="price">$0</span></h4>
                            <h4><span class="text">应付</span><span class="price" id="real-price">￥<?php echo $total; ?></span></h4>
                            <a href="payment-page.php">
                                <button class="btn btn-primary btn-block btn-sm" type="button">提交订单</button>
                            </a>
                            <button class="btn btn-danger btn-block btn-sm" type="button" id="clear-cart">清空购物车</button>
                            <a href="index.php">
                                <button class="btn btn-success btn-block btn-sm" type="button">继续购物</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(function() {
        var btn_del = $('button.del-btn');
        btn_del.each(function() {
            var gd_id = $(this).attr('gd_id');
            $(this).click(function() {
                layui.use('layer', function() {
                    layer.open({
                        title: '来自数码奥德赛的提示:',
                        content: '确定要从购物车删除该商品吗？',
                        icon: 5,
                        btn: ['确定', '我再想想'],
                        yes: function() {
                            $.ajax({
                                method: 'GET',
                                url: 'deal_cart.php',
                                data: '&deal=del&gd_id=' + gd_id,
                                success: function() {
                                    layer.msg('删除成功！', {
                                        shift: -1,
                                        time: 500,
                                        icon: 1
                                    }, function() {
                                        document.location.href = 'shopping-cart.php';
                                    });

                                }
                            })
                        }
                    })
                })
            })
        })
        $("#clear-cart").click(function() {
            layui.use('layer', function() {
                layer.open({
                    title: '来自数码奥德赛的提示:',
                    content: '确定要清空购物车吗？',
                    icon: 5,
                    btn: ['确定', '我再想想'],
                    yes: function() {
                        $.ajax({
                            method: 'GET',
                            url: 'deal_cart.php',
                            data: '&deal=delAll',
                            success: function() {
                                layer.msg('清空成功！', {
                                    shift: -1,
                                    time: 500,
                                    icon: 1
                                }, function() {
                                    document.location.href = 'shopping-cart.php';
                                });
                            }
                        })
                    }
                })
            })
        })
        layui.use('layer', function() {
            layer.ready(function() {
                $(".quantity-input").each(function name(params) {
                    $(this).bind('input porpertychange', function() {
                        var inputValue = this.value;
                        var good_id = $(this).attr('good-id');
                        //这里实际范围应该不大于库存数量
                        if (inputValue < 1 || inputValue > 99) {
                            layer.msg('数量只能在1~99之间哦，超过100批量发货请单独与我们联系！');
                        } else {
                            $.get('deal_cart.php?deal=upadateNum&num=' + inputValue + '&gd_id=' + good_id, function(res) {
                                res = JSON.parse(res);
                                if (res.code == 0) {
                                    var total = 0;
                                    $(".quantity-input").each(function(params) {
                                        total += (this.value * $(this).attr('good-price'));
                                    });
                                    $('#total-price').text('￥' + total);
                                    $('#real-price').text('￥' + total);
                                    layer.msg('修改成功');
                                } else {
                                    layer.msg(res.msg);
                                }
                            })
                        }
                    });
                });

            });
        })
    })
</script>
<?php
include 'footer.php';
?>