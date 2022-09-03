<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content={{$Seo[0]->description}}>
    <meta name="keywords" content={{$Seo[0]->keywords}}>
    <title> {{$Seo[0]->title}}</title>
    <meta property="og:site_name" content={{$Seo[0]->title}}>
    <meta property="og:title" content={{$Seo[0]->share_title}} />
    <meta property="og:description" content={{$Seo[0]->description}} />
    <meta property="og:image" content={{$Seo[0]->page_img}}/>


    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap')}}" rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owlcarousel/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/modify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>
@include('layouts.loader')
@include('layouts.popup')
@include('layouts.header')
@yield('content')
@include('layouts.footer')
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/parallax.js')}}"></script>
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dd.min.js')}}"></script>
<script src="{{asset('assets/js/slick.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.elevatezoom.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>



    AllCategory()
    function AllCategory(){
        axios.get('/AllCategory')
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    data.forEach(function (item,index) {
                        if(item.sub_cat.length > 0){
                            AllCategoryTemplate(item);
                        }else{
                            $('#AllCategory').append(`
                                <li>
                                    <a class="dropdown-item nav-link nav_item" href="/category/${item.cat_name}">
                                        <i class="${item.cat_icon}"></i>
                                        <span>${item.cat_name}</span>
                                    </a>
                                </li>
                            `)
                        }
                    })
                }
            })
            .catch(function (error){

            })

        function AllCategoryTemplate(item){
            let AllCategory = ``;
            AllCategory += `
                    <li class="dropdown dropdown-mega-menu">
                        <a class="dropdown-item nav-link dropdown-toggler" href="/category/${item.cat_name}" data-bs-toggle="dropdown"><i class="${item.cat_icon}"></i> <span>${item.cat_name}</span></a>
                        <div class="dropdown-menu">
                            <ul class="mega-menu d-lg-flex">
                                <li class="mega-menu-col col-lg-7">
                                    <ul class="d-lg-flex">
                `;
            item.sub_cat.forEach(function (sub_cat) {
                AllCategory += `
                                        <li class="mega-menu-col col-lg-6">
                                            <ul>
                                                <li class="dropdown-header">${sub_cat.group_name}</li>
                    `;

                sub_cat.items.forEach(function (sub_cat_item) {
                    AllCategory += `
                                                        <li><a class="dropdown-item nav-link nav_item" href="/category/${item.cat_name}/${sub_cat_item.cat_name}">${sub_cat_item.cat_name}</a></li>
                            `
                });
                AllCategory += `
                                            </ul>
                                        </li>
                    `;
            });
            AllCategory += `    </ul>
                                </li>
                                <li class="mega-menu-col col-lg-5">`;

            if(item.trending_sub_cat.length > 0){
                item.trending_sub_cat.forEach(function (trendCatItem){
                    AllCategory += `
                                    <div class="header-banner2">
                                        <img src="${trendCatItem.cat_image}" alt="menu_banner1">
                                        <div class="banne_info">
                                            <a href="/category/${item.cat_name}/${trendCatItem.cat_name}">Shop now</a>
                                        </div>
                                    </div>
                                `
                });
            }

            AllCategory += `
                                </li>
                            </ul>
                        </div>
                    </li>
                `;

            $('#AllCategory').append(AllCategory)
        }
    }
</script>
@yield('script')
</body>
</html>



