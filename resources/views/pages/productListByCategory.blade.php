@extends('layouts.app')
@section('content')
    @include('components.poductListByCategory.poduct-list-category-top')
    <div class="main_content">
        @include('components.poductListByCategory.poduct-list-category')
        @include('components.poductListByCategory.related-product')
    </div>
@endsection
@section('script')
    <script>
        let currentUrl = window.location.href;
        let currentUrlArr = currentUrl.split('//')[1].split('/');
        let makeUrl = "";
        if(currentUrlArr.length == 3){
            makeUrl = '/CategoryWiseProduct/'+currentUrlArr[2];
            $('#DisplayCategoryName').html(currentUrlArr[2]);
            $('#DisplayCategoryLink').html(currentUrlArr[2]);
            $('#DisplayCategoryLink').parent().addClass('active');
            $('#DisplaySubCategoryLink').remove();
        }else{
            makeUrl = '/CategoryWiseProduct/'+currentUrlArr[2]+"/"+currentUrlArr[3];
            $('#DisplayCategoryName').html(currentUrlArr[3]);
            $('#DisplayCategoryLink').html(currentUrlArr[2]);
            $('#DisplayCategoryLink').attr('href', '/category/'+ currentUrlArr[2])
            $('#DisplaySubCategoryLink').html(currentUrlArr[3]);
        }

        axios.get(makeUrl)
        .then(function (response) {
            if(response.status === 200){
                let data = response.data;
                data.forEach(function(item){
                    CategoryWiseProductTemplate(item);
                })
                RelatedProductList('/GetRelatedProduct/'+ currentUrlArr[2], $('#RelatedProductList'))
            }
        })
        .catch(function(error){

        })

        //CategoryWiseProduct
        function CategoryWiseProductTemplate(item){
            $('#CategoryWiseProduct').append(`
                <div class="col-lg-3 col-md-4 col-6 grid_item">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="${item.product_image}" alt="product_img1">
                                </a>
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a class="addCartBtn" default-size="${item.default_size}" default-color="${item.default_color}"  product-code="${item.product_code}" href="#" ><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#" class="addWistListBtn" productCode="${item.product_code}"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="/product/${item.product_code}">${item.title}</a></h6>
                                <div class="product_price">
                                    <span class="price">${item.price}</span>
                                    <del>${item.discount_price}</del>
                                    <div class="on_sale">
                                        <span>${item.discount_percent}% Off</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width: ${item.ratting + "%"}"></div>
                                    </div>
                                    <span class="rating_num">${item.ratting_no}</span>
                                </div>
                                <div class="pr_desc">
                                    <p>${item.short_desc}</p>
                                </div>
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a class="addCartBtn" default-size="${item.default_size}" default-color="${item.default_color}"  product-code="${item.product_code}" href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            `)
        }




        //Related Product
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
                                                <li class="add-to-cart"><a class="addCartBtn" default-size="${item.default_size}" default-color="${item.default_color}"  product-code="${item.product_code}" href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#" class="addWistListBtn" productCode="${item.product_code}"><i class="icon-heart"></i></a></li>
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



        //Add To Wist List
        AddWistList($('#CategoryWiseProduct'));
        AddWistList($('#RelatedProductList'));

        //Add to cart
        AddCartItem($('#CategoryWiseProduct'));
        AddCartItem($('#RelatedProductList'));

    </script>
@endsection
