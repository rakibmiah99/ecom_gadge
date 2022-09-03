<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;
use App\Models\AccountModel;
use App\Models\BrandModel;

class RegistrationController extends Controller
{
    function Page()
    {
        $Seo = PageSeoModel::where("name", 'home')->get();
        return view('pages.registration', ['Seo' => $Seo]);
    }

    //Create New Account
    function CreateAccount(Request $request){
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $mobile = $request->mobile;
        $password = $request->password;
        if($this->CheckAccount($email) > 0){
           return  $this->Response("yes","This Account Already Exist. Please <a style=\"color: blue;\" href='/Login'>Login</a>");
        }else{
           $isReg =  AccountModel::insert([
                "f_name" => $fname,
                "l_name" => $lname,
                "email" => $email,
                "mobile" => $mobile,
                "password" => $password
            ]);
           if($isReg){
               return $this->Response("no","Account Create Successfully. <a style=\"color: blue;\" href='/Login'>Login</a>");
           }else{
              return $this->Response("yes","Account Create Failed");
           }
        }
    }

    //Login A User
    function AccountLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = AccountModel::where('email', $email)->where('password', $password)->first();
        $hasAccount = AccountModel::where('email', $email)->where('password', $password)->count();
        if($this->CheckAccount($email) > 0){
            if($hasAccount > 0){
                if($user->password == $password){
                    return $this->Response('no',"Login Successfully.");
                }
            }else{
                return $this->Response("yes", "Email or password don't match. Try again");
            }
        }else{
           return $this->Response('yes', "Account not Found. <a style=\"color: blue;\" href='/Registration'>Sign Up</a>");
        }
    }


    function CheckAccount($email){
        return AccountModel::where('email', $email)->count();
    }

    function Response($hasErr,$errMsg){
        return response([
            'hasErr' => $hasErr,
            'errMsg' => $errMsg
        ], 200);
    }

}
