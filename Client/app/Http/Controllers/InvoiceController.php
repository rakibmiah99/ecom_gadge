<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceModel;
use App\Models\InvoiceProductModel;
use App\Models\ProductCartModel;
use App\Models\ProductListModel;
use App\Models\UserWiseCouponModel;
class InvoiceController extends Controller
{
    //Request Final Order
    function PlaceOrder(Request $request){
        $invoiceNo = $d=strtotime(date("Y-m-d h:i:sa"));
        $email = $request->input('email');
        $cartItem = ProductCartModel::where('email', $email)->get();
        $subTotal = 0;
        $totalPrice = 0;
        $totalDiscount = 0;
        $haveCoupon = UserWiseCouponModel::where('email', $email)->count();
        ($haveCoupon > 0 ) ? $couponDiscount = UserWiseCouponModel::where('email', $email)->first()->discount_amount  : $couponDiscount =  0;
        $shippingCharge =  env('shipping_charge');
        foreach ($cartItem as $item){
            $qty = $item['qty'];
            $productCode =  $item['product_code'];
            $product = ProductListModel::where('product_code', $item['product_code'])->first();
            $productName = $product->title;
            $productPrice = $product->price;
            $productDiscountPrice = $product->discount_price;
            $discountPercent = $product->discount_percent;
            $productImage = $product->product_image;
            $productTotalPrice = $productPrice * $qty;
            $productFinalPrice = $productDiscountPrice * $qty;
            $productDiscountAmount = $productTotalPrice - $productFinalPrice;

            //Insert Invoice Product
            $invoiceProduct =  InvoiceProductModel::insert([
                'inv_id' => $invoiceNo,
                'product_name' => $productName,
                'product_image' => $productImage,
                'product_code' => $productCode,
                'price' => $productPrice,
                'qty' => $qty,
                'total_price' => $productTotalPrice,
                'discount_amount' => $productDiscountAmount,
                'discount_percent' => $discountPercent,
                'final_price' => $productFinalPrice,
            ]);
            if($invoiceProduct){
                $subTotal += $productTotalPrice;
                $totalDiscount += $productDiscountAmount;
                $totalPrice =$totalPrice + $productFinalPrice - $couponDiscount; //Working Better Confusing
                ProductCartModel::where('id', $item['id'])->delete();
            }
        }

        $createInvoice = InvoiceModel::insert([
            'inv_no' => $invoiceNo,
            'shipping_charge' => $shippingCharge,
            'sub_total' => $subTotal,
            'total_discount' => $totalDiscount,
            'coupon_discount' => $couponDiscount,
            'total' => $totalPrice + $shippingCharge,
            'payment_type' => $request->input('paymentMethod'),
            'payment_status' => 'pending',
            'email' => $request->input('email'),
            'bill_name' => $request->input('bfName'),
            'bill_country' => $request->input('bCountry'),
            'bill_mobile' => $request->input('bPhone'),
            'bill_city' => $request->input('bCity'),
            'bill_town' => $request->input('bTown'),
            'bill_address' => $request->input('bAddress'),
            'bill_email' => $request->input('bEmail'),
            'ship_name' => $request->input('sName'),
            'ship_mobile' => $request->input('sMobile'),
            'ship_address' => $request->input('sAddress'),
            'ship_country' => $request->input('sCountry'),
            'ship_city' => $request->input('sCity'),
            'ship_town' => $request->input('sTown'),
            'additional_info' => $request->input('email')
        ]);

        if($createInvoice){
            UserWiseCouponModel::where('email', $email)->delete();
            return response()->json([
                'orderStatus' => 'complete',
                'msg' => "Order Successfully Create."
            ]);
        }else{
            return response()->json([
                'orderStatus' => 'failed',
                'msg' => "Order Create Failed."
            ]);
        }
    }


    //Get My Order List
    function GetMyOrder(Request $request){
        $email = $request->email;
        return InvoiceModel::where('email', $email)->get(['inv_no','total','order_status','created_time']);
    }
}
