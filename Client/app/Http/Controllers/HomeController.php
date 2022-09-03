<?php

namespace App\Http\Controllers;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ClientSaysModel;
use App\Models\NewsModel;
use App\Models\ProductListModel;
use App\Models\PageSeoModel;
use App\Models\SliderModel;
use App\Models\SocialMediaModel;
use App\Models\SubCategoryModel;
use App\Models\SubCategoryLabel2Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Page(){
        $Seo=PageSeoModel::where("name",'home')->get();
        return view('pages.home',['Seo'=>$Seo]);
    }

    //Home Slider
    function SliderListData(){
        $SliderListData=SliderModel::all();
        return $SliderListData;
    }

    //Home Top Category
    function TopCategoryListData(){
        $TopCategoryListData=CategoryModel::all();
        return $TopCategoryListData;
    }

    //Home Exclusive Products list
    function NewArrivalProductListData(){
        return ProductListModel::where("remark",'New Arrival')->where('home_order',"!=","0")->where('home_order','<=','8')->get();
    }
    function BestSellersProductListData(){
        return ProductListModel::where("remark",'Best Seller')->where('home_order',"!=","0")->where('home_order','<=','8')->get();
        return $BestSellersProductListData;
    }
    function FeaturedProductListData(){
        return ProductListModel::where("remark",'Feature')->where('home_order',"!=","0")->where('home_order','<=','8')->get();
    }
    function SpecialOfferProductListData(){
        return ProductListModel::where("remark",'Special Offer')->where('home_order',"!=","0")->where('home_order','<=','8')->get();
    }
    function TrendingProductListData(){
        return ProductListModel::where("remark",'Trending')->where('home_order',"!=","0")->where('home_order','<=','8')->get();
    }
    function FlashSaleHome(){
        return ProductListModel::where("remark",'Flash Sale')->where('home_order',"=","1")->get(['id','flash_sale_image']);
    }

    function TrendingCategory(){
        return SubCategoryModel::where('cat_type',"Trending Category")->get();
    }
    function TopCategory(){
        return SubCategoryModel::where('cat_type',"Top Category")->get();
    }
    function ProductCategory(){
        $catGroup =  SubCategoryModel::where('cat_id','1')->where('cat_group','!=', '')->distinct()->get(['cat_group']);
        $newCat = [];
        foreach ($catGroup as $group){
            $getCatByGroup = SubCategoryModel::where('cat_group',$group['cat_group'])->get();
            $newCat [] = [
                'cat_group' => $group['cat_group'],
                'cat_items' => $getCatByGroup
            ];
        }

        return $newCat;
    }

    function AllCategory(){
        $catEmtyGroup =  SubCategoryModel::where('cat_id','1')->where('cat_group','=', '')->get(['id','cat_name','icon']);

        $allCat = [];
        foreach ($catEmtyGroup as $key => $catItem){
            $subCat = SubCategoryLabel2Model::where('sub_cat_id',$catItem['id'])->get();
            $subCatGroup = SubCategoryLabel2Model::where('sub_cat_id',$catItem['id'])->distinct()->get(['cat_group']);
            $trendingSubCat = SubCategoryLabel2Model::where('sub_cat_id',$catItem['id'])->where('cat_type',"Trending")->get();

            if(count($subCat) < 1){
                $allCat [] = [
                    'cat_name' => $catItem['cat_name'],
                    'cat_icon' => $catItem['icon'],
                    'sub_cat' => []
                ];
            }else{
                $makeCat = [];
                foreach ($subCatGroup as $catGroup) {
                    if($catGroup['cat_group'] !== ""){
                        $groupWiseCategory = SubCategoryLabel2Model::where('sub_cat_id',$catItem['id'])->where('cat_group',$catGroup['cat_group'])->get();
                        $makeCat [] = [
                            'group_name' => $catGroup['cat_group'],
                            'items' => $groupWiseCategory
                        ];
                    }
                }
                $allCat[] = [
                    'cat_name' => $catItem['cat_name'],
                    'cat_icon' => $catItem['icon'],
                    'sub_cat' => $makeCat,
                    'trending_sub_cat' => $trendingSubCat
                ];
                /*array_push($allCat[$key] ['sub_cat'], [
                    'group_name' => 'trending',
                    'items' => $trendingSubCat
                ]);*/


            }




        }


        return $allCat;
    }


    //Our Client Say component
    function ClientSaysListData(){
        $ClientSaysListData=ClientSaysModel::all();
        return $ClientSaysListData;
    }

    //Brand
    function BrandListData(){
        $BrandListData=BrandModel::all();
        return $BrandListData;
    }

    //News
    function NewsListData(){
        $NewsListData=NewsModel::orderBy('id','desc')->limit(3)->get();
        return $NewsListData;
    }

    //Social Media Link
    function SocialMediaListData(){
        $SocialMediaListData=SocialMediaModel::all();
        return $SocialMediaListData;
    }
}

