@extends('layouts.app')

@section('content')

    <div class="main_content">
        @include('components.productDetails.details')
        @include('components.productDetails.related-product')
        @include('layouts.newslatter')
    </div>
@endsection
@section('script')
    <script>
        let currentUrl = window.location.href;
        let currentUrlArr = currentUrl.split('//')[1].split('/');
        let productCode = currentUrlArr[2];
        let productName = "";
        let category = "";
        ProductBasicInfo();
        function ProductBasicInfo() {
            axios.get('/ProductDetails/'+ productCode)
                .then(function (response){
                    if(response.status === 200){
                        let info = response.data.productBasicInfo;
                        let details = response.data.productDetails;
                        productName = info.title;
                        category = info.category;
                        $('#product_img').attr('src',info.product_image);
                        $('#img_1').attr('src',details.img_1);
                        $('#img_2').attr('src',details.img_2);
                        $('#img_3').attr('src',details.img_3);
                        $('#img_4').attr('src',details.img_4);
                        $('#productName').html(info.title);
                        $('#productShortDesc').html(info.short_desc);
                        $('#productPrice').html("$" + info.price);
                        $('#productDiscountPrice').html("$" + info.discount_price);
                        $('#productDiscountPercentage').html(info.discount_percent + "% off");
                        $('#ratting').css("width",info.ratting + "%")

                        let pr_secure = $('#productSecure');
                        if(details.warrenty != ""){
                            pr_secure.append(`
                        <li><i class="linearicons-shield-check"></i> ${details.warranty}</li>
                    `)
                        }
                        if(details.returns != ""){
                            pr_secure.append(`
                        <li><i class="linearicons-sync"></i> ${details.returns}</li>
                    `)
                        }
                        if(details.cash_on_delivery != ""){
                            pr_secure.append(`
                       <li><i class="linearicons-bag-dollar"></i> ${details.cash_on_delivery}</li>
                    `)
                        }

                        $('#productCode').html(info.product_code)
                        $('#category').html(info.category)
                        $('#category').attr('href',"/category/"+info.category);
                        $('#Description').html(details.long_desc)




                        RelatedProductList('/GetRelatedProduct/'+ category, $('#RelatedProductList'))

                    }
                })
                .catch(function (error){

                })
        }


        ProductAdditionalInfo();
        function ProductAdditionalInfo() {
            axios.get('/ProductAdditionalInfo/'+ productCode)
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    let table = `  <table class="table table-bordered">`;
                    data.forEach(function(item){
                       table += `
                         <tr>
                            <td>${item.title}</td>
                            <td>${item.description}</td>
                        </tr>
                       `;
                    });
                    table += "</table>";
                    $('#Additional-info').append(table)
                }
            })
            .catch(function(error){

            })
        }

        Reviews();
        function  Reviews() {
            axios.get('/GetProductReview/'+ productCode)
                .then(function(response) {
                    if (response.status === 200) {
                        let data = response.data;
                        let totalReview = data.length;
                        $('#totalReview').html(totalReview)
                        $('#reviewProductName').html(`${totalReview} Review For ${productName}`);
                        $('#reviewItems').empty();
                        data.forEach(function (item) {
                            $('#reviewItems').append(`
                                <li>
                                    <div class="comment_img">
                                        <img src="${item.image}" alt="${item.name}"/>
                                    </div>
                                    <div class="comment_block">
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width: ${item.rating + "%"}"></div>
                                            </div>
                                        </div>
                                        <p class="customer_meta">
                                            <span class="review_author">${item.name}</span>
                                            <span class="comment-date">${moment(item.created_at).format('LL')}</span>
                                        </p>
                                        <div class="description">
                                            ${item.description}
                                        </div>
                                    </div>
                                </li>
                            `)
                        })
                    }
                })
                .catch(function (error){

                });
        }




        function RelatedProductList(url, selector){

            axios.get(url).then(function (response){
                if(response.status === 200){
                    selector.empty();
                    let data = response.data;
                    data.forEach(function(item){
                        selector.append(RelatedProduct(item))
                    })
                    selector.slick({
                        infinite: true,
                        autoplay: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        rows: 1,
                        centerMode: true,
                        speed: 500,
                        responsive:{
                            0:{
                                items: 1,
                                rows:1
                            },
                            481:{
                                items: 2,
                                rows: 1
                            },
                            768: {
                                items: 3,
                                rows: 1
                            },
                            991: {
                                items: 4,
                                rows: 1
                            }
                        }
                    });
                }
            })
                .catch(function (error){

                })


            function RelatedProduct(item) {
                let hoverImage = `<img class="product_hover_img" src="${item.product_hover_image}" alt="el_hover_img2">`;
                let saleTypeHot = `<span class="pr_flash bg-danger">Hot</span>`;
                let saleTypeSale = `<span class="pr_flash bg-success">Sale</span>`;
                let saleTypeNew = `<span class="pr_flash">New</span>`;
                let elem = `<div class="item">
                                <div class="product_wrap">
                                    ${item.sale_type == "HOT" ? saleTypeHot : ""}
                                    ${item.sale_type == "SALE" ? saleTypeSale : ""}
                                    ${item.sale_type == "NEW" ? saleTypeNew : ""}
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="${item.product_image}" alt="el_img2">
                                            ${item.product_hover_image !== null ? hoverImage  : ""}
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html">${item.title}</a></h6>
                                        <div class="product_price">
                                            <span class="price">${item.price}</span>
                                            <del>$${item.discount_price}</del>
                                            <div class="on_sale">

                                                <span>${item.discount_percent  + "% Off"}</i>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:${item.ratting + "%"}"></div>
                                            </div>
                                            <span class="rating_num">(${item.ratting_no})</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`

                return elem;
            }
        }

    </script>
@endsection
