@extends('layouts.app')

@section('content')
    @include('components.Checkout.cart-top')
    <div class="main_content">
        @include('components.Checkout.Checkout')
        @include('layouts.newslatter')
    </div>
@endsection

@section('script')
    <script>
        let email = sessionStorage.getItem(appName + "email");
        axios.post('/GetAccount', {
            email: email
        })
        .then(function (response) {
            if(response.status === 200){
                let data = response.data;
                $('#fname').val(data.f_name)
                $('#lname').val(data.l_name)
                $('#phone').val(data.mobile)
                $('#email').val(data.email)
                $('#billing_country').val(data.bill_country)
                $('#billing_city').val(data.mobile)
                $('#billing_town').val(data.bill_town)
                $('#billing_address').val(data.bill_address)
                $('#shipping_country').val(data.ship_country)
                $('#shipping_city').val(data.ship_city)
                $('#shipping_town').val(data.ship_town)
                $('#shipping_address').val(data.ship_address)
            }else{
                FailedError();
            }
        })
        .catch(function (error) {
            console.log(...error)
            NetworkError();
        })


        //Get Product List
        CheckoutOrderList();
        function CheckoutOrderList() {
            let url = "/GetCartItems/"+ sessionStorage.getItem(appName + "email");
            let shippingCharge = parseFloat("{{env("shipping_charge")}}");
            axios.get(url)
                .then(function (response) {
                    if(response.status === 200){
                        console.log(response.data)
                        let items = response.data.items;
                        let subTotal = response.data.subtotal;
                        let totalItem = response.data.totalItem;
                        $('#CheckoutProudctList').empty();
                        $('#checkoutProductSubtotal').html(`<span class="price_symbole">$</span> ${subTotal}`)
                        $('#checkoutShippingCharge').html(`<span class="price_symbole">$</span> ${shippingCharge}`)
                        $('#checkoutDiscount').html(`<span class="price_symbole">$</span>${response.data.discount}`)
                        $('#checkoutTotalPrice').html(`<span class="currency_symbol">$</span>${response.data.total + shippingCharge}`);
                        $('#displayTotalItem').html(totalItem);
                        items.forEach(function (item) {
                            ProductItem(item);
                        })
                    }
                })
                .catch(function (error) {

                })

            //Product Item
            function ProductItem(item) {
                $('#CheckoutProudctList').append(`
                    <tr>
                        <td>${item.title}  <span class="product-qty">x ${item.qty}</span></td>
                        <td>${item.total_price}</td>
                    </tr>
                `);
            }
        }


        //Final Order
        $('#PlaceOrderForm').on('submit', function(e){
            e.preventDefault();
            let paymentMethod = $("input[name='payment_option']:checked").val();
            if(paymentMethod === undefined){
                alert("Please Select a Payment Option")
            }else{
                let bfName = $('#fname');
                let blName = $('#lname');
                let bCountry = $('#billing_country');
                let bAddress = $('#billing_address');
                let bCity = $('#billing_city');
                let bTown = $('#billing_town');
                let email = $('#email');
                let bPhone = $('#phone');

                //shipping info
                let sName = $('#shiping')
                let sCountry = $('#shipping_country');
                let sCity = $('#shipping_city');
                let sTown = $('#shipping_town')
                let sAddress =  $('#shipping_address');
                let sMobile = $('#shipping_mobile');

                let data = {
                    bfName: bfName.val(),
                    blName: blName.val(),
                    bCountry: bCountry.val(),
                    bAddress: bAddress.val(),
                    bCity: bCity.val(),
                    bTown: bTown.val(),
                    bEmail: email.val(),
                    bPhone: bPhone.val(),
                    sName: sName.val(),
                    sCountry: sCountry.val(),
                    sCity: sCity.val(),
                    sTown: sTown.val(),
                    sAddress: sAddress.val(),
                    sMobile: sMobile.val(),
                    paymentMethod: paymentMethod,
                    email: sessionStorage.getItem(appName + "email")
                }

                axios.post('/PlaceOrder',  data)
                .then(function (response) {
                    if(response.status === 200 && response.data.orderStatus == "complete"){
                        window.location.href = "/OrderComplete"
                    }else{
                        alert(response.data.msg);
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
            }
        })

    </script>
@endsection
