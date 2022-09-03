<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/forget-password', function () {
    return view('pages.forgetPassword');
});

Route::controller(MainCategoryController::class)->prefix('/category')->group(function(){
    Route::get('/main', 'Page');
    Route::get('/get-all', 'AllCategory');
});


