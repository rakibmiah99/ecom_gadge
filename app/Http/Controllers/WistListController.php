<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\ProductListModel;
use App\Models\WistListModel;

class WistListController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.WistListPage',['Seo'=>$Seo]);
    }


    public function GetWistProduct(Request $request){
       $wistProduct =  WistListModel::where('email', $request->email)->get();
       $wistProductList = [];
       foreach($wistProduct as $product){
           $getProduct = ProductListModel::where('product_code', $product['product_code'])->first();
           $wistProductList [] = $getProduct;
       }
       return $wistProductList;
    }

    public function GetWistCount(Request $request){
        return WistListModel::where('email', $request->email)->count();
    }

    public function AddWist(Request $request){
        $productCode = $request->productCode;
        $email = $request->email;
        if($this->ExistWist($email, $productCode)){
           return $this->Response('yes', "This product existing in your wist list.");
        }else{
           $isInsert =  WistListModel::insert([
               'product_code' => $productCode,
               'email' => $email
            ]);
           if ($isInsert){
               return $this->Response('no',"Added to Wist list.");
           }else{
               return $this->Response('yes','Added to Wist list failed.');
           }
        }
    }

    public function RemoveWist(Request $request){
        $productCode = $request->productCode;
        $email = $request->email;
        $isRemove = WistListModel::where('email', $email)->where('product_code',$productCode)->delete();
        if($isRemove){
            return $this->Response('no',"Remove Successfully");
        }else{
            return $this->Response('yes',"Remove Failed. Try Again.");
        }
    }


    function ExistWist($email, $productCode){
        $hasWist = WistListModel::where('email', $email)->where('product_code', $productCode)->count();
        if($hasWist > 0){
            return true;
        }else{
            return false;
        }
    }

    function Response($hasErr,$errMsg){
        return response([
            'hasErr' => $hasErr,
            'errMsg' => $errMsg
        ], 200);
    }
}
