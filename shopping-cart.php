<?php
    include 'header.php';
?>
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Shopping Cart</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                            <div class="product-specs">
                                                <div><span>Display:&nbsp;</span><span class="value">5 inch</span></div>
                                                <div><span>RAM:&nbsp;</span><span class="value">4GB</span></div>
                                                <div><span>Memory:&nbsp;</span><span class="value">32GB</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                            <div class="product-specs">
                                                <div><span>Display:&nbsp;</span><span class="value">5 inch</span></div>
                                                <div><span>RAM:&nbsp;</span><span class="value">4GB</span></div>
                                                <div><span>Memory:&nbsp;</span><span class="value">32GB</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                            <div class="product-specs">
                                                <div><span>Display:&nbsp;</span><span class="value">5 inch</span></div>
                                                <div><span>RAM:&nbsp;</span><span class="value">4GB</span></div>
                                                <div><span>Memory:&nbsp;</span><span class="value">32GB</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                        <div class="col-6 col-md-2 price"><span>$120</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Summary</h3>
                                <h4><span class="text">Subtotal</span><span class="price">$360</span></h4>
                                <h4><span class="text">Discount</span><span class="price">$0</span></h4>
                                <h4><span class="text">Shipping</span><span class="price">$0</span></h4>
                                <h4><span class="text">Total</span><span class="price">$360</span></h4>
                                <a href="payment-page.php">
                                    <button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button>
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