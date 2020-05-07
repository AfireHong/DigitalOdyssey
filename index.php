
<?php 
    include 'header.php'; 
    //推荐商品信息
    $sql_rec = "SELECT g.goods_id, g.goods_name, g.max_price, i.img_url FROM goods g, img i WHERE g.goods_id=i.goods_id AND g.is_rec='1' AND g.is_up='1' LIMIT 9";
    $rec_res = $mySQLi->query($sql_rec);
    //热门商品信息
    $sql_hot = "SELECT g.goods_id, g.goods_name, g.max_price, i.img_url FROM goods g, img i WHERE g.goods_id=i.goods_id AND g.is_hot='1' AND g.is_up='1' LIMIT 9";
    $hot_res = $mySQLi->query($sql_hot);

?>


<main class="page landing-page">
    <section class="clean-block slider dark">
            <div class="container slide">
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img alt="Slide Image" class="w-100 d-block" src="assets/img/slider1.webp" />
                        </div>
                        <div class="carousel-item">
                            <img alt="Slide Image" class="w-100 d-block" src="assets/img/slider2.webp" />
                        </div>
                        <div class="carousel-item">
                            <img alt="Slide Image" class="w-100 d-block" src="assets/img/slider3.webp" />
                        </div>
                    </div>
                    <div>
                        <a class="carousel-control-prev" data-slide="prev" href="#carousel-1" role="button"><span
                                class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a
                            class="carousel-control-next" data-slide="next" href="#carousel-1" role="button"><span
                                class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                    </div>
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-1"></li>
                        <li data-slide-to="1" data-target="#carousel-1"></li>
                        <li data-slide-to="2" data-target="#carousel-1"></li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="clean-block clean-gallery dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">精品推荐</h2>
                <p>
                    精选评价最高产品
                </p>
            </div>
                <div class="row">
                    <?php
                    //循环输出商品信息 
                        if(!empty($rec_res)):
                            while ($val = mysqli_fetch_array($rec_res)):
                    ?>

                        <div class="col-md-6 col-lg-4 item ">
                            <div class="product-show-container">
                                <div class="product-img">
                                    <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                        <img src="assets/img/goods_img/<?php echo $val['img_url']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-show-info">
                                    <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                        <p>
                                            <?php
                                                echo $val['goods_name'];
                                            ?>
                                        </p>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <p>
                                            <?php
                                                echo '￥'.$val['max_price'];
                                            ?>
                                    </p>
                                </div>
                            </div>
                                
                        </div>
                        <?php endwhile;?>
                        <?php endif;?>
                </div>
        </div>
    </section>
    <section class="clean-block clean-gallery dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">今日最热</h2>
                <p>
                    精选每日最热产品
                </p>
            </div>
            <div class="row">
                    <?php
                    //循环输出商品信息 
                        if(!empty($hot_res)):
                            while ($val = mysqli_fetch_array($hot_res)):
                    ?>

                        <div class="col-md-6 col-lg-4 item ">
                            <div class="product-show-container">
                                <div class="product-img">
                                    <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>" target="_blank">
                                        <img src="assets/img/goods_img/<?php echo $val['img_url']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-show-info">
                                    <a href="product-page.php?gd_id=<?php echo $val['goods_id']; ?>">
                                        <p>
                                            <?php
                                                echo $val['goods_name'];
                                            ?>
                                        </p>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <p>
                                            <?php
                                                echo '￥'.$val['max_price'];
                                            ?>
                                    </p>
                                </div>
                            </div>
                                
                        </div>
                        <?php endwhile;?>
                        <?php endif;?>
                </div>
        </div>
    </section>
    <!--
        <section class="clean-block clean-info dark">
                <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">加入会员</h2>
                    <p>加入会员获取更多优惠活动以及会员专属权益</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img class="img-thumbnail" src="assets/img/scenery/image5.jpg" />
                    </div>
                    <div class="col-md-6">
                        <h3>开通Plus会员获取尊享权益</h3>
                        <div class="getting-started-info">
                            <p>
                                开通Supreme会员获取以下尊享权益：精选品牌9.5折；
                                300元限定品牌优惠劵；旗舰新品首发抢购；联名会员卡；退换货快速处理
                            </p>
                        </div>
                        <button class="btn btn-outline-primary btn-lg" type="button">
                            立刻加入
                        </button>
                    </div>
                </div>
            </div>
    </section>
-->
<!--
    <section class="clean-block clean-pricing dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Pricing Table</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Nunc quam urna, dignissim nec auctor in,
                        mattis vitae leo.
                    </p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="heading">
                                <h3>BASIC</h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.
                            </p>
                            <div class="features">
                                <h4>
                                    <span class="feature">Full Support:&nbsp;</span><span>No</span>
                                </h4>
                                <h4>
                                    <span class="feature">Duration:&nbsp;</span><span>30 Days</span>
                                </h4>
                                <h4>
                                    <span class="feature">Storage:&nbsp;</span><span>10GB</span>
                                </h4>
                            </div>
                            <div class="price">
                                <h4>$25</h4>
                            </div>
                            <button class="btn btn-outline-primary btn-block" type="button">
                                BUY NOW
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="ribbon">
                                <span>Best Value</span>
                            </div>
                            <div class="heading">
                                <h3>PRO</h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.
                            </p>
                            <div class="features">
                                <h4>
                                    <span class="feature">Full Support:&nbsp;</span><span>Yes</span>
                                </h4>
                                <h4>
                                    <span class="feature">Duration:&nbsp;</span><span>60 Days</span>
                                </h4>
                                <h4>
                                    <span class="feature">Storage:&nbsp;</span><span>50GB</span>
                                </h4>
                            </div>
                            <div class="price">
                                <h4>$50</h4>
                            </div>
                            <button class="btn btn-primary btn-block" type="button">
                                BUY NOW
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <div class="clean-pricing-item">
                            <div class="heading">
                                <h3>PREMIUM</h3>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit.
                            </p>
                            <div class="features">
                                <h4>
                                    <span class="feature">Full Support:&nbsp;</span><span>Yes</span>
                                </h4>
                                <h4>
                                    <span class="feature">Duration:&nbsp;</span><span>120 Days</span>
                                </h4>
                                <h4>
                                    <span class="feature">Storage:&nbsp;</span><span>150GB</span>
                                </h4>
                            </div>
                            <div class="price">
                                <h4>$150</h4>
                            </div>
                            <button class="btn btn-outline-primary btn-block" type="button">
                                BUY NOW
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
-->
    <?php include 'footer.php';?>
