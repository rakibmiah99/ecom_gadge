<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;

class ProductListBySearchController extends Controller
{
    function Page()
    {
        $Seo = PageSeoModel::where("name", 'home')->get();
        return view('pages.productListBySearch', ['Seo' => $Seo]);
    }

}
