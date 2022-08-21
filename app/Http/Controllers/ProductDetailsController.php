<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\ProductDetailsModel;
use App\Models\ProductListModel;
use App\Models\ProductAdditionalInfoModel;
use App\Models\ProductReviewModel;

class ProductDetailsController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.productDetails',['Seo'=>$Seo]);
    }

    function ProductDetails(Request $request){
        $productCode = $request->productCode;
        $productBasicInfo = ProductListModel::where('product_code', $productCode)->first();
        $productDetails = ProductDetailsModel::where('product_code', $productCode)->first();

        return  [
            "productBasicInfo" => $productBasicInfo,
            "productDetails" => $productDetails
        ];
    }

    function GetProductAdditionalInfo(Request $request){
        $productCode = $request->productCode;
        return ProductAdditionalInfoModel::where('product_code', $productCode)->get();
    }

    function GetProductReview(Request $request){
        $productCode = $request->productCode;
        return ProductReviewModel::where('product_code', $productCode)->get();
    }

    function GetRelatedProduct(Request $request){
         $category = $request->category;
        return ProductListModel::where('category', $category)->inRandomOrder()->limit(7)->get();
    }

}
