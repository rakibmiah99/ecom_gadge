<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;

class CartListController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.cartList',['Seo'=>$Seo]);
    }
}
