<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CountriesModel;
use App\Models\PageSeoModel;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        $countries = CountriesModel::get();
        return view('pages.CheckoutPage',['Seo'=>$Seo, 'countries' => $countries]);
    }
}
