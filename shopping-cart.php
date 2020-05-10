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
                                    <div class="row justify-content-center align-items-center product-box">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-4 product-info sc-pro-name"><a href="#">索尼（SONY）Alpha 7 III 全画幅微单数码相机 SEL2470Z蔡司镜头套装</a>
                                            <div class="product-specs">
                                                <div><span class="value">约2420万有效像素 5轴防抖 a7M3/A73</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity">
                                            <label class="d-none d-md-block" for="quantity">Quantity</label>
                                            <input type="number" id="number" class="form-control quantity-input" value="1" min="1">
                                        </div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                        <div class="c0l-6 col-md-1 btn-del"><button type="button" class="btn btn-danger">删除</button></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center product-box">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-4 product-info sc-pro-name"><a href="#">索尼（SONY）Alpha 7 III 全画幅微单数码相机 SEL2470Z蔡司镜头套装</a>
                                            <div class="product-specs">
                                                <div><span class="value">约2420万有效像素 5轴防抖 a7M3/A73</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity">
                                            <label class="d-none d-md-block" for="quantity">Quantity</label>
                                            <input type="number" id="number" class="form-control quantity-input" value="1" min="1">
                                        </div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                        <div class="c0l-6 col-md-1 btn-del"><button type="button" class="btn btn-danger">删除</button></div>
                                    </div>
                                    <div class="row justify-content-center align-items-center product-box">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-4 product-info sc-pro-name"><a href="#">索尼（SONY）Alpha 7 III 全画幅微单数码相机 SEL2470Z蔡司镜头套装</a>
                                            <div class="product-specs">
                                                <div><span class="value">约2420万有效像素 5轴防抖 a7M3/A73</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity">
                                            <label class="d-none d-md-block" for="quantity">Quantity</label>
                                            <input type="number" id="number" class="form-control quantity-input" value="1" min="1">
                                        </div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                        <div class="c0l-6 col-md-1 btn-del"><button type="button" class="btn btn-danger">删除</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <div class="summary">
                                <h3>概览</h3>
                                <h4><span class="text">总金额</span><span class="price">$360</span></h4>
                                <h4><span class="text">折扣</span><span class="price">$0</span></h4>
                                <h4><span class="text">应付</span><span class="price">$360</span></h4>
                                <a href="payment-page.php">
                                    <button class="btn btn-primary btn-block btn-lg" type="button">支付</button>
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include 'footer.php';
    ?>