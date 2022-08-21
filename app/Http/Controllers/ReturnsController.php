<?php

namespace App\Http\Controllers;

use App\Models\PageSeoModel;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    function Page()
    {
        $Seo = PageSeoModel::where("name", 'home')->get();
        return view('pages.returns', ['Seo' => $Seo]);
    }
}
