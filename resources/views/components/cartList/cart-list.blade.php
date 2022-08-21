<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody id="CartItems">

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="px-0">
                                <div class="row g-0 align-items-center">
                                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                        <div class="coupon field_form input-group">
                                            <input type="text" value="" id="couponInput" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                            <div class="input-group-append">
                                                <button class="btn btn-fill-out btn-fill-out-loading btn-sm" id="applyCouponBtn" type="submit">Apply Coupon</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="medium_divider"></div>
                <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="cart_total_label">Cart Subtotal</td>
                                <td class="cart_total_amount">$<span id="CartSubTotal"></span></td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">Discount (-)</td>
                                <td class="cart_discount" id="cart_discount"></td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">Shipping (+)</td>
                                <td class="cart_total_amount">${{env('shipping_charge')}}</td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">Total</td>
                                <td class="cart_total_amount">$<strong id="displayCartTotal">349.00</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
</div>
