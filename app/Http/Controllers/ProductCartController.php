<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserWiseCouponController;
use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\ProductListModel;
use App\Models\ProductCartModel;

class ProductCartController extends Controller
{

    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.cartList',['Seo'=>$Seo]);
    }

    public function GetCartItems(Request $request){
        $productItems = ProductCartModel::where('email', $request->email)->get();
        $totalItem = ProductCartModel::where('email', $request->email)->count();
        $discount = $this->GetUsingDiscount($request->email);
        $newItems = [];
        $subTotal = 0;

        foreach ($productItems as $item){
            $details = ProductListModel::where('product_code',$item['product_code'])->first();
            $totalPrice = floatval($details->price) * floatval($item['qty']);
            $subTotal += $totalPrice;
            $newItems [] = [
                'id' => $item['id'],
                'product_code' => $details->product_code,
                'title'  => $details->title,
                'image' => $details->product_image,
                'price' => $details->price,
                'total_price' => (float)$totalPrice,
                'qty' => $item['qty']
            ];
        }
        $total = $subTotal - $discount;
        return [
            'items' => $newItems,
            'subtotal' => $subTotal,
            'totalItem' => $totalItem,
            'discount' => $discount,
            'total' => $total
        ];
    }

    public function AddCartItem(Request $request){
        $email = $request->email;
        $product_code = $request->productCode;
        $default_size = $request->defaultSize;
        $default_color = $request->defaultColor;
        $qty = $request->qty;
        $isAddItem = ProductCartModel::insert([
            'qty' => $qty,
            'email' => $email,
            'product_code' => $product_code,
            'size' => $default_size,
            'color' => $default_color
        ]);
        if($isAddItem){
            $this->RemoveUsingCoupon($email);
            return $this->Response('no', "Item added successfully");
        }else{
            return $this->Response('yes', "Item added failed");
        }
    }

    public function RemoveCartItem(Request $request){
        $email = $request->email;
        $itemID = $request->itemID;
        $isRemove = ProductCartModel::where('email', $email)->where('id', $itemID)->delete();
        if($isRemove){
            $this->RemoveUsingCoupon($email);
            return $this->Response('no',"Item Remove Successfully.");
        }else{
            return $this->Response('yes',"Item Remove Failed.");
        }
    }

    public function UpdateCartItem(Request $request){
        $itemID = $request->itemID;
        $email = $request->email;
        $qty = $request->qty;
        $isUpdateItem = ProductCartModel::where('id', $itemID)->where('email',$email)->update([
            'qty' => $qty
        ]);
        if($isUpdateItem){
            $this->RemoveUsingCoupon($email);
            return $this->Response('no', "Item Updated successfully");
        }else{
            return $this->Response('yes', "Item Updated failed");
        }
    }


    function Response($hasErr,$errMsg){
        return response([
            'hasErr' => $hasErr,
            'errMsg' => $errMsg
        ], 200);
    }

    function RemoveUsingCoupon($email){
        $obj = new UserWiseCouponController();
        return $obj->RemoveUsingCoupon($email);
    }

    function GetUsingDiscount($email){
        $obj = new UserWiseCouponController();
        return $obj->GetUserWiseDiscount($email);
    }

}
