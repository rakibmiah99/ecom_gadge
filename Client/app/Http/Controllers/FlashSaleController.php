<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\ProductListModel;

class FlashSaleController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.FlashSalePage',['Seo'=>$Seo]);
    }


    function FlashSaleWiseProduct(Request $request){
        return ProductListModel::where('remark','Flash Sale')->get();
    }
}
