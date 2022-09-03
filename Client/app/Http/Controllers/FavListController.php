<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;

class FavListController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.favList',['Seo'=>$Seo]);
    }
}
