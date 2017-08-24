<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Product;
use App\Brand;


class PageController extends Controller
{
    //

       public function home_content()
       {
         
            $banner_list=Banner::all();
            $product=Product::all();
            $brands=Brand::all();
            
            return response()->json(['banners'=>$banner_list,'products'=>$product,'brands'=>$brands]);
       }
}
