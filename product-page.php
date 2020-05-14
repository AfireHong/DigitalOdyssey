<?php
    include 'header.php';
    $gd_id = $_GET['gd_id'];
    //如果不带参数，输出错误页面
    if(empty($gd_id)){
        include '404.php';
        exit;
    }
    //从数据库拉取
    $gd_info_sql = "SELECT goods.goods_name, goods.max_price, goods.description, img.img_url FROM goods,img WHERE goods.goods_id = '{$gd_id}' AND img.goods_id = '{$gd_id}'";
    $gd_info_res = $mySQLi->query($gd_info_sql);
    //如果数据库无数据，同样输出错误页，分开判断减轻服务器压力
    if(empty($gd_info_res)){
        include '404.php';
        exit;
    }
    $val = mysqli_fetch_array($gd_info_res);
?>
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">产品信息</h2>
                    <p>数码奥德赛，懂你最想要的！</p>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="img_info">
                                    <a href="assets/img/goods_img/<?php echo $val['img_url']; ?>"><img class="img-fluid d-block mx-auto" src="assets/img/goods_img/<?php echo $val['img_url']; ?>"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3><?php echo $val['goods_name']?></h3>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <div class="price">
                                        <h3><?php echo '￥'.$val['max_price']?></h3>
                                    </div><button class="btn btn-primary" type="button" id="addcart" gd_id="<?php echo $gd_id?>"><i class="icon-basket"></i>加入购物车</button>
                                    <div class="summary">
                                        <h4>详细信息:</br>
                                        <?php echo $val['description']?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-tabs tabs-border" id="myTab">
                                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">描述</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Specifications</a></li> -->
                                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#reviews">反馈</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active fade show description" role="tabpanel" id="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <figure class="figure"><img class="img-fluid d-block mx-auto" src="assets/img/goods_img/<?php echo $val['img_url']; ?>"></figure>
                                        </div>
                                        <div class="col-md-7">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7 right">
                                            <h4>Lorem Ipsum</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="col-md-5">
                                            <figure class="figure"><img class="img-fluid d-block mx-auto" src="assets/img/goods_img/<?php echo $val['img_url']; ?>"></figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="stat">Display</td>
                                                    <td>5.2"</td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Camera</td>
                                                    <td>12MP</td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">RAM</td>
                                                    <td>4GB</td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">OS</td>
                                                    <td>iOS</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                                <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clean-related-items"></div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(function(){
            $('#addcart').click(function() {
                var gd_id = this.getAttribute('gd_id');
                //console.log(gd_id);
                layui.use('layer',function() {
                    $.ajax({
                        method: "GET",
                        url: "deal_cart.php",
                        data:"&deal=add&gd_id="+gd_id,
                        success:function () {
                                layer.msg("添加成功！快去购物车看看吧！",{icon: 1});
                        },
                        error:function () {
                            alert(msg);
                        }
                    })
                })
            })
        })
    </script>
    <?php
        include 'footer.php';
    ?>