<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FavListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductListByCategoryController;
use App\Http\Controllers\ProductListBySearchController;
use App\Http\Controllers\ProductListBySubCategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\FlashSaleController;
use App\Http\Controllers\WistListController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\UserWiseCouponController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderCompleteController;

use Illuminate\Support\Facades\Route;

// Product List
Route::get('/ProductListBySearch',[ProductListBySearchController::class,'Page']);
Route::get('/ProductListBySubCategory',[ProductListBySubCategoryController::class,'Page']);
Route::get('/ProductListByCategory',[ProductListByCategoryController::class,'Page']);


// Cart List Fav List
Route::get('/FavList',[FavListController::class,'Page']);
Route::get('/CartList',[CartListController::class,'Page']);

// Login Registration & Accunt
Route::get('/',[HomeController::class,'Page']);
Route::get('/Login',[LoginController::class,'Page']);
Route::get('/Registration',[RegistrationController::class,'Page']);
Route::post('/CreateAccount',[RegistrationController::class,'CreateAccount']);
Route::post('/AccountLogin',[RegistrationController::class,'AccountLogin']);
Route::post('/GetAccount',[AccountController::class,'GetAccount']);
Route::post('/UpdateAccount',[AccountController::class,'UpdateAccount']);
Route::post('/ChangePassword',[AccountController::class,'ChangePassword']);
Route::get('/Account',[AccountController::class,'Page']);


// Site Info
Route::get('/Contact',[ContactController::class,'Page']);
Route::get('/Returns',[ReturnsController::class,'Page']);
Route::get('/Faq',[FaqController::class,'Page']);
Route::get('/About',[AboutController::class,'Page']);


//Homepage Slider List
Route::get('/SliderListData',[HomeController::class,'SliderListData']);

//HomePage TopCategory List
Route::get('/TopCategoryListData',[HomeController::class,'TopCategoryListData']);

//Homepage product List
Route::get('/NewArrivalProductListData',[HomeController::class,'NewArrivalProductListData']);
Route::get('/BestSellersProductListData',[HomeController::class,'BestSellersProductListData']);
Route::get('/FeaturedProductListData',[HomeController::class,'FeaturedProductListData']);
Route::get('/SpecialOfferProductListData',[HomeController::class,'SpecialOfferProductListData']);
Route::get('/TrendingProductListData',[HomeController::class,'TrendingProductListData']);
Route::get('/FlashSaleHome',[HomeController::class,'FlashSaleHome']);
Route::get('/TrendingCategory',[HomeController::class,'TrendingCategory']);
Route::get('/TopCategory',[HomeController::class,'TopCategory']);
//Route::get('/ProductCategory',[HomeController::class,'ProductCategory']);
Route::get('/AllCategory',[HomeController::class,'AllCategory']);


//HomePage Client Says List
Route::get('/ClientSaysListData',[HomeController::class,'ClientSaysListData']);

//HomePage Brand
Route::get('/BrandListData',[HomeController::class,'BrandListData']);

//Homepage News
Route::get('/NewsListData',[HomeController::class,'NewsListData']);

//Social Media Link
Route::get('/SocialMediaListData',[HomeController::class,'SocialMediaListData']);

//CategoryWiseProduct
Route::get('/category/{catName}/{subCatName?}', [ProductListByCategoryController::class,'Page']);
Route::get('/CategoryWiseProduct/{categoryName}/{subCategoryName?}', [ProductListByCategoryController::class,'CategoryWiseProduct']);


Route::get('/product/{product_code}', [ProductDetailsController::class,'Page']);
Route::get('/ProductDetails/{productCode}', [ProductDetailsController::class, 'ProductDetails']);
Route::get('/ProductAdditionalInfo/{productCode}', [ProductDetailsController::class, 'GetProductAdditionalInfo']);
Route::get('/GetProductReview/{productCode}', [ProductDetailsController::class, 'GetProductReview']);
Route::get('/GetRelatedProduct/{category}', [ProductDetailsController::class, 'GetRelatedProduct']);

//Flash Sale
Route::get('/FlashSale', [FlashSaleController::class,'Page']);
Route::get('/FlashSaleWiseProduct', [FlashSaleController::class,'FlashSaleWiseProduct']);

Route::get('/WistList',[WistListController::class, 'Page']);
Route::get('/GetWistProduct/{email}',[WistListController::class, 'GetWistProduct']);
Route::post('/GetWistCount',[WistListController::class, 'GetWistCount']);
Route::post('/AddWist',[WistListController::class, 'AddWist']);
Route::post('/RemoveWist',[WistListController::class, 'RemoveWist']);


Route::get('/GetCartItems/{email}',[ProductCartController::class, 'GetCartItems']);
Route::post('/AddCartItem',[ProductCartController::class, 'AddCartItem']);
Route::post('/UpdateCartItem',[ProductCartController::class, 'UpdateCartItem']);
Route::post('/RemoveCartItem',[ProductCartController::class, 'RemoveCartItem']);
Route::get('/ViewCart', [ProductCartController::class, 'Page']);


Route::get('/SetCouponDiscount/{email}/{couponCode}', [UserWiseCouponController::class, 'SetCouponDiscount']);

Route::get('/Checkout', [CheckoutController::class, 'Page']);
Route::post('/PlaceOrder', [InvoiceController::class, 'PlaceOrder']);
Route::get('/GetMyOrder/{email}', [InvoiceController::class, 'GetMyOrder']);

Route::get('/OrderComplete', [OrderCompleteController::class, 'Page']);


