<?php

namespace App\Http\Controllers;
use App\Models\MainCategoryModel;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    //Get Page
    function Page(){
        return view('pages.Category.MainCategory');
    }

    function AllCategory(){
        return MainCategoryModel::all();
    }
}
