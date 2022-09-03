@extends('layouts.app')

@section('content')
    @include('components.home.banner-home')
    <div class="main_content">
        @include('components.home.special-category-home')
        @include('components.home.top-category-home')
        @include('components.home.exclusive-home')
        @include('components.home.offer-home')
        @include('components.home.trending-home')
        @include('components.home.testimonial-home')
        @include('components.home.brands-home')
        @include('components.home.news-home')
        @include('layouts.newslatter')
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        let exclusiveProductSliderObj = {
            infinite: true,
            autoplay: true,
            slidesToShow: 4,
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
        }

        let topCatSlikObj = {
            infinite: true,
            autoplay: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            speed: 500,
            prevArrow: $('.topCatLeft'),
            nextArrow: $('.topCatRight'),
            responsive:[
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 5
                    }
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 460,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        }

        //Trending Category
        TrendingCategory()
        //Top Category
        TopCategory()


        function TrendingCategory(){
            axios.get('/TrendingCategory')
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function(item){
                        $('#TrendingCategory').append(`
                            <div class="col-md-4">
                                <div class="sale-banner mb-3 mb-md-4">
                                    <a class="hover_effect1" href="/category/${item.cat_name}">
                                        <img src="${item.cat_image}" alt="shop_banner_img7">
                                    </a>
                                </div>
                            </div>
                        `)
                    })
                }
            })
            .catch(function(error){

            })
        }

        function TopCategory(){
            axios.get('/TopCategory')
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item){
                        $('#TopCategory').append(`
                            <div class="item">
                                <div class="categories_box">
                                    <a href="/category/${item.cat_name}">
                                        <img src="${item.cat_image}" alt="cat_img1"/>
                                        <span>${item.cat_name}</span>
                                    </a>
                                </div>
                            </div>
                        `)
                    })

                    $('#TopCategory').slick(topCatSlikObj)
                }
            })
            .catch(function(error){

            })
        }

        //New Arrival Product
        ExclusiveProductList('/NewArrivalProductListData',$('#NewArrivalProductList'));
        //Best Seller Product
        ExclusiveProductList('/BestSellersProductListData',$('#BestSellersProductList'));
        //Best Seller Product
        ExclusiveProductList('/FeaturedProductListData',$('#FeatureList'));
        //Special Seller Product
        ExclusiveProductList('/SpecialOfferProductListData',$('#SpecialOfferProductList'));;
        //Trending Product
        ExclusiveProductList('/TrendingProductListData',$('#TrendingProductList'));
        //Testimonial
        Testimonial();




        function ExclusiveProductList(url, selector){
            axios.get(url).then(function (response){
                    if(response.status === 200){
                        selector.empty();
                        let data = response.data;
                        for(let i = 0; i < data.length; i++){
                            for(let j = 0; j <= 8; j++){
                                if(j+1 == data[i].home_order){
                                    selector.append(exclusiveProduct(data[i]))
                                }
                            }
                        }
                        selector.slick(exclusiveProductSliderObj);
                    }
                })
                .catch(function (error){

                })


            function exclusiveProduct(item) {
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
                                        <a href="/product/${item.product_code}">
                                            <img src="${item.product_image}" alt="el_img2">
                                            ${item.product_hover_image !== null ? hoverImage  : ""}
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a class="addCartBtn" default-size="${item.default_size}" default-color="${item.default_color}"  product-code="${item.product_code}" href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="/product/${item.product_code}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#" class="addWistListBtn" productCode="${item.product_code}"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="/product/${item.product_code}">${item.title}</a></h6>
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



        function Testimonial(){
            axios.get('/ClientSaysListData')
            .then(function (response) {
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item){
                        TestimonialAppend(item);
                    })
                    $('#Testimonial').slick( {
                        infinite: true,
                        autoplay: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        speed: 500,
                        prevArrow: $('.testimonialLeft'),
                        nextArrow: $('.testimonialRight')
                    })
                }
            })
            .catch(function (error) {

            })


            function TestimonialAppend(item){
                $('#Testimonial').append(`
                    <div class="testimonial_box">
                        <div class="testimonial_desc">
                            <p>${item.comment}</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="assets/images/user_img4.jpg" alt="user_img4" />
                            </div>
                            <div class="author_name">
                                <h6>${item.name}</h6>
                                <span>${item.designation}</span>
                            </div>
                        </div>
                    </div>
                `)
            }


        }


        //For HomePage Offer Banner
        OfferBannerListData();
        function OfferBannerListData(){
            axios.get('/FlashSaleHome').
                then(function (response){
                    let data = response.data[0];
                    if(response.status === 200){
                        $('#OfferBannerListData').append(`
                            <div class='col-12'>
                                <div class='sale-banner mb-3 mb-md-4'>
                                    <a class='hover_effect1' href='#'>
                                        <img src="${data.flash_sale_image}" alt='shop_banner_img11'>
                                    </a>
                                </div>
                            </div>
                        `)
                    }
                })
                .catch(function (error){

                })
        }


        //For HomePage News
        NewsListData();
        function NewsListData(){
            axios.get('/NewsListData').then(function (response){
                $.each(response.data, function (i, item){
                    $("<div class='col-lg-4 col-md-6'>").html(
                        "<div class='blog_post blog_style2 box_shadow1'>" +
                            "<div class='blog_img'>" +
                                "<a href='blog-single.html'>" +
                                    "<img src="+item['image']+" alt='el_blog_img1'>" +
                                "</a>" +
                            "</div>" +
                            "<div class='blog_content bg-white'>" +
                                "<div class='blog_text'>" +
                                    "<h5 class='blog_title'><a href='blog-single.html'>" +item.title +"</a></h5>" +
                                    "<ul class='list_none blog_meta'>" +
                                       "<li><a href='#'><i class='ti-calendar'></i> " +item.date +"</a></li>" +
                                    "</ul>" +
                                    "<p>" +item.description +"</p>" +
                                "</div>" +
                            "</div>" +
                        "</div>"
                    ).appendTo('#NewsListData');
                });
            })
                .catch(function (error){

                })
        }



        //Add To Wist List
        AddWistList($('#NewArrivalProductList'));
        AddWistList($('#BestSellersProductList'));
        AddWistList($('#SpecialOfferProductList'));
        AddWistList($('#FeatureList'));
        AddWistList($('#TrendingProductList'));

        //Add To Cart
        AddCartItem($('#NewArrivalProductList'));
        AddCartItem($('#BestSellersProductList'));
        AddCartItem($('#SpecialOfferProductList'));
        AddCartItem($('#FeatureList'));
        AddCartItem($('#TrendingProductList'));

    </script>
@endsection


