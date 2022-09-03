
<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            {{--<div class="row">
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                    </div>
                    <div class="panel-collapse collapse login_form" id="loginform">
                        <div class="panel-body">
                            <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                            <form method="post">
                                <div class="form-group mb-3">
                                    <input type="text" required="" class="form-control" name="email" placeholder="Username Or Email">
                                </div>
                                <div class="form-group mb-3">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login_footer form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                            <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="toggle_info">
                        <span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                    </div>
                    <div class="panel-collapse collapse coupon_form" id="coupon">
                        <div class="panel-body">
                            <p>If you have a coupon code, please apply it below.</p>
                            <div class="coupon field_form input-group">
                                <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                                <div class="input-group-append">
                                    <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="row">
                <div class="col-12">
{{--                    <div class="medium_divider"></div>--}}
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <form action="/" method="post" id="PlaceOrderForm" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading_s1">
                            <h4>Billing Details</h4>
                        </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" id="fname" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" id="lname" name="lname" placeholder="Last name *">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom_select">
                                    <select id="billing_country" class="form-control">
                                        <option value="">Select an option...</option>
                                        @foreach($countries as $country)
                                            <option value = "{{$country->name}} ({{$country->code}})">{{$country->name}} ({{$country->code}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" id="billing_address" name="billing_address" required="" placeholder="Address *">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="text" id="billing_city" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="text" id="billing_town" name="billing_town" placeholder="Upazila / Town *">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="text" id="phone" name="phone" placeholder="Phone *">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="text" id="email" name="email" placeholder="Email address *">
                            </div>

                            <div class="ship_detail">
                                <div class="form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                            <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="different_address">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="shipping_name" name="shipping_name" placeholder="Full name *">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text" name="shipping_mobile" placeholder="Contact Mobile">
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="custom_select">
                                            <select id="shipping_country" class="form-control">
                                                <option value="">Select an option...</option>
                                                @foreach($countries as $country)
                                                    <option value = "{{$country->name}} ({{$country->code}})">{{$country->name}} ({{$country->code}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="shipping_address" name="shipping_address" required="" placeholder="Address *">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control"  type="text" id="shipping_city" name="city" placeholder="City / District *">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control"  type="text" id="shipping_town" name="state" placeholder="Town / Upazila *">
                                    </div>
                                </div>
                            </div>
                            <div class="heading_s1">
                                <h4>Additional information</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" id="additionalInfo" placeholder="Order notes"></textarea>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody id="CheckoutProudctList">
                                    <tr>
                                        <td>Blue Dress For Woman <span class="product-qty">x 2</span></td>
                                        <td>$90.00</td>
                                    </tr>
                                    <tr>
                                        <td>Lether Gray Tuxedo <span class="product-qty">x 1</span></td>
                                        <td>$55.00</td>
                                    </tr>
                                    <tr>
                                        <td>woman full sliv dress <span class="product-qty">x 3</span></td>
                                        <td>$204.00</td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td id="checkoutProductSubtotal" class="product-subtotal">$349.00</td>
                                    </tr>
                                    <tr>
                                        <th>Discount (-)</th>
                                        <td id="checkoutDiscount" class="product-subtotal">$349.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping (+)</th>
                                        <td id="checkoutShippingCharge">Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td id="checkoutTotalPrice" class="product-subtotal">$349.00</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="heading_s1">
                                    <h4>Payment</h4>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input payment-checkbox" type="radio" name="payment_option" id="exampleRadios3" value="cash">
                                        <label class="form-check-label" for="exampleRadios3">Cash On Delivery</label>
                                        <p data-method="option4" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input payment-checkbox" type="radio" name="payment_option" id="exampleRadios4" value="bank">
                                        <label class="form-check-label" for="exampleRadios4">Direct Bank Transfer</label>
                                        <p data-method="option4" class="payment-text">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input payment-checkbox" type="radio" name="payment_option" id="exampleRadios5" value="paypal">
                                        <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                        <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="placeOrderBtn" class="btn btn-fill-out btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
