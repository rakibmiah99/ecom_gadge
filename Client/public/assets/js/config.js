let base_url = "127.0.0.1:8000";
let appName = "ecom_gadget_";

/* ------------------------ Start Authentication Control ------------------------- */
if(sessionStorage.getItem(appName+"email") == null || sessionStorage.getItem(appName+"email") == ""){
    $('#wistListVisibility').addClass('d-none');
    $('#displayCart').addClass('d-none');
}else{
    $('#wistListVisibility').removeClass('d-none');
    $('#displayCart').removeClass('d-none');
    GetWistCount();
}
/* ------------------------End Authentication Control ------------------------- */




/* ------------------------ Start Wist List ------------------------- */
function GetWistCount() {
    let url = "/GetWistCount";
    let data = {email: sessionStorage.getItem(appName+"email")}
    axios.post(url,data)
        .then(function(response){
            if(response.status === 200){
                let data = response.data;
                $('#displayWistCount').html(data)
            }else{
                toastr.error("Something Went Wrong. Try Again.");
            }
        })
        .catch(function (error) {
            toastr.error("Network Error.");
        })
}



//Add Wist
function AddWist(productCode) {

    let email = sessionStorage.getItem(appName+"email");


    if(email == null || email == ""){
        let redirect_url = window.location.href;
        SetRedirectUrl(redirect_url);
        window.location.href = "/Login";
    }else{
        let url = "/AddWist";
        let data = {
            email: email,
            productCode: productCode
        }
        axios.post(url,data)
            .then(function(response){
                if(response.status === 200){
                    let e = response.data;
                    if(e.hasErr == "no"){
                        toastr.success(e.errMsg);
                        GetWistCount();
                    }else{
                        toastr.error(e.errMsg);
                    }
                }else{
                    toastr.error("Something Went Wrong. Try Again.");
                }
            })
            .catch(function (error) {
                console.log(error);
                toastr.error("Network Error.");
            })
    }
}
//AddWistList
function AddWistList(wrapSelector){
    wrapSelector.on('click', '.addWistListBtn',function(e){
        e.preventDefault();
        let productCode = $(this).attr('productCode');
        AddWist(productCode);
    })
}

/* ------------------------ End Wist List ------------------------- */



/*-------------------Redirection--------------------*/
function SetRedirectUrl(url) {
    return localStorage.setItem(appName + "redirect_url", url);
}
function GetRedirectUrl() {
   return localStorage.getItem(appName + "redirect_url");
}
function RemoveRedirectUrl() {
    return localStorage.removeItem(appName+"redirect_url")
}
function CheckRedirectUrl() {
    if(GetRedirectUrl() == null || GetRedirectUrl() == "" ){
        window.location.href = "/Account"
    }else{
        window.location.href = GetRedirectUrl();
        RemoveRedirectUrl();
    }
}
/*-------------------End Redirection--------------------*/



/* ---------------Product Cart Section----------------------- */
GetProductItems();
function GetProductItems() {
    let url = "/GetCartItems/"+ sessionStorage.getItem(appName + "email");
    axios.get(url)
    .then(function (response) {
        if(response.status === 200){
            let items = response.data.items;
            let subTotal = response.data.subtotal;
            let totalItem = response.data.totalItem;
            $('#cartItems').empty();
            $('#cartSubTotal').html(`<span class="price_symbole">$</span> ${subTotal}`)
            $('#cart_discount').html(`<span class="price_symbole">$</span>${response.data.discount}`)
            $('#displayCartSubTotal').html(`<span class="currency_symbol">$</span>${subTotal}`);
            $('#displayTotalItem').html(totalItem);
            items.forEach(function (item) {
                HeaderCartItem(item);
            })
        }
    })
    .catch(function (error) {

    })
}

function HeaderCartItem(item) {
    $('#cartItems').append(`
        <li>
            <a item-id="${item.id}"  href="#" class="removeCartItem item_remove"><i class="ion-close"></i></a>
            <a  href="/product/${item.product_code}"><img src="${item.image}" alt="cart_thumb1">${item.title}</a>
            <span class="cart_quantity"> ${item.qty} x <span class="cart_amount"> <span class="price_symbole">$</span></span>${item.price}</span>
        </li>
    `)
}

RemoveCartItem();
function RemoveCartItem() {
    $('#cartItems').on('click','.removeCartItem',function (e) {
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



function AddCartItem(wrapSelector) {
    wrapSelector.on('click','.addCartBtn', function (e) {
        e.preventDefault();
        let email = sessionStorage.getItem(appName+"email");
        if(email == null || email == ""){
            let redirect_url = window.location.href;
            SetRedirectUrl(redirect_url);
            window.location.href = "/Login";
        }else{
            let productCode = $(this).attr('product-code');
            let defaultSize = $(this).attr('default-size');
            let defaultColor = $(this).attr('default-color');
            let qty = 1;
            let url = "/AddCartItem";
            let data = {
                productCode: productCode,
                email: sessionStorage.getItem(appName + "email"),
                qty: qty,
                defaultSize: defaultSize,
                defaultColor: defaultColor
            }
            axios.post(url, data)
                .then(function (response) {
                    if(response.status === 200){
                        let data = response.data;
                        if(data.hasErr == "no"){
                            SuccessToast(data.errMsg);
                            GetProductItems();
                        }else{
                            ErrorToast(data.msg);
                        }
                    }else{
                        FailedError();
                    }
                })
                .catch(function (error) {
                    NetworkError();
                })
        }

    });
}
/* ---------------End Product Cart Section----------------------- */



/* ---------------------- Start Toast Message ---------------------*/

 function SuccessToast(msg) {
        toastr.success(msg);
 }

 function ErrorToast(msg) {
     toastr.error(msg);
 }

 function NetworkError() {
     toastr.error("Network Error.");
 }

 function FailedError() {
     toastr.error("Request Failed. Try Again.");
 }

/* ---------------------- End Toast Message ---------------------*/
