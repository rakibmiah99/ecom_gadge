<header class="header_wrap">
    <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="header_topbar_info">
                        <div class="header_offer">
                            <span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="me-3">Download App</span>
                            <ul class="icon_list text-center text-lg-start">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="assets/images/logo_light.png" alt="logo">
                    <img class="logo_dark" src="assets/images/logo_dark.png" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen">
                                        <option value="">All Category</option>
                                        <option value="Dresses">Dresses</option>
                                        <option value="Shirt-Tops">Shirt &amp; Tops</option>
                                        <option value="T-Shirt">T-Shirt</option>
                                        <option value="Pents">Pents</option>
                                        <option value="Jeans">Jeans</option>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="/Account" class="nav-link"><i class="linearicons-user"></i></a></li>
                    <li class="d-none" id="wistListVisibility"><a href="/WistList" class="nav-link"><i class="linearicons-heart"></i><span id="displayWistCount" class="wishlist_count">0</span></a></li>
                    <li id="displayCart" class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count" id="displayTotalItem">2</span><span class="amount" id="displayCartSubTotal"></span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list" id="cartItems">
                              <!-- Display Cart Item -->
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price" id="cartSubTotal"> </span></p>
                                <p class="cart_buttons"><a href="/ViewCart" class="btn btn-fill-line view-cart">View Cart</a><a href="/Checkout" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories </span><i class="linearicons-menu"></i>
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul id="AllCategory">
                                <!-- All Category -->
                            </ul>
                            <div class="more_categories">More Categories</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a class="nav-link nav_item" href="/">Home</a></li>
                                <li><a class="nav-link nav_item" href="/">Blog</a></li>
                                <li><a class="nav-link nav_item" href="/About">About Us</a></li>
                                <li><a class="nav-link nav_item" href="/Contact">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
