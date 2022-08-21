@extends('layouts.app')

@section('content')
    @include('components.cartList.cart-top')
    <div class="main_content">
        @include('components.cartList.cart-list')
        @include('layouts.newslatter')
    </div>
@endsection

@section('script')
    <script>

        $('#CartItems').on('click','.itemMinusBtn', function () {
            let itemID = $(this).attr('itemID');
            let qty= $(this).attr('qty');
            let email = sessionStorage.getItem(appName + "email");
            if(parseInt(qty) > 1){
                $('#Loader').removeClass('d-none')
                axios.post('/UpdateCartItem',{
                    itemID: itemID,
                    qty: parseInt(qty) - 1,
                    email: email
                })
                .then(function (response) {
                    $('#Loader').addClass('d-none')
                    if(response.status === 200){
                        let data = response.data;
                        if(data.hasErr == "no"){
                            SuccessToast(data.errMsg)
                            ViewCart();
                            GetProductItems()
                        }else{
                            ErrorToast(data.errMsg);
                        }
                    }else{
                        FailedError();
                    }
                })
                .catch(function (error) {
                    console.log(error)
                    NetworkError();
                })
            }else{
                ErrorToast("quantity can't less then 1.")
            }
        })


        $('#CartItems').on('click','.itemPlusBtn', function () {
            let itemID = $(this).attr('itemID');
            let qty= $(this).attr('qty');
            let email = sessionStorage.getItem(appName + "email");
            if(parseInt(qty) > 0){
                $('#Loader').removeClass('d-none')
                axios.post('/UpdateCartItem',{
                    itemID: itemID,
                    qty: parseInt(qty) + 1,
                    email: email
                })
                    .then(function (response) {
                        $('#Loader').addClass('d-none')
                        if(response.status === 200){
                            let data = response.data;
                            if(data.hasErr == "no"){
                                SuccessToast(data.errMsg)
                                ViewCart();
                                GetProductItems()
                            }else{
                                ErrorToast(data.errMsg);
                            }
                        }else{
                            FailedError();
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                        NetworkError();
                    })
            }else{
                ErrorToast("quantity can't less then 1.")
            }
        })


        ViewCart()
        function ViewCart() {
            let url = "/GetCartItems/"+ sessionStorage.getItem(appName + "email");
            axios.get(url)
                .then(function (response) {
                    if(response.status === 200){
                        let items = response.data.items;
                        let subTotal = response.data.subtotal;
                        let shippingCharge = {{env('shipping_charge')}}
                        $('#CartSubTotal').html(subTotal);
                        $('#cart_discount').html(`<span class="price_symbole">$</span>${response.data.discount}`)
                        $('#displayCartTotal').html(subTotal + shippingCharge )
                        $('#CartItems').empty();
                        items.forEach(function (item) {
                            CartItem(item)
                        })
                    }
                })
                .catch(function (error) {

                })


            function CartItem(item) {
                $('#CartItems').append(`
                    <tr>
                        <td class="product-thumbnail"><a href="#"><img src="${item.image}" alt="product1"></a></td>
                        <td class="product-name" data-title="Product"><a href="#">${item.title}</a></td>
                        <td class="product-price" data-title="Price"><span class="ammount-symbol">$</span>${item.price}</td>
                        <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                <input itemID = "${item.id}" qty="${item.qty}"   type="button" value="-" class="minus itemMinusBtn">
                                <input type="text" disabled name="quantity" value="${item.qty}" title="Qty" class="qty" size="4">
                                <input itemID = "${item.id}" qty="${item.qty}" type="button" value="+" class="plus itemPlusBtn">
                            </div></td>
                        <td class="product-subtotal" data-title="Total"><span class="ammount-symbol">$</span> ${item.total_price}</td>
                        <td item-id="${item.id}" class="product-remove removeCartItem" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                    </tr>
                `)
            }
        }


        CheckoutRemoveCartItem();

        function CheckoutRemoveCartItem() {
            $('#CartItems').on('click','.removeCartItem',function (e) {
                e.preventDefault();
                let itemID = $(this).attr('item-id');
                let url = "/RemoveCartItem";
                let data = {
                    email: sessionStorage.getItem(appName + "email"),
                    itemID: itemID
                }
                axios.post(url,data)
                    .then(function (response) {
                        if(response.status === 200){
                            let data = response.data;
                            if (data.hasErr == "no"){
                                SuccessToast(data.errMsg)
                                GetProductItems();
                                ViewCart();
                            }else{
                                ErrorToast(data.errMsg)
                            }
                        }else{
                            FailedError();
                        }
                    })
                    .catch(function (error) {
                        NetworkError();
                    })
            })
        }



        $('#applyCouponBtn').on('click', function(){
            let couponInput= $('#couponInput').val();
            let email = sessionStorage.getItem(appName + "email");
            axios.get(`/SetCouponDiscount/${email}/${couponInput}`)
            .then(function(res){
                if(res.status === 200){
                    let data = res.data;
                    if(data.hasErr == "no"){
                        ViewCart();
                        SuccessToast(data.errMsg)
                    }else{
                        ErrorToast(data.errMsg)
                    }
                }else{
                    FailedError();
                }
            })
            .catch(function (error) {
                console.log(...error)
                NetworkError();
            })
        })

    </script>
@endsection
