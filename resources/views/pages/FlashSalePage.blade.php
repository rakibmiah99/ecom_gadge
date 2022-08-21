@extends('layouts.app')
@section('content')
    @include('components.FlashSale.poduct-list-category-top')
    <div class="main_content">
        @include('components.FlashSale.poduct-list-category')
    </div>
@endsection
@section('script')
    <script>
        let url = "/FlashSaleWiseProduct";
        axios.get(url)
            .then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function(item){
                        CategoryWiseProductTemplate(item);
                    })
                }
            })
            .catch(function(error){

            })

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
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
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
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
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




    </script>
@endsection
