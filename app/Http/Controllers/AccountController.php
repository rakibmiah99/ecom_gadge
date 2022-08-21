<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use App\Models\CountriesModel;
use App\Models\AccountModel;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        $countries = CountriesModel::get();
        return view('pages.account',['Seo'=>$Seo, 'countries' => $countries]);
    }

    function GetAccount(Request $request){
        $email = $request->email;
        return AccountModel::where('email',$email)->first([
            'f_name',
            'l_name',
            'mobile',
            'email',
            'bill_country',
            'bill_city',
            'bill_town',
            'bill_address',
            'ship_country',
            'ship_city',
            'ship_town',
            'ship_address'
        ]);
    }


    function UpdateAccount(Request $request){
        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $email = $request->email;
        $mobile = $request->mobile;
        $bill_country = $request->bill_country;
        $bill_city = $request->bill_city;
        $bill_town = $request->bill_town;
        $bill_address = $request->bill_address;
        $ship_country = $request->ship_country;
        $ship_city = $request->ship_city;
        $ship_town = $request->ship_town;
        $ship_address = $request->ship_address;
        return AccountModel::where('email', $email)->update([
           "f_name" => $f_name,
           "l_name" => $l_name,
           "mobile" => $mobile,
           "bill_country" => $bill_country,
           "bill_city" => $bill_city,
           "bill_town" => $bill_town,
           "bill_address" => $bill_address,
           "ship_country" => $ship_country,
           "ship_city" => $ship_city,
           "ship_town" => $ship_town,
           "ship_address" => $ship_address
        ]);
    }

    function ChangePassword(Request $request){
        $email = $request->email;
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $hasAccount = AccountModel::where('email', $email)->where('password', $oldPassword)->count();
        if($hasAccount > 0){
            $isChange =  AccountModel::where('email', $email)->update([
                'password' => $newPassword
            ]);
            if($isChange){
               return $this->Response('no', "Password Change Successfully.");
            }else{
                return $this->Response("yes", "Something Went Wrong. Try Again");
            }
        }else{
            return $this->Response('yes', "Old Password Don't Match.");
        }
    }





    function Response($hasErr,$errMsg){
        return response([
            'hasErr' => $hasErr,
            'errMsg' => $errMsg
        ], 200);
    }

}
