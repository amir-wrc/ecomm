<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Product;

class PageController extends Controller
{
    //

       public function home_content()
       {
         
            $banner_list=Banner::all();
            $product=Product::all();
            
            return response()->json(['banners'=>$banner_list,'products'=>$product]);
       }
}
