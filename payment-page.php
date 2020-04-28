<?php
    include 'header.php';
?>
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Payment</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title">Checkout</h3>
                        <div class="item"><span class="price">$200</span>
                            <p class="item-name">Product 1</p>
                            <p class="item-description">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="item"><span class="price">$120</span>
                            <p class="item-name">Product 2</p>
                            <p class="item-description">Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="total"><span>Total</span><span class="price">$320</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Credit Card Details</h3>
                        <div class="form-row">
                            <div class="col-sm-7">
                                <div class="form-group"><label for="card-holder">Card Holder</label><input class="form-control" type="text" placeholder="Card Holder"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group"><label>Expiration date</label>
                                    <div class="input-group expiration-date"><input class="form-control" type="text" placeholder="MM"><input class="form-control" type="text" placeholder="YY"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group"><label for="card-number">Card Number</label><input class="form-control" type="text" id="card-number" placeholder="Card Number"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label for="cvc">CVC</label><input class="form-control" type="text" id="cvc" placeholder="CVC"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Proceed</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>