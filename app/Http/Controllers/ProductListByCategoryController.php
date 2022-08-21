<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\ProductListModel;

class ProductListByCategoryController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.productListByCategory',['Seo'=>$Seo]);
    }


    function CategoryWiseProduct(Request $request){
        $categoryName = $request->categoryName;
        $subCategoryName = $request->subCategoryName;

        if($subCategoryName == ""){
            return ProductListModel::where('category',$categoryName)->get();
        }else{
            return ProductListModel::where('category',$categoryName)->where('sub_category', $subCategoryName)->get();
        }


    }
}
