<?php

namespace App\Http\Controllers;
use App\Models\ProductListModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserWiseCouponModel;
use App\Models\CouponModel;
use App\Models\ProductCartModel;

class UserWiseCouponController extends Controller
{
    function SetCouponDiscount(Request $request){
        $coupon_code = $request->couponCode;
        $email = $request->email;
        if($this->hasCoupon($coupon_code) > 0){
             $coupon_info = CouponModel::where('coupon_code', $coupon_code)->first();
             if($coupon_info->type == "price"){
                 if($coupon_info->condition <= $this->CartTotalPrice($email)){
                     if($coupon_info->discount_type == "flat"){
                         return  $this->InsertDiscount($email, $coupon_info->discount);
                     }
                     else if($coupon_info->discount_type == "percent"){
                         $cartTotal = $this->CartTotalPrice($email);
                         $discountPrice = $cartTotal * ($coupon_info->discount / 100 );
                         return $this->InsertDiscount($email, $discountPrice);
                     }
                 }else{
                     return $this->Response('yes', "This Coupon Code is not available for you");
                 }
             }
             else if($coupon_info->type == "product"){
                if($coupon_info->condition <= $this->NumberOfCart($email)){
                    if($coupon_info->discount_type == "flat"){
                        return  $this->InsertDiscount($email, $coupon_info->discount);
                    }
                    else if($coupon_info->discount_type == "percent"){
                        $cartTotal = $this->CartTotalPrice($email);
                        $discountPrice = $cartTotal * ($coupon_info->discount / 100 );
                        return $this->InsertDiscount($email, $discountPrice);
                    }
                }else{
                    return $this->Response('yes', "This Coupon Code is not available for you");
                }
             }
             else{

             }
        }else{
            return $this->Response('yes', "This Coupon Code is not valid.");
        }
    }


    function hasCoupon($coupon_code){
        return CouponModel::where('coupon_code', $coupon_code)->count();
    }


    function CartTotalPrice($email)
    {
        $productItems = ProductCartModel::where('email', $email)->get();
        $subTotal = 0;
        foreach ($productItems as $item) {
            $details = ProductListModel::where('product_code', $item['product_code'])->first();
            $totalPrice = floatval($details->price) * floatval($item['qty']);
            $subTotal += $totalPrice;
        }
        return $subTotal;
    }

    function NumberOfCart($email)
    {
        return ProductCartModel::where('email',$email)->count();
    }



    function GetUserWiseDiscount($email){
        $hastDiscount =  UserWiseCouponModel::where('email', $email)->count();
        if( $hastDiscount > 0){
            return UserWiseCouponModel::where('email', $email)->first()->discount_amount;
        }else{
            return 0;
        }
    }

    function InsertDiscount($email, $discount_amount){
        if($this->hasUserDiscount($email) > 0){
            $inserted =  $this->UpdateDiscount($email, $discount_amount);
            if($inserted){
                return $this->Response('no', "Congratulation You Win Some Discount");
            }
            else{
                return $this->Response('yes', "Already you are using this coupon.");
            }
        }else{
            $updated =  UserWiseCouponModel::insert([
                'email' => $email,
                'discount_amount' => $discount_amount
            ]);
            if($updated){
                return $this->Response('no', "Congratulation You Win Some Discount");
            }
            else{
                return $this->Response('yes', "Coupon Failed.");
            }
        }
    }

    function UpdateDiscount($email, $discount_amount){
        return UserWiseCouponModel::where('email', $email)->update([
            'discount_amount' => $discount_amount
        ]);
    }

    function hasUserDiscount($email){
       return UserWiseCouponModel::where('email', $email)->count();
    }

    function RemoveUsingCoupon($email){
        return UserWiseCouponModel::where('email', $email)->delete();
    }

    function Response($hasErr,$errMsg)
    {
        return response([
            'hasErr' => $hasErr,
            'errMsg' => $errMsg
        ], 200);
    }
}
