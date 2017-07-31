<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Image;
use Auth;
class BannerController extends Controller
{
    //

    protected function index(){

        return view('admin.banner.list');
    }
}
