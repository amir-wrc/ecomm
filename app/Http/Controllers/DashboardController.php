<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Image;
use Auth;

class DashboardController extends Controller
{
    protected function index() {
        return view('admin.dashboard');
    }

    protected function profile() {
        $profile = User::find(Auth::guard('admin')->user()->id);
        return view('admin.profile')->with('profile',$profile);
    }

    protected function profile_submit(Request $request){
         Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'profile_image' => 'required_with|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
            'name' => 'Enter Your Name',
            'email' => 'Enter Your Email',
            'address' => 'Enter Your Address',
            'phone' => 'Enter Your Phone Number',
            'profile_image.required_with' => 'Please choose heder image','profile_image.image|mimes:jpeg,png,jpg,gif,svg' => 'Please choose proper image type','profile_image.max:2048' => 'Maximum file size should be 2 MB'
        ])->validate();

        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image') ;

            $fileName = time().'_'.$file->getClientOriginalName() ;

            //thumb destination path
            
            $destinationPath_2 = public_path().'/uploads/profile' ;

            $img = Image::make($file->getRealPath());

            
            $img->resize(160, 160, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName);
        }
        else {
            $fileName = '';
        }

        $profile = User::find(Auth::guard('admin')->user()->id);
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->phone = $request->phone;
        $profile->image = $fileName;

        $profile->save();

        $request->session()->flash("profile-msg", "Profile updated successfully");
        return redirect("/admin/profile");
    }
}
